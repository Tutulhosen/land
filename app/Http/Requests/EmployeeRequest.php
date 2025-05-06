<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $employeeId = $this->route('id');

        return [
            // Employee Personal information
            'salutation' => 'nullable|exists:salutations,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'emp_id' => [
                'required',
                'string',
                'max:255',
                Rule::unique('employee_personal_information', 'emp_id')->ignore($employeeId), // Ignore when updating
            ],
            'gender' => 'nullable|exists:genders,id',
            'religion' => 'nullable|exists:religions,id',
            'nationality' => 'nullable|exists:nationalities,id',
            'blood_group' => 'nullable|exists:blood_groups,id',
            'identification_type' => 'nullable|string',
            'identification_number' => 'nullable|string|max:50',
            'dob' => 'nullable|string',
            'fathers_name' => 'nullable|string|max:255',
            'mothers_name' => 'nullable|string|max:255',
            'marital_status' => 'nullable|string|in:Single,Married,Divorced',
            'spouse_name' => 'nullable|string|max:255',
            'spouse_occupation' => 'nullable|string|max:255',
            'spouse_organization' => 'nullable|string|max:255',
            'spouse_mobile' => 'nullable|string',
            'spouse_nid_number' => 'nullable|string',
            'spouse_nid' => 'nullable|file|max:10048',
            'spouse_dob' => 'nullable|string',

            // Employee Contact
            'contact_number' => 'required|string',
            'email' => 'nullable|email',
            'whatsapp' => 'nullable|string|max:15',
            'pres_add' => 'nullable|string|max:500',
            'district' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:10',
            'permanent_add' => 'nullable|string|max:500',
            'permanent_district' => 'nullable|string|max:255',
            'permanent_postal_code' => 'nullable|string|max:10',
            'same_address' => 'nullable|boolean',
            'emergency_contact_person' => 'nullable|string|max:255',
            'relation' => 'nullable|exists:relations,id',
            'occupation' => 'nullable|string|max:255',
            'emergency_contact' => 'nullable|string',
            'emergency_email' => 'nullable|email|max:255',
            'emergency_address' => 'nullable|string|max:500',

            // Official Information
            'employee_type' => 'required|exists:education_types,id',
            'department_id' => 'required|exists:departments,id',
            'designation_id' => 'nullable|exists:designations,id',
            'branch_id' => 'required|exists:branches,id',
            'reporting_to_first' => 'nullable|string|max:255',
            'reporting_to_second' => 'nullable|string|max:255',
            'reporting_to_third' => 'nullable|string|max:255',
            'grade_id' => 'nullable|exists:grades,id',
            'project_id' => 'nullable|exists:project_lists,id',
            'notice_start_date' => 'nullable|date',
            'notice_end_date' => 'nullable|date',
            'official_phone' => 'nullable|string|max:15',
            'official_email' => 'nullable|email|max:255',
            'official_whatsapp' => 'nullable|string|max:15',
            'user_email' => 'nullable|email',
            'password' => 'nullable|string|min:6|max:12',
            'login_allowed' => 'nullable|boolean',

            // Granter
            'granter_name' => 'nullable|array',
            'granter_name.*' => 'nullable|string',
            'granter_contact_number' => 'nullable|array',
            'granter_contact_number.*' => 'nullable|string',
            'granter_relation' => 'nullable|array',
            'granter_relation.*' => 'nullable|exists:relations,id',
            'granter_address' => 'nullable|array',
            'granter_address.*' => 'nullable|string',
            'granter_id_number' => 'nullable|array',
            'granter_id_number.*' => 'nullable|string',
            'granter_id_doc' => 'nullable|array',
            'granter_id_doc.*' => 'nullable|file|max:10048',

            // Reference
            'reference_name' => 'nullable|array',
            'reference_name.*' => 'nullable|string',
            'reference_contact_number' => 'nullable|array',
            'reference_contact_number.*' => 'nullable|string',
            'reference_relation' => 'nullable|array',
            'reference_relation.*' => 'nullable|exists:relations,id',
            'reference_address' => 'nullable|array',
            'reference_address.*' => 'nullable|string',
            'reference_id_number' => 'nullable|array',
            'reference_id_number.*' => 'nullable|string',
            'reference_id_doc' => 'nullable|array',
            'reference_id_doc.*' => 'nullable|file|max:10048',

            // Education History
            'education_type' => 'nullable|array',
            'education_type.*' => 'nullable|exists:education_types,id',
            'education' => 'nullable|array',
            'education.*' => 'nullable|exists:education,id',
            'group_major_subject' => 'nullable|array',
            'group_major_subject.*' => 'nullable|string',
            'passing_year' => 'nullable|array',
            'passing_year.*' => 'nullable|string',
            'institute_name' => 'nullable|array',
            'institute_name.*' => 'nullable|string',
            'board_university' => 'nullable|array',
            'board_university.*' => 'nullable|string',
            'result' => 'nullable|array',
            'result.*' => 'nullable|string',
            'education_doc' => 'nullable|array',
            'education_doc.*' => 'nullable|file|max:10048',

            // Experience History
            'company_name' => 'nullable|array',
            'company_name.*' => 'nullable|string|max:255',
            'job_position' => 'nullable|array',
            'job_position.*' => 'nullable|string|max:255',
            'department' => 'nullable|array',
            'department.*' => 'nullable|string|max:255',
            'job_respons' => 'nullable|array',
            'job_respons.*' => 'nullable|string|max:500',
            'from_date' => 'nullable|array',
            'from_date.*' => 'nullable|date',
            'to_date' => 'nullable|array',
            'to_date.*' => 'nullable|date',
            'duration' => 'nullable|array',
            'duration.*' => 'nullable|string',
            'projects' => 'nullable|array',
            'projects.*' => 'nullable|string|max:500',
            'years_of_experience' => 'nullable|array',
            'years_of_experience.*' => 'nullable|string|max:500',
            'experiance_doc' => 'nullable|array',
            'experiance_doc.*' => 'nullable|file|max:10048',

            // Training History
            'train_type' => 'nullable|array',
            'train_type.*' => 'nullable|string|max:255',
            'course_title' => 'nullable|array',
            'course_title.*' => 'nullable|string|max:255',
            'description' => 'nullable|array',
            'description.*' => 'nullable|string',
            'course_duration' => 'nullable|array',
            'course_duration.*' => 'nullable|string',
            'course_start' => 'nullable|array',
            'course_start.*' => 'nullable|date',
            'course_end' => 'nullable|array',
            'course_end.*' => 'nullable|date',
            'year' => 'nullable|array',
            'year.*' => 'nullable|string',
            'training_institute_name' => 'nullable|array',
            'training_institute_name.*' => 'nullable|string|max:255',
            'institute_address' => 'nullable|array',
            'institute_address.*' => 'nullable|string|max:500',
            'resource' => 'nullable|array',
            'resource.*' => 'nullable|string|max:255',
            'course_result' => 'nullable|array',
            'course_result.*' => 'nullable|string|max:255',
            'training_doc' => 'nullable|array',
            'training_doc.*' => 'nullable|file|max:10048',

            // PayRoll History
            'holiday_id' => 'nullable|exists:week_offs,id',
            'shift_id' => 'nullable|exists:shifts,id',
            'overtime_enable' => 'nullable|boolean',
            'sallery_payment_by' => 'nullable|in:Cash,Bank',
            'bank_name' => 'nullable|string|max:255',
            'account_holder_name' => 'nullable|string|max:255',
            'branch_name' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:255',
            'tin_number' => 'nullable|string|max:255',
            'joining_date' => 'nullable|date',
            'joining_sallery' => 'nullable|string|max:255',
            'probation_period' => 'nullable|exists:probation_periods,id',
            'probation_period_starting_date' => 'nullable|date',
            'probation_period_end_date' => 'nullable|date',
            'salary_type' => 'nullable|string|max:255',
        ];
    }
}
