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
            'categories_id' => 1,
            'author' => 'John Doe',
            'created_at' => '05/10/2024',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nibh mauris, interdum ac tellus vitae, gravida dapibus felis. Ut dictum non magna id aliquet. Phasellus luctus vestibulum quam, at consectetur nisi. Suspendisse ligula dui, eleifend quis pulvinar sit amet, eleifend ac turpis. Proin sem quam, sollicitudin luctus sapien sit amet, sagittis molestie erat.',
            'status_id' => 1
        ]);
    }
}
