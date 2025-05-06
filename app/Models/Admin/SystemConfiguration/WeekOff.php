<?php

namespace App\Models\Admin\SystemConfiguration;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\HrAdminSetup\Shift;
use App\Models\Admin\Employee\EmployeeOfficial;
use App\Models\Admin\Employee\EmployeePayRollInformation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WeekOff extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];
    public function employeepayroll()
    {
        return $this->hasMany(EmployeePayRollInformation::class);
    }
    public function shift()
    {
        return $this->hasOne(Shift::class);
    }
}
