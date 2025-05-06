<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('education')->insert([
            [
                'name' => 'JSC',
                'status' => true,
            ],
            [
                'name' => 'SSC',
                'status' => true,
            ],
            [
                'name' => 'HSC',
                'status' => true,
            ],
            [
                'name' => 'Under Graduate',
                'status' => true,
            ],
            [
                'name' => 'Graduate',
                'status' => true,
            ],
        ]);
    }
}
