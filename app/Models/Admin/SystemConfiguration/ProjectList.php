<?php

namespace App\Models\Admin\SystemConfiguration;

use App\Models\Admin\Employee\EmployeeOfficialInformation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectList extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];

    public function employeeOfficials()
    {
        return $this->hasmany(EmployeeOfficialInformation::class, 'project_id', 'id');
    }
}
