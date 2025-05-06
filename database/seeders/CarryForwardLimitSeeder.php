<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarryForwardLimitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            DB::table('carry_forward_limits')->insert([
                [
                    'name' => 'Allowed Upto 10 Days',
                    'status' => true,
                ],

            ]);

    }
}
