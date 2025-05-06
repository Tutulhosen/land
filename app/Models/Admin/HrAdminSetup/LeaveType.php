<?php

namespace App\Models\Admin\HrAdminSetup;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\HrAdminSetup\Department;
use App\Models\Admin\HrAdminSetup\Designation;
use App\Models\Admin\SystemConfiguration\Leave;
use App\Models\Admin\SystemConfiguration\LeaveQuota;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Admin\SystemConfiguration\LeaveDuration;
use App\Models\Admin\SystemConfiguration\CarryForwardLimit;
use App\Models\Admin\SystemConfiguration\Gender;
use App\Models\Admin\SystemConfiguration\NotificationPeriod;
use App\Models\Admin\SystemConfiguration\Religion;
use App\Models\User;

class LeaveType extends Model
{
    use HasFactory;

    protected $fillable = [
        'leave_name',
        'leave_days',
        'available_for',
        'gender_id',
        'religion_id',
        'available_for',
        'available_from',
        'applicable_after',
        'leave_duration_id',
        'allocation_method',
        'notification_period_id',
        'carry_forward_limit_id',
        'send_email',
        'created_by',
        'status'
    ];


    public function leaveDuration()
    {
        return $this->belongsTo(LeaveDuration::class);
    }
    public function notificationPeriod()
    {
        return $this->belongsTo(NotificationPeriod::class);
    }
    public function carryForwardLimit()
    {
        return $this->belongsTo(CarryForwardLimit::class);
    }
    public function leaveTypeAndDepartment()
    {
        return $this->hasMany(LeaveTypeAndDepartment::class);
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by');
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class,'gender_id');
    }
    public function religion()
    {
        return $this->belongsTo(Religion::class,'religion_id');
    }
}
