<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('project_priorities')->insert([
            [
                'name' => 'Low Priority',
                'status' => true,
            ],
            [
                'name' => 'Norman Priority',
                'status' => true,
            ],
            [
                'name' => 'Medium Priority',
                'status' => true,
            ],
            [
                'name' => 'High Priority',
                'status' => true,
            ],
            [
                'name' => 'Top Priority',
                'status' => true,
            ],
            [
                'name' => 'Critical Priority',
                'status' => true,
            ],
            [
                'name' => 'Urgent Priority',
                'status' => true,
            ],
            [
                'name' => 'High-Level Priority',
                'status' => true,
            ],
        ]);
    }
}
