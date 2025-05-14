<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>LAND | @yield('title')</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" href="{{ asset('storage/') }}" type="image/x-icon"/>
    <!-- Font Awesome (for icons) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

	<!-- Fonts and icons -->
	<script src="{{ asset('admin') }}/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Public Sans:300,400,500,600,700"]},
			custom: {"families":["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{ asset('admin') }}/assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('admin') }}/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('admin') }}/assets/css/plugins.min.css">
	<link rel="stylesheet" href="{{ asset('admin') }}/assets/css/kaiadmin.creative.min.css">
	<link rel="stylesheet" href="{{ asset('admin') }}/assets/css/onebiterp.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" /> --}}
    {{-- Summer note --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('admin') }}/assets/css/demo.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/smarthr.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/plot.css">

    <style>
        .select2-container .select2-selection--single {
            height: 36px;
            line-height: 36px;
        }

        .custom-modal-width {
            max-width: 60% !important; 
        }
    </style>

    {{-- Css files for employee view --}}
    	<link rel="stylesheet" href="/assets/css/bootstrap.min.css.map">


    @stack('styles')
</head>
<body class="trendy-layout">
	<div class="wrapper">

		@include('admin.include.sidebar')

		<div class="main-panel">
			<div class="main-header">
				<div class="main-header-logo">
					<!-- Logo Header -->
					<div class="logo-header" data-background-color="blue">

						<a href="dashboard.php" class="logo">
							<img src="{{ asset('admin') }}/assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20">
						</a>
						<button class="navbar-toggler sidenav-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon">
								<i class="gg-menu-right"></i>
							</span>
						</button>
						<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
						<div class="nav-toggle">
							<button class="btn btn-toggle toggle-sidebar">
								<i class="gg-menu-right"></i>
							</button>
						</div>
					</div>
					<!-- End Logo Header -->
				</div>
				<!-- Navbar Header -->

                <style>
                    #searchResultsWrapper {
                        position: absolute;
                        top: 100%;
                        left: 0;
                        right: 0;
                        z-index: 1050;
                    }
                    #searchResults {
                        display: block;
                        max-height: 400px;
                        overflow-y: auto;
                        background: white;
                        border-radius: 5px;
                    }
                    .dropdown-item {
                        padding: 10px;
                        font-size: 14px;
                        cursor: pointer;
                        transition: background 0.3s ease-in-out;
                    }
                    .dropdown-item b {
                        color: #ff5733;
                    }
                    .dropdown-item:hover, .active {
                        background: #f5f5f5;
                    }
                    .branch-btn{
                        padding: 0px 60px !important;
                        border: 1px solid #fff;
                        border-radius: 8px !important;
                        font-weight: 600 !important;
                        font-size: medium !important;
                    }
                </style>

				<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

					<div class="container-fluid">
						<nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                            <div class="input-group position-relative">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pe-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" id="adminSearch" placeholder="Search..." class="form-control">
                                <div id="searchResultsWrapper">
                                    <ul id="searchResults" class="dropdown-menu shadow-lg p-2" style="width: 100%; display: none;"></ul>
                                </div>
                            </div>
                        </nav>
                        <div class="navbar-nav topbar-nav ms-md-auto align-items-center w-50">
                            <marquee direction="left" class="text-white">
                                <?php
                                $announcements = DB::table('announcements')->where('status', true)->where('publish_date', '<=', now())->whereDate('effective_date', '>=', now()->subDay())->get();
                                $noticeboards = DB::table('notice_boards')->where('status', true)->whereDate('valid_till', '>=', now()->subDay())->get();
                                ?>
                                <?php
                                use App\Models\UserBranch;
                                use App\Models\Admin\Announcement\Announcement;
                                use App\Models\Admin\Announcement\NoticeBoard;
                                $branchId = null;
                                if (Auth::user()->is_superadmin != 1) {
                                    $branchId = UserBranch::where('user_id', Auth::id())->value('branch_id');

                                    $announcements = Announcement::whereHas('announcementDepartments', function ($query) use ($branchId) {
                                        $query->where(function ($q) use ($branchId) {
                                            $q->where('branch_id', $branchId)
                                            ->orWhereNull('branch_id');
                                        });
                                    })->where('status', true)->where('publish_date', '<=', now())->whereDate('effective_date', '>=', now()->subDay())->get();

                                    $noticeboards = NoticeBoard::whereHas('noticeboardDepartments', function ($query) use ($branchId) {
                                        $query->where(function ($q) use ($branchId) {
                                            $q->where('branch_id', $branchId)
                                            ->orWhereNull('branch_id');
                                        });
                                    })->where('status', true)->whereDate('valid_till', '>=', now()->subDay())->get();

                                }
                                ?>
                                @if (count($announcements) > 0)
                                    <b>Announcement:</b> &nbsp;
                                    @foreach ($announcements as $announcement)
                                    <a href="{{route('announcement.view',$announcement->id)}}" class="text-white"><i class="fas fa-circle fs-4"></i> {{$announcement->title}}</a>. &nbsp; &nbsp;
                                    @endforeach
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                @endif
                                @if (count($noticeboards) > 0)
                                  <b> Notice:</b> &nbsp;
                                    @foreach ($noticeboards as $noticeboard)
                                    <a href="{{route('noticeboard.view',$noticeboard->id)}}"  class="text-white"><i class="fas fa-circle fs-4"></i> {{$noticeboard->title}}</a>. &nbsp; &nbsp;
                                    @endforeach
                                @endif

                            </marquee>
                        </div>

						<ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
							<li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
								<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" aria-haspopup="true">
									<i class="fa fa-search"></i>
								</a>
								<ul class="dropdown-menu dropdown-search animated fadeIn">
									<form class="navbar-left navbar-form nav-search">
										<div class="input-group">
											<input type="text" placeholder="Search ..." class="form-control">
										</div>
									</form>
								</ul>
							</li>
                            @if (auth()->user()->is_superadmin != 1)
                            <li class="nav-item topbar-icon dropdown hidden-caret">
                                <a class="nav-link branch-btn bxs-tada" href="#"  role="button" >
                                    {{auth()->user()->branches->first()->name}}
                                </a>
                            </li>
                            @endif

							{{-- <li class="nav-item topbar-icon dropdown hidden-caret">
								<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-envelope"></i>
								</a>
								<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
									<li>
										<div class="dropdown-title d-flex justify-content-between align-items-center">
											Messages
											<a href="#" class="small">Mark all as read</a>
										</div>
									</li>
									<li>
										<div class="message-notif-scroll scrollbar-outer">
											<div class="notif-center">
												<a href="#">
													<div class="notif-img">
														<img src="{{ asset('admin') }}/assets/img/jm_denis.jpg" alt="Img Profile">
													</div>
													<div class="notif-content">
														<span class="subject">Jimmy Denis</span>
														<span class="block">
															How are you ?
														</span>
														<span class="time">5 minutes ago</span>
													</div>
												</a>
												<a href="#">
													<div class="notif-img">
														<img src="{{ asset('admin') }}/assets/img/chadengle.jpg" alt="Img Profile">
													</div>
													<div class="notif-content">
														<span class="subject">Chad</span>
														<span class="block">
															Ok, Thanks !
														</span>
														<span class="time">12 minutes ago</span>
													</div>
												</a>
												<a href="#">
													<div class="notif-img">
														<img src="{{ asset('admin') }}/assets/img/mlane.jpg" alt="Img Profile">
													</div>
													<div class="notif-content">
														<span class="subject">Jhon Doe</span>
														<span class="block">
															Ready for the meeting today...
														</span>
														<span class="time">12 minutes ago</span>
													</div>
												</a>
												<a href="#">
													<div class="notif-img">
														<img src="{{ asset('admin') }}/assets/img/talha.jpg" alt="Img Profile">
													</div>
													<div class="notif-content">
														<span class="subject">Talha</span>
														<span class="block">
															Hi, Apa Kabar ?
														</span>
														<span class="time">17 minutes ago</span>
													</div>
												</a>
											</div>
										</div>
									</li>
									<li>
										<a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i> </a>
									</li>
								</ul>
							</li> --}}
							<li class="nav-item topbar-icon dropdown hidden-caret">
								<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-bell"></i>
									<span class="notification">4</span>
								</a>
								<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
									<li>
										<div class="dropdown-title">You have 4 new notification</div>
									</li>
									<li>
										<div class="notif-scroll scrollbar-outer">
											<div class="notif-center">
												<a href="#">
													<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
													<div class="notif-content">
														<span class="block">
															New user registered
														</span>
														<span class="time">5 minutes ago</span>
													</div>
												</a>
												<a href="#">
													<div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
													<div class="notif-content">
														<span class="block">
															Rahmad commented on Admin
														</span>
														<span class="time">12 minutes ago</span>
													</div>
												</a>
												<a href="#">
													<div class="notif-img">
														<img src="{{ asset('admin') }}/assets/img/profile2.jpg" alt="Img Profile">
													</div>
													<div class="notif-content">
														<span class="block">
															Reza send messages to you
														</span>
														<span class="time">12 minutes ago</span>
													</div>
												</a>
												<a href="#">
													<div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
													<div class="notif-content">
														<span class="block">
															Farrah liked Admin
														</span>
														<span class="time">17 minutes ago</span>
													</div>
												</a>
											</div>
										</div>
									</li>
									<li>
										<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
									</li>
								</ul>
							</li>
							{{-- <li class="nav-item topbar-icon dropdown hidden-caret">
								<a class="nav-link" data-bs-toggle="dropdown" href="#" aria-expanded="false">
									<i class="fas fa-layer-group"></i>
								</a>
								<div class="dropdown-menu quick-actions animated fadeIn">
									<div class="quick-actions-header">
										<span class="title mb-1">Quick Actions</span>
										<span class="subtitle op-7">Shortcuts</span>
									</div>
									<div class="quick-actions-scroll scrollbar-outer">
										<div class="quick-actions-items">
											<div class="row m-0">
												<a class="col-6 col-md-4 p-0" href="#">
													<div class="quick-actions-item">
														<div class="avatar-item bg-danger rounded-circle">
															<i class="far fa-calendar-alt"></i>
														</div>
														<span class="text">Calendar</span>
													</div>
												</a>
												<a class="col-6 col-md-4 p-0" href="#">
													<div class="quick-actions-item">
														<div class="avatar-item bg-warning rounded-circle">
															<i class="fas fa-map"></i>
														</div>
														<span class="text">Maps</span>
													</div>
												</a>
												<a class="col-6 col-md-4 p-0" href="#">
													<div class="quick-actions-item">
														<div class="avatar-item bg-info rounded-circle">
															<i class="fas fa-file-excel"></i>
														</div>
														<span class="text">Reports</span>
													</div>
												</a>
												<a class="col-6 col-md-4 p-0" href="#">
													<div class="quick-actions-item">
														<div class="avatar-item bg-success rounded-circle">
															<i class="fas fa-envelope"></i>
														</div>
														<span class="text">Emails</span>
													</div>
												</a>
												<a class="col-6 col-md-4 p-0" href="#">
													<div class="quick-actions-item">
														<div class="avatar-item bg-primary rounded-circle">
															<i class="fas fa-file-invoice-dollar"></i>
														</div>
														<span class="text">Invoice</span>
													</div>
												</a>
												<a class="col-6 col-md-4 p-0" href="#">
													<div class="quick-actions-item">
														<div class="avatar-item bg-secondary rounded-circle">
															<i class="fas fa-credit-card"></i>
														</div>
														<span class="text">Payments</span>
													</div>
												</a>
											</div>
										</div>
									</div>
								</div>
							</li> --}}

							<li class="nav-item topbar-user dropdown hidden-caret">
								<a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
									<div class="avatar-sm">
										<img src="{{ asset('admin') }}/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
									</div>
									<span class="profile-username">
									 <span class="fw-bold">{{Auth::user()->name}}</span>
									</span>
								</a>
								<ul class="dropdown-menu dropdown-user animated fadeIn">
									<div class="dropdown-user-scroll scrollbar-outer">
										<li>
											<div class="user-box">
												<div class="avatar-lg"><img src="{{ asset('admin') }}/assets/img/profile.jpg" alt="image profile" class="avatar-img rounded"></div>
												<div class="u-text">
													<h4>{{Auth::user()->name}}</h4>
													<p class="text-muted">{{Auth::user()->username}}</p>
                                                    <a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
												</div>
											</div>
										</li>
										<li>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#">My Profile</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#">Account Setting</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="#">Logout</a>

                                            <form id="logout-form" action="{{ route('custom-logout') }}" method="POST" style="display: none;">
                                                     {{ csrf_field() }}
                                             </form>
										</li>
									</div>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
				<!-- End Navbar -->
			</div>
         @yield('content')
         <footer class="footer">
            <div class="container-fluid">
                {{-- <div class="copyright ms-auto">{{ $companyInformation->applicationSetting->copyright_text }}</div> --}}
            </div>
        </footer>
    </div>
