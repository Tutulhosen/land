<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RenewalTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('renewal_types')->insert([
            [
                'name' => 'Weekly',
                'status' => true,
            ],
            [
                'name' => 'Monthly',
                'status' => true,
            ],
            [
                'name' => 'Quarterly',
                'status' => true,
            ],
            [
                'name' => 'Half-Yearly',
                'status' => true,
            ],
            [
                'name' => 'Yearly',
                'status' => true,
            ],
        ]);
    }
}
