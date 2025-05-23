<?php

namespace App\Models\Admin\Employee;

use App\Models\Upazila;
use App\Models\District;
use App\Models\Plot\PlotSale;
use App\Models\CustomerAttachment;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\HrAdminSetup\Attendance;
use App\Models\Admin\Employee\EmployeeGranter;
use App\Models\Admin\SystemConfiguration\Agency;
use App\Models\Admin\SystemConfiguration\Gender;
use App\Models\Admin\SystemConfiguration\Religion;
use App\Models\Admin\SystemConfiguration\Salesman;
use App\Models\Admin\SystemConfiguration\BloodGroup;
use App\Models\Admin\SystemConfiguration\Salutation;
use App\Models\Admin\SystemConfiguration\ProjectList;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Admin\Employee\EmployeePayRollInformation;

class EmployeePersonalInformation extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'name',
        'name_bangla',
        'father_name',
        'father_name_bangla',
        'mother_name',
        'mother_name_bangla',
        'number',
        'code',
        'old_code',
        'reg_date',
        'contact_number_res',
        'contact_number_emergency',
        'email',
        'gender',
        'dob',
        'nid_no',
        'passport_no',
        'region',
        'nationality',
        'occupation',
        'designation',
        'office_name',
        'office_phone_no',
        'office_address',
        'mailing_address',
        'mailing_address_bn',
        'permanent_address',
        'permanent_address_bn',
        'note',
        'photo',
        'sign',
        'blood_id',
        'age',
        'id_type',
        'religion',
        'agency',
        'salesman',
        'customer_div_pre',
        'customer_dis_pre',
        'customer_upa_pre',
        'customer_union_pre',
        'customer_add_pre',
        'customer_post_off_pre',
        'customer_post_code_pre',
        'customer_div_per',
        'customer_dis_per',
        'customer_upa_per',
        'customer_union_pers',
        'customer_post_off_per',
        'customer_post_code_per',
        'customer_login_access',
        'password',
        'is_active',

    ];
    public function nominees()
    {
        return $this->hasMany(EmployeeGranter::class, 'customer_id', 'id');
    }

    public function gong()
    {
        return $this->hasMany(EmployeeReference::class, 'customer_id', 'id');
    }

    public function attachments()
    {
        return $this->hasMany(CustomerAttachment::class, 'customer_id', 'id');
    }

    public function get_salesman()
    {
        return $this->belongsTo(Salesman::class, 'salesman');
    }

    public function get_agency()
    {
        return $this->belongsTo(Agency::class, 'agency');
    }

    public function plot_sale()
    {   
        return $this->hasOne(PlotSale::class, 'customer_id', 'id');
    }












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
