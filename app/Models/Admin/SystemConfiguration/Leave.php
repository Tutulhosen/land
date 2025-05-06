<?php

namespace App\Models\Admin\SystemConfiguration;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\HrAdminSetup\LeaveType;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leave extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];
    public function leaveType()
    {
        return $this->hasOne(LeaveType::class);
    }
}
