@extends('layouts.admin')
@section('title','Noticeboard')
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
                                    Noticeboard</h4>
                            </div>
                            {{-- @can('Create noticeboard')
                            <div class="multi-button-area ms-md-auto">
                                <a href="#" class="purchase-button" data-bs-toggle="modal"
                                    data-bs-target="#add-noticeboard-modal">
                                    <i class='bx bx-message-square-add bx-tada'></i> New noticeboard</a>
                            </div>
                            @endcan --}}
                        </div>
                    </div>
                    <!--Add noticeboard Modal-->
                    <!--Add noticeboard Modal-->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card card-around" style="margin: 20px;">
                                <div class="position-relative" style="padding: 40px;">
                                    <img width="100%" src="{{ asset('storage/' . $companyInformation->companyDocument->letterhead_vertical) }}"
                                         alt="Letterhead">
                                    <div class="position-absolute" style="top: 0; left: 0; right: 0; z-index: 1; padding: 10%; margin-top: 10%;">
                                        <h3 class="text-center">{{ $noticeboard->title }}</h3>
                                        <p style="margin-top: 70px;">Publish Date: {{ \Carbon\Carbon::parse($noticeboard->publish_date)->format('d M Y') }}</p>
                                        <p>Effective From: {{ \Carbon\Carbon::parse($noticeboard->effective_date)->format('d M Y') }}</p>
                                        <p>{!! $noticeboard->details !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <?php
                                $noticeboards = DB::table('notice_boards')->where('status', true)->whereDate('valid_till', '>=', now()->subDay())->get();
                                ?>
                                <?php
                                use App\Models\UserBranch;
                                use App\Models\Admin\noticeboard\NoticeBoard;
                                $branchId = null;
                                if (Auth::user()->is_superadmin != 1) {
                                    $branchId = UserBranch::where('user_id', Auth::id())->value('branch_id');
                                    $noticeboards = NoticeBoard::whereHas('noticeboardDepartments', function ($query) use ($branchId) {
                                        $query->where(function ($q) use ($branchId) {
                                            $q->where('branch_id', $branchId)
                                            ->orWhereNull('branch_id');
                                        });
                                    })->where('status', true)->whereDate('valid_till', '>=', now()->subDay())->get();

                                }
                                ?>
                            <div class="col-md-12">
                                <div class="card flex-fill h-100 mb-0" style="margin: 20px;">
                                    <div
                                        class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
                                        <h5 class="project-details-card-header-title">Noticeboards</h5>
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
                                                            @foreach ($noticeboards as $key => $noticeboard)
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
                                                                                        <a href="{{route('noticeboard.view',$noticeboard->id)}}"
                                                                                            class="fs-19">{{$noticeboard->title}}.</a>
                                                                                    </h6>
                                                                                </div>
                                                                                <div class="d-flex align-items-center">
                                                                                    <p class="fs-13 mb-0">Effective Date:
                                                                                        {{ \Carbon\Carbon::parse($noticeboard->effective_date)->format('M d, Y') }}
                                                                                    </p>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <p class="fs-13 mb-0">Valid Till Date:
                                                                                        {{ \Carbon\Carbon::parse($noticeboard->valid_till)->format('M d, Y') }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- <a href="{{route('noticeboard.view',$noticeboard->id)}}"
                                                            class="fs-19">{{$key+1}}.
                                                            {{$noticeboard->title}}.</a> <br> --}}
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
