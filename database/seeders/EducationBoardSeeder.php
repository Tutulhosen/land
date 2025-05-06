<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EducationBoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $boards = [
            'Dhaka Board',
            'Chattogram Board',
            'Rajshahi Board',
            'Khulna Board',
            'Barishal Board',
            'Sylhet Board',
            'Comilla Board',
            'Dinajpur Board',
            'Mymensingh Board',
            'Bangladesh Madrasah Board',
            'Bangladesh Technical Education Board (BTEB)',
            'Cambridge International Examinations (O/A Levels - British Curriculum)',
            'Edexcel Pearson (O/A Levels - British Curriculum)',
            'International Baccalaureate (IB)',
        ];

        foreach ($boards as $board) {
            DB::table('education_boards')->insert([
                'name' => $board,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
