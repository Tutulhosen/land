<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grades')->insert([
        [
            'name' => 'First Grade',
            'status' => true,
        ],
        [
            'name' => 'Second Grade',
            'status' => true,
        ],
        [
            'name' => 'Third Grade',
            'status' => true,
        ],
        [
            'name' => 'Fourth Grade',
            'status' => true,
        ],
        [
            'name' => 'Fifth Grade',
            'status' => true,
        ],
        [
            'name' => 'Sixth Grade',
            'status' => true,
        ],
        [
            'name' => 'Seventh Grade',
            'status' => true,
        ],
        [
            'name' => 'Eighth Grade',
            'status' => true,
        ],
        [
            'name' => 'Ninth Grade',
            'status' => true,
        ],
        [
            'name' => 'Tenth Grade',
            'status' => true,
        ],
        ]);

    }
}
