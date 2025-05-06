<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SalutationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('salutations')->insert([
            [
                'name' => 'Mr.',
                'status' => true,
            ],
            [
                'name' => 'Ms.',
                'status' => true,
            ],
            [
                'name' => 'Mrs.',
                'status' => true,
            ],
            [
                'name' => 'Dr.',
                'status' => true,
            ],
            [
                'name' => 'Engr.',
                'status' => true,
            ],
        ]);
    }
}
