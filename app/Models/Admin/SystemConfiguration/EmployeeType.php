<?php

namespace App\Models\Admin\SystemConfiguration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];
}
