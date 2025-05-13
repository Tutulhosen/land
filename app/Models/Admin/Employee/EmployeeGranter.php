<?php

namespace App\Models\Admin\Employee;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\SystemConfiguration\Relation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeGranter extends Model
{
    use HasFactory;
    protected $table = 'customer_nominees';
    protected $fillable = [
        'customer_id',
        'share',
        'name',
        'relationship',
        'contact_number_res',
        'contact_number',
        'mailing_address',
        'mailing_address_bn',
        'permanent_address',
        'permanent_address_bn',
        'present_address',
        'nominee_id_type',
        'nominee_id',
        'photo',
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
