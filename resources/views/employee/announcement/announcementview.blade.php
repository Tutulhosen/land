@extends('layouts.employee')
@section('title','Announcement')
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
                            {{-- @can('Create Announcement')
                            <div class="multi-button-area ms-md-auto">
                                <a href="#" class="purchase-button" data-bs-toggle="modal"
                                    data-bs-target="#add-announcement-modal">
                                    <i class='bx bx-message-square-add bx-tada'></i> New Announcement</a>
                            </div>
                            @endcan --}}
                        </div>
                    </div>
                    <!--Add Announcement Modal-->
                    <!--Add Announcement Modal-->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card card-around" style="margin: 20px;">
                                <div class="position-relative" style="padding: 40px;">
                                    <img width="100%"
                                        src="{{ asset('storage/' . $companyInformation->companyDocument->letterhead_vertical) }}"
                                        alt="Letterhead">
                                    <div class="position-absolute"
                                        style="top: 0; left: 0; right: 0; z-index: 1; padding: 10%; margin-top: 10%;">
                                        <h3 class="text-center">{{ $announcement->title }}</h3>
                                        <p style="margin-top: 70px;">Publish Date:
                                            {{ \Carbon\Carbon::parse($announcement->publish_date)->format('d M Y') }}
                                        </p>
                                        <p>Effective From:
                                            {{ \Carbon\Carbon::parse($announcement->effective_date)->format('d M Y') }}
                                        </p>
                                        <p>{!! $announcement->details !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <?php
                                    use App\Models\Admin\Announcement\Announcement;
                                    $user = Auth::user();

                                    if ($user->department_id && $user->branch_id) {
                                        $announcements = Announcement::whereHas('announcementDepartments', function ($query) use ($user) {
                                            $query->where(function ($q) use ($user) {
                                                $q->where('branch_id', $user->branch_id)
                                                ->orWhereNull('branch_id');
                                            })->where('department_id', $user->department_id);
                                        })->where('status', true) ->where('publish_date', '<=', now())->whereDate('effective_date', '>=', now()->subDay())->get();


                                    }

                                ?>
                            <div class="col-md-12">
                                <div class="card flex-fill h-100 mb-0" style="margin: 20px;">
                                    <div
                                        class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
                                        <h5 class="project-details-card-header-title">Announcements</h5>
                                        <div class="dropdown mb-2">
                                            <a href="javascript:void(0);"
                                                class="btn btn-white border btn-sm d-inline-flex align-items-center"
                                                data-bs-toggle="dropdown">
                                                <i class="ti ti-calendar me-1"></i>All
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div data-simplebar="init" data-simplebar-auto-hide="false"
                                            class="simplebar-scrollable-y h-100">
                                            <div class="simplebar-wrapper">
                                                <div class="simplebar-height-auto-observer-wrapper">
                                                    <div class="simplebar-height-auto-observer"></div>
                                                </div>
                                                <div class="simplebar-mask">
                                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                        <div class="simplebar-content-wrapper" tabindex="0"
                                                            role="region" aria-label="scrollable content"
                                                            style="height: auto; overflow: hidden scroll;">
                                                            @foreach ($announcements as $key => $announcement)
                                                            <div class="simplebar-content">
                                                                <div
                                                                    class="bg-light p-2 border border-dashed rounded-top mb-3">
                                                                    <div
                                                                        class="d-flex align-items-center justify-content-between">
                                                                        <div class="d-flex align-items-center">
                                                                            <a href="javascript:void(0);"
                                                                                class="avatar">
                                                                                <div class="rounded-circle d-flex align-items-center justify-content-center text-white bg-primary"
                                                                                    style=" height:30px; width:30px;">
                                                                                    {{$key+1}}</div>
                                                                            </a>
                                                                            <div class="ms-2 me-2">
                                                                                <div class="d-flex align-items-center">
                                                                                    <h6 class="fs-medium mb-0">
                                                                                        <a href="{{route('employee.announcement.view',$announcement->id)}}"
                                                                                            class="fs-19">{{$announcement->title}}.</a>
                                                                                    </h6>
                                                                                </div>
                                                                                <div class="d-flex align-items-center">
                                                                                    <p class="fs-13 mb-0">Published
                                                                                        Date:
                                                                                        {{ \Carbon\Carbon::parse($announcement->publish_date)->format('M d, Y') }}
                                                                                    </p>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <p class="fs-13 mb-0">Effective
                                                                                        Date:
                                                                                        {{ \Carbon\Carbon::parse($announcement->effective_date)->format('M d, Y') }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- <a href="{{route('announcement.view',$announcement->id)}}"
                                                            class="fs-19">{{$key+1}}.
                                                            {{$announcement->title}}.</a> <br> --}}
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="simplebar-placeholder" style="width: 607px; height: 321px;">
                                                </div>
                                            </div>
                                            <div class="simplebar-track simplebar-horizontal"
                                                style="visibility: hidden;">
                                                <div class="simplebar-scrollbar simplebar-visible"
                                                    style="width: 0px; display: none;"></div>
                                            </div>
                                            <div class="simplebar-track simplebar-vertical"
                                                style="visibility: visible;">
                                                <div class="simplebar-scrollbar simplebar-visible"
                                                    style="height: 150px; transform: translate3d(0px, 70px, 0px); display: block;">
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
