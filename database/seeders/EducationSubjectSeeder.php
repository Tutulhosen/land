<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EducationSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $boards = [
            'Computer Science & Engineering (CSE)',
            'Electrical & Electronic Engineering (EEE)',
            'Mechanical Engineering',
            'Civil Engineering',
            'Architecture',
            'Textile Engineering',
            'Biomedical Engineering',
            'Robotics & Mechatronics Engineering',
            'Genetic Engineering & Biotechnology',
            'Information & Communication Technology (ICT)',
            'Software Engineering',
            'Environmental Science',
            'Applied Physics & Electronics',
            'Microbiology',
            'Pharmacy',
            'Mathematics',
            'Physics',
            'Chemistry',
            'Statistics',
            'Food & Nutrition Science',
            'Business Administration (BBA/MBA)',
            'Accounting & Information Systems',
            'Finance & Banking',
            'Marketing',
            'Management Studies',
            'Human Resource Management (HRM)',
            'Supply Chain Management (SCM)',
            'Tourism & Hospitality Management',
            'International Business',
            'English Language & Literature',
            'Bengali Language & Literature',
            'History',
            'Philosophy',
            'Islamic Studies',
            'World Religions & Culture',
            'Fine Arts',
            'Music',
            'Drama & Dramatics',
            'Economics',
            'Political Science',
            'Sociology',
            'Public Administration',
            'Anthropology',
            'Social Work',
            'International Relations',
            'Development Studies',
            'Criminology',
            'Women & Gender Studies',
            'Peace & Conflict Studies',
            'MBBS (Bachelor of Medicine & Surgery)',
            'Dental Surgery (BDS)',
            'Nursing',
            'Physiotherapy',
            'Public Health',
            'Nutrition & Dietetics',
            'Medical Technology',
            'Veterinary Science',
            'Bachelor of Laws (LLB)',
            'Islamic Studies',
            'Shariah & Islamic Law',
            'Agriculture',
            'Forestry',
            'Fisheries',
            'Environmental Science & Management',
            'Rural Development',
        ];

        foreach ($boards as $board) {
            DB::table('education_subjects')->insert([
                'name' => $board,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
