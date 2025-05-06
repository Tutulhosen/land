<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Employee\EmployeeController;
use App\Http\Controllers\Employee\DashboardController as EmployeeDashboardController;
use App\Http\Controllers\Employee\Attendance\AttendanceController as EmployeeAttendanceController;
use App\Http\Controllers\Employee\Announcement\NoticeBoardController as EmployeeNoticeBoardController;
use App\Http\Controllers\Employee\Announcement\AnnouncementController as EmployeeAnnouncementController;
use App\Http\Controllers\Employee\Leave\LeaveApplicationController as EmployeeLeaveApplicationController;

Route::middleware(['auth:employee', 'verified'])->group(function () {
    Route::prefix('/employee/dashboard')->controller(EmployeeDashboardController::class)->group(function () {
        Route::get('/', 'employeeDashboard')->name('employee-dashboard');
        Route::get('/profile/view/{id}', 'profileView')->name('employee-profile');

        Route::post('/store/document/', 'storeDocument')->name('employee-profile.document.store');
        Route::get('/downloadzip/{id}', 'downloadZip')->name('employee-profile.downloadzip.file');
        Route::get('/downloadprofile/{id}', 'downloadProfile')->name('employee-profile.download.profile');
        Route::post('/attendance', 'employeeAttendance')->name('employee.attendance');
    });

    Route::prefix('/employee/dashboard')->controller(EmployeeLeaveApplicationController::class)->group(function () {
        Route::get('/leave-applications', 'employeeLeaveApplications')->name('employee-leave-applications');
        Route::get('/leave-applications/get-leave-days/{leave_type_id}','getLeaveDays');
        Route::post('/leave-application/store', 'store')->name('employee-leave-application.store');
    });

    Route::prefix('/employee/dashboard')->controller(EmployeeAnnouncementController::class)->group(function () {
        Route::get('/announcement', 'employeeAnnouncement')->name('employee-announcement');
        Route::get('/announcement-view/{id}', 'employeeannouncementView')->name('employee.announcement.view');
    });

    Route::prefix('/employee/dashboard')->controller(EmployeeNoticeBoardController::class)->group(function () {
        Route::get('/notice', 'employeeNotice')->name('employee-notice');
        Route::get('/noticeboard-view/{id}', 'employeenoticeboardView')->name('employeee.noticeboard.view');
    });

    Route::prefix('/employee/dashboard')->controller(EmployeeAttendanceController::class)->group(function () {
        Route::get('/attendance', 'employeeAttendance')->name('employee-attendance');
    });
});
