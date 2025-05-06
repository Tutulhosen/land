<?php

namespace App\Http\Controllers\Admin\SystemConfiguration;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\SystemConfiguration\Branch;
use App\Models\Admin\SystemConfiguration\BranchAssignment;

class BranchController extends Controller
{
    public function index() {
        $branches = Branch::orderBy('id','desc')->get();
        $zonalOffices = Branch::where('type', 'zonal_office')->orderBy('id','desc')->get();
        $areaOffices = Branch::where('type', 'area_office')->orderBy('id','desc')->get();
        $branchOffices = Branch::where('type', 'branch_office')->orderBy('id','desc')->get();
        $assignedChildIds = BranchAssignment::pluck('child_id')->toArray();
        return view('admin.system-configuration.branch.index',compact(
            'branches','zonalOffices','areaOffices','branchOffices','assignedChildIds'
        ));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'opening_date' => 'nullable|string',
                'type' => 'required|string',
                'phone' => 'nullable|string',
                'whatsapp' => 'nullable|string',
                'landline' => 'nullable|string',
                'email' => 'nullable|email',
                'opening_time' => 'nullable|string',
                'closing_time' => 'nullable|string',
                'address' => 'nullable|string',
            ]);

            $branch = new Branch();
            $branch->name = $validated['name'];
            $branch->type = $validated['type'];
            $branch->phone = $validated['phone'] ?? null;
            $branch->whatsapp = $validated['whatsapp'] ?? null;
            $branch->landline = $validated['landline'] ?? null;
            $branch->email = $validated['email'] ?? null;
            $branch->opening_date = $validated['opening_date'] ?? null;
            $branch->opening_time = $validated['opening_time'] ?? null;
            $branch->closing_time = $validated['closing_time'] ?? null;
            $branch->address = $validated['address'] ?? null;
            $branch->status = true;
            $branch->save();

            $branchCode = $this->generateBranchCode($branch->name, $branch->type, $branch->id);
            $branch->branch_code = $branchCode;
            $branch->save();

            DB::commit();

            $activeTab = [
                'branch_office' => 'branch_office',
                'regional_office' => 'regional_office',
                'zonal_office' => 'zonal_office',
                'area_office' => 'area_office',
                'liaison_office' => 'liaison_office',
            ][$branch->type] ?? 'branch_office';

            return redirect()->route('branch.index')->with('success', 'Branch created successfully!')->with('activeTab', $activeTab);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create branch: ' . $e->getMessage());
        }
    }

    private function generateBranchCode($branchName, $branchType, $branchId)
    {
        $branchCodePrefix = Str::upper(substr($branchName, 0, 3));
        $year = now()->format('y');
        $branchTypeCode = [
            'liaison_office' => 'LO',
            'branch_office' => 'BO',
            'regional_office' => 'RO',
            'zonal_office' => 'ZO',
            'area_office' => 'AO',
        ][$branchType] ?? 'BO';

        return "{$branchTypeCode}-{$branchCodePrefix}{$year}-{$branchId}";

    }

    public function branchToggle($id){
        $branch = Branch::findOrFail($id);
        $branch->status = !$branch->status;
        $branch->save();

        $activeTab = [
            'liaison_office' => 'liaison_office',
            'branch_office' => 'branch_office',
            'regional_office' => 'regional_office',
            'zonal_office' => 'zonal_office',
            'area_office' => 'area_office',
        ][$branch->type] ?? 'branch_office';
        return redirect()->route('branch.index')->with('success', 'Branch status updated!')->with('activeTab', $activeTab);
    }

    public function branchUpdate(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'opening_date' => 'nullable|string',
                'phone' => 'nullable|string',
                'whatsapp' => 'nullable|string',
                'landline' => 'nullable|string',
                'email' => 'nullable|email',
                'opening_time' => 'nullable|string',
                'closing_time' => 'nullable|string',
                'address' => 'nullable|string',
            ]);

            $branch = Branch::findOrFail($id);
            $branch->name = $validated['name'];
            $branch->phone = $validated['phone'] ?? null;
            $branch->whatsapp = $validated['whatsapp'] ?? null;
            $branch->landline = $validated['landline'] ?? null;
            $branch->email = $validated['email'] ?? null;
            $branch->opening_date = $validated['opening_date'] ?? null;
            $branch->opening_time = $validated['opening_time'] ?? null;
            $branch->closing_time = $validated['closing_time'] ?? null;
            $branch->address = $validated['address'] ?? null;
            $branch->save();

            $activeTab = [
                'liaison_office' => 'liaison_office',
                'branch_office' => 'branch_office',
                'regional_office' => 'regional_office',
                'zonal_office' => 'zonal_office',
                'area_office' => 'area_office',
            ][$branch->type] ?? 'branch_office';
            return redirect()->route('branch.index')->with('success', 'Branch updated successfully!')->with('activeTab', $activeTab);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update branch: ' . $e->getMessage());
        }
    }


    public function branchDestroy($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();
        $activeTab = [
            'liaison_office' => 'liaison_office',
            'branch_office' => 'branch_office',
            'regional_office' => 'regional_office',
            'zonal_office' => 'zonal_office',
            'area_office' => 'area_office',
        ][$branch->type] ?? 'branch_office';
        return redirect()->route('branch.index')->with('danger', 'Branch deleted successfully.')->with('activeTab', $activeTab);
    }

    public function storeAssignment(Request $request)
    {
        $request->validate([
            'parent_id' => 'required|exists:branches,id',
            'child_id' => 'required|array',
            'child_id.*' => 'exists:branches,id',
        ]);

        try {
            foreach ($request->child_id as $childId) {
                // This will throw an exception if there is a duplicate entry
                BranchAssignment::create([
                    'parent_id' => $request->parent_id,
                    'child_id' => $childId,
                ]);
            }

            $branch = Branch::findOrFail($request->parent_id);
            $activeTab = [
                'liaison_office' => 'liaison_office',
                'branch_office' => 'branch_office',
                'regional_office' => 'regional_office',
                'zonal_office' => 'zonal_office',
                'area_office' => 'area_office',
            ][$branch->type] ?? 'branch_office';

            return redirect()->route('branch.index')->with('success', 'Branch assigned successfully.')->with('activeTab', $activeTab);
        } catch (\Illuminate\Database\QueryException $e) {
            // Check if it's a duplicate entry error
            if ($e->getCode() == 23000) {
                // You can return a custom message or flash data to the session
                return back()->with('error', 'Your selected item is already assigned')->withInput();
            }

            // If it's some other database error, just throw it
            throw $e;
        }
    }

    public function assignedBranchDestroy($id){
        $assignedBranch = BranchAssignment::where('child_id',$id);
        $assignedBranch->delete();
        return response()->json(['message' => 'Branch removed successfully.']);
    }

}
