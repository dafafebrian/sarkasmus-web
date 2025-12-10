<?php

namespace Database\Seeders;

use App\Models\Meme;
use App\Models\User;
use Illuminate\Database\Seeder;

class MemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        if (! $user) {
            $user = User::factory()->create([
                'name' => 'Demo User',
                'email' => 'demo@example.com',
            ]);
        }

        $memes = [
            [
                'image_path' => 'https://i.imgur.com/8pQZ6YF.jpeg',
                'caption' => 'When the code finally runs without errors',
            ],
            [
                'image_path' => 'https://i.imgur.com/2nCt3Sbl.jpg',
                'caption' => 'Debugging mood: coffee + memes',
            ],
        ];

        foreach ($memes as $m) {
            Meme::create([
                'user_id' => $user->id,
                'image_path' => $m['image_path'],
                'caption' => $m['caption'],
                'likes_count' => 0,
                'comments_count' => 0,
            ]);
        }
    }
}
