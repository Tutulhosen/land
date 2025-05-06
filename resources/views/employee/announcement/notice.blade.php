@extends('layouts.employee')
@section('title','Employee Leave Applications')
@section('content')
<div class="container">
    <div class="page-inner">
       <div class="row">
          <div class="col-xl-12">
             <div class="card">
                <div class="card-header project-details-card-header">
                     <div class="text-start">
                          <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Notice Board</h4>
                     </div>
                </div>
                <!-- end card header -->
                <div class="card-body">
                   <div class="table-responsive">
                      <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                         <div class="row">
                            <div class="col-sm-12">
                               <table id="add-row" class="display table table-striped table-hover" role="grid" aria-describedby="add-row_info">
                                    <thead class="">
                                     <tr role="row">
                                        <th>Sl</th>
                                        <th>Notice Title</th>
                                        <th>Notice Details</th>
                                        <th>Effective Date</th>
                                        <th>Notice For</th>
                                        <th>Valid Till</th>
                                        <th>Action</th>
                                     </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($noticeboards as $noticeboard)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $loop->iteration }}</td>
                                        <td>{{$noticeboard->title}}</td>
                                        <td width="40%">
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
                                        <td>Department:
                                            <ul>
                                                @foreach ($noticeboard->noticeboardDepartments as $noticeboardDepartment)
                                                    <li>{{ $noticeboardDepartment->department->department_name }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($noticeboard->valid_till)->format('d M Y') }}</td>

                                        <td>
                                           <div class="form-button-action">
                                               @if($noticeboard->attachment)
                                                    <a href="{{ asset('storage/' . $noticeboard->attachment) }}" download class="btn btn-link btn-secondary btn-lg">
                                                        <i class='bx bx-download'></i>
                                                    </a>
                                                @endif
                                                <a href="{{route('employeee.noticeboard.view',$noticeboard->id)}}" type="button" title="View" class="btn btn-link btn-info btn-lg" >
                                                    <i class='bx bx-show'></i>
                                                </a>
                                           </div>
                                        </td>
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
             <!-- .card-->
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
</script>

@endpush
