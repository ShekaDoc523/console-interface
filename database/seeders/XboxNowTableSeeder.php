<?php

namespace Database\Seeders;

use App\Models\MsXbox;
use App\Models\MsXboxDlc;
use App\Models\XboxNow;
use App\Traits\CSVSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class XboxNowTableSeeder extends Seeder
{
    use CSVSeeder;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile=__DIR__.'/../xbox_now.csv';
        $data = $this->csv_to_array($csvFile);
        collect($data)->chunk(10)->each( function($items){
            try{
            XboxNow::insert($items->toArray());
            }catch (\Throwable $t){
                dd($t->getMessage());
            }
        });
    }
}
