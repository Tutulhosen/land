<?php

namespace App\Models\Admin\Employee;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeConfirmOrExtend extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'confirm_or_extend',
        'confirmation_date',
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
        'old_probation_date',
        'new_probation_date',
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

}
