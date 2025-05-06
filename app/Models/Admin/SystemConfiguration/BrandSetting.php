<?php

namespace App\Models\Admin\SystemConfiguration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_logo',
        'alternative_logo',
        'favicon',
    ];

    public function companyInformation()
    {
        return $this->belongsTo(CompanyInformation::class);
    }
}
