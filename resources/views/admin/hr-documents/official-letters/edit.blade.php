@extends('layouts.admin')
@section('title','Employees Edit')
@section('content')
</div>
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-5">
                <div class="card card-round">
                    <div class="card-header project-details-card-header">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pb-2">
                            <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada'></i> Letter
                                Details</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="email2">Letter Type</label>
                                        <input type="text" class="form-control custom-input" id="email2"
                                            placeholder="Account Name">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="email2">Employees</label>
                                        <select class="form-select form-control custom-input" id="defaultSelect"
                                            placeholder="Expense Category">
                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="soft-bg-3 row">
                                <h5 class="module-title-m">Adjust space setting (in pixel)</h5>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="email2">Left</label>
                                        <input type="text" class="form-control custom-input" id="email2" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="email2">Right</label>
                                        <input type="text" class="form-control custom-input" id="email2" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="email2">Top</label>
                                        <input type="text" class="form-control custom-input" id="email2" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="email2">Bottom</label>
                                        <input type="text" class="form-control custom-input" id="email2" placeholder="">
                                    </div>
                                </div>
                            </div>

                        </form>
                        <div class="row p-20">
                            <div class="col-12">
                                <h4 class="pl-2 mb-2 f-18 font-weight-normal text-capitalize">
                                    Available Variables :
                                </h4>
                            </div>
                            <div class="col-md-6">
                                <p><i class='bx bxs-copy' data-bs-toggle="tooltip" data-bs-title="Click to Copy"></i>
                                    #EMPLOYEE_JOINING_DATE</p>
                            </div>
                            <div class="col-md-6">
                                <p><i class='bx bxs-copy' data-bs-toggle="tooltip" data-bs-title="Click to Copy"></i>
                                    #EMPLOYEE_JOINING_DATE</p>
                            </div>
                            <div class="col-md-6">
                                <p><i class='bx bxs-copy' data-bs-toggle="tooltip" data-bs-title="Click to Copy"></i>
                                    #EMPLOYEE_JOINING_DATE</p>
                            </div>
                            <div class="col-md-6">
                                <p><i class='bx bxs-copy' data-bs-toggle="tooltip" data-bs-title="Click to Copy"></i>
                                    #EMPLOYEE_JOINING_DATE</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card card-round">
                    <div class="card-header project-details-card-header">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pb-2">
                            <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada'></i> Preview
                                Letter</h4>
                        </div>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

@endpush