</div>
<!--   Core JS Files   -->
<script src="{{ asset('admin') }}/assets/js/core/jquery-3.7.1.min.js"></script>
<script src="{{ asset('admin') }}/assets/js/core/popper.min.js"></script>
<script src="{{ asset('admin') }}/assets/js/core/bootstrap.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('admin') }}/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Moment JS -->
<script src="{{ asset('admin') }}/assets/js/plugin/moment/moment.min.js"></script>

<!-- Chart JS -->
<script src="{{ asset('admin') }}/assets/js/plugin/apexchart/apexcharts.min.js"></script>
<script src="{{ asset('admin') }}/assets/js/plugin/apexchart/chart-data.js"></script>

<script src="{{ asset('admin') }}/assets/js/plugin/chart.js/chart.min.js"></script>
<script src="{{ asset('admin') }}/assets/js/plugin/chart.js/chart-data.js"></script>
<script src="{{ asset('admin') }}/assets/js/plugin/chart.js/chart.js"></script>

<!-- jQuery Sparkline -->
<script src="{{ asset('admin') }}/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="{{ asset('admin') }}/assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="{{ asset('admin') }}/assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="{{ asset('admin') }}/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="{{ asset('admin') }}/assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
<script src="{{ asset('admin') }}/assets/js/plugin/jsvectormap/world.js"></script>

