<?php

namespace Database\Seeders;

use App\Models\Admin\BusinessSetting;
use Illuminate\Database\Seeder;

class GlobalDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Global Data
        $globalData = array(
            'website_name' => 'Laravel V8',
            'phone' => '01234567896',
            'email' => 'info@nexxoom.com',
            'address' => 'Dhaka 1216, Bangladesh',            
            'copyright' => 'NexXoom',
        );
        foreach ($globalData as $key => $value) {
            BusinessSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
}
