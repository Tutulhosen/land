<?php

namespace App\Http\Controllers\Admin\SystemConfiguration;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\SystemConfiguration\Road;
use App\Models\Admin\SystemConfiguration\Block;
use App\Models\Admin\SystemConfiguration\Agency;
use App\Models\Admin\SystemConfiguration\Branch;
use App\Models\Admin\SystemConfiguration\Project;
use App\Models\Admin\SystemConfiguration\ProjectList;
use App\Models\Admin\Systemconfiguration\BranchAssignment;
use App\Models\Admin\SystemConfiguration\PlotPrice;
use App\Models\Admin\SystemConfiguration\PlotSize;
use App\Models\Admin\SystemConfiguration\PlotType;
use App\Models\Admin\SystemConfiguration\Salesman;

class ProjectController extends Controller
{
    
     // sector part
     public function index() {
        $branches = Branch::orderBy('id','desc')->get();
        $zonalOffices = Branch::where('type', 'zonal_office')->orderBy('id','desc')->get();
        $areaOffices = Branch::where('type', 'area_office')->orderBy('id','desc')->get();
        $sectors = Project::orderBy('id','desc')->get();
        $branchOffices = Branch::where('type', 'branch_office')->orderBy('id','desc')->get();
        // $assignedChildIds = BranchAssignment::pluck('child_id')->toArray();
        $projects = ProjectList::all();
        $blocks = Block::orderBy('id','desc')->get();
        $roads = Road::orderBy('id','desc')->get();
        $agencies = Agency::orderBy('id','desc')->get();
        $salesmen = Salesman::orderBy('id','desc')->get();
        $plot_types = PlotType::orderBy('id','desc')->get();
        $plot_sizes = PlotSize::orderBy('id','desc')->get();
        $plot_prices = PlotPrice::orderBy('id','desc')->get();

        // dd($sectors);
        return view('admin.system-configuration.project.index',compact(
            'projects','zonalOffices','areaOffices','branchOffices', 'sectors', 'blocks', 'roads', 'agencies', 'salesmen', 'plot_types', 'plot_sizes', 'plot_prices'
        ));
    }

    //sector store
    public function sectorStore(Request $request){
         // Step 1: Validate input
        $validated = $request->validate([
            'project' => 'required',
            'sector_name' => 'required|string',
        ]);

        Project::create([
            'sector_name' => $request->sector_name,
            'project_id' => $request->project,
        ]);
        $activeTab = 'sector';
        // Step 3: Redirect back with success message
        return redirect()->back()->with('success', 'Sector added successfully.')->with('activeTab', $activeTab);;
    }

    //sector update
    public function sectorUpdate(Request $request, $id){
        // dd($id);
       $validated = $request->validate([
           'project' => 'required',
           'sector_name' => 'required|string',
       ]);

       $sector = Project::findOrFail($id); 

       $sector->update([
           'sector_name' => $request->sector_name,
           'project_id' => $request->project,
       ]);
       $activeTab = 'sector';
       return redirect()->back()->with('success', 'Sector update successfully.')->with('activeTab', $activeTab);;
   }
    // sector  destroy
    public function sectorDestroy($id)
    {
        $sector = Project::findOrFail($id);
        // dd($sector);
        $sector->delete();
        $activeTab = 'sector';
        return redirect()->back()->with('success', 'Sector deleted successfully.')->with('activeTab', $activeTab);;
    }
    // sector  status update
    public function sectorToggle($id)
    {
        $sector = Project::findOrFail($id);
    
        // Toggle status
        if ($sector->is_active == 1) {
            $sector->update([
                'is_active' => 0,
            ]);
        } else {
            $sector->update([
                'is_active' => 1,
            ]);
        }
    
        $activeTab = 'sector';
    
        return redirect()->back()
            ->with('success', 'Sector status updated!')
            ->with('activeTab', $activeTab);
    }
    

    //block store
    public function blockStore(Request $request){
        // Step 1: Validate input
        $validated = $request->validate([
            'sector' => 'required',
            'block_name' => 'required|string',
        ]);
        
        Block::create([
            'block_name' => $request->block_name,
            'sector_id' => $request->sector,
        ]);
        $activeTab = 'block';
        // Step 3: Redirect back with success message
        return redirect()->back()->with('success', 'Block added successfully.')->with('activeTab', $activeTab);;
    }

