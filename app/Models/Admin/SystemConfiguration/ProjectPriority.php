<?php

namespace App\Models\Admin\SystemConfiguration;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectPriority extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
