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
                'title' => 'Project Progress',
                'slug' => 'project-progress',
            ],
            [
                'title' => 'Gallery',
                'slug' => 'gallery',
            ],
            [
                'title' => 'Contact Us',
                'slug' => 'contact-us',
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
