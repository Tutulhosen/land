<?php

namespace App\Http\Controllers\Employee\Leave;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\HrAdminSetup\LeaveType;
use App\Models\Admin\LeaveManagement\LeaveApplication;

class LeaveApplicationController extends Controller
{
    private function handleFileUpload($file, $path)
    {
        $uniqueId = str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);
        $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $fileExtension = $file->getClientOriginalExtension();
        $fileName = $originalFileName . '-' . $uniqueId . '.' . $fileExtension;
        return $file->storeAs('uploads/' . $path, $fileName, 'public');
    }
    public function employeeLeaveApplications() {
        $auth_id = Auth::user()->employee->id;
        $gender = Auth::user()->employee->gender;
        $religion = Auth::user()->employee->religion;
        $leaveTypes = LeaveType::where(function ($query) use ($gender, $religion) {
            $query->orWhere('available_for', 'all_employee');
            if ($gender) {
                $query->orWhere('available_for', 'gender_wise')->where('gender_id', $gender);
            }
            if ($religion) {
                $query->orWhere('available_for', 'religion_wise')->where('religion_id', $religion);
            }
        })->get();
        $leaveApplications = LeaveApplication::with(['leaveType'])->where('employee_id', $auth_id)->orderBy('id','desc')->get();
        return view('employee.leave.leave-applications',compact(
            'leaveApplications','leaveTypes'
        ));
    }

    public function getLeaveDays($leaveTypeId)
    {
        $leaveType = LeaveType::find($leaveTypeId);
        if (!$leaveType) {
            return response()->json(['leave_days' => 0], 404);
        }
        return response()->json(['leave_days' => $leaveType->leave_days]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'employee_id' => 'required|exists:employee_personal_information,id',
            'leave_type_id' => 'required|exists:leave_types,id',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'document' => 'nullable|file|mimes:pdf,jpg,png,docx|max:2048',
            'leave_reason' => 'required|string|max:500',
        ]);

        $documentPath = null;
        if ($request->hasFile('document')) {
            $documentPath = $this->handleFileUpload($request->file('document'), 'leave_documents');
        }

        $leaveApplication = LeaveApplication::create([
            'department_id' => $request->department_id,
            'employee_id' => $request->employee_id,
            'leave_type_id' => $request->leave_type_id,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'document' => $documentPath,
            'leave_reason' => $request->leave_reason,
            'status' => 'pending',
        ]);

        return redirect()->route('employee-leave-applications')->with('success', 'Leave application created successfully!');
    }
}
