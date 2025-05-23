<?php

namespace App\Http\Controllers;

use App\Models\Upazila;
use App\Models\District;
use Illuminate\Http\Request;
use App\Models\Plot\PlotSale;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\SystemConfiguration\Plot;
use App\Models\Admin\SystemConfiguration\Road;
use App\Models\Admin\SystemConfiguration\Block;
use App\Models\Admin\SystemConfiguration\PlotSize;
use App\Models\Admin\SystemConfiguration\Salesman;
use App\Models\Admin\SystemConfiguration\PlotPrice;
use App\Models\Admin\Employee\EmployeePersonalInformation;

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
    public function get_road_by_block_with_avaiable_plot($id)
    {
        $roads_all = Road::where('block_id', $id)->get();
        $roads=[];
        foreach ($roads_all as $key => $value) {
            $data['id']=$value->id;
            $data['road_name']=$value->road_name;
            $data['available_plot_counts']=DB::table('plots')->where('road_id', $value->id)->where('plot_booking_status', 0)->count();
            array_push($roads, $data);
     

        }
       

        return response()->json([
            'roads' => $roads
        ]);
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

    public function get_customer_by_salesman($id)
    {
        $salesman = EmployeePersonalInformation::where('salesman', $id)->get(); 
        return response()->json($salesman);
    }

    public function get_avaiable_customer_by_salesman($id)
    {

        $bookedCustomerIds = PlotSale::pluck('customer_id');
        $customers = EmployeePersonalInformation::where('salesman', $id)
        ->whereNotIn('id', $bookedCustomerIds)
        ->get();
    

        return response()->json($customers);
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
        $plot_data = Plot::where('road_id', $road_id)->orderByRaw('CAST(plot_name AS UNSIGNED) ASC')->get();
        $plots=[];
        foreach ($plot_data as $key => $value) {
            $data['id']=$value->id;
            
            
            $data['plot_booking_status']=$value->plot_booking_status ?? null;
            $data['plot_name']=$value->plot_name ?? null;
            $get_customer=PlotSale::where('plot_id', $value->id)->first();
            if ($get_customer) {
                $data['customer_name']=$get_customer->customer->name ?? null;
                $data['total_amount']=$get_customer->total_amount ?? null;
                $data['agency']=$get_customer->agency->agency_name ?? null;
                $data['salesman']=$get_customer->customer->get_salesman->salesman_name ?? null;
            } else {
                $data['customer_name']=null;
                $data['agency']=null;
                $data['salesman']=null;
            }

            array_push($plots, $data);
            
        }

        // dd($plots);
        return response()->json($plots);
    }

    public function get_plot_data_by_id($plotId)
    {
        $plot = Plot::find($plotId);
        if ($plot) {
            return response()->json([
                'plot_size' => $plot->plot_size->size_name,
                'per_katha_rate' => $plot->price_per_katha,
                'total_price' => $plot->plot_price
            ]);
        }

        return response()->json(['error' => 'Plot not found'], 404);
    }

    
}
