<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Only create the profile if none exists, so redeploys never overwrite your edits
        if (Profile::count() === 0) {
            Profile::create([
                'full_name'       => 'Your Full Name',
                'course'          => 'Your Course',
                'year_section'    => 'Your Year & Section',
                'motto'           => 'Your motto here',
                'bible_verse'     => 'Your verse here',
                'bible_verse_ref' => 'Book 1:1',
                'facebook_url'    => null,
                'email'           => null,
                'github_url'      => 'https://github.com/CDLacerna-art',
                'gcash_name'      => null,
                'gcash_number'    => null,
            ]);
        }
    }
}