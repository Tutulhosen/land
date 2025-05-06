<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProbationPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('probation_periods')->insert([
            [
                'name' => '1 Month',
                'status' => true,
            ],
            [
                'name' => '2 Months',
                'status' => true,
            ],
            [
                'name' => '3 Months',
                'status' => true,
            ],
            [
                'name' => '4 Months',
                'status' => true,
            ],
            [
                'name' => '5 Months',
                'status' => true,
            ],
            [
                'name' => '6 Months',
                'status' => true,
            ],
            [
                'name' => '7 Months',
                'status' => true,
            ],
        ]);
    }
}
