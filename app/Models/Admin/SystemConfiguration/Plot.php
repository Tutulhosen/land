<?php

namespace App\Models\Admin\SystemConfiguration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    use HasFactory;
    protected $table = 'plots';
    protected $fillable = ['plot_name','sector_id','block_id' ,'road_id','plot_type_id','plot_size_id','plot_price','is_active'];

    public function plot_type()
    {
        return $this->belongsTo(PlotType::class, 'plot_type_id');
    }

    public function plot_name()
    {
        return $this->belongsTo(PlotType::class, 'plot_name');
    }


    public function plot_size()
    {
        return $this->belongsTo(PlotSize::class, 'plot_size_id');
    }

    public function sector()
    {
        return $this->belongsTo(Project::class, 'sector_id');
    }

    public function block()
    {
        return $this->belongsTo(Block::class, 'block_id');
    }
    public function road()
    {
        return $this->belongsTo(Road::class, 'road_id');
    }
}
