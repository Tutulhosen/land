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
{{-- @dd(session('activeTab')); --}}
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
                    <a class="nav-link {{ session('activeTab') == 'sector' || !session('activeTab') ? 'active' : '' }}" id="project-type-tab-nobd" data-bs-toggle="pill" href="#project-type-nobd" role="tab" aria-controls="project-type-nobd" aria-selected="false" tabindex="-1">Sector Setup</a>

                    <a class="nav-link {{ session('activeTab') == 'block' ? 'active' : '' }}" id="block-tab-nobd" data-bs-toggle="pill" href="#block-nobd" role="tab" aria-controls="block-nobd" aria-selected="true">Block Setup</a>

                    <a class="nav-link {{ session('activeTab') == 'road' ? 'active' : '' }}" id="block-tab-nobd" data-bs-toggle="pill" href="#road-nobd" role="tab" aria-controls="road-nobd" aria-selected="true">Road Setup</a>

                    <a class="nav-link {{ session('activeTab') == 'agency' ? 'active' : '' }}" id="agency-tab-nobd" data-bs-toggle="pill" href="#agency-nobd" role="tab" aria-controls="agency-nobd" aria-selected="true">Agency Setup</a>

                    <a class="nav-link {{ session('activeTab') == 'salesman' ? 'active' : '' }}" id="salesman-tab-nobd" data-bs-toggle="pill" href="#salesman-nobd" role="tab" aria-controls="salesman-nobd" aria-selected="true">Salesman Setup</a>

                    <a class="nav-link {{ session('activeTab') == 'plot_type' ? 'active' : '' }}" id="plot_type-tab-nobd" data-bs-toggle="pill" href="#plot_type-nobd" role="tab" aria-controls="plot_type-nobd" aria-selected="true">Plot Type Setup</a>

                    <a class="nav-link {{ session('activeTab') == 'plot_size' ? 'active' : '' }}" id="plot_size-tab-nobd" data-bs-toggle="pill" href="#plot_size-nobd" role="tab" aria-controls="plot_size-nobd" aria-selected="true">Plot Size Setup</a>

                    <a class="nav-link {{ session('activeTab') == 'plot_price' ? 'active' : '' }}" id="plot_price-tab-nobd" data-bs-toggle="pill" href="#plot_price-nobd" role="tab" aria-controls="plot_price-nobd" aria-selected="true">Plot Price Setup</a>

                </div>
              </div>
           </div>
        </div>
        <div class="col-md-9">
           <div class="tab-content" id="v-pills-without-border-tabContent">
              
              
             {{-- sector --}}
              <div class="tab-pane fade {{ session('activeTab') == 'sector' || !session('activeTab') ? 'active show' : '' }}" id="project-type-nobd" role="tabpanel" aria-labelledby="project-type-tab-nobd">
                @include('admin.system-configuration.project.sector.create-modal')
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

                                     @foreach($sectors as $index => $sector)
                                        <tr>
                                            <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                {{ $sector->project->name }}
                                            </td>

                                            <td class="text-center">
                                                {{ $sector->sector_name }}
                                            </td>
                                  
                                     
                                           

                                            <td class="text-center">
                                                @can('Update Branch')
                                                <form action="{{ route('sector.toggle', $sector->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn {{ $sector->is_active == 1 ? 'status-box-1' : 'status-box-2' }} toggle-status">
                                                        {{ $sector->is_active == 1 ? 'Active' : 'Inactive' }}
                                                    </button>
                                                </form>
                                                @endcan
                                            </td>
                                            <td class="text-center">
                                                <div class="form-button-action">
                                                    @can('Update Branch')
                                                    <button class="btn btn-primary btn-link btn-lg" data-bs-toggle="modal" data-bs-target="#editModalgrid-branch-{{ $sector->id }}">
                                                        <i class='bx bxs-edit bx-tada'></i>
                                                    </button>
                                                    @endcan
                                                    @can('Update Branch')
                                                        <a href="#" id="delete-branch-link" title="delete"
                                                        class="btn btn-link btn-danger btn-lg"
                                                        data-branch-id="{{ $sector->id }}">
                                                        <i class='bx bx-trash-alt'></i>
                                                    </a>
                                                    @endcan

                                                    <form id="delete-branch-form-{{ $sector->id }}"
                                                        action="{{ route('sector.destroy', $sector->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    {{-- @can('Update Branch')
                                                    <button class="btn btn-success btn-link btn-lg" data-bs-toggle="modal" data-bs-target="#zone_assign_modal-{{ $sector->id }}">
                                                        <i class='bx bx-message-square-add bx-tada'></i>
                                                    </button>
                                                    @endcan --}}
                                                </div>
                                            </td>
                                            {{-- @include('admin.system-configuration.branch.zone-assign-modal') --}}
                                            @include('admin.system-configuration.project.sector.edit-modal')
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

             {{-- block  --}}
             <div class="tab-pane fade {{ session('activeTab') == 'block' ? 'active show' : ''}}" id="block-nobd" role="tabpanel" aria-labelledby="block-tab-nobd">
                @include('admin.system-configuration.project.block.create-modal')
                <div class="card">
                   <div class="card-header project-details-card-header">
                      <div class="d-flex align-items-center">
                         <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Block</h4>
                         <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-block-nobd">
                             <i class='bx bx-message-square-add bx-tada' ></i> Add Block</a>
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
                                         <th class="text-center w-20">Sector Name</th>
                                         <th class="text-start">Block Name</th>
                                         <th class="text-center">Status</th>
                                         <th class="text-center">Action</th>
                                      </tr>
                                   </thead>
                                   <tbody>

                                     @foreach($blocks as $index => $block)
                                        <tr>
                                            <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                {{ $block->sector->sector_name ?? ' '}}
                                            </td>

                                            <td class="text-center">
                                                {{ $block->block_name }}
                                            </td>
                                  
                                     
                                           

                                            <td class="text-center">
                                                @can('Update Branch')
                                                <form action="{{ route('block.toggle', $block->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn {{ $block->status == 1 ? 'status-box-1' : 'status-box-2' }} toggle-status">
                                                        {{ $block->status == 1 ? 'Active' : 'Inactive' }}
                                                    </button>
                                                </form>
                                                @endcan
                                            </td>
                                            <td class="text-center">
                                                <div class="form-button-action">
                                                    @can('Update Branch')
                                                    <button class="btn btn-primary btn-link btn-lg" data-bs-toggle="modal" data-bs-target="#editModalgrid-block-{{ $block->id }}">
                                                        <i class='bx bxs-edit bx-tada'></i>
                                                    </button>
                                                    @endcan
                                                    @can('Update Branch')
                                                        <a href="#" id="delete-branch-link" title="delete"
                                                        class="btn btn-link btn-danger btn-lg"
                                                        data-branch-id="{{ $block->id }}">
                                                        <i class='bx bx-trash-alt'></i>
                                                    </a>
                                                    @endcan

                                                    <form id="delete-branch-form-{{ $block->id }}"
                                                        action="{{ route('block.destroy', $block->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    {{-- @can('Update Branch')
                                                    <button class="btn btn-success btn-link btn-lg" data-bs-toggle="modal" data-bs-target="#zone_assign_modal-{{ $sector->id }}">
                                                        <i class='bx bx-message-square-add bx-tada'></i>
                                                    </button>
                                                    @endcan --}}
                                                </div>
                                            </td>
                                            {{-- @include('admin.system-configuration.branch.zone-assign-modal') --}}
                                            @include('admin.system-configuration.project.block.edit-modal')
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

             {{-- road  --}}
             <div class="tab-pane fade {{ session('activeTab') == 'road' ? 'active show' : ''}}" id="road-nobd" role="tabpanel" aria-labelledby="block-tab-nobd">
                @include('admin.system-configuration.project.road.create-modal')
                <div class="card">
                   <div class="card-header project-details-card-header">
                      <div class="d-flex align-items-center">
                         <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Road</h4>
                         <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-road-nobd">
                             <i class='bx bx-message-square-add bx-tada' ></i> Add Road</a>
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
                                         <th class="text-center w-20">Sector Name</th>
                                         <th class="text-start">Block Name</th>
                                         <th class="text-start">Road Name</th>
                                         <th class="text-center">Status</th>
                                         <th class="text-center">Action</th>
                                      </tr>
                                   </thead>
                                   <tbody>

                                     @foreach($roads as $index => $road)
                                        <tr>
                                            <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                {{ $road->sector->sector_name ?? null }}
                                            </td>

                                            <td class="text-center">
                                                {{ $road->block->block_name ?? ' ' }} 
                                            </td>
                                  
                                            <td class="text-center">
                                                {{ $road->road_name }}
                                            </td>
                                           

                                            <td class="text-center">
                                                @can('Update Branch')
                                                <form action="{{ route('road.toggle', $road->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn {{ $road->is_active == 1 ? 'status-box-1' : 'status-box-2' }} toggle-status">
                                                        {{ $road->is_active == 1 ? 'Active' : 'Inactive' }}
                                                    </button>
                                                </form>
                                                @endcan
                                            </td>
                                            <td class="text-center">
                                                <div class="form-button-action">
                                                    @can('Update Branch')
                                                    <button class="btn btn-primary btn-link btn-lg" data-bs-toggle="modal" data-bs-target="#editModalgrid-road-{{ $road->id }}">
                                                        <i class='bx bxs-edit bx-tada'></i>
                                                    </button>
                                                    @endcan
                                                    @can('Update Branch')
                                                        <a href="#" id="delete-branch-link" title="delete"
                                                        class="btn btn-link btn-danger btn-lg"
                                                        data-branch-id="{{ $road->id }}">
                                                        <i class='bx bx-trash-alt'></i>
                                                    </a>
                                                    @endcan

                                                    <form id="delete-branch-form-{{ $road->id }}"
                                                        action="{{ route('road.destroy', $road->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    {{-- @can('Update Branch')
                                                    <button class="btn btn-success btn-link btn-lg" data-bs-toggle="modal" data-bs-target="#zone_assign_modal-{{ $sector->id }}">
                                                        <i class='bx bx-message-square-add bx-tada'></i>
                                                    </button>
                                                    @endcan --}}
                                                </div>
                                            </td>
                                            {{-- @include('admin.system-configuration.branch.zone-assign-modal') --}}
                                            @include('admin.system-configuration.project.road.edit-modal')
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

             {{-- agency  --}}
             <div class="tab-pane fade {{ session('activeTab') == 'agency' ? 'active show' : ''}}" id="agency-nobd" role="tabpanel" aria-labelledby="block-tab-nobd">
                @include('admin.system-configuration.project.agency.create-modal')
                <div class="card">
                   <div class="card-header project-details-card-header">
                      <div class="d-flex align-items-center">
                         <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Agency</h4>
                         <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-agency-nobd">
                             <i class='bx bx-message-square-add bx-tada' ></i> Add Agency</a>
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
                                         <th class="text-start">Agency Name</th>
                                         <th class="text-start">Agency Type</th>
                                         <th class="text-start">Phone</th>
                                         <th class="text-center">Status</th>
                                         <th class="text-center">Action</th>
                                      </tr>
                                   </thead>
                                   <tbody>

                                     @foreach($agencies as $index => $agency)
                                        <tr>
                                            <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                {{ $agency->project->name ?? null }}
                                            </td>

                                            <td class="text-center">
                                                {{ $agency->agency_name ?? ' ' }} 
                                            </td>
                                  
                                            <td class="text-center">
                                                {{ $agency->agency_type ?? ' ' }}
                                            </td>

                                            <td class="text-center">
                                                {{ $agency->phone ?? ' ' }}
                                            </td>
                                           

                                            <td class="text-center">
                                                @can('Update Branch')
                                                <form action="{{ route('agency.toggle', $agency->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn {{ $agency->is_active == 1 ? 'status-box-1' : 'status-box-2' }} toggle-status">
                                                        {{ $agency->is_active == 1 ? 'Active' : 'Inactive' }}
                                                    </button>
                                                </form>
                                                @endcan
                                            </td>
                                            <td class="text-center">
                                                <div class="form-button-action">
                                                    @can('Update Branch')
                                                    <button class="btn btn-primary btn-link btn-lg" data-bs-toggle="modal" data-bs-target="#editModalgrid-agency-{{ $agency->id }}">
                                                        <i class='bx bxs-edit bx-tada'></i>
                                                    </button>
                                                    @endcan
                                                    @can('Update Branch')
                                                        <a href="#" id="delete-branch-link" title="delete"
                                                        class="btn btn-link btn-danger btn-lg"
                                                        data-branch-id="{{ $agency->id }}">
                                                        <i class='bx bx-trash-alt'></i>
                                                    </a>
                                                    @endcan

                                                    <form id="delete-branch-form-{{ $agency->id }}"
                                                        action="{{ route('agency.destroy', $agency->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                              
                                                </div>
                                            </td>
                                            {{-- @include('admin.system-configuration.branch.zone-assign-modal') --}}
                                            @include('admin.system-configuration.project.agency.edit-modal')
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

             {{-- salesman  --}}
             <div class="tab-pane fade {{ session('activeTab') == 'salesman' ? 'active show' : ''}}" id="salesman-nobd" role="tabpanel" aria-labelledby="block-tab-nobd">
                @include('admin.system-configuration.project.salesman.create-modal')
                <div class="card">
                   <div class="card-header project-details-card-header">
                      <div class="d-flex align-items-center">
                         <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Salesman</h4>
                         <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-salesman-nobd">
                             <i class='bx bx-message-square-add bx-tada' ></i> Add Salesman</a>
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
                                         <th class="text-start">Agency Name</th>
                                         <th class="text-start">Salesman Name</th>
                                         <th class="text-start">Phone</th>
                                         <th class="text-center">Status</th>
                                         <th class="text-center">Action</th>
                                      </tr>
                                   </thead>
                                   <tbody>

                                     @foreach($salesmen as $index => $salesman)
                                        <tr>
                                            <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                {{ $salesman->agency->agency_name ?? null }}
                                            </td>

                                            <td class="text-center">
                                                {{ $salesman->salesman_name ?? ' ' }} 
                                            </td>
                                  
                        

                                            <td class="text-center">
                                                {{ $salesman->phone ?? ' ' }}
                                            </td>
                                           

                                            <td class="text-center">
                                                @can('Update Branch')
                                                <form action="{{ route('salesman.toggle', $salesman->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn {{ $salesman->is_active == 1 ? 'status-box-1' : 'status-box-2' }} toggle-status">
                                                        {{ $salesman->is_active == 1 ? 'Active' : 'Inactive' }}
                                                    </button>
                                                </form>
                                                @endcan
                                            </td>
                                            <td class="text-center">
                                                <div class="form-button-action">
                                                    @can('Update Branch')
                                                    <button class="btn btn-primary btn-link btn-lg" data-bs-toggle="modal" data-bs-target="#editModalgrid-salesman-{{ $salesman->id }}">
                                                        <i class='bx bxs-edit bx-tada'></i>
                                                    </button>
                                                    @endcan
                                                    @can('Update Branch')
                                                        <a href="#" id="delete-branch-link" title="delete"
                                                        class="btn btn-link btn-danger btn-lg"
                                                        data-branch-id="{{ $salesman->id }}">
                                                        <i class='bx bx-trash-alt'></i>
                                                    </a>
                                                    @endcan

                                                    <form id="delete-branch-form-{{ $salesman->id }}"
                                                        action="{{ route('salesman.destroy', $salesman->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                              
                                                </div>
                                            </td>
                                            {{-- @include('admin.system-configuration.branch.zone-assign-modal') --}}
                                            @include('admin.system-configuration.project.salesman.edit-modal')
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

             {{-- plot_type  --}}
             <div class="tab-pane fade {{ session('activeTab') == 'plot_type' ? 'active show' : ''}}" id="plot_type-nobd" role="tabpanel" aria-labelledby="plot_type-tab-nobd">
                @include('admin.system-configuration.project.plot_type.create-modal')
                <div class="card">
                   <div class="card-header project-details-card-header">
                      <div class="d-flex align-items-center">
                         <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Plot Type</h4>
                         <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-plot_type-nobd">
                             <i class='bx bx-message-square-add bx-tada' ></i> Add Plot Type</a>
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
                                         <th class="text-center w-20"> Name</th>
                                         <th class="text-center">Status</th>
                                         <th class="text-center">Action</th>
                                      </tr>
                                   </thead>
                                   <tbody>

                                     @foreach($plot_types as $index => $plot_type)
                                        <tr>
                                            <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                   

                                            <td class="text-center">
                                                {{ $plot_type->name ?? null }}
                                            </td>
                                  
                                           

                                            <td class="text-center">
                                                @can('Update Branch')
                                                <form action="{{ route('plot_type.toggle', $plot_type->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn {{ $plot_type->is_active == 1 ? 'status-box-1' : 'status-box-2' }} toggle-status">
                                                        {{ $plot_type->is_active == 1 ? 'Active' : 'Inactive' }}
                                                    </button>
                                                </form>
                                                @endcan
                                            </td>
                                            <td class="text-center">
                                                <div class="form-button-action">
                                                    @can('Update Branch')
                                                    <button class="btn btn-primary btn-link btn-lg" data-bs-toggle="modal" data-bs-target="#editModalgrid-plot_type-{{ $plot_type->id }}">
                                                        <i class='bx bxs-edit bx-tada'></i>
                                                    </button>
                                                    @endcan
                                                    @can('Update Branch')
                                                        <a href="#" id="delete-branch-link" title="delete"
                                                        class="btn btn-link btn-danger btn-lg"
                                                        data-branch-id="{{ $plot_type->id }}">
                                                        <i class='bx bx-trash-alt'></i>
                                                    </a>
                                                    @endcan

                                                    <form id="delete-branch-form-{{ $plot_type->id }}"
                                                        action="{{ route('plot_type.destroy', $plot_type->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                              
                                                </div>
                                            </td>
                                            {{-- @include('admin.system-configuration.branch.zone-assign-modal') --}}
                                            @include('admin.system-configuration.project.plot_type.edit-modal')
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

             {{-- plot_size  --}}
             <div class="tab-pane fade {{ session('activeTab') == 'plot_size' ? 'active show' : ''}}" id="plot_size-nobd" role="tabpanel" aria-labelledby="plot_size-tab-nobd">
                @include('admin.system-configuration.project.plot_size.create-modal')
                <div class="card">
                   <div class="card-header project-details-card-header">
                      <div class="d-flex align-items-center">
                         <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Plot Type</h4>
                         <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-plot_size-nobd">
                             <i class='bx bx-message-square-add bx-tada' ></i> Add Plot Size</a>
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
                                         <th class="text-center w-20"> Plot Type Name</th>
                                         <th class="text-center w-20"> Plot Size Name</th>
                                         <th class="text-center">Status</th>
                                         <th class="text-center">Action</th>
                                      </tr>
                                   </thead>
                                   <tbody>

                                     @foreach($plot_sizes as $index => $plot_size)
                                        <tr>
                                            <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                   

                                            <td class="text-center">
                                                {{ $plot_size->plot_type->name ?? null }}
                                            </td>

                                            <td class="text-center">
                                                {{ $plot_size->size_name ?? null }}
                                            </td>
                                  
                                           

                                            <td class="text-center">
                                                @can('Update Branch')
                                                <form action="{{ route('plot_size.toggle', $plot_size->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn {{ $plot_size->is_active == 1 ? 'status-box-1' : 'status-box-2' }} toggle-status">
                                                        {{ $plot_size->is_active == 1 ? 'Active' : 'Inactive' }}
                                                    </button>
                                                </form>
                                                @endcan
                                            </td>
                                            <td class="text-center">
                                                <div class="form-button-action">
                                                    @can('Update Branch')
                                                    <button class="btn btn-primary btn-link btn-lg" data-bs-toggle="modal" data-bs-target="#editModalgrid-plot_size-{{ $plot_size->id }}">
                                                        <i class='bx bxs-edit bx-tada'></i>
                                                    </button>
                                                    @endcan
                                                    @can('Update Branch')
                                                        <a href="#" id="delete-branch-link" title="delete"
                                                        class="btn btn-link btn-danger btn-lg"
                                                        data-branch-id="{{ $plot_size->id }}">
                                                        <i class='bx bx-trash-alt'></i>
                                                    </a>
                                                    @endcan

                                                    <form id="delete-branch-form-{{ $plot_size->id }}"
                                                        action="{{ route('plot_size.destroy', $plot_size->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                              
                                                </div>
                                            </td>
                                            {{-- @include('admin.system-configuration.branch.zone-assign-modal') --}}
                                            @include('admin.system-configuration.project.plot_size.edit-modal')
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

             {{-- plot_price  --}}
             <div class="tab-pane fade {{ session('activeTab') == 'plot_price' ? 'active show' : ''}}" id="plot_price-nobd" role="tabpanel" aria-labelledby="plot_price-tab-nobd">
                @include('admin.system-configuration.project.plot_price.create-modal')
                <div class="card">
                   <div class="card-header project-details-card-header">
                      <div class="d-flex align-items-center">
                         <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Plot Price</h4>
                         <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-plot_price-nobd">
                             <i class='bx bx-message-square-add bx-tada' ></i> Add Plot Price</a>
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
                                         <th class="text-center w-20"> Plot Type Name</th>
                                         <th class="text-center w-20"> Plot Size Name</th>
                                         <th class="text-center w-20"> Plot Price</th>
                                         <th class="text-center">Status</th>
                                         <th class="text-center">Action</th>
                                      </tr>
                                   </thead>
                                   <tbody>

                                     @foreach($plot_prices as $index => $plot_price)
                                        <tr>
                                            <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                   

                                            <td class="text-center">
                                                {{ $plot_price->plot_type->name ?? null }}
                                            </td>

                                            <td class="text-center">
                                                {{ $plot_price->plot_size->size_name ?? null }}
                                            </td>

                                            <td class="text-center">
                                                {{ $plot_price->plot_price ?? null }}
                                            </td>
                                  
                                           

                                            <td class="text-center">
                                                @can('Update Branch')
                                                <form action="{{ route('plot_price.toggle', $plot_price->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn {{ $plot_price->is_active == 1 ? 'status-box-1' : 'status-box-2' }} toggle-status">
                                                        {{ $plot_price->is_active == 1 ? 'Active' : 'Inactive' }}
                                                    </button>
                                                </form>
                                                @endcan
                                            </td>
                                            <td class="text-center">
                                                <div class="form-button-action">
                                                    @can('Update Branch')
                                                    <button class="btn btn-primary btn-link btn-lg" data-bs-toggle="modal" data-bs-target="#editModalgrid-plot_price-{{ $plot_price->id }}">
                                                        <i class='bx bxs-edit bx-tada'></i>
                                                    </button>
                                                    @endcan
                                                    @can('Update Branch')
                                                        <a href="#" id="delete-plot_price-link" title="delete"
                                                        class="btn btn-link btn-danger btn-lg"
                                                        data-plot_price-id="{{ $plot_price->id }}">
                                                        <i class='bx bx-trash-alt'></i>
                                                    </a>
                                                    @endcan

                                                    <form id="delete-plot_price-form-{{ $plot_price->id }}"
                                                        action="{{ route('plot_price.destroy', $plot_price->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                              
                                                </div>
                                            </td>
                                            {{-- @include('admin.system-configuration.branch.zone-assign-modal') --}}
                                            @include('admin.system-configuration.project.plot_price.edit-modal')
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
    @endcan
    </div>
 </div>
