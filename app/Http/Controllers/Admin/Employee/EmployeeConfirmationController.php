<?php

namespace App\Http\Controllers\Admin\Employee;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\Employee\EmployeeConfirmOrExtend;
use App\Models\Admin\HrAdminSetup\Department;
use App\Models\Admin\HrAdminSetup\Designation;
use App\Models\Admin\SystemConfiguration\Branch;
use App\Models\Admin\Employee\EmployeePayRollInformation;
use App\Models\Admin\Employee\EmployeeOfficialInformation;
use App\Models\Admin\Employee\EmployeePersonalInformation;
use Illuminate\Support\Facades\Auth;

class EmployeeConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $confrimemployees = EmployeeConfirmOrExtend::with('employee')->get();
        return view('admin.employee.confirmation.index', compact('confrimemployees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::where('status', true)->orderBy('department_name', 'asc')->get();
        $designations = Designation::where('status', true)->orderBy('designation_name', 'asc')->get();
        $branches =  Branch::where('status', true)->orderBy('name', 'asc')->get();
         return view('admin.employee.confirmation.create',compact('departments','designations','branches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employee_personal_information,id',
            'confirmation_date' => 'nullable|string',
            'confirmation_branch' => 'nullable|string',
            'confirmation_department' => 'nullable|string',
            'confirmation_designation' => 'nullable|string',
            'confirmation_grade' => 'nullable|string',
            'confirmation_reporting_to_first' => 'nullable|string',
            'confirmation_reporting_to_second' => 'nullable|string',
            'confirmation_reporting_to_third' => 'nullable|string',
            'new_probation_date' => 'nullable|string',
        ]);

        if($request->confirm_or_extend){
            DB::beginTransaction();
            try {
                $officialInformation = EmployeeOfficialInformation::where('emp_personal_id', $request->employee_id)->first();
                $personalInformation = EmployeePersonalInformation::where('id', $request->employee_id)->first();

                EmployeeConfirmOrExtend::create([
                    'employee_id' => $request->employee_id,
                    'confirm_or_extend' => $request->confirm_or_extend,
                    'confirmation_date' => $request->confirmation_date,
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
                    'old_probation_date' =>  null,
                    'new_probation_date' =>  null,
                    'created_by' =>  Auth::user()->id,
                ]);

                if($personalInformation){
                    $personalInformation->is_confirmed = true;
                    $personalInformation->save();
                }


                if ($officialInformation) {
                    $officialInformation->branch_id = $validatedData['confirmation_branch'] ?? $officialInformation->branch_id;
                    $officialInformation->department_id = $validatedData['confirmation_department'] ?? $officialInformation->department_id;
                    $officialInformation->designation_id = $validatedData['confirmation_designation'] ?? $officialInformation->designation_id;
                    $officialInformation->grade_id = $validatedData['confirmation_grade'] ?? $officialInformation->grade_id;
                    $officialInformation->reporting_to_first = $validatedData['confirmation_reporting_to_first'] ?? $officialInformation->reporting_to_first;
                    $officialInformation->reporting_to_second = $validatedData['confirmation_reporting_to_second'] ?? $officialInformation->reporting_to_second;
                    $officialInformation->reporting_to_third = $validatedData['confirmation_reporting_to_third'] ?? $officialInformation->reporting_to_third;
                    $officialInformation->save();
                }


                DB::commit();
                return redirect()->route('employee.confirmation.index')->with(['success' => 'Employee confirmation updated successfully'], 200);
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('employee.confirmation.index')->with(['error' => 'An error occurred while updating information', 'details' => $e->getMessage()], 500);
            }
        }else{
            DB::beginTransaction();
            try {
                $officialpayRoll = EmployeePayRollInformation::where('emp_personal_id', $request->employee_id)->first();
                EmployeeConfirmOrExtend::create([
                    'employee_id' => $request->employee_id,
                    'confirm_or_extend' => $request->confirm_or_extend,
                    'old_branch' => null,
                    'old_department' =>  null,
                    'old_designation' => null,
                    'old_grade' => null,
                    'old_reporting_to_first' => null,
                    'old_reporting_to_second' => null,
                    'old_reporting_to_third' => null,
                    'new_branch' => null,
                    'new_department' => null,
                    'new_designation' => null,
                    'new_grade' => null,
                    'new_reporting_to_first' => null,
                    'new_reporting_to_second' => null,
                    'new_reporting_to_third' => null,
                    'old_probation_date' => $officialpayRoll->probation_period_end_date ?? null,
                    'new_probation_date' => $validatedData['new_probation_date'] ?? null,
                    'created_by' =>  Auth::user()->id,
                ]);



                if($officialpayRoll){
                    $officialpayRoll->probation_period_end_date = $validatedData['new_probation_date'] ?? $officialpayRoll->probation_period_end_date;
                    $officialpayRoll->save();
                }

                DB::commit();
                return redirect()->route('employee.confirmation.index')->with(['success' => 'Employee probation date extend successfully'], 200);
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('employee.confirmation.index')->with(['error' => 'An error occurred while updating information', 'details' => $e->getMessage()], 500);
            }
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
                $query->where('department_id', $departmentId)->where('is_confirmed', false);
            })
            ->whereHas('payRollInformation', function($query) {
                $query->where('probation_period_end_date', '>=', now());
            })
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
