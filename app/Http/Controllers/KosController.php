<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddKostRequest;
use App\Http\Requests\GetNearestKostRequest;
use App\Models\KostMongoDB;
use App\Repository\KostRepositoryInterface;

use Illuminate\Support\Facades\DB;

class KosController extends Controller
{
    private KostRepositoryInterface $kostRepository;
    private $long;
    private $lat;

    public function __construct(KostRepositoryInterface $kostRepository)
    {
        $this->kostRepository = $kostRepository;
    }

    function addKosMongo(AddKostRequest $request, $id)
    {

        // mongodb
        //DB::connection('mongodb')->beginTransaction();
        $reqMongo = KostMongoDB::addAdditionalData($request->validated(), $id);
        $createdMongo = $this->kostRepository->saveKostMongoDb($reqMongo);
        if (!$createdMongo || $createdMongo == null) {
            // DB::connection('mongodb')->rollBack();
            return null;
        }
        //DB::connection('mongodb')->commit();
        return $createdMongo;
    }

    public function addKos(AddKostRequest $request)
    {
        // postgre
        DB::connection('pgsql')->beginTransaction();
        //$out = new \Symfony\Component\Console\Output\ConsoleOutput();
        //$out->writeln($req['long']);
        //dd("tes");
        $req = Kost::addAdditionalData($request->validated());

        $created = $this->kostRepository->saveKost($req);
        if (!$created || $created == null) {
            //DB::connection('pgsql')->rollBack();
            DB::connection('pgsql')->rollBack();
            return response()->json([
                'success' => false,
                'errors' => ['Can\'t create your Kos right now on pgsql.'],
            ], 500);
        }
        $id = $created->id;

        //mogodb
        $createdMongo = $this->addKosMongo($request, $id);
        if (!$createdMongo || $createdMongo == null) {
            DB::connection('pgsql')->rollBack();
            return response()->json([
                'success' => false,
                'errors' => ['Can\'t create your Kos right now on mongodb.'],
            ], 500);
        }
        DB::connection('pgsql')->commit();
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

        // $recommendKost = KostMongoDB::on('mongodb')
        //     ->where(
        //         'location',
        //         'near',
        //         [
        //             '$geometry' => [
        //                 'type' => 'Point',
        //                 'coordinates' =>
        //                 [
        //                     (float)$req['long'],
        //                     (float)$req['lat']
        //                 ]
        //             ],
        //             'maxDistance' => 1000,
        //             'distanceField' => "distance",
        //             'spherical' => true
        //         ],
        //     )
        //     ->where('status', (bool)true)
        //     ->limit(2)
        //     ->get()->transform(function ($i) {
        //         unset($i->_id);
        //         return $i;
        //     });
        // // //response()->json([])
        // dd($recommendKost[0]->getOriginal());

        $this->long = (float)$req['long'];
        $this->lat = (float)$req['lat'];

        $recommendKost = KostMongoDB::on('mongodb')->raw(function ($collection) {
            return $collection->aggregate([
                [
                    '$geoNear' => [
                        'key' => "location",
                        'near' => ['type' => "Point", 'coordinates' => [$this->long, $this->lat]],
                        'distanceField' => "distance",
                        'spherical' => true
                    ],
                ],
                [
                    '$match' => [
                        'status' => (bool)true
                    ]
                ],
                [
                    '$limit' => 2
                ]
            ]);
        });
        $arrayRecommendKos = array();
        foreach ($recommendKost as $key => $value) {
            $arrayRecommendKos[$key] = $value->getOriginal();
        }
        return response()->json([
            'success' => true,
            'kosts' => $arrayRecommendKos
        ], 201);
        //dd($arrayRecommendKos);
        //dd($recommendKost[0]->getOriginal());
    }
}
