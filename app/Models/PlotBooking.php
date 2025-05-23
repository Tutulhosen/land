<?php

namespace App\Models;

use App\Models\Admin\SystemConfiguration\Plot;
use Illuminate\Database\Eloquent\Model;

class PlotBooking extends Model
{
    protected $table = 'plot_bookings';
    public function plot_details()
    {
        return $this->belongsTo(Plot::class, 'plot_id');
    }

}
