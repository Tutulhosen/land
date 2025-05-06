<?php

namespace App\Models\Admin\Employee;

use App\Models\Admin\HrAdminSetup\Shift;
use App\Models\Admin\SystemConfiguration\WeekOff;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePayRollInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_personal_id',
        'holiday_id',
        'shift_id',
        'overtime_enable',
        'sallery_payment_by',
        'bank_name',
        'account_holder_name',
        'branch_name',
        'account_number',
        'tin_number',
        'joining_date',
        'joining_sallery',
        'probation_period',
        'probation_period_starting_date',
        'probation_period_end_date',
        'salary_type',
    ];
    public function holiday()
    {
        return $this->belongsTo(WeekOff::class, 'holiday_id');
    }
    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id');
    }
}
