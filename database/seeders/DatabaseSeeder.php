<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create();

        \App\Models\Product::factory()->create(
        [
            'user_id' => '1',
            'title' => 'Test',
            'tags' => 'laravel, api, backend',
            'company' => 'my company',
            'logo' => '',
            'email' => 'test@gmail.com',
            'website' => 'test.com',
            'location' => 'Hanoi',
            'description' => 'have a great day',
        ]);
    }
}
