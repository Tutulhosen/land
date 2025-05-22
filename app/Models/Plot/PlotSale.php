<?php

namespace App\Models\Plot;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\SystemConfiguration\Plot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Admin\Employee\EmployeePersonalInformation;

class PlotSale extends Model
{
    use HasFactory;
    protected $table = 'plot_bookings';
    protected $fillable = ['reg_date', 'plot_id', 'customer_id','agency_id', 'total_amount', 'rate','total_installment', 'installment_amount', 'is_installment', 'has_old_plot', 'old_polt_size', 'old_plot_rate', 'old_plot_price', 'old_plot_payment', 'old_polt_due', 'new_plot_price'];
    
    public function customer()
    {
        return $this->belongsTo(EmployeePersonalInformation::class, 'customer_id');
    }

    
    public function plot()
    {
        return $this->belongsTo(Plot::class, 'plot_id');
    }
}
