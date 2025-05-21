<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Education', 'status' => 1],
            ['name' => 'Entertainment', 'status' => 3],
            ['name' => 'Technology', 'status' => 4],
            ['name' => 'Sports', 'status' => 5],
            ['name' => 'Politics', 'status' => 62],
            ['name' => 'Health', 'status' => 2],
            ['name' => 'Travel', 'status' => 8],
            ['name' => 'Food', 'status' => 1],
            ['name' => 'Lifestyle', 'status' => 1],
            ['name' => 'Business', 'status' => 1],
        ]);
    }
}
