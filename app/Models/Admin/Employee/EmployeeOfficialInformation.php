<?php

namespace App\Models\Admin\Employee;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\HrAdminSetup\Department;
use App\Models\Admin\HrAdminSetup\Designation;
use App\Models\Admin\SystemConfiguration\Branch;
use App\Models\Admin\SystemConfiguration\EmployeeType;
use App\Models\Admin\SystemConfiguration\Grade;
use App\Models\Admin\SystemConfiguration\ProjectList;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class EmployeeOfficialInformation extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'emp_personal_id',
        'employee_type',
        'department_id',
        'designation_id',
        'branch_id',
        'reporting_to_first',
        'reporting_to_second',
        'reporting_to_third',
        'grade_id',
        'project_id',
        'notice_start_date',
        'notice_end_date',
        'official_phone',
        'official_email',
        'official_whatsapp',
        'user_email',
        'password',
        'login_allowed',
    ];

    public function employee()
    {
        return $this->belongsTo(EmployeePersonalInformation::class, 'emp_personal_id');
    }
    public function employeeType()
    {
        return $this->belongsTo(EmployeeType::class,'employee_type');
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
    public function employeeGrade()
    {
        return $this->hasOne(Grade::class, 'id', 'grade_id');
    }
    public function employeeProject()
    {
        return $this->hasOne(ProjectList::class, 'id', 'project_id');
    }

    public function reportingfirst()
    {
        return $this->belongsTo(EmployeePersonalInformation::class, 'reporting_to_first');
    }
    public function reportingsecond()
    {
        return $this->belongsTo(EmployeePersonalInformation::class, 'reporting_to_second');
    }
    public function reportingthird()
    {
        return $this->belongsTo(EmployeePersonalInformation::class, 'reporting_to_third');
    }
}
