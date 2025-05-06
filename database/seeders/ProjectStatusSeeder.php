<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('project_statuses')->insert([
            [
                'name' => 'Requirement Gathering Phase',
                'status' => true,
            ],
            [
                'name' => 'Feasibility Analysis Phase',
                'status' => true,
            ],
            [
                'name' => 'Architecture Design Phase',
                'status' => true,
            ],
            [
                'name' => 'UI/UX Wireframe Development Phase',
                'status' => true,
            ],
            [
                'name' => 'Database Design and Setup Phase',
                'status' => true,
            ],
            [
                'name' => 'Frontend Development Phase',
                'status' => true,
            ],
            [
                'name' => 'Backend Development Phase',
                'status' => true,
            ],
            [
                'name' => 'Unit Testing Phase',
                'status' => true,
            ],
            [
                'name' => 'System Integration Testing Phase',
                'status' => true,
            ],
            [
                'name' => 'Cross-Browser and Cross-Device Testing Phase',
                'status' => true,
            ],
            [
                'name' => 'Performance Testing Phase',
                'status' => true,
            ],
            [
                'name' => 'Security Testing Phase',
                'status' => true,
            ],
            [
                'name' => 'Beta Release Phase',
                'status' => true,
            ],
            [
                'name' => 'Production Deployment Phase',
                'status' => true,
            ],
            [
                'name' => 'Post-Deployment Monitoring Phase',
                'status' => true,
            ],
            [
                'name' => 'Client Feedback and Revision Phase',
                'status' => true,
            ],
            [
                'name' => 'User Manual Documentation Phase ',
                'status' => true,
            ],
            [
                'name' => 'Requirements Correction',
                'status' => true,
            ],
            [
                'name' => 'Maintenance and Support Phase',
                'status' => true,
            ],
            [
                'name' => 'Scalability and Optimization Phase',
                'status' => true,
            ],
            [
                'name' => 'Feature Enhancement Phase',
                'status' => true,
            ],
            [
                'name' => 'Add new features based on user feedback',
                'status' => true,
            ],
            [
                'name' => 'Finalizing Documentation and Deliverables',
                'status' => true,
            ],
            [
                'name' => 'Deploy the app on live servers',
                'status' => true,
            ],
            [
                'name' => 'Deploying the software to Live Server',
                'status' => true,
            ],
            [
                'name' => 'Fixing bugs and improving performance',
                'status' => true,
            ],
            [
                'name' => 'Preparing deployment documentation and release notes',
                'status' => true,
            ],
            [
                'name' => 'Gathering feedback from users',
                'status' => true,
            ],
            [
                'name' => 'Client Training Phase',
                'status' => true,
            ],
            [
                'name' => 'Data Migration Phase',
                'status' => true,
            ],
            [
                'name' => 'Migrate data from old system',
                'status' => true,
            ],
            [
                'name' => 'Maintenance and Support Phase',
                'status' => true,
            ],
            [
                'name' => 'Post-Deployment Adjustments',
                'status' => true,
            ],
            [
                'name' => 'Extended Delivery Period',
                'status' => true,
            ],
            [
                'name' => 'Delivery Pending Final Client Approval Phase',
                'status' => true,
            ],
            [
                'name' => 'Delivery Pending Final Adjustments Phase',
                'status' => true,
            ],
            [
                'name' => 'Delayed Delivery Phase',
                'status' => true,
            ],
            [
                'name' => 'On Track for Delivery Phase',
                'status' => true,
            ],
            [
                'name' => 'Final Delivery Phase',
                'status' => true,
            ],
            [
                'name' => 'Delivery Postponed',
                'status' => true,
            ],
            [
                'name' => 'Client Approval Pending Phase',
                'status' => true,
            ],
            [
                'name' => 'Project Completed, Awaiting Client Confirmation Phase',
                'status' => true,
            ],
            [
                'name' => 'Delivery Pending Due to Technical Issues',
                'status' => true,
            ],
            [
                'name' => 'Immediate Post-Delivery Fixes Phase',
                'status' => true,
            ],
            [
                'name' => 'Pending Delivery Due to Resource Constraints',
                'status' => true,
            ],
            [
                'name' => 'Delivery Ready, Awaiting Final Checks Phase',
                'status' => true,
            ],
        ]);
    }
}
