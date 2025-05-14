<?php

namespace App\Http\Controllers\Plot;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\SystemConfiguration\Project;

class PlotManageController extends Controller
{
    public function index()
    {
        $sectors = Project::orderBy('id','desc')->get();
        return view('admin.plot.index', compact('sectors'));

    }
}
