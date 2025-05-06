@extends('layouts.admin')
@section('title','Branches')
@push('styles')
<style>
    .select2-dropdown {
        z-index: 99999 !important;
    }
    .status-box-2 {
        font-size: 11px;
        font-weight: 300;
        color: #686D76 !important;
        background: #F0DCDC;
        background-color: rgb(240, 220, 220);
        padding: 3px 10px;
        line-height: 11px;
    }
</style>
@endpush
@section('content')
<div class="container">
    <div class="page-inner">
       <div class="row">
           <div class="col-md-12">
               <div class="card">
                    <div class="card-header project-details-card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Project Information</h4>
                            {{-- @can('Create Branch')
                            <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModalgrid-leads">
                            <i class='bx bx-message-square-add bx-tada' ></i> Add New</a>
                            @endcan --}}
                            {{-- @include('admin.system-configuration.branch.create-modal') --}}
                        </div>
                    </div>
                </div>
            </div>
       </div>
       @can('View Branch')
       <div class="row">
        <div class="col-md-3">
           <div class="card">
              {{-- <div class="card-header project-details-card-header">
                 <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Branches</h4>
              </div> --}}
              <div class="card-body">
                <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd" id="v-pills-tab-without-border" role="tablist" aria-orientation="vertical">
                    <a class="nav-link {{ session('activeTab') == 'regional_office' || !session('activeTab') ? 'active' : '' }}" id="project-type-tab-nobd" data-bs-toggle="pill" href="#project-type-nobd" role="tab" aria-controls="project-type-nobd" aria-selected="false" tabindex="-1">Sector Setup</a>
                    <a class="nav-link {{ session('activeTab') == 'zonal_office' ? 'active' : '' }}" id="product-category-tab-nobd" data-bs-toggle="pill" href="#product-category-nobd" role="tab" aria-controls="product-category-nobd" aria-selected="true">Block Setup</a>
                    <a class="nav-link {{ session('activeTab') == 'area_office' ? 'active' : '' }}" id="industry-type-tab-nobd" data-bs-toggle="pill" href="#industry-type-nobd" role="tab" aria-controls="industry-type-nobd" aria-selected="false" tabindex="-1">Road Setup</a>
                    <a class="nav-link {{ session('activeTab') == 'branch_office' ? 'active' : '' }}" id="client-type-tab-nobd" data-bs-toggle="pill" href="#client-type-nobd" role="tab" aria-controls="client-type-nobd" aria-selected="false" tabindex="-1">Agency Setup</a>
                    <a class="nav-link {{ session('activeTab') == 'liaison_office' ? 'active' : '' }}" id="liaison-type-tab-nobd" data-bs-toggle="pill" href="#liaison-type-nobd" role="tab" aria-controls="liaison-type-nobd" aria-selected="false" tabindex="-1">Salesman Setup</a>
                </div>
              </div>
           </div>
        </div>
        <div class="col-md-9">
           <div class="tab-content" id="v-pills-without-border-tabContent">
              
              

              <div class="tab-pane fade {{ session('activeTab') == 'regional_office' || !session('activeTab') ? 'active show' : '' }}" id="project-type-nobd" role="tabpanel" aria-labelledby="project-type-tab-nobd">
                @include('admin.system-configuration.additional-setup.client-type.create-modal')
                <div class="card">
                   <div class="card-header project-details-card-header">
                      <div class="d-flex align-items-center">
                         <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Sector</h4>
                         <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-client-type">
                             <i class='bx bx-message-square-add bx-tada' ></i> Add Sector</a>
                      </div>
                   </div>
                   <div class="card-body">
                    <div class="table-responsive">
                       <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                          <div class="row">
                             <div class="col-sm-12">
                                <table id="add-row" class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                   <thead class="">
                                      <tr role="row">
                                         <th class="text-center">Sl</th>
                                         <th class="text-center w-20">Project Name</th>
                                         <th class="text-start">Sector Name</th>
                                         <th class="text-center">Status</th>
                                         <th class="text-center">Action</th>
                                      </tr>
                                   </thead>
                                   <tbody>


                                   </tbody>
                                </table>
                             </div>
                          </div>

                       </div>
                    </div>
                 </div>
                </div>
             </div>
             <div class="tab-pane fade {{ session('activeTab') == 'zonal_office' ? 'active show' : '' }}" id="product-category-nobd" role="tabpanel" aria-labelledby="product-category-tab-nobd">
                <div class="card">
                   <div class="card-body">
                      <div class="table-responsive">
                         <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                               <div class="col-sm-12">
                                  <table id="add-row" class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                     <thead class="">
                                        <tr role="row">
                                           <th class="text-center">Sl</th>
                                           <th class="text-center">Zonal Office</th>
                                           <th class="text-start">Official Info</th>
                                           <th class="text-center">Contact</th>
                                           <th class="text-start">Area Office</th>
                                           <th class="text-center">Status</th>
                                           <th class="text-center">Action</th>
                                        </tr>
                                     </thead>
                                     <tbody>

                                       @foreach($branches as $index => $branch)
                                           @if($branch->type == 'zonal_office') <!-- Check for branch_office type -->
                                               <tr>
                                                   <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                   <td class="text-center">
                                                       {{ $branch->name }} <br/>
                                                       {{ $branch->branch_code }} <br/>
                                                       {{ $branch->address }}
                                                   </td>
                                                   <td class="text-start">
                                                       @if ($branch->opening_date)
                                                       Open Date: {{ \Carbon\Carbon::parse($branch->opening_date)->format('d M Y') }}
                                                       @endif
                                                       <br/>
                                                       @if ($branch->opening_time)
                                                       Open Time: {{ $branch->opening_time }} <br/>
                                                       @endif
                                                       @if ($branch->closing_time)
                                                       Close Time: {{ $branch->closing_time }}
                                                       @endif
                                                   </td>
                                                   <td class="text-center">
                                                       @if ($branch->phone)
                                                       <a href="tel:{{ $branch->phone }}" class="client-info"><i class='bx bx-mobile bx-tada'></i>{{ $branch->phone }}</a><br/>
                                                       @endif
                                                       @if ($branch->landline)
                                                       <a href="tel:{{ $branch->landline }}" class="client-info"><i class='bx bx-phone-outgoing bx-tada'></i>{{ $branch->landline }}</a><br/>
                                                       @endif
                                                       @if ($branch->whatsapp)
                                                       <a href="https://wa.me/{{ $branch->whatsapp }}" class="client-info"><i class='bx bxl-whatsapp bx-tada'></i>{{ $branch->whatsapp }}</a><br/>
                                                       @endif
                                                       @if ($branch->email)
                                                       <a href="mailto:{{ $branch->email }}" class="client-info"><i class='bx bx-mail-send bx-tada'></i>{{ $branch->email }}</a>
                                                       @endif
                                                   </td>
                                                   <td class="text-start">
                                                       <ul>
                                                           @foreach($branch->assignedOffices as $areaBranch)
                                                               <li>
                                                                   {{ $areaBranch->name }}
                                                                   <a href="#" class="delete-assigned-branch-link text-danger float-end"
                                                                       data-assigned-branch-id="{{ $areaBranch->id }}">
                                                                       <i class='bx bx-trash-alt bx-tada'></i>
                                                                   </a>
                                                               </li>
                                                           @endforeach
                                                       </ul>
                                                   </td>
                                                   <td class="text-center">
                                                       @can('Update Branch')
                                                       <form action="{{ route('branch.toggle', $branch->id) }}" method="POST" style="display: inline;">
                                                           @csrf
                                                           <button type="submit" class="btn {{ $branch->status == 1 ? 'status-box-1' : 'status-box-2' }} toggle-status">
                                                               {{ $branch->status == 1 ? 'Active' : 'Inactive' }}
                                                           </button>
                                                       </form>
                                                       @endcan
                                                   </td>
                                                   <td class="text-center">
                                                       <div class="form-button-action">
                                                           @can('Update Branch')
                                                           <button class="btn btn-primary btn-link btn-lg" data-bs-toggle="modal" data-bs-target="#editModalgrid-branch-{{ $branch->id }}">
                                                               <i class='bx bxs-edit bx-tada'></i>
                                                           </button>
                                                           @endcan
                                                           @can('Delete Branch')
                                                               <a href="#" id="delete-branch-link" title="delete"
                                                               class="btn btn-link btn-danger btn-lg"
                                                               data-branch-id="{{ $branch->id }}">
                                                               <i class='bx bx-trash-alt'></i>
                                                           </a>
                                                           @endcan

                                                           <form id="delete-branch-form-{{ $branch->id }}"
                                                               action="{{ route('branch.destroy', $branch->id) }}"
                                                               method="POST" style="display: none;">
                                                               @csrf
                                                               @method('DELETE')
                                                           </form>
                                                           @can('Update Branch')
                                                           <button class="btn btn-success btn-link btn-lg" data-bs-toggle="modal" data-bs-target="#area_assign_modal-{{ $branch->id }}">
                                                               <i class='bx bx-message-square-add bx-tada'></i>
                                                           </button>
                                                           @endcan
                                                       </div>
                                                   </td>
                                                   @include('admin.system-configuration.branch.area-assign-modal')
                                                   @include('admin.system-configuration.branch.edit-modal')
                                               </tr>
                                           @endif

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
            {{-- <div class="tab-pane fade {{ session('activeTab') == 'project-type' ? 'show active' : '' }}" id="project-type-nobd" role="tabpanel" aria-labelledby="project-type-tab-nobd">
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
             </div> --}}


              <div class="tab-pane fade {{ session('activeTab') == 'area_office' ? 'active show' : '' }}" id="industry-type-nobd" role="tabpanel" aria-labelledby="industry-type-tab-nobd">
                 <div class="card">
                    <div class="card-body">
                       <div class="table-responsive">
                          <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                             <div class="row">
                                <div class="col-sm-12">
                                   <table id="add-row" class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                      <thead class="">
                                         <tr role="row">
                                            <th class="text-center">Sl</th>
                                            <th class="text-center">Area Office</th>
                                            <th class="text-start">Official Info</th>
                                            <th class="text-center">Contact</th>
                                            <th class="text-start">Branch Office</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                         </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($branches as $index => $branch)
                                            @if($branch->type == 'area_office') <!-- Check for branch_office type -->
                                                <tr>
                                                    <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                    <td class="text-center">
                                                        {{ $branch->name }} <br/>
                                                        {{ $branch->branch_code }} <br/>
                                                        {{ $branch->address }}
                                                    </td>
                                                    <td class="text-start">
                                                        @if ($branch->opening_date)
                                                        Open Date: {{ \Carbon\Carbon::parse($branch->opening_date)->format('d M Y') }}
                                                        @endif
                                                        <br/>
                                                        @if ($branch->opening_time)
                                                        Open Time: {{ $branch->opening_time }} <br/>
                                                        @endif
                                                        @if ($branch->closing_time)
                                                        Close Time: {{ $branch->closing_time }}
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($branch->phone)
                                                        <a href="tel:{{ $branch->phone }}" class="client-info"><i class='bx bx-mobile bx-tada'></i>{{ $branch->phone }}</a><br/>
                                                        @endif
                                                        @if ($branch->landline)
                                                        <a href="tel:{{ $branch->landline }}" class="client-info"><i class='bx bx-phone-outgoing bx-tada'></i>{{ $branch->landline }}</a><br/>
                                                        @endif
                                                        @if ($branch->whatsapp)
                                                        <a href="https://wa.me/{{ $branch->whatsapp }}" class="client-info"><i class='bx bxl-whatsapp bx-tada'></i>{{ $branch->whatsapp }}</a><br/>
                                                        @endif
                                                        @if ($branch->email)
                                                        <a href="mailto:{{ $branch->email }}" class="client-info"><i class='bx bx-mail-send bx-tada'></i>{{ $branch->email }}</a>
                                                        @endif
                                                    </td>
                                                    <td class="text-start">
                                                        <ul>
                                                            @foreach($branch->assignedOffices as $assignedBranch)
                                                                <li>
                                                                    {{ $assignedBranch->name }}
                                                                    <a href="#" class="delete-assigned-branch-link text-danger float-end"
                                                                        data-assigned-branch-id="{{ $assignedBranch->id }}">
                                                                        <i class='bx bx-trash-alt bx-tada'></i>
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td class="text-center">
                                                        @can("Update Branch")
                                                        <form action="{{ route('branch.toggle', $branch->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            <button type="submit" class="btn {{ $branch->status == 1 ? 'status-box-1' : 'status-box-2' }} toggle-status">
                                                                {{ $branch->status == 1 ? 'Active' : 'Inactive' }}
                                                            </button>
                                                        </form>
                                                        @endcan
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="form-button-action">
                                                            @can('Update Branch')
                                                            <button class="btn btn-primary btn-link btn-lg" data-bs-toggle="modal" data-bs-target="#editModalgrid-branch-{{ $branch->id }}">
                                                                <i class='bx bxs-edit bx-tada'></i>
                                                            </button>
                                                            @endcan
                                                            @can('Delete Branch')
                                                                <a href="#" id="delete-branch-link" title="delete"
                                                                class="btn btn-link btn-danger btn-lg"
                                                                data-branch-id="{{ $branch->id }}">
                                                                <i class='bx bx-trash-alt'></i>
                                                            </a>
                                                            @endcan

                                                            <form id="delete-branch-form-{{ $branch->id }}"
                                                                action="{{ route('branch.destroy', $branch->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                            @can('Update Branch')
                                                            <button class="btn btn-success btn-link btn-lg" data-bs-toggle="modal" data-bs-target="#branch_assign_modal-{{ $branch->id }}">
                                                                <i class='bx bx-message-square-add bx-tada'></i>
                                                            </button>
                                                            @endcan
                                                        </div>
                                                    </td>
                                                    @include('admin.system-configuration.branch.branch-assign-modal')
                                                    @include('admin.system-configuration.branch.edit-modal')
                                                </tr>
                                            @endif
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
              <div class="tab-pane fade {{ session('activeTab') == 'branch_office' ? 'active show' : '' }}" id="client-type-nobd" role="tabpanel" aria-labelledby="client-type-tab-nobd">
                <div class="card">
                   <div class="card-body">
                      <div class="table-responsive">
                         <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                               <div class="col-sm-12">
                                  <table id="add-row" class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                     <thead class="">
                                        <tr role="row">
                                           <th class="text-center">Sl</th>
                                           <th class="text-center">Branch Office</th>
                                           <th class="text-start">Official Info</th>
                                           <th class="text-center">Contact</th>
                                           <th class="text-center">Status</th>
                                           <th class="text-center">Action</th>
                                        </tr>
                                     </thead>
                                     <tbody>

                                       @foreach($branches as $index => $branch)
                                           @if($branch->type == 'branch_office') <!-- Check for branch_office type -->
                                               <tr>
                                                   <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                    <td class="text-center">
                                                        {{ $branch->name }} <br/>
                                                        {{ $branch->branch_code }} <br/>
                                                        {{ $branch->address }}
                                                    </td>
                                                    <td class="text-start">
                                                        @if ($branch->opening_date)
                                                        Open Date: {{ \Carbon\Carbon::parse($branch->opening_date)->format('d M Y') }}
                                                        @endif
                                                        <br/>
                                                        @if ($branch->opening_time)
                                                        Open Time: {{ $branch->opening_time }} <br/>
                                                        @endif
                                                        @if ($branch->closing_time)
                                                        Close Time: {{ $branch->closing_time }}
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($branch->phone)
                                                        <a href="tel:{{ $branch->phone }}" class="client-info"><i class='bx bx-mobile bx-tada'></i>{{ $branch->phone }}</a><br/>
                                                        @endif
                                                        @if ($branch->landline)
                                                        <a href="tel:{{ $branch->landline }}" class="client-info"><i class='bx bx-phone-outgoing bx-tada'></i>{{ $branch->landline }}</a><br/>
                                                        @endif
                                                        @if ($branch->whatsapp)
                                                        <a href="https://wa.me/{{ $branch->whatsapp }}" class="client-info"><i class='bx bxl-whatsapp bx-tada'></i>{{ $branch->whatsapp }}</a><br/>
                                                        @endif
                                                        @if ($branch->email)
                                                        <a href="mailto:{{ $branch->email }}" class="client-info"><i class='bx bx-mail-send bx-tada'></i>{{ $branch->email }}</a>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @can('Update Branch')
                                                        <form action="{{ route('branch.toggle', $branch->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            <button type="submit" class="btn {{ $branch->status == 1 ? 'status-box-1' : 'status-box-2' }} toggle-status">
                                                                {{ $branch->status == 1 ? 'Active' : 'Inactive' }}
                                                            </button>
                                                        </form>
                                                        @endcan
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="form-button-action">
                                                            @can('Update Branch')
                                                            <button class="btn btn-primary btn-link btn-lg" data-bs-toggle="modal" data-bs-target="#editModalgrid-branch-{{ $branch->id }}">
                                                                <i class='bx bxs-edit bx-tada'></i>
                                                            </button>
                                                            @endcan
                                                            @can("Delete Branch")
                                                                <a href="#" id="delete-branch-link" title="delete"
                                                                class="btn btn-link btn-danger btn-lg"
                                                                data-branch-id="{{ $branch->id }}">
                                                                <i class='bx bx-trash-alt'></i>
                                                            </a>
                                                            @endcan

                                                            <form id="delete-branch-form-{{ $branch->id }}"
                                                                action="{{ route('branch.destroy', $branch->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                    </td>
                                                   @include('admin.system-configuration.branch.edit-modal')
                                               </tr>
                                           @endif

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
             <div class="tab-pane fade {{ session('activeTab') == 'liaison_office' ? 'active show' : '' }}" id="liaison-type-nobd" role="tabpanel" aria-labelledby="liaison-type-tab-nobd">
                <div class="card">
                   <div class="card-body">
                      <div class="table-responsive">
                         <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                               <div class="col-sm-12">
                                  <table id="add-row" class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                     <thead class="">
                                        <tr role="row">
                                           <th class="text-center">Sl</th>
                                           <th class="text-center">Liaison Office Name</th>
                                           <th class="text-start">Official Info</th>
                                           <th class="text-center">Contact</th>
                                           <th class="text-center">Status</th>
                                           <th class="text-center">Action</th>
                                        </tr>
                                     </thead>
                                     <tbody>

                                       @foreach($branches as $index => $branch)
                                           @if($branch->type == 'liaison_office') <!-- Check for branch_office type -->
                                               <tr>
                                                   <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                    <td class="text-center">
                                                        {{ $branch->name }} <br/>
                                                        {{ $branch->branch_code }} <br/>
                                                        {{ $branch->address }}
                                                    </td>
                                                    <td class="text-start">
                                                        @if ($branch->opening_date)
                                                        Open Date: {{ \Carbon\Carbon::parse($branch->opening_date)->format('d M Y') }}
                                                        @endif
                                                        <br/>
                                                        @if ($branch->opening_time)
                                                        Open Time: {{ $branch->opening_time }} <br/>
                                                        @endif
                                                        @if ($branch->closing_time)
                                                        Close Time: {{ $branch->closing_time }}
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($branch->phone)
                                                        <a href="tel:{{ $branch->phone }}" class="client-info"><i class='bx bx-mobile bx-tada'></i>{{ $branch->phone }}</a><br/>
                                                        @endif
                                                        @if ($branch->landline)
                                                        <a href="tel:{{ $branch->landline }}" class="client-info"><i class='bx bx-phone-outgoing bx-tada'></i>{{ $branch->landline }}</a><br/>
                                                        @endif
                                                        @if ($branch->whatsapp)
                                                        <a href="https://wa.me/{{ $branch->whatsapp }}" class="client-info"><i class='bx bxl-whatsapp bx-tada'></i>{{ $branch->whatsapp }}</a><br/>
                                                        @endif
                                                        @if ($branch->email)
                                                        <a href="mailto:{{ $branch->email }}" class="client-info"><i class='bx bx-mail-send bx-tada'></i>{{ $branch->email }}</a>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @can('Update Branch')
                                                        <form action="{{ route('branch.toggle', $branch->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            <button type="submit" class="btn {{ $branch->status == 1 ? 'status-box-1' : 'status-box-2' }} toggle-status">
                                                                {{ $branch->status == 1 ? 'Active' : 'Inactive' }}
                                                            </button>
                                                        </form>
                                                        @endcan
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="form-button-action">
                                                            @can('Update Branch')
                                                            <button class="btn btn-primary btn-link btn-lg" data-bs-toggle="modal" data-bs-target="#editModalgrid-branch-{{ $branch->id }}">
                                                                <i class='bx bxs-edit bx-tada'></i>
                                                            </button>
                                                            @endcan
                                                            @can("Delete Branch")
                                                                <a href="#" id="delete-branch-link" title="delete"
                                                                class="btn btn-link btn-danger btn-lg"
                                                                data-branch-id="{{ $branch->id }}">
                                                                <i class='bx bx-trash-alt'></i>
                                                            </a>
                                                            @endcan

                                                            <form id="delete-branch-form-{{ $branch->id }}"
                                                                action="{{ route('branch.destroy', $branch->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                    </td>
                                                   @include('admin.system-configuration.branch.edit-modal')
                                               </tr>
                                           @endif

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
    @endcan
    </div>
 </div>
