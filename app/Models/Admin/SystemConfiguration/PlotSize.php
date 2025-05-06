<?php

namespace App\Models\Admin\SystemConfiguration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotSize extends Model
{
    use HasFactory;
    protected $table = 'plot_sizes';
    protected $fillable = ['plot_type_id','size_name','is_active'];

    public function plot_type()
    {
        return $this->belongsTo(PlotType::class, 'plot_type_id');
    }
}
