<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Technology',
            'Health & Wellness',
            'Lifestyle',
            'Travel',
            'Food & Recipes',
            'Business & Finance',
            'Education & Learning',
            'Entertainment',
            'Science & Nature',
            'Sports & Fitness',
            'Personal Development',
            'Fashion & Beauty',
            'Parenting & Family',
            'Gaming',
            'History & Culture',
            'News & Politics',
            'DIY & Crafts',
            'Automotive',
            'Photography',
            'Relationships & Dating'
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'slug' => Str::slug($category),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
