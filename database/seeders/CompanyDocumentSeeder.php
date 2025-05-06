<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\SystemConfiguration\CompanyDocument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanyDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyDocument::updateOrCreate(
            ['id' => 1],
            [
                'company_information_id' => 1,
                'letterhead_vertical' => '',
                'invoice_vertical' => '',
                'money_receipt_vertical' => '',
                'letterhead_horizontal' => '',
                'invoice_horizontal' => '',
                'money_receipt_horizontal' => '',
            ]
        );
    }
}
