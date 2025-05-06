<?php

namespace App\Models\Admin\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDocument extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'profile_picture',
        'signature',
        'nid_card_front',
        'nid_card_back',
        'cv',
        'trade_licence',
        'vat',
        'tax',
        'gong_picture',
    ];

    public function employee()
    {
        return $this->belongsTo(EmployeePersonalInformation::class);
    }
}
