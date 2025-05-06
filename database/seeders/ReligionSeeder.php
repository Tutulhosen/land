<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('religions')->insert([
            [
                'name' => 'Islam',
                'status' => true,
            ],
            [
                'name' => 'Hinduism',
                'status' => true,
            ],
            [
                'name' => 'Christianity',
                'status' => true,
            ],
            
        ]);
    }
}
