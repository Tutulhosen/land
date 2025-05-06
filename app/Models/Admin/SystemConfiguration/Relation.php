<?php

namespace App\Models\Admin\SystemConfiguration;

use App\Models\Admin\Employee\EmployeeContact;
use App\Models\Admin\Employee\EmployeeGranter;
use App\Models\Admin\Employee\EmployeeReference;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];
    public function employeecontact()
    {
        return $this->belongsTo(EmployeeContact::class);
    }
    public function employeereference()
    {
        return $this->belongsTo(EmployeeReference::class);
    }
    public function employeegranter()
    {
        return $this->belongsTo(EmployeeGranter::class);
    }
}
