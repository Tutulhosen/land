<?php

namespace App\Models\Admin\LeaveManagement;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\HrAdminSetup\LeaveType;
use App\Models\Admin\HrAdminSetup\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Admin\Employee\EmployeePersonalInformation;

class LeaveApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'employee_id',
        'leave_type_id',
        'from_date',
        'to_date',
        'document',
        'leave_reason',
        'decided_by',
        'decided_at',
        'status',
        'reason',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function employee()
    {
        return $this->belongsTo(EmployeePersonalInformation::class, 'employee_id');
    }

    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class, 'leave_type_id');
    }

    public function decidedBy()
    {
        return $this->belongsTo(User::class, 'decided_by');
    }
}
