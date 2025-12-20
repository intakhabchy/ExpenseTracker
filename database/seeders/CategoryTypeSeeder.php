<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category_type')->insert([
            ['category_type_name' => 'Expense', 'created_by' => 1],
            ['category_type_name' => 'Income', 'created_by' => 1],
        ]);
    }
}
