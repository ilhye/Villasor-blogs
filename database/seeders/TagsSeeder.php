<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
            ['name' => 'Funny', 'created_at' => now()],
            ['name' => 'Informative', 'created_at' => now()],
            ['name' => 'Technology', 'created_at' => now()],
            ['name' => 'Scary', 'created_at' => now()],
            ['name' => 'Adventure', 'created_at' => now()],
            ['name' => 'Travel', 'created_at' => now()],
            ['name' => 'Food', 'created_at' => now()],
            ['name' => 'Entertainment', 'created_at' => now()],
            ['name' => 'Fashion', 'created_at' => now()],
            ['name' => 'Music', 'created_at' => now()],
            ['name' => 'Art', 'created_at' => now()],
            ['name' => 'Politics', 'created_at' => now()],
        ]);
    }
}
