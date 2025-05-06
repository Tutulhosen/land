<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BankAccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bank_account_types')->insert([
            [
                'account_type' => 'Saving',
                'status' => true,
            ],
            [
                'account_type' => 'Current',
                'status' => true,
            ],
            [
                'account_type' => 'Student',
                'status' => true,
            ]
        ]);
    }
}
