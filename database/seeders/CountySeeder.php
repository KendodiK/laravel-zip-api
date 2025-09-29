<?php

namespace Database\Seeders;

use App\Models\County;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;

class CountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file_handle = fopen(database_path("iranyitoszamok.csv"), "r");
        $i = 0;
        $uniqueNames = [];
        while (($line = fgetcsv($file_handle, 1000, ";")) !== false) {
            if ($i > 1 && $line[2] != "") {
                if (!in_array($line[2], $uniqueNames)) {
                    $uniqueNames[] = $line[2];
                }
            }
            $i++;
        }
        fclose($file_handle);

        foreach ($uniqueNames as $countyName) {
            County::create([
                'name' => $countyName
            ]);
        }
    }
}
