<?php

namespace App\Models\Admin\Employee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Admin\Employee\EmployeePersonalInformation;
use App\Models\Admin\SystemConfiguration\Education;
use App\Models\Admin\SystemConfiguration\EducationType;

class EmployeeEducation extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_personal_id',
        'education_type',
        'education',
        'group_major_subject',
        'passing_year',
        'institute_name',
        'board_university',
        'result_university',
        'result_university',
        'education_doc',
    ];

    public function Employee()
    {
        return $this->belongsTo(EmployeePersonalInformation::class);
    }
    public function educationType()
    {
        return $this->belongsTo(EducationType::class, 'education_type');
    }
    public function educationLevel()
    {
        return $this->belongsTo(Education::class, 'education');
    }
}
