<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Sipil',
                'slug' => 'sipil'
            ],
            [
                'name' => 'Mekanik dan Elektrikal',
                'slug' => 'mekanik-dan-elektrikal'
            ],
            [
                'name' => 'IT',
                'slug' => 'it'
            ],
            [
                'name' => 'Audio/Video',
                'slug' => 'audio-Video'
            ],
            [
                'name' => 'Lain-lain',
                'slug' => 'lain-lain'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
