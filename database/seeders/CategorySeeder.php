<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'News',
                'slug' => 'news',
                'description' => 'Latest news and updates',
                'color' => '#3b82f6',
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'name' => 'Technology',
                'slug' => 'technology',
                'description' => 'Technology articles and reviews',
                'color' => '#10b981',
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'name' => 'Sports',
                'slug' => 'sports',
                'description' => 'Sports news and analysis',
                'color' => '#ef4444',
                'is_featured' => true,
                'order' => 3,
            ],
            [
                'name' => 'Entertainment',
                'slug' => 'entertainment',
                'description' => 'Entertainment and celebrity news',
                'color' => '#f59e0b',
                'is_featured' => true,
                'order' => 4,
            ],
            [
                'name' => 'Lifestyle',
                'slug' => 'lifestyle',
                'description' => 'Lifestyle, health and wellness',
                'color' => '#8b5cf6',
                'is_featured' => false,
                'order' => 5,
            ],
            [
                'name' => 'Business',
                'slug' => 'business',
                'description' => 'Business and finance news',
                'color' => '#64748b',
                'is_featured' => false,
                'order' => 6,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Create subcategories
        $subcategories = [
            [
                'name' => 'Mobile',
                'slug' => 'mobile',
                'description' => 'Mobile technology news and reviews',
                'parent_id' => Category::where('slug', 'technology')->first()->id,
                'color' => '#06b6d4',
                'order' => 1,
            ],
            [
                'name' => 'Software',
                'slug' => 'software',
                'description' => 'Software news and reviews',
                'parent_id' => Category::where('slug', 'technology')->first()->id,
                'color' => '#6366f1',
                'order' => 2,
            ],
            [
                'name' => 'Football',
                'slug' => 'football',
                'description' => 'Football news and analysis',
                'parent_id' => Category::where('slug', 'sports')->first()->id,
                'color' => '#22c55e',
                'order' => 1,
            ],
            [
                'name' => 'Basketball',
                'slug' => 'basketball',
                'description' => 'Basketball news and analysis',
                'parent_id' => Category::where('slug', 'sports')->first()->id,
                'color' => '#f97316',
                'order' => 2,
            ],
            [
                'name' => 'Movies',
                'slug' => 'movies',
                'description' => 'Movie reviews and news',
                'parent_id' => Category::where('slug', 'entertainment')->first()->id,
                'color' => '#ec4899',
                'order' => 1,
            ],
            [
                'name' => 'Music',
                'slug' => 'music',
                'description' => 'Music reviews and news',
                'parent_id' => Category::where('slug', 'entertainment')->first()->id,
                'color' => '#a855f7',
                'order' => 2,
            ],
        ];

        foreach ($subcategories as $subcategory) {
            Category::create($subcategory);
        }
    }
}