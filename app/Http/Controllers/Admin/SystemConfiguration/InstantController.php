<?php

namespace App\Http\Controllers\Admin\SystemConfiguration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\SystemConfiguration\EmployeeType;
use App\Models\Admin\SystemConfiguration\EducationType;
use App\Models\Admin\SystemConfiguration\Religion;
use App\Models\EducationBoard;
use App\Models\EducationSubject;

class InstantController extends Controller
{
    public function storeEmployeeType(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
        ]);
        $employee_type = EmployeeType::create([
            'name' => $request->name,
        ]);
        if ($employee_type) {
            return response()->json([
                'success' => true,
                'employee_type' => $employee_type,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Unable to save the employee type.',
            ]);
        }
    }

    public function storeEducationType(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
        ]);
        $education_type = EducationType::create([
            'name' => $request->name,
        ]);
        if ($education_type) {
            return response()->json([
                'success' => true,
                'education_type' => $education_type,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Unable to save the education type.',
            ]);
        }
    }

    public function storeSubject(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
        ]);
        $education_subject = EducationSubject::create([
            'name' => $request->name,
        ]);
        if ($education_subject) {
            return response()->json([
                'success' => true,
                'education_subject' => $education_subject,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Unable to save the education subject.',
            ]);
        }
    }

    public function storeBoard(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
        ]);
        $education_board = EducationBoard::create([
            'name' => $request->name,
        ]);
        if ($education_board) {
            return response()->json([
                'success' => true,
                'education_board' => $education_board,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Unable to save the education board.',
            ]);
        }
    }

    public function storeReligion(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
        ]);
        $religion = Religion::create([
            'name' => $request->name,
        ]);
        if ($religion) {
            return response()->json([
                'success' => true,
                'religion' => $religion,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Unable to save the education board.',
            ]);
        }
    }
}
