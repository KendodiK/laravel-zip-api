<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\County;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file_handle = fopen(database_path("iranyitoszamok.csv"), "r");
        $i = 0;
        while (($line = fgetcsv($file_handle, 1000, ";")) !== false) {
            if ($i > 1 && $line[0] != "" && $line[1] != "") {
                $data[] = $line;
            }
            $i++;
        }
        fclose($file_handle);

        $counties = County::all();

        foreach ($data as $cityData) {
            $countyId = 0;
            foreach ($counties as $county) {
                if ($cityData[2] == $county->name) {
                    $countyId = $county->id;
                }
            }
            City::create([
                'postalCode' => $cityData[0],
                'name' => $cityData[1],
                'countyId' => $countyId,
            ]);
        }
    }
}
