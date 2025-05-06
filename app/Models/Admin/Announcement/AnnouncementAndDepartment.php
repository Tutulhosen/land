<?php

namespace App\Models\Admin\Announcement;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\HrAdminSetup\Department;
use App\Models\Admin\Announcement\Announcement;
use App\Models\Admin\SystemConfiguration\Branch;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnnouncementAndDepartment extends Model
{
    use HasFactory;
    protected $fillable = [
        'announcement_id',
        'department_id',
        'branch_id',
    ];

    public function announcement()
    {
        return $this->belongsTo(Announcement::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
