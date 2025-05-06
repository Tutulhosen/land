<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EducationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('education_types')->insert([
            [
                'name' => 'General Education',
                'status' => true,
            ],
            [
                'name' => 'Madrasa Education',
                'status' => true,
            ],
            [
                'name' => 'Technical and Vocational Education',
                'status' => true,
            ],
        ]);
    }
}
