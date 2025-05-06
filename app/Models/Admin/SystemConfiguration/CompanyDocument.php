<?php

namespace App\Models\Admin\SystemConfiguration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDocument extends Model
{
    use HasFactory;
    protected $fillable = [
        'letterhead_vertical',
        'invoice_vertical',
        'money_receipt_vertical',
        'letterhead_horizontal',
        'invoice_horizontal',
        'money_receipt_horizontal',
    ];

    public function companyInformation()
    {
        return $this->belongsTo(CompanyInformation::class);
    }
}
