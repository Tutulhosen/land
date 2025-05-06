<?php

namespace App\Models\Admin\SystemConfiguration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Road extends Model
{
    use HasFactory;
    protected $fillable = ['sector_id', 'block_id', 'road_name','is_active'];

    public function sector()
    {
        return $this->belongsTo(Project::class, 'sector_id');
    }

    public function block()
    {
        return $this->belongsTo(Block::class, 'block_id');
    }
}
