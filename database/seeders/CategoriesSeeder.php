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
            ['name' => 'Education'],
            ['name' => 'Entertainment'],
            ['name' => 'Technology'],
            ['name' => 'Sports'],
            ['name' => 'Politics'],
            ['name' => 'Health'],
            ['name' => 'Travel'],
            ['name' => 'Food'],
            ['name' => 'Lifestyle'],
            ['name' => 'Business']
        ]);
    }
}
