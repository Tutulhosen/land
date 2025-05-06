<?php

namespace App\Models\Admin\Employee;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\SystemConfiguration\Relation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeGranter extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_personal_id',
        'granter_name',
        'granter_occupation',
        'granter_contact_number',
        'granter_relation',
        'granter_address',
        'granter_id_number',
        'granter_id_doc',
    ];

    public function personalInformation()
    {
        return $this->belongsTo(EmployeePersonalInformation::class, 'emp_personal_id');
    }
    public function relations()
    {
        return $this->hasOne(Relation::class, 'id', 'granter_relation');
    }
}
