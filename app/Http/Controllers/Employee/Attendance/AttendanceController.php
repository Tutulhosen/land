<?php

namespace App\Http\Controllers\Employee\Attendance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\HrAdminSetup\Attendance;

class AttendanceController extends Controller
{
    public function employeeAttendance() {
        $auth_id = Auth::user()->employee->id;
        $attendances = Attendance::where('employee_id', $auth_id)->orderBy('created_at', 'desc')->take(5)->get();
        return view('employee.attendance.attendance',compact(
            'attendances'
        ));
    }
}
