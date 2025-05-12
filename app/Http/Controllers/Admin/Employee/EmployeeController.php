<?php

namespace App\Http\Controllers\Admin\Employee;


use ZipArchive;
use App\Models\District;
use App\Models\Division;
use App\Models\UserBranch;
use Illuminate\Http\Request;
use App\Models\CustomerAttachment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\HrAdminSetup\Shift;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Admin\HrAdminSetup\Holiday;
use App\Models\Admin\Employee\EmployeeFamily;
use App\Models\Admin\HrAdminSetup\Department;
use App\Models\Admin\HrAdminSetup\Designation;
use App\Models\Admin\Employee\EmployeeDocument;
use App\Models\Admin\Employee\EmployeeOfficial;
use App\Models\Admin\Employee\EmployeeTraining;
use App\Models\Admin\Employee\EmployeeTransfer;
use App\Models\Admin\SystemConfiguration\Grade;
use App\Models\Admin\SystemConfiguration\Agency;
use App\Models\Admin\SystemConfiguration\Branch;
use App\Models\Admin\SystemConfiguration\Gender;
use App\Models\Admin\SystemConfiguration\WeekOff;
use App\Models\Admin\SystemConfiguration\Relation;
use App\Models\Admin\SystemConfiguration\Religion;
use App\Models\Admin\SystemConfiguration\Education;
use App\Models\Admin\Employee\EmployeeOtherDocument;
use App\Models\Admin\SystemConfiguration\BloodGroup;

use App\Models\Admin\SystemConfiguration\Salutation;
use App\Models\Admin\HrAdminSetup\ShiftAndDepartment;
use App\Models\Admin\SystemConfiguration\Nationality;
use App\Models\Admin\SystemConfiguration\ProjectList;
use App\Models\Admin\SystemConfiguration\EmployeeType;
use App\Models\Admin\Employee\EmployeeEmergencyContact;
use App\Models\Admin\SystemConfiguration\EducationType;
use App\Models\Admin\Employee\EmployeePayRollInformation;
use App\Models\Admin\SystemConfiguration\ProbationPeriod;
use App\Models\Admin\Employee\{EmployeePersonalInformation, EmployeeContact, EmployeeOfficialInformation, EmployeeGranter, EmployeeReference, EmployeeEducation, EmployeeExperience};

