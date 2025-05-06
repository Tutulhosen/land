<?php

namespace App\Http\Controllers\Admin\Announcement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\HrAdminSetup\Department;
use App\Models\Admin\Announcement\Announcement;
use App\Models\Admin\SystemConfiguration\Branch;
use App\Models\Admin\Announcement\AnnouncementAndDepartment;
use App\Models\Admin\SystemConfiguration\CompanyInformation;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments =  Department::where('status', 1)->get();
        $announcements = Announcement::all();
        $selectedDepartments = AnnouncementAndDepartment::all();
        $branches = Branch::where('status', 1)->orderBy('name', 'asc')->get();
        return view('admin.announcement.announcement.index',compact('departments','announcements','selectedDepartments','branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'branch_id'   => 'nullable|string',
            'department_ids' => 'required|array',
            'publish_date'   => 'nullable|date',
            'effective_date' => 'nullable|date',
            'title'          => 'required|string|max:255',
            'details'        => 'nullable|string',
            'attachment'     => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
            'status'         => 'required|in:0,1',
        ]);

        $announcement = new Announcement();
        $announcement->publish_date   = $validated['publish_date'] ?? null;
        $announcement->effective_date = $validated['effective_date'] ?? null;
        $announcement->title          = $validated['title'];
        $announcement->details        = $validated['details'] ?? null;
        $announcement->status         = $validated['status'];


        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment');
            $fileName   = time() . '_' . $attachment->getClientOriginalName();
            $filePath   = $attachment->storeAs('uploads/announcements', $fileName, 'public');
            $announcement->attachment = $filePath;
        }

        $announcement->save();

        foreach ($validated['department_ids'] as $departmentId) {
            AnnouncementAndDepartment::create([
                'announcement_id' => $announcement->id,
                'department_id'  => $departmentId,
                'branch_id'  => $validated['branch_id'],
            ]);
        }

        return redirect()->route('announcement.index')->with('success', 'Announcement successfully added!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'branch_id'   => 'nullable|string',
            'department_ids' => 'required|array',
            'publish_date'   => 'nullable|date',
            'effective_date' => 'nullable|date',
            'title'          => 'required|string|max:255',
            'details'        => 'nullable|string',
            'attachment'     => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
            'status'         => 'required|in:0,1',
        ]);

        $announcement = Announcement::findOrFail($id);
        $announcement->publish_date   = $validated['publish_date'] ?? null;
        $announcement->effective_date = $validated['effective_date'] ?? null;
        $announcement->title          = $validated['title'];
        $announcement->details        = $validated['details'] ?? null;
        $announcement->status         = $validated['status'];

        // Handle file upload
        if ($request->hasFile('attachment')) {
            // Delete old file if exists
            if ($announcement->attachment && Storage::disk('public')->exists($announcement->attachment)) {
                Storage::disk('public')->delete($announcement->attachment);
            }

            $attachment = $request->file('attachment');
            $fileName   = time() . '_' . $attachment->getClientOriginalName();
            $filePath   = $attachment->storeAs('uploads/announcements', $fileName, 'public');
            $announcement->attachment = $filePath;
        }

        $announcement->save();

        // Update department relationships
        AnnouncementAndDepartment::where('announcement_id', $announcement->id)->delete();
        foreach ($validated['department_ids'] as $departmentId) {
            AnnouncementAndDepartment::create([
                'announcement_id' => $announcement->id,
                'department_id'   => $departmentId,
                'branch_id'  => $validated['branch_id'],
            ]);
        }

        return redirect()->route('announcement.index')->with('success', 'Announcement successfully updated!');
    }


    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);

        if ($announcement->attachment && Storage::disk('public')->exists($announcement->attachment)) {
            Storage::disk('public')->delete($announcement->attachment);
        }

        AnnouncementAndDepartment::where('announcement_id', $announcement->id)->delete();

        $announcement->delete();

        return redirect()->route('announcement.index')->with('success', 'Announcement deleted successfully!');
    }


    public function announcementToggle($id){
        $announcement = Announcement::findOrFail($id);
        $announcement->status = !$announcement->status;
        $announcement->save();
        return redirect()->route('announcement.index')->with('success', 'Announcement status updated!');
    }
    public function announcementView($id){
        $announcement = Announcement::findOrFail($id);
        $companyInformation = CompanyInformation::first();
        return view('admin.announcement.announcement.view', compact('announcement','companyInformation'));
    }
}
