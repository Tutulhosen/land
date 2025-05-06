<?php

namespace App\Models\Admin\HrAdminSetup;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\HrAdminSetup\Shift;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Admin\Employee\EmployeePersonalInformation;

class Attendance extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'attendances';

    protected $fillable = [
        'employee_id',
        'shift_id',
        'date',
        'check_in',
        'check_out',
        'break_start',
        'break_end',
        'overtime_start',
        'overtime_end',
        'early_leave',
        'late',
        'total_hours',
        'overtime_hours',
        'status',
        'leave_type',
        'latitude',
        'longitude',
        'device_id',
        'notes',
        'created_by',
        'updated_by',
        'deleted_by',
        'ip_address',
    ];


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($attendance) {
            $attendance->deleted_by = auth()->id();
            $attendance->save();
        });
    }

    public function employee()
    {
        return $this->belongsTo(EmployeePersonalInformation::class);
    }


    public function getTotalHoursAttribute()
    {
        if ($this->check_in && $this->check_out) {
            $workDuration = strtotime($this->check_out) - strtotime($this->check_in);
            $breakDuration = $this->break_start && $this->break_end
                ? strtotime($this->break_end) - strtotime($this->break_start)
                : 0;
            return round(($workDuration - $breakDuration) / 3600, 2); // Convert seconds to hours
        }
        return 0;
    }

    // public function getOvertimeHoursAttribute()
    // {
    //     if ($this->overtime_start && $this->overtime_end) {
    //         return round((strtotime($this->overtime_end) - strtotime($this->overtime_start)) / 3600, 2);
    //     }
    //     return 0;
    // }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

}
