<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Event;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('asdfasdf'),
        ]);

        Event::factory()->count(10)->create();

        $categories = [
            [
                'name' => 'Technology',
                'color' => '#3498db'
            ],
            [
                'name' => 'Health',
                'color' => '#2ecc71'
            ],
            [
                'name' => 'Education',
                'color' => '#e74c3c'
            ],
            [
                'name' => 'Sports',
                'color' => '#f1c40f'],
            [
                'name' => 'Travel',
                'color' => null
            ],
            [
                'name' => 'Food',
                'color' => '#8e44ad'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

    }
}
