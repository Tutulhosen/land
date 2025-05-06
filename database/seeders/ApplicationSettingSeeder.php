<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin\SystemConfiguration\ApplicationSetting;

class ApplicationSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ApplicationSetting::updateOrCreate(
            ['id' => 1],
            [
                'company_information_id' => 1,
                'application_title' => 'My Application',
                'copyright_text' => '© 2025 My Company',
                'date_format' => 'dd-mm-yyyy',
                'time_format' => '24',
            ]
        );
    }
}
