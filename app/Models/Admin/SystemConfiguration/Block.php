<?php

namespace App\Models\Admin\SystemConfiguration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;
    protected $table = 'blocks';
    protected $fillable = ['block_name', 'sector_id', 'status'];

    public function sector()
    {
        return $this->belongsTo(Project::class, 'sector_id');
    }
    
}
