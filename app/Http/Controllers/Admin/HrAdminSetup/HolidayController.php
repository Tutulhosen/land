<?php

namespace App\Http\Controllers\Admin\HrAdminSetup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\HrAdminSetup\Shift;
use App\Models\Admin\HrAdminSetup\Holiday;
use App\Models\Admin\HrAdminSetup\Department;
use App\Models\Admin\HrAdminSetup\ShiftAndDepartment;
use App\Models\Admin\SystemConfiguration\HolidayType;

class HolidayController extends Controller
{
    public function index()
    {
        $departments = Department::where('status',1)->get();
        $shifts = Shift::where('status',1)->get();
        $holidays = Holiday::with('department')->get();
        // return $holidays ;
        $holidayTypes = HolidayType::all();
        return view('admin.hr-admin-setup.holiday.index',compact(
            'departments',
            'shifts',
            'holidays',
            'holidayTypes',
        ));

    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'holiday_name' => 'required|string|max:255',
            'holiday_type' => 'required|string',
            'description' => 'nullable|string',
            'department_id' => 'nullable|exists:departments,id',
            'duration' => 'nullable|string|max:255',
            'start_date' => 'nullable|string',
            'end_date' => 'nullable|string',
            'created_by' => 'nullable|string',
            'status' => 'nullable|boolean',
        ]);

        // dd($validated);
        $holiday = Holiday::create($validated);
        return redirect()->route('holiday.index')->with('success', 'Holiday created successfully');
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'holiday_name' => 'nullable|string|max:255',
            'holiday_type' => 'nullable|string',
            'description' => 'nullable|string',
            'department_id' => 'nullable|exists:departments,id',
            'duration' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'created_by' => 'nullable|string',
            'status' => 'nullable|boolean',
        ]);
        $holiday = Holiday::findOrFail($id);
        $holiday->update([
            'holiday_name' => $request->input('holiday_name'),
            'holiday_type' => $request->input('holiday_type'),
            'description' => $request->input('description'),
            'department_id' => $request->input('department_id'),
            'duration' => $request->input('duration'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'created_by' => $request->input('created_by'),
            'status' => $request->input('status'),
        ]);
        return redirect()->route('holiday.index')->with('success', 'Holiday updated successfully!');
    }
    public function destroy($id)
    {
        $holiday = Holiday::findOrFail($id);
        $holiday->delete();
        return redirect()->route('holiday.index')->with('danger', 'Holiday deleted successfully.');
    }


    public function holidayToggle($id){
        $holiday = Holiday::findOrFail($id);
        $holiday->status = !$holiday->status;
        $holiday->save();
        return redirect()->route('holiday.index')->with('success', 'Holiday status updated!');
    }

}
