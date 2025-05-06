<?php

namespace App\Models\Admin\Systemconfiguration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchAssignment extends Model
{
    use HasFactory;
    protected $fillable = [
        'child_id',
        'parent_id',
    ];

    public function parentBranch()
    {
        return $this->belongsTo(Branch::class, 'parent_id');
    }

    public function childBranch()
    {
        return $this->belongsTo(Branch::class, 'child_id');
    }
}
