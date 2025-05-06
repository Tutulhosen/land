<?php

namespace App\Http\Controllers\Admin\Report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\HrAdminSetup\Department;
use App\Models\Admin\HrAdminSetup\Designation;
use App\Models\Admin\SystemConfiguration\Branch;
use App\Models\Admin\Employee\EmployeePersonalInformation;
use App\Models\Admin\SystemConfiguration\CompanyInformation;

class ReportController extends Controller
{
    public function employeeRegistrationReport()
    {
        $branches = Branch::where('status', 1)->orderBy('name','asc')->get();
        $departments = Department::where('status', 1)->orderBy('department_name','asc')->get();
        return view('admin.report.employee_registration_report', compact('branches', 'departments'));
    }
    public function searchEmployee(Request $request)
    {

        $branchId = $request->branchId;
        $departmentId = $request->departmentId;
        $designationId = $request->designationId;
        $status = $request->status;

        // Start the query
        $query = EmployeePersonalInformation::query();

        // Apply each filter condition if parameters are provided
        if ($status) {
            $query->where('status', $status);
        }

        if ($branchId) {
            $query->whereHas('officialInformation', function ($q) use ($branchId) {
                $q->where('branch_id', $branchId);
            });
        }

        if ($departmentId) {
            $query->whereHas('officialInformation', function ($q) use ($departmentId) {
                $q->where('department_id', $departmentId);
            });
        }

        if ($designationId) {
            $query->whereHas('officialInformation', function ($q) use ($designationId) {
                $q->where('designation_id', $designationId);
            });
        }
        $employees = $query
        ->with('salutations',
        'contact',
        'officialInformation',
        'payRollInformation',
        'officialInformation.branch',
        'officialInformation.employeeProject',
        'officialInformation.department',
        'officialInformation.designation',
        'officialInformation.employeeGrade',
        'officialInformation.reportingfirst',
        'officialInformation.reportingfirst.salutations',
        'officialInformation.reportingsecond',
        'officialInformation.reportingsecond.salutations',
        'officialInformation.reportingthird',
        'officialInformation.reportingthird.salutations')
        ->get();

        // Return the data as JSON response
        return response()->json($employees);
    }



    public function registrationPdf(Request $request)
    {
        // dd($request->all());
        $branchId = $request->branchId;
        $departmentId = $request->departmentId;
        $designationId = $request->designationId;
        $status = $request->status;

        $query = EmployeePersonalInformation::query();
        if ($status) {
            $query->where('status', $status);
        }

        if ($branchId) {
            $query->whereHas('officialInformation', function ($q) use ($branchId) {
                $q->where('branch_id', $branchId);
            });
        }

        if ($departmentId) {
            $query->whereHas('officialInformation', function ($q) use ($departmentId) {
                $q->where('department_id', $departmentId);
            });
        }

        if ($designationId) {
            $query->whereHas('officialInformation', function ($q) use ($designationId) {
                $q->where('designation_id', $designationId);
            });
        }
        $employees = $query
        ->with('salutations',
        'contact',
        'officialInformation',
        'payRollInformation',
        'officialInformation.branch',
        'officialInformation.employeeProject',
        'officialInformation.department',
        'officialInformation.designation',
        'officialInformation.employeeGrade',
        'officialInformation.reportingfirst',
        'officialInformation.reportingfirst.salutations',
        'officialInformation.reportingsecond',
        'officialInformation.reportingsecond.salutations',
        'officialInformation.reportingthird',
        'officialInformation.reportingthird.salutations')
        ->get();


        $companyInformation = CompanyInformation::first();

        $pdf = new \Mpdf\Mpdf([
            'orientation' => 'L'
        ]);

        // Load the view with the data you want to show in the PDF
        $pdfContent = view('admin.report.employee_registration_report_pdf', compact('employees','companyInformation'))->render();

        // Write the HTML content to the PDF
        $pdf->WriteHTML($pdfContent);

        // Output the PDF directly to the browser (force download)
        $pdf->Output('employee_report.pdf', 'D'); // 'D' forces download
    }

    public function employeeAttendenceReport()
    {
        $branches = Branch::where('status', 1)->orderBy('name','asc')->get();
        $departments = Department::where('status', 1)->orderBy('department_name','asc')->get();
        return view('admin.report.employee_attendence_report', compact('branches', 'departments'));
    }

    public function searchEmployeeAttendence(Request $request)
    {

        $branchId = $request->branchId;
        $departmentId = $request->departmentId;
        $designationId = $request->designationId;
        $status = $request->status;

        // Start the query
        $query = EmployeePersonalInformation::query();

        // Apply each filter condition if parameters are provided
        if ($status) {
            $query->where('status', $status);
        }

        if ($branchId) {
            $query->whereHas('officialInformation', function ($q) use ($branchId) {
                $q->where('branch_id', $branchId);
            });
        }

        if ($departmentId) {
            $query->whereHas('officialInformation', function ($q) use ($departmentId) {
                $q->where('department_id', $departmentId);
            });
        }

        if ($designationId) {
            $query->whereHas('officialInformation', function ($q) use ($designationId) {
                $q->where('designation_id', $designationId);
            });
        }
        $employees = $query
        ->with('salutations',
        'contact',
        'officialInformation',
        'payRollInformation',
        'officialInformation.branch',
        'officialInformation.employeeProject',
        'officialInformation.department',
        'officialInformation.designation',
        'officialInformation.employeeGrade',
        'officialInformation.reportingfirst',
        'officialInformation.reportingfirst.salutations',
        'officialInformation.reportingsecond',
        'officialInformation.reportingsecond.salutations',
        'officialInformation.reportingthird',
        'officialInformation.reportingthird.salutations')
        ->get();

        // Return the data as JSON response
        return response()->json($employees);
    }

}
