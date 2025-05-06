<?php

namespace App\Http\Controllers\Admin\LeaveManagement;

use App\Models\UserBranch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\HrAdminSetup\LeaveType;
use App\Models\Admin\HrAdminSetup\Department;
use App\Models\Admin\LeaveManagement\LeaveApplication;
use App\Models\Admin\Employee\EmployeeOfficialInformation;
use App\Models\Admin\Employee\EmployeePersonalInformation;

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
    private function handleFileDelete($filePath)
    {
        if ($filePath && Storage::exists('public/' . $filePath)) {
            Storage::delete('public/' . $filePath);
        }
    }

    public function index() {
        $departments = Department::where('status', true)->get();
        $employees = EmployeePersonalInformation::where('status', true)->get();

        $leave_types = LeaveType::where('status', true)->get();
        $branchId = null;
        if (Auth::user()->is_superadmin != 1) {
            $branchId = UserBranch::where('user_id', Auth::id())->value('branch_id');
            if ($branchId) {
                $employeesofficial = EmployeeOfficialInformation::with('employee')
                    ->where('branch_id', $branchId)
                    ->get();

                $empPersonalIds = $employeesofficial->pluck('emp_personal_id')->unique();
                $leaveApplications = LeaveApplication::whereIn('employee_id', $empPersonalIds)->with(['employee.officialInformation.department.designation','leaveType','employee.salutations'])->where('status', 'pending')->orderBy('id','desc')->get();
                $leaveApplicationscount = LeaveApplication::whereIn('employee_id', $empPersonalIds)->with(['employee.officialInformation.department.designation','leaveType','employee.salutations'])->whereNot('status', 'pending')->orderBy('id','desc')->get();

            } else {
                $leaveApplications = collect();
            }
        } else {
            $leaveApplications = LeaveApplication::with(['employee.officialInformation.department.designation','leaveType','employee.salutations'])->where('status', 'pending')->orderBy('id','desc')->get();
            $leaveApplicationscount = LeaveApplication::with(['employee.officialInformation.department.designation','leaveType','employee.salutations'])->whereNot('status', 'pending')->orderBy('id','desc')->get();
        }

        $totalLeaveRequests = $leaveApplications->where('status', 'pending')->count() + $leaveApplicationscount->where('status', 'approved')->count() + $leaveApplicationscount->where('status', 'rejected')->count();
        $approvedLeave = $leaveApplicationscount->where('status', 'approved')->count();
        $rejectedLeave = $leaveApplicationscount->where('status', 'rejected')->count();
        $pendingLeave = $leaveApplications->where('status', 'pending')->count();
        return view('admin.leave-management.leave-application.index', compact(
            'departments', 'employees', 'leave_types','leaveApplications',
            'totalLeaveRequests', 'approvedLeave', 'rejectedLeave', 'pendingLeave'
        ));
    }


    public function approveReject() {
        $departments = Department::where('status', true)->get();
        $employees = EmployeePersonalInformation::where('status', true)->get();

        $leave_types = LeaveType::where('status', true)->get();
        $branchId = null;
        if (Auth::user()->is_superadmin != 1) {
            $branchId = UserBranch::where('user_id', Auth::id())->value('branch_id');
            if ($branchId) {
                $employeesofficial = EmployeeOfficialInformation::with('employee')
                    ->where('branch_id', $branchId)
                    ->get();

                $empPersonalIds = $employeesofficial->pluck('emp_personal_id')->unique();
                $leaveApplications = LeaveApplication::whereIn('employee_id', $empPersonalIds)->with(['employee.officialInformation.department.designation','leaveType','employee.salutations'])->whereNot('status', 'pending')->orderBy('id','desc')->get();

            } else {
                $leaveApplications = collect();
            }
        } else {
            $leaveApplications = LeaveApplication::with(['employee.officialInformation.department.designation','leaveType','employee.salutations'])->whereNot('status', 'pending')->orderBy('id','desc')->get();
        }

        $totalLeaveRequests = $leaveApplications->count();
        $approvedLeave = $leaveApplications->where('status', 'approved')->count();
        $rejectedLeave = $leaveApplications->where('status', 'rejected')->count();
        $pendingLeave = $leaveApplications->where('status', 'pending')->count();
        return view('admin.leave-management.leave-approve-reject.index', compact(
            'departments', 'employees', 'leave_types','leaveApplications',
            'totalLeaveRequests', 'approvedLeave', 'rejectedLeave', 'pendingLeave'
        ));
    }

    public function getEmployees($department_id)
    {
        $employees = EmployeeOfficialInformation::where('department_id', $department_id)
            ->whereHas('employee.salutations', function($query) {
                $query->where('status', true);
            })
            ->with('employee')
            ->get();

            $branchId = null;

            if (Auth::user()->is_superadmin != 1) {
                $branchId = UserBranch::where('user_id', Auth::id())->value('branch_id');

                if ($branchId) {
                    $employees = $employees->where('branch_id', $branchId);
                }
            }

        $employeeList = $employees->map(function ($employeeInfo) {
            return [
                'id' => $employeeInfo->employee->id,
                'salutation' => $employeeInfo->employee->salutations->name,
                'first_name' => $employeeInfo->employee->first_name,
                'last_name' => $employeeInfo->employee->last_name,
            ];
        });
        return response()->json($employeeList);
    }

    public function getLeaveTypesByEmployee($employee_id)
    {
        $employee = EmployeePersonalInformation::where('id', $employee_id)->first();
        if (!$employee) {
            return response()->json([], 404);
        }
        $gender = $employee->gender;
        $religion = $employee->religion;
        $leaveTypes = LeaveType::where(function ($query) use ($gender, $religion) {
            $query->orWhere('available_for', 'all_employee');
            if ($gender) {
                $query->orWhere('available_for', 'gender_wise')->where('gender_id', $gender);
            }
            if ($religion) {
                $query->orWhere('available_for', 'religion_wise')->where('religion_id', $religion);
            }
        })
        ->get();
        return response()->json($leaveTypes);
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

        $auth_id = Auth::user()->id;

        $leaveApplication = LeaveApplication::create([
            'department_id' => $request->department_id,
            'employee_id' => $request->employee_id,
            'leave_type_id' => $request->leave_type_id,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'document' => $documentPath,
            'leave_reason' => $request->leave_reason,
            'status' => 'approved',
            'decided_by' => $auth_id,
            'decided_at' => now(),
        ]);

        return redirect()->route('leave-application.index')->with('success', 'Leave application created successfully!');
    }

    public function updateStatus($id, Request $request)
    {
        $leave = LeaveApplication::find($id);
        if ($leave) {
            $leave->status = $request->status;
            $leave->reason = $request->reason;
            $leave->decided_by = Auth::user()->id;
            $leave->decided_at = now();
            $leave->save();
            return redirect()->route('leave-application.index')->with('success', 'Leave status updated successfully.');
        }
    }

}