    //block update
    public function blockUpdate(Request $request, $id){
        // dd($id);
        $validated = $request->validate([
            'block_name' => 'required',
            'sector' => 'required|string',
        ]);

        $sector = Block::findOrFail($id); // throws 404 if not found

        $sector->update([
            'block_name' => $request->block_name,
            'sector_id' => $request->sector,
        ]);
        $activeTab = 'block';
        // Step 3: Redirect back with success message
        return redirect()->back()->with('success', 'Block update successfully.')->with('activeTab', $activeTab);;
    }
    // block  destroy
    public function blockDestroy($id)
    {
        $block = Block::findOrFail($id);
        // dd($sector);
        $block->delete();
        $activeTab = 'block';
        return redirect()->back()->with('success', 'Block deleted successfully.')->with('activeTab', $activeTab);;
    }
    // block status update
    public function blockToggle($id)
    {
        $block = Block::findOrFail($id);
        // dd($block);
        // Toggle status
        if ($block->status == 1) {
            $block->update([
                'status' => 0,
            ]);
        } else {
            $block->update([
                'status' => 1,
            ]);
        }
    
        $activeTab = 'block';
    
        return redirect()->back()
            ->with('success', 'Block status updated!')
            ->with('activeTab', $activeTab);
    }

    //road store
    public function roadStore(Request $request){
        // Step 1: Validate input
        $validated = $request->validate([
            'sector' => 'required',
            'block' => 'required',
            'road_name' => 'required',
        ]);
        // dd($request->all());
        Road::create([
            'road_name' => $request->road_name,
            'sector_id' => $request->sector,
            'block_id' => $request->block,
        ]);
        $activeTab = 'road';
        // Step 3: Redirect back with success message
        return redirect()->back()->with('success', 'Road added successfully.')->with('activeTab', $activeTab);;
    }

    //road update
    public function roadUpdate(Request $request, $id){
        // dd($id);
        $validated = $request->validate([
            'sector' => 'required',
            'block' => 'required',
            'road_name' => 'required',
        ]);

        $road = Road::findOrFail($id); // throws 404 if not found

        $road->update([
            'road_name' => $request->road_name,
            'sector_id' => $request->sector,
            'block_id' => $request->block,
        ]);
        $activeTab = 'road';
        // Step 3: Redirect back with success message
        return redirect()->back()->with('success', 'Road update successfully.')->with('activeTab', $activeTab);;
    }
    // road  destroy
    public function roadDestroy($id)
    {
        $road = Road::findOrFail($id);
        // dd($sector);
        $road->delete();
        $activeTab = 'road';
        return redirect()->back()->with('success', 'Road deleted successfully.')->with('activeTab', $activeTab);;
    }
    // road status update
    public function roadToggle($id)
    {
        $road = Road::findOrFail($id);
        // dd($block);
        // Toggle status
        if ($road->is_active == 1) {
            $road->update([
                'is_active' => 0,
            ]);
        } else {
            $road->update([
                'is_active' => 1,
            ]);
        }
    
        $activeTab = 'road';
    
        return redirect()->back()
            ->with('success', 'Road status updated!')
            ->with('activeTab', $activeTab);
    }