@endsection
@push('scripts')
{{-- sweat alert for multiple crud using funtion--}}
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
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

        $('.sector_for_road').on('change', function () {
            var sectorId = $(this).val();
            if (sectorId) {
                $.ajax({
                    url: "{{ url('/dashboard/get_block_by_sector') }}/" + sectorId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('.block').empty();
                        $('.block').append('<option value="">--select Block--</option>');
                        $.each(data, function (key, value) {
                            $('.block').append('<option value="' + value.id + '">' + value.block_name + '</option>');
                        });
                    }
                });
            } else {
                $('.block').empty();
                $('.block').append('<option value="">--select Block--</option>');
            }
        });

        $('.sector_for_road_edit').on('change', function () {
            // alert('gf');
            var sectorId = $(this).val();
         
            if (sectorId) {
                $.ajax({
                    url: "{{ url('/dashboard/get_block_by_sector') }}/" + sectorId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('.block_edit').empty();
                        $('.block_edit').append('<option value="">--select Block--</option>');
                        $.each(data, function (key, value) {
                            $('.block_edit').append('<option value="' + value.id + '">' + value.block_name + '</option>');
                        });
                    }
                });
            } else {
                $('.block_edit').empty();
                $('.block_edit').append('<option value="">--select Block--</option>');
            }
        });

        $('.plot_type').on('change', function () {
    
            var sectorId = $(this).val();
            if (sectorId) {
                $.ajax({
                    url: "{{ url('/dashboard/get_plot_size_by_plot') }}/" + sectorId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('.plot_size').empty();
                        $('.plot_size').append('<option value="">--select Plot Size--</option>');
                        $.each(data, function (key, value) {
                            $('.plot_size').append('<option value="' + value.id + '">' + value.size_name + '</option>');
                        });
                    }
                });
            } else {
                $('.plot_size').empty();
                $('.plot_size').append('<option value="">--select Plot Size--</option>');
            }
        });

        $('.plot_type_edit').on('change', function () {
            // alert('gf');
            var sectorId = $(this).val();
         
            if (sectorId) {
                $.ajax({
                    url: "{{ url('/dashboard/get_plot_size_by_plot') }}/" + sectorId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('.plot_size_edit').empty();
                        $('.plot_size_edit').append('<option value="">--select Plot Size--</option>');
                        $.each(data, function (key, value) {
                            $('.plot_size_edit').append('<option value="' + value.id + '">' + value.size_name + '</option>');
                        });
                    }
                });
            } else {
                $('.plot_size_edit').empty();
                $('.plot_size_edit').append('<option value="">--select Plot Size--</option>');
            }
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


