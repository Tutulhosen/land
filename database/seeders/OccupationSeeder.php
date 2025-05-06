<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('occupations')->insert([
            [
                'name' => 'Architect',
                'status' => true,
            ],
            [
                'name' => 'Doctor',
                'status' => true,
            ],
            [
                'name' => 'Lawyer',
                'status' => true,
            ],
            [
                'name' => 'Nurse',
                'status' => true,
            ],
            [
                'name' => 'Salesperson',
                'status' => true,
            ],
            [
                'name' => 'Teacher',
                'status' => true,
            ],
        ]);
    }
}
