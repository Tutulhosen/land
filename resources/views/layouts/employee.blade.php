<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>HRM | @yield('title')</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" href="{{ asset('storage/'. $companyInformation->brandSetting->favicon) }}" type="image/x-icon"/>
    {{-- font awsome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
	<!-- Fonts and icons -->
	<script src="{{ asset('employee') }}/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Public Sans:300,400,500,600,700"]},
			custom: {"families":["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('employee') }}/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('employee') }}/assets/css/plugins.min.css">
	<link rel="stylesheet" href="{{ asset('employee') }}/assets/css/kaiadmin.creative.min.css">
	<link rel="stylesheet" href="{{ asset('employee') }}/assets/css/onebiterp.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('employee') }}/assets/css/demo.css">
	<link rel="stylesheet" href="{{ asset('employee') }}/assets/css/task-board.scss">
	<link rel="stylesheet" href="{{ asset('employee') }}/assets/css/drag.css">
	<link rel="stylesheet" href="{{ asset('employee') }}/assets/css/dragula.css">
    <link rel="stylesheet" href="{{ asset('employee') }}/assets/css/smarthr.css">
    @stack('styles')
</head>
<body class="trendy-layout">
	<div class="wrapper">

		@include('employee.include.sidebar')

		<div class="main-panel">
			<div class="main-header">
				<div class="main-header-logo">
					<!-- Logo Header -->
					<div class="logo-header" data-background-color="blue">

						<a href="dashboard.php" class="logo">
							<img src="{{ asset('employee') }}/assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20">
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
				<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

					<div class="container-fluid">
						<nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pe-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</nav>

                        <div class="navbar-nav topbar-nav ms-md-auto align-items-center w-50">
                            <marquee direction="left" class="text-white">
                                <?php
                                    use App\Models\Admin\Announcement\Announcement;
                                    use App\Models\Admin\Announcement\NoticeBoard;
                                    $user = Auth::user();

                                    if ($user->department_id && $user->branch_id) {
                                        $announcements = Announcement::whereHas('announcementDepartments', function ($query) use ($user) {
                                            $query->where(function ($q) use ($user) {
                                                $q->where('branch_id', $user->branch_id)
                                                ->orWhereNull('branch_id');
                                            })->where('department_id', $user->department_id);
                                        })->where('status', true) ->where('publish_date', '<=', now())->whereDate('effective_date', '>=', now()->subDay())->get();

                                        $noticeboards = NoticeBoard::whereHas('noticeboardDepartments', function ($query) use ($user) {
                                            $query->where(function ($q) use ($user) {
                                                $q->where('branch_id', $user->branch_id)
                                                ->orWhereNull('branch_id');
                                            })->where('department_id', $user->department_id);
                                        })->where('status', true)->whereDate('valid_till', '>=', now()->subDay())->get();
                                    }

                                ?>
                                @if (count($announcements) > 0)
                                <b>Announcement:</b> &nbsp;
                                @foreach ($announcements as $announcement)
                                <a href="{{route('employee.announcement.view',$announcement->id)}}" class="text-white"><i class="fas fa-circle fs-4"></i> {{$announcement->title}}. </a>&nbsp; &nbsp;
                                @endforeach
                                &nbsp; &nbsp; &nbsp; &nbsp;
                                @endif
                                @if (count($noticeboards) > 0)
                                <b> Notice:</b> &nbsp;
                                    @foreach ($noticeboards as $noticeboard)
                                    <a href="{{route('employeee.noticeboard.view',$noticeboard->id)}}"  class="text-white"><i class="fas fa-circle fs-4"></i> {{$noticeboard->title}}.</a> &nbsp; &nbsp;
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
							<li class="nav-item topbar-icon dropdown hidden-caret">
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
														<img src="{{ asset('employee') }}/assets/img/jm_denis.jpg" alt="Img Profile">
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
														<img src="{{ asset('employee') }}/assets/img/chadengle.jpg" alt="Img Profile">
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
														<img src="{{ asset('employee') }}/assets/img/mlane.jpg" alt="Img Profile">
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
														<img src="{{ asset('employee') }}/assets/img/talha.jpg" alt="Img Profile">
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
							</li>
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
														<img src="{{ asset('employee') }}/assets/img/profile2.jpg" alt="Img Profile">
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
							<li class="nav-item topbar-icon dropdown hidden-caret">
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
							</li>

							<li class="nav-item topbar-user dropdown hidden-caret">
								<a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
									<div class="avatar-sm">
                                        @if (Auth::user()->employee->employeeDocument)
                                        <img src="{{ asset('storage/'. Auth::user()->employee->employeeDocument->profile_picture) }}" alt="pp" class="avatar-img rounded-circle">
                                        @else
                                        <img src="{{ asset('employee') }}/assets/img/demo-user.png" alt="pp" class="avatar-img rounded-circle">
                                        @endif
									</div>
									<span class="profile-username">
									 <span class="fw-bold">{{Auth::user()->employee->salutations->name ?? ''}} {{ Auth::user()->employee->first_name ?? 'Employee' }} {{Auth::user()->employee->last_name ?? ''}}</span>
									</span>
								</a>
								<ul class="dropdown-menu dropdown-user animated fadeIn">
									<div class="dropdown-user-scroll scrollbar-outer">
										<li>
											<div class="user-box">
												<div class="avatar-lg">
                                                    @if (Auth::user()->employee->employeeDocument)
                                                    <img src="{{ asset('storage/'. Auth::user()->employee->employeeDocument->profile_picture) }}" alt="pp" class="avatar-img rounded">
                                                    @else
                                                    <img src="{{ asset('employee') }}/assets/img/demo-user.png" alt="pp" class="avatar-img rounded">
                                                    @endif
                                                </div>
												<div class="u-text">
													<h4>{{Auth::user()->employee->salutations->name}} {{Auth::user()->employee->first_name}} {{Auth::user()->employee->last_name}}</h4>
													<p class="text-muted">{{Auth::user()->user_email}}</p>
                                                    <a href="{{route('employee-profile',Auth::user()->employee->id )}}" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
												</div>
											</div>
										</li>
										<li>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="{{route('employee-profile',Auth::user()->employee->id )}}">My Profile</a>
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
                    <div class="copyright ms-auto">{{ $companyInformation->applicationSetting->copyright_text }}</div>
                </div>
            </footer>
		</div>
	</div>
	<!--   Core JS Files   -->
	<script src="{{ asset('employee') }}/assets/js/core/jquery-3.7.1.min.js"></script>
	<script src="{{ asset('employee') }}/assets/js/core/popper.min.js"></script>
	<script src="{{ asset('employee') }}/assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ asset('employee') }}/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

	<!-- Moment JS -->
	<script src="{{ asset('employee') }}/assets/js/plugin/moment/moment.min.js"></script>

   <!-- Chart JS -->
    <script src="{{ asset('employee') }}/assets/js/plugin/apexchart/apexcharts.min.js"></script>
    <script src="{{ asset('employee') }}/assets/js/plugin/apexchart/chart-data.js"></script>

    <script src="{{ asset('employee') }}/assets/js/plugin/chart.js/chart.min.js"></script>
    <script src="{{ asset('employee') }}/assets/js/plugin/chart.js/chart-data.js"></script>
    <script src="{{ asset('employee') }}/assets/js/plugin/chart.js/chart.js"></script>

    <script src="{{ asset('employee') }}/assets/js/plugin/c3-chart/d3.v5.min.js"></script>
    <script src="{{ asset('employee') }}/assets/js/plugin/c3-chart/c3.min.js"></script>
    <script src="{{ asset('employee') }}/assets/js/plugin/c3-chart/chart-data.js"></script>

    <!-- Theme Script js -->
	<script src="{{ asset('employee') }}/assets/js/theme-script.js"></script>

	<!-- Custom JS -->
	<script src="{{ asset('employee') }}/assets/js/circle-progress.js"></script>
	<script src="{{ asset('employee') }}/assets/js/todo.js"></script>
	<script src="{{ asset('employee') }}/assets/js/theme-colorpicker.js"></script>
	<script src="{{ asset('employee') }}/assets/js/script.js"></script>

	<!-- jQuery Sparkline -->
	<script src="{{ asset('employee') }}/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="{{ asset('employee') }}/assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="{{ asset('employee') }}/assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="{{ asset('employee') }}/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="{{ asset('employee') }}/assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
	<script src="{{ asset('employee') }}/assets/js/plugin/jsvectormap/world.js"></script>

	<!-- Dropzone -->
	<script src="{{ asset('employee') }}/assets/js/plugin/dropzone/dropzone.min.js"></script>

	<!-- Fullcalendar -->
	<script src="{{ asset('employee') }}/assets/js/plugin/fullcalendar/fullcalendar.min.js"></script>

	<!-- DateTimePicker -->
	<script src="{{ asset('employee') }}/assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>

	<!-- Bootstrap Tagsinput -->
	<script src="{{ asset('employee') }}/assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

	<!-- jQuery Validation -->
	<script src="{{ asset('employee') }}/assets/js/plugin/jquery.validate/jquery.validate.min.js"></script>

	<!-- Summernote -->
	<script src="{{ asset('employee') }}/assets/js/plugin/summernote/summernote-lite.min.js"></script>

	<!-- Select2 -->
	<script src="{{ asset('employee') }}/assets/js/plugin/select2/select2.full.min.js"></script>

	<!-- Sweet Alert -->
	<script src="{{ asset('employee') }}/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- clock cdn -->
	<script src="https://cdn.lordicon.com/lordicon.js"></script>

	<!-- Owl Carousel -->
	<script src="{{ asset('employee') }}/assets/js/plugin/owl-carousel/owl.carousel.min.js"></script>

	<!-- Magnific Popup -->
	<script src="{{ asset('employee') }}/assets/js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js"></script>

	<!-- Kaiadmin JS -->
	<script src="{{ asset('employee') }}/assets/js/kaiadmin.creative.min.js"></script>

	<!-- Kaiadmin DEMO methods, don't include it in your project! -->
	<script src="{{ asset('employee') }}/assets/js/setting-demo.js"></script>
    @stack('scripts')

	<script>
		Circles.create({
			id:'circles-1',
			radius:45,
			value:60,
			maxValue:100,
			width:7,
			text: 5,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:45,
			value:70,
			maxValue:100,
			width:7,
			text: 36,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value:40,
			maxValue:100,
			width:7,
			text: 12,
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
				datasets : [{
					label: "Total Income",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines : {
							drawBorder: false,
							display : false
						}
					}],
					xAxes : [ {
						gridLines : {
							drawBorder: false,
							display : false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>
	<script>

		$('#datetime').datetimepicker({
            format: 'MM/DD/YYYY H:mm',
        });
        $('.datepicker').datetimepicker({
            format: 'YYYY/MM/DD',
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
		$('#summernote').summernote({
			placeholder: 'kaiadmin',
			fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
			tabsize: 2,
			height: 300
		});
	</script>
    <script>
        $(document).ready(function() {
            $('.basic-datatables').DataTable();
        });
    </script>

    {{-- bootstrap notify --}}
@if(session('success') || session('danger'))
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
                        delay: 3000,
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
        });
    </script>
@endif
	{{-- <script>
	    (function () {
  const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

  //I'm adding this section so I don't have to keep updating this pen every year :-)
  //remove this if you don't need it
  let today = new Date(),
      dd = String(today.getDate()).padStart(2, "0"),
      mm = String(today.getMonth() + 1).padStart(2, "0"),
      yyyy = today.getFullYear(),
      nextYear = yyyy + 1,
      dayMonth = "12/12/",
      birthday = dayMonth + yyyy;

  today = mm + "/" + dd + "/" + yyyy;
  if (today > birthday) {
    birthday = dayMonth + nextYear;
  }
  //end

  const countDown = new Date(birthday).getTime(),
      x = setInterval(function() {

        const now = new Date().getTime(),
              distance = countDown - now;

        document.getElementById("days").innerText = Math.floor(distance / (day)),
          document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
          document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
          document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

        //do something later when date is reached
        if (distance < 0) {
          document.getElementById("headline").innerText = "Today is the Day!";
          document.getElementById("countdown").style.display = "none";
          document.getElementById("content").style.display = "block";
          clearInterval(x);
        }
        //seconds
      }, 0)
  }());
	</script> --}}
</body>
</html>
