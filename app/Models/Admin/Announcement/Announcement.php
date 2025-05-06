<?php

namespace App\Models\Admin\Announcement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Admin\Announcement\AnnouncementAndDepartment;

class Announcement extends Model
{
    use HasFactory;
    protected $fillable = [
        'publish_date',
        'effective_date',
        'title',
        'details',
        'attachment',
        'status',
    ];

    public function announcementDepartments()
    {
        return $this->hasMany(AnnouncementAndDepartment::class);
    }
}
