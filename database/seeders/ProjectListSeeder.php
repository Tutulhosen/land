<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('project_lists')->insert([
            [
                'name' => 'Project - 1',
                'status' => true,
            ],
            [
                'name' => 'Project - 2',
                'status' => true,
            ],
            [
                'name' => 'Project - 3',
                'status' => true,
            ],
        ]);
    }
}
