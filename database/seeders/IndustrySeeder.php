<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('industries')->insert([
            [
                'name' => 'Government',
                'status' => true,
            ],
            [
                'name' => 'Fintech',
                'status' => true,
            ],
            [
                'name' => 'E-Com',
                'status' => true,
            ],
            [
                'name' => 'Real Estate',
                'status' => true,
            ],
            [
                'name' => 'Education',
                'status' => true,
            ],
            [
                'name' => 'Non-Profit (co-operative)',
                'status' => true,
            ],
            [
                'name' => 'Retail',
                'status' => true,
            ],
            [
                'name' => 'Startup',
                'status' => true,
            ],
            [
                'name' => 'Healthcare',
                'status' => true,
            ],
            [
                'name' => 'RMG',
                'status' => true,
            ],
            [
                'name' => 'Pharmacy',
                'status' => true,
            ],
            [
                'name' => 'Automotive',
                'status' => true,
            ],
        ]);
    }
}
