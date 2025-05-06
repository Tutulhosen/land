<?php

namespace App\Models\Admin\SystemConfiguration;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'branch_code',
        'opening_date',
        'type',
        'phone',
        'whatsapp',
        'landline',
        'email',
        'opening_time',
        'closing_time',
        'address',
        'status',
    ];

    public function assignedOffices()
    {
        return $this->hasManyThrough(
            Branch::class,
            BranchAssignment::class,
            'parent_id',
            'id',
            'id',
            'child_id'
        );
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_branches', 'branch_id', 'user_id');
    }

}
