<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('relations')->insert([
            [
                'name' => 'Father',
                'status' => true,
            ],
            [
                'name' => 'Mother',
                'status' => true,
            ],
            [
                'name' => 'Sister',
                'status' => true,
            ],
            [
                'name' => 'Brother',
                'status' => true,
            ],
            [
                'name' => 'Uncle',
                'status' => true,
            ],
            [
                'name' => 'Aunt',
                'status' => true,
            ],
        ]);
    }
}
