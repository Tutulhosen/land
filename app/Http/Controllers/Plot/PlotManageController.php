<?php

namespace App\Http\Controllers\Plot;

use Illuminate\Http\Request;
use App\Models\Plot\PlotSale;
use App\Models\Plot\PlotBooking;
use App\Http\Controllers\Controller;
use App\Models\Admin\SystemConfiguration\Agency;
use App\Models\Admin\SystemConfiguration\Project;

class PlotManageController extends Controller
{
    public function sale()
    {
        $plot_sale_datas = PlotSale::orderBy('id','desc')->paginate(15);
        
        return view('admin.plot.sale', compact('plot_sale_datas'));

    }
    public function sale_create()
    {
        $sectors=Project::orderBy('id', 'desc')->get();
        $agencies = Agency::orderBy('id', 'desc')->get();
        return view('admin.plot.sale_create', compact('sectors', 'agencies'));
    }
}
