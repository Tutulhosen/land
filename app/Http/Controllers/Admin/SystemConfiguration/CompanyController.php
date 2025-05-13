<?php

namespace App\Http\Controllers\Admin\SystemConfiguration;

use App\Models\Upazila;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Node\Block\Document;
use App\Models\Admin\SystemConfiguration\BrandSetting;
use App\Models\Admin\SystemConfiguration\CompanyDocument;
use App\Models\Admin\SystemConfiguration\ApplicationSetting;
use App\Models\Admin\SystemConfiguration\CompanyInformation;
use App\Models\Admin\SystemConfiguration\ContactInformation;

class CompanyController extends Controller
{
    private function handleFileUpload($file, $path)
    {
        $fileName = time().uniqid().'.'. $file->getClientOriginalExtension();
        return $file->storeAs('uploads/' . $path, $fileName, 'public');
    }

    private function handleFileDelete($filePath)
    {
        if ($filePath && Storage::exists('public/' . $filePath)) {
            Storage::delete('public/' . $filePath);
        }
    }
    public function index() {
        $districts = District::all();
        $upazilas = Upazila::all();
        $companyInformation = CompanyInformation::with('contactInformation','brandSetting','applicationSetting','companyDocument')->first();
        // dd($companyInformation->working_days);
        return view('admin.system-configuration.company.index',compact(
            'districts','upazilas','companyInformation'
        ));
    }
    public function getUpazilasByDistrict($districtId)
    {
        $upazilas = Upazila::where('district_id', $districtId)->get();
        return response()->json($upazilas);
    }
    public function companyInformationUpdate(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'district_id' => 'nullable|exists:districts,id',
            'upazila_id' => 'nullable|exists:upazilas,id',
            'zip_code' => 'nullable|string|max:20',
            'timezone' => 'nullable|string|max:255',
            'working_days' => 'nullable|array',
            'working_days.*' => 'string',
            'office_start_time' => 'nullable',
            'office_end_time' => 'nullable',
            'company_registration_number' => 'nullable|string|max:255',
            'trade_license_number' => 'nullable|string|max:255',
            'bin_vat_number' => 'nullable|string|max:255',
        ]);

        $company = CompanyInformation::findOrFail($id);
        $company->update([
            'company_name' => $request->company_name,
            'address' => $request->address,
            'district_id' => $request->district_id,
            'upazila_id' => $request->upazila_id,
            'zip_code' => $request->zip_code,
            'timezone' => $request->timezone,
            'working_days' => $request->working_days,
            'office_start_time' => $request->office_start_time,
            'office_end_time' => $request->office_end_time,
            'company_registration_number' => $request->company_registration_number,
            'trade_license_number' => $request->trade_license_number,
            'bin_vat_number' => $request->bin_vat_number,
        ]);

        return redirect()->route('company.index')->with('success', 'Company Information Successfully Updated!')->with('activeTab', 'company-information');
    }

    public function contactInformationUpdate(Request $request, $id)
    {
        $request->validate([
            'official_contact_number' => 'required|string|max:15',
            'whatsapp_number' => 'nullable|string|max:15',
            'landline_number' => 'nullable|string|max:15',
            'hotline_number' => 'nullable|string|max:15',
            'email_address' => 'required|email|max:255',
            'website_address' => 'nullable|url|max:255',
            'google_map_iframe' => 'nullable|string',
        ]);

        $contact = ContactInformation::findOrFail($id);
        $contact->update([
            'official_contact_number' => $request->official_contact_number,
            'whatsapp_number' => $request->whatsapp_number,
            'landline_number' => $request->landline_number,
            'hotline_number' => $request->hotline_number,
            'email_address' => $request->email_address,
            'website_address' => $request->website_address,
            'google_map_iframe' => $request->google_map_iframe,
        ]);

        return redirect()->route('company.index')->with('success', 'Contact Information Successfully Updated!')->with('activeTab', 'contact-information');
    }

    public function brandSettingUpdate(Request $request, $id) {
        $request->validate([
            'main_logo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'alternative_logo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);
        $brandSetting = BrandSetting::findOrFail($id);
        if ($request->hasFile('main_logo')) {
            $this->handleFileDelete($brandSetting->main_logo);
            $brandSetting->main_logo = $this->handleFileUpload($request->file('main_logo'), 'company/brand_setting/main_logo');
        }
        if ($request->hasFile('alternative_logo')) {
            $this->handleFileDelete($brandSetting->alternative_logo);
            $brandSetting->alternative_logo = $this->handleFileUpload($request->file('alternative_logo'), 'company/brand_setting/alternative_logo');
        }
        if ($request->hasFile('favicon')) {
            $this->handleFileDelete($brandSetting->favicon);
            $brandSetting->favicon = $this->handleFileUpload($request->file('favicon'), 'company/brand_setting/favicon');
        }
        $brandSetting->save();
        return redirect()->route('company.index')->with('success', 'Brand settings updated successfully!')->with('activeTab', 'brand-setting');
    }
    public function applicationSettingUpdate(Request $request, $id) {
        $request->validate([
            'application_title' => 'nullable|string|max:255',
            'copyright_text' => 'nullable|string|max:255',
            'date_format' => 'nullable|string|in:dd-mm-yyyy,mm-dd-yyyy,yyyy-mm-dd',
            'time_format' => 'nullable|string|in:12,24',
        ]);
        $company = ApplicationSetting::findOrFail($id);
        $company->update([
            'application_title' => $request->application_title,
            'copyright_text' => $request->copyright_text,
            'date_format' => $request->date_format,
            'time_format' => $request->time_format,
        ]);
        return redirect()->route('company.index')->with('success', 'Application settings updated successfully!')->with('activeTab', 'application-setting');
    }

    public function companyDocumentUpdate(Request $request, $id) {
        $request->validate([
            'letterhead_vertical' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'invoice_vertical' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'money_receipt_vertical' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'letterhead_horizontal' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'invoice_horizontal' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'money_receipt_horizontal' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $companyDocument = CompanyDocument::findOrFail($id);
        if ($request->hasFile('letterhead_vertical')) {
            $this->handleFileDelete($companyDocument->letterhead_vertical);
            $companyDocument->letterhead_vertical = $this->handleFileUpload($request->file('letterhead_vertical'), 'company/company_document/letterhead_vertical');
        }
        if ($request->hasFile('invoice_vertical')) {
            $this->handleFileDelete($companyDocument->invoice_vertical);
            $companyDocument->invoice_vertical = $this->handleFileUpload($request->file('invoice_vertical'), 'company/company_document/invoice_vertical');
        }
        if ($request->hasFile('money_receipt_vertical')) {
            $this->handleFileDelete($companyDocument->money_receipt_vertical);
            $companyDocument->money_receipt_vertical = $this->handleFileUpload($request->file('money_receipt_vertical'), 'company/company_document/money_receipt_vertical');
        }
        if ($request->hasFile('letterhead_horizontal')) {
            $this->handleFileDelete($companyDocument->letterhead_horizontal);
            $companyDocument->letterhead_horizontal = $this->handleFileUpload($request->file('letterhead_horizontal'), 'company/company_document/letterhead_horizontal');
        }
        if ($request->hasFile('invoice_horizontal')) {
            $this->handleFileDelete($companyDocument->invoice_horizontal);
            $companyDocument->invoice_horizontal = $this->handleFileUpload($request->file('invoice_horizontal'), 'company/company_document/invoice_horizontal');
        }
        if ($request->hasFile('money_receipt_horizontal')) {
            $this->handleFileDelete($companyDocument->money_receipt_horizontal);
            $companyDocument->money_receipt_horizontal = $this->handleFileUpload($request->file('money_receipt_horizontal'), 'company/company_document/money_receipt_horizontal');
        }
        $companyDocument->save();
        return redirect()->route('company.index')->with('success', 'Company Documents updated successfully!')->with('activeTab', 'company-document');
    }

}
