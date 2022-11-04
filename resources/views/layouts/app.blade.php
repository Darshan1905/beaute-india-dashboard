<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
		<meta name="description" content="Dashlead -  Admin Panel HTML Dashboard Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="sales dashboard, admin dashboard, bootstrap 4 admin template, html admin template, admin panel design, admin panel design, bootstrap 4 dashboard, admin panel template, html dashboard template, bootstrap admin panel, sales dashboard design, best sales dashboards, sales performance dashboard, html5 template, dashboard template">
		<!-- Favicon -->
		<!-- <link rel="icon" href="{{ URL::to('/') }}/assets/img/brand/favicon.ico" type="image/x-icon"> -->

		<!-- Title -->
		<title>Beaut India -  Admin Panel</title>

		<!---Fontawesome css-->
		<link href="{{ URL::to('/') }}/assets/plugins/fontawesome-free/css/all.min.css" rel="stylesheet">

		<!---Ionicons css-->
		<link href="{{ URL::to('/') }}/assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet">

		<!---Typicons css-->
		<link href="{{ URL::to('/') }}/assets/plugins/typicons.font/typicons.css" rel="stylesheet">

		<!---Feather css-->
		<link href="{{ URL::to('/') }}/assets/plugins/feather/feather.css" rel="stylesheet">

		<!---Falg-icons css-->
		<link href="{{ URL::to('/') }}/assets/plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">

		<!---Style css-->
		<link href="{{ URL::to('/') }}/assets/css/style.css" rel="stylesheet">
		<link href="{{ URL::to('/') }}/assets/css/custom-style.css" rel="stylesheet">
		<link href="{{ URL::to('/') }}/assets/css/skins.css" rel="stylesheet">
		<link href="{{ URL::to('/') }}/assets/css/dark-style.css" rel="stylesheet">
		<link href="{{ URL::to('/') }}/assets/css/custom-dark-style.css" rel="stylesheet">

		<!---Select2 css-->
        <link href="{{ URL::to('/') }}/assets/plugins/select2/css/select2.min.css" rel="stylesheet">
        <!--Mutipleselect css-->
        <link rel="stylesheet" href="{{ URL::to('/') }}/assets/plugins/multipleselect/multiple-select.css">
        <!---Jquery.mCustomScrollbar css-->
        <link href="{{ URL::to('/') }}/assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet">

		<!---Sidebar css-->
		<link href="{{ URL::to('/') }}/assets/plugins/sidebar/sidebar.css" rel="stylesheet">

		<!---Sidemenu css-->
		<link href="{{ URL::to('/') }}/assets/plugins/sidemenu/sidemenu.css" rel="stylesheet">
		
		

		<!---DataTables css-->
		<link href="{{ URL::to('/') }}/assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
		<link href="{{ URL::to('/') }}/assets/plugins/datatable/responsivebootstrap4.min.css" rel="stylesheet">
		<link href="{{ URL::to('/') }}/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css" rel="stylesheet">
		<!---Switcher css-->
		<link href="{{ URL::to('/') }}/assets/switcher/css/switcher.css" rel="stylesheet">
		<link href="{{ URL::to('/') }}/assets/switcher/demo.css" rel="stylesheet">	
        @yield('links')
    </head>

	<body>
		
		<!-- Loader -->
		<div id="global-loader">
			<img src="{{ URL::to('/') }}/assets/img/loader.svg" class="loader-img" alt="Loader">
		</div>
		<!-- End Loader -->

		<!-- Page -->
		<div class="page">
			
         
		    @extends('layouts.sidebar')
			<!-- Main Content-->
			<div class="main-content side-content pt-0">
				<!-- Main Header-->
				<div class="main-header side-header sticky" style="background: #F7F7F7;">
					<div class="container-fluid">
						<div class="main-header-left">
							<a class="main-logo d-lg-none" href="{{ URL::to('/') }}">
								<img src="{{ URL::to('/') }}/assets/img/beautindia.jpg" class="header-brand-img desktop-logo" alt="logo">
								<img src="{{ URL::to('/') }}/assets/img/beautindia.jpg" class="header-brand-img icon-logo" alt="logo">
								<img src="{{ URL::to('/') }}/assets/img/beautindia.jpg" class="header-brand-img desktop-logo theme-logo" alt="logo">
								<img src="{{ URL::to('/') }}/assets/img/beautindia.jpg" class="header-brand-img icon-logo theme-logo" alt="logo">
							</a>
							<a class="main-header-menu-icon" href="" id="mainSidebarToggle"><span></span></a>
						</div>
						<div class="main-header-right">
							<div class="dropdown d-md-flex header-search">
								<a class="nav-link icon header-search">
									<i class="fe fe-search"></i>
								</a>
								<div class="dropdown-menu">
									<div class="main-form-search p-2">
										<input class="form-control" placeholder="Search" type="search">
										<button class="btn"><i class="fe fe-search"></i></button>
									</div>
								</div>
							</div>
							<div class="dropdown d-md-flex">
								<a class="nav-link icon full-screen-link">
									<i class="fe fe-maximize fullscreen-button"></i>
								</a>
							</div>
							<div class="dropdown main-header-notification">
								<a class="nav-link icon" href="">
									<i class="fe fe-bell"></i>
									<span class="pulse bg-danger"></span>
								</a>
								<div class="dropdown-menu">
									<div class="header-navheading">
										<p class="main-notification-text">You have 1 unread notification<span class="badge badge-pill badge-primary ml-3">View all</span></p>
									</div>
									<div class="main-notification-list">
										<div class="media new">
											<div class="main-img-user online"><img alt="avatar" src="{{ URL::to('/') }}/assets/img/users/5.jpg"></div>
											<div class="media-body">
												<p>Congratulate <strong>Olivia James</strong> for New template start</p><span>Oct 15 12:32pm</span>
											</div>
										</div>
										<div class="media">
											<div class="main-img-user"><img alt="avatar" src="{{ URL::to('/') }}/assets/img/users/2.jpg"></div>
											<div class="media-body">
												<p><strong>Joshua Gray</strong> New Message Received</p><span>Oct 13 02:56am</span>
											</div>
										</div>
										<div class="media">
											<div class="main-img-user online"><img alt="avatar" src="{{ URL::to('/') }}/assets/img/users/3.jpg"></div>
											<div class="media-body">
												<p><strong>Elizabeth Lewis</strong> added new schedule realease</p><span>Oct 12 10:40pm</span>
											</div>
										</div>
									</div>
									<div class="dropdown-footer">
										<a href="">View All Notifications</a>
									</div>
								</div>
							</div>
							<div class="dropdown main-profile-menu">
								<a class="main-img-user" href=""><img alt="avatar" src="{{ URL::to('/') }}/assets/img/users/1.jpg"></a>
								<div class="dropdown-menu">
									<div class="header-navheading">
										<h6 class="main-notification-title">{{Auth::user()->name}}</h6>
										<!-- <p class="main-notification-text">Web Designer</p> -->
									</div>
								<!-- 	<a class="dropdown-item border-top" href="">
										<i class="fe fe-user"></i> My Profile
									</a>
									<a class="dropdown-item" href="">
										<i class="fe fe-edit"></i> Edit Profile
									</a> -->
									<!-- <a class="dropdown-item" href="">
										<i class="fe fe-settings"></i> Account Settings
									</a>
									<a class="dropdown-item" href="">
										<i class="fe fe-settings"></i> Support
									</a>
									<a class="dropdown-item" href="">
										<i class="fe fe-compass"></i> Activity
									</a> -->
									
									<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                      <i class="fe fe-power"></i>  Sign Out
									  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    </a>
									
								</div>
							</div>
							<!-- <div class="dropdown d-md-flex header-settings">
								<a href="#" class="nav-link icon" data-toggle="sidebar-right" data-target=".sidebar-right">
									<i class="fe fe-align-right"></i>
								</a>
							</div> -->
						</div>
					</div>
				</div>
				<!-- End Main Header-->
				
                @yield('content')
			</div>
			<!-- End Main Content-->
            	
         
		@extends('layouts.footer')
		</div>
		<!-- End Page -->
		@extends('layouts.script')

	
	</body>
</html>