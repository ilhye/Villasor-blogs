<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blogs')->insert([
            'title' => 'My First Blog',
            'description' => 'This is a description of my first blog post.',
            'image_url' => 'https://i.pinimg.com/736x/6d/54/90/6d5490c678ee1654bbfea64ed20c4751.jpg',
            'category_id' => 1,
            'created_at' => now(),
            'author_id' => 1,
            'status_id' => 1
        ]);
    }
}
