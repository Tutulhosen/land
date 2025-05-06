<?php

namespace App\Models\Admin\Employee;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\HrAdminSetup\Attendance;
use App\Models\Admin\SystemConfiguration\Gender;
use App\Models\Admin\SystemConfiguration\Religion;
use App\Models\Admin\SystemConfiguration\BloodGroup;
use App\Models\Admin\SystemConfiguration\Salutation;
use App\Models\Admin\SystemConfiguration\ProjectList;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Admin\Employee\EmployeePayRollInformation;

class EmployeePersonalInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'emp_id',
        'salutation',
        'first_name',
        'last_name',
        'gender',
        'religion',
        'nationality',
        'blood_group',
        'identification_type',
        'identification_number',
        'dob',
        'fathers_name',
        'mothers_name',
        'marital_status',
        'spouse_name',
        'spouse_occupation',
        'spouse_organization',
        'spouse_mobile',
        'spouse_nid_number',
        'spouse_nid',
        'spouse_dob',
        'status',
        'is_confirmed',
    ];
    // public function Employee()
    // {
    //     return $this->belongsTo(EmployeePersonalInformation::class);
    // }

    public function salutations()
    {
        return $this->belongsTo(Salutation::class, 'salutation');
    }
    public function genders()
    {
        return $this->belongsTo(Gender::class, 'gender');
    }
    public function bloodGroups()
    {
        return $this->belongsTo(BloodGroup::class, 'blood_group');
    }
    public function religions()
    {
        return $this->belongsTo(Religion::class, 'religion');
    }

    public function employeeConfirmExtend()
    {
        return $this->belongsTo(EmployeeConfirmOrExtend::class, 'employee_id');
    }

    public function contact()
    {
        return $this->hasOne(EmployeeContact::class, 'emp_personal_id', 'id');
    }
    public function officialInformation()
    {
        return $this->hasOne(EmployeeOfficialInformation::class, 'emp_personal_id');
    }

    public function payRollInformation()
    {
        return $this->hasOne(EmployeePayRollInformation::class, 'emp_personal_id');
    }
    public function employeeDocument()
    {
        return $this->hasOne(EmployeeDocument::class, 'employee_id');
    }
    public function employeeOtherDocuments()
    {
        return $this->hasMany(EmployeeOtherDocument::class, 'employee_id');
    }
    public function employeeGranters()
    {
        return $this->hasMany(EmployeeGranter::class, 'emp_personal_id');
    }
    public function employeeReferences()
    {
        return $this->hasMany(EmployeeReference::class, 'emp_personal_id');
    }
    public function employeeEducations()
    {
        return $this->hasMany(EmployeeEducation::class, 'emp_personal_id');
    }
    public function employeeExperiences()
    {
        return $this->hasMany(EmployeeExperience::class, 'emp_personal_id');
    }
    public function employeeTrainings()
    {
        return $this->hasMany(EmployeeTraining::class, 'emp_personal_id');
    }

    public function attendance()
    {
        return $this->hasOne(Attendance::class, 'employee_id');
    }

}
