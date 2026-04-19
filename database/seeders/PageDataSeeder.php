<?php

namespace Database\Seeders;

use App\Models\Admin\BusinessSetting;
use App\Models\Page;
use Illuminate\Database\Seeder;

class PageDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
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
                'title' => 'Rooms',
                'slug' => 'rooms',
            ],
            [
                'title' => 'Project Progress',
                'slug' => 'project-progress',
            ],
        );
        foreach ($pages as $page) {
            Page::firstOrCreate(
                ['slug' => $page['slug']], // ✅ correct
                $page // ✅ direct pass
            );
        }
    }
}
