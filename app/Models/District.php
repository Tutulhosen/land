<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $fillable = [
        'division_id',
        'name',
        'bn_name',
        'lat',
        'long',
        'zone_charge',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
    public function upazilas()
    {
        return $this->hasMany(Upazila::class);
    }
}
