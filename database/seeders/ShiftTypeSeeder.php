<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShiftTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shift_types')->insert([
            [
                'name' => 'Day',
                'status' => true,
            ],
            [
                'name' => 'Night',
                'status' => true,
            ],
            [
                'name' => 'Morning',
                'status' => true,
            ],
        ]);
    }
}
