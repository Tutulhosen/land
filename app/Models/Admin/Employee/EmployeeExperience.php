<?php

namespace App\Models\Admin\Employee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Admin\Employee\EmployeePersonalInformation;

class EmployeeExperience extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_personal_id',
        'company_name',
        'job_position',
        'department',
        'job_respons',
        'from_date',
        'to_date',
        'duration',
        'projects',
        'years_of_experience',
        'experiance_doc',
    ];

    public function Employee()
    {
        return $this->belongsTo(EmployeePersonalInformation::class);
    }
}
