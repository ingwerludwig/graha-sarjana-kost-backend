<?php

namespace App\Console\Commands;

use App\Models\Kost;
use App\Models\KamarKost;
use App\Models\KostMongoDB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CheckStatusKost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:checking-kost-available';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Used for checking kost status every hour';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::beginTransaction();
        try {
            $allKost = Kost::get();

            foreach ($allKost as $kost) {
                $allKamarData = KamarKost::where('kost_id', $kost['id'])
                    ->where('status', \true)->count();
                if ($allKamarData <= 0) {
                    $kost->update('status', \false);
                    KostMongoDB::where('id_postgre', $kost['id'])->update('status', \false);
                }
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();

        return 0;
    }
}
