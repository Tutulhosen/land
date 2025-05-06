<?php

namespace App\Http\Controllers\Admin\Attendance;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\Admin\HrAdminSetup\Attendance;
use App\Models\Admin\HrAdminSetup\Department;
use App\Models\Admin\SystemConfiguration\Branch;
use App\Models\Admin\Employee\EmployeeOfficialInformation;
use App\Models\Admin\Employee\EmployeePersonalInformation;

class AttendanceController extends Controller
{

    public function attendance(Request $request)
    {
        if ($request->ajax()) {
            $attendances = Attendance::with(['employee.salutations', 'employee.officialInformation.designation', 'shift'])
                ->orderBy('created_at', 'desc');
    
            // Apply Filters Based on Request
            if (!empty($request->branch_id)) {
                $attendances->whereHas('employee.officialInformation', function ($q) use ($request) {
                    $q->where('branch_id', $request->branch_id);
                });
            }
    
            if (!empty($request->department_id)) {
                $attendances->whereHas('employee.officialInformation', function ($q) use ($request) {
                    $q->where('department_id', $request->department_id);
                });
            }
    
            if (!empty($request->designation_id)) {
                $attendances->whereHas('employee.officialInformation', function ($q) use ($request) {
                    $q->where('designation_id', $request->designation_id);
                });
            }
    
            if (!empty($request->employee_id)) {
                $attendances->where('employee_id', $request->employee_id);
            }
    
            if (!empty($request->from_date)) {
                $attendances->whereDate('date', '>=', $request->from_date);
            }
    
            if (!empty($request->to_date)) {
                $attendances->whereDate('date', '<=', $request->to_date);
            }
    
            return DataTables::of($attendances)
                ->addIndexColumn()
                ->addColumn('employee', function ($attendance) {
                    return '<i class="bx bx-user-circle"></i> ' .
                        ($attendance->employee->salutations ? $attendance->employee->salutations->name . ' ' : '') .
                        $attendance->employee->first_name . ' ' . $attendance->employee->last_name .
                        '<br><small>' . $attendance->employee->emp_id . '</small><br>' .
                        ($attendance->employee->officialInformation->first() ?
                            ($attendance->employee->officialInformation->first()->designation ?
                                $attendance->employee->officialInformation->first()->designation->designation_name : "N/A") : "N/A");
                })
                ->addColumn('date', function ($attendance) {
                    return Carbon::parse($attendance->date)->format('d-M-Y');
                })
                ->addColumn('punch_in', function ($attendance) {
                    if ($attendance->check_in) {
                        return '<span class="badge bg-secondary">' .
                                Carbon::parse($attendance->check_in)->format('h:i a') .
                            '</span>';
                    }
                    return '<span class="badge bg-danger">CheckIn Missing</span>';
                })
                ->addColumn('punch_out', function ($attendance) {
                    if ($attendance->check_out) {
                        return '<span class="badge bg-secondary">' .
                            Carbon::parse($attendance->check_out)->format('h:i a') .
                            '</span>';
                    }
                    return '<span class="badge bg-danger">Checkout Missing</span>';
                })
                ->addColumn('status', function ($attendance) {
                    $statusLabel = match ($attendance->status) {
                        'Present' => 'bg-success',
                        'Absent' => 'bg-danger',
                        'Half Day' => 'bg-warning',
                        default => 'bg-info',
                    };
                    $statusHTML = '<span class="text-light ' . $statusLabel . ' px-2 py-1 rounded">' . $attendance->status . '</span>';
                    if ($attendance->late > 0) {
                        $statusHTML .= '<br><span class="text-light bg-warning px-2 py-1 rounded m-1">Late</span>';
                    }
                    return $statusHTML;
                })
                ->addColumn('late', function ($attendance) {
                    return $attendance->late . ' min';
                })
                ->addColumn('shift_hour', function ($attendance) {
                    return '<button class="btn status-box-1 mb-1">' . $attendance->shift->shift_name . '</button><br>';
                })
                ->addColumn('working_hour', function ($attendance) {
                    return $attendance->total_hours ?? 0 . ' Hrs';
                })
                ->addColumn('overtime', function ($attendance) {
                    return $attendance->overtime_hours . ' mins';
                })
                ->addColumn('device', function ($attendance) {
                    return '<span>' . $attendance->device_id . '</span><br><span>' . $attendance->ip_address . '</span>';
                })
                ->rawColumns(['employee', 'punch_in', 'punch_out', 'status', 'shift_hour', 'device'])
                ->make(true);
        }
    
        $branches = Branch::where('status', 1)->orderBy('name', 'asc')->get();
        $departments = Department::where('status', 1)->get();
        return view('admin.attendance.attendance_history', compact('branches', 'departments'));
    }
    

    public function index()
    {
        $departments = Department::where('status', 1)->get();
        $employees = EmployeePersonalInformation::where('status', 1)->get();
        return view('admin.attendance.attendance', compact('departments', 'employees'));
    }

    public function store(Request $request)
    {
        try {
            $attendance = Attendance::updateOrCreate(
                ['employee_id' => $request->employee_id, 'date' => $request->date],
                [
                    'check_in' => $request->check_in,
                    'check_out' => $request->check_out,
                    'shift_id' => $request->shift,
                    'total_hours' => $request->working_hours,
                    'late' => $request->late_minutes,
                    'overtime_hours' => $request->overtime_minutes,
                    'status' => $request->status,
                    'device_id' => 'web',
                    'ip_address' => $request->ip(),
                    'created_by' => auth()->user()->id,
                ]
            );

            return response()->json(['success' => true, 'message' => 'Attendance saved successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to save attendance.'.$e->getMessage()]);
        }
    }


    public function getDepartmentEmployees(Request $request)
    {
        $employeeIds = EmployeeOfficialInformation::where('department_id', $request->department_id)
            ->pluck('emp_personal_id');
        $date = $request->date;

        $employees = EmployeePersonalInformation::whereIn('id', $employeeIds)
            ->with([
                'officialInformation.designation',
                'payRollInformation.shift',
                'attendance' => function ($query)use ($date) {
                    $query->whereDate('date', $date);
                }
            ])
            ->get();

        return response()->json($employees);
    }

    public function getSelectedEmployees(Request $request)
    {
        $date = $request->date;
        $employees = EmployeePersonalInformation::whereIn('id', $request->employee_ids)
            ->with([
                'officialInformation.designation',
                'payRollInformation.shift',
                'attendance' => function ($query) use ($date) { // Use `use ($date)`
                    $query->whereDate('date', $date);
                }
            ])
            ->get();

        return response()->json($employees);
    }

    public function designationWiseEmployee(Request $request)
    {
        // dd($request->all());
        if ($request->branchId == null) {
            $employeeIds = EmployeeOfficialInformation::where('designation_id', $request->designationId)
            ->where('department_id', $request->departmentId)
            ->pluck('emp_personal_id');
        }else{
            $employeeIds = EmployeeOfficialInformation::where('designation_id', $request->designationId)
            ->where('department_id', $request->departmentId)
            ->where('branch_id', $request->branchId)
            ->pluck('emp_personal_id');
        }
        
        $employees = EmployeePersonalInformation::whereIn('id', $employeeIds)
                    ->select('id', 'first_name', 'last_name')
                    ->get();

        return response()->json($employees);
    }

}
