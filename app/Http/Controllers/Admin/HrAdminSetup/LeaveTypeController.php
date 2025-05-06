<?php

namespace App\Http\Controllers\Admin\HrAdminSetup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\HrAdminSetup\LeaveType;
use App\Models\Admin\HrAdminSetup\Department;
use App\Models\Admin\HrAdminSetup\Designation;
use App\Models\Admin\SystemConfiguration\Leave;
use App\Models\Admin\SystemConfiguration\LeaveQuota;
use App\Models\Admin\SystemConfiguration\LeaveDuration;
use App\Models\Admin\HrAdminSetup\LeaveTypeAndDepartment;
use App\Models\Admin\SystemConfiguration\CarryForwardLimit;
use App\Models\Admin\SystemConfiguration\Gender;
use App\Models\Admin\SystemConfiguration\NotificationPeriod;
use App\Models\Admin\SystemConfiguration\Religion;

class LeaveTypeController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        $designations = Designation::all();
        $leaves = Leave::where('status', true)->get();
        $leavequota = LeaveQuota::where('status', true)->get();
        $leaveduration = LeaveDuration::where('status', true)->get();
        $notificationperiod = NotificationPeriod::where('status', true)->get();
        $carryforwardlimit = CarryForwardLimit::where('status', true)->get();
        $leavetypes = LeaveType::with('leaveTypeAndDepartment.department')->get();
        $genders = Gender::where('status', true)->get();
        $religions = Religion::where('status', true)->get();
        // dd($departments);
        return view('admin.hr-admin-setup.leave-type.index',compact(
            'departments','designations','leavetypes','leaves','leavequota',
            'leaveduration','notificationperiod','carryforwardlimit','genders','religions'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'leave_name' => 'required|string|max:255',
            'leave_duration_id' => 'nullable',
            'leave_reasons' => 'nullable|string',
            'notification_period_id' => 'nullable',
            'carry_forward_limit_id' => 'nullable',
            'status' => 'nullable|boolean',
        ]);

        $gender_id = null;
        $religion_id = null;

        if ($request->available_for === 'gender_wise' && $request->has('gender_id')) {
            $gender_id = $request->gender_id;
        }

        if ($request->available_for === 'religion_wise' && $request->has('religion_id')) {
            $religion_id = $request->religion_id;
        }

        $leaveType = LeaveType::create([
            'leave_name' => $request->leave_name,
            'leave_days' => $request->leave_days,
            'available_for' => $request->available_for,
            'gender_id' => $gender_id,
            'religion_id' => $religion_id,
            'available_from' => $request->available_from,
            'applicable_after' => $request->applicable_after,
            'leave_duration_id' => $request->leave_duration_id,
            'allocation_method' => $request->allocation_method,
            'notification_period_id' => $request->notification_period_id,
            'carry_forward_limit_id' => $request->carry_forward_limit_id,
            'send_email' => $request->has('send_email') ? 1 : 0,
            'created_by' => Auth::user()->id,
            'status' => $request->status ?? true,
        ]);
        return redirect()->route('leavetype.index')->with('success', 'Leave Type created successfully.');
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'leave_name' => 'required|string|max:255',
            'leave_duration_id' => 'nullable',
            'leave_reasons' => 'nullable|string',
            'notification_period_id' => 'nullable',
            'carry_forward_limit_id' => 'nullable',
            'status' => 'nullable|boolean',
        ]);

        $leaveType = LeaveType::findOrFail($id);

        $gender_id = null;
        $religion_id = null;

        if ($request->available_for === 'gender_wise' && $request->has('gender_id')) {
            $gender_id = $request->gender_id;
        }

        if ($request->available_for === 'religion_wise' && $request->has('religion_id')) {
            $religion_id = $request->religion_id;
        }

        $leaveType->update([
            'leave_name' => $request->leave_name,
            'leave_days' => $request->leave_days,
            'available_for' => $request->available_for,
            'gender_id' => $gender_id,
            'religion_id' => $religion_id,
            'available_from' => $request->available_from,
            'applicable_after' => $request->applicable_after,
            'leave_duration_id' => $request->leave_duration_id,
            'allocation_method' => $request->allocation_method,
            'notification_period_id' => $request->notification_period_id,
            'carry_forward_limit_id' => $request->carry_forward_limit_id,
            'send_email' => $request->has('send_email') ? 1 : 0,
            'status' => $request->status ?? true,
        ]);

        return redirect()->route('leavetype.index')->with('success', 'Leave Type updated successfully.');
    }

    public function destroy($id)
    {
        $leavetype = LeaveType::findOrFail($id);
        LeaveTypeAndDepartment::where('leave_type_id', $leavetype->id)->delete();
        $leavetype->delete();
        return redirect()->route('leavetype.index')->with('success', 'LeaveType deleted successfully.');
    }
    public function getDesignations($departmentId)
    {
        $designations = Designation::where('department_id', $departmentId)->where('status',1)->get();
        return response()->json($designations);
    }

    public function leavetypeToggle($id){
        $leavetype = LeaveType::findOrFail($id);
        $leavetype->status = !$leavetype->status;
        $leavetype->save();
        return redirect()->route('leavetype.index')->with('success', 'leavetype status updated!');
    }

    public function departmentAssignment(Request $request)
    {
        $request->validate([
            'leave_type_id' => 'required|exists:leave_types,id',
            'department_id' => 'required|array',
            'department_id.*' => 'exists:departments,id',
        ]);

        try {
            foreach ($request->department_id as $departmentId) {
                LeaveTypeAndDepartment::create([
                    'leave_type_id' => $request->leave_type_id,
                    'department_id' => $departmentId,
                ]);
            }
            return redirect()->route('leavetype.index')->with('success', 'Department assigned successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) {
                return back()->with('error', 'Department is already assigned.')->withInput();
            }
            throw $e;
        }
    }

    public function leaveTypeDestroy($id){
        $leaveType = LeaveTypeAndDepartment::findOrFail($id);
        $leaveType->delete();

        return response()->json(['message' => 'Department removed from leave successfully.']);
    }



}
