<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('task_priorities')->insert([
            [
                'name' => 'High',
                'status' => true,
            ],
            [
                'name' => 'Low',
                'status' => true,
            ],
        ]);
    }
}
