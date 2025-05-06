<?php

namespace App\Models\Admin\Employee;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\SystemConfiguration\Relation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeContact extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_personal_id',
        'contact_number',
        'email',
        'whatsapp',
        'pres_add',
        'same_address',
        'district',
        'postal_code',
        'permanent_add',
        'permanent_district',
        'permanent_postal_code',
        'emergency_contact_person',
        'relation',
        'occupation',
        'emergency_contact',
        'emergency_email',
        'emergency_address',
    ];
    public function employee()
    {
        return $this->belongsTo(EmployeePersonalInformation::class, 'emp_personal_id');
    }
    public function relations()
    {
        return $this->hasOne(Relation::class, 'id', 'relation');
    }
}
