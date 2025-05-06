<?php

namespace App\Models\Admin\SystemConfiguration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'sectors';
    protected $fillable = ['sector_name', 'project_id', 'is_active'];

    public function project()
    {
        return $this->belongsTo(ProjectList::class, 'project_id');
    }
}
