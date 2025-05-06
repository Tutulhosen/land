<?php

namespace App\Models\Admin\SystemConfiguration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotPrice extends Model
{
    use HasFactory;
    protected $table = 'plot_prices';
    protected $fillable = ['plot_type_id','plot_size_id','plot_price','is_active'];

    public function plot_type()
    {
        return $this->belongsTo(PlotType::class, 'plot_type_id');
    }

    public function plot_size()
    {
        return $this->belongsTo(PlotSize::class, 'plot_size_id');
    }
}
