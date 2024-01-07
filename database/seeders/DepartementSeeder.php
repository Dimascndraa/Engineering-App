<?php

namespace Database\Seeders;

use App\Models\Departement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departements = [
            [
                'name' => "Informasi Teknologi",
                'code' => "IT",
                'slug' => "it",
                'status' => 1
            ]
        ];

        foreach ($departements as $departement) {
            Departement::create($departement);
        }
    }
}
