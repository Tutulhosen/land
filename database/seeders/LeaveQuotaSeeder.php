<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LeaveQuotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('leave_quotas')->insert([
            [
                'name' => '15 days',
                'status' => true,
            ],
            [
                'name' => '30 days',
                'status' => true,
            ],
        ]);
    }
}
