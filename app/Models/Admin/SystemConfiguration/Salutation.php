<?php

namespace App\Models\Admin\SystemConfiguration;

use App\Models\Admin\Employee\EmployeePersonalInformation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salutation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];
}
