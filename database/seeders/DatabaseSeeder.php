<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CoaAccountType;
use App\Models\District;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            DivisionSeeder::class,
            DistrictSeeder::class,
            UpazilaSeeder::class,
            CoaAccountTypeSeeder::class,
            BankAccountTypeSeeder::class,
            ClientTypeSeeder::class,
            IndustrySeeder::class,
            CompanyInformationSeeder::class,
            ContactInformationSeeder::class,
            BrandSettingSeeder::class,
            ApplicationSettingSeeder::class,
            ProjectTypeSeeder::class,
            ProductCategorySeeder::class,
            RenewalTypeSeeder::class,
            WarrantyPeriodSeeder::class,
            ProjectPrioritySeeder::class,
            ProjectStatusSeeder::class,
            RelationSeeder::class,
            OccupationSeeder::class,
            SalutationSeeder::class,
            // GradeSeeder::class,
            EmployeeTypeSeeder::class,
            ProjectListSeeder::class,
            TaskPrioritySeeder::class,
            LeadTypeSeeder::class,
            ShiftTypeSeeder::class,
            HolidayTypeSeeder::class,
            LeaveTypeSeeder::class,
            UserTypeSeeder::class,
            GenderSeeder::class,
            NationalitySeeder::class,
            BloodGroupSeeder::class,
            WeekOffSeeder::class,
            LeaveQuotaSeeder::class,
            CarryForwardLimitSeeder::class,
            NotificationPeriodSeeder::class,
            LeaveDurationSeeder::class,
            CompanyDocumentSeeder::class,
            ProbationPeriodSeeder::class,
            EducationSeeder::class,
            EducationTypeSeeder::class,
            ReligionSeeder::class,
            RolePermissionSeeder::class,
            EducationSubjectSeeder::class,
            EducationBoardSeeder::class,
        ]);
    }
}
