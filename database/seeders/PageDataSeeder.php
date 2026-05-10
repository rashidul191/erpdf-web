<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        // Global Data
        $pages = array(
            [
                'title' => 'News',
                'slug' => 'news',
            ],
            [
                'title' => 'Term Member',
                'slug' => 'team-member',
            ],
            [
                'title' => 'About Us',
                'slug' => 'about-us',
            ],
            [
                'title' => 'Contact Us',
                'slug' => 'contact-us',
            ],
            [
                'title' => 'Gallery',
                'slug' => 'gallery',
            ],
            [
                'title' => 'FAQ',
                'slug' => 'faq',
            ],

        );
        foreach ($pages as $page) {
            Page::firstOrCreate(
                ['slug' => $page['slug']],
                $page
            );
        }
    }
}
