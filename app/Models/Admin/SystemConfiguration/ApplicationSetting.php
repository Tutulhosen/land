<?php

namespace App\Models\Admin\SystemConfiguration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_information_id',
        'application_title',
        'copyright_text',
        'date_format',
        'time_format',
    ];
    public function companyInformation()
    {
        return $this->belongsTo(CompanyInformation::class,'company_information_id');
    }
}
