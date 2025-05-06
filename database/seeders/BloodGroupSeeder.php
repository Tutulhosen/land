<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BloodGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blood_groups')->insert([
            [
                'name' => 'A+',
                'status' => true,
            ],
            [
                'name' => 'A-',
                'status' => true,
            ],
            [
                'name' => 'B+',
                'status' => true,
            ],
            [
                'name' => 'B-',
                'status' => true,
            ],
            [
                'name' => 'O+',
                'status' => true,
            ],
            [
                'name' => 'O-',
                'status' => true,
            ],
            [
                'name' => 'AB+',
                'status' => true,
            ],
            [
                'name' => 'AB-',
                'status' => true,
            ],
        ]);
    }
}
