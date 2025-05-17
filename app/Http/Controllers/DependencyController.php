<?php

namespace App\Http\Controllers;

use App\Models\Upazila;
use App\Models\District;
use Illuminate\Http\Request;
use App\Models\Admin\SystemConfiguration\Plot;
use App\Models\Admin\SystemConfiguration\Road;
use App\Models\Admin\SystemConfiguration\Block;
use App\Models\Admin\SystemConfiguration\PlotSize;
use App\Models\Admin\SystemConfiguration\Salesman;
use App\Models\Admin\SystemConfiguration\PlotPrice;

class DependencyController extends Controller
{

    public function get_block_by_sector($id)
    {
        $blocks = Block::where('sector_id', $id)->get(); 
        return response()->json($blocks);
    }

    public function get_road_by_block($id)
    {
        $roads = Road::where('block_id', $id)->get(); 
        return response()->json($roads);
    }
    public function get_road_with_default_block_by_sector($id)
    {
        $roads = Road::where('block_id', $id)->get(); 
        return response()->json($roads);
    }

    public function get_plot_size_by_plot($id)
    {
        $plot_size = PlotSize::where('plot_type_id', $id)->get(); 
        return response()->json($plot_size);
    }

    public function get_plot_price_by_size($id)
    {
        $plot_price = PlotPrice::where('plot_size_id', $id)->first(); 
      
        return response()->json($plot_price);
    }

    public function get_salesman_by_agency($id)
    {
        $salesman = Salesman::where('agency_id', $id)->get(); 
        return response()->json($salesman);
    }

    public function get_dis_by_div($id)
    {
        $districts = District::where('division_id', $id)->get(); 
        return response()->json($districts);
    }

    public function get_upa_by_dis($id)
    {
        $upazilas = Upazila::where('district_id', $id)->get(); 
        return response()->json($upazilas);
    }

    public function get_plots_by_road($road_id)
    {
        $plots = Plot::where('road_id', $road_id)->get();
        return response()->json($plots);
    }
    
}
