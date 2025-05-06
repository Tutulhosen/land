<?php

namespace App\Models\Admin\SystemConfiguration;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\HrAdminSetup\Shift;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShiftType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];
    public function shift()
    {
        return $this->hasOne(Shift::class);
    }
}
