<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('project_types')->insert([
            [
                'name' => 'Type - 1',
                'status' => true,
            ],
            [
                'name' => 'Type - 2',
                'status' => true,
            ],
            [
                'name' => 'Type - 3',
                'status' => true,
            ],
            [
                'name' => 'Type-4',
                'status' => true,
            ],
        ]);

    }
}
