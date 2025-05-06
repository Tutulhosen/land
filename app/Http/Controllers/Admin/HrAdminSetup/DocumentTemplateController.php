<?php

namespace App\Http\Controllers\Admin\HrAdminSetup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\HrAdminSetup\DocumentTemplate;

class DocumentTemplateController extends Controller
{
    public function index()
    {
        $documenttemplates = DocumentTemplate::all();
        return view('admin.hr-admin-setup.documenttemplate.index',compact('documenttemplates'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'documenttemplate_name' => 'required|string|max:255',
            'template' => 'nullable|string',
            'status' => 'nullable|boolean',
        ]);
        // documenttemplate id auto generate end
        $documenttemplate = new DocumentTemplate();
        $documenttemplate->documenttemplate_name = $request->documenttemplate_name;
        $documenttemplate->template = $request->template;
        $documenttemplate->status = $request->status;
        $documenttemplate->save();
        return redirect()->route('documenttemplate.index')->with('success', 'Document Template successfully added!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'documenttemplate_name' => 'required|string|max:255',
            'template' => 'nullable|string',
            'status' => 'nullable|boolean',
        ]);
        $documenttemplate = DocumentTemplate::findOrFail($id);
        $documenttemplate->documenttemplate_name = $request->documenttemplate_name;
        $documenttemplate->template = $request->template;
        $documenttemplate->status = $request->status;
        $documenttemplate->save();

        return redirect()->route('documenttemplate.index')->with('success', 'Document Template updated successfully.');
    }



    public function destroy($id)
    {
        $documenttemplate = DocumentTemplate::findOrFail($id);
        $documenttemplate->delete();
        return redirect()->route('documenttemplate.index')->with('success', 'Document Template deleted successfully.');
    }

    public function documenttemplateToggle($id){
        $documenttemplate = DocumentTemplate::findOrFail($id);
        $documenttemplate->status = !$documenttemplate->status;
        $documenttemplate->save();
        return redirect()->route('documenttemplate.index')->with('success', 'Document Template status updated!');
    }


}
