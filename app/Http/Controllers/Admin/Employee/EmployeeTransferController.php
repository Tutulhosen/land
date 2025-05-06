<?php

namespace App\Http\Controllers\Admin\Employee;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\HrAdminSetup\Department;
use App\Models\Admin\HrAdminSetup\Designation;
use App\Models\Admin\SystemConfiguration\Branch;
use App\Models\Admin\Employee\EmployeeConfirmOrExtend;
use App\Models\Admin\Employee\EmployeePayRollInformation;
use App\Models\Admin\Employee\EmployeeOfficialInformation;
use App\Models\Admin\Employee\EmployeePersonalInformation;
use App\Models\Admin\Employee\EmployeeTransfer;
use Illuminate\Support\Facades\Log;

class EmployeeTransferController extends Controller
{
    public function index()
    {
        $confrimemployees = EmployeeTransfer::with('employee')->orderBy('created_at', 'desc')->get();
        return view('admin.employee.transfer.index', compact('confrimemployees'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::where('status', true)->orderBy('department_name', 'asc')->get();
        $designations = Designation::where('status', true)->orderBy('designation_name', 'asc')->get();
        $branches =  Branch::where('status', true)->orderBy('name', 'asc')->get();
         return view('admin.employee.transfer.create',compact('departments','designations','branches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employee_personal_information,id',
            'reporting_date' => 'nullable|string',
            'confirmation_branch' => 'nullable|string',
            'confirmation_department' => 'nullable|string',
            'confirmation_designation' => 'nullable|string',
            'confirmation_grade' => 'nullable|string',
            'confirmation_reporting_to_first' => 'nullable|string',
            'confirmation_reporting_to_second' => 'nullable|string',
            'confirmation_reporting_to_third' => 'nullable|string',
            'comment' => 'nullable|string',
        ]);

            DB::beginTransaction();
            try {
                $officialInformation = EmployeeOfficialInformation::where('emp_personal_id', $request->employee_id)->first();

                EmployeeTransfer::create([
                    'employee_id' => $request->employee_id,
                    'reporting_date' => $request->reporting_date,
                    'old_branch' => $officialInformation->branch_id ?? null,
                    'old_department' => $officialInformation->department_id ?? null,
                    'old_designation' => $officialInformation->designation_id ?? null,
                    'old_grade' => $officialInformation->grade_id ?? null,
                    'old_reporting_to_first' => $officialInformation->reporting_to_first ?? null,
                    'old_reporting_to_second' => $officialInformation->reporting_to_second ?? null,
                    'old_reporting_to_third' => $officialInformation->reporting_to_third ?? null,
                    'new_branch' => $validatedData['confirmation_branch'] ?? null,
                    'new_department' => $validatedData['confirmation_department'] ?? null,
                    'new_designation' => $validatedData['confirmation_designation'] ?? null,
                    'new_grade' => $validatedData['confirmation_grade'] ?? null,
                    'new_reporting_to_first' => $validatedData['confirmation_reporting_to_first'] ?? null,
                    'new_reporting_to_second' => $validatedData['confirmation_reporting_to_second'] ?? null,
                    'new_reporting_to_third' => $validatedData['confirmation_reporting_to_third'] ?? null,
                    'comment' => $request->comment,
                    'created_by' =>  Auth::user()->id,
                ]);

                if ($officialInformation) {
                    $officialInformation->branch_id = $validatedData['confirmation_branch'] ?? $officialInformation->branch_id;
                    $officialInformation->department_id = $validatedData['confirmation_department'] ?? $officialInformation->department_id;
                    $officialInformation->designation_id = $validatedData['confirmation_designation'] ?? $officialInformation->designation_id;
                    $officialInformation->grade_id = $validatedData['confirmation_grade'] ?? $officialInformation->grade_id;
                    $officialInformation->reporting_to_first = $validatedData['confirmation_reporting_to_first'] ? $validatedData['confirmation_reporting_to_first'] : null;
                    $officialInformation->reporting_to_second = $validatedData['confirmation_reporting_to_second'] ? $validatedData['confirmation_reporting_to_second'] : null;
                    $officialInformation->reporting_to_third = $validatedData['confirmation_reporting_to_third'] ? $validatedData['confirmation_reporting_to_third'] : null;
                    $officialInformation->save();
                }

                DB::commit();
                return redirect()->route('employee.transfer.index')->with(['success' => 'Employee Transfer successfully Done'], 200);
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error($e->getMessage());
                return redirect()->route('employee.transfer.index')->with(['error' => 'An error occurred while transfer Employee '.$e->getMessage(), 'details' => $e->getMessage()], 500);
            }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function getEmployees($departmentId, $branchId)
    {
        // dd($departmentId, $branchId);
        $employees = EmployeePersonalInformation::where('status', true)
            ->whereHas('officialInformation', function($query) use ($departmentId) {
                $query->where('department_id', $departmentId);
            })
            // ->whereHas('payRollInformation', function($query) {
            //     $query->where('probation_period_end_date', '<=', now());
            // })
            ->whereHas('officialInformation', function($query) use ($branchId) {
                $query->where('branch_id', $branchId);
            })
            ->with('salutations')
            ->get();
        return response()->json($employees);
    }

    public function getEmployeeInfo($employeeId)
    {
        $employeeInfo = EmployeePersonalInformation::where('status', true)
        ->with('salutations','officialInformation','payRollInformation','officialInformation.branch','officialInformation.department','officialInformation.designation','officialInformation.employeeGrade','officialInformation.reportingfirst','officialInformation.reportingfirst.salutations','officialInformation.reportingsecond','officialInformation.reportingsecond.salutations','officialInformation.reportingthird','officialInformation.reportingthird.salutations')
        ->findOrFail($employeeId);

        return response()->json($employeeInfo);
    }
}
