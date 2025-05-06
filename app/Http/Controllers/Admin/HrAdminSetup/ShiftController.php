<?php

namespace App\Http\Controllers\Admin\HrAdminSetup;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\HrAdminSetup\Shift;
use App\Models\Admin\HrAdminSetup\Department;
use App\Models\Admin\HrAdminSetup\Designation;
use App\Models\Admin\HrAdminSetup\ShiftAndDepartment;
use App\Models\Admin\SystemConfiguration\WeekOff;
use App\Models\Admin\SystemConfiguration\ShiftType;

class ShiftController extends Controller
{
    public function index()
    {
        $shifts = Shift::with('shiftAndDepartment.department')->get();
        // return $shifts;
        $departments = Department::where('status', 1)->get();
        $designations = Designation::where('status', 1)->get();
        $shift_types = ShiftType::where('status', 1)->get();
        return view('admin.hr-admin-setup.shift.index',compact(
            'departments','shifts','designations','shift_types',
        ));

    }
    public function store(Request $request)
    {

        // return $request;
        $validated = $request->validate([
            'shift_name' => 'required|string|max:255',
            'shift_type_id' => 'nullable|exists:shift_types,id',
            'start_time' => 'nullable|string',
            'end_time' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'boolean',
        ]);

        // Create the shift
        $shift = Shift::create([
            'shift_name' => $validated['shift_name'],
            'shift_type_id' => $request->shift_type_id,
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'description' => $validated['description'],
            'send_email' => $request->has('send_email') ? 1 : 0,
            'status' => $request->status,
        ]);

        // Redirect back with a success message
        return redirect()->route('shift.index')->with('success', 'Shift created successfully');
    }



    public function update(Request $request, $id)
    {
        // Validate input data
        $validated = $request->validate([
            'shift_name' => 'required|string|max:255',
            'shift_type_id' => 'nullable|exists:shift_types,id',
            'start_time' => 'nullable|string',
            'end_time' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        // Find the shift
        $shift = Shift::findOrFail($id);


        // Update the shift record
        $shift->update([
            'shift_name' => $request->input('shift_name'),
            'shift_type_id' => $request->input('shift_type_id'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'description' => $request->input('description'),
            'send_email' => $request->has('send_email') ? 1 : 0,
        ]);

        // Redirect back with a success message
        return redirect()->route('shift.index')->with('success', 'Shift updated successfully!');
    }

    public function getDesignations($departmentId)
    {
        $designations = Designation::where('department_id', $departmentId)->where('status', 1)->get();
        return response()->json($designations);
    }

    public function destroy($id)
    {
        $shift = Shift::findOrFail($id);
        ShiftAndDepartment::where('shift_id', $shift->id)->delete();
        $shift->delete();
        return redirect()->route('shift.index')->with('success', 'Shift deleted successfully.');
    }

    public function shiftToggle($id){
        $shift = Shift::findOrFail($id);
        $shift->status = !$shift->status;
        $shift->save();
        return redirect()->route('shift.index')->with('success', 'Shift status updated!');
    }
    public function departmentAssignment(Request $request)
    {
        $request->validate([
            'shift_id' => 'required|exists:shifts,id',
            'department_id' => 'required|array',
            'department_id.*' => 'exists:departments,id',
        ]);

        try {
            foreach ($request->department_id as $departmentId) {
                ShiftAndDepartment::create([
                    'shift_id' => $request->shift_id,
                    'department_id' => $departmentId,
                ]);
            }
            return redirect()->route('shift.index')->with('success', 'Department assigned successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) {
                return back()->with('error', 'Department is already assigned.')->withInput();
            }
            throw $e;
        }
    }

    public function shiftDepartmentDestroy($id){
        $shiftDepartment = ShiftAndDepartment::findOrFail($id);
        $shiftDepartment->delete();

        return response()->json(['message' => 'Department removed from shift successfully.']);
    }
}


