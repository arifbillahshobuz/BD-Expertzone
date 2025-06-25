<?php

namespace Database\Seeders;

use App\Models\Reaction;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reactions = [
            [
                'name' => 'like',
                'display_name' => 'Like',
                'icon_path' => 'frontend/assets/images/icon/01.png'
            ],
            [
                'name' => 'love',
                'display_name' => 'Love',
                'icon_path' => 'frontend/assets/images/icon/02.png'
            ],
            [
                'name' => 'happy',
                'display_name' => 'Happy',
                'icon_path' => 'frontend/assets/images/icon/03.png'
            ],
            [
                'name' => 'haha',
                'display_name' => 'HaHa',
                'icon_path' => 'frontend/assets/images/icon/04.png'
            ],
            [
                'name' => 'think',
                'display_name' => 'Think',
                'icon_path' => 'frontend/assets/images/icon/05.png'
            ],
            [
                'name' => 'sad',
                'display_name' => 'Sad',
                'icon_path' => 'frontend/assets/images/icon/06.png'
            ],
            [
                'name' => 'lovely',
                'display_name' => 'Lovely',
                'icon_path' => 'frontend/assets/images/icon/07.png'
            ],
        ];

        foreach ($reactions as $reaction) {
            Reaction::create($reaction);
        }
    }
}
