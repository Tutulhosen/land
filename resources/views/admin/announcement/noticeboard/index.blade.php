@extends('layouts.admin')
@section('title','Notice Board')
@push('styles')
<style>
    .select2-dropdown {
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
                         <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Notice Board</h4>
                      </div>
                      @can('Create Notice')
                      <div class="multi-button-area ms-md-auto">
                         <a href="#" class="purchase-button" data-bs-toggle="modal" data-bs-target="#add-notice-board"><i class='bx bx-message-square-add bx-tada' ></i> Add Notice</a>
                      </div>
                      @endcan
                   </div>
                </div>
                <!--Add Notice Board Modal-->
                @include('admin.announcement.noticeboard.create')
                <!--Add Notice Board Modal-->
                <div class="card-body">
                   <div class="table-responsive">
                      <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                         <div class="row">
                            <div class="col-sm-12">
                                @can('View Notice')
                               <table id="add-row" class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                  <thead class="">
                                     <tr role="row">
                                        <th>Sl</th>
                                        <th>Notice Title</th>
                                        <th>Notice Details</th>
                                        <th>Effective Date</th>
                                        <th>Notice For</th>
                                        <th>Valid Till</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                     </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($noticeboards as $noticeboard)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $loop->iteration }}</td>
                                        <td>{{$noticeboard->title}}</td>
                                        <td width="30%">
                                            <div class="template-preview">
                                                <div class="template-content short">
                                                </div>
                                                <div class="template-content full" style="display: none;">
                                                    {!! nl2br(strip_tags(preg_replace('/\s{2,}/', ' ', $noticeboard->details))) !!}
                                                </div>
                                                @if (strlen($noticeboard->details) > 1)

                                                    <a href="javascript:void(0);" class="see-more">See Details</a>
                                                @endif
                                            </div>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($noticeboard->effective_date)->format('d M Y') }}</td>
                                        <td>Branch:
                                            <ul>
                                                @if ($noticeboard->noticeboardDepartments->where('branch_id', null)->count() > 0)
                                                    <li>All Branch</li>
                                                @else
                                                @foreach ($noticeboard->noticeboardDepartments->unique('branch_id') as $noticeboardDepartment)
                                                <li>{{ $noticeboardDepartment->branch->name }}</li>
                                                @endforeach
                                                @endif
                                            </ul>
                                            Department:
                                            <ul>
                                                @foreach ($noticeboard->noticeboardDepartments as $noticeboardDepartment)
                                                    <li>{{ $noticeboardDepartment->department->department_name }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($noticeboard->valid_till)->format('d M Y') }}</td>
                                        <td>
                                            <form action="{{ route('noticeboard.toggle', $noticeboard->id) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit"
                                                    class="btn {{ $noticeboard->status == 1 ? 'status-box-1' : 'status-box-1' }}">
                                                    {{ $noticeboard->status == 1 ? 'Active' : 'Inactive' }}
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <div class="form-button-action">
                                                @if($noticeboard->attachment)
                                                    <a href="{{ asset('storage/' . $noticeboard->attachment) }}" download class="btn btn-link btn-secondary btn-lg">
                                                        <i class='bx bx-download'></i>
                                                    </a>
                                                @endif
                                                @if($noticeboard->attachment)
                                                    <a href="{{ asset('storage/' . $noticeboard->attachment) }}" target="_blank" class="btn btn-link btn-secondary btn-lg">
                                                        <i class='bx bx-show'></i>
                                                    </a>
                                                @endif

                                                @can('Update Notice')
                                                <button type="button" title="Edit" class="btn btn-link btn-success btn-lg"  data-bs-toggle="modal"
                                                    data-bs-target="#edit-notice-board-{{$noticeboard->id}}">
                                                    <i class='bx bxs-edit'></i>
                                                </button>
                                                @endcan

                                                @can('View Notice')
                                                            <a href="{{route('noticeboard.view',$noticeboard->id)}}" type="button" title="Edit" class="btn btn-link btn-info btn-lg" >
                                                                <i class='bx bx-show'></i>
                                                            </a>
                                                            @endcan

                                                @can('Delete Notice')
                                                <a href="#" id="delete-noticeboard-link" title="delete"
                                                    class="btn btn-link btn-danger btn-lg"
                                                    data-noticeboard-id="{{ $noticeboard->id }}">
                                                    <i class='bx bx-trash-alt'></i>
                                                </a>
                                                @endcan

                                                <form id="delete-noticeboard-form-{{ $noticeboard->id }}"
                                                    action="{{ route('noticeboard.destroy', $noticeboard->id) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                     </tr>
                                     @include('admin.announcement.noticeboard.edit')
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
        const deleteLinks = document.querySelectorAll('[id^="delete-noticeboard-link"]');

        deleteLinks.forEach(function(deleteLink) {
            deleteLink.addEventListener('click', function(e) {
                e.preventDefault();
                const noticeboardId = this.getAttribute('data-noticeboard-id');
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
                        document.getElementById('delete-noticeboard-form-' + noticeboardId).submit();
                    }
                });
            });
        });
    });
</script>
@endpush
