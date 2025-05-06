<?php

namespace App\Models\Admin\HrAdminSetup;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\HrAdminSetup\Department;
use App\Models\Admin\SystemConfiguration\Grade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Admin\Employee\EmployeeOfficialInformation;

class Designation extends Model
{
    use HasFactory;
    protected $fillable = [
        'designation_name',
        'designation_id',
        'description',
        'status',
        'department_id',
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function officialInformation()
    {
        return $this->hasOne(EmployeeOfficialInformation::class, 'designation_id');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
