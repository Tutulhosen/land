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
            // Customer General information
            'customer_id' => 'required',
            'customer_name_en' => 'required',
            'customer_gender' => 'required',
            'customer_father_en' => 'required',
            'customer_mother_en' => 'required',
            'customer_agency_name' => 'required',
            'customer_salesman_name' => 'required',


            // Customer Contact
            'customer_phone' => 'required',
            'customer_div_pre' => 'required',
            'customer_dis_pre' => 'required',
            'customer_upa_pre' => 'required',
            'customer_div_per' => 'required',
            'customer_dis_per' => 'required',
            'customer_upa_per' => 'required',



            // Nominee
            'nominee_name' => 'required',
            'nominee_name.*' => 'required',
            'nominee_relation' => 'required',
            'nominee_relation.*' => 'required',
            'nominee_phone' => 'required',
            'nominee_phone.*' => 'required',

            // Gong
            'gong_name' => 'required',
            'gong_name.*' => 'required',
            'gong_relation' => 'required',
            'gong_relation.*' => 'required',
            'gong_phone' => 'required',
            'gong_phone.*' => 'required',

           
        ];
    }
}
