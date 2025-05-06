<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WarrantyPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('warranty_periods')->insert([
            [
                'name' => '7 days',
                'status' => true,
            ],
            [
                'name' => '10 days',
                'status' => true,
            ],
            [
                'name' => '15 days',
                'status' => true,
            ],
            [
                'name' => '30 days',
                'status' => true,
            ],
            [
                'name' => '90 days',
                'status' => true,
            ],
            [
                'name' => '180 days',
                'status' => true,
            ],
            [
                'name' => '365 days',
                'status' => true,
            ],
        ]);
    }
}
