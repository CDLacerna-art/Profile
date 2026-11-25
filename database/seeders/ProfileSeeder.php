<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        if (Profile::count() > 0) {
            return;
        }

        Profile::create([
            'full_name'       => 'Carl Daniel Lacerna',
            'course'          => 'Associate in Information Systems',
            'year_section'    => '2nd Year - 2B',
            'motto'           => 'Write your motto here. You can change it on the Edit Profile page.',
            'bible_verse'     => 'I can do all things through Christ which strengtheneth me.',
            'bible_verse_ref' => 'Philippians 4:13 (KJV)',
            'facebook_url'    => 'https://www.facebook.com/',
            'email'           => 'yourname@gmail.com',
            'github_url'      => 'https://github.com/',
            'gcash_name'      => 'Carl Daniel L.',
            'gcash_number'    => '09XX XXX XXXX',
        ]);
    }
}
