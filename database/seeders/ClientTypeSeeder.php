<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClientTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('client_types')->insert([
            [
                'client_type' => 'Individual Clients',
                'status' => true,
            ],
            [
                'client_type' => 'Small and Medium-sized Enterprises (SMEs)',
                'status' => true,
            ],
            [
                'client_type' => 'Corporate Clients',
                'status' => true,
            ],
            [
                'client_type' => 'Multinational Corporations',
                'status' => true,
            ],
            [
                'client_type' => 'Large Enterprises',
                'status' => true,
            ],
            [
                'client_type' => 'Non-Profit Organizations',
                'status' => true,
            ],
            [
                'client_type' => 'Government and Public Sector',
                'status' => true,
            ],
            [
                'client_type' => 'Educational Institutions',
                'status' => true,
            ],
            [
                'client_type' => 'Healthcare Providers',
                'status' => true,
            ],
            [
                'client_type' => 'E-commerce',
                'status' => true,
            ],
            [
                'client_type' => 'Technology Companies',
                'status' => true,
            ],
            [
                'client_type' => 'Financial Institutions',
                'status' => true,
            ],
            [
                'client_type' => 'Manufacturing and Logistics',
                'status' => true,
            ],
            [
                'client_type' => 'Entertainment and Media',
                'status' => true,
            ],
            [
                'client_type' => 'Research and Development Clients',
                'status' => true,
            ],
            [
                'client_type' => 'B2B Clients',
                'status' => true,
            ],
            [
                'client_type' => 'On-demand Clients',
                'status' => true,
            ],
            [
                'client_type' => 'Agencies',
                'status' => true,
            ],
        ]);

    }
}
