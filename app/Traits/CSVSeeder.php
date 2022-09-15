<?php

namespace App\Traits;

trait CSVSeeder {
    public function csv_to_array($filename = '', $delimiter = '	') {
        if (!file_exists($filename) || !is_readable($filename))
            return FALSE;
        $header = [];
        $data = array();
        if (($handle = fopen($filename, 'r')) !== FALSE) {
            while (($row = fgetcsv($handle, null, $delimiter)) !== FALSE) {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }
        return $data;
    }
}
