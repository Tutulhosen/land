<?php

namespace App\Models\Admin\SystemConfiguration;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\HrAdminSetup\Holiday;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HolidayType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];

    public function holiday()
    {
        return $this->belongsTo(Holiday::class);
    }
}
