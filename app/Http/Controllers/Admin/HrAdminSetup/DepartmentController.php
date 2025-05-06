<?php

namespace App\Http\Controllers\Admin\HrAdminSetup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\HrAdminSetup\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('admin.hr-admin-setup.department.index',compact(
            'departments',
        ));
    }
    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|boolean',
        ]);
        // department id auto generate start
        $lastDepartment = Department::latest('id')->first();
        $lastId = $lastDepartment ? (int) substr($lastDepartment->department_id, 5) : 0;
        $departmentId = 'DPRT-' . str_pad($lastId + 1, 2, '0', STR_PAD_LEFT);
        // department id auto generate end
        $department = new Department();
        $department->department_name = $request->department_name;
        $department->department_id = $departmentId;
        $department->description = $request->description;
        $department->status = $request->status;
        $department->save();
        return redirect()->route('department.index')->with('success', 'Department successfully added!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|boolean',
        ]);
        $department = Department::findOrFail($id);
        $department->department_name = $request->department_name;
        $department->description = $request->description;
        $department->status = $request->status;
        $department->save();

        return redirect()->route('department.index')->with('success', 'Department updated successfully.');
    }



    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        if ($department->designation()->exists()) {
            return redirect()->route('department.index')->with('success', 'Cannot delete Department as it is associated with Designation.');
        }
        $department->delete();
        return redirect()->route('department.index')->with('danger', 'Department deleted successfully.');
    }

    public function departmentToggle($id){
        $department = Department::findOrFail($id);
        $department->status = !$department->status;
        $department->save();
        return redirect()->route('department.index')->with('success', 'Department status updated!');
    }
}


