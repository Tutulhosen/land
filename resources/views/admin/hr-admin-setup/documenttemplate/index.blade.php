@extends('layouts.admin')
@section('title','documenttemplate')
@section('content')
<style>
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
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header project-details-card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada'></i> Document Templates
                            </h4>
                            @can('Create DocumentTemplate')
                            <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal"
                                data-bs-target="#addRowModal-documenttemplates"><i
                                    class='bx bx-message-square-add bx-tada'></i> Create New Document Template</a>
                            @include('admin.hr-admin-setup.documenttemplate.create-modal')
                            @endcan
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @can('View DocumentTemplate')
                                        <table class="display table table-striped table-hover basic-datatables" role="grid"
                                            aria-describedby="add-row_info">
                                            <thead class="">
                                                <tr role="row">
                                                    <th>Sl</th>
                                                    <th style="width:15%;">Template Name</th>
                                                    <th>Template</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($documenttemplates as $documenttemplate)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{$loop->iteration}}</td>
                                                    <td>{{ $documenttemplate->documenttemplate_name }}</td>
                                                    @php
                                                        $plainContent = strip_tags($documenttemplate->template);
                                                        $decodedContent = html_entity_decode($plainContent, ENT_QUOTES, 'UTF-8');
                                                    @endphp
                                                    <td>
                                                        <div class="template-preview">
                                                            <div class="template-content short">
                                                                {!! nl2br(e(Str::limit($decodedContent, 100))) !!}
                                                            </div>
                                                            <div class="template-content full" style="display: none;">
                                                                {!! nl2br(e($decodedContent)) !!}
                                                            </div>
                                                            @if (strlen($decodedContent) > 100)
                                                                <a href="javascript:void(0);" class="see-more">See More</a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @can('Update DocumentTemplate')
                                                        <form action="{{ route('documenttemplate.toggle', $documenttemplate->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            <button type="submit" class="btn {{ $documenttemplate->status == 1 ? 'status-box-1' : 'status-box-2' }} toggle-status"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-custom-class="custom-tooltip"
                                                                data-bs-title="Click to change Status">
                                                                {{ $documenttemplate->status == 1 ? 'Active' : 'Inactive' }}
                                                            </button>
                                                        </form>
                                                        @endcan
                                                    </td>
                                                    <td>
                                                        <div class="form-button-action">

                                                            @can('Update DocumentTemplate')
                                                            <span data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-custom-class="custom-tooltip"
                                                                data-bs-title="Edit">
                                                                <button type="button" data-bs-toggle="modal"
                                                                    data-bs-target="#editRowModal-documenttemplate-{{ $documenttemplate->id }}"
                                                                    title="" class="btn btn-link btn-success btn-lg" >
                                                                    <i class='bx bxs-edit'></i>
                                                                </button>
                                                            </span>
                                                            @endcan


                                                            @can('Delete DocumentTemplate')
                                                            <a href="#" id="delete-documenttemplate-link" title="delete"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-custom-class="custom-tooltip"
                                                                data-bs-title="Delete"
                                                                class="btn btn-link btn-danger btn-lg"
                                                                data-documenttemplate-id="{{ $documenttemplate->id }}">
                                                                <i class='bx bx-trash-alt'></i>
                                                            </a>
                                                            @endcan

                                                            <form id="delete-documenttemplate-form-{{ $documenttemplate->id }}"
                                                                action="{{ route('documenttemplate.destroy', $documenttemplate->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>

                                                        </div>
                                                    </td>
                                                    @include('admin.hr-admin-setup.documenttemplate.edit-modal')
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @endcan
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

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.see-more').forEach(function (link) {
            link.addEventListener('click', function () {
                const container = this.closest('.template-preview');
                const shortContent = container.querySelector('.short');
                const fullContent = container.querySelector('.full');

                if (fullContent.style.display === 'none') {
                    fullContent.style.display = 'block';
                    shortContent.style.display = 'none';
                    this.textContent = 'Show Less';
                } else {
                    fullContent.style.display = 'none';
                    shortContent.style.display = 'block';
                    this.textContent = 'See More';
                }
            });
        });
    });

    // Use event delegation to handle click events for all delete buttons
    document.addEventListener('DOMContentLoaded', function() {
        const deleteLinks = document.querySelectorAll('[id^="delete-documenttemplate-link"]');

        deleteLinks.forEach(function(deleteLink) {
            deleteLink.addEventListener('click', function(e) {
                e.preventDefault();
                const documenttemplateId = this.getAttribute('data-documenttemplate-id');
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
                        // If confirmed, find the form and submit it
                        document.getElementById('delete-documenttemplate-form-' + documenttemplateId).submit();
                    }
                });
            });
        });
    });
</script>
@endpush
