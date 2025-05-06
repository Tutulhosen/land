<?php

namespace App\Http\Controllers\Admin\SystemConfiguration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\SystemConfiguration\Plot;
use App\Models\Admin\SystemConfiguration\Project;
use App\Models\Admin\SystemConfiguration\PlotType;

class PlotController extends Controller
{
    //plot index
    public function index(){
        $sectors = Project::orderBy('id','desc')->get();
        $plot_types = PlotType::orderBy('id','desc')->get();
        $plots = Plot::orderBy('id','desc')->get();
        return view('admin.system-configuration.plot.index', compact('sectors', 'plot_types', 'plots'));
    }

    //plot store
    public function plotStore(Request $request){
        // Step 1: Validate input
       $validated = $request->validate([
           'plot_name' => 'required',
           'sector' => 'required',
           'block' => 'required',
           'road' => 'required',
           'plot_type' => 'required',
           'plot_size' => 'required',
           'price' => 'required',
       ]);
       
       Plot::create([
           'plot_name' => $request->plot_name,
           'sector_id' => $request->sector,
           'block_id' => $request->block,
           'road_id' => $request->road,
           'plot_type_id' => $request->plot_type,
           'plot_size_id' => $request->plot_size,
           'plot_price' => $request->price,
       ]);
       $activeTab = 'plot';
       return redirect()->back()->with('success', 'Plot added successfully.')->with('activeTab', $activeTab);;
   }

   //plot update
   public function plotUpdate(Request $request, $id){
       // dd($id);
       $validated = $request->validate([
            'plot_name' => 'required',
            'sector' => 'required',
            'block' => 'required',
            'road' => 'required',
            'plot_type' => 'required',
            'plot_size' => 'required',
            'price' => 'required',
        ]);

      $plot = Plot::findOrFail($id); 

      $plot->update([
        'plot_name' => $request->plot_name,
        'sector_id' => $request->sector,
        'block_id' => $request->block,
        'road_id' => $request->road,
        'plot_type_id' => $request->plot_type,
        'plot_size_id' => $request->plot_size,
        'plot_price' => $request->price,
      ]);
      $activeTab = 'plot';
      return redirect()->back()->with('success', 'Plot update successfully.')->with('activeTab', $activeTab);;
  }
   // plot  destroy
   public function plotDestroy($id)
   {
       $plot = Plot::findOrFail($id);
       // dd($sector);
       $plot->delete();
       $activeTab = 'plot';
       return redirect()->back()->with('success', 'Plot deleted successfully.')->with('activeTab', $activeTab);;
   }
   // plot  status update
   public function plotToggle($id)
   {
       $plot = Plot::findOrFail($id);

       if ($plot->is_active == 1) {
           $plot->update([
               'is_active' => 0,
           ]);
       } else {
           $plot->update([
               'is_active' => 1,
           ]);
       }
   
       $activeTab = 'plot';
   
       return redirect()->back()
           ->with('success', 'Plot status updated!')
           ->with('activeTab', $activeTab);
   }
}
