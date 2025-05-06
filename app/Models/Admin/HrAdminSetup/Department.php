<?php

namespace App\Models\Admin\HrAdminSetup;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\HrAdminSetup\Shift;
use App\Models\Admin\HrAdminSetup\Designation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_name',
        'department_id',
        'description',
        'status',
    ];
    public function designation()
    {
        return $this->hasOne(Designation::class);
    }
    public function shift()
    {
        return $this->hasOne(Shift::class);
    }
    public function shiftAndDepartment()
    {
        return $this->hasOne(ShiftAndDepartment::class);
    }
    public function leaveTypeAndDepartment()
    {
        return $this->hasOne(LeaveTypeAndDepartment::class);
    }
}
