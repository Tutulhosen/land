<?php

namespace App\Http\Controllers\Admin\SystemConfiguration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\SystemConfiguration\Grade;
use App\Models\Admin\SystemConfiguration\Leave;
use App\Models\Admin\SystemConfiguration\Gender;
use App\Models\Admin\SystemConfiguration\WeekOff;
use App\Models\Admin\SystemConfiguration\Industry;
use App\Models\Admin\SystemConfiguration\LeadType;
use App\Models\Admin\SystemConfiguration\Relation;
use App\Models\Admin\SystemConfiguration\Religion;
use App\Models\Admin\SystemConfiguration\UserType;
use App\Models\Admin\SystemConfiguration\Education;
use App\Models\Admin\SystemConfiguration\ShiftType;
use App\Models\Admin\SystemConfiguration\BloodGroup;
use App\Models\Admin\SystemConfiguration\ClientType;
use App\Models\Admin\SystemConfiguration\LeaveQuota;
use App\Models\Admin\SystemConfiguration\Occupation;
use App\Models\Admin\SystemConfiguration\Salutation;
use App\Models\Admin\SystemConfiguration\HolidayType;
use App\Models\Admin\SystemConfiguration\Nationality;
use App\Models\Admin\SystemConfiguration\ProjectList;
use App\Models\Admin\SystemConfiguration\ProjectType;
use App\Models\Admin\SystemConfiguration\RenewalType;
use App\Models\Admin\SystemConfiguration\EmployeeType;
use App\Models\Admin\SystemConfiguration\TaskPriority;
use App\Models\Admin\SystemConfiguration\EducationType;
use App\Models\Admin\SystemConfiguration\LeaveDuration;
use App\Models\Admin\SystemConfiguration\ProjectStatus;
use App\Models\Admin\SystemConfiguration\WarrantyPeriod;
use App\Models\Admin\SystemConfiguration\ProbationPeriod;
use App\Models\Admin\SystemConfiguration\ProductCategory;
use App\Models\Admin\SystemConfiguration\ProjectPriority;
use App\Models\Admin\SystemConfiguration\CarryForwardLimit;
use App\Models\Admin\SystemConfiguration\NotificationPeriod;

