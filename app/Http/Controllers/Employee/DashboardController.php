<?php

namespace App\Http\Controllers\Employee;

use ZipArchive;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\LoginActivity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\HrAdminSetup\Attendance;
use App\Models\Admin\Employee\EmployeeDocument;
use App\Models\Admin\Employee\EmployeeOtherDocument;
use App\Models\Admin\LeaveManagement\LeaveApplication;
use App\Models\Admin\Employee\EmployeeOfficialInformation;
use App\Models\Admin\Employee\EmployeePersonalInformation;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function employeeDashboard() {
        $auth_id = Auth::user()->employee->id;
        $loginActivities = LoginActivity::where('user_id', $auth_id)->where('guard', 'employee')->orderBy('id','desc')->get();
        $leaveApplications = LeaveApplication::with(['leaveType'])->where('employee_id', $auth_id)->orderBy('id','desc')->take(5)->get();
        $attendances = Attendance::where('employee_id', $auth_id)->orderBy('created_at', 'desc')->take(5)->get();
        return view('employee.dashboard',compact(
            'leaveApplications','loginActivities','attendances'
        ));
    }

     public function profileView($id){
        $employeePersonal = EmployeePersonalInformation::findOrFail($id);
        $employeeOfficialAll = EmployeeOfficialInformation::all();
        return view('employee.profile.view', compact('employeePersonal','employeeOfficialAll'));
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

        $html = view('employee.profile.profile', $data)->render();
        $mpdf->WriteHTML($html);

        return $mpdf->Output('profile_' . $id . '.pdf', 'D');
    }


    public function employeeAttendance(Request $request)
    {

        $auth_id = Auth::user()->employee->id;
        $shift_id = Auth::user()->employee->payRollInformation->shift_id;
        $today = date('Y-m-d');
        $shiftStartTime = Carbon::parse(Auth::user()->employee->payRollInformation->shift->start_time);
        $shiftEndTime = Carbon::parse(Auth::user()->employee->payRollInformation->shift->end_time);
        $timeNow = Carbon::now();

        if ($timeNow->gt($shiftStartTime)) {
            $late = $timeNow->diffInMinutes($shiftStartTime); // You can also use diffInSeconds or diffInHours
        } else {
            $late = 0;
        }
        if ($timeNow->gt($shiftEndTime)) {
            $overtime =$timeNow->diffInMinutes( $shiftEndTime); // You can also use diffInSeconds or diffInHours
        } else {
            $overtime = 0;
        }
        $action = $request->input('action');

        try {

            if ($action === 'punch_in') {
                $data = [
                    'check_in' => $timeNow,
                    'check_out' => null,
                    'shift_id' => $shift_id,
                    'total_hours' => null,
                    'late' => $late,
                    'overtime_hours' => null,
                    'status' => 'present',
                    'device_id' => 'web',
                    'ip_address' => $request->ip(),
                    'created_by' => null,
                ];
            } elseif ($action === 'punch_out') {

                $punchInTime = Attendance::where('employee_id', $auth_id)
                    ->where('date', $today)
                    ->value('check_in');

                    if ($timeNow->gt($punchInTime)) {
                        $totalTime = $timeNow->diffInMinutes($punchInTime); // You can also use diffInSeconds or diffInHours
                    } else {
                        $totalTime = 0;
                    }

                $data = [
                    'check_out' => $timeNow,
                    'shift_id' => $shift_id,
                    'total_hours' => $totalTime,
                    'overtime_hours' => $overtime,
                    'ip_address' => $request->ip(),
                ];
            } else {
                return back()->with('error', 'Failed to save attendance.');
            }

            $attendance = Attendance::updateOrCreate(
                ['employee_id' => $auth_id, 'date' => $today],
                $data
            );
            return back()->with('success', 'Attendance saved successfully!');
        } catch (\Exception $e) {
            Log::error('Error saving attendance: ' . $e->getMessage());
            return back()->with('error', 'Failed to save attendance.');
        }
    }

}