<!-- Dropzone -->
<script src="{{ asset('admin') }}/assets/js/plugin/dropzone/dropzone.min.js"></script>

<!-- Fullcalendar -->
<script src="{{ asset('admin') }}/assets/js/plugin/fullcalendar/fullcalendar.min.js"></script>

<!-- DateTimePicker -->
<script src="{{ asset('admin') }}/assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>

<!-- Bootstrap Tagsinput -->
<script src="{{ asset('admin') }}/assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

<!-- jQuery Validation -->
<script src="{{ asset('admin') }}/assets/js/plugin/jquery.validate/jquery.validate.min.js"></script>

<!-- Summernote -->
<script src="{{ asset('admin') }}/assets/js/plugin/summernote/summernote-lite.min.js"></script>

<!-- Select2 -->
<script src="{{ asset('admin') }}/assets/js/plugin/select2/select2.full.min.js"></script>

<!-- Sweet Alert -->
<script src="{{ asset('admin') }}/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Owl Carousel -->
<script src="{{ asset('admin') }}/assets/js/plugin/owl-carousel/owl.carousel.min.js"></script>

<!-- Magnific Popup -->
<script src="{{ asset('admin') }}/assets/js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Kaiadmin JS -->
<script src="{{ asset('admin') }}/assets/js/kaiadmin.creative.min.js"></script>