@endsection
@push('scripts')
{{-- sweat alert for multiple crud using funtion--}}
<script>
    $(document).ready(function () {
        $(".toggle-status").on('click',function (e) {
            e.preventDefault();

            // Submit the form when the switch is toggled
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to change status!",
                icon: '',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-primary'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, find the form and submit it
                    $(this).closest("form").submit();
                }else{
                    Swal.fire("Status is not changed", "", "info");
                }
            });
        });
    });
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


{{-- branch assigned error message --}}
@if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...!',
            text: '{{ session('error') }}',
        });
    </script>
@endif

{{-- assigned branch delete --}}
<script>
$(document).ready(function () {
    $(document).on('click', '.delete-assigned-branch-link', function (e) {
            e.preventDefault(); // Prevent the default link behavior

            const assignedBranchId = $(this).data('assigned-branch-id');
            const deleteUrl = `{{route('assigned-branch.destroy', ':id')}}`.replace(':id', assignedBranchId);
            console.log(deleteUrl);

            //  `/assigned-branch/${assignedBranchId}/delete`; // Update as per your route

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this action!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-info'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: deleteUrl,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for security
                        },
                        success: function (response) {
                            Swal.fire('Deleted!', response.message, 'success');
                            // Remove the deleted row from the DOM
                            $(`a[data-assigned-branch-id="${assignedBranchId}"]`).closest('li').remove();
                        },
                        error: function (xhr) {
                            Swal.fire('Error!', 'Something went wrong.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>
@endpush


