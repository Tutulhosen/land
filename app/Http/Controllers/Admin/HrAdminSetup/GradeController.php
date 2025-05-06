<?php

namespace App\Http\Controllers\Admin\HrAdminSetup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\HrAdminSetup\Designation;
use App\Models\Admin\SystemConfiguration\Grade;

class GradeController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::orderBy('created_at', 'desc')->get();
        $designations = Designation::where('status', 1)->get();

        return view('admin.hr-admin-setup.grade.index', compact('grades','designations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('hr-admin-setup.grade.create', compact('designations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'designation_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'basic_salary' => 'required|numeric',
            'percentage' => 'nullable|numeric',
            'amount' => 'nullable|numeric',
        ]);
        $grade = new Grade();
        $grade->designation_id = $request->designation_id;
        $grade->name = $request->name;
        $grade->basic_salary = $request->basic_salary;

        if($request->incrementType == 'on'){
            $grade->incrementType = 1;
            $grade->amount = $request->amount;
        }else{
            $grade->incrementType = 0;
            $grade->percentage = $request->percentage;
        }
        $grade->save();
        return redirect()->back()->with('success', 'Grade successfully added!');
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
    public function update(Request $request, string $id)
    {
        $request->validate([
            'designation_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'basic_salary' => 'required|numeric',
            'percentage' => 'nullable|numeric',
            'amount' => 'nullable|numeric',
        ]);

        $grade = Grade::findOrFail($id);
        $grade->designation_id = $request->designation_id;
        $grade->name = $request->name;
        $grade->basic_salary = $request->basic_salary;

        if($request->incrementType == 'on'){
            $grade->incrementType = 1;
            $grade->amount = $request->amount;
        }else{
            $grade->incrementType = 0;
            $grade->percentage = $request->percentage;
        }
        $grade->save();

        return redirect()->back()->with('success', 'Grade successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $grade = Grade::findOrFail($id);
        $grade->delete();
        return response()->json(['success' => 'Grade deleted successfully.']);
        // return redirect()->back()->with('success', 'Grade deleted successfully.');
    }

    public function gradeToggle($id)
    {
        $grade = Grade::findOrFail($id);
        $grade->status = !$grade->status;
        $grade->save();
        return redirect()->back()->with('success', 'Grade status updated!');
    }
}
