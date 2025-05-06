<?php

namespace App\Http\Controllers\Employee\Announcement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Announcement\NoticeBoard;
use App\Models\Admin\Announcement\Announcement;
use App\Models\Admin\SystemConfiguration\CompanyInformation;

class AnnouncementController extends Controller
{
    public function employeeAnnouncement() {
        // $announcements = Announcement::with('announcementDepartments.department.designation.officialInformation')
        // ->whereHas('announcementDepartments.department.designation.officialInformation', function ($query) {
        //     $query->where('emp_personal_id', Auth::user()->employee->id);
        // })->get();

        $user = Auth::user();

        if ($user->department_id && $user->branch_id) {
            $announcements = Announcement::whereHas('announcementDepartments', function ($query) use ($user) {
                   $query->where(function ($q) use ($user) {
                       $q->where('branch_id', $user->branch_id)
                    ->orWhereNull('branch_id');
                })->where('department_id', $user->department_id);
            })->where('status', true) ->where('publish_date', '<=', now())->whereDate('effective_date', '>=', now()->subDay())->get();
        }

        return view('employee.announcement.announcement',compact(
            'announcements'
        ));
    }
    public function employeeannouncementView($id){
        $announcement = Announcement::findOrFail($id);
        $companyInformation = CompanyInformation::first();
        return view('employee.announcement.announcementview', compact('announcement','companyInformation'));
    }

}
