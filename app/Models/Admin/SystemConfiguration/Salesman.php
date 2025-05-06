<?php

namespace App\Models\Admin\SystemConfiguration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
    use HasFactory;
    protected $table = 'salesmen';
    protected $fillable = ['agency_id', 'salesman_name', 'phone', 'whatsapp', 'address', 'is_active'];

    public function agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id');
    }
}
