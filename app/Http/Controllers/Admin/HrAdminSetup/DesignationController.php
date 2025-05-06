<?php

namespace App\Http\Controllers\Admin\HrAdminSetup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\HrAdminSetup\Department;
use App\Models\Admin\HrAdminSetup\Designation;

class DesignationController extends Controller
{
    public function index()
    {
        $designations = Designation::all();
        $departments = Department::where('status', 1)->get();
        return view('admin.hr-admin-setup.designation.index',compact(
            'departments','designations'
        ));
    }
    public function store(Request $request)
    {
        $request->validate([
            'designation_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'status' => 'nullable|boolean',
        ]);

        $lastDesignation = Designation::latest('id')->first();
        $lastId = $lastDesignation ? (int) substr($lastDesignation->designation_id, 4) : 0;
        $designationId = 'DSG-' . str_pad($lastId + 1, 2, '0', STR_PAD_LEFT);

        $designation = new Designation();
        $designation->designation_name = $request->designation_name;
        $designation->designation_id = $designationId;
        $designation->description = $request->description;
        $designation->department_id = $request->department_id;
        $designation->status = $request->status;

        $designation->save();

        return redirect()->route('designation.index')->with('success', 'Designation successfully added!');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
           'designation_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'status' => 'nullable|boolean',
        ]);
        $designation = Designation::findOrFail($id);
        $designation->designation_name = $request->designation_name;
        $designation->description = $request->description;
        $designation->department_id = $request->department_id;
        $designation->status = $request->status;
        $designation->save();

        return redirect()->route('designation.index')->with('success', 'Designation updated successfully.');
    }
    public function destroy($id)
    {
        $designation = Designation::findOrFail($id);
        $designation->delete();
        return redirect()->route('designation.index')->with('success', 'Designation deleted successfully.');
    }

    public function designationToggle($id){
        $designation = Designation::findOrFail($id);
        $designation->status = !$designation->status;
        $designation->save();
        return redirect()->route('designation.index')->with('success', 'Designation status updated!');
    }


}
