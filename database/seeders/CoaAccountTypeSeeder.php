<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CoaAccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('coa_account_types')->insert([
            [
                'account_type' => 'Asset',
                'status' => true,
            ],
            [
                'account_type' => 'Liability',
                'status' => true,
            ],
            [
                'account_type' => 'Equity',
                'status' => true,
            ],
            [
                'account_type' => 'Income',
                'status' => true,
            ],
            [
                'account_type' => 'Expense',
                'status' => true,
            ],
            [
                'account_type' => 'Revenue',
                'status' => true,
            ],
        ]);
    }
}
