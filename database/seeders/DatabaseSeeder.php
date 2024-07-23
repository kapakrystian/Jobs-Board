<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Tag;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create();

        // User::factory()->create([
        //     'first_name' => 'John',
        //     'last_name' => 'Doe',
        //     'email' => 'johndoe@example.com',
        // ]);

        Employer::factory(30)->create();
        $this->call(JobSeeder::class);
        Post::factory(100)->create();
        Comment::factory(200)->create();
        Tag::factory(40)->create();
    }
}
