<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genders')->insert([
            [
                'name' => 'Male',
                'status' => true,
            ],
            [
                'name' => 'Female',
                'status' => true,
            ],
            [
                'name' => 'Others',
                'status' => true,
            ],
        ]);
    }
}
