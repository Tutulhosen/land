<?php

namespace App\Http\Controllers\Employee\Announcement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Announcement\NoticeBoard;
use App\Models\Admin\SystemConfiguration\CompanyInformation;

class NoticeBoardController extends Controller
{
    public function employeeNotice() {
        $user = Auth::user();

        if ($user->department_id && $user->branch_id) {
               $noticeboards = NoticeBoard::whereHas('noticeboardDepartments', function ($query) use ($user) {
                $query->where(function ($q) use ($user) {
                    $q->where('branch_id', $user->branch_id)
                    ->orWhereNull('branch_id');
                })->where('department_id', $user->department_id);
            })->where('status', true)->whereDate('valid_till', '>=', now()->subDay())->get();
        }

        return view('employee.announcement.notice',compact(
            'noticeboards'
        ));
    }
    public function employeenoticeboardView($id){
        $noticeboard = NoticeBoard::findOrFail($id);
        $companyInformation = CompanyInformation::first();
        return view('employee.announcement.noticeview', compact('noticeboard','companyInformation'));
    }
}
