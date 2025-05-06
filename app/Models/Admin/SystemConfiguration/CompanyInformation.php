<?php

namespace App\Models\Admin\SystemConfiguration;

use App\Models\District;
use App\Models\Upazila;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'address',
        'district_id',
        'upazila_id',
        'zip_code',
        'timezone',
        'working_days',
        'office_start_time',
        'office_end_time',
        'company_registration_number',
        'trade_license_number',
        'bin_vat_number',
    ];

    protected $casts = [
        'working_days' => 'array',
    ];
    public function contactInformation()
    {
        return $this->hasOne(ContactInformation::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class,'district_id');
    }
    public function upazila()
    {
        return $this->belongsTo(Upazila::class,'upazila_id');
    }
    public function brandSetting()
    {
        return $this->hasOne(BrandSetting::class);
    }
    public function applicationSetting()
    {
        return $this->hasOne(ApplicationSetting::class,'company_information_id');
    }
    public function companyDocument()
    {
        return $this->hasOne(CompanyDocument::class);
    }
}
