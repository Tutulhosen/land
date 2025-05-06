<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_categories')->insert([
            [
                'name' => 'Single Vendor B2c eCommerce System with (POS)',
                'status' => true,
            ],
            [
                'name' => 'Single Vendor B2c eCommerce System',
                'status' => true,
            ],
            [
                'name' => 'Inventory Management System',
                'status' => true,
            ],
            [
                'name' => 'Inventory Management System with (POS)',
                'status' => true,
            ],
            [
                'name' => 'Rental Property Management System (RPMS)',
                'status' => true,
            ],
            [
                'name' => 'Agency Portfolio Website with CMS',
                'status' => true,
            ],
            [
                'name' => 'Company Portfolio Website with CMS',
                'status' => true,
            ],
            [
                'name' => 'Charity Foundation Website with CMS',
                'status' => true,
            ],
        ]);
    }
}
