<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\SystemConfiguration\BrandSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BrandSetting::updateOrCreate(
            ['id' => 1],
            [
                'company_information_id' => 1,
                'main_logo' => '',
                'alternative_logo' => '',
                'favicon' => '',
            ]
        );
    }
}
