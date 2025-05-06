<?php

namespace App\Models\Admin\SystemConfiguration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotType extends Model
{
    use HasFactory;
    protected $table = 'plot_types';
    protected $fillable = ['name','is_active'];
}
