<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeaveDurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('leave_durations')->insert([
            [
                'name' => 'Full Day',
                'status' => true,
            ],
            [
                'name' => 'First Half',
                'status' => true,
            ],
            [
                'name' => 'Second Half',
                'status' => true,
            ],

        ]);
    }
}
