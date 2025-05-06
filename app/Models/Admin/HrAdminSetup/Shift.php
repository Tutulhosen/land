<?php

namespace App\Models\Admin\HrAdminSetup;

use App\Models\Admin\Employee\EmployeeOfficial;
use App\Models\Admin\Employee\EmployeePayRollInformation;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\HrAdminSetup\Department;
use App\Models\Admin\HrAdminSetup\Designation;
use App\Models\Admin\SystemConfiguration\WeekOff;
use App\Models\Admin\SystemConfiguration\ShiftType;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shift extends Model
{
    use HasFactory;
    protected $fillable = [
        'shift_name',
        'shift_type_id',
        'start_time',
        'end_time',
        'max_start_time',
        'min_end_time',
        'tot_shift_hour',
        'description',
        'send_email',
        'status',
    ];

    public function employeepayroll()
    {
        return $this->hasOne(EmployeePayRollInformation::class);
    }

    public function shift_type()
    {
        return $this->belongsTo(ShiftType::class);
    }
    public function shiftAndDepartment()
    {
        return $this->hasMany(ShiftAndDepartment::class);
    }

}
