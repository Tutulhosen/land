<?php

namespace App\Http\Controllers\Admin\HrDocuments;

use PDF;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Admin\HrDocuments\OfficialLetter;
use App\Models\Admin\HrAdminSetup\DocumentTemplate;
use App\Models\Admin\Employee\EmployeePersonalInformation;
use App\Models\Admin\SystemConfiguration\CompanyInformation;

class OfficialLettersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $officialLetters = OfficialLetter::all();
        return view('admin.hr-documents.official-letters.index', compact('officialLetters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $demoletters = DocumentTemplate::where('status', 1)->get();
        $employees = EmployeePersonalInformation::where('status', 1)->get();
        return view('admin.hr-documents.official-letters.create',compact('demoletters','employees'));
    }


    public function getTemplate($letterTypeId, $employeeId, $signatoryId)
    {
        $company = CompanyInformation::first();
        $demoletter = DocumentTemplate::find($letterTypeId);
        $employee = EmployeePersonalInformation::find($employeeId);
        $signatory = EmployeePersonalInformation::find($signatoryId);
        // If template and employee are found, return the template
        if ($demoletter && $employee && $signatory) {
            return response()->json([
                'template' => $demoletter->template,  // Send the template to the front-end
                'employee' => [
                    'emp_id' => $employee->emp_id,                        // Employee ID
                    'name' => $employee->first_name . ' ' . $employee->last_name,  // Employee full name
                    'address' => $employee->contact->pres_add. ', ' . $employee->contact->district. ' - ' .$employee->contact->postal_code,               // Employee address
                    'joining_date' => $employee->joining_date,     // Employee joining date
                    'prob_start_date' => $employee->prob_start_date, // Probation start date
                    'prob_end_date' => $employee->prob_end_date, // Probation end date
                    'notice_period_start_date' => $employee->notice_start_date, // Notice period start date
                    'notice_period_end_date' => $employee->notice_end_date, // Notice period end date
                    'department' => $employee->officialInformation->department->department_name,         // Employee department
                    'designation' => $employee->officialInformation->designation->designation_name,       // Employee designation
                    'joining_sallery' => $employee->payRollInformation->joining_sallery,
                ],
                'signatory' => [
                    'signatory_id' => $signatory->emp_id,
                    'name' => $signatory->first_name . ' ' . $signatory->last_name,
                    'department' => $signatory->officialInformation->department->department_name,
                    'designation' => $signatory->officialInformation->designation->designation_name,
                ],
                'company_name' => $company->company_name,
            ]);
        }elseif($demoletter && !$employee && $signatory){
            return response()->json([
                'template' => $demoletter->template,  // Send the template to the front-end
                'employee' => [
                    'emp_id' => 'N/A',
                    'name' => 'Employees',
                    'address' => 'N/A',
                    'joining_date' => date('Y-m-d'),
                    'prob_start_date' => date('Y-m-d'),
                    'prob_end_date' => date('Y-m-d'),
                    'notice_period_start_date' => date('Y-m-d'),
                    'notice_period_end_date' => date('Y-m-d'),
                    'department' => 'N/A',
                    'designation' => 'N/A',
                    'joining_sallery' => '0',
                ],
                'signatory' => [
                    'signatory_id' => $signatory->emp_id,
                    'name' => $signatory->first_name . ' ' . $signatory->last_name,
                    'department' => $signatory->officialInformation->department->department_name,
                    'designation' => $signatory->officialInformation->designation->designation_name,
                ],
                'company_name' => $company->company_name,
            ]);
        }

        // If no template or employee is found, return empty response
        return response()->json([
            'template' => '',
            'employee' => null,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        $officialletter = OfficialLetter::findOrFail($id);
        $officialletter->delete();
        return redirect()->route('official-letters.index')->with('success', 'Official Letter deleted successfully.');
    }

    public function generatePDF(Request $request)
    {
        try {
            // Get content and margin inputs
            $content = $request->input('content');
            $left = $request->input('left');
            $right = $request->input('right');
            $top = $request->input('top');
            $bottom = $request->input('bottom');

            // Remove background color from inline styles
            // $content = preg_replace('/background-color:\s*[^;]+;/i', '', $content);

            // Fetch letterhead from company information
            $companyInformation = CompanyInformation::first();
            $letterhead = $companyInformation->companyDocument
                ? $companyInformation->companyDocument->letterhead_vertical
                : null;

            // Ensure the file exists before passing it to view
            if ($letterhead && !file_exists(public_path('storage/'.$letterhead))) {
                $letterhead = null;
            }

            $data = [
                'content' => $content,
                'left' => $left,
                'right' => $right,
                'top' => $top,
                'bottom' => $bottom,
                'letterhead' => $letterhead,
            ];

            $pdf = \PDF::loadView('admin.hr-documents.official-letters.document', $data);

            // Return the PDF as a downloadable file
            return $pdf->stream('official_letter.pdf'); // This triggers the browser to download the file

        } catch (Exception $e) {
            Log::error("Error generating PDF: " . $e->getMessage());
            return redirect()->back()->with('error', 'PDF generation failed.');
        }
    }

    public function saveContent(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'nullable|integer',
            'letter_type_id' => 'required|integer',
            'content' => 'required|string',
            'signatory_id' => 'required|integer',
        ]);

        try {
            $officialLetter = new OfficialLetter();
            $officialLetter->content = $request->input('content');
            $officialLetter->letter_type_id = $request->input('letter_type_id');
            $officialLetter->employee_id = ($request->input('employee_id') == 0) ? null : $request->input('employee_id');
            $officialLetter->signatory_id = $request->input('signatory_id');
            $officialLetter->save();

            return response()->json(['message' => 'Content saved successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while saving the content.'], 500);
        }
    }



}