class EmployeeController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $employees = EmployeePersonalInformation::with([
                'salutations',
                'officialInformation',
                'officialInformation.designation',
                'officialInformation.branch',
                'officialInformation.department',
                'officialInformation.reportingfirst',
                'contact',
                'payRollInformation.shift',
                'payRollInformation.holiday'
            ])->select('employee_personal_information.*');

            // Apply Filters Based on Request
            if (!empty($request->branch_id)) {
                $employees->whereHas('officialInformation', function ($q) use ($request) {
                    $q->where('branch_id', $request->branch_id);
                });
            }

            $branchId = null;

            if (Auth::user()->is_superadmin != 1) {
                $branchId = UserBranch::where('user_id', Auth::id())->value('branch_id');

                if ($branchId) {
                    $employees->whereHas('officialInformation', function ($q) use ($branchId) {
                        $q->where('branch_id', $branchId);
                    });
                }
            }


            if (!empty($request->department_id)) {
                $employees->whereHas('officialInformation', function ($q) use ($request) {
                    $q->where('department_id', $request->department_id);
                });
            }

            if (!empty($request->designation_id)) {
                $employees->whereHas('officialInformation', function ($q) use ($request) {
                    $q->where('designation_id', $request->designation_id);
                });
            }

            if (!empty($request->employee_id)) {
                $employees->where('id', $request->employee_id);
            }

            return DataTables::of($employees)
                ->addIndexColumn() // Adds SL number
                ->addColumn('employee', function ($employee) {
                    return '
                        <a href="' . route('employee.profile.view', $employee->id) . '">
                            <i class="bx bx-user-circle"></i> ' .
                            ($employee->salutations ? $employee->salutations->name : "") . ' ' .
                            $employee->first_name . ' ' . $employee->last_name . '
                        </a>
                        <br/>' .
                        ($employee->officialInformation && $employee->officialInformation->designation ? $employee->officialInformation->designation->designation_name : "N/A") . '
                        <br/><i class="bx bx-id-card bx-flashing"></i> ' . $employee->emp_id;
                })
                ->addColumn('official', function ($employee) {
                    $branch = $employee->officialInformation && $employee->officialInformation->branch ? $employee->officialInformation->branch->name : "N/A";
                    $department = $employee->officialInformation && $employee->officialInformation->department ? $employee->officialInformation->department->department_name : "N/A";
                    $reportingPerson = $employee->officialInformation && $employee->officialInformation->reportingfirst
                        ? '<br/><b>Reporting Person:</b> <a href="#" class="client-info"><i class="bx bx-user-voice"></i> ' . $employee->officialInformation->reportingfirst->first_name . ' ' . $employee->officialInformation->reportingfirst->last_name . '</a>'
                        : '';
                    return '<span><i class="bx bx-buildings bx-flashing"></i> ' . $branch . '<br/></span>' . $department . $reportingPerson;
                })
                ->addColumn('contact', function ($employee) {
                    $contactInfo = '';
                    if ($employee->contact && $employee->contact->contact_number) {
                        $contactInfo .= '<a href="tel:' . $employee->contact->contact_number . '" class="client-info">
                                            <i class="bx bx-phone-outgoing bx-tada"></i> ' . $employee->contact->contact_number . '
                                        </a><br/>';
                    }
                    if ($employee->contact && $employee->contact->whatsapp) {
                        $contactInfo .= '<a href="https://wa.me/' . $employee->contact->whatsapp . '" class="client-info">
                                            <i class="bx bxl-whatsapp bx-tada"></i> ' . $employee->contact->whatsapp . '
                                        </a><br/>';
                    }
                    if ($employee->contact && $employee->contact->email) {
                        $contactInfo .= '<a href="mailto:' . $employee->contact->email . '" class="client-info">
                                            <i class="bx bx-mail-send bx-tada"></i> ' . $employee->contact->email . '
                                        </a>';
                    }
                    return $contactInfo ?: 'N/A';
                })
                ->addColumn('shift', function ($employee) {
                    return $employee->payRollInformation && $employee->payRollInformation->shift
                        ? $employee->payRollInformation->shift->shift_name . '<br/>' .
                          \Carbon\Carbon::parse($employee->payRollInformation->shift->start_time)->format('h.i A') .
                          ' to ' .
                          \Carbon\Carbon::parse($employee->payRollInformation->shift->end_time)->format('h.i A')
                        : 'N/A';
                })
                ->addColumn('week_off', function ($employee) {
                    return $employee->payRollInformation && $employee->payRollInformation->holiday
                        ? $employee->payRollInformation->holiday->name
                        : 'N/A';
                })
                ->addColumn('status', function ($employee) {
                    return '<form action="' . route('employee.toggle', $employee->id) . '" method="POST" class="status-form" style="display: inline;">
                                ' . csrf_field() . '
                                <button type="button" class="toggle-status  btn status-box-1 btn ' . ($employee->status == 1 ? 'btn-success' : 'btn-danger') . '"
                                    data-bs-toggle="tooltip" data-bs-title="Click to change Status">
                                    ' . ($employee->status == 1 ? 'Active' : 'Inactive') . '
                                </button>
                            </form>';
                })
                ->addColumn('additional', function ($employee) {
                    return ' <a class="btn btn-label-primary btn-round btn-xs" href="' . route('employee.document.create', $employee->id) . '">
                                <i class="bx bx-cloud-download bx-flashing"></i> Documents
                            </a>';
                })
                ->addColumn('action', function ($employee) {
                    $actions = '<div class="form-button-action">';

                    // Profile View Button (Always Visible)
                    $actions .= '<a class="btn btn-link btn-info btn-lg"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip"
                                    data-bs-title="Profile View"
                                    href="' . route('employee.profile.view', $employee->id) . '">
                                    <i class="bx bx-show-alt"></i>
                                </a>';

                    // Edit Button (Visible Only If User Has Permission)
                    if (auth()->user()->can('Update Employee')) {
                        $actions .= '<a class="btn btn-link btn-success btn-lg" data-bs-toggle="tooltip" data-bs-title="Edit"
                                        href="' . route('employee.edit', $employee->id) . '">
                                        <i class="bx bxs-edit"></i>
                                    </a>';
                    }

                    // Delete Button (Visible Only If User Has Permission)
                    if (auth()->user()->can('Delete Employee')) {
                        $actions .= '<a href="' . route('employee.destroy', $employee->id) . '"
                                        class="btn btn-link btn-danger btn-lg delete-employee"
                                        data-employee-id="' . $employee->id . '"
                                        data-bs-toggle="tooltip" data-bs-title="Delete">
                                        <i class="bx bx-trash-alt"></i>
                                    </a>';
                    }

                    $actions .= '</div>';

                    return $actions;
                })
                ->rawColumns(['employee', 'official', 'contact', 'shift', 'week_off', 'status', 'additional', 'action']) // Allow HTML
                ->make(true);
        }

        $branches = Branch::where('status', 1)->orderBy('name', 'asc')->get();
        $departments = Department::where('status', 1)->get();
        $customers = EmployeePersonalInformation::with(['nominees', 'gong', 'attachments'])->paginate(20);

        return view('admin.employee.index',compact('branches', 'departments', 'customers'));
    }
    public function create() {

        $employeeinfos = EmployeePersonalInformation::with('salutations','genders')->get();
        $salutations = Salutation::where('status', true)->get();
        $grades = Grade::where('status', true)->get();
        $projects = ProjectList::where('status', true)->get();
        $genders = Gender::where('status', true)->get();
        $nationalities =Nationality::where('status', true)->get();
        $departments = Department::where('status', true)->orderBy('department_name', 'asc')->get();
        $designations = Designation::where('status', true)->orderBy('designation_name', 'asc')->get();
        $districts = District::all();
        $shifts = Shift::all();
        $week_offs = WeekOff::all();
        $bloodgroups = BloodGroup::all();
        $probationPeriods = ProbationPeriod::where('status', true)->get();
        $relations = Relation::where('status', true)->get();
        $educations = Education::where('status', true)->get();
        $educationtypes = EducationType::where('status', true)->get();
        $branches =  Branch::where('status', true)->orderBy('name', 'asc')->get();
        $employee_types  = EmployeeType::where('status', true)->get();
        $religions = Religion::where('status', true)->get();
        $agencies = Agency::orderBy('id','desc')->get();
        $divisions = Division::orderBy('id','desc')->get();
        
        return view('admin.employee.create',compact(
            'departments',
            'designations',
            'districts',
            'shifts',
            'week_offs',
            'salutations',
            'genders',
            'nationalities',
            'bloodgroups',
            'probationPeriods',
            'relations',
            'educations',
            'educationtypes',
            'employeeinfos',
            'branches',
            'employee_types',
            'religions',
            'grades',
            'projects',
            'agencies',
            'divisions',
        ));
    }
    private function handleFileUpload($file, $path)
    {
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileName = $originalName . '_' . uniqid() . '.' . $extension;
        return $file->storeAs('uploads/' . $path, $fileName, 'public');
    }

    private function handleFileDelete($filePath)
    {
        if ($filePath && Storage::exists('public/' . $filePath)) {
            Storage::delete('public/' . $filePath);
        }
    }

    public function store(EmployeeRequest $request)
    {
   
        // dd($request->all());
        DB::beginTransaction();
        try {

            $customer = $this->storeCustomerInfo($request);
            $this->storeNomineeInfo($request, $customer->id);
            $this->storeGongInfo($request, $customer->id);

            DB::commit();
            return redirect()->route('customer.index')->with('success', 'Customer Information successfully added!');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error("Error saving Customer: " . $e->getMessage());
            return redirect()->back()->with('danger', 'There was an error adding the Customer. Please try again later.');

        }
    }



    public function edit($id)
    {
        $employeeinfos = EmployeePersonalInformation::with('salutations','genders')->get();
        $salutations = Salutation::where('status', true)->get();
        $grades = Grade::where('status', true)->get();
        $projects = ProjectList::where('status', true)->get();
        $genders = Gender::where('status', true)->get();
        $nationalities =Nationality::where('status', true)->get();
        $departments = Department::where('status', true)->orderBy('department_name', 'asc')->get();
        $designations = Designation::where('status', true)->orderBy('designation_name', 'asc')->get();
        $districts = District::all();
        $shifts = Shift::all();
        $week_offs = WeekOff::all();
        $bloodgroups = BloodGroup::all();
        $probationPeriods = ProbationPeriod::where('status', true)->get();
        $relations = Relation::where('status', true)->get();
        $educations = Education::where('status', true)->get();
        $educationtypes = EducationType::where('status', true)->get();
        $branches =  Branch::where('status', true)->orderBy('name', 'asc')->get();
        $employee_types  = EmployeeType::where('status', true)->get();
        $religions = Religion::where('status', true)->get();
        $agencies = Agency::orderBy('id','desc')->get();
        $divisions = Division::orderBy('id','desc')->get();
        $customers = EmployeePersonalInformation::with(['nominees', 'gong', 'attachments'])->findOrFail($id);

        return view('admin.employee.edit', compact(
            'employeeinfos',
            'salutations',
            'grades',
            'projects',
            'genders',
            'nationalities',
            'departments',
            'designations',
            'districts',
            'shifts',
            'week_offs',
            'bloodgroups',
            'probationPeriods',
            'relations',
            'educations',
            'educationtypes',
            'employee_types',
            'religions',
            'agencies',
            'divisions',
            'customers',
            

        ));
    }
    public function update(EmployeeRequest $request, $id)
    {

        $personalInformation = EmployeePersonalInformation::findOrFail($id);
        $personalInformation->salutation = $request->salutation;
        $personalInformation->first_name = $request->first_name;
        $personalInformation->last_name = $request->last_name;
        $personalInformation->emp_id = $request->emp_id;
        $personalInformation->gender = $request->gender;
        $personalInformation->religion = $request->religion;
        $personalInformation->nationality = $request->nationality;
        $personalInformation->blood_group = $request->blood_group;
        $personalInformation->identification_type = $request->identification_type;
        $personalInformation->identification_number = $request->identification_number;
        $personalInformation->dob = $request->dob;
        $personalInformation->fathers_name = $request->fathers_name;
        $personalInformation->mothers_name = $request->mothers_name;
        $personalInformation->marital_status = $request->marital_status;
        $personalInformation->spouse_name = $request->spouse_name;
        $personalInformation->spouse_occupation = $request->spouse_occupation;
        $personalInformation->spouse_organization = $request->spouse_organization;
        $personalInformation->spouse_mobile = $request->spouse_mobile;
        $personalInformation->spouse_nid_number = $request->spouse_nid_number;
        $personalInformation->spouse_dob = $request->spouse_dob;
        if ($request->hasFile('spouse_nid')) {
            $this->handleFileDelete($personalInformation->spouse_nid);
                $personalInformation->spouse_nid = $this->handleFileUpload($request->file('spouse_nid'), 'Employee/Spouse-nid');
        }
        $personalInformation->save();

        // dd($personalInformation);

         // Employee Contact
         $employeeContact = EmployeeContact::where('emp_personal_id', $id)->first();
         $employeeContact->emp_personal_id = $personalInformation->id;
         $employeeContact->contact_number = $request->contact_number;
         $employeeContact->email = $request->email;
         $employeeContact->whatsapp = $request->whatsapp;
         $employeeContact->pres_add = $request->pres_add;
         $employeeContact->district = $request->district;
         $employeeContact->postal_code = $request->postal_code;
         // Handle "same as present address"
         if ($request->same_address) {
             $employeeContact->permanent_add = $request->pres_add;
             $employeeContact->permanent_district = $request->district;
             $employeeContact->permanent_postal_code = $request->postal_code;
         } else {
             $employeeContact->permanent_add = $request->permanent_add;
             $employeeContact->permanent_district = $request->permanent_district;
             $employeeContact->permanent_postal_code = $request->permanent_postal_code;
         }
         $employeeContact->same_address = $request->same_address;
         $employeeContact->emergency_contact_person = $request->emergency_contact_person;
         $employeeContact->relation = $request->relation;
         $employeeContact->occupation = $request->occupation;
         $employeeContact->emergency_contact = $request->emergency_contact;
         $employeeContact->emergency_email = $request->emergency_email;
         $employeeContact->emergency_address = $request->emergency_address;
         $employeeContact->save();
         // dd($employeeContact);


         // Employee Official Information
         $employeeOfficialInformation = EmployeeOfficialInformation::where('emp_personal_id', $id)->first();
         $employeeOfficialInformation->emp_personal_id = $personalInformation->id;
         $employeeOfficialInformation->employee_type = $request->employee_type;
         $employeeOfficialInformation->department_id = $request->department_id;
         $employeeOfficialInformation->designation_id = $request->designation_id;
         $employeeOfficialInformation->branch_id = $request->branch_id;
         $employeeOfficialInformation->reporting_to_first = $request->reporting_to_first;
         $employeeOfficialInformation->reporting_to_second = $request->reporting_to_second;
         $employeeOfficialInformation->reporting_to_third = $request->reporting_to_third;
         $employeeOfficialInformation->grade_id = $request->grade_id;
         $employeeOfficialInformation->project_id = $request->project_id;
         $employeeOfficialInformation->notice_start_date = $request->notice_start_date;
         $employeeOfficialInformation->notice_end_date = $request->notice_end_date;
         $employeeOfficialInformation->official_phone = $request->official_phone;
         $employeeOfficialInformation->official_email = $request->official_email;
         $employeeOfficialInformation->official_whatsapp = $request->official_whatsapp;
         $employeeOfficialInformation->user_email = $request->user_email;
         if ($request->filled('password')) {
            $employeeOfficialInformation->password = bcrypt($request->password);
        }
         $employeeOfficialInformation->login_allowed = $request->login_allowed;
         $employeeOfficialInformation->save();
         // dd($employeeOfficialInformation);


        // Employee Granter History
        if ($request->granter_name) {
            foreach ($request->granter_name as $key => $value) {
                $granter_id_doc = null;

                if (!empty($request->granter) && isset($request->granter[$key])) {
                    $employeeGranter = EmployeeGranter::where('id', $request->granter[$key])->first();

                    if ($employeeGranter) {
                        $employeeGranter->granter_name = $value ?? null;
                        $employeeGranter->granter_occupation = $request->granter_occupation[$key] ?? null;
                        $employeeGranter->granter_contact_number = $request->granter_contact_number[$key] ?? null;
                        $employeeGranter->granter_relation = $request->granter_relation[$key] ?? null;
                        $employeeGranter->granter_address = $request->granter_address[$key] ?? null;
                        $employeeGranter->granter_id_number = $request->granter_id_number[$key] ?? null;

                        if ($request->hasFile("granter_id_doc.$key")) {
                            $this->handleFileDelete($employeeGranter->granter_id_doc);
                            $granter_id_doc = $this->handleFileUpload($request->file("granter_id_doc")[$key], 'Employee/Granter-ID');
                            $employeeGranter->granter_id_doc = $granter_id_doc;
                        }

                        $employeeGranter->save();
                    }
                } else {
                    if ($request->hasFile("granter_id_doc.$key")) {
                        $granter_id_doc = $this->handleFileUpload($request->file("granter_id_doc")[$key], 'Employee/Granter-ID');
                    }

                    EmployeeGranter::create([
                        'emp_personal_id' => $personalInformation->id,
                        'granter_name' => $value ?? null,
                        'granter_occupation' => $request->granter_occupation[$key] ?? null,
                        'granter_contact_number' => $request->granter_contact_number[$key] ?? null,
                        'granter_relation' => $request->granter_relation[$key] ?? null,
                        'granter_address' => $request->granter_address[$key] ?? null,
                        'granter_id_number' => $request->granter_id_number[$key] ?? null,
                        'granter_id_doc' => $granter_id_doc,
                    ]);
                }
            }
        }

        // Employee Reference History
        if ($request->reference_name) {
            foreach ($request->reference_name as $key => $value) {
                $reference_id_doc = null;

                if (!empty($request->reference) && isset($request->reference[$key])) {
                    $employeeReference = EmployeeReference::where('id', $request->reference[$key])->first();

                    if ($employeeReference) {
                        $employeeReference->reference_name = $value ?? null;
                        $employeeReference->reference_occupation = $request->reference_occupation[$key] ?? null;
                        $employeeReference->reference_contact_number = $request->reference_contact_number[$key] ?? null;
                        $employeeReference->reference_relation = $request->reference_relation[$key] ?? null;
                        $employeeReference->reference_address = $request->reference_address[$key] ?? null;
                        $employeeReference->reference_id_number = $request->reference_id_number[$key] ?? null;

                        if ($request->hasFile("reference_id_doc.$key")) {
                            $this->handleFileDelete($employeeReference->reference_id_doc);
                            $reference_id_doc = $this->handleFileUpload($request->file("reference_id_doc")[$key], 'Employee/Reference-ID');
                            $employeeReference->reference_id_doc = $reference_id_doc;
                        }

                        $employeeReference->save();
                    }
                } else {
                    if ($request->hasFile("reference_id_doc.$key")) {
                        $reference_id_doc = $this->handleFileUpload($request->file("reference_id_doc")[$key], 'Employee/Reference-ID');
                    }

                    EmployeeReference::create([
                        'emp_personal_id' => $personalInformation->id,
                        'reference_name' => $value ?? null,
                        'reference_occupation' => $request->reference_occupation[$key] ?? null,
                        'reference_contact_number' => $request->reference_contact_number[$key] ?? null,
                        'reference_relation' => $request->reference_relation[$key] ?? null,
                        'reference_address' => $request->reference_address[$key] ?? null,
                        'reference_id_number' => $request->reference_id_number[$key] ?? null,
                        'reference_id_doc' => $reference_id_doc,
                    ]);
                }
            }
        }

        // Employee Education History
        if ($request->education_type) {
            foreach ($request->education_type as $key => $value) {
                $education_doc = null;

                if (!empty($request->education_number) && isset($request->education_number[$key])) {
                    $employeeEducation = EmployeeEducation::where('id', $request->education_number[$key])->first();

                    if ($employeeEducation) {
                        $employeeEducation->education_type = $value ?? null;
                        $employeeEducation->education = $request->education[$key] ?? null;
                        $employeeEducation->group_major_subject = $request->group_major_subject[$key] ?? null;
                        $employeeEducation->passing_year = $request->passing_year[$key] ?? null;
                        $employeeEducation->institute_name = $request->institute_name[$key] ?? null;
                        $employeeEducation->board_university = $request->board_university[$key] ?? null;
                        $employeeEducation->result_university = $request->result[$key] ?? null;

                        // Only update education_doc if a new file is uploaded
                        if ($request->hasFile("education_doc.$key")) {
                            // Optionally delete the old file before uploading a new one
                            $this->handleFileDelete($employeeEducation->education_doc);
                            $education_doc = $this->handleFileUpload($request->file("education_doc")[$key], 'Employee/Education-Document');
                            $employeeEducation->education_doc = $education_doc;
                        }

                        $employeeEducation->save();
                    }
                } else {
                    if ($request->hasFile("education_doc.$key")) {
                        $education_doc = $this->handleFileUpload($request->file("education_doc")[$key], 'Employee/Education-Document');
                    }

                    EmployeeEducation::create([
                        'emp_personal_id' => $personalInformation->id,
                        'education_type' => $value ?? null,
                        'education' => $request->education[$key] ?? null,
                        'group_major_subject' => $request->group_major_subject[$key] ?? null,
                        'passing_year' => $request->passing_year[$key] ?? null,
                        'institute_name' => $request->institute_name[$key] ?? null,
                        'board_university' => $request->board_university[$key] ?? null,
                        'result_university' => $request->result[$key] ?? null,
                        'education_doc' => $education_doc,
                    ]);
                }
            }
        }

        // Employee Experience History
        if ($request->company_name) {
            foreach ($request->company_name as $key => $value) {
                $experiance_doc = null;

                if (!empty($request->experience) && isset($request->experience[$key])) {
                    $employeeExperience = EmployeeExperience::where('id', $request->experience[$key])->first();

                    if ($employeeExperience) {
                        $employeeExperience->company_name = $value ?? null;
                        $employeeExperience->job_position = $request->job_position[$key] ?? null;
                        $employeeExperience->department = $request->department[$key] ?? null;
                        $employeeExperience->job_respons = $request->job_respons[$key] ?? null;
                        $employeeExperience->from_date = $request->from_date[$key] ?? null;
                        $employeeExperience->to_date = $request->to_date[$key] ?? null;
                        $employeeExperience->duration = $request->duration[$key] ?? null;
                        $employeeExperience->projects = $request->projects[$key] ?? null;
                        $employeeExperience->years_of_experience = $request->years_of_experience[$key] ?? null;

                        if ($request->hasFile("experiance_doc.$key")) {
                            $this->handleFileDelete($employeeExperience->experiance_doc);
                            $experiance_doc = $this->handleFileUpload($request->file("experiance_doc")[$key], 'Employee/Experience-Document');
                            $employeeExperience->experiance_doc = $experiance_doc;
                        }

                        $employeeExperience->save();
                    }
                } else {
                    if ($request->hasFile("experiance_doc.$key")) {
                        $experiance_doc = $this->handleFileUpload($request->file("experiance_doc")[$key], 'Employee/Experience-Document');
                    }

                    EmployeeExperience::create([
                        'emp_personal_id' => $personalInformation->id,
                        'company_name' => $value ?? null,
                        'job_position' => $request->job_position[$key] ?? null,
                        'department' => $request->department[$key] ?? null,
                        'job_respons' => $request->job_respons[$key] ?? null,
                        'from_date' => $request->from_date[$key] ?? null,
                        'to_date' => $request->to_date[$key] ?? null,
                        'duration' => $request->duration[$key] ?? null,
                        'projects' => $request->projects[$key] ?? null,
                        'years_of_experience' => $request->years_of_experience[$key] ?? null,
                        'experiance_doc' => $experiance_doc,
                    ]);
                }
            }
        }

        // Employee Training History
        if ($request->train_type) {
            foreach ($request->train_type as $key => $value) {
                $training_doc = null;

                if (!empty($request->training) && isset($request->training[$key])) {
                    $employeeTraining = EmployeeTraining::where('id', $request->training[$key])->first();

                    if ($employeeTraining) {
                        $employeeTraining->train_type = $value ?? null;
                        $employeeTraining->course_title = $request->course_title[$key] ?? null;
                        $employeeTraining->description = $request->description[$key] ?? null;
                        $employeeTraining->course_duration = $request->course_duration[$key] ?? null;
                        $employeeTraining->course_start = $request->course_start[$key] ?? null;
                        $employeeTraining->course_end = $request->course_end[$key] ?? null;
                        $employeeTraining->year = $request->year[$key] ?? null;
                        $employeeTraining->institute_name = $request->training_institute_name[$key] ?? null;
                        $employeeTraining->institute_address = $request->institute_address[$key] ?? null;
                        $employeeTraining->resource = $request->resource[$key] ?? null;
                        $employeeTraining->result = $request->course_result[$key] ?? null;

                        if ($request->hasFile("training_doc.$key")) {
                            $this->handleFileDelete($employeeTraining->training_doc);
                            $training_doc = $this->handleFileUpload($request->file("training_doc")[$key], 'Employee/Training-Document');
                            $employeeTraining->training_doc = $training_doc;
                        }

                        $employeeTraining->save();
                    }
                } else {
                    if ($request->hasFile("training_doc.$key")) {
                        $training_doc = $this->handleFileUpload($request->file("training_doc")[$key], 'Employee/Training-Document');
                    }

                    EmployeeTraining::create([
                        'emp_personal_id' => $personalInformation->id,
                        'train_type' => $value ?? null,
                        'course_title' => $request->course_title[$key] ?? null,
                        'description' => $request->description[$key] ?? null,
                        'course_duration' => $request->course_duration[$key] ?? null,
                        'course_start' => $request->course_start[$key] ?? null,
                        'course_end' => $request->course_end[$key] ?? null,
                        'year' => $request->year[$key] ?? null,
                        'institute_name' => $request->institute_name[$key] ?? null,
                        'institute_address' => $request->institute_address[$key] ?? null,
                        'resource' => $request->resource[$key] ?? null,
                        'result' => $request->course_result[$key] ?? null,
                        'training_doc' => $training_doc,
                    ]);
                }
            }
        }

        // PayRoll History
        $employeePayRoll = EmployeePayRollInformation::where('emp_personal_id', $id)->first();
        $employeePayRoll->holiday_id = $request->holiday_id;
        $employeePayRoll->shift_id = $request->shift_id;
        $employeePayRoll->overtime_enable = $request->overtime_enable;
        $employeePayRoll->sallery_payment_by = $request->sallery_payment_by;
        $employeePayRoll->bank_name = $request->bank_name;
        $employeePayRoll->account_holder_name = $request->account_holder_name;
        $employeePayRoll->branch_name = $request->branch_name;
        $employeePayRoll->account_number = $request->account_number;
        $employeePayRoll->tin_number = $request->tin_number;
        $employeePayRoll->joining_date = $request->joining_date;
        $employeePayRoll->joining_sallery = $request->joining_sallery;
        $employeePayRoll->probation_period = $request->probation_period;
        $employeePayRoll->probation_period_starting_date = $request->probation_period_starting_date;
        $employeePayRoll->probation_period_end_date = $request->probation_period_end_date;
        $employeePayRoll->salary_type = $request->salary_type;
        $employeePayRoll->save();



        return redirect()->route('employee.index')->with('success', 'Employee updated successfully!');
    }

    public function getDesignations($departmentId)
    {
        $designations = Designation::where('department_id', $departmentId)
                                    ->where('status', true)
                                    ->orderBy('designation_name', 'asc')
                                    ->get();
        return response()->json($designations);
    }

    public function getGrades($designationId)
    {
        $grades = Grade::where('designation_id', $designationId)
                        ->where('status', true)
                        ->orderBy('name', 'asc')
                        ->get();

        return response()->json($grades);
    }

    public function getEmployeesByBranch($branchId)
    {
        $employees = EmployeeOfficialInformation::with([
            'employee',
            'employee.salutations',
            // 'employee.officialInformation',
            // 'employee.officialInformation.branch',
            // 'employee.officialInformation.department',
            // 'employee.officialInformation.designation',
            // 'employee.officialInformation.employeeGrade',
            'employee.officialInformation.reportingfirst',
            'employee.officialInformation.reportingfirst.salutations',
            'employee.officialInformation.reportingsecond',
            'employee.officialInformation.reportingsecond.salutations',
            'employee.officialInformation.reportingthird',
            'employee.officialInformation.reportingthird.salutations',
            'employee.payRollInformation'
        ])
        ->where('branch_id', $branchId)
        ->get();
        return response()->json($employees);
    }

    public function getShift($departmentId)
    {
        $shifts = ShiftAndDepartment::where('department_id', $departmentId)->with('shift')->get();
        return response()->json($shifts);
    }

    public function employeeToggle($id){
        $employee = EmployeePersonalInformation::findOrFail($id);
        $employee->status = !$employee->status;
        $employee->save();
        return redirect()->route('employee.index')->with('success', 'Employee status updated!');
    }

    public function destroy($id)
    {
        $employee = EmployeePersonalInformation::findOrFail($id);

        $granters = EmployeeGranter::where('emp_personal_id', $employee->id)->get();

        if($granters){
            foreach ($granters as $granter) {
                $this->handleFileDelete($granter->granter_id_doc);
                $granter->delete();
            }
        }


        $references = EmployeeReference::where('emp_personal_id', $employee->id)->get();

        if($references){
            foreach ($references as $reference) {
                $this->handleFileDelete($reference->reference_id_doc);
                $reference->delete();
            }
        }


        $educations = EmployeeEducation::where('emp_personal_id', $employee->id)->get();

        if($educations){
            foreach ($educations as $education) {
                $this->handleFileDelete($education->education_doc);
                $education->delete();
            }
        }


        $experiences = EmployeeExperience::where('emp_personal_id', $employee->id)->get();

        if($experiences){
            foreach ($experiences as $experience) {
                $this->handleFileDelete($experience->experiance_doc);
                $experience->delete();
            }
        }



        $trainings = EmployeeTraining::where('emp_personal_id', $employee->id)->get();

        if($trainings){
            foreach ($trainings as $training) {
                $this->handleFileDelete($training->training_doc);
                $training->delete();
            }
        }

        $fileFields = [
            'profile_picture',
            'signature',
            'nid_card_front',
            'nid_card_back',
            'cv',
            'trade_licence',
            'vat',
            'tax',
            'gong_picture',
        ];


        $document = EmployeeDocument::where('employee_id', $employee->id)->first();
        // dd($document);


       if( $document){
        foreach ($fileFields as $field) {
            $this->handleFileDelete($document->{$field});
        }

        $document->delete();
       }

        $otherdocuments = EmployeeOtherDocument::where('employee_id', $employee->id)->get();

        if($otherdocuments){
            foreach ($otherdocuments as $otherdocument) {
                $this->handleFileDelete($otherdocument->file_path);
                $otherdocument->delete();
            }
        }

        if ($employee->spouse_nid) {
            Storage::disk('public')->delete($employee->spouse_nid);
        }
        $employee->delete();
        return response()->json(['success' => 'Employee deleted successfully.']);
        // return redirect()->route('employee.index')->with('success', 'Employee deleted successfully.');
    }

    public function createDocument($id)
    {
        $employee = EmployeePersonalInformation::findOrFail($id);
        $employeedocument = EmployeeDocument::where('employee_id', $employee->id)->first();
        $employeeotherdocuments = EmployeeOtherDocument::where('employee_id', $employee->id)->get();
        return view('admin.employee.add-document', compact('employee', 'employeedocument', 'employeeotherdocuments'));
    }

    public function storeDocument(Request $request)
    {
        // dd($request->all());
        $validator = $request->validate([
            'employee_id' => 'required|exists:employee_personal_information,id',
            'profile_picture' => 'nullable|mimes:jpeg,png',
            'signature' => 'nullable|mimes:jpeg,png',
            'nid_card_front' => 'nullable|file',
            'nid_card_back' => 'nullable|file',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'trade_licence' => 'nullable|file',
            'vat' => 'nullable|file',
            'tax' => 'nullable|file',
            'gong_picture' => 'nullable|file',
            'other_documents.*' => 'nullable|file',
        ]);

        // File fields to handle dynamically
        $fileFields = [
            'profile_picture',
            'signature',
            'nid_card_front',
            'nid_card_back',
            'cv',
            'trade_licence',
            'vat',
            'tax',
            'gong_picture',
        ];


        // dd($validator);
        $document = EmployeeDocument::where('employee_id', $request->employee_id)->first();

        $employee = EmployeePersonalInformation::findOrFail($request->employee_id);
        // dd($document);

        if($document){
            foreach ($fileFields as $field) {
                if ($request->hasFile($field)) {
                    $this->handleFileDelete($document->{$field});
                    $document->{$field} = $this->handleFileUpload($request->file($field), 'EmployeeDocument/' . $employee->emp_id . '/');
                }
            }
            $document->save();
        }else{

            $employeeDocument = new EmployeeDocument();
            $employeeDocument->employee_id = $request->employee_id;


            // Loop through file fields and upload files
            foreach ($fileFields as $field) {
                if ($request->hasFile($field)) {
                    $employeeDocument->{$field} = $this->handleFileUpload($request->file($field), 'EmployeeDocument/' . $employee->emp_id . '/');
                }
            }
            $employeeDocument->save();
        }


        if ($request->hasFile('other_documents')) {
            foreach ($request->file('other_documents') as $otherDocument) {
                $employeeOtherDocument = new EmployeeOtherDocument();
                $employeeOtherDocument->employee_id = $request->employee_id;
                $employeeOtherDocument->file_path = $this->handleFileUpload($otherDocument, 'EmployeeDocument/' . $employee->emp_id . '/'.'EmployeeOtherDocument/');
                $employeeOtherDocument->save();
            }
        }

        return back()->with('success', 'Document uploaded successfully.');

    }

    public function deleteDocument(Request $request)
    {
        $fileId = $request->input('file_id');  // Get the file ID from the request

        // Fetch the document record from the database
        $document = EmployeeOtherDocument::find($fileId);

        if ($document) {
            $this->handleFileDelete($document->file_path);
            $document->delete();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    public function profileView($id){
        $employeePersonal = EmployeePersonalInformation::findOrFail($id);
        $employeedocuments = EmployeeDocument::all();
        $employeeotherdocuments = EmployeeOtherDocument::all();

        $employeetransfers = EmployeeTransfer::where('employee_id', $id)->latest()->get();
        return view('admin.employee.profile.view', compact('employeePersonal','employeedocuments','employeeotherdocuments','employeetransfers'));
    }

    public function downloadZip($id){
        $employeePersonal = EmployeePersonalInformation::findOrFail($id);

        $zipFileName = 'Document_' . $employeePersonal->first_name . '_' . $employeePersonal->last_name . '_' . $employeePersonal->emp_id  . '.zip';
        $zipFilePath = storage_path('app/public/' . $zipFileName);

        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($employeePersonal->employeeTrainings as $employeeTraining) {
                if (!empty($employeeTraining->training_doc)) {
                    $filePath = storage_path('app/public/' . $employeeTraining->training_doc);
                    if (file_exists($filePath)) {
                        $zip->addFile($filePath, basename($filePath));
                    }
                }
            }

            foreach ($employeePersonal->employeeEducations as $employeeEducation) {
                if (!empty($employeeEducation->education_doc)) {
                    $filePath = storage_path('app/public/' . $employeeEducation->education_doc);
                    if (file_exists($filePath)) {
                        $zip->addFile($filePath, basename($filePath));
                    }
                }
            }

            foreach ($employeePersonal->employeeExperiences as $employeeExperience) {
                if (!empty($employeeExperience->experiance_doc)) {
                    $filePath = storage_path('app/public/' . $employeeExperience->experiance_doc);
                    if (file_exists($filePath)) {
                        $zip->addFile($filePath, basename($filePath));
                    }
                }
            }

            foreach ($employeePersonal->employeeOtherDocuments as $employeeOtherDocument) {
                if (!empty($employeeOtherDocument->file_path)) {
                    $filePath = storage_path('app/public/' . $employeeOtherDocument->file_path);
                    if (file_exists($filePath)) {
                        $zip->addFile($filePath, basename($filePath));
                    }
                }
            }

            if (!empty($employeePersonal->employeeDocument->profile_picture)) {
                $filePath = storage_path('app/public/' . $employeePersonal->employeeDocument->profile_picture);
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, basename($filePath));
                }
            }

            if (!empty($employeePersonal->employeeDocument->signature)) {
                $filePath = storage_path('app/public/' . $employeePersonal->employeeDocument->signature);
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, basename($filePath));
                }
            }

            if (!empty($employeePersonal->employeeDocument->nid_card_front)) {
                $filePath = storage_path('app/public/' . $employeePersonal->employeeDocument->nid_card_front);
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, basename($filePath));
                }
            }

            if (!empty($employeePersonal->employeeDocument->nid_card_back)) {
                $filePath = storage_path('app/public/' . $employeePersonal->employeeDocument->nid_card_back);
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, basename($filePath));
                }
            }

            if (!empty($employeePersonal->spouse_nid)) {
                $filePath = storage_path('app/public/' . $employeePersonal->spouse_nid);
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, basename($filePath));
                }
            }

            if (!empty($employeePersonal->employeeDocument->cv)) {
                $filePath = storage_path('app/public/' . $employeePersonal->employeeDocument->cv);
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, basename($filePath));
                }
            }

            if (!empty($employeePersonal->employeeDocument->trade_licence)) {
                $filePath = storage_path('app/public/' . $employeePersonal->employeeDocument->trade_licence);
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, basename($filePath));
                }
            }

            if (!empty($employeePersonal->employeeDocument->vat)) {
                $filePath = storage_path('app/public/' . $employeePersonal->employeeDocument->vat);
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, basename($filePath));
                }
            }


            if (!empty($employeePersonal->employeeDocument->tax)) {
                $filePath = storage_path('app/public/' . $employeePersonal->employeeDocument->tax);
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, basename($filePath));
                }
            }

            if (!empty($employeePersonal->employeeDocument->gong_picture)) {
                $filePath = storage_path('app/public/' . $employeePersonal->employeeDocument->gong_picture);
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, basename($filePath));
                }
            }

            $zip->close();
        } else {
            return back()->with('error', 'Failed to create ZIP file.');
        }

        return response()->download($zipFilePath)->deleteFileAfterSend(true);
    }
    public function downloadProfile($id)
    {
        $employeePersonal = EmployeePersonalInformation::findOrFail($id);
        // $employeePersonal = EmployeePersonalInformation::with('department', 'position')->findOrFail($id);

        // Pass the data to the Blade view for PDF generation
        $data = ['employeePersonal' => $employeePersonal];

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'orientation' => 'P',
            'html5Parser' => true, // Enable HTML5 parsing
            'cssSelector' => 'mpdf', // Use specific CSS selector for PDF
        ]);

        $html = view('admin.employee.profile.profile', $data)->render();
        $mpdf->WriteHTML($html);

        return $mpdf->Output('profile_' . $id . '.pdf', 'D');
    }


    //personal information store
    private function storeCustomerInfo($request)
    {
         $personalInfo = EmployeePersonalInformation::create([
            'name' => $request->customer_name_en,
            'name_bangla' => $request->customer_name_bn,
            'father_name' => $request->customer_father_en,
            'father_name_bangla' => $request->customer_father_bn,
            'mother_name' => $request->customer_mother_en,
            'mother_name_bangla' => $request->customer_mother_bn,
            'number'=> $request->customer_phone,
            'code'=> $request->customer_id,
            'old_code'=>$request->customer_id_old,
            'contact_number_res' => $request->customer_land,
            'contact_number_emergency' => $request->customer_whatsapp,
            'email' => $request->customer_email,
            'gender' => $request->customer_gender,
            'dob' => $request->customer_dob,
            'nid_no' => $request->customer_id_number,
            'passport_no' => $request->spouse_organization,
            'region' => $request->spouse_mobile,
            'nationality' => $request->customer_nation,
            'occupation' => $request->customer_profession,
            'permanent_address' => $request->customer_add_per,
            'blood_id' => $request->customer_blood,
            'age' => $request->customer_age,
            'salesman' => $request->customer_salesman_name,
            'id_type' => $request->customer_id_type,
            'religion' => $request->customer_religion,
            'agency' => $request->customer_agency_name,
            'customer_div_pre' => $request->customer_div_pre,
            'customer_dis_pre' => $request->customer_dis_pre,
            'customer_upa_pre' => $request->customer_upa_pre,
            'customer_union_pre' => $request->customer_union_pre,
            'customer_add_pre' => $request->customer_add_pre,
            'customer_post_off_pre' => $request->customer_post_off_pre,
            'customer_post_code_pre' => $request->customer_post_code_pre,
            'customer_div_per' => $request->customer_div_per,
            'customer_dis_per' => $request->customer_dis_per,
            'customer_upa_per' => $request->customer_upa_per,
            'customer_union_pers' => $request->customer_union_pers,
            'customer_post_off_per' => $request->customer_post_off_per,
            'customer_post_code_per' => $request->customer_post_code_per,
            'customer_login_access' => $request->customer_login_access,
            'password' => Hash::make('12345678'),
        ]);

        if ($request->hasFile('customer_id_card')) {
            $file = $request->file('customer_id_card');

            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $file->storeAs('public/customer_attachment', $filename);
    

            CustomerAttachment::create([
                'customer_id' => $personalInfo->id,
                'file_for' => 'customer_id_card',
                'file_path' => 'customer_attachment/' . $filename, 
            ]);
        }

        


        return $personalInfo;
    }


    //Customer Nominee Information store
    private function storeNomineeInfo($request, $empId)
    {
        if ($request->nominee_name) {
            foreach ($request->nominee_name as $key => $value) {

                if (isset($request->nominee_pic[$key])) {
                    $file = $request->nominee_pic[$key];
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $destinationPath = public_path('customer_attachment');
                    $file->move($destinationPath, $filename);
    

                    CustomerAttachment::create([
                        'customer_id' => $empId,
                        'file_for' => 'nominee_pic',
                        'file_path' => 'customer_attachment/' . $filename, 
                    ]);
                }

                if (isset($request->nominee_id_pic[$key])) {
                    $file_nominee = $request->nominee_id_pic[$key];
                    $filename_nominee = time() . '_' . uniqid() . '.' . $file_nominee->getClientOriginalExtension();
                    $destinationPath = public_path('customer_attachment');
                    $file_nominee->move($destinationPath, $filename_nominee);
    

                    CustomerAttachment::create([
                        'customer_id' => $empId,
                        'file_for' => 'nominee_id_pic',
                        'file_path' => 'customer_attachment/' . $filename_nominee, 
                    ]);
                }
    
                // Save nominee information
                EmployeeGranter::create([
                    'customer_id' => $empId,
                    'share' => $request->nominee_share[$key] ?? null,
                    'name' => $request->nominee_name[$key] ?? null,
                    'relationship' => $request->nominee_relation[$key] ?? null,
                    'contact_number_res' => $request->granter_relation[$key] ?? null,
                    'contact_number' => $request->nominee_phone[$key] ?? null,
                    'mailing_address' => $request->nominee_email[$key] ?? null,
                    'permanent_address' => $request->nominee_per_add[$key] ?? null,
                    'present_address' => $request->nominee_pre_add[$key] ?? null,
                    'nominee_id_type' => $request->nominee_id_type[$key] ?? null,
                    'nominee_id' => $request->nominee_id[$key] ?? null,
                ]);
            }
        }
    }
    //Customer Gong Information store
    private function storeGongInfo($request, $empId)
    {
        // Customer Gong History
        if($request->gong_name){
            foreach ($request->gong_name as $key => $value) {

                if (isset($request->gong_pic[$key])) {
                    $file_gong = $request->gong_pic[$key];
                    $filename_gong = time() . '_' . uniqid() . '.' . $file_gong->getClientOriginalExtension();
                    $destinationPath = public_path('customer_attachment');
                    $file_gong->move($destinationPath, $filename_gong);
    

                    CustomerAttachment::create([
                        'customer_id' => $empId,
                        'file_for' => 'gong_pic',
                        'file_path' => 'customer_attachment/' . $filename_gong, 
                    ]);
                }
                if (isset($request->gong_id_pic[$key])) {
                    $file_gong_id = $request->gong_id_pic[$key];
                    $filename_gong_id = time() . '_' . uniqid() . '.' . $file_gong_id->getClientOriginalExtension();
                    $destinationPath = public_path('customer_attachment');
                    $file_gong_id->move($destinationPath, $filename_gong_id);
    

                    CustomerAttachment::create([
                        'customer_id' => $empId,
                        'file_for' => 'gong_id_pic',
                        'file_path' => 'customer_attachment/' . $filename_gong_id, 
                    ]);
                }

                EmployeeReference::create([
                    'customer_id' => $empId,
                    'share' => $request->gong_share[$key] ?? null,
                    'gong_name' => $request->gong_name[$key] ?? null,
                    'gong_relationship' => $request->gong_relation[$key] ?? null,
                    'gong_contact_number' => $request->gong_phone[$key] ?? null,
                    'mailing_address' => $request->gong_email[$key] ?? null,
                    'gong_address' => $request->gong_per_add[$key] ?? null,
                    'present_address' => $request->gong_pre_add[$key] ?? null,
                    'gong_id_type' => $request->gong_id_type[$key] ?? null,
                    'gong_id' => $request->gong_id[$key] ?? null,

                ]);
            }
        }
    }
    

}


