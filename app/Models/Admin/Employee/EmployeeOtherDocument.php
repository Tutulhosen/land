<?php

namespace App\Models\Admin\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeOtherDocument extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'file_path',
    ];

    public function employee()
    {
        return $this->belongsTo(EmployeePersonalInformation::class);
    }
}
