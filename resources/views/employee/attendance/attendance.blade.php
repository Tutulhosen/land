@extends('layouts.employee')
@section('title','Employee Attendance')
@section('content')
<div class="container">
    <div class="page-inner">
       <div class="row">
          <div class="col-xl-12">
             <div class="card">
                <div class="card-header project-details-card-header">
                     <div class="text-start">
                          <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Attendance History</h4>
                     </div>
                </div>
                <!-- end card header -->
                <div class="card-body">
                   <div class="table-responsive">
                      <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                         <div class="row">
                            <div class="col-sm-12">
                               <table id="add-row" class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                    <thead class="table-primary">
                                         <tr role="row">
                                            <th style="font-size: 13px;">Sl</th>
                                            <th style="font-size: 13px;">Date</th>
                                            <th style="font-size: 13px;">Check In</th>
                                            {{-- <th style="font-size: 13px;">Method</th> --}}
                                            <th style="font-size: 13px;">Check Out</th>
                                            {{-- <th style="font-size: 13px;">Method</th> --}}
                                            <th style="font-size: 13px;">Status</th>
                                            <th style="font-size: 13px;">Late</th>
                                            <th style="font-size: 13px;">Working Hour</th>
                                            <th style="font-size: 13px;">Overtime</th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($attendances as $key => $attendance)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{$key+1}}</td>
                                            <td>{{Carbon\Carbon::parse($attendance->date)->format('d M Y')}}</td>
                                            <td>{{Carbon\Carbon::parse($attendance->check_in)->format('h:i a')}}</td>
                                            {{-- <td><i class="bx bx-sad"></i> Face</td> --}}
                                            <td>{{Carbon\Carbon::parse($attendance->check_out)->format('h:i a')}}</td>
                                            {{-- <td><i class="bx bx-sad"></i> Face</td> --}}
                                            <td>
                                                @if ($attendance->status == 'Present')
                                                <span class="badge badge-success">{{$attendance->status}}</span>
                                                @elseif ($attendance->status == 'Absent')
                                                <span class="badge badge-danger">{{$attendance->status}}</span>
                                                @elseif ($attendance->status == 'Half Day')
                                                <span class="badge badge-warning">{{$attendance->status}}</span>
                                                @else
                                                <span class="badge badge-info">{{$attendance->status}}</span>
                                                @endif
                                                <br>
                                                @if ($attendance->late > 0)
                                                <span class="badge badge-warning">Late</span>
                                                @endif
                                            </td>
                                            <td>{{$attendance->late}} min</td>
                                            <td>{{$attendance->total_hours ?? 0}} Hrs</td>
                                            <td>{{$attendance->overtime_hours}} mins</td>
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
