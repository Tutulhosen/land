<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin\SystemConfiguration\CompanyInformation;

class CompanyInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyInformation::updateOrCreate(
            ['id' => 1],
            [
                'company_name' => 'Your Company Name',
                'address' => '522/B (3rd Floor)',
                'district_id' => 1,
                'upazila_id' => 497,
                'zip_code' => '1212',
                'timezone' => 'UTC+06:00',
                'working_days' => ["Saturday","Sunday","Monday","Tuesday","Wednesday"],
                'office_start_time' => '10:00 AM',
                'office_end_time' => '06:00 PM',
                'company_registration_number' => 'REG-123456',
                'trade_license_number' => 'TL-123456',
                'bin_vat_number' => 'BIN-123456',
            ]
        );
    }
}
