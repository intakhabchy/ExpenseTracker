<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['category_type_id' => 1, 'category_name' => 'Food', 'created_by' => 1],
            ['category_type_id' => 1, 'category_name' => 'Transport', 'created_by' => 1],
            ['category_type_id' => 1, 'category_name' => 'Utilities', 'created_by' => 1],
            ['category_type_id' => 2, 'category_name' => 'Salary', 'created_by' => 1],
            ['category_type_id' => 2, 'category_name' => 'Freelance', 'created_by' => 1],
            ['category_type_id' => 2, 'category_name' => 'Investments', 'created_by' => 1],
        ]);
    }
}
