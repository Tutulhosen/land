<?php

namespace App\Models\Admin\SystemConfiguration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'official_contact_number',
        'whatsapp_number',
        'landline_number',
        'hotline_number',
        'email_address',
        'website_address',
        'google_map_iframe',
    ];
    public function companyInformation()
    {
        return $this->belongsTo(CompanyInformation::class);
    }
}
