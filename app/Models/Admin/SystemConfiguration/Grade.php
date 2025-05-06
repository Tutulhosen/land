<?php

namespace App\Models\Admin\SystemConfiguration;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\HrAdminSetup\Designation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory;
    protected $fillable = [
        'designation_id',
        'name',
        'basic_salary',
        'house_rent',
        'medical_allowance',
        'transport_allowance',
        'other_allowance',
        'provident_fund',
        'tax_deduction',
        'incrementType',
        'percentage',
        'amount',
        'status',
    ];

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }
}