class AdditionalSetupController extends Controller
{
    public function index() {
        $client_types = ClientType::all();
        $project_types = ProjectType::all();
        $product_categories = ProductCategory::all();
        $industry_types = Industry::all();
        $renewal_types = RenewalType::all();
        $warranty_periods = WarrantyPeriod::all();
        $probation_periods = ProbationPeriod::all();
        $project_priorities = ProjectPriority::all();
        $project_statuses = ProjectStatus::all();
        $relations = Relation::all();
        $occupations = Occupation::all();
        $salutations = Salutation::all();
        $grades = Grade::all();
        $projects = ProjectList::all();
        $task_priorities = TaskPriority::all();
        $lead_types = LeadType::all();
        $shift_types = ShiftType::all();
        $holiday_types = HolidayType::all();
        $leaves = Leave::all();
        $user_types = UserType::all();
        $education_types = EducationType::all();
        $genders = Gender::all();
        $religions = Religion::all();
        $nationalities = Nationality::all();
        $bloodgroups = BloodGroup::all();
        $weekoffs = WeekOff::all();
        $leavequotas = LeaveQuota::all();
        $leavedurations = LeaveDuration::all();
        $notificationperiods = NotificationPeriod::all();
        $carryforwardlimits = CarryForwardLimit::all();
        $educations = Education::all();
        $employee_types = EmployeeType::all();
        return view('admin.system-configuration.additional-setup.index',compact(
            'client_types',
            'project_types',
            'product_categories',
            'industry_types',
            'renewal_types',
            'warranty_periods',
            'probation_periods',
            'project_priorities',
            'project_statuses',
            'relations',
            'occupations',
            'salutations',
            'grades',
            'projects',
            'task_priorities',
            'lead_types',
            'shift_types',
            'holiday_types',
            'leaves',
            'user_types',
            'employee_types',
            'education_types',
            'genders',
            'religions',
            'nationalities',
            'bloodgroups',
            'weekoffs',
            'leavequotas',
            'leavedurations',
            'notificationperiods',
            'carryforwardlimits',
            'educations',
        ));
    }
    // client type
    public function clientTypeStore(Request $request){
        $request->validate([
            'client_type' => 'required|string|max:255',
        ]);
        $client = new ClientType();
        $client->client_type = $request->client_type;
        $client->save();
        return redirect()->route('additional-setup.index')->with('success', 'Client Type successfully added!')->with('activeTab', 'client-type');
    }
    public function clientTypeUpdate(Request $request, $id){
        $request->validate([
            'client_type' => 'required|string|max:255',
        ]);
        $client = ClientType::findOrFail($id);
        $client->client_type = $request->client_type;
        $client->save();
        return redirect()->route('additional-setup.index')->with('success', 'Client Type updated successfully!')->with('activeTab', 'client-type');
    }
    public function clientTypeToggle($id){
        $client = ClientType::findOrFail($id);
        $client->status = !$client->status;
        $client->save();
        return redirect()->route('additional-setup.index')->with('success', 'Client Type status updated!')->with('activeTab', 'client-type');
    }
    public function clientTypeDestroy($id)
    {
        $client = ClientType::findOrFail($id);
        $client->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Client Type deleted successfully.')->with('activeTab', 'client-type');
    }
    // project type
    public function projectTypeStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $project = new ProjectType();
        $project->name = $request->name;
        $project->save();
        return redirect()->route('additional-setup.index')->with('success', 'Project Type successfully added!')->with('activeTab', 'project-type');
    }
    public function projectTypeUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $project = ProjectType::findOrFail($id);
        $project->name = $request->name;
        $project->save();
        return redirect()->route('additional-setup.index')->with('success', 'Project Type updated successfully!')->with('activeTab', 'project-type');
    }
    public function projectTypeToggle($id){
        $project = ProjectType::findOrFail($id);
        $project->status = !$project->status;
        $project->save();
        return redirect()->route('additional-setup.index')->with('success', 'Project Type status updated!')->with('activeTab', 'project-type');
    }
    public function projectTypeDestroy($id)
    {
        $project = ProjectType::findOrFail($id);
        $project->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Project Type deleted successfully.')->with('activeTab', 'project-type');
    }
    // product category
    public function productCategoryStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $productCategory = new ProductCategory();
        $productCategory->name = $request->name;
        $productCategory->save();
        return redirect()->route('additional-setup.index')->with('success', 'Product Category Type successfully added!')->with('activeTab', 'product-category');
    }
    public function productCategoryUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $productCategory = ProductCategory::findOrFail($id);
        $productCategory->name = $request->name;
        $productCategory->save();
        return redirect()->route('additional-setup.index')->with('success', 'Product Category Type updated successfully!')->with('activeTab', 'product-category');
    }
    public function productCategoryToggle($id){
        $productCategory = ProductCategory::findOrFail($id);
        $productCategory->status = !$productCategory->status;
        $productCategory->save();
        return redirect()->route('additional-setup.index')->with('success', 'Product Category Type status updated!')->with('activeTab', 'product-category');
    }
    public function productCategoryDestroy($id)
    {
        $productCategory = ProductCategory::findOrFail($id);
        $productCategory->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Product Category Type deleted successfully.')->with('activeTab', 'product-category');
    }

    // industry type
    public function industryTypeStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $industry = new Industry();
        $industry->name = $request->name;
        $industry->save();
        return redirect()->route('additional-setup.index')->with('success', 'Industry Type successfully added!')->with('activeTab', 'industry-type');
    }
    public function industryTypeUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $industry = Industry::findOrFail($id);
        $industry->name = $request->name;
        $industry->save();
        return redirect()->route('additional-setup.index')->with('success', 'Industry Type updated successfully!')->with('activeTab', 'industry-type');
    }
    public function industryTypeToggle($id){
        $industry = Industry::findOrFail($id);
        $industry->status = !$industry->status;
        $industry->save();
        return redirect()->route('additional-setup.index')->with('success', 'Industry Type status updated!')->with('activeTab', 'industry-type');
    }
    public function industryTypeDestroy($id)
    {
        $industry = Industry::findOrFail($id);
        $industry->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Industry Type deleted successfully.')->with('activeTab', 'industry-type');
    }
    // renewal type
    public function renewalTypeStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $renewal = new RenewalType();
        $renewal->name = $request->name;
        $renewal->save();
        return redirect()->route('additional-setup.index')->with('success', 'Renewal Type successfully added!')->with('activeTab', 'renewal-type');
    }
    public function renewalTypeUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $renewal = RenewalType::findOrFail($id);
        $renewal->name = $request->name;
        $renewal->save();
        return redirect()->route('additional-setup.index')->with('success', 'Renewal Type updated successfully!')->with('activeTab', 'renewal-type');
    }
    public function renewalTypeToggle($id){
        $renewal = RenewalType::findOrFail($id);
        $renewal->status = !$renewal->status;
        $renewal->save();
        return redirect()->route('additional-setup.index')->with('success', 'Renewal Type status updated!')->with('activeTab', 'renewal-type');
    }
    public function renewalTypeDestroy($id)
    {
        $renewal = RenewalType::findOrFail($id);
        $renewal->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Renewal Type deleted successfully.')->with('activeTab', 'renewal-type');
    }

    // warranty period
    public function warrantyPeriodStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $warranty = new WarrantyPeriod();
        $warranty->name = $request->name;
        $warranty->save();
        return redirect()->route('additional-setup.index')->with('success', 'Warranty Period successfully added!')->with('activeTab', 'warranty-period');
    }
    public function warrantyPeriodUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $warranty = WarrantyPeriod::findOrFail($id);
        $warranty->name = $request->name;
        $warranty->save();
        return redirect()->route('additional-setup.index')->with('success', 'Warranty Period updated successfully!')->with('activeTab', 'warranty-period');
    }
    public function warrantyPeriodToggle($id){
        $warranty = WarrantyPeriod::findOrFail($id);
        $warranty->status = !$warranty->status;
        $warranty->save();
        return redirect()->route('additional-setup.index')->with('success', 'Warranty Period status updated!')->with('activeTab', 'warranty-period');
    }
    public function warrantyPeriodDestroy($id)
    {
        $warranty = WarrantyPeriod::findOrFail($id);
        $warranty->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Warranty Period deleted successfully.')->with('activeTab', 'warranty-period');
    }

    // probation period
    public function probationPeriodStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $probation = new ProbationPeriod();
        $probation->name = $request->name;
        $probation->save();
        return redirect()->route('additional-setup.index')->with('success', 'Probation Period successfully added!')->with('activeTab', 'probation-period');
    }
    public function probationPeriodUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $probation = ProbationPeriod::findOrFail($id);
        $probation->name = $request->name;
        $probation->save();
        return redirect()->route('additional-setup.index')->with('success', 'Probation Period updated successfully!')->with('activeTab', 'probation-period');
    }
    public function probationPeriodToggle($id){
        $probation = ProbationPeriod::findOrFail($id);
        $probation->status = !$probation->status;
        $probation->save();
        return redirect()->route('additional-setup.index')->with('success', 'Probation Period status updated!')->with('activeTab', 'probation-period');
    }
    public function probationPeriodDestroy($id)
    {
        $probation = ProbationPeriod::findOrFail($id);
        $probation->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Probation Period deleted successfully.')->with('activeTab', 'probation-period');
    }



    // project priority
    public function projectPriorityStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $projectPriority = new ProjectPriority();
        $projectPriority->name = $request->name;
        $projectPriority->save();
        return redirect()->route('additional-setup.index')->with('success', 'Project Priority successfully added!')->with('activeTab', 'project-priority');
    }
    public function projectPriorityUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $projectPriority = ProjectPriority::findOrFail($id);
        $projectPriority->name = $request->name;
        $projectPriority->save();
        return redirect()->route('additional-setup.index')->with('success', 'Project Priority updated successfully!')->with('activeTab', 'project-priority');
    }
    public function projectPriorityToggle($id){
        $projectPriority = ProjectPriority::findOrFail($id);
        $projectPriority->status = !$projectPriority->status;
        $projectPriority->save();
        return redirect()->route('additional-setup.index')->with('success', 'Project Priority status updated!')->with('activeTab', 'project-priority');
    }
    public function projectPriorityDestroy($id)
    {
        $projectPriority = ProjectPriority::findOrFail($id);
        $projectPriority->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Project Priority deleted successfully.')->with('activeTab', 'project-priority');
    }


    // project Status
    public function projectStatusStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $projectStatus = new ProjectStatus();
        $projectStatus->name = $request->name;
        $projectStatus->save();
        return redirect()->route('additional-setup.index')->with('success', 'Project Status successfully added!')->with('activeTab', 'project-status');
    }
    public function projectStatusUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $projectStatus = ProjectStatus::findOrFail($id);
        $projectStatus->name = $request->name;
        $projectStatus->save();
        return redirect()->route('additional-setup.index')->with('success', 'Project Status updated successfully!')->with('activeTab', 'project-status');
    }
    public function projectStatusToggle($id){
        $projectStatus = ProjectStatus::findOrFail($id);
        $projectStatus->status = !$projectStatus->status;
        $projectStatus->save();
        return redirect()->route('additional-setup.index')->with('success', 'Project Status status updated!')->with('activeTab', 'project-status');
    }
    public function projectStatusDestroy($id)
    {
        $projectStatus = ProjectStatus::findOrFail($id);
        $projectStatus->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Project Status deleted successfully.')->with('activeTab', 'project-status');
    }


    // relation
    public function relationStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $relation = new Relation();
        $relation->name = $request->name;
        $relation->save();
        return redirect()->route('additional-setup.index')->with('success', 'Relation successfully added!')->with('activeTab', 'relation');
    }
    public function relationUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $relation = Relation::findOrFail($id);
        $relation->name = $request->name;
        $relation->save();
        return redirect()->route('additional-setup.index')->with('success', 'Relation updated successfully!')->with('activeTab', 'relation');
    }
    public function relationToggle($id){
        $relation = Relation::findOrFail($id);
        $relation->status = !$relation->status;
        $relation->save();
        return redirect()->route('additional-setup.index')->with('success', 'Relation status updated!')->with('activeTab', 'relation');
    }
    public function relationDestroy($id)
    {
        $relation = Relation::findOrFail($id);
        $relation->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Relation deleted successfully.')->with('activeTab', 'relation');
    }


    // Occupation
    public function occupationStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $occupation = new Occupation();
        $occupation->name = $request->name;
        $occupation->save();
        return redirect()->route('additional-setup.index')->with('success', 'Occupation successfully added!')->with('activeTab', 'occupation');
    }
    public function occupationUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $occupation = Occupation::findOrFail($id);
        $occupation->name = $request->name;
        $occupation->save();
        return redirect()->route('additional-setup.index')->with('success', 'Occupation updated successfully!')->with('activeTab', 'occupation');
    }
    public function occupationToggle($id){
        $occupation = Occupation::findOrFail($id);
        $occupation->status = !$occupation->status;
        $occupation->save();
        return redirect()->route('additional-setup.index')->with('success', 'Occupation status updated!')->with('activeTab', 'occupation');
    }
    public function occupationDestroy($id)
    {
        $occupation = Occupation::findOrFail($id);
        $occupation->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Occupation deleted successfully.')->with('activeTab', 'occupation');
    }


    // salutation
    public function salutationStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $salutation = new Salutation();
        $salutation->name = $request->name;
        $salutation->save();
        return redirect()->route('additional-setup.index')->with('success', 'Salutation successfully added!')->with('activeTab', 'salutation');
    }
    public function salutationUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $salutation = Salutation::findOrFail($id);
        $salutation->name = $request->name;
        $salutation->save();
        return redirect()->route('additional-setup.index')->with('success', 'Salutation updated successfully!')->with('activeTab', 'salutation');
    }
    public function salutationToggle($id){
        $salutation = Salutation::findOrFail($id);
        $salutation->status = !$salutation->status;
        $salutation->save();
        return redirect()->route('additional-setup.index')->with('success', 'Salutation status updated!')->with('activeTab', 'salutation');
    }
    public function salutationDestroy($id)
    {
        $salutation = Salutation::findOrFail($id);
        $salutation->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Salutation deleted successfully.')->with('activeTab', 'salutation');
    }

