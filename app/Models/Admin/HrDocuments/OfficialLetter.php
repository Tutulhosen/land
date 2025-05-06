<?php

namespace App\Models\Admin\HrDocuments;

use App\Models\Admin\Employee\EmployeePersonalInformation;
use App\Models\Admin\HrAdminSetup\DocumentTemplate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficialLetter extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'letter_type_id',
        'content',
        'signatory_id',
    ];
    public function employee()
    {
        return $this->belongsTo(EmployeePersonalInformation::class, 'employee_id');
    }
    public function signatory()
    {
        return $this->belongsTo(EmployeePersonalInformation::class, 'signatory_id');
    }
    public function documentTemplate()
    {
        return $this->belongsTo(DocumentTemplate::class, 'letter_type_id');
    }
}
