<?php

namespace App\Models\Admin\HrAdminSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveTypeAndDepartment extends Model
{
    use HasFactory;
    protected $fillable = [
        'leave_type_id',
        'department_id',
    ];
    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