    //agency store
    public function agencyStore(Request $request){
        // Step 1: Validate input
        $validated = $request->validate([
            'project' => 'required',
            'agency_name' => 'required',
            'agency_type' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        // dd($request->all());
        if ($request->opening_time) {
            $openingTime = Carbon::createFromFormat('h:i A', $request->opening_time)->format('H:i:s');
        } else {
            $openingTime = null;
        }
        if ($request->closing_time) {
            $closing_time = Carbon::createFromFormat('h:i A', $request->closing_time)->format('H:i:s');
        } else {
            $closing_time = null;
        }
        Agency::create([
            'project_id' => $request->project,
            'agency_name' => $request->agency_name,
            'agency_type' => $request->agency_type,
            'phone' => $request->phone,
            'whatsapp' => $request->whatsapp,
            'landline' => $request->landline,
            'email' => $request->email,
            'sign_in_date' => $request->sign_in_date,
            'opening_time' => $openingTime,
            'closing_time' => $closing_time,
            'address' => $request->address,
        ]);
        $activeTab = 'agency';
        // Step 3: Redirect back with success message
        return redirect()->back()->with('success', 'Agency added successfully.')->with('activeTab', $activeTab);;
    }

    //agency update
    public function agencyUpdate(Request $request, $id){
        // dd($id);
        $validated = $request->validate([
            'project' => 'required',
            'agency_name' => 'required',
            'agency_type' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $agency = Agency::findOrFail($id); // throws 404 if not found
        if ($request->opening_time) {
            $openingTime = Carbon::createFromFormat('h:i A', $request->opening_time)->format('H:i:s');
        } else {
            $openingTime = null;
        }
        if ($request->closing_time) {
            $closing_time = Carbon::createFromFormat('h:i A', $request->closing_time)->format('H:i:s');
        } else {
            $closing_time = null;
        }
        $agency->update([
            'project_id' => $request->project,
            'agency_name' => $request->agency_name,
            'agency_type' => $request->agency_type,
            'phone' => $request->phone,
            'whatsapp' => $request->whatsapp,
            'landline' => $request->landline,
            'email' => $request->email,
            'sign_in_date' => $request->sign_in_date,
            'opening_time' => $openingTime,
            'closing_time' => $closing_time,
            'address' => $request->address,
        ]);
        $activeTab = 'agency';
        // Step 3: Redirect back with success message
        return redirect()->back()->with('success', 'Agency update successfully.')->with('activeTab', $activeTab);;
    }
    // agency  destroy
    public function agencyDestroy($id)
    {
        $agency = Agency::findOrFail($id);
        // dd($sector);
        $agency->delete();
        $activeTab = 'agency';
        return redirect()->back()->with('success', 'Agency deleted successfully.')->with('activeTab', $activeTab);;
    }
    // agency status update
    public function agencyToggle($id)
    {
        $agency = Agency::findOrFail($id);
        // dd($block);
        // Toggle status
        if ($agency->is_active == 1) {
            $agency->update([
                'is_active' => 0,
            ]);
        } else {
            $agency->update([
                'is_active' => 1,
            ]);
        }
    
        $activeTab = 'agency';
    
        return redirect()->back()
            ->with('success', 'Agency status updated!')
            ->with('activeTab', $activeTab);
    }

    //salesman store
    public function salesmanStore(Request $request){
        // Step 1: Validate input
        $validated = $request->validate([
            'agency' => 'required',
            'salesman_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        // dd($request->all());

        Salesman::create([
            'agency_id' => $request->agency,
            'salesman_name' => $request->salesman_name,
            'phone' => $request->phone,
            'whatsapp' => $request->whatsapp,
            'address' => $request->address,
        ]);
        $activeTab = 'salesman';
        // Step 3: Redirect back with success message
        return redirect()->back()->with('success', 'Salesman added successfully.')->with('activeTab', $activeTab);;
    }

    //salesman update
    public function salesmanUpdate(Request $request, $id){
        // dd($id);
        $validated = $request->validate([
            'agency' => 'required',
            'salesman_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $salesman = Salesman::findOrFail($id); // throws 404 if not found
        
        $salesman->update([
            'agency_id' => $request->agency,
            'salesman_name' => $request->salesman_name,
            'phone' => $request->phone,
            'whatsapp' => $request->whatsapp,
            'address' => $request->address,
        ]);
        $activeTab = 'salesman';
        // Step 3: Redirect back with success message
        return redirect()->back()->with('success', 'Salesman update successfully.')->with('activeTab', $activeTab);;
    }
    // salesman  destroy
    public function salesmanDestroy($id)
    {
        $salesman = Salesman::findOrFail($id);
        // dd($sector);
        $salesman->delete();
        $activeTab = 'salesman';
        return redirect()->back()->with('success', 'Salesman deleted successfully.')->with('activeTab', $activeTab);;
    }

    // salesman status update
    public function salesmanToggle($id)
    {
        $salesman = Salesman::findOrFail($id);
        // dd($block);
        // Toggle status
        if ($salesman->is_active == 1) {
            $salesman->update([
                'is_active' => 0,
            ]);
        } else {
            $salesman->update([
                'is_active' => 1,
            ]);
        }
    
        $activeTab = 'salesman';
    
        return redirect()->back()
            ->with('success', 'Salesman status updated!')
            ->with('activeTab', $activeTab);
    }

    //plot_type store
    public function plot_typeStore(Request $request){
        // Step 1: Validate input
        $validated = $request->validate([
            'name' => 'required',
        ]);
        // dd($request->all());

        PlotType::create([
            'name' => $request->name,
        ]);
        $activeTab = 'plot_type';
        // Step 3: Redirect back with success message
        return redirect()->back()->with('success', 'Plot Type added successfully.')->with('activeTab', $activeTab);;
    }

    //plot_type update
    public function plot_typeUpdate(Request $request, $id){
        // dd($id);
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $plot_type = PlotType::findOrFail($id); // throws 404 if not found
        
        $plot_type->update([
            'name' => $request->name,
        ]);
        $activeTab = 'plot_type';
        // Step 3: Redirect back with success message
        return redirect()->back()->with('success', 'Plot Type update successfully.')->with('activeTab', $activeTab);;
    }
    // plot_type  destroy
    public function plot_typeDestroy($id)
    {
        $plot_type = PlotType::findOrFail($id);
        $plot_type->delete();
        $activeTab = 'plot_type';
        return redirect()->back()->with('success', 'Plot Type deleted successfully.')->with('activeTab', $activeTab);;
    }

    // plot_type status update
    public function plot_typeToggle($id)
    {
        $plot_type = PlotType::findOrFail($id);
        // dd($block);
        // Toggle status
        if ($plot_type->is_active == 1) {
            $plot_type->update([
                'is_active' => 0,
            ]);
        } else {
            $plot_type->update([
                'is_active' => 1,
            ]);
        }
    
        $activeTab = 'plot_type';
    
        return redirect()->back()
            ->with('success', 'Plot Type status updated!')
            ->with('activeTab', $activeTab);
    }

    //plot_size store
    public function plot_sizeStore(Request $request){
        // Step 1: Validate input
        $validated = $request->validate([
            'plot_type' => 'required',
            'size_name' => 'required',
        ]);
        // dd($request->all());

        PlotSize::create([
            'plot_type_id' => $request->plot_type,
            'size_name' => $request->size_name,
        ]);
        $activeTab = 'plot_size';
        // Step 3: Redirect back with success message
        return redirect()->back()->with('success', 'Plot Size added successfully.')->with('activeTab', $activeTab);;
    }

    //plot_size update
    public function plot_sizeUpdate(Request $request, $id){
        // dd($id);
        $validated = $request->validate([
            'plot_type' => 'required',
            'size_name' => 'required',
        ]);

        $plot_size = PlotSize::findOrFail($id); // throws 404 if not found
        
        $plot_size->update([
            'plot_type_id' => $request->plot_type,
            'size_name' => $request->size_name,
        ]);
        $activeTab = 'plot_size';
        // Step 3: Redirect back with success message
        return redirect()->back()->with('success', 'Plot Size update successfully.')->with('activeTab', $activeTab);;
    }
    // plot_size  destroy
    public function plot_sizeDestroy($id)
    {
        $plot_size = PlotSize::findOrFail($id);
        $plot_size->delete();
        $activeTab = 'plot_size';
        return redirect()->back()->with('success', 'Plot Size deleted successfully.')->with('activeTab', $activeTab);;
    }

    // plot_size status update
    public function plot_sizeToggle($id)
    {
        $plot_size = PlotSize::findOrFail($id);
        // dd($block);
        // Toggle status
        if ($plot_size->is_active == 1) {
            $plot_size->update([
                'is_active' => 0,
            ]);
        } else {
            $plot_size->update([
                'is_active' => 1,
            ]);
        }
    
        $activeTab = 'plot_size';
    
        return redirect()->back()
            ->with('success', 'Plot Size status updated!')
            ->with('activeTab', $activeTab);
    }


    //plot_price store
    public function plot_priceStore(Request $request){
        // Step 1: Validate input
        $validated = $request->validate([
            'plot_type' => 'required',
            'plot_size' => 'required',
            'plot_price' => 'required',
        ]);
        // dd($request->all());

        PlotPrice::create([
            'plot_type_id' => $request->plot_type,
            'plot_size_id' => $request->plot_size,
            'plot_price' => $request->plot_price,
        ]);
        $activeTab = 'plot_price';
        // Step 3: Redirect back with success message
        return redirect()->back()->with('success', 'Plot Price added successfully.')->with('activeTab', $activeTab);;
    }

    //plot_price update
    public function plot_priceUpdate(Request $request, $id){
        // dd($id);
        $validated = $request->validate([
            'plot_type' => 'required',
            'plot_size' => 'required',
            'plot_price' => 'required',
        ]);

        $plot_price = PlotPrice::findOrFail($id); // throws 404 if not found
        
        $plot_price->update([
            'plot_type_id' => $request->plot_type,
            'plot_size_id' => $request->plot_size,
            'plot_price' => $request->plot_price,
        ]);
        $activeTab = 'plot_price';
        // Step 3: Redirect back with success message
        return redirect()->back()->with('success', 'Plot Price update successfully.')->with('activeTab', $activeTab);;
    }
    // plot_price  destroy
    public function plot_priceDestroy($id)
    {
        $plot_price = PlotPrice::findOrFail($id);
        // dd($plot_price);
        $plot_price->delete();
        $activeTab = 'plot_price';
        return redirect()->back()->with('success', 'Plot Price deleted successfully.')->with('activeTab', $activeTab);;
    }

    // plot_price status update
    public function plot_priceToggle($id)
    {
        $plot_price = PlotPrice::findOrFail($id);
        // dd($block);
        // Toggle status
        if ($plot_price->is_active == 1) {
            $plot_price->update([
                'is_active' => 0,
            ]);
        } else {
            $plot_price->update([
                'is_active' => 1,
            ]);
        }
    
        $activeTab = 'plot_price';
    
        return redirect()->back()
            ->with('success', 'Plot Price status updated!')
            ->with('activeTab', $activeTab);
    }
}
