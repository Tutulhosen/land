<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WeekOffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('week_offs')->insert([
            [
                'name' => 'Friday',
                'status' => true,
            ],
            [
                'name' => 'Saturday',
                'status' => true,
            ],
            [
                'name' => 'Sunday',
                'status' => true,
            ],
        ]);
    }
}