// Project
public function projectStore(Request $request){
    $request->validate([
        'name' => 'required|string|max:255',
    ]);
    $project = new ProjectList();
    $project->name = $request->name;
    $project->save();
    return redirect()->route('additional-setup.index')->with('success', 'project successfully added!')->with('activeTab', 'project');
}
public function projectUpdate(Request $request, $id){
    $request->validate([
        'name' => 'required|string|max:255',
    ]);
    $project = ProjectList::findOrFail($id);
    $project->name = $request->name;
    $project->save();
    return redirect()->route('additional-setup.index')->with('success', 'project updated successfully!')->with('activeTab', 'project');
}
public function projectToggle($id){
    $project = ProjectList::findOrFail($id);
    $project->status = !$project->status;
    $project->save();
    return redirect()->route('additional-setup.index')->with('success', 'project status updated!')->with('activeTab', 'project');
}
public function projectDestroy($id)
{
    $project = ProjectList::findOrFail($id);
    $project->delete();
    return redirect()->route('additional-setup.index')->with('success', 'project deleted successfully.')->with('activeTab', 'project');
}


    // task priority
    public function taskPriorityStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $taskPriority = new TaskPriority();
        $taskPriority->name = $request->name;
        $taskPriority->save();
        return redirect()->route('additional-setup.index')->with('success', 'Task Priority successfully added!')->with('activeTab', 'task-priority');
    }
    public function taskPriorityUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $taskPriority = TaskPriority::findOrFail($id);
        $taskPriority->name = $request->name;
        $taskPriority->save();
        return redirect()->route('additional-setup.index')->with('success', 'Task Priority updated successfully!')->with('activeTab', 'task-priority');
    }
    public function taskPriorityToggle($id){
        $taskPriority = TaskPriority::findOrFail($id);
        $taskPriority->status = !$taskPriority->status;
        $taskPriority->save();
        return redirect()->route('additional-setup.index')->with('success', 'Task Priority status updated!')->with('activeTab', 'task-priority');
    }
    public function taskPriorityDestroy($id)
    {
        $taskPriority = TaskPriority::findOrFail($id);
        $taskPriority->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Task Priority deleted successfully.')->with('activeTab', 'task-priority');
    }



    // lead type
    public function leadTypeStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $lead = new LeadType();
        $lead->name = $request->name;
        $lead->save();
        return redirect()->route('additional-setup.index')->with('success', 'Lead Type successfully added!')->with('activeTab', 'lead-type');
    }
    public function leadTypeUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $lead = LeadType::findOrFail($id);
        $lead->name = $request->name;
        $lead->save();
        return redirect()->route('additional-setup.index')->with('success', 'Lead Type updated successfully!')->with('activeTab', 'lead-type');
    }
    public function leadTypeToggle($id){
        $lead = LeadType::findOrFail($id);
        $lead->status = !$lead->status;
        $lead->save();
        return redirect()->route('additional-setup.index')->with('success', 'Lead Type status updated!')->with('activeTab', 'lead-type');
    }
    public function leadTypeDestroy($id)
    {
        $lead = LeadType::findOrFail($id);
        $lead->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Lead Type deleted successfully.')->with('activeTab', 'lead-type');
    }

    // shift type
    public function shiftTypeStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $shift = new ShiftType();
        $shift->name = $request->name;
        $shift->save();
        return redirect()->route('additional-setup.index')->with('success', 'Shift Type successfully added!')->with('activeTab', 'shift-type');
    }
    public function shiftTypeUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $shift = ShiftType::findOrFail($id);
        $shift->name = $request->name;
        $shift->save();
        return redirect()->route('additional-setup.index')->with('success', 'Shift Type updated successfully!')->with('activeTab', 'shift-type');
    }
    public function shiftTypeToggle($id){
        $shift = ShiftType::findOrFail($id);
        $shift->status = !$shift->status;
        $shift->save();
        return redirect()->route('additional-setup.index')->with('success', 'Shift Type status updated!')->with('activeTab', 'shift-type');
    }
    public function shiftTypeDestroy($id)
    {
        $shift = ShiftType::findOrFail($id);
        $shift->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Shift Type deleted successfully.')->with('activeTab', 'shift-type');
    }


    // holiday type
    public function holidayTypeStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $holiday = new HolidayType();
        $holiday->name = $request->name;
        $holiday->save();
        return redirect()->route('additional-setup.index')->with('success', 'Holiday Type successfully added!')->with('activeTab', 'holiday-type');
    }
    public function holidayTypeUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $holiday = HolidayType::findOrFail($id);
        $holiday->name = $request->name;
        $holiday->save();
        return redirect()->route('additional-setup.index')->with('success', 'Holiday Type updated successfully!')->with('activeTab', 'holiday-type');
    }
    public function holidayTypeToggle($id){
        $holiday = HolidayType::findOrFail($id);
        $holiday->status = !$holiday->status;
        $holiday->save();
        return redirect()->route('additional-setup.index')->with('success', 'Holiday Type status updated!')->with('activeTab', 'holiday-type');
    }
    public function holidayTypeDestroy($id)
    {
        $holiday = HolidayType::findOrFail($id);
        $holiday->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Holiday Type deleted successfully.')->with('activeTab', 'holiday-type');
    }


    // leave
    public function leaveTypeStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $leave = new Leave();
        $leave->name = $request->name;
        $leave->save();
        return redirect()->route('additional-setup.index')->with('success', 'leave successfully added!')->with('activeTab', 'leave-type');
    }
    public function leaveTypeUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $leave = Leave::findOrFail($id);
        $leave->name = $request->name;
        $leave->save();
        return redirect()->route('additional-setup.index')->with('success', 'leave updated successfully!')->with('activeTab', 'leave-type');
    }
    public function leaveTypeToggle($id){
        $leave = Leave::findOrFail($id);
        $leave->status = !$leave->status;
        $leave->save();
        return redirect()->route('additional-setup.index')->with('success', 'leave status updated!')->with('activeTab', 'leave-type');
    }
    public function leaveTypeDestroy($id)
    {
        $leave = Leave::findOrFail($id);
        $leave->delete();
        return redirect()->route('additional-setup.index')->with('success', 'leave Type deleted successfully.')->with('activeTab', 'leave-type');
    }

    // user type
    public function userTypeStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $user = new UserType();
        $user->name = $request->name;
        $user->save();
        return redirect()->route('additional-setup.index')->with('success', 'User Type successfully added!')->with('activeTab', 'user-type');
    }
    public function userTypeUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $user = UserType::findOrFail($id);
        $user->name = $request->name;
        $user->save();
        return redirect()->route('additional-setup.index')->with('success', 'User Type updated successfully!')->with('activeTab', 'user-type');
    }
    public function userTypeToggle($id){
        $user = UserType::findOrFail($id);
        $user->status = !$user->status;
        $user->save();
        return redirect()->route('additional-setup.index')->with('success', 'User Type status updated!')->with('activeTab', 'user-type');
    }
    public function userTypeDestroy($id)
    {
        $user = UserType::findOrFail($id);
        $user->delete();
        return redirect()->route('additional-setup.index')->with('success', 'User Type deleted successfully.')->with('activeTab', 'user-type');
    }

    // employee type
    public function employeeTypeStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $employee = new EmployeeType();
        $employee->name = $request->name;
        $employee->save();
        return redirect()->route('additional-setup.index')->with('success', 'Employee Type successfully added!')->with('activeTab', 'employee-type');
    }
    public function employeeTypeUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $employee = EmployeeType::findOrFail($id);
        $employee->name = $request->name;
        $employee->save();
        return redirect()->route('additional-setup.index')->with('success', 'Employee Type updated successfully!')->with('activeTab', 'employee-type');
    }
    public function employeeTypeToggle($id){
        $employee = EmployeeType::findOrFail($id);
        $employee->status = !$employee->status;
        $employee->save();
        return redirect()->route('additional-setup.index')->with('success', 'Employee Type status updated!')->with('activeTab', 'employee-type');
    }
    public function employeeTypeDestroy($id)
    {
        $employee = EmployeeType::findOrFail($id);
        $employee->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Employee Type deleted successfully.')->with('activeTab', 'employee-type');
    }

    // education type
    public function educationTypeStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $education = new EducationType();
        $education->name = $request->name;
        $education->save();
        return redirect()->route('additional-setup.index')->with('success', 'Education Type successfully added!')->with('activeTab', 'education-type');
    }
    public function educationTypeUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $education = EducationType::findOrFail($id);
        $education->name = $request->name;
        $education->save();
        return redirect()->route('additional-setup.index')->with('success', 'Education Type updated successfully!')->with('activeTab', 'education-type');
    }
    public function educationTypeToggle($id){
        $education = EducationType::findOrFail($id);
        $education->status = !$education->status;
        $education->save();
        return redirect()->route('additional-setup.index')->with('success', 'Education Type status updated!')->with('activeTab', 'education-type');
    }
    public function educationTypeDestroy($id)
    {
        $education = EducationType::findOrFail($id);
        $education->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Education Type deleted successfully.')->with('activeTab', 'education-type');
    }

    // gender
    public function genderStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $gender = new Gender();
        $gender->name = $request->name;
        $gender->save();
        return redirect()->route('additional-setup.index')->with('success', 'Gender successfully added!')->with('activeTab', 'gender');
    }
    public function genderUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $gender = Gender::findOrFail($id);
        $gender->name = $request->name;
        $gender->save();
        return redirect()->route('additional-setup.index')->with('success', 'Gender updated successfully!')->with('activeTab', 'gender');
    }
    public function genderToggle($id){
        $gender = Gender::findOrFail($id);
        $gender->status = !$gender->status;
        $gender->save();
        return redirect()->route('additional-setup.index')->with('success', 'Gender status updated!')->with('activeTab', 'gender');
    }
    public function genderDestroy($id)
    {
        $gender = Gender::findOrFail($id);
        $gender->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Gender deleted successfully.')->with('activeTab', 'gender');
    }

    // relation
    public function religionStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $religion = new Religion();
        $religion->name = $request->name;
        $religion->save();
        return redirect()->route('additional-setup.index')->with('success', 'Religion successfully added!')->with('activeTab', 'religion');
    }
    public function religionUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $religion = Religion::findOrFail($id);
        $religion->name = $request->name;
        $religion->save();
        return redirect()->route('additional-setup.index')->with('success', 'Religion updated successfully!')->with('activeTab', 'religion');
    }
    public function religionToggle($id){
        $religion = Religion::findOrFail($id);
        $religion->status = !$religion->status;
        $religion->save();
        return redirect()->route('additional-setup.index')->with('success', 'Religion status updated!')->with('activeTab', 'religion');
    }
    public function religionDestroy($id)
    {
        $religion = Religion::findOrFail($id);
        $religion->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Religion deleted successfully.')->with('activeTab', 'religion');
    }

    // education
    public function educationStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $education = new Education();
        $education->name = $request->name;
        $education->save();
        return redirect()->route('additional-setup.index')->with('success', 'Education successfully added!')->with('activeTab', 'education');
    }
    public function educationUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $education = Education::findOrFail($id);
        $education->name = $request->name;
        $education->save();
        return redirect()->route('additional-setup.index')->with('success', 'Education updated successfully!')->with('activeTab', 'education');
    }
    public function educationToggle($id){
        $education = Education::findOrFail($id);
        $education->status = !$education->status;
        $education->save();
        return redirect()->route('additional-setup.index')->with('success', 'Education status updated!')->with('activeTab', 'education');
    }
    public function educationDestroy($id)
    {
        $education = Education::findOrFail($id);
        $education->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Education deleted successfully.')->with('activeTab', 'education');
    }


    // nationality
    public function nationalityStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $nationality = new Nationality();
        $nationality->name = $request->name;
        $nationality->save();
        return redirect()->route('additional-setup.index')->with('success', 'Nationality successfully added!')->with('activeTab', 'nationality');
    }
    public function nationalityUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $nationality = Nationality::findOrFail($id);
        $nationality->name = $request->name;
        $nationality->save();
        return redirect()->route('additional-setup.index')->with('success', 'Nationality updated successfully!')->with('activeTab', 'nationality');
    }
    public function nationalityToggle($id){
        $nationality = Nationality::findOrFail($id);
        $nationality->status = !$nationality->status;
        $nationality->save();
        return redirect()->route('additional-setup.index')->with('success', 'Nationality status updated!')->with('activeTab', 'nationality');
    }
    public function nationalityDestroy($id)
    {
        $nationality = Nationality::findOrFail($id);
        $nationality->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Nationality deleted successfully.')->with('activeTab', 'nationality');
    }

    // bloodgroup
    public function bloodgroupStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $bloodgroup = new BloodGroup();
        $bloodgroup->name = $request->name;
        $bloodgroup->save();
        return redirect()->route('additional-setup.index')->with('success', 'Blood Group successfully added!')->with('activeTab', 'bloodgroup');
    }
    public function bloodgroupUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $bloodgroup = BloodGroup::findOrFail($id);
        $bloodgroup->name = $request->name;
        $bloodgroup->save();
        return redirect()->route('additional-setup.index')->with('success', 'Blood Group updated successfully!')->with('activeTab', 'bloodgroup');
    }
    public function bloodgroupToggle($id){
        $bloodgroup = BloodGroup::findOrFail($id);
        $bloodgroup->status = !$bloodgroup->status;
        $bloodgroup->save();
        return redirect()->route('additional-setup.index')->with('success', 'Blood Group status updated!')->with('activeTab', 'bloodgroup');
    }
    public function bloodgroupDestroy($id)
    {
        $bloodgroup = BloodGroup::findOrFail($id);
        $bloodgroup->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Blood Group deleted successfully.')->with('activeTab', 'bloodgroup');
    }
    // weekoff
    public function weekoffStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $weekoff = new WeekOff();
        $weekoff->name = $request->name;
        $weekoff->save();
        return redirect()->route('additional-setup.index')->with('success', 'WeekOff successfully added!')->with('activeTab', 'weekoff');
    }
    public function weekoffUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $weekoff = WeekOff::findOrFail($id);
        $weekoff->name = $request->name;
        $weekoff->save();
        return redirect()->route('additional-setup.index')->with('success', 'WeekOff updated successfully!')->with('activeTab', 'weekoff');
    }
    public function weekoffToggle($id){
        $weekoff = WeekOff::findOrFail($id);
        $weekoff->status = !$weekoff->status;
        $weekoff->save();
        return redirect()->route('additional-setup.index')->with('success', 'WeekOff status updated!')->with('activeTab', 'weekoff');
    }
    public function weekoffDestroy($id)
    {
        $weekoff = WeekOff::findOrFail($id);
        $weekoff->delete();
        return redirect()->route('additional-setup.index')->with('success', 'WeekOff deleted successfully.')->with('activeTab', 'weekoff');
    }

    // leavequota
    public function leavequotaStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $leavequota = new LeaveQuota();
        $leavequota->name = $request->name;
        $leavequota->save();
        return redirect()->route('additional-setup.index')->with('success', 'Leave Quota successfully added!')->with('activeTab', 'leavequota');
    }
    public function leavequotaUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $leavequota = LeaveQuota::findOrFail($id);
        $leavequota->name = $request->name;
        $leavequota->save();
        return redirect()->route('additional-setup.index')->with('success', 'Leave Quota updated successfully!')->with('activeTab', 'leavequota');
    }
    public function leavequotaToggle($id){
        $leavequota = LeaveQuota::findOrFail($id);
        $leavequota->status = !$leavequota->status;
        $leavequota->save();
        return redirect()->route('additional-setup.index')->with('success', 'Leave Quota status updated!')->with('activeTab', 'leavequota');
    }
    public function leavequotaDestroy($id)
    {
        $leavequota = LeaveQuota::findOrFail($id);
        $leavequota->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Leave Quota deleted successfully.')->with('activeTab', 'leavequota');
    }
    // leaveduration
    public function leavedurationStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $leaveduration = new LeaveDuration();
        $leaveduration->name = $request->name;
        $leaveduration->save();
        return redirect()->route('additional-setup.index')->with('success', 'Leave Duration successfully added!')->with('activeTab', 'leaveduration');
    }
    public function leavedurationUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $leaveduration = LeaveDuration::findOrFail($id);
        $leaveduration->name = $request->name;
        $leaveduration->save();
        return redirect()->route('additional-setup.index')->with('success', 'Leave Duration updated successfully!')->with('activeTab', 'leaveduration');
    }
    public function leavedurationToggle($id){
        $leaveduration = LeaveDuration::findOrFail($id);
        $leaveduration->status = !$leaveduration->status;
        $leaveduration->save();
        return redirect()->route('additional-setup.index')->with('success', 'Leave Duration status updated!')->with('activeTab', 'leaveduration');
    }
    public function leavedurationDestroy($id)
    {
        $leaveduration = LeaveDuration::findOrFail($id);
        $leaveduration->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Leave Duration deleted successfully.')->with('activeTab', 'leaveduration');
    }


    // notificationperiod
    public function notificationperiodStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $notificationperiod = new NotificationPeriod();
        $notificationperiod->name = $request->name;
        $notificationperiod->save();
        return redirect()->route('additional-setup.index')->with('success', 'Notification Period successfully added!')->with('activeTab', 'notificationperiod');
    }
    public function notificationperiodUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $notificationperiod = NotificationPeriod::findOrFail($id);
        $notificationperiod->name = $request->name;
        $notificationperiod->save();
        return redirect()->route('additional-setup.index')->with('success', 'Notification Period updated successfully!')->with('activeTab', 'notificationperiod');
    }
    public function notificationperiodToggle($id){
        $notificationperiod = NotificationPeriod::findOrFail($id);
        $notificationperiod->status = !$notificationperiod->status;
        $notificationperiod->save();
        return redirect()->route('additional-setup.index')->with('success', 'Notification Period status updated!')->with('activeTab', 'notificationperiod');
    }
    public function notificationperiodDestroy($id)
    {
        $notificationperiod = NotificationPeriod::findOrFail($id);
        $notificationperiod->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Notification Period deleted successfully.')->with('activeTab', 'notificationperiod');
    }

    // carryforwardlimit
    public function carryforwardlimitStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $carryforwardlimit = new CarryForwardLimit();
        $carryforwardlimit->name = $request->name;
        $carryforwardlimit->save();
        return redirect()->route('additional-setup.index')->with('success', 'Bank successfully added!')->with('activeTab', 'carryforwardlimit');
    }
    public function carryforwardlimitUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $carryforwardlimit = CarryForwardLimit::findOrFail($id);
        $carryforwardlimit->name = $request->name;
        $carryforwardlimit->save();
        return redirect()->route('additional-setup.index')->with('success', 'Bank updated successfully!')->with('activeTab', 'carryforwardlimit');
    }
    public function carryforwardlimitToggle($id){
        $carryforwardlimit = CarryForwardLimit::findOrFail($id);
        $carryforwardlimit->status = !$carryforwardlimit->status;
        $carryforwardlimit->save();
        return redirect()->route('additional-setup.index')->with('success', 'Bank status updated!')->with('activeTab', 'carryforwardlimit');
    }
    public function carryforwardlimitDestroy($id)
    {
        $carryforwardlimit = CarryForwardLimit::findOrFail($id);
        $carryforwardlimit->delete();
        return redirect()->route('additional-setup.index')->with('success', 'Bank deleted successfully.')->with('activeTab', 'carryforwardlimit');
    }
}
