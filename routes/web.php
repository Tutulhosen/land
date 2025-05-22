<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\MaintenanceController;
use App\Http\Controllers\Admin\Report\ReportController;
use App\Http\Controllers\Admin\ManageUser\RoleController;
use App\Http\Controllers\Admin\ManageUser\UserController;
use App\Http\Controllers\Admin\Employee\EmployeeController;
use App\Http\Controllers\Admin\HrAdminSetup\GradeController;
use App\Http\Controllers\Admin\HrAdminSetup\ShiftController;
use App\Http\Controllers\Admin\HrAdminSetup\HolidayController;
use App\Http\Controllers\Admin\Attendance\AttendanceController;
use App\Http\Controllers\Admin\ManageUser\PermissionController;
use App\Http\Controllers\Admin\HrAdminSetup\LeaveTypeController;
use App\Http\Controllers\Admin\HrAdminSetup\DepartmentController;
use App\Http\Controllers\Admin\Announcement\NoticeBoardController;
use App\Http\Controllers\Admin\HrAdminSetup\DesignationController;
use App\Http\Controllers\Admin\Announcement\AnnouncementController;
use App\Http\Controllers\Admin\Employee\EmployeeTransferController;
use App\Http\Controllers\Admin\SystemConfiguration\BranchController;
use App\Http\Controllers\Admin\HrDocuments\OfficialLettersController;
use App\Http\Controllers\Admin\SystemConfiguration\CompanyController;
use App\Http\Controllers\Admin\SystemConfiguration\InstantController;
use App\Http\Controllers\Admin\SystemConfiguration\ProjectController;
use App\Http\Controllers\Admin\Employee\EmployeeConfirmationController;
use App\Http\Controllers\Admin\HrAdminSetup\DocumentTemplateController;
use App\Http\Controllers\Admin\LeaveManagement\LeaveApplicationController;
use App\Http\Controllers\Admin\SystemConfiguration\AdditionalSetupController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\MoneyReceipt\MoneyReceiptController;
use App\Http\Controllers\Admin\SystemConfiguration\PlotController;
use App\Http\Controllers\DependencyController;
use App\Http\Controllers\Plot\PlotManageController;
use Illuminate\Support\Facades\Artisan;

Route::get('/clear-all', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return 'All caches cleared!';
});



//system setup routes
Route::get('/setup', [SetupController::class, 'index'])->name('setup.welcome');
Route::get('/setup/company', [SetupController::class, 'company'])->name('setup.company');
Route::post('/setup/application-setup/store', [SetupController::class, 'storeApplicationSetup'])->name('setup.application.save');
Route::post('/setup/company-setup/store', [SetupController::class, 'storeCompanySetup'])->name('setup.company.save');
// Route::post('/setup/database-setup', [SetupController::class, 'storeDatabaseSetup']);
Route::post('/setup/migrate-database', [SetupController::class, 'migrateDatabase']);
Route::post('/setup/seed-database', [SetupController::class, 'seedDatabase']);
Route::post('/setup/database-setup', [SetupController::class, 'DatabaseConnection']);
Route::post('/setup/admin-store', [SetupController::class, 'storeSuperAdmin'])->name('setup.admin.save');

Route::get('/setup/server-info', function () {
    return response()->json([
        'phpVersion' => PHP_VERSION,
        'laravelVersion' => app()->version(),
        'serverOS' => PHP_OS,
    ]);
})->name('setup.server.info');

Route::get('/setup/finish', [SetupController::class, 'finish'])->name('setup.finish');


Route::get('/', function () {
    return redirect()->route('login');
});
Route::post('/admin-login', [LoginController::class, 'adminLogin'])->name('admin-login');
Route::post('/employee-login', [LoginController::class, 'employeeLogin'])->name('employee-login');
Route::post('/custom-logout', [LoginController::class, 'logout'])->name('custom-logout');

