<?php

namespace App\Models\Admin\Employee;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\HrAdminSetup\Department;
use App\Models\Admin\HrAdminSetup\Designation;
use App\Models\Admin\SystemConfiguration\Grade;
use App\Models\Admin\SystemConfiguration\Branch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Admin\Employee\EmployeePersonalInformation;

class EmployeeTransfer extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'reporting_date',
        'old_branch',
        'old_department',
        'old_designation',
        'old_grade',
        'old_reporting_to_first',
        'old_reporting_to_second',
        'old_reporting_to_third',
        'new_branch',
        'new_department',
        'new_designation',
        'new_grade',
        'new_reporting_to_first',
        'new_reporting_to_second',
        'new_reporting_to_third',
        'comment',
        'created_by',
    ];

    public function employee()
    {
        return $this->belongsTo(EmployeePersonalInformation::class, 'employee_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function oldDepartment()
    {
        return $this->belongsTo(Department::class, 'old_department');
    }

    public function oldDesignation()
    {
        return $this->belongsTo(Designation::class, 'old_designation');
    }
    public function oldBranch()
    {
        return $this->belongsTo(Branch::class, 'old_branch');
    }
    public function oldEmployeeGrade()
    {
        return $this->hasOne(Grade::class, 'id', 'old_grade');
    }

    public function oldReportingfirst()
    {
        return $this->belongsTo(EmployeePersonalInformation::class, 'old_reporting_to_first');
    }
    public function oldReportingsecond()
    {
        return $this->belongsTo(EmployeePersonalInformation::class, 'old_reporting_to_second');
    }
    public function oldReportingthird()
    {
        return $this->belongsTo(EmployeePersonalInformation::class, 'old_reporting_to_third');
    }


    public function newDepartment()
    {
        return $this->belongsTo(Department::class, 'new_department');
    }

    public function newDesignation()
    {
        return $this->belongsTo(Designation::class, 'new_designation');
    }
    public function newBranch()
    {
        return $this->belongsTo(Branch::class, 'new_branch');
    }
    public function newEmployeeGrade()
    {
        return $this->hasOne(Grade::class, 'id', 'new_grade');
    }

    public function newReportingfirst()
    {
        return $this->belongsTo(EmployeePersonalInformation::class, 'new_reporting_to_first');
    }
    public function newReportingsecond()
    {
        return $this->belongsTo(EmployeePersonalInformation::class, 'new_reporting_to_second');
    }
    public function newReportingthird()
    {
        return $this->belongsTo(EmployeePersonalInformation::class, 'new_reporting_to_third');
    }

}
