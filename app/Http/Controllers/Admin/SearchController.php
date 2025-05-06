<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Announcement\NoticeBoard;
use App\Models\Admin\Employee\EmployeePersonalInformation;
use Spatie\Permission\Contracts\Role;
use PHPUnit\Framework\TestStatus\Notice;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = strtolower($request->input('query'));

        $routes = [
            ['name' => 'Dashboard', 'route' => route('dashboard')],
            ['name' => 'Departments', 'route' => route('department.index')],
            ['name' => 'Designations', 'route' => route('designation.index')],
            ['name' => 'Shifts', 'route' => route('shift.index')],
            ['name' => 'Employees', 'route' => route('employee.index')],
            ['name' => 'Leave Types', 'route' => route('leavetype.index')],
            ['name' => 'Leave Applications', 'route' => route('leave-application.index')],
            ['name' => 'Holidays', 'route' => route('holiday.index')],
            ['name' => 'Document Templates', 'route' => route('documenttemplate.index')],
            ['name' => 'HR Documents (Official Letters)', 'route' => route('official-letters.index')],
            ['name' => 'Announcements', 'route' => route('announcement.index')],
            ['name' => 'Additional Setup', 'route' => route('additional-setup.index')],
            ['name' => 'Company', 'route' => route('company.index')],
            ['name' => 'Branches', 'route' => route('branch.index')],
            ['name' => 'Attendance', 'route' => route('attendance.index')],
            ['name' => 'Manage Users', 'route' => route('manageuser.index')],
            ['name' => 'Manage User Roles', 'route' => route('manageuserrole.index')],
        ];

        $highlight = fn($text) => preg_replace("/($query)/i", "<b>$1</b>", $text);

        $results = array_filter($routes, function ($route) use ($query) {
            return str_contains(strtolower($route['name']), $query);
        });

        $formattedResults = array_map(fn($route) => [
            'name' => $highlight($route['name']),
            'url' => $route['route'],
        ], $results);

        return response()->json(array_values($formattedResults));
    }

}
