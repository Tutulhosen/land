<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notification_periods')->insert([
            [
                'name' => '30 days',
                'status' => true,
            ],
            [
                'name' => '60 days',
                'status' => true,
            ],

        ]);
    }
}
