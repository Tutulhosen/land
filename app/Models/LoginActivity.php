<?php

namespace App\Models;

use App\Models\Admin\Employee\EmployeeOfficialInformation;
use App\Models\Admin\Employee\EmployeePersonalInformation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginActivity extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'guard',
        'login_ip',
        'date_time',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function employee()
    {
        return $this->belongsTo(EmployeePersonalInformation::class, 'user_id');
    }
}