<!-- Kaiadmin DEMO methods, don't include it in your project! -->
{{-- <script src="{{ asset('admin') }}/assets/js/setting-demo.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- <script src="{{ asset('admin') }}/assets/js/demo.js"></script> -->

@stack('scripts')

<script>
    $(document).ready(function () {
        let searchResults = [];

        function debounce(func, delay) {
            let timer;
            return function () {
                clearTimeout(timer);
                timer = setTimeout(() => func.apply(this, arguments), delay);
            };
        }

        $('#adminSearch').on('keyup', debounce(function () {
            let query = $(this).val();
            if (query.length < 2) {
                $('#searchResults').hide();
                return;
            }

            $.ajax({
                url: "{{ route('admin.search') }}",
                method: 'GET',
                data: { query: query },
                success: function (response) {
                    searchResults = response;
                    let dropdown = $('#searchResults');
                    dropdown.empty();

                    if (response.length > 0) {
                        response.forEach((item) => {
                            dropdown.append(`
                                <li class="dropdown-item" data-url="${item.url}">
                                    <i class="fa fa-arrow-right text-primary me-2"></i> ${item.name}
                                </li>
                            `);
                        });

                        dropdown.show();
                    } else {
                        dropdown.append('<li class="dropdown-item text-muted">No results found</li>').show();
                    }
                }
            });
        }, 300));

        $(document).on('click', '#searchResults .dropdown-item', function () {
            window.location.href = $(this).data('url');
        });

        $(document).click(function (e) {
            if (!$(e.target).closest('#adminSearch, #searchResults').length) {
                $('#searchResults').hide();
            }
        });
    });


    $('#datetime').datetimepicker({
        format: 'MM/DD/YYYY H:mm',
    });
    $('.datepicker').datetimepicker({
        format: 'YYYY/MM/DD',
    });
    $('.monthyearpicker').datetimepicker({
        format: 'YYYY/MM',
    });
    $('.timepicker').datetimepicker({
        format: 'h:mm A',
    });

    $('.select2').select2({
        theme: "bootstrap",
        width: "100%"
    });

    $('.multipleSelect2').select2({
        theme: "bootstrap",
        placeholder: "--Select--",
        width: "100%"
    });


    $('#multiple-states').select2({
        theme: "bootstrap"
    });

    $('#tagsinput').tagsinput({
        tagClass: 'badge-info'
    });

</script>
<script>
    $('.summernote').summernote({
        placeholder: '',
        fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Times New Roman'], // Added Times New Roman
        tabsize: 2,
        height: 300,
        lineHeights: ['0.5', '1', '1.5', '2', '2.5', '3'],
    });
</script>

{{-- bootstrap notify --}}

<script>
    $(document).ready(function(){
        @if(session('success'))
            $.notify(
                {
                    message: "<strong>{{ session('success') }}</strong>",
                    icon: 'fas fa-check-circle',
                },
                {
                    type: "success",
                    allow_dismiss: true,
                    delay: 3000,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                }
            );
        @endif

        @if(session('danger'))
            $.notify(
                {
                    message: "<strong>{{ session('danger') }}</strong>",
                    icon: 'fas fa-exclamation-circle',
                },
                {
                    type: "danger",
                    allow_dismiss: true,
                    delay: 000,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                }
            );
        @endif
        @if(session('error'))
            $.notify(
                {
                    message: "<strong>{{ session('error') }}</strong>",
                    icon: 'fas fa-times-circle',
                },
                {
                    type: "danger",
                    allow_dismiss: true,
                    delay: 6000,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                }
            );
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                $.notify(
                    {
                        message: "<strong>{{ $error }}</strong>",
                        icon: 'fas fa-exclamation-circle',
                    },
                    {
                        type: "warning",
                        allow_dismiss: true,
                        delay: 6000,
                        placement: {
                            from: "top",
                            align: "right"
                        },
                    }
                );
            @endforeach
        @endif
    });
</script>


{{-- form next previous button start --}}
<script>
    document.querySelectorAll('.continue').forEach(function(button) {
        button.addEventListener('click', function() {
            var currentTab = document.querySelector('.nav-link.active');
            var nextTab = currentTab.parentElement.nextElementSibling;

            if (nextTab) {
                var nextTabLink = nextTab.querySelector('.nav-link');
                nextTabLink.click();
            }
        });
    });
    document.querySelectorAll('.back').forEach(function(button) {
        button.addEventListener('click', function() {
            var currentTab = document.querySelector('.nav-link.active');
            var prevTab = currentTab.parentElement.previousElementSibling;

            if (prevTab) {
                var prevTabLink = prevTab.querySelector('.nav-link');
                prevTabLink.click();
            }
        });
    });
</script>
{{-- form next previous button end --}}
<script >
    $(document).ready(function() {
        $('.basic-datatables').DataTable();
    });
</script>
</body>
</html>
