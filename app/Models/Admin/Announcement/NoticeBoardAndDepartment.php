<?php

namespace App\Models\Admin\Announcement;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\HrAdminSetup\Department;
use App\Models\Admin\Announcement\NoticeBoard;
use App\Models\Admin\SystemConfiguration\Branch;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NoticeBoardAndDepartment extends Model
{
    use HasFactory;
    protected $fillable = [
        'noticeboard_id',
        'department_id',
        'branch_id',
    ];

    public function noticeboard()
    {
        return $this->belongsTo(NoticeBoard::class, 'noticeboard_id');
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
