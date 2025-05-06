<?php

namespace App\Models\Admin\HrAdminSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShiftAndDepartment extends Model
{
    use HasFactory;
    protected $fillable = [
        'shift_id',
        'department_id',
    ];
    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function getShift()
    {
        return $this->belongsTo(Shift::class, 'shift_id');
    }

    public function getDepartment()
    {
        return $this->belongsTo(Shift::class, 'department_id');
    }
}
