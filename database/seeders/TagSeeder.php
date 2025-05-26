<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            [
                'name' => 'COVID-19',
                'slug' => 'covid-19',
                'description' => 'News and updates about the coronavirus pandemic',
            ],
            [
                'name' => 'Politics',
                'slug' => 'politics',
                'description' => 'Political news and developments',
            ],
            [
                'name' => 'Environment',
                'slug' => 'environment',
                'description' => 'Climate change and environmental issues',
            ],
            [
                'name' => 'Education',
                'slug' => 'education',
                'description' => 'News and articles about education',
            ],
            [
                'name' => 'Science',
                'slug' => 'science',
                'description' => 'Scientific discoveries and research',
            ],
            [
                'name' => 'Health',
                'slug' => 'health',
                'description' => 'Health and medical news',
            ],
            [
                'name' => 'AI',
                'slug' => 'ai',
                'description' => 'Artificial intelligence news and developments',
            ],
            [
                'name' => 'Blockchain',
                'slug' => 'blockchain',
                'description' => 'Blockchain and cryptocurrency news',
            ],
            [
                'name' => 'Economy',
                'slug' => 'economy',
                'description' => 'Economic news and analysis',
            ],
            [
                'name' => 'Travel',
                'slug' => 'travel',
                'description' => 'Travel guides and tips',
            ],
            [
                'name' => 'Fashion',
                'slug' => 'fashion',
                'description' => 'Fashion trends and news',
            ],
            [
                'name' => 'Food',
                'slug' => 'food',
                'description' => 'Food recipes and culinary news',
            ],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}