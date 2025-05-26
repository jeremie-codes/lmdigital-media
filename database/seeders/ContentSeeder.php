<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample articles
        $authorIds = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['admin', 'editor', 'author']);
        })->pluck('id')->toArray();

        $categories = Category::all();
        $tags = Tag::all();

        // Create sample articles
        for ($i = 1; $i <= 20; $i++) {
            $title = "Sample Article " . $i;
            $article = Article::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'excerpt' => "This is a sample excerpt for article $i. It provides a brief summary of the article content.",
                'content' => $this->generateLoremIpsum(5),
                'category_id' => $categories->random()->id,
                'author_id' => $authorIds[array_rand($authorIds)],
                'status' => $i <= 15 ? 'published' : 'draft',
                'is_featured' => $i <= 5,
                'allow_comments' => true,
                'published_at' => $i <= 15 ? now()->subDays(rand(1, 30)) : null,
                'reading_time' => rand(3, 15),
                'views_count' => $i <= 15 ? rand(10, 1000) : 0,
            ]);

            // Attach random tags (between 2 and 5)
            $article->tags()->attach(
                $tags->random(rand(2, 5))->pluck('id')->toArray()
            );
        }

        // Create sample pages
        $pages = [
            [
                'title' => 'About Us',
                'slug' => 'about-us',
                'content' => $this->generateLoremIpsum(3),
                'status' => 'published',
                'show_in_menu' => true,
                'order' => 1,
            ],
            [
                'title' => 'Contact',
                'slug' => 'contact',
                'content' => "<h2>Get in touch with us</h2>\n\n<p>We'd love to hear from you! Fill out the form below or send us an email at contact@example.com.</p>\n\n[Contact Form]",
                'status' => 'published',
                'show_in_menu' => true,
                'order' => 2,
            ],
            [
                'title' => 'Privacy Policy',
                'slug' => 'privacy-policy',
                'content' => $this->generateLoremIpsum(5),
                'status' => 'published',
                'show_in_menu' => true,
                'order' => 3,
            ],
            [
                'title' => 'Terms and Conditions',
                'slug' => 'terms-and-conditions',
                'content' => $this->generateLoremIpsum(7),
                'status' => 'published',
                'show_in_menu' => true,
                'order' => 4,
            ],
        ];

        $adminId = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->first()->id;

        foreach ($pages as $page) {
            Page::create([
                ...$page,
                'author_id' => $adminId,
            ]);
        }
    }

    /**
     * Generate lorem ipsum text.
     */
    private function generateLoremIpsum(int $paragraphs = 3): string
    {
        $content = '';
        
        for ($i = 0; $i < $paragraphs; $i++) {
            $content .= "<h2>Heading " . ($i + 1) . "</h2>\n\n";
            $content .= "<p>" . $this->generateParagraph(rand(5, 10)) . "</p>\n\n";
        }
        
        return $content;
    }

    /**
     * Generate a paragraph of lorem ipsum.
     */
    private function generateParagraph(int $sentences = 5): string
    {
        $loremWords = [
            "lorem", "ipsum", "dolor", "sit", "amet", "consectetur", "adipiscing", "elit",
            "sed", "do", "eiusmod", "tempor", "incididunt", "ut", "labore", "et", "dolore",
            "magna", "aliqua", "ut", "enim", "ad", "minim", "veniam", "quis", "nostrud",
            "exercitation", "ullamco", "laboris", "nisi", "ut", "aliquip", "ex", "ea", "commodo",
            "consequat", "duis", "aute", "irure", "dolor", "in", "reprehenderit", "in",
            "voluptate", "velit", "esse", "cillum", "dolore", "eu", "fugiat", "nulla",
            "pariatur", "excepteur", "sint", "occaecat", "cupidatat", "non", "proident", "sunt",
            "in", "culpa", "qui", "officia", "deserunt", "mollit", "anim", "id", "est", "laborum"
        ];
        
        $paragraph = '';
        
        for ($i = 0; $i < $sentences; $i++) {
            $sentenceLength = rand(5, 15);
            $sentence = '';
            
            for ($j = 0; $j < $sentenceLength; $j++) {
                $word = $loremWords[array_rand($loremWords)];
                $sentence .= ($j === 0) ? ucfirst($word) : $word;
                
                if ($j < $sentenceLength - 1) {
                    $sentence .= ' ';
                }
            }
            
            $paragraph .= $sentence . '. ';
        }
        
        return $paragraph;
    }
}