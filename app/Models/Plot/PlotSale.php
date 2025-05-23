<?php

namespace App\Models\Plot;

use App\Models\Admin\MoneyReceipt;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\SystemConfiguration\Plot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Admin\Employee\EmployeePersonalInformation;
use App\Models\Admin\SystemConfiguration\Agency;
use App\Models\Admin\SystemConfiguration\Salesman;

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

    public function agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id');
    }

    public function salesman()
    {
        return $this->belongsTo(Salesman::class, 'plot_id');
    }

    public function moneyReceipts()
    {
        return $this->hasMany(MoneyReceipt::class, 'booking_id');
    }
}
