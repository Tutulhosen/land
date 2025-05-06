@extends('layouts.admin')
@section('title','Announcement')
@push('styles')
<style>
    .select2-dropdown {
        z-index: 99999 !important;
    }
    .select2-container {
    z-index: 99999 !important;
}
</style>
@endpush
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header project-details-card-header">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pb-2">
                            <div class="table-title">
                                <h4 class="project-details-card-header-title"><i class='bx bx-user-voice bx-tada'></i>
                                    Announcement</h4>
                            </div>
                            @can('Create Announcement')
                            <div class="multi-button-area ms-md-auto">
                                <a href="#" class="purchase-button" data-bs-toggle="modal"
                                    data-bs-target="#add-announcement-modal">
                                    <i class='bx bx-message-square-add bx-tada'></i> New Announcement</a>
                            </div>
                            @endcan
                        </div>
                    </div>
                    <!--Add Announcement Modal-->
                    @include('admin.announcement.announcement.create')
                    <!--Add Announcement Modal-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @can('View Announcement')
                                        <table id="add-row" class="display table table-striped table-hover basic-datatables" role="grid"
                                            aria-describedby="add-row_info">
                                            <thead class="">
                                                <tr role="row">
                                                    <th>Sl</th>
                                                    <th>Publish Date</th>
                                                    <th>Announcement Title</th>
                                                    <th>Announcement Details</th>
                                                    <th>Effective Date</th>
                                                    <th>Notice For</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($announcements as $announcement)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{ $loop->iteration }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($announcement->publish_date)->format('d M Y') }}</td>
                                                    <td>{{$announcement->title}}</td>
                                                    <td width="30%">
                                                        <div class="template-preview">
                                                            <div class="template-content short">
                                                            </div>
                                                            <div class="template-content full" style="display: none;">
                                                                {!! nl2br(strip_tags(preg_replace('/\s{2,}/', ' ', $announcement->details))) !!}
                                                            </div>
                                                            @if (strlen($announcement->details) > 1)

                                                                <a href="javascript:void(0);" class="see-more">See Details</a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($announcement->effective_date)->format('d M Y') }}</td>
                                                    <td>
                                                        Branch:
                                                        <ul>
                                                            @if ($announcement->announcementDepartments->where('branch_id', null)->count() > 0)
                                                                <li>All Branch</li>
                                                            @else
                                                            @foreach ($announcement->announcementDepartments->unique('branch_id') as $announcementDepartment)
                                                            <li>{{ $announcementDepartment->branch->name }}</li>
                                                            @endforeach
                                                            @endif
                                                        </ul>
                                                        Department:
                                                        <ul>
                                                            @foreach ($announcement->announcementDepartments as $announcementDepartment)
                                                                <li>{{ $announcementDepartment->department->department_name }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </td>

                                                    <td>
                                                        <form action="{{ route('announcement.toggle', $announcement->id) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn {{ $announcement->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                                {{ $announcement->status == 1 ? 'Active' : 'Inactive' }}
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            @if($announcement->attachment)
                                                                <a href="{{ asset('storage/' . $announcement->attachment) }}" download class="btn btn-link btn-secondary btn-lg">
                                                                    <i class='bx bx-download'></i>
                                                                </a>
                                                            @endif
                                                            @if($announcement->attachment)
                                                                <a href="{{ asset('storage/' . $announcement->attachment) }}" target="_blank" class="btn btn-link btn-secondary btn-lg">
                                                                    <i class='bx bx-show'></i>
                                                                </a>
                                                            @endif
                                                            @can('Update Announcement')
                                                            <button type="button" title="Edit" class="btn btn-link btn-success btn-lg"  data-bs-toggle="modal"
                                                                data-bs-target="#edit-announcement-modal-{{$announcement->id}}">
                                                                <i class='bx bxs-edit'></i>
                                                            </button>
                                                            @endcan

                                                            @can('View Announcement')
                                                            <a href="{{route('announcement.view',$announcement->id)}}" type="button" title="Edit" class="btn btn-link btn-info btn-lg" >
                                                                <i class='bx bx-show'></i>
                                                            </a>
                                                            @endcan

                                                            @can('Delete Announcement')
                                                            <a href="#" id="delete-announcement-link" title="delete"
                                                                class="btn btn-link btn-danger btn-lg"
                                                                data-announcement-id="{{ $announcement->id }}">
                                                                <i class='bx bx-trash-alt'></i>
                                                            </a>
                                                            @endcan

                                                            <form id="delete-announcement-form-{{ $announcement->id }}"
                                                                action="{{ route('announcement.destroy', $announcement->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @include('admin.announcement.announcement.edit')
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
        document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.see-more').forEach(function (link) {
        link.addEventListener('click', function () {
            const container = this.closest('.template-preview');
            const shortContent = container.querySelector('.short');
            const fullContent = container.querySelector('.full');

            if (fullContent.style.display === 'none') {
                fullContent.style.display = 'block';
                shortContent.style.display = 'none';
                this.textContent = 'Hide Details';
            } else {
                fullContent.style.display = 'none';
                shortContent.style.display = 'block';
                this.textContent = 'See Details';
            }
        });
    });
});
    // Use event delegation to handle click events for all delete buttons
    document.addEventListener('DOMContentLoaded', function() {
        const deleteLinks = document.querySelectorAll('[id^="delete-announcement-link"]');

        deleteLinks.forEach(function(deleteLink) {
            deleteLink.addEventListener('click', function(e) {
                e.preventDefault();
                const announcementId = this.getAttribute('data-announcement-id');
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
                        document.getElementById('delete-announcement-form-' + announcementId).submit();
                    }
                });
            });
        });
    });
</script>
@endpush
