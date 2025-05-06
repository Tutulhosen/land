<?php

namespace App\Models\Admin\SystemConfiguration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarrantyPeriod extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];
}
