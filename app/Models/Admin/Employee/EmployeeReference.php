<?php

namespace App\Models\Admin\Employee;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\SystemConfiguration\Relation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeReference extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_personal_id',
        'reference_name',
        'reference_occupation',
        'reference_contact_number',
        'reference_relation',
        'reference_address',
        'reference_id_number',
        'reference_id_doc',
    ];

    public function personalInformation()
    {
        return $this->belongsTo(EmployeePersonalInformation::class, 'emp_personal_id');
    }
    public function relations()
    {
        return $this->hasOne(Relation::class, 'id', 'reference_relation');
    }
}
