<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
		<meta name="description" content="Dashlead -  Admin Panel HTML Dashboard Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="sales dashboard, admin dashboard, bootstrap 4 admin template, html admin template, admin panel design, admin panel design, bootstrap 4 dashboard, admin panel template, html dashboard template, bootstrap admin panel, sales dashboard design, best sales dashboards, sales performance dashboard, html5 template, dashboard template">
		<!-- Favicon -->
		<link rel="icon" href="{{ URL::to('/') }}/assets/img/brand/favicon.ico" type="image/x-icon">

		<!-- Title -->
		<title>Dashlead -  Admin Panel HTML Dashboard Template</title>

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
			
				
                @yield('content')
			</div>
			<!-- End Main Content-->
            	
		</div>
		<!-- End Page -->
		@extends('layouts.script')

	
	</body>
</html>