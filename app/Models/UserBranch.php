<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBranch extends Model
{
    use HasFactory;

    protected $table = 'user_branches';

    protected $fillable = [
        'user_id',
        'branch_id',
    ]; 
}
