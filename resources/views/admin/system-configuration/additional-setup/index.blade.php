@extends('layouts.admin')
@section('title','Chart Of Accounts')
@section('content')
<div class="container">
    <div class="page-inner">
       <div class="row">
          <div class="col-md-12">
             <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header project-details-card-header">
                            <h4 class="project-details-card-header-title"><i class='bx bx-cog bx-tada'></i> Additional Information  </h4>
                        </div>
                        <div class="card-body overflow-y-auto" style="max-height: 80vh;">
                            <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd" id="v-pills-tab-without-border" role="tablist" aria-orientation="vertical">
                                {{-- <a class="nav-link {{ session('activeTab') == 'client-type' || !session('activeTab') ? 'active' : '' }} mx-3" id="client-type-tab-nobd" data-bs-toggle="pill" href="#client-type-nobd" role="tab"
                                    aria-controls="client-type-nobd" aria-selected="false" tabindex="-1">Client Type</a>
                                <a class="nav-link {{ session('activeTab') == 'project-type' ? 'active' : '' }} mx-3" id="project-type-tab-nobd" data-bs-toggle="pill" href="#project-type-nobd" role="tab"
                                    aria-controls="project-type-nobd" aria-selected="false" tabindex="-1">Project Type</a>
                                <a class="nav-link {{ session('activeTab') == 'product-category' ? 'active' : '' }} mx-3" id="product-category-tab-nobd" data-bs-toggle="pill" href="#product-category-nobd" role="tab"
                                    aria-controls="product-category-nobd" aria-selected="true">Product Category</a>
                                <a class="nav-link {{ session('activeTab') == 'industry-type' ? 'active' : '' }} mx-3" id="industry-type-tab-nobd" data-bs-toggle="pill" href="#industry-type-nobd" role="tab"
                                    aria-controls="industry-type-nobd" aria-selected="false" tabindex="-1">Industry Type</a>
                                <a class="nav-link {{ session('activeTab') == 'renewal-type' ? 'active' : '' }} mx-3" id="renewal-type-tab-nobd" data-bs-toggle="pill" href="#renewal-type-nobd" role="tab"
                                    aria-controls="renewal-type-nobd" aria-selected="false" tabindex="-1">Renewal Type</a>
                                <a class="nav-link {{ session('activeTab') == 'warranty-period' ? 'active' : '' }} mx-3" id="warranty-period-tab-nobd" data-bs-toggle="pill" href="#warranty-period-nobd" role="tab"
                                    aria-controls="warranty-period-nobd" aria-selected="false" tabindex="-1">Warranty Period</a> --}}
                                {{-- <a class="nav-link {{ session('activeTab') == 'probation-period' || !session('activeTab') ? 'active' : '' }} mx-3" id="probation-period-tab-nobd" data-bs-toggle="pill" href="#probation-period-nobd" role="tab"
                                    aria-controls="probation-period-nobd" aria-selected="false" tabindex="-1">Probation Period</a> --}}
                                {{-- <a class="nav-link {{ session('activeTab') == 'project-priority' ? 'active' : '' }} mx-3" id="project-priority-tab-nobd" data-bs-toggle="pill" href="#project-priority-nobd" role="tab"
                                    aria-controls="project-priority-nobd" aria-selected="false" tabindex="-1">Project Priority</a>
                                <a class="nav-link {{ session('activeTab') == 'project-status' ? 'active' : '' }} mx-3" id="project-status-tab-nobd" data-bs-toggle="pill" href="#project-status-nobd" role="tab"
                                    aria-controls="project-status-nobd" aria-selected="false" tabindex="-1">Project Status</a> --}}
                                <a class="nav-link {{ session('activeTab') == 'relation' || !session('activeTab') ? 'active' : '' }} mx-3" id="relation-tab-nobd" data-bs-toggle="pill" href="#relation-nobd" role="tab"
                                    aria-controls="relation-nobd" aria-selected="false" tabindex="-1">Relation</a>

                                <a class="nav-link {{ session('activeTab') == 'occupation' ? 'active' : '' }} mx-3" id="occupation-tab-nobd" data-bs-toggle="pill" href="#occupation-nobd" role="tab"
                                    aria-controls="occupation-nobd" aria-selected="false" tabindex="-1">Occupation</a>
                                {{-- <a class="nav-link {{ session('activeTab') == 'salutation' ? 'active' : '' }} mx-3" id="salutation-tab-nobd" data-bs-toggle="pill" href="#salutation-nobd" role="tab"
                                    aria-controls="salutation-nobd" aria-selected="false" tabindex="-1">Salutation</a>
                                <a class="nav-link {{ session('activeTab') == 'grade' ? 'active' : '' }} mx-3" id="grade-tab-nobd" data-bs-toggle="pill" href="#grade-nobd" role="tab"
                                    aria-controls="grade-nobd" aria-selected="false" tabindex="-1">Grade</a> --}}
                                <a class="nav-link {{ session('activeTab') == 'project' ? 'active' : '' }} mx-3" id="project-tab-nobd" data-bs-toggle="pill" href="#project-nobd" role="tab"
                                    aria-controls="project-nobd" aria-selected="false" tabindex="-1">Project</a>
                                {{-- <a class="nav-link {{ session('activeTab') == 'task-priority' ? 'active' : '' }} mx-3" id="task-priority-tab-nobd" data-bs-toggle="pill" href="#task-priority-nobd" role="tab"
                                    aria-controls="task-priority-nobd" aria-selected="false" tabindex="-1">Task Priority</a>
                                <a class="nav-link {{ session('activeTab') == 'lead-type' ? 'active' : '' }} mx-3" id="lead-type-tab-nobd" data-bs-toggle="pill" href="#lead-type-nobd" role="tab"
                                    aria-controls="lead-type-nobd" aria-selected="false" tabindex="-1">Lead Type</a> --}}
                                {{-- <a class="nav-link {{ session('activeTab') == 'shift-type' ? 'active' : '' }} mx-3" id="shift-type-tab-nobd" data-bs-toggle="pill" href="#shift-type-nobd" role="tab"
                                    aria-controls="shift-type-nobd" aria-selected="false" tabindex="-1">Shift Type</a>
                                <a class="nav-link {{ session('activeTab') == 'holiday-type' ? 'active' : '' }} mx-3" id="holiday-type-tab-nobd" data-bs-toggle="pill" href="#holiday-type-nobd" role="tab"
                                    aria-controls="holiday-type-nobd" aria-selected="false" tabindex="-1">Holiday Type</a>
                                <a class="nav-link {{ session('activeTab') == 'leave-type' ? 'active' : '' }} mx-3" id="leave-type-tab-nobd" data-bs-toggle="pill" href="#leave-type-nobd" role="tab"
                                    aria-controls="leave-type-nobd" aria-selected="false" tabindex="-1">Leave Type</a> --}}
                                <a class="nav-link {{ session('activeTab') == 'user-type' ? 'active' : '' }} mx-3" id="user-type-tab-nobd" data-bs-toggle="pill" href="#user-type-nobd" role="tab"
                                    aria-controls="user-type-nobd" aria-selected="false" tabindex="-1">User Type</a>
                                {{-- <a class="nav-link {{ session('activeTab') == 'employee-type' ? 'active' : '' }} mx-3" id="employee-type-tab-nobd" data-bs-toggle="pill" href="#employee-type-nobd" role="tab"
                                    aria-controls="employee-type-nobd" aria-selected="false" tabindex="-1">Employee Type</a>
                                <a class="nav-link {{ session('activeTab') == 'education-type' ? 'active' : '' }} mx-3" id="education-type-tab-nobd" data-bs-toggle="pill" href="#education-type-nobd" role="tab"
                                    aria-controls="education-type-nobd" aria-selected="false" tabindex="-1">Education Type</a> --}}
                                <a class="nav-link {{ session('activeTab') == 'education' ? 'active' : '' }} mx-3" id="education-tab-nobd" data-bs-toggle="pill" href="#education-nobd" role="tab"
                                    aria-controls="education-nobd" aria-selected="false" tabindex="-1">Education</a>
                                <a class="nav-link {{ session('activeTab') == 'gender' ? 'active' : '' }} mx-3" id="gender-tab-nobd" data-bs-toggle="pill" href="#gender-nobd" role="tab"
                                    aria-controls="gender-nobd" aria-selected="false" tabindex="-1">Gender</a>
                                <a class="nav-link {{ session('activeTab') == 'religion' ? 'active' : '' }} mx-3" id="religion-tab-nobd" data-bs-toggle="pill" href="#religion-nobd" role="tab"
                                    aria-controls="religion-nobd" aria-selected="false" tabindex="-1">Religion</a>
                                <a class="nav-link {{ session('activeTab') == 'nationality' ? 'active' : '' }} mx-3" id="nationality-tab-nobd" data-bs-toggle="pill" href="#nationality-nobd" role="tab"
                                    aria-controls="nationality-nobd" aria-selected="false" tabindex="-1">Nationality</a>
                                <a class="nav-link {{ session('activeTab') == 'bloodgroup' ? 'active' : '' }} mx-3" id="bloodgroup-tab-nobd" data-bs-toggle="pill" href="#bloodgroup-nobd" role="tab"
                                    aria-controls="bloodgroup-nobd" aria-selected="false" tabindex="-1">Blood Group</a>
                                {{-- <a class="nav-link {{ session('activeTab') == 'weekoff' ? 'active' : '' }} mx-3" id="weekoff-tab-nobd" data-bs-toggle="pill" href="#weekoff-nobd" role="tab"
                                    aria-controls="weekoff-nobd" aria-selected="false" tabindex="-1">Week Off</a>
                                <a class="nav-link {{ session('activeTab') == 'leavequota' ? 'active' : '' }} mx-3" id="leavequota-tab-nobd" data-bs-toggle="pill" href="#leavequota-nobd" role="tab"
                                    aria-controls="leavequota-nobd" aria-selected="false" tabindex="-1">Leave Quota</a>
                                <a class="nav-link {{ session('activeTab') == 'leaveduration' ? 'active' : '' }} mx-3" id="leaveduration-tab-nobd" data-bs-toggle="pill" href="#leaveduration-nobd" role="tab"
                                    aria-controls="leaveduration-nobd" aria-selected="false" tabindex="-1">Leave Duration</a> --}}
                                <a class="nav-link {{ session('activeTab') == 'notificationperiod' ? 'active' : '' }} mx-3" id="notificationperiod-tab-nobd" data-bs-toggle="pill" href="#notificationperiod-nobd" role="tab"
                                    aria-controls="notificationperiod-nobd" aria-selected="false" tabindex="-1">Notification Period</a>
                                <a class="nav-link {{ session('activeTab') == 'carryforwardlimit' ? 'active' : '' }} mx-3" id="carryforwardlimit-tab-nobd" data-bs-toggle="pill" href="#carryforwardlimit-nobd" role="tab"
                                    aria-controls="carryforwardlimit-nobd" aria-selected="false" tabindex="-1">Bank Setup</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                   <div class="tab-content" id="v-pills-without-border-tabContent">
                    <div class="tab-pane fade {{ session('activeTab') == 'client-type' ? 'show active' : '' }}" id="client-type-nobd" role="tabpanel" aria-labelledby="client-type-tab-nobd">
                         @include('admin.system-configuration.additional-setup.client-type.create-modal')
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Client Type</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-client-type">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Client Type</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                           <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                              <thead class="">
                                                 <tr role="row">
                                                    <th class="text-center">Sl</th>
                                                    <th class="text-start">Client Type</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Action</th>
                                                 </tr>
                                              </thead>
                                              <tbody>
                                                @foreach ($client_types as $client_type)
                                                 <tr role="row" class="odd">
                                                    <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                    <td class="text-start">{{ $client_type->client_type }}</td>
                                                    <td class="text-center">
                                                        <form action="{{ route('client-type.toggle', $client_type->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            <button type="submit" class="btn {{ $client_type->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                {{ $client_type->status == 1 ? 'Active' : 'Inactive' }}
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td class="text-center">
                                                       <div class="form-button-action">
                                                            <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-client-type-edit-{{ $client_type->id }}">
                                                            <i class='bx bxs-edit bx-tada' ></i> </button>

                                                            <a href="#" id="delete-client_type-link" title="delete"
                                                                class="btn btn-link btn-danger btn-lg"
                                                                data-client_type-id="{{ $client_type->id }}">
                                                                <i class='bx bx-trash-alt'></i>
                                                            </a>

                                                            <form id="delete-client_type-form-{{ $client_type->id }}"
                                                                action="{{ route('client-type.destroy', $client_type->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                       </div>
                                                    </td>
                                                    @include('admin.system-configuration.additional-setup.client-type.edit-modal')
                                                 </tr>
                                                 @endforeach
                                              </tbody>
                                           </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                        <div class="tab-pane fade {{ session('activeTab') == 'project-type' ? 'show active' : '' }}" id="project-type-nobd" role="tabpanel" aria-labelledby="project-type-tab-nobd">
                        @include('admin.system-configuration.additional-setup.project-type.create-modal')
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Project Type</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-project-type">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Project Type</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Project Type</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($project_types as $project_type)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $project_type->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('project-type.toggle', $project_type->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $project_type->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $project_type->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-project-type-edit-{{ $project_type->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-project_type-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-project_type-id="{{ $project_type->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-project_type-form-{{ $project_type->id }}"
                                                                  action="{{ route('project-type.destroy', $project_type->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.project-type.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'product-category' ? 'show active' : '' }}" id="product-category-nobd" role="tabpanel" aria-labelledby="product-category-tab-nobd">
                         @include('admin.system-configuration.additional-setup.product-category.create-modal')
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Product Category</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-product-category">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Product Category</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Product Category </th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($product_categories as $product_category)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $product_category->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('product-category.toggle', $product_category->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $product_category->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $product_category->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-product-category-edit-{{ $product_category->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-product_category-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-product_category-id="{{ $product_category->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-product_category-form-{{ $product_category->id }}"
                                                                  action="{{ route('product-category.destroy', $product_category->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.product-category.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'industry-type' ? 'show active' : '' }}" id="industry-type-nobd" role="tabpanel" aria-labelledby="industry-type-tab-nobd">
                        @include('admin.system-configuration.additional-setup.industry-type.create-modal')
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Industry Name</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-industry-type">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Industry</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Industry Type </th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($industry_types as $industry_type)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $industry_type->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('industry-type.toggle', $industry_type->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $industry_type->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $industry_type->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-industry-type-edit-{{ $industry_type->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-industry_type-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-industry_type-id="{{ $industry_type->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-industry_type-form-{{ $industry_type->id }}"
                                                                  action="{{ route('industry-type.destroy', $industry_type->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.industry-type.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'renewal-type' ? 'show active' : '' }}" id="renewal-type-nobd" role="tabpanel" aria-labelledby="renewal-type-tab-nobd">
                        @include('admin.system-configuration.additional-setup.renewal-type.create-modal')
                         <div class="card">
                            <div class="card-header renewal-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Renewal Type</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-renewal-type">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Renewal Type</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Renewal Type</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($renewal_types as $renewal_type)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $renewal_type->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('renewal-type.toggle', $renewal_type->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $renewal_type->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $renewal_type->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-renewal-type-edit-{{ $renewal_type->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-renewal_type-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-renewal_type-id="{{ $renewal_type->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-renewal_type-form-{{ $renewal_type->id }}"
                                                                  action="{{ route('renewal-type.destroy', $renewal_type->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.renewal-type.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'warranty-period' ? 'show active' : '' }}" id="warranty-period-nobd" role="tabpanel" aria-labelledby="warranty-period-tab-nobd">
                        @include('admin.system-configuration.additional-setup.warranty-period.create-modal')
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Warranty Period</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-warranty-period">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Warranty Period</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Warranty Period</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($warranty_periods as $warranty_period)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $warranty_period->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('warranty-period.toggle', $warranty_period->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $warranty_period->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $warranty_period->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-warranty-period-edit-{{ $warranty_period->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-warranty_period-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-warranty_period-id="{{ $warranty_period->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-warranty_period-form-{{ $warranty_period->id }}"
                                                                  action="{{ route('warranty-period.destroy', $warranty_period->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.warranty-period.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      {{-- <div class="tab-pane fade {{ session('activeTab') == 'probation-period' || !session('activeTab') ? 'show active' : '' }}" id="probation-period-nobd" role="tabpanel" aria-labelledby="probation-period-tab-nobd">
                        @include('admin.system-configuration.additional-setup.probation-period.create-modal')
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Probation Period</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-probation-period">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Probation Period</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Probation Period</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($probation_periods as $probation_period)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $probation_period->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('probation-period.toggle', $probation_period->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $probation_period->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $probation_period->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-probation-period-edit-{{ $probation_period->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-probation_period-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-probation_period-id="{{ $probation_period->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-probation_period-form-{{ $probation_period->id }}"
                                                                  action="{{ route('probation-period.destroy', $probation_period->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.probation-period.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div> --}}
                      <div class="tab-pane fade {{ session('activeTab') == 'project-priority' ? 'show active' : '' }}" id="project-priority-nobd" role="tabpanel" aria-labelledby="project-priority-tab-nobd">
                        @include('admin.system-configuration.additional-setup.project-priority.create-modal')
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i>Project Priority</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-project-priority">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Project Priority</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Project Priority</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($project_priorities as $project_priority)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $project_priority->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('project-priority.toggle', $project_priority->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $project_priority->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $project_priority->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-project-priority-edit-{{ $project_priority->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-project_priority-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-project_priority-id="{{ $project_priority->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-project_priority-form-{{ $project_priority->id }}"
                                                                  action="{{ route('project-priority.destroy', $project_priority->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.project-priority.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'project-status' ? 'show active' : '' }}" id="project-status-nobd" role="tabpanel" aria-labelledby="project-status-tab-nobd">
                        @include('admin.system-configuration.additional-setup.project-status.create-modal')
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i>Project Status</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-project-status">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Project Status</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Project Status</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($project_statuses as $project_status)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $project_status->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('project-status.toggle', $project_status->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $project_status->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $project_status->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-project-status-edit-{{ $project_status->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-project_status-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-project_status-id="{{ $project_status->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-project_status-form-{{ $project_status->id }}"
                                                                  action="{{ route('project-status.destroy', $project_status->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.project-status.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'relation' || !session('activeTab') ? 'show active' : '' }}" id="relation-nobd" role="tabpanel" aria-labelledby="relation-tab-nobd">
                        @include('admin.system-configuration.additional-setup.relation.create-modal')
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i>Relation</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-relation">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Relation</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Relation</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($relations as $relation)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $relation->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('relation.toggle', $relation->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $relation->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $relation->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-relation-edit-{{ $relation->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-relation-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-relation-id="{{ $relation->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-relation-form-{{ $relation->id }}"
                                                                  action="{{ route('relation.destroy', $relation->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.relation.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'occupation' ? 'show active' : '' }}" id="occupation-nobd" role="tabpanel" aria-labelledby="occupation-tab-nobd">
                        @include('admin.system-configuration.additional-setup.occupation.create-modal')
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i>Occupation</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-occupation">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Occupation</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Occupation</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($occupations as $occupation)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $occupation->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('occupation.toggle', $occupation->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $occupation->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $occupation->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-occupation-edit-{{ $occupation->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-occupation-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-occupation-id="{{ $occupation->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-occupation-form-{{ $occupation->id }}"
                                                                  action="{{ route('occupation.destroy', $occupation->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.occupation.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'salutation' ? 'show active' : '' }}" id="salutation-nobd" role="tabpanel" aria-labelledby="salutation-tab-nobd">
                        @include('admin.system-configuration.additional-setup.salutation.create-modal')
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i>Salutation</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-salutation">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Salutation</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Salutation</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($salutations as $salutation)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $salutation->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('salutation.toggle', $salutation->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $salutation->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $salutation->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-salutation-edit-{{ $salutation->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-salutation-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-salutation-id="{{ $salutation->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-salutation-form-{{ $salutation->id }}"
                                                                  action="{{ route('salutation.destroy', $salutation->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.salutation.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'grade' ? 'show active' : '' }}" id="grade-nobd" role="tabpanel" aria-labelledby="grade-tab-nobd">
                        @include('admin.system-configuration.additional-setup.grade.create-modal')
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i>Grade</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-grade">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Grade</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Grade</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($grades as $grade)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $grade->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('grade.toggle', $grade->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $grade->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $grade->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-grade-edit-{{ $grade->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-grade-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-grade-id="{{ $grade->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-grade-form-{{ $grade->id }}"
                                                                  action="{{ route('grade.destroy', $grade->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.grade.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'project' ? 'show active' : '' }}" id="project-nobd" role="tabpanel" aria-labelledby="project-tab-nobd">
                        @include('admin.system-configuration.additional-setup.project.create-modal')
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i>Project</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-project">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Project</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Project</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($projects as $project)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $project->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('project.toggle', $project->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $project->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $project->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-project-edit-{{ $project->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-project-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-project-id="{{ $project->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-project-form-{{ $project->id }}"
                                                                  action="{{ route('project.destroy', $project->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.project.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'task-priority' ? 'show active' : '' }}" id="task-priority-nobd" role="tabpanel" aria-labelledby="task-priority-tab-nobd">
                        @include('admin.system-configuration.additional-setup.task-priority.create-modal')
                         <div class="card">
                            <div class="card-header task-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i>Task Priority</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-task-priority">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Task Priority</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Task Priority</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($task_priorities as $task_priority)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $task_priority->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('task-priority.toggle', $task_priority->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $task_priority->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $task_priority->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-task-priority-edit-{{ $task_priority->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-task_priority-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-task_priority-id="{{ $task_priority->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-task_priority-form-{{ $task_priority->id }}"
                                                                  action="{{ route('task-priority.destroy', $task_priority->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.task-priority.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'lead-type' ? 'show active' : '' }}" id="lead-type-nobd" role="tabpanel" aria-labelledby="lead-type-tab-nobd">
                        @include('admin.system-configuration.additional-setup.lead-type.create-modal')
                         <div class="card">
                            <div class="card-header lead-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Lead Type</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-lead-type">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Lead Type</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Lead Type</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($lead_types as $lead_type)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $lead_type->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('lead-type.toggle', $lead_type->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $lead_type->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $lead_type->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-lead-type-edit-{{ $lead_type->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-lead_type-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-lead_type-id="{{ $lead_type->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-lead_type-form-{{ $lead_type->id }}"
                                                                  action="{{ route('lead-type.destroy', $lead_type->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.lead-type.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'shift-type' ? 'show active' : '' }}" id="shift-type-nobd" role="tabpanel" aria-labelledby="shift-type-tab-nobd">
                        @include('admin.system-configuration.additional-setup.shift-type.create-modal')
                         <div class="card">
                            <div class="card-header shift-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Shift Type</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-shift-type">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Shift Type</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Shift Type</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($shift_types as $shift_type)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $shift_type->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('shift-type.toggle', $shift_type->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $shift_type->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $shift_type->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-shift-type-edit-{{ $shift_type->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-shift_type-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-shift_type-id="{{ $shift_type->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-shift_type-form-{{ $shift_type->id }}"
                                                                  action="{{ route('shift-type.destroy', $shift_type->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.shift-type.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'holiday-type' ? 'show active' : '' }}" id="holiday-type-nobd" role="tabpanel" aria-labelledby="holiday-type-tab-nobd">
                        @include('admin.system-configuration.additional-setup.holiday-type.create-modal')
                         <div class="card">
                            <div class="card-header holiday-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Holiday Type</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-holiday-type">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Holiday Type</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Holiday Type</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($holiday_types as $holiday_type)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $holiday_type->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('holiday-type.toggle', $holiday_type->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $holiday_type->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $holiday_type->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-holiday-type-edit-{{ $holiday_type->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-holiday_type-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-holiday_type-id="{{ $holiday_type->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-holiday_type-form-{{ $holiday_type->id }}"
                                                                  action="{{ route('holiday-type.destroy', $holiday_type->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.holiday-type.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'leave-type' ? 'show active' : '' }}" id="leave-type-nobd" role="tabpanel" aria-labelledby="leave-type-tab-nobd">
                        @include('admin.system-configuration.additional-setup.leave-type.create-modal')
                         <div class="card">
                            <div class="card-header leave-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Leave Type</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-leave-type">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Leave Type</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Leave Type</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($leaves as $leave)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $leave->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('leave-type.toggle', $leave->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $leave->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $leave->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-leave-type-edit-{{ $leave->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-leave-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-leave-id="{{ $leave->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-leave-form-{{ $leave->id }}"
                                                                  action="{{ route('leave-type.destroy', $leave->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.leave-type.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'user-type' ? 'show active' : '' }}" id="user-type-nobd" role="tabpanel" aria-labelledby="user-type-tab-nobd">
                        @include('admin.system-configuration.additional-setup.user-type.create-modal')
                         <div class="card">
                            <div class="card-header user-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> User Type</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-user-type">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add User Type</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">User Type</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($user_types as $user_type)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $user_type->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('user-type.toggle', $user_type->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $user_type->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $user_type->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-user-type-edit-{{ $user_type->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-user_type-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-user_type-id="{{ $user_type->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-user_type-form-{{ $user_type->id }}"
                                                                  action="{{ route('user-type.destroy', $user_type->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.user-type.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'employee-type' ? 'show active' : '' }}" id="employee-type-nobd" role="tabpanel" aria-labelledby="employee-type-tab-nobd">
                        @include('admin.system-configuration.additional-setup.employee-type.create-modal')
                         <div class="card">
                            <div class="card-header employee-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Employee Type</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-employee-type">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Employee Type</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Employee Type</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($employee_types as $employee_type)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $employee_type->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('employee-type.toggle', $employee_type->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $employee_type->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $employee_type->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-employee-type-edit-{{ $employee_type->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-employee_type-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-employee_type-id="{{ $employee_type->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-employee_type-form-{{ $employee_type->id }}"
                                                                  action="{{ route('employee-type.destroy', $employee_type->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.employee-type.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'education-type' ? 'show active' : '' }}" id="education-type-nobd" role="tabpanel" aria-labelledby="education-type-tab-nobd">
                        @include('admin.system-configuration.additional-setup.education-type.create-modal')
                         <div class="card">
                            <div class="card-header education-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Education Type</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-education-type">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Education Type</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Education Type</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($education_types as $education_type)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $education_type->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('education-type.toggle', $education_type->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $education_type->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $education_type->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-education-type-edit-{{ $education_type->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-education_type-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-education_type-id="{{ $education_type->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-education_type-form-{{ $education_type->id }}"
                                                                  action="{{ route('education-type.destroy', $education_type->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.education-type.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'education' ? 'show active' : '' }}" id="education-nobd" role="tabpanel" aria-labelledby="education-tab-nobd">
                        @include('admin.system-configuration.additional-setup.education.create-modal')
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i>Education</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-education">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Education</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Education</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($educations as $education)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $education->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('education.toggle', $education->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $education->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $education->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-education-edit-{{ $education->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-education-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-education-id="{{ $education->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-education-form-{{ $education->id }}"
                                                                  action="{{ route('education.destroy', $education->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.education.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'gender' ? 'show active' : '' }}" id="gender-nobd" role="tabpanel" aria-labelledby="gender-tab-nobd">
                        @include('admin.system-configuration.additional-setup.gender.create-modal')
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i>Gender</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-gender">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Gender</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Gender</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($genders as $gender)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $gender->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('gender.toggle', $gender->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $gender->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $gender->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-gender-edit-{{ $gender->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-gender-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-gender-id="{{ $gender->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-gender-form-{{ $gender->id }}"
                                                                  action="{{ route('gender.destroy', $gender->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.gender.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'religion' ? 'show active' : '' }}" id="religion-nobd" role="tabpanel" aria-labelledby="religion-tab-nobd">
                        @include('admin.system-configuration.additional-setup.religion.create-modal')
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i>Religion</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-religion">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Religion</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Religion</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($religions as $religion)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $religion->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('religion.toggle', $religion->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $religion->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $religion->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-religion-edit-{{ $religion->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-religion-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-religion-id="{{ $religion->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-religion-form-{{ $religion->id }}"
                                                                  action="{{ route('religion.destroy', $religion->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.religion.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'nationality' ? 'show active' : '' }}" id="nationality-nobd" role="tabpanel" aria-labelledby="nationality-tab-nobd">
                        @include('admin.system-configuration.additional-setup.nationality.create-modal')
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i>Nationality</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-nationality">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Nationality</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Nationality</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($nationalities as $nationality)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $nationality->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('nationality.toggle', $nationality->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $nationality->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $nationality->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-nationality-edit-{{ $nationality->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-nationality-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-nationality-id="{{ $nationality->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-nationality-form-{{ $nationality->id }}"
                                                                  action="{{ route('nationality.destroy', $nationality->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.nationality.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'bloodgroup' ? 'show active' : '' }}" id="bloodgroup-nobd" role="tabpanel" aria-labelledby="bloodgroup-tab-nobd">
                        @include('admin.system-configuration.additional-setup.bloodgroup.create-modal')
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i>Blood Group</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-bloodgroup">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Blood Group</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Blood Group</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($bloodgroups as $bloodgroup)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $bloodgroup->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('bloodgroup.toggle', $bloodgroup->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $bloodgroup->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $bloodgroup->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-bloodgroup-edit-{{ $bloodgroup->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-bloodgroup-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-bloodgroup-id="{{ $bloodgroup->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-bloodgroup-form-{{ $bloodgroup->id }}"
                                                                  action="{{ route('bloodgroup.destroy', $bloodgroup->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.bloodgroup.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'weekoff' ? 'show active' : '' }}" id="weekoff-nobd" role="tabpanel" aria-labelledby="weekoff-tab-nobd">
                        @include('admin.system-configuration.additional-setup.weekoff.create-modal')
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i>Week Off</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-weekoff">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Week Off</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Week Off</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($weekoffs as $weekoff)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $weekoff->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('weekoff.toggle', $weekoff->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $weekoff->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $weekoff->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-weekoff-edit-{{ $weekoff->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-weekoff-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-weekoff-id="{{ $weekoff->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-weekoff-form-{{ $weekoff->id }}"
                                                                  action="{{ route('weekoff.destroy', $weekoff->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.weekoff.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'leavequota' ? 'show active' : '' }}" id="leavequota-nobd" role="tabpanel" aria-labelledby="leavequota-tab-nobd">
                        @include('admin.system-configuration.additional-setup.leavequota.create-modal')
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i>Leave Quota</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-leavequota">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Leave Quota</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Leave Quota</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($leavequotas as $leavequota)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $leavequota->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('leavequota.toggle', $leavequota->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $leavequota->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $leavequota->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-leavequota-edit-{{ $leavequota->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-leavequota-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-leavequota-id="{{ $leavequota->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-leavequota-form-{{ $leavequota->id }}"
                                                                  action="{{ route('leavequota.destroy', $leavequota->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.leavequota.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'leaveduration' ? 'show active' : '' }}" id="leaveduration-nobd" role="tabpanel" aria-labelledby="leaveduration-tab-nobd">
                        @include('admin.system-configuration.additional-setup.leaveduration.create-modal')
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i>Leave Duration</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-leaveduration">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Leave Duration</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Leave Duration</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($leavedurations as $leaveduration)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $leaveduration->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('leaveduration.toggle', $leaveduration->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $leaveduration->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $leaveduration->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-leaveduration-edit-{{ $leaveduration->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-leaveduration-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-leaveduration-id="{{ $leaveduration->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-leaveduration-form-{{ $leaveduration->id }}"
                                                                  action="{{ route('leaveduration.destroy', $leaveduration->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.leaveduration.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'notificationperiod' ? 'show active' : '' }}" id="notificationperiod-nobd" role="tabpanel" aria-labelledby="notificationperiod-tab-nobd">
                        @include('admin.system-configuration.additional-setup.notificationperiod.create-modal')
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i>Notification Period</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-notificationperiod">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Notification Period</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Notification Period</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($notificationperiods as $notificationperiod)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $notificationperiod->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('notificationperiod.toggle', $notificationperiod->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $notificationperiod->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $notificationperiod->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-notificationperiod-edit-{{ $notificationperiod->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-notificationperiod-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-notificationperiod-id="{{ $notificationperiod->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-notificationperiod-form-{{ $notificationperiod->id }}"
                                                                  action="{{ route('notificationperiod.destroy', $notificationperiod->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.notificationperiod.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'carryforwardlimit' ? 'show active' : '' }}" id="carryforwardlimit-nobd" role="tabpanel" aria-labelledby="carryforwardlimit-tab-nobd">
                        @include('admin.system-configuration.additional-setup.carryforwardlimit.create-modal')
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i>Bank Setup</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-carryforwardlimit">
                                      <i class='bx bx-message-square-add bx-tada' ></i> Add Bank</a>
                               </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                  <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                     <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                   <tr role="row">
                                                      <th class="text-center">Sl</th>
                                                      <th class="text-start">Bank</th>
                                                      <th class="text-center">Status</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($carryforwardlimits as $carryforwardlimit)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                      <td class="text-start">{{ $carryforwardlimit->name }}</td>
                                                      <td class="text-center">
                                                          <form action="{{ route('carryforwardlimit.toggle', $carryforwardlimit->id) }}" method="POST" style="display: inline;">
                                                              @csrf
                                                              <button type="submit" class="btn {{ $carryforwardlimit->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                  {{ $carryforwardlimit->status == 1 ? 'Active' : 'Inactive' }}
                                                              </button>
                                                          </form>
                                                      </td>
                                                      <td class="text-center">
                                                         <div class="form-button-action">
                                                              <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal" data-bs-target="#Modal-carryforwardlimit-edit-{{ $carryforwardlimit->id }}">
                                                              <i class='bx bxs-edit bx-tada' ></i> </button>

                                                              <a href="#" id="delete-carryforwardlimit-link" title="delete"
                                                                  class="btn btn-link btn-danger btn-lg"
                                                                  data-carryforwardlimit-id="{{ $carryforwardlimit->id }}">
                                                                  <i class='bx bx-trash-alt'></i>
                                                              </a>

                                                              <form id="delete-carryforwardlimit-form-{{ $carryforwardlimit->id }}"
                                                                  action="{{ route('carryforwardlimit.destroy', $carryforwardlimit->id) }}"
                                                                  method="POST" style="display: none;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                              </form>
                                                         </div>
                                                      </td>
                                                      @include('admin.system-configuration.additional-setup.carryforwardlimit.edit-modal')
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                        </div>
                                     </div>

                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection
@push('scripts')
{{-- sweat alert for multiple crud using funtion--}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function handleDelete(deleteLink, entityType) {
            const entityId = deleteLink.getAttribute(`data-${entityType}-id`);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this action!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-secondary'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-${entityType}-form-${entityId}`).submit();
                }
            });
        }
        const deleteLinks = document.querySelectorAll('[id^="delete-"]');

        deleteLinks.forEach(function(deleteLink) {
            deleteLink.addEventListener('click', function(e) {
                e.preventDefault();
                const entityType = deleteLink.id.split('-')[1];
                handleDelete(deleteLink, entityType);
            });
        });
    });
</script>

@endpush
