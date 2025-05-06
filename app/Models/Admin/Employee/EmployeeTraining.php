<?php

namespace App\Models\Admin\Employee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Admin\Employee\EmployeePersonalInformation;

class EmployeeTraining extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_personal_id',
        'train_type',
        'course_title',
        'description',
        'course_duration',
        'course_start',
        'course_end',
        'year',
        'institute_name',
        'institute_address',
        'resource',
        'result',
        'training_doc',
    ];

    public function employee()
    {
        return $this->belongsTo(EmployeePersonalInformation::class);
    }
}
