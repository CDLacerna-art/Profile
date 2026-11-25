<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Profile::firstOrCreate(
            ['id' => 1],
            [
                'name' => 'Your Name',
                // add the other columns your profile table has
            ]
        );
    }
}