<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'app_name' => 'BD-Expertzone',
            'website_name' => 'BD-Expertzone Social',
            'website_color' => '#007bff',
            'maintenance_mode' => 'off',
            'email' => 'admin@expertzone.com',
            'phone' => '+880123456789',
            'country' => 'Bangladesh',
            'timezone' => 'Asia/Dhaka',
            'header_logo' => 'uploads/settings/header_logo.png',
            'footer_logo' => 'uploads/settings/footer_logo.png',
            'favicon' => 'uploads/settings/favicon.png',
            'loading_gif' => 'uploads/settings/loader.gif',
            'app_logo' => 'uploads/settings/app_logo.png',
            
            // Section Toggles
            'show_posts' => 'on',
            'show_partners' => 'on',
            'show_friend_suggestions' => 'on',
            'show_recent_activity' => 'on',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
