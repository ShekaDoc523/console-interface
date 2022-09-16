<?php

namespace Database\Seeders;

use App\Models\MsXbox;
use App\Models\MsXboxDlc;
use App\Traits\CSVSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MsSqlDlcTableSeeder extends Seeder
{
    use CSVSeeder;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile=__DIR__.'/../xbox_dlc.csv';
        $data = $this->csv_to_array($csvFile);
        collect($data)->chunk(100)->each( function($items){
            MsXboxDlc::insert($items->toArray());
        });
    }
}
