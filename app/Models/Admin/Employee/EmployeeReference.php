<?php

namespace App\Models\Admin\Employee;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\SystemConfiguration\Relation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeReference extends Model
{
    use HasFactory;
    protected $table = 'customer_gongs';
    protected $fillable = [
        'customer_id',
        'share',
        'gong_name',
        'gong_relationship',
        'gong_contact_number',
        'gong_address',
        'present_address',
        'mailing_address',
        'gong_id_type',
        'gong_id',
        'gong_photo',
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
