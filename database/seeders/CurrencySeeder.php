<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('currency')->insert([
            ['currency_name' => 'BDT', 'created_by' => 1],
            ['currency_name' => 'USD', 'created_by' => 1],
            ['currency_name' => 'EUR', 'created_by' => 1],
            ['currency_name' => 'GBP', 'created_by' => 1],
            ['currency_name' => 'JPY', 'created_by' => 1],
            ['currency_name' => 'AUD', 'created_by' => 1],
        ]);
    }
}
