<?php

namespace Database\Seeders;

use App\Models\MsXbox;
use App\Traits\CSVSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MsSqlTableSeeder extends Seeder
{
    use CSVSeeder;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile=__DIR__.'/../xbox.csv';
        $data = $this->csv_to_array($csvFile);
        collect($data)->chunk(100)->each( function($items){
            MsXbox::insert($items->toArray());
        });
    }
}
