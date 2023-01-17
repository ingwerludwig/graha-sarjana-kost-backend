<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddKostRequest;
use App\Http\Requests\GetNearestKostRequest;
use App\Models\KostMongoDB;
use App\Repository\KostRepositoryInterface;

class KosController extends Controller
{
    private KostRepositoryInterface $kostRepository;

    public function __construct(KostRepositoryInterface $kostRepository)
    {
        $this->kostRepository = $kostRepository;
    }

    public function addKos(AddKostRequest $request)
    {

        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $req = Kost::addAdditionalData($request->validated());
        $out->writeln($req['long']);
        dd($request->validated());
        $created = $this->kostRepository->saveKost($req);
        $id = $created->id;
        $reqMongo = KostMongoDB::addAdditionalData($request->validated(), $id);

        $createdMongo = $this->kostRepository->saveKostMongoDb($reqMongo);

        if (!$created || $created == null) {
            return response()->json([
                'success' => false,
                'errors' => ['Can\'t create your Kos right now.'],
            ], 500);
        }

        if (!$createdMongo || $createdMongo == null) {
            return response()->json([
                'success' => false,
                'errors' => ['Can\'t create your Kos right now on MongoDB.'],
            ], 500);
        }

        return response()->json([
            'success' => true,
            'kost' => $created,
            'kost_mongodb' => $createdMongo
        ], 201);
    }

    public function getKost()
    {
        $existKos = $this->kostRepository->getKostByFirstAsc();

        if (!$existKos || $existKos == null) {
            return response()->json([
                'success' => false,
                'errors' => ['Can\'t get kos data right now.'],
            ], 500);
        }

        return response()->json([
            'success' => true,
            'kost' => $existKos
        ], 201);
    }

    public function getNearestKost(GetNearestKostRequest $request)
    {

        $req = $request->validated();
        $recommendKost = KostMongoDB::on('mongodb')
            ->where(
                'location',
                'near',
                [
                    '$geometry' => [
                        'type' => 'Point',
                        'coordinates' =>
                        [
                            (float)$req->long,
                            (float)$req->lat
                        ]
                    ],
                    '$maxDistance' => (float)(150000)
                ]
            )
            ->limit(10)
            ->get()->transform(
                function ($i) {
                    unset($i->_id);
                    return $i;
                }
            );

        dd($recommendKost);
    }
}
