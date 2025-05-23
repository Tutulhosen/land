<?php

namespace App\Http\Controllers\Admin\Announcement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\HrAdminSetup\Department;
use App\Models\Admin\Announcement\NoticeBoard;
use App\Models\Admin\SystemConfiguration\Agency;
use App\Models\Admin\SystemConfiguration\Branch;
use App\Models\Admin\Announcement\NoticeBoardAndDepartment;
use App\Models\Admin\SystemConfiguration\CompanyInformation;

class NoticeBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments =  Department::where('status', 1)->get();
        $noticeboards = NoticeBoard::all();
        $selectedDepartments = NoticeBoardAndDepartment::all();
        $branches = Branch::where('status', 1)->orderBy('name', 'asc')->get();
        $agencies = Agency::orderBy('id', 'desc')->get();
        return view('admin.announcement.noticeboard.index',compact('departments','noticeboards','selectedDepartments','branches','agencies'));
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
        // dd( $request->all());
        $validated = $request->validate([
            'branch_id'   => 'nullable|string',
            'department_ids' => 'required|array',
            'effective_date' => 'nullable|date',
            'valid_till'   => 'nullable|date',
            'title'          => 'required|string|max:255',
            'details'        => 'nullable|string',
            'attachment'     => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
            'status'         => 'required|in:0,1',
        ]);

        $noticeboard = new NoticeBoard();
        $noticeboard->effective_date = $validated['effective_date'] ?? null;
        $noticeboard->valid_till = $validated['valid_till'] ?? null;
        $noticeboard->title = $validated['title'];
        $noticeboard->details = $validated['details'] ?? null;
        $noticeboard->status = $validated['status'];


        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment');
            $fileName   = time() . '_' . $attachment->getClientOriginalName();
            $filePath   = $attachment->storeAs('uploads/noticeboards', $fileName, 'public');
            $noticeboard->attachment = $filePath;
        }

        $noticeboard->save();

        foreach ($validated['department_ids'] as $departmentId) {
            NoticeBoardAndDepartment::create([
                'noticeboard_id' => $noticeboard->id,
                'department_id'   => $departmentId,
                'branch_id'  => $validated['branch_id'],
            ]);
        }

        return redirect()->route('noticeboard.index')->with('success', 'Notice successfully added!');
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
            'effective_date' => 'nullable|date',
            'valid_till'   => 'nullable|date',
            'title'          => 'required|string|max:255',
            'details'        => 'nullable|string',
            'attachment'     => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
            'status'         => 'required|in:0,1',
        ]);

        $noticeboard = noticeboard::findOrFail($id);
        $noticeboard->effective_date = $validated['effective_date'] ?? null;
        $noticeboard->valid_till   = $validated['valid_till'] ?? null;
        $noticeboard->title          = $validated['title'];
        $noticeboard->details        = $validated['details'] ?? null;
        $noticeboard->status         = $validated['status'];

        if ($request->hasFile('attachment')) {
            if ($noticeboard->attachment && Storage::disk('public')->exists($noticeboard->attachment)) {
                Storage::disk('public')->delete($noticeboard->attachment);
            }

            $attachment = $request->file('attachment');
            $fileName   = time() . '_' . $attachment->getClientOriginalName();
            $filePath   = $attachment->storeAs('uploads/noticeboards', $fileName, 'public');
            $noticeboard->attachment = $filePath;
        }

        $noticeboard->save();

        NoticeBoardAndDepartment::where('noticeboard_id', $noticeboard->id)->delete();
        foreach ($validated['department_ids'] as $departmentId) {
            NoticeBoardAndDepartment::create([
                'noticeboard_id' => $noticeboard->id,
                'department_id'   => $departmentId,
                'branch_id'  => $validated['branch_id'],
            ]);
        }

        return redirect()->route('noticeboard.index')->with('success', 'Notice successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $noticeboard = NoticeBoard::findOrFail($id);

        if ($noticeboard->attachment && Storage::disk('public')->exists($noticeboard->attachment)) {
            Storage::disk('public')->delete($noticeboard->attachment);
        }

        NoticeBoardAndDepartment::where('noticeboard_id', $noticeboard->id)->delete();

        $noticeboard->delete();

        return redirect()->route('noticeboard.index')->with('success', 'Notice deleted successfully!');
    }


    public function noticeboardToggle($id){
        $noticeboard = NoticeBoard::findOrFail($id);
        $noticeboard->status = !$noticeboard->status;
        $noticeboard->save();
        return redirect()->route('noticeboard.index')->with('success', 'Notice status updated!');
    }

    public function noticeboardView($id){
        $noticeboard = NoticeBoard::findOrFail($id);
        $companyInformation = CompanyInformation::first();
        return view('admin.announcement.noticeboard.view', compact('noticeboard','companyInformation'));
    }
}
