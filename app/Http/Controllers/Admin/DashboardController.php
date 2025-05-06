<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\UserBranch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\HrAdminSetup\Attendance;
use App\Models\Admin\SystemConfiguration\Branch;
use App\Models\Admin\LeaveManagement\LeaveApplication;
use App\Models\Admin\Employee\EmployeeOfficialInformation;
use App\Models\Admin\Employee\EmployeePersonalInformation;
use App\Models\LoginActivity;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $branchcount = Branch::count();
        $usercount = User::count();
        $employeecount = EmployeePersonalInformation::count();

        $branchId = null;
        if (Auth::user()->is_superadmin != 1) {
            $branchId = UserBranch::where('user_id', Auth::id())->value('branch_id');
            if ($branchId) {
                $employeesofficial = EmployeeOfficialInformation::with('employee')
                    ->where('branch_id', $branchId)
                    ->get();

                $empPersonalIds = $employeesofficial->pluck('emp_personal_id')->unique();
                $leaveApplications = LeaveApplication::whereIn('employee_id', $empPersonalIds)->with(['employee.officialInformation.department.designation','leaveType','employee.salutations'])->where('status', 'pending')->orderBy('id','desc')->get();

            } else {
                $leaveApplications = collect();
            }
        } else {
            $leaveApplications = LeaveApplication::with(['employee.officialInformation.department.designation','leaveType','employee.salutations'])->where('status', 'pending')->orderBy('id','desc')->get();
        }
        $pendingLeave = $leaveApplications->where('status', 'pending')->count();

        $todayPresent = Attendance::where('date',date('Y-m-d'))->where('status','Present')->count();
        $todayAbsent = Attendance::where('date',date('Y-m-d'))->where('status','Absent')->count();
        $todayLeave = Attendance::where('date',date('Y-m-d'))->where('status','Leave')->count();
        $todayHoliday = Attendance::where('date',date('Y-m-d'))->where('status','Holiday')->count();
        $loginactivities = LoginActivity::orderBy('created_at', 'desc')->take(20)->get();
        return view('admin.dashboard',compact('branchcount','usercount','employeecount','todayPresent','todayAbsent','todayLeave','todayHoliday','pendingLeave','loginactivities'));
    }
}
