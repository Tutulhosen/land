<?php

namespace App\Models\Admin\Announcement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Admin\Announcement\NoticeBoardAndDepartment;

class NoticeBoard extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'effective_date',
        'valid_till',
        'title',
        'details',
        'attachment',
        'status',
    ];

    public function noticeboardDepartments()
    {
        return $this->hasMany(NoticeBoardAndDepartment::class, 'noticeboard_id');
    }
}
