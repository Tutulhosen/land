@extends('layouts.admin')
@section('title','Official Letters')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header project-details-card-header">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pb-2">
                            <div class="table-title">
                                <h4 class="project-details-card-header-title"><i class='bx bxs-note bx-tada'></i>
                                    Official Letters</h4>
                            </div>
                            @can('Create OfficialLetters')
                            <div class="multi-button-area ms-md-auto">
                                <a href="{{route('official-letters.create')}}" class="purchase-button"><i
                                        class='bx bx-message-square-add bx-tada'></i> Generate Letter</a>
                            </div>
                            @endcan
                        </div>
                        <div class="row table-search-box">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <select class="form-select form-control custom-input custom-input"
                                        id="defaultSelect" placeholder="Expense By">
                                        <option>Holiday Type</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <select class="form-select form-control custom-input custom-input"
                                        id="defaultSelect" placeholder="Expense Category">
                                        <option>Duration</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <select class="form-select form-control custom-input custom-input"
                                        id="defaultSelect" placeholder="Expense By">
                                        <option>Month</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <select class="form-select form-control custom-input custom-input"
                                        id="defaultSelect" placeholder="Expense By">
                                        <option>By Status</option>
                                        <option>Paid</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <a class="relode-button"><i class='bx bx-revision bx-tada'></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @can('View OfficialLetters')
                                        <table id="add-row"
                                            class="display table table-striped table-hover basic-datatables" role="grid"
                                            aria-describedby="add-row_info">
                                            <thead class="">
                                                <tr role="row">
                                                    <th>Sl</th>
                                                    <th>Employee</th>
                                                    <th>Subject/Description</th>
                                                    <th>Created Date</th>
                                                    <th>Created By</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($officialLetters->reverse() as $officialletter)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1 text-center" style="width: 5%;">{{ $loop->iteration }}</td>
                                                    <td class="text-center" style="width: 20%;">
                                                        @if($officialletter->employee_id != null)
                                                            <i class="bx bx-user-circle"></i><b>{{ $officialletter->employee->first_name }} {{ $officialletter->employee->last_name }}</b> <br>
                                                            <i class="bx bx-id-card bx-flashing"></i>{{ $officialletter->employee->emp_id }} <br>
                                                            {{ $officialletter->employee->officialInformation->designation->designation_name }} <br>
                                                            {{ $officialletter->employee->officialInformation->department->department_name }}
                                                        @else
                                                        <i class="bx bx-user-circle"></i><b>All Employee</b>
                                                        @endif

                                                    </td>
                                                    <td class="text-center" style="width: 25%;">
                                                        {{ $officialletter->documentTemplate->documenttemplate_name }}
                                                        <div class="template-preview">
                                                            <div class="template-content short">
                                                            </div>
                                                            <div class="template-content full" style="display: none;">
                                                                {!! nl2br(strip_tags(preg_replace('/\s{2,}/', ' ', $officialletter->content))) !!}
                                                            </div>
                                                            @if (strlen($officialletter->content) > 100)
                                                                <a href="javascript:void(0);" class="see-more">See Details</a>
                                                            @endif
                                                        </div>

                                                    </td>
                                                    <td class="text-center" style="width: 10%;"><i class='bx bx-calendar bx-flashing' ></i>{{ \Carbon\Carbon::parse($officialletter->created_at)->format('d M Y') }} <br>
                                                        <i class='bx bx-stopwatch bx-flashing'></i>{{ \Carbon\Carbon::parse($officialletter->created_at)->format('h.i A') }}</td>
                                                    <td class="text-center" style="width: 20%;">
                                                        <i class="bx bx-user-circle"></i>{{ $officialletter->signatory->first_name }} {{ $officialletter->signatory->last_name }} <br>
                                                        <i class="bx bx-id-card bx-flashing"></i>{{ $officialletter->signatory->emp_id }} <br>
                                                        {{ $officialletter->signatory?->officialInformation?->designation?->designation_name }} <br>
                                                        {{ $officialletter->signatory?->officialInformation?->department?->department_name }}
                                                    </td>
                                                    <td class="text-center" style="width: 10%;">
                                                        <div class="form-button-action">
                                                            <button type="button" data-bs-toggle="tooltip" title="Show" class="btn btn-link btn-info btn-lg btn-view-officialletter"
                                                            data-content="{{ $officialletter->content }}">
                                                                <i class='bx bx-show'></i>
                                                            </button>
                                                            @can('Delete OfficialLetters')
                                                            <a href="#" id="delete-officialletter-link" title="delete"
                                                                class="btn btn-link btn-danger btn-lg"
                                                                data-officialletter-id="{{ $officialletter->id }}">
                                                                <i class='bx bx-trash-alt'></i>
                                                            </a>
                                                            @endcan

                                                            <form id="delete-officialletter-form-{{ $officialletter->id }}"
                                                                action="{{ route('official-letters.destroy', $officialletter->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                    </td>
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
        const deleteLinks = document.querySelectorAll('[id^="delete-officialletter-link"]');

        deleteLinks.forEach(function(deleteLink) {
            deleteLink.addEventListener('click', function(e) {
                e.preventDefault();
                const officialletterId = this.getAttribute('data-officialletter-id');
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
                        document.getElementById('delete-officialletter-form-' + officialletterId).submit();
                    }
                });
            });
        });
    });



    $(document).ready(function () {
        $(".btn-view-officialletter").click(function () {
            let content = $(this).data("content");
            let left = 70;
            let right = 70;
            let top = 200;
            let bottom = 200;

            let form = $('<form>', {
                action: "{{ url('/dashboard/hr-documents/official-letters/generate-pdf') }}",
                method: 'POST',
                target: '_blank'
            }).append($('<input>', { type: 'hidden', name: '_token', value: $('meta[name="csrf-token"]').attr('content') }))
            .append($('<input>', { type: 'hidden', name: 'content', value: content }))
            .append($('<input>', { type: 'hidden', name: 'left', value: left }))
            .append($('<input>', { type: 'hidden', name: 'right', value: right }))
            .append($('<input>', { type: 'hidden', name: 'top', value: top }))
            .append($('<input>', { type: 'hidden', name: 'bottom', value: bottom }));

            $('body').append(form);
            form.submit();
        });
    });
</script>

@endpush
