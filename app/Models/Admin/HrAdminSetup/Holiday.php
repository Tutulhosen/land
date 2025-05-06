<?php

namespace App\Models\Admin\HrAdminSetup;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\HrAdminSetup\Shift;
use App\Models\Admin\HrAdminSetup\Department;
use App\Models\Admin\SystemConfiguration\HolidayType;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Holiday extends Model
{
    use HasFactory;
    protected $fillable = [
        'holiday_name',
        'holiday_type',
        'description',
        'department_id',
        'duration',
        'start_date',
        'end_date',
        'created_by',
        'status',
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function holidayType()
    {
        return $this->belongsTo(HolidayType::class);
    }
}
