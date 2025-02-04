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
        Category::insert([
            ['name' => 'Resep Masakan', 'slug' => 'resep-masakan'],
            ['name' => 'Review Makanan & Restoran', 'slug' => 'review-makanan-restoran'],
            ['name' => 'Makanan Sehat & Diet', 'slug' => 'makanan-sehat-diet'],
            ['name' => 'Kuliner Tradisional', 'slug' => 'kuliner-tradisional'],
            ['name' => 'Kuliner Internasional', 'slug' => 'kuliner-internasional'],
            ['name' => 'Tips Memasak', 'slug' => 'tips-memasak'],
            ['name' => 'Bahan Makanan & Manfaatnya', 'slug' => 'bahan-makanan-manfaat'],
            ['name' => 'Makanan dan Gaya Hidup', 'slug' => 'makanan-gaya-hidup'],
            ['name' => 'Trend Kuliner', 'slug' => 'trend-kuliner'],
            ['name' => 'Minuman & Kopi', 'slug' => 'minuman-kopi'],
            ['name' => 'Bisnis Kuliner', 'slug' => 'bisnis-kuliner'],
            ['name' => 'Lainnya', 'slug' => 'lainnya'],
        ]);
    }
}