Route::middleware(['auth:admin', 'verified'])->group(function () {

    Route::prefix('/dashboard')->controller(AdminDashboardController::class)->group(function () {
        Route::get('/', 'adminDashboard')->name('dashboard');
    });

    Route::prefix('/dashboard')->controller(DepartmentController::class)->group(function () {
        Route::get('/department', 'index')->name('department.index');
        Route::post('/department/store', 'store')->name('department.store');
        Route::put('/department/update/{id}', 'update')->name('department.update');
        Route::delete('/department/destroy/{id}', 'destroy')->name('department.destroy');
        Route::post('/department/toggle/{id}', 'departmentToggle')->name('department.toggle');
    });

    Route::prefix('/dashboard')->controller(DesignationController::class)->group(function () {
        Route::get('/designation', 'index')->name('designation.index');
        Route::post('/designation/store', 'store')->name('designation.store');
        Route::put('/designation/update/{id}', 'update')->name('designation.update');
        Route::delete('/designation/destroy/{id}', 'destroy')->name('designation.destroy');
        Route::post('/designation/toggle/{id}', 'designationToggle')->name('designation.toggle');
    });

    Route::prefix('/dashboard')->controller(ShiftController::class)->group(function () {
        Route::get('/shift', 'index')->name('shift.index');
        Route::post('/shift/store', 'store')->name('shift.store');
        Route::put('/shift/update/{id}', 'update')->name('shift.update');
        Route::delete('/shift/destroy/{id}', 'destroy')->name('shift.destroy');
        Route::get('/shift/designations/{departmentId}', 'getDesignations');
        Route::post('/shift/toggle/{id}', 'shiftToggle')->name('shift.toggle');
        Route::post('/shift/department/assigned', 'departmentAssignment')->name('shift.department-assign');
        Route::delete('/shift-department/{id}/delete', 'shiftDepartmentDestroy')->name('shift-department.destroy');
    });

    Route::prefix('/dashboard')->controller(PlotManageController::class)->group(function () {
        Route::get('/plot/sale', 'sale')->name('plot.manage.index');
        Route::get('/plot/sale/create', 'sale_create')->name('plot.manage.sale.create');
        Route::post('/plot/sale/store', 'sale_store')->name('plot.manage.sale.store');
        Route::delete('/plot/sale/destroy/{id}', 'plot_sale_destroy')->name('plot.sale.destroy');
    });


    // ! Money reciept routes

    Route::prefix('/dashboard')->controller(MoneyReceiptController::class)->group(function () {
        Route::get('/money/receipt/create-mr', 'createMr')->name('money.receipt.createMr');
        Route::get('/money/receipt/approved-mr', 'approvedMr')->name('money.receipt.approvedMr');

        // ! Plot booking based on cutomer
        Route::get('/plot-bookings/{cutomerId}', 'bookingPlotByCustomerId')->name('bookings.plot');
    });


    Route::prefix('/dashboard')->controller(MoneyReceiptController::class)->group(function () {
        Route::get('/money/receipt/create-mr', 'createMr')->name('money.receipt.createMr');
        Route::get('/money/receipt/approved-mr', 'approvedMr')->name('money.receipt.approvedMr');
    });

    Route::prefix('/dashboard')->controller(EmployeeController::class)->group(function () {
        Route::get('/customer/index', 'index')->name('customer.index');
        Route::get('/customer/create', 'create')->name('customer.create');
        Route::post('/customer/store', 'store')->name('customer.store');
        Route::get('/customer/edit/{id}', 'edit')->name('customer.edit');
        Route::put('/customer/update/{id}', 'update')->name('customer.update');
        Route::delete('/customer/destroy/{id}', 'destroy')->name('customer.destroy');
        Route::get('/customer/profile/view/{id}', 'profileView')->name('customer.profile.view');

        Route::get('/employee/designations/{departmentId}', 'getDesignations');
        Route::get('/employee/branch/employees/{branchId}', 'getEmployeesByBranch');
        Route::get('/employee/shifts/{departmentId}', 'getShift');
        Route::post('/employee/toggle/{id}', 'employeeToggle')->name('employee.toggle');
        Route::get('/employee/downloadzip/{id}', 'downloadZip')->name('employee.downloadzip.file');
        Route::get('/employee/downloadprofile/{id}', 'downloadProfile')->name('employee.download.profile');

        Route::get('employee/create/{id}/document', 'createDocument')->name('employee.document.create');
        Route::post('/employee/store/document/', 'storeDocument')->name('employee.document.store');
        Route::post('/employee/delete/document/', 'deleteDocument')->name('employee.delete.document');

        //grade
        Route::get('/employee/designations/grades/{designationsId}', 'getGrades')->name('employee.designations.grades');
    });

    Route::prefix('/dashboard')->controller(EmployeeConfirmationController::class)->group(function () {
        Route::get('/employee/confirmation/index', 'index')->name('employee.confirmation.index');
        Route::get('/employee/confirmation/create', 'create')->name('employee.confirmation.create');
        Route::get('/employee/confirmation/employees/{departmentId}/{branchId}', 'getEmployees');
        Route::get('/employee/confirmation/employees/{employeeId}', 'getEmployeeInfo');
        Route::post('/employee/confirmation/store', 'store')->name('employee.confirmation.store');
    });
    Route::prefix('/dashboard')->controller(EmployeeTransferController::class)->group(function () {
        Route::get('/employee/transfer/index', 'index')->name('employee.transfer.index');
        Route::get('/employee/transfer/create', 'create')->name('employee.transfer.create');
        Route::get('/employee/transfer/employees/{departmentId}/{branchId}', 'getEmployees');
        Route::get('/employee/transfer/employees/{employeeId}', 'getEmployeeInfo');
        Route::post('/employee/transfer/store', 'store')->name('employee.transfer.store');
    });

    Route::prefix('/dashboard')->controller(LeaveTypeController::class)->group(function () {
        Route::get('/leavetype', 'index')->name('leavetype.index');
        Route::post('/leavetype/store', 'store')->name('leavetype.store');
        Route::put('/leavetype/update/{id}', 'update')->name('leavetype.update');
        Route::delete('/leavetype/destroy/{id}', 'destroy')->name('leavetype.destroy');
        Route::get('/leavetype/designations/{departmentId}', 'getDesignations');
        Route::post('/leavetype/toggle/{id}', 'leavetypeToggle')->name('leavetype.toggle');
        Route::post('/leavetype/department/assigned', 'departmentAssignment')->name('leave-type.department-assign');
        Route::delete('/leave-type-department/{id}/delete', 'leaveTypeDestroy')->name('leave-type-department.destroy');
    });

    Route::prefix('/dashboard/leave-management')->controller(LeaveApplicationController::class)->group(function () {
        Route::get('/leave-application', 'index')->name('leave-application.index');
        Route::get('/leave-approve-reject', 'approveReject')->name('leave-approve-reject.approveandreject');
        Route::get('/get-employees/{department_id}', 'getEmployees');
        Route::get('/get-leave-types/{employee_id}', 'getLeaveTypesByEmployee');
        Route::get('/get-leave-days/{leave_type_id}', 'getLeaveDays');
        Route::post('/leave-application/store', 'store')->name('leave-application.store');
        Route::put('/leave-application/{id}/update-status', 'updateStatus')->name('leave-application.updateStatus');
        Route::delete('/leave-application/destroy/{id}', 'destroy')->name('leave-application.destroy');
    });

    Route::prefix('/dashboard')->controller(HolidayController::class)->group(function () {
        Route::get('/holiday', 'index')->name('holiday.index');
        Route::get('/holiday/create', 'create')->name('holiday.create');
        Route::post('/holiday/store', 'store')->name('holiday.store');
        Route::put('/holiday/update/{id}', 'update')->name('holiday.update');
        Route::delete('/holiday/destroy/{id}', 'destroy')->name('holiday.destroy');
        Route::post('/holiday/toggle/{id}', 'holidayToggle')->name('holiday.toggle');
    });

    Route::prefix('/dashboard')->controller(DocumentTemplateController::class)->group(function () {
        Route::get('/documenttemplate', 'index')->name('documenttemplate.index');
        Route::post('/documenttemplate/store', 'store')->name('documenttemplate.store');
        Route::put('/documenttemplate/update/{id}', 'update')->name('documenttemplate.update');
        Route::delete('/documenttemplate/destroy/{id}', 'destroy')->name('documenttemplate.destroy');
        Route::post('/documenttemplate/toggle/{id}', 'documenttemplateToggle')->name('documenttemplate.toggle');
    });

    Route::resource('/dashboard/hr-documents/official-letters', OfficialLettersController::class);
    Route::get('/dashboard/hr-documents/official-letters/get-template/{letterTypeId}/{employeeId}/{signatoryId}', [OfficialLettersController::class, 'getTemplate'])->name('official.letters.get.template');
    Route::post('/dashboard/hr-documents/official-letters/generate-pdf', [OfficialLettersController::class, 'generatePDF']);
    Route::post('/dashboard/hr-documents/official-letters/save-content', [OfficialLettersController::class, 'saveContent']);


    Route::prefix('/dashboard/announcements')->group(function () {
        Route::resource('announcement', AnnouncementController::class);
        Route::post('/announcement/toggle/{id}', [AnnouncementController::class, 'announcementToggle'])->name('announcement.toggle');
        Route::get('/announcement-view/{id}', [AnnouncementController::class, 'announcementView'])->name('announcement.view');
        Route::resource('noticeboard', NoticeBoardController::class);
        Route::post('/noticeboard/toggle/{id}', [NoticeBoardController::class, 'noticeboardToggle'])->name('noticeboard.toggle');
        Route::get('/noticeboard-view/{id}', [NoticeBoardController::class, 'noticeboardView'])->name('noticeboard.view');
    });

    Route::prefix('/dashboard')->controller(GradeController::class)->group(function () {
        Route::get('/grade', 'index')->name('grade.index');
        Route::post('/grade/store', 'store')->name('grade.store');
        Route::post('/grade/toggle/{id}', 'gradeToggle')->name('grade.toggle');
        Route::put('/grade/update/{id}', 'update')->name('grade.update');
        Route::delete('/grade/destroy/{id}', 'destroy')->name('grade.destroy');
    });

    Route::prefix('/dashboard')->controller(AdditionalSetupController::class)->group(function () {
        Route::get('/additional-setup', 'index')->name('additional-setup.index');
        // client type
        Route::post('/additional-setup/client-type/store', 'clientTypeStore')->name('client-type.store');
        Route::post('/additional-setup/client-type/toggle/{id}', 'clientTypeToggle')->name('client-type.toggle');
        Route::put('/additional-setup/client-type/update/{id}', 'clientTypeUpdate')->name('client-type.update');
        Route::delete('/additional-setup/client-type/destroy/{id}', 'clientTypeDestroy')->name('client-type.destroy');

        // project type
        Route::post('/additional-setup/project-type/store', 'projectTypeStore')->name('project-type.store');
        Route::post('/additional-setup/project-type/toggle/{id}', 'projectTypeToggle')->name('project-type.toggle');
        Route::put('/additional-setup/project-type/update/{id}', 'projectTypeUpdate')->name('project-type.update');
        Route::delete('/additional-setup/project-type/destroy/{id}', 'projectTypeDestroy')->name('project-type.destroy');

        // product category
        Route::post('/additional-setup/product-category/store', 'productCategoryStore')->name('product-category.store');
        Route::post('/additional-setup/product-category/toggle/{id}', 'productCategoryToggle')->name('product-category.toggle');
        Route::put('/additional-setup/product-category/update/{id}', 'productCategoryUpdate')->name('product-category.update');
        Route::delete('/additional-setup/product-category/destroy/{id}', 'productCategoryDestroy')->name('product-category.destroy');

        // Industry Type
        Route::post('/additional-setup/industry-type/store', 'industryTypeStore')->name('industry-type.store');
        Route::post('/additional-setup/industry-type/toggle/{id}', 'industryTypeToggle')->name('industry-type.toggle');
        Route::put('/additional-setup/industry-type/update/{id}', 'industryTypeUpdate')->name('industry-type.update');
        Route::delete('/additional-setup/industry-type/destroy/{id}', 'industryTypeDestroy')->name('industry-type.destroy');

        // renewal type
        Route::post('/additional-setup/renewal-type/store', 'renewalTypeStore')->name('renewal-type.store');
        Route::post('/additional-setup/renewal-type/toggle/{id}', 'renewalTypeToggle')->name('renewal-type.toggle');
        Route::put('/additional-setup/renewal-type/update/{id}', 'renewalTypeUpdate')->name('renewal-type.update');
        Route::delete('/additional-setup/renewal-type/destroy/{id}', 'renewalTypeDestroy')->name('renewal-type.destroy');

        // warranty period
        Route::post('/additional-setup/warranty-period/store', 'warrantyPeriodStore')->name('warranty-period.store');
        Route::post('/additional-setup/warranty-period/toggle/{id}', 'warrantyPeriodToggle')->name('warranty-period.toggle');
        Route::put('/additional-setup/warranty-period/update/{id}', 'warrantyPeriodUpdate')->name('warranty-period.update');
        Route::delete('/additional-setup/warranty-period/destroy/{id}', 'warrantyPeriodDestroy')->name('warranty-period.destroy');

        // warranty period
        Route::post('/additional-setup/probation-period/store', 'probationPeriodStore')->name('probation-period.store');
        Route::post('/additional-setup/probation-period/toggle/{id}', 'probationPeriodToggle')->name('probation-period.toggle');
        Route::put('/additional-setup/probation-period/update/{id}', 'probationPeriodUpdate')->name('probation-period.update');
        Route::delete('/additional-setup/probation-period/destroy/{id}', 'probationPeriodDestroy')->name('probation-period.destroy');

        // Project priority
        Route::post('/additional-setup/project-priority/store', 'projectPriorityStore')->name('project-priority.store');
        Route::post('/additional-setup/project-priority/toggle/{id}', 'projectPriorityToggle')->name('project-priority.toggle');
        Route::put('/additional-setup/project-priority/update/{id}', 'projectPriorityUpdate')->name('project-priority.update');
        Route::delete('/additional-setup/project-priority/destroy/{id}', 'projectPriorityDestroy')->name('project-priority.destroy');

        // Project status
        Route::post('/additional-setup/project-status/store', 'projectStatusStore')->name('project-status.store');
        Route::post('/additional-setup/project-status/toggle/{id}', 'projectStatusToggle')->name('project-status.toggle');
        Route::put('/additional-setup/project-status/update/{id}', 'projectStatusUpdate')->name('project-status.update');
        Route::delete('/additional-setup/project-status/destroy/{id}', 'projectStatusDestroy')->name('project-status.destroy');

        // Relation
        Route::post('/additional-setup/relation/store', 'relationStore')->name('relation.store');
        Route::post('/additional-setup/relation/toggle/{id}', 'relationToggle')->name('relation.toggle');
        Route::put('/additional-setup/relation/update/{id}', 'relationUpdate')->name('relation.update');
        Route::delete('/additional-setup/relation/destroy/{id}', 'relationDestroy')->name('relation.destroy');

        // Occupation
        Route::post('/additional-setup/occupation/store', 'occupationStore')->name('occupation.store');
        Route::post('/additional-setup/occupation/toggle/{id}', 'occupationToggle')->name('occupation.toggle');
        Route::put('/additional-setup/occupation/update/{id}', 'occupationUpdate')->name('occupation.update');
        Route::delete('/additional-setup/occupation/destroy/{id}', 'occupationDestroy')->name('occupation.destroy');

        // Salutation
        Route::post('/additional-setup/salutation/store', 'salutationStore')->name('salutation.store');
        Route::post('/additional-setup/salutation/toggle/{id}', 'salutationToggle')->name('salutation.toggle');
        Route::put('/additional-setup/salutation/update/{id}', 'salutationUpdate')->name('salutation.update');
        Route::delete('/additional-setup/salutation/destroy/{id}', 'salutationDestroy')->name('salutation.destroy');

        // Project
        Route::post('/additional-setup/project/store', 'projectStore')->name('project.store');
        Route::post('/additional-setup/project/toggle/{id}', 'projectToggle')->name('project.toggle');
        Route::put('/additional-setup/project/update/{id}', 'projectUpdate')->name('project.update');
        Route::delete('/additional-setup/project/destroy/{id}', 'projectDestroy')->name('project.destroy');

        // Task priority
        Route::post('/additional-setup/task-priority/store', 'taskPriorityStore')->name('task-priority.store');
        Route::post('/additional-setup/task-priority/toggle/{id}', 'taskPriorityToggle')->name('task-priority.toggle');
        Route::put('/additional-setup/task-priority/update/{id}', 'taskPriorityUpdate')->name('task-priority.update');
        Route::delete('/additional-setup/task-priority/destroy/{id}', 'taskPriorityDestroy')->name('task-priority.destroy');

        // lead type
        Route::post('/additional-setup/lead-type/store', 'leadTypeStore')->name('lead-type.store');
        Route::post('/additional-setup/lead-type/toggle/{id}', 'leadTypeToggle')->name('lead-type.toggle');
        Route::put('/additional-setup/lead-type/update/{id}', 'leadTypeUpdate')->name('lead-type.update');
        Route::delete('/additional-setup/lead-type/destroy/{id}', 'leadTypeDestroy')->name('lead-type.destroy');

        // leave type
        Route::post('/additional-setup/leave-type/store', 'leaveTypeStore')->name('leave-type.store');
        Route::post('/additional-setup/leave-type/toggle/{id}', 'leaveTypeToggle')->name('leave-type.toggle');
        Route::put('/additional-setup/leave-type/update/{id}', 'leaveTypeUpdate')->name('leave-type.update');
        Route::delete('/additional-setup/leave-type/destroy/{id}', 'leaveTypeDestroy')->name('leave-type.destroy');

        // shift type
        Route::post('/additional-setup/shift-type/store', 'shiftTypeStore')->name('shift-type.store');
        Route::post('/additional-setup/shift-type/toggle/{id}', 'shiftTypeToggle')->name('shift-type.toggle');
        Route::put('/additional-setup/shift-type/update/{id}', 'shiftTypeUpdate')->name('shift-type.update');
        Route::delete('/additional-setup/shift-type/destroy/{id}', 'shiftTypeDestroy')->name('shift-type.destroy');

        // holiday type
        Route::post('/additional-setup/holiday-type/store', 'holidayTypeStore')->name('holiday-type.store');
        Route::post('/additional-setup/holiday-type/toggle/{id}', 'holidayTypeToggle')->name('holiday-type.toggle');
        Route::put('/additional-setup/holiday-type/update/{id}', 'holidayTypeUpdate')->name('holiday-type.update');
        Route::delete('/additional-setup/holiday-type/destroy/{id}', 'holidayTypeDestroy')->name('holiday-type.destroy');

        // user type
        Route::post('/additional-setup/user-type/store', 'userTypeStore')->name('user-type.store');
        Route::post('/additional-setup/user-type/toggle/{id}', 'userTypeToggle')->name('user-type.toggle');
        Route::put('/additional-setup/user-type/update/{id}', 'userTypeUpdate')->name('user-type.update');
        Route::delete('/additional-setup/user-type/destroy/{id}', 'userTypeDestroy')->name('user-type.destroy');

        // employee type
        Route::post('/additional-setup/employee-type/store', 'employeeTypeStore')->name('employee-type.store');
        Route::post('/additional-setup/employee-type/toggle/{id}', 'employeeTypeToggle')->name('employee-type.toggle');
        Route::put('/additional-setup/employee-type/update/{id}', 'employeeTypeUpdate')->name('employee-type.update');
        Route::delete('/additional-setup/employee-type/destroy/{id}', 'employeeTypeDestroy')->name('employee-type.destroy');

        // education type
        Route::post('/additional-setup/education-type/store', 'educationTypeStore')->name('education-type.store');
        Route::post('/additional-setup/education-type/toggle/{id}', 'educationTypeToggle')->name('education-type.toggle');
        Route::put('/additional-setup/education-type/update/{id}', 'educationTypeUpdate')->name('education-type.update');
        Route::delete('/additional-setup/education-type/destroy/{id}', 'educationTypeDestroy')->name('education-type.destroy');

        // gender
        Route::post('/additional-setup/gender/store', 'genderStore')->name('gender.store');
        Route::post('/additional-setup/gender/toggle/{id}', 'genderToggle')->name('gender.toggle');
        Route::put('/additional-setup/gender/update/{id}', 'genderUpdate')->name('gender.update');
        Route::delete('/additional-setup/gender/destroy/{id}', 'genderDestroy')->name('gender.destroy');

        // Religion
        Route::post('/additional-setup/religion/store', 'religionStore')->name('religion.store');
        Route::post('/additional-setup/religion/toggle/{id}', 'religionToggle')->name('religion.toggle');
        Route::put('/additional-setup/religion/update/{id}', 'religionUpdate')->name('religion.update');
        Route::delete('/additional-setup/religion/destroy/{id}', 'religionDestroy')->name('religion.destroy');

        // education
        Route::post('/additional-setup/education/store', 'educationStore')->name('education.store');
        Route::post('/additional-setup/education/toggle/{id}', 'educationToggle')->name('education.toggle');
        Route::put('/additional-setup/education/update/{id}', 'educationUpdate')->name('education.update');
        Route::delete('/additional-setup/education/destroy/{id}', 'educationDestroy')->name('education.destroy');

        // nationality
        Route::post('/additional-setup/nationality/store', 'nationalityStore')->name('nationality.store');
        Route::post('/additional-setup/nationality/toggle/{id}', 'nationalityToggle')->name('nationality.toggle');
        Route::put('/additional-setup/nationality/update/{id}', 'nationalityUpdate')->name('nationality.update');
        Route::delete('/additional-setup/nationality/destroy/{id}', 'nationalityDestroy')->name('nationality.destroy');

        // bloodgroup
        Route::post('/additional-setup/bloodgroup/store', 'bloodgroupStore')->name('bloodgroup.store');
        Route::post('/additional-setup/bloodgroup/toggle/{id}', 'bloodgroupToggle')->name('bloodgroup.toggle');
        Route::put('/additional-setup/bloodgroup/update/{id}', 'bloodgroupUpdate')->name('bloodgroup.update');
        Route::delete('/additional-setup/bloodgroup/destroy/{id}', 'bloodgroupDestroy')->name('bloodgroup.destroy');

        // weekoff
        Route::post('/additional-setup/weekoff/store', 'weekoffStore')->name('weekoff.store');
        Route::post('/additional-setup/weekoff/toggle/{id}', 'weekoffToggle')->name('weekoff.toggle');
        Route::put('/additional-setup/weekoff/update/{id}', 'weekoffUpdate')->name('weekoff.update');
        Route::delete('/additional-setup/weekoff/destroy/{id}', 'weekoffDestroy')->name('weekoff.destroy');

        // leavequota
        Route::post('/additional-setup/leavequota/store', 'leavequotaStore')->name('leavequota.store');
        Route::post('/additional-setup/leavequota/toggle/{id}', 'leavequotaToggle')->name('leavequota.toggle');
        Route::put('/additional-setup/leavequota/update/{id}', 'leavequotaUpdate')->name('leavequota.update');
        Route::delete('/additional-setup/leavequota/destroy/{id}', 'leavequotaDestroy')->name('leavequota.destroy');

        // leaveduration
        Route::post('/additional-setup/leaveduration/store', 'leavedurationStore')->name('leaveduration.store');
        Route::post('/additional-setup/leaveduration/toggle/{id}', 'leavedurationToggle')->name('leaveduration.toggle');
        Route::put('/additional-setup/leaveduration/update/{id}', 'leavedurationUpdate')->name('leaveduration.update');
        Route::delete('/additional-setup/leaveduration/destroy/{id}', 'leavedurationDestroy')->name('leaveduration.destroy');

        // notificationperiod
        Route::post('/additional-setup/notificationperiod/store', 'notificationperiodStore')->name('notificationperiod.store');
        Route::post('/additional-setup/notificationperiod/toggle/{id}', 'notificationperiodToggle')->name('notificationperiod.toggle');
        Route::put('/additional-setup/notificationperiod/update/{id}', 'notificationperiodUpdate')->name('notificationperiod.update');
        Route::delete('/additional-setup/notificationperiod/destroy/{id}', 'notificationperiodDestroy')->name('notificationperiod.destroy');

        // carryforwardlimit
        Route::post('/additional-setup/carryforwardlimit/store', 'carryforwardlimitStore')->name('carryforwardlimit.store');
        Route::post('/additional-setup/carryforwardlimit/toggle/{id}', 'carryforwardlimitToggle')->name('carryforwardlimit.toggle');
        Route::put('/additional-setup/carryforwardlimit/update/{id}', 'carryforwardlimitUpdate')->name('carryforwardlimit.update');
        Route::delete('/additional-setup/carryforwardlimit/destroy/{id}', 'carryforwardlimitDestroy')->name('carryforwardlimit.destroy');
    });

    //dependency route
    Route::prefix('/dashboard')->controller(DependencyController::class)->group(function () {

        Route::get('/get_block_by_sector/{id}', 'get_block_by_sector')->name('get.block.by.sector');
        Route::get('/get_road_by_block/{id}', 'get_road_by_block')->name('get.road.by.block');
        Route::get('/get_road_with_default_block_by_sector/{id}/{sector_id}', 'get_road_with_default_block_by_sector')->name('get.road.with.default.block.by.sector');
        Route::get('/get_plot_size_by_plot/{id}', 'get_plot_size_by_plot')->name('get.plot.size.by.plot');
        Route::get('/get_plot_price_by_size/{id}', 'get_plot_price_by_size')->name('get.plot.price.by.size');
        Route::get('/get_plot_data_by_id/{id}', 'get_plot_data_by_id')->name('get.plot.data.by.id');

        Route::get('/get_salesman_by_agency/{id}', 'get_salesman_by_agency')->name('get.salesman.by.agency');
        Route::get('/get_customer_by_salesman/{id}', 'get_customer_by_salesman')->name('get.customer.by.salesman');

        Route::get('/get_dis_by_div/{id}', 'get_dis_by_div')->name('get.dis.by.div');
        Route::get('/get_upa_by_dis/{id}', 'get_upa_by_dis')->name('get.upa.by.dis');
        Route::get('/get_plots_by_road/{id}', 'get_plots_by_road')->name('get_plots_by_road');
    });

    //project setup
    Route::prefix('/dashboard')->controller(ProjectController::class)->group(function () {

        Route::get('/project-setup', 'index')->name('project-setup.index');
        // sector setup
        Route::post('/project-setup/sector/store', 'sectorStore')->name('sector.store');
        Route::put('/project-setup/sector/update/{id}', 'sectorUpdate')->name('sector.update');
        Route::delete('/project-setup/sector/destroy/{id}', 'sectorDestroy')->name('sector.destroy');
        Route::post('/project-setup/sector/toggle/{id}', 'sectorToggle')->name('sector.toggle');

        // block setup
        Route::post('/project-setup/block/store', 'blockStore')->name('block.store');
        Route::put('/project-setup/block/update/{id}', 'blockUpdate')->name('block.update');
        Route::delete('/project-setup/block/destroy/{id}', 'blockDestroy')->name('block.destroy');
        Route::post('/project-setup/block/toggle/{id}', 'blockToggle')->name('block.toggle');

        // road setup
        Route::post('/project-setup/road/store', 'roadStore')->name('road.store');
        Route::put('/project-setup/road/update/{id}', 'roadUpdate')->name('road.update');
        Route::delete('/project-setup/road/destroy/{id}', 'roadDestroy')->name('road.destroy');
        Route::post('/project-setup/road/toggle/{id}', 'roadToggle')->name('road.toggle');

        // agency setup
        Route::post('/project-setup/agency/store', 'agencyStore')->name('agency.store');
        Route::put('/project-setup/agency/update/{id}', 'agencyUpdate')->name('agency.update');
        Route::delete('/project-setup/agency/destroy/{id}', 'agencyDestroy')->name('agency.destroy');
        Route::post('/project-setup/agency/toggle/{id}', 'agencyToggle')->name('agency.toggle');

        // salesman setup
        Route::post('/project-setup/salesman/store', 'salesmanStore')->name('salesman.store');
        Route::put('/project-setup/salesman/update/{id}', 'salesmanUpdate')->name('salesman.update');
        Route::delete('/project-setup/salesman/destroy/{id}', 'salesmanDestroy')->name('salesman.destroy');
        Route::post('/project-setup/salesman/toggle/{id}', 'salesmanToggle')->name('salesman.toggle');

        // plot type setup
        Route::post('/project-setup/plot_type/store', 'plot_typeStore')->name('plot_type.store');
        Route::put('/project-setup/plot_type/update/{id}', 'plot_typeUpdate')->name('plot_type.update');
        Route::delete('/project-setup/plot_type/destroy/{id}', 'plot_typeDestroy')->name('plot_type.destroy');
        Route::post('/project-setup/plot_type/toggle/{id}', 'plot_typeToggle')->name('plot_type.toggle');

        // plot size setup
        Route::post('/project-setup/plot_size/store', 'plot_sizeStore')->name('plot_size.store');
        Route::put('/project-setup/plot_size/update/{id}', 'plot_sizeUpdate')->name('plot_size.update');
        Route::delete('/project-setup/plot_size/destroy/{id}', 'plot_sizeDestroy')->name('plot_size.destroy');
        Route::post('/project-setup/plot_size/toggle/{id}', 'plot_sizeToggle')->name('plot_size.toggle');

        // plot price setup
        Route::post('/project-setup/plot_price/store', 'plot_priceStore')->name('plot_price.store');
        Route::put('/project-setup/plot_price/update/{id}', 'plot_priceUpdate')->name('plot_price.update');
        Route::delete('/project-setup/plot_price/destroy/{id}', 'plot_priceDestroy')->name('plot_price.destroy');
        Route::post('/project-setup/plot_price/toggle/{id}', 'plot_priceToggle')->name('plot_price.toggle');
    });

    //plot setup
    Route::prefix('/dashboard/plot')->controller(PlotController::class)->group(function () {
        Route::get('/plot-setup', 'index')->name('plot.index');
        Route::post('/plot/store', 'plotStore')->name('plot.store');
        Route::put('/plot/update/{id}', 'plotUpdate')->name('plot.update');
        Route::delete('/plot/destroy/{id}', 'plotDestroy')->name('plot.destroy');
        Route::post('/plot/toggle/{id}', 'plotToggle')->name('plot.toggle');
    });

    Route::prefix('/dashboard/instant')->controller(InstantController::class)->group(function () {
        Route::post('/save-employee-type', 'storeEmployeeType');
        Route::post('/save-education-type', 'storeEducationType');
        Route::post('/save-education-subject', 'storeSubject');
        Route::post('/save-education-board', 'storeBoard');
        Route::post('/save-religion', 'storeReligion');
    });

    Route::prefix('/dashboard/system-configuration')->controller(CompanyController::class)->group(function () {
        Route::get('/company', 'index')->name('company.index');
        Route::get('/company/upazilas/{districtId}', 'getUpazilasByDistrict');
        Route::put('/company/company-information-update/{id}', 'companyInformationUpdate')->name('company.company-information-update');
        Route::put('/company/contact-information-update/{id}', 'contactInformationUpdate')->name('company.contact-information-update');
        Route::put('/company/brand-setting-update/{id}', 'brandSettingUpdate')->name('company.brand-setting-update');
        Route::put('/company/application-setting-update/{id}', 'applicationSettingUpdate')->name('company.application-setting-update');
        Route::put('/company/company-document-update/{id}', 'companyDocumentUpdate')->name('company.company-document-update');
    });

    Route::prefix('/dashboard/system-configuration')->controller(BranchController::class)->group(function () {
        Route::get('/branch', 'index')->name('branch.index');
        Route::post('/branch/store', 'store')->name('branch.store');
        Route::post('/branch/toggle/{id}', 'branchToggle')->name('branch.toggle');
        Route::put('/branch/update/{id}', 'branchUpdate')->name('branch.update');
        Route::delete('/branch/destroy/{id}', 'branchDestroy')->name('branch.destroy');
        Route::post('/branch/assignment', 'storeAssignment')->name('branch.assignments.store');
        Route::delete('/branch/assigned-branch/{id}/delete', 'assignedBranchDestroy')->name('assigned-branch.destroy');
    });

    Route::prefix('/dashboard')->controller(AttendanceController::class)->group(function () {
        Route::get('/attendance', 'index')->name('attendance.index');
        Route::post('/attendance/store', 'store')->name('attendance.store');
        Route::post('/attendance/toggle/{id}', 'attendanceToggle')->name('attendance.toggle');
        Route::put('/attendance/update/{id}', 'attendanceUpdate')->name('attendance.update');
        Route::delete('/attendance/destroy/{id}', 'attendanceDestroy')->name('attendance.destroy');

        Route::get('/attendance/attendance-history', 'attendance')->name('attendance.attendance-history');

        Route::get('/get-department-employees', 'getDepartmentEmployees')->name('get.department.employees');
        Route::get('/get-selected-employees', 'getSelectedEmployees')->name('get.selected.employees');
        Route::get('/get-department-designation-employee', 'designationWiseEmployee');
    });

    Route::prefix('/dashboard')->controller(MaintenanceController::class)->group(function () {
        Route::get('/maintenance', 'index')->name('maintenance');
        Route::get('/maintenance/cache-clear', 'clearCache')->name('cache-clear');
        Route::get('/maintenance/storage-link', 'storageLink')->name('storage-link');
    });


    Route::resource('/dashboard/manageuser', UserController::class);
    Route::get('/dashboard/manageuser/status/{id}', [UserController::class, 'status'])->name('status.manageuser');
    Route::post('/dashboard/manage-user/branch/assign', [UserController::class, 'assignBranch'])->name('user.assign.branch');

    Route::resource('/dashboard/manageuserrole', RoleController::class);
    Route::get('/dashboard/manageuserrole/role/{roleId}', [RoleController::class, 'addPermissionToRole'])->name('manageuserrole.addPermissionToRole');
    Route::put('/dashboard/manageuserrole/role/{roleId}', [RoleController::class, 'givePermissionToRole'])->name('manageuserrole.givePermissionToRole');
    Route::resource('/dashboard/permission', PermissionController::class);

    Route::view('/dashboard/underdevelopment', 'admin.underdevelopment')->name('admin.underdevelopment');

    Route::get('/admin/search', [SearchController::class, 'search'])->name('admin.search');


    Route::prefix('/reports')->controller(ReportController::class)->group(function () {
        Route::get('/employee-registration-report', 'employeeRegistrationReport')->name('reports.employee-registration-report');
        Route::get('/employee-registration-report/search-employee', 'searchEmployee')->name('reports.search-employee');
        Route::get('/employee-registration-report/search-employee/pdf', 'registrationPdf')->name('reports.registration.pdf');

        Route::get('/employee-attendence-report', 'employeeAttendenceReport')->name('reports.employee-attendence-report');
        Route::get('/employee-attendence-report/search-employee', 'searchEmployeeAttendence')->name('reports.search-employee-attendence');
        Route::get('/employee-attendence-report/search-employee/pdf', 'attendencePdf')->name('reports.attendence.pdf');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
require __DIR__ . '/employee.php';
