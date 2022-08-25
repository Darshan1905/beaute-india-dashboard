@extends('admin.layout.main')
@section(main.container)

<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
		<meta name="description" content="Dashlead -  Admin Panel HTML Dashboard Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="sales dashboard, admin dashboard, bootstrap 4 admin template, html admin template, admin panel design, admin panel design, bootstrap 4 dashboard, admin panel template, html dashboard template, bootstrap admin panel, sales dashboard design, best sales dashboards, sales performance dashboard, html5 template, dashboard template">
		<!-- Favicon -->
		<link rel="icon" href="assets/img/brand/favicon.ico" type="image/x-icon">

		<!-- Title -->
		<title>Dashlead -  Admin Panel HTML Dashboard Template</title>

		<!---Fontawesome css-->
		<link href="assets/plugins/fontawesome-free/css/all.min.css" rel="stylesheet">

		<!---Ionicons css-->
		<link href="assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet">

		<!---Typicons css-->
		<link href="assets/plugins/typicons.font/typicons.css" rel="stylesheet">

		<!---Feather css-->
		<link href="assets/plugins/feather/feather.css" rel="stylesheet">

		<!---Falg-icons css-->
		<link href="assets/plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">

		<!---Style css-->
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/custom-style.css" rel="stylesheet">
		<link href="assets/css/skins.css" rel="stylesheet">
		<link href="assets/css/dark-style.css" rel="stylesheet">
		<link href="assets/css/custom-dark-style.css" rel="stylesheet">

		<!---Select2 css-->
<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet">
<!--Mutipleselect css-->
<link rel="stylesheet" href="assets/plugins/multipleselect/multiple-select.css">
<!---Jquery.mCustomScrollbar css-->
<link href="assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet">

		<!---Sidebar css-->
		<link href="assets/plugins/sidebar/sidebar.css" rel="stylesheet">

		<!---Sidemenu css-->
		<link href="assets/plugins/sidemenu/sidemenu.css" rel="stylesheet">
		
		
		<!---Switcher css-->
		<link href="assets/switcher/css/switcher.css" rel="stylesheet">
		<link href="assets/switcher/demo.css" rel="stylesheet">	</head>

	<body>
		
		<!-- Start Switcher -->
		<div class="switcher-wrapper">
			<div class="demo_changer">
				<div class="demo-icon bg_dark"><i class="fa fa-cog fa-spin  text_primary"></i></div>
				<div class="form_holder sidebar-right1">
					<div class="row">
						<div class="predefined_styles">
							<div class="swichermainleft border-bottom text-center">
								<div class="p-3">
									<a href="https://laravel.spruko.com/dashlead/" class="btn btn-primary btn-block mt-0">View Demo</a>
									<a href="../../item/dashlead-laravel-admin-template/26207818.html" class="btn btn-secondary btn-block">Buy Now</a>
									<a href="https://themeforest.net/user/sprukosoft/portfolio" class="btn btn-info btn-block">Our Portfolio</a>
								</div>
							</div>
							<div class="swichermainleft">
								<h4>Navigation Style</h4>
								<div class="pl-3 pr-3">
									<a class="btn btn-primary btn-block" href="https://laravel.spruko.com/dashlead/Horizontal-Light/index">
										Horizontal
									</a>
									<a class="btn btn-secondary btn-block" href="index.html">
										Left-menu
									</a>
								</div>
							</div>
							<div class="swichermainleft">
								<h4>Theme Layout</h4>
								<div class="switch_section">
									<div class="switch-toggle d-flex">
										<span class="mr-auto">Light Theme</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch" class="onoffswitch2-checkbox" checked="">
											<label for="myonoffswitch" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="switch-toggle d-flex">
										<span class="mr-auto">Dark Theme</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch1" class="onoffswitch2-checkbox">
											<label for="myonoffswitch1" class="onoffswitch2-label"></label>
										</div>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="swichermainleft">
								<h4>Header Styles Mode</h4>
								<div class="switch_section">
									<div class="switch-toggle d-flex">
										<span class="mr-auto">Color Header</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch3" class="onoffswitch2-checkbox">
											<label for="myonoffswitch3" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="switch-toggle d-flex">
										<span class="mr-auto">Graident Header</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch4" class="onoffswitch2-checkbox">
											<label for="myonoffswitch4" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="switch-toggle d-flex">
										<span class="mr-auto">Reset Header</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch2" class="onoffswitch2-checkbox">
											<label for="myonoffswitch2" class="onoffswitch2-label"></label>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft">
								<h4>Leftmenu Styles Mode</h4>
								<div class="switch_section">
									<div class="switch-toggle d-flex">
										<span class="mr-auto">Color Menu</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch10" class="onoffswitch2-checkbox">
											<label for="myonoffswitch10" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="switch-toggle d-flex dark-switch">
										<span class="mr-auto">Dark Menu</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch11" class="onoffswitch2-checkbox">
											<label for="myonoffswitch11" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="light-switch">
										<div class="switch-toggle d-flex">
											<span class="mr-auto">Light Menu</span>
											<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch9" class="onoffswitch2-checkbox">
												<label for="myonoffswitch9" class="onoffswitch2-label"></label>
											</div>
										</div>
									</div>
									<div class="switch-toggle d-flex">
										<span class="mr-auto">Gradient-Color Menu</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch12" class="onoffswitch2-checkbox">
											<label for="myonoffswitch12" class="onoffswitch2-label"></label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Switcher -->
		
		<!-- Loader -->
		<div id="global-loader">
			<img src="assets/img/loader.svg" class="loader-img" alt="Loader">
		</div>
		<!-- End Loader -->

		<!-- Page -->
		<div class="page">
			<!-- Sidemenu -->
			<div class="main-sidebar main-sidebar-sticky side-menu">
				<div class="sidemenu-logo">
					<a class="main-logo" href="index.html">
						<img src="assets/img/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
						<img src="assets/img/brand/icon.png" class="header-brand-img icon-logo" alt="logo">
						<img src="assets/img/brand/logo-light.png" class="header-brand-img desktop-logo theme-logo" alt="logo">
						<img src="assets/img/brand/icon-light.png" class="header-brand-img icon-logo theme-logo" alt="logo">
					</a>
				</div>
				<div class="main-sidebar-body">
					<ul class="nav">
						<li class="nav-label">Dashboard</li>
						<li class="nav-item show">
							<a class="nav-link" href="index.html"><i class="fe fe-airplay"></i><span class="sidemenu-label">Dashboard</span></a>
						</li>
						<li class="nav-label">Applications</li>
						<li class="nav-item">
							<a class="nav-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/widgets"><i class="fe fe-database"></i><span class="sidemenu-label">Widgets</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link with-sub" href=""><i class="fe fe-mail"></i><span class="sidemenu-label">Mail</span><span class="badge badge-primary side-badge">2</span></a>
							<ul class="nav-sub">
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/mail">Mail-Inbox</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/viewmail">View-Mail</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link with-sub" href=""><i class="fe fe-box"></i><span class="sidemenu-label">Apps</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="nav-sub">
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/chat">Chat</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/cards">Cards</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/calendar">Calendar</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/contacts">Contacts</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/icons"><i class="fe fe-award"></i><span class="sidemenu-label">Icons</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link with-sub" href=""><i class="fe fe-map-pin"></i><span class="sidemenu-label">Maps</span><span class="badge badge-secondary side-badge">2</span></a>
							<ul class="nav-sub">
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/map-mapel">Mapel Maps</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/map-vector">Vector Maps</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link with-sub" href=""><i class="fe fe-layout"></i><span class="sidemenu-label">Tables</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="nav-sub">
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/table-basic">Basic Tables</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/table-data">Data Tables</a>
								</li>
							</ul>
						</li>
						<li class="nav-label">Components</li>
						<li class="nav-item">
							<a class="nav-link with-sub" href=""><i class="fe fe-layers"></i><span class="sidemenu-label">Elements</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="nav-sub">
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/alerts">Alerts</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/avatar">Avatar</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/breadcrumbs">Breadcrumbs</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/buttons">Buttons</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/badge">Badge</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/dropdown">Dropdown</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/thumbnails">Thumbnails</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/list-group">List Group</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/navigation">Navigation</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/pagination">Pagination</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/popover">Popover</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/progress">Progress</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/spinners">Spinners</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/media-object">Media Object</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/typography">Typography</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/tooltip">Tooltip</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/toast">Toast</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/tags">Tags</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link with-sub" href=""><i class="fe fe-package"></i><span class="sidemenu-label">Advanced UI</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="nav-sub">
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/accordion">Accordion</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/carousel">Carousel</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/collapse">Collapse</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/modals">Modals</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/timeline">Timeline</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/darggablecards">Darggable-Cards</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/sweet-alert">Sweet Alert</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/rating">Ratings</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/counters">Counters</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/search">Search</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/userlist">Userlist</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/blog">Blog</a>
								</li>
							</ul>
						</li>
						<li class="nav-label">Forms & Charts </li>
						<li class="nav-item">
							<a class="nav-link with-sub" href=""><i class="fe fe-file"></i><span class="sidemenu-label">Forms</span><span class="badge badge-info side-badge">6</span></a>
							<ul class="nav-sub">
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/form-elements">Form Elements</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/form-advanced">Advanced Forms</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/form-layouts">Form Layouts</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/form-validation">Form Validation</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/form-wizards">Form Wizards</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/form-editor">WYSIWYG Editor</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link with-sub" href=""><i class="fe fe-bar-chart-2"></i><span class="sidemenu-label">Charts</span><span class="badge badge-danger side-badge">5</span></a>
							<ul class="nav-sub">
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/chart-morris">Morris Charts</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/chart-flot">Flot Charts</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/chart-chartjs">ChartJS</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/chart-spark-peity">Sparkline & Peity</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/chart-echart">Echart</a>
								</li>
							</ul>
						</li>
						<li class="nav-label">Other Pages</li>
						<li class="nav-item">
							<a class="nav-link with-sub" href=""><i class="fe fe-compass"></i><span class="sidemenu-label">Pages</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="nav-sub">
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/profile">Profile</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/invoice">Invoice</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/pricing">Pricing</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/gallery">Gallery</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/faq">Faqs</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/empty">Empty Page</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link with-sub" href=""><i class="fe fe-shopping-cart"></i><span class="sidemenu-label">E-Commerce</span><span class="badge badge-success side-badge">3</span></a>
							<ul class="nav-sub">
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/products">Products</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/product-details">Product-Details</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/product-cart">Cart</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link with-sub" href=""><i class="fe fe-codepen"></i><span class="sidemenu-label">Utilities</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="nav-sub">
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/background">Background</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/border">Border</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/display">Display</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/flex">Flex</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/height">Height</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/margin">Margin</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/padding">Padding</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/position">Position</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/width">Width</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/extras">Extras</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link with-sub" href=""><i class="fe fe-aperture"></i><span class="sidemenu-label">Custom Pages</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="nav-sub">
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/signin">Sign In</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/signup">Sign Up</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/forgot">Forgot Password</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/reset">Reset Password</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/lockscreen">Lockscreen</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/underconstruction">UnderConstruction</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/404">404 Error</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/500">500 Error</a>
								</li>
							</ul>
						</li>
						<li class="mt-3">
							<a class="btn ripple btn-success  btn-block text-white text-icon"><i class="fe fe-rotate-cw mr-1"></i>Upgrade to pro</a>
							<a class="btn ripple btn-success  btn-block text-white iconbtn"><i class="fe fe-rotate-cw mr-1"></i></a>
						</li>
					</ul>
				</div>
			</div>
			<!-- End Sidemenu -->
			<!-- Main Content-->
			<div class="main-content side-content pt-0">
				<!-- Main Header-->
				<div class="main-header side-header sticky">
					<div class="container-fluid">
						<div class="main-header-left">
							<a class="main-logo d-lg-none" href="index.html">
								<img src="assets/img/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
								<img src="assets/img/brand/icon.png" class="header-brand-img icon-logo" alt="logo">
								<img src="assets/img/brand/logo-light.png" class="header-brand-img desktop-logo theme-logo" alt="logo">
								<img src="assets/img/brand/icon-light.png" class="header-brand-img icon-logo theme-logo" alt="logo">
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
											<div class="main-img-user online"><img alt="avatar" src="assets/img/users/5.jpg"></div>
											<div class="media-body">
												<p>Congratulate <strong>Olivia James</strong> for New template start</p><span>Oct 15 12:32pm</span>
											</div>
										</div>
										<div class="media">
											<div class="main-img-user"><img alt="avatar" src="assets/img/users/2.jpg"></div>
											<div class="media-body">
												<p><strong>Joshua Gray</strong> New Message Received</p><span>Oct 13 02:56am</span>
											</div>
										</div>
										<div class="media">
											<div class="main-img-user online"><img alt="avatar" src="assets/img/users/3.jpg"></div>
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
								<a class="main-img-user" href=""><img alt="avatar" src="assets/img/users/1.jpg"></a>
								<div class="dropdown-menu">
									<div class="header-navheading">
										<h6 class="main-notification-title">Sonia Taylor</h6>
										<p class="main-notification-text">Web Designer</p>
									</div>
									<a class="dropdown-item border-top" href="">
										<i class="fe fe-user"></i> My Profile
									</a>
									<a class="dropdown-item" href="">
										<i class="fe fe-edit"></i> Edit Profile
									</a>
									<a class="dropdown-item" href="">
										<i class="fe fe-settings"></i> Account Settings
									</a>
									<a class="dropdown-item" href="">
										<i class="fe fe-settings"></i> Support
									</a>
									<a class="dropdown-item" href="">
										<i class="fe fe-compass"></i> Activity
									</a>
									<a class="dropdown-item" href="signin.html">
										<i class="fe fe-power"></i> Sign Out
									</a>
								</div>
							</div>
							<div class="dropdown d-md-flex header-settings">
								<a href="#" class="nav-link icon" data-toggle="sidebar-right" data-target=".sidebar-right">
									<i class="fe fe-align-right"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- End Main Header-->
				<div class="container-fluid">
										<!-- Page Header -->
					<div class="page-header">
						<div>
							<h2 class="main-content-title tx-24 mg-b-5">Welcome To Dashboard</h2>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Sales Dashboard</li>
							</ol>
						</div>
						<div class="d-flex">
							<div class="mr-2">
								<a class="btn ripple btn-outline-primary dropdown-toggle mb-0" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									<i class="fe fe-external-link"></i> Export <i class="fas fa-caret-down ml-1"></i>
								</a>
								<div class="dropdown-menu tx-13">
									<a class="dropdown-item" href="#"><i class="far fa-file-pdf mr-2"></i>Export as Pdf</a>
									<a class="dropdown-item" href="#"><i class="far fa-image mr-2"></i>Export as Image</a>
									<a class="dropdown-item" href="#"><i class="far fa-file-excel mr-2"></i>Export as Excel</a>
								</div>
							</div>
							<div class="">
								<a href="#" class="btn ripple btn-secondary navresponsive-toggler mb-0" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									<i class="fe fe-filter mr-1"></i>  Filter <i class="fas fa-caret-down ml-1"></i>
								</a>
							</div>
						</div>
					</div>
					<!-- End Page Header -->

					<!--Navbar-->
					<div class="responsive-background">
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<div class="advanced-search">
								<div class="row align-items-center">
									<div class="col-md-4">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group mb-lg-0">
													<label class="">From :</label>
													<div class="input-group">
														<div class="input-group-prepend">
															<div class="input-group-text">
																<i class="fe fe-calendar lh--9 op-6"></i>
															</div>
														</div><input class="form-control fc-datepicker" placeholder="11/01/2019" type="text">
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group mb-lg-0">
													<label class="">To :</label>
													<div class="input-group">
														<div class="input-group-prepend">
															<div class="input-group-text">
																<i class="fe fe-calendar lh--9 op-6"></i>
															</div>
														</div><input class="form-control fc-datepicker" placeholder="11/08/2019" type="text">
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group mb-lg-0">
											<label class="">Sales By Country :</label>
											<select class="form-control select2-flag-search" data-placeholder="Select Contry">
												<option value="AF">Afghanistan</option>
												<option value="AL">Albania</option>
												<option value="AD">Andorra</option>
												<option value="AG">Antigua and Barbuda</option>
												<option value="AU">Australia</option>
												<option value="AM">Armenia</option>
												<option value="AO">Angola</option>
												<option value="AR">Argentina</option>
												<option value="AT">Austria</option>
												<option value="AZ">Azerbaijan</option>
												<option value="BA">Bosnia and Herzegovina</option>
												<option value="BB">Barbados</option>
												<option value="BD">Bangladesh</option>
												<option value="BE">Belgium</option>
												<option value="BF">Burkina Faso</option>
												<option value="BG">Bulgaria</option>
												<option value="BH">Bahrain</option>
												<option value="BJ">Benin</option>
												<option value="BN">Brunei</option>
												<option value="BO">Bolivia</option>
												<option value="BT">Bhutan</option>
												<option value="BY">Belarus</option>
												<option value="CD">Congo</option>
												<option value="CA">Canada</option>
												<option value="CF">Central African Republic</option>
												<option value="CI">Cote d'Ivoire</option>
												<option value="CL">Chile</option>
												<option value="CM">Cameroon</option>
												<option value="CN">China</option>
												<option value="CO">Colombia</option>
												<option value="CU">Cuba</option>
												<option value="CV">Cabo Verde</option>
												<option value="CY">Cyprus</option>
												<option value="DJ">Djibouti</option>
												<option value="DK">Denmark</option>
												<option value="DM">Dominica</option>
												<option value="DO">Dominican Republic</option>
												<option value="EC">Ecuador</option>
												<option value="EE">Estonia</option>
												<option value="ER">Eritrea</option>
												<option value="ET">Ethiopia</option>
												<option value="FI">Finland</option>
												<option value="FJ">Fiji</option>
												<option value="FR">France</option>
												<option value="GA">Gabon</option>
												<option value="GD">Grenada</option>
												<option value="GE">Georgia</option>
												<option value="GH">Ghana</option>
												<option value="GH">Ghana</option>
												<option value="HN">Honduras</option>
												<option value="HT">Haiti</option>
												<option value="HU">Hungary</option>
												<option value="ID">Indonesia</option>
												<option value="IE">Ireland</option>
												<option value="IL">Israel</option>
												<option value="IN">India</option>
												<option value="IQ">Iraq</option>
												<option value="IR">Iran</option>
												<option value="IS">Iceland</option>
												<option value="IT">Italy</option>
												<option value="JM">Jamaica</option>
												<option value="JO">Jordan</option>
												<option value="JP">Japan</option>
												<option value="KE">Kenya</option>
												<option value="KG">Kyrgyzstan</option>
												<option value="KI">Kiribati</option>
												<option value="KW">Kuwait</option>
												<option value="KZ">Kazakhstan</option>
												<option value="LA">Laos</option>
												<option value="LB">Lebanons</option>
												<option value="LI">Liechtenstein</option>
												<option value="LR">Liberia</option>
												<option value="LS">Lesotho</option>
												<option value="LT">Lithuania</option>
												<option value="LU">Luxembourg</option>
												<option value="LV">Latvia</option>
												<option value="LY">Libya</option>
												<option value="MA">Morocco</option>
												<option value="MC">Monaco</option>
												<option value="MD">Moldova</option>
												<option value="ME">Montenegro</option>
												<option value="MG">Madagascar</option>
												<option value="MH">Marshall Islands</option>
												<option value="MK">Macedonia (FYROM)</option>
												<option value="ML">Mali</option>
												<option value="MM">Myanmar (formerly Burma)</option>
												<option value="MN">Mongolia</option>
												<option value="MR">Mauritania</option>
												<option value="MT">Malta</option>
												<option value="MV">Maldives</option>
												<option value="MW">Malawi</option>
												<option value="MX">Mexico</option>
												<option value="MZ">Mozambique</option>
												<option value="NA">Namibia</option>
												<option value="NG">Nigeria</option>
												<option value="NO">Norway</option>
												<option value="NP">Nepal</option>
												<option value="NR">Nauru</option>
												<option value="NZ">New Zealand</option>
												<option value="OM">Oman</option>
												<option value="PA">Panama</option>
												<option value="PF">Paraguay</option>
												<option value="PG">Papua New Guinea</option>
												<option value="PH">Philippines</option>
												<option value="PK">Pakistan</option>
												<option value="PL">Poland</option>
												<option value="QA">Qatar</option>
												<option value="RO">Romania</option>
												<option value="RU">Russia</option>
												<option value="RW">Rwanda</option>
												<option value="SA">Saudi Arabia</option>
												<option value="SB">Solomon Islands</option>
												<option value="SC">Seychelles</option>
												<option value="SD">Sudan</option>
												<option value="SE">Sweden</option>
												<option value="SG">Singapore</option>
												<option value="TG">Togo</option>
												<option value="TH">Thailand</option>
												<option value="TJ">Tajikistan</option>
												<option value="TL">Timor-Leste</option>
												<option value="TM">Turkmenistan</option>
												<option value="TN">Tunisia</option>
												<option value="TO">Tonga</option>
												<option value="TR">Turkey</option>
												<option value="TT">Trinidad and Tobago</option>
												<option value="TW">Taiwan</option>
												<option value="UA">Ukraine</option>
												<option value="UG">Uganda</option>
												<option value="UM">United States of America</option>
												<option value="UY">Uruguay</option>
												<option value="UZ">Uzbekistan</option>
												<option value="VA">Vatican City (Holy See)</option>
												<option value="VE">Venezuela</option>
												<option value="VN">Vietnam</option>
												<option value="VU">Vanuatu</option>
												<option value="YE">Yemen</option>
												<option value="ZM">Zambia</option>
												<option value="ZW">Zimbabwe</option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group mb-lg-0">
											<label class="">Products :</label>
											<select multiple="multiple" class="group-filter">
												<optgroup label="Mens">
													<option value="1">Foot wear</option>
													<option value="2">Top wear</option>
													<option value="3">Bootom wear</option>
													<option value="4">Men's Groming</option>
													<option value="5">Accessories</option>
												</optgroup>
												<optgroup label="Women">
													<option value="1">Western wear</option>
													<option value="2">Foot wear</option>
													<option value="3">Top wear</option>
													<option value="4">Bootom wear</option>
													<option value="5">Beuty Groming</option>
													<option value="6">Accessories</option>
													<option value="7">Jewellery</option>
												</optgroup>
												<optgroup label="Baby & Kids">
													<option value="1">Boys clothing</option>
													<option value="2">Girls Clothing</option>
													<option value="3">Toys</option>
													<option value="4">Baby Care</option>
													<option value="5">Kids footwear</option>
												</optgroup>
											</select>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group mb-lg-0">
											<label class="">Sales Type :</label>
											<select multiple="multiple" class="multi-select">
												<option value="1">Online</option>
												<option value="2">Offline</option>
												<option value="3">Reseller</option>
											</select>
										</div>
									</div>
								</div>
								<hr>
								<div class="text-right">
									<a href="#" class="btn btn-primary" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Apply</a>
									<a href="#" class="btn btn-secondary" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Reset</a>
								</div>
							</div>
						</div>
					</div>
					<!--End Navbar -->
										<div class="row row-sm">
						<div class="col-sm-6 col-xl-3 col-lg-6">
							<div class="card custom-card">
								<div class="card-body dash1">
									<div class="d-flex">
										<p class="mb-1 tx-inverse">Number Of Sales</p>
										<div class="ml-auto">
											<i class="fas fa-chart-line fs-20 text-primary"></i>
										</div>
									</div>
									<div>
										<h3 class="dash-25">568</h3>
									</div>
									<div class="progress mb-1">
										<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-70p" role="progressbar"></div>
									</div>
									<div class="expansion-label d-flex">
										<span class="text-muted">Last Month</span>
										<span class="ml-auto"><i class="fas fa-caret-up mr-1 text-success"></i>0.7%</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-xl-3 col-lg-6">
							<div class="card custom-card">
								<div class="card-body dash1">
									<div class="d-flex">
										<p class="mb-1 tx-inverse">New Revenue</p>
										<div class="ml-auto">
											<i class="fab fa-rev fs-20 text-secondary"></i>
										</div>
									</div>
									<div>
										<h3 class="dash-25">$12,897</h3>
									</div>
									<div class="progress mb-1">
										<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-60p bg-secondary" role="progressbar"></div>
									</div>
									<div class="expansion-label d-flex">
										<span class="text-muted">Last Month</span>
										<span class="ml-auto"><i class="fas fa-caret-down mr-1 text-danger"></i>0.43%</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-xl-3 col-lg-6">
							<div class="card custom-card">
								<div class="card-body dash1">
									<div class="d-flex">
										<p class="mb-1 tx-inverse">Total Cost</p>
										<div class="ml-auto">
											<i class="fas fa-dollar-sign fs-20 text-success"></i>
										</div>
									</div>
									<div>
										<h3 class="dash-25">$11,234</h3>
									</div>
									<div class="progress mb-1">
										<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-50p bg-success" role="progressbar"></div>
									</div>
									<div class="expansion-label d-flex text-muted">
										<span class="text-muted">Last Month</span>
										<span class="ml-auto"><i class="fas fa-caret-down mr-1 text-danger"></i>1.44%</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-xl-3 col-lg-6">
							<div class="card custom-card">
								<div class="card-body dash1">
									<div class="d-flex">
										<p class="mb-1 tx-inverse">Profit By Sale</p>
										<div class="ml-auto">
											<i class="fas fa-signal fs-20 text-info"></i>
										</div>
									</div>
									<div>
										<h3 class="dash-25">$789</h3>
									</div>
									<div class="progress mb-1">
										<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-40p bg-info" role="progressbar"></div>
									</div>
									<div class="expansion-label d-flex text-muted">
										<span class="text-muted">Last Month</span>
										<span class="ml-auto"><i class="fas fa-caret-up mr-1 text-success"></i>0.9%</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--End  Row -->

					<!-- Row -->
					<div class="row row-sm">
						<div class="col-sm-12 col-xl-8 col-lg-8">
							<div class="card custom-card overflow-hidden">
								<div class="card-body">
									<div class="card-option d-flex">
										<div>
											<h6 class="card-title mb-1">Overview of Sales Win/Lost</h6>
											<p class="text-muted card-sub-title">Comapred to last month sales.</p>
										</div>
										<div class="card-option-title ml-auto">
											<div class="btn-group p-0">
												<button class="btn btn-light btn-sm" type="button">Month</button>
												<button class="btn btn-outline-light btn-sm" type="button">Year</button>
											</div>
										</div>
									</div>
									<div>
										<canvas id="sales"></canvas>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-xl-4 col-lg-4">
							<div class="card custom-card">
								<div class="card-body">
									<div>
										<h6 class="card-title mb-1">Cost BreakDown</h6>
										<p class="text-muted card-sub-title">Excepteur sint occaecat cupidatat non proident.</p>
									</div>
									<div class="row">
										<div class="col-6 col-md-6 text-center">
											<div class="mb-2">
												<span class="peity-donut" data-peity='{ "fill": ["#eb6f33", "#77778e33"], "innerRadius": 14, "radius": 20 }'>4/7</span>
											</div>
											<p class="mb-1 tx-inverse">Marketing</p>
											<h4 class="mb-1"><span>$</span>67,927</h4>
											<span class="text-muted fs-12"><i class="fas fa-caret-up mr-1 text-success"></i>54% last month</span>
										</div>
										<div class="col-6 col-md-6 text-center">
											<div class="mb-2">
												<span class="peity-donut" data-peity='{ "fill": ["#01b8ff", "#77778e33"], "innerRadius": 14, "radius": 20 }'>2/7</span>
											</div>
											<p class="mb-1 tx-inverse">Sales</p>
											<h4 class="mb-1"><span>$</span>24,789</h4>
											<span class="text-muted fs-12"><i class="fas fa-caret-down mr-1 text-danger"></i>33% last month</span>
										</div>
									</div>
								</div>
							</div>
							<div class="card custom-card">
								<div class="card-body">
									<div>
										<h6 class="card-title mb-1">Monthly Profits</h6>
										<p class="text-muted card-sub-title">Excepteur sint occaecat cupidatat non proident.</p>
									</div>
									<h3><span>$</span>22,534</h3>
									<div class="clearfix mb-3">
										<div class="clearfix">
											<span class="float-left text-muted">This Month</span>
											<span class="float-right">75%</span>
										</div>
										<div class="progress mt-1">
											<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-70p bg-primary" role="progressbar"></div>
										</div>
									</div>
									<div class="clearfix">
										<div class="clearfix">
											<span class="float-left text-muted">Last Month</span>
											<span class="float-right">50%</span>
										</div>
										<div class="progress mt-1">
											<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar progress-bar-xs wd-50p bg-success" role="progressbar"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End Row -->

					<!-- Row -->
					<div class="row row-sm">
						<div class="col-sm-12 col-xl-4 col-lg-4">
							<div class="card custom-card">
								<div class="card-body">
									<div>
										<h6 class="card-title mb-1">Activity</h6>
										<p class="text-muted mb-0 card-sub-title">Nemo enim ipsam voluptatem fugit sequi nesciunt.</p>
									</div>
								</div>
								<div class="card-body">
									<div class="activity-block">
										<ul class="task-list">
											<li>
												<i class="task-icon bg-success"></i>
												<h6>Successful Purchase<small class="float-right text-muted tx-11">29 Oct 2019</small></h6>
												<span class="text-muted tx-12">Order ID: #4567</span>
											</li>
											<li>
												<i class="task-icon bg-secondary"></i>
												<h6>New Registered Seller<small class="float-right text-muted tx-11">25 Oct 2019</small></h6>
												<span class="text-muted tx-12">User ID: #8976</span>
											</li>
											<li>
												<i class="task-icon bg-primary"></i>
												<h6>Order Verification<small class="float-right text-muted tx-11">14 Oct 2019</small></h6>
												<span class="text-muted tx-12">Order ID: #6290</span>
											</li>
											<li>
												<i class="task-icon bg-info"></i>
												<h6>New Item Added<small class="float-right text-muted tx-11">02 Oct 2019</small></h6>
												<span class="text-muted tx-12">Item ID: #0235</span>
											</li>
											<li>
												<i class="task-icon bg-danger"></i>
												<h6>Purchase Cancellation<small class="float-right text-muted tx-11">28 Sep 2019</small></h6>
												<span class="text-muted tx-12">Order ID: #1905</span>
											</li>
											<li class="mb-0">
												<i class="task-icon bg-warning"></i>
												<h6>Overdue Shipments<small class="float-right text-muted tx-11">25 Sep 2019</small></h6>
												<span class="text-muted tx-12">Order ID: #8902</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-xl-4 col-lg-4">
							<div class="card custom-card">
								<div class="card-body">
									<div>
										<h6 class="card-title mb-1">Top Users Conversion Rate</h6>
										<p class="text-muted mb-0 card-sub-title">Nemo enim ipsam voluptatem fugit sequi nesciunt.</p>
									</div>
								</div>
								<div class="user-manager scroll-widget border-top">
									<div class="table-responsive">
										<table class="table mg-b-0">
											<tbody>
												<tr>
													<td class="bd-t-0">
														<div class="main-img-user"><img alt="avatar" src="assets/img/users/2.jpg"></div>
													</td>
													<td class="bd-t-0">
														<h6 class="mg-b-0">Socrates Itumay</h6><small class="tx-11 tx-gray-500">Sales Manager1</small>
													</td>
													<td class="bd-t-0">
														<h6 class="mg-b-0 font-weight-bold">34%</h6><small class="tx-11 tx-gray-500">Conversion Rate</small>
													</td>
												</tr>
												<tr>
													<td>
														<div class="main-img-user"><img alt="avatar" src="assets/img/users/3.jpg"></div>
													</td>
													<td>
														<h6 class="mg-b-0">Reynante Labares</h6><small class="tx-11 tx-gray-500">Sales Manager2</small>
													</td>
													<td>
														<h6 class="mg-b-0 font-weight-bold">22%</h6><small class="tx-11 tx-gray-500">Conversion Rate</small>
													</td>
												</tr>
												<tr>
													<td>
														<div class="main-img-user"><img alt="avatar" src="assets/img/users/4.jpg"></div>
													</td>
													<td>
														<h6 class="mg-b-0">Owen Bongcaras</h6><small class="tx-11 tx-gray-500">Sales Manager3</small>
													</td>
													<td>
														<h6 class="mg-b-0 font-weight-bold">18%</h6><small class="tx-11 tx-gray-500">Conversion Rate</small>
													</td>
												</tr>
												<tr>
													<td>
														<div class="main-img-user"><img alt="avatar" src="assets/img/users/5.jpg"></div>
													</td>
													<td>
														<h6 class="mg-b-0">Mariane Galeon</h6><small class="tx-11 tx-gray-500">Sales Manager4</small>
													</td>
													<td>
														<h6 class="mg-b-0 font-weight-bold">15%</h6><small class="tx-11 tx-gray-500">Conversion Rate</small>
													</td>
												</tr>
												<tr>
													<td>
														<div class="main-img-user"><img alt="avatar" src="assets/img/users/6.jpg"></div>
													</td>
													<td>
														<h6 class="mg-b-0">Joyce Chua</h6><small class="tx-11 tx-gray-500">Sales Manager5</small>
													</td>
													<td>
														<h6 class="mg-b-0 font-weight-bold">12%</h6><small class="tx-11 tx-gray-500">Conversion Rate</small>
													</td>
												</tr>
												<tr>
													<td>
														<div class="main-img-user"><img alt="avatar" src="assets/img/users/7.jpg"></div>
													</td>
													<td>
														<h6 class="mg-b-0">Sonia	Fraser</h6><small class="tx-11 tx-gray-500">Sales Manager5</small>
													</td>
													<td>
														<h6 class="mg-b-0 font-weight-bold">11%</h6><small class="tx-11 tx-gray-500">Conversion Rate</small>
													</td>
												</tr>
												<tr>
													<td>
														<div class="main-img-user"><img alt="avatar" src="assets/img/users/4.jpg"></div>
													</td>
													<td>
														<h6 class="mg-b-0">Owen Bongcaras</h6><small class="tx-11 tx-gray-500">Sales Manager3</small>
													</td>
													<td>
														<h6 class="mg-b-0 font-weight-bold">18%</h6><small class="tx-11 tx-gray-500">Conversion Rate</small>
													</td>
												</tr>
												<tr>
													<td>
														<div class="main-img-user"><img alt="avatar" src="assets/img/users/5.jpg"></div>
													</td>
													<td>
														<h6 class="mg-b-0">Mariane Galeon</h6><small class="tx-11 tx-gray-500">Sales Manager4</small>
													</td>
													<td>
														<h6 class="mg-b-0 font-weight-bold">15%</h6><small class="tx-11 tx-gray-500">Conversion Rate</small>
													</td>
												</tr>
												<tr>
													<td>
														<div class="main-img-user"><img alt="avatar" src="assets/img/users/4.jpg"></div>
													</td>
													<td>
														<h6 class="mg-b-0">Owen Bongcaras</h6><small class="tx-11 tx-gray-500">Sales Manager3</small>
													</td>
													<td>
														<h6 class="mg-b-0 font-weight-bold">18%</h6><small class="tx-11 tx-gray-500">Conversion Rate</small>
													</td>
												</tr>
												<tr>
													<td>
														<div class="main-img-user"><img alt="avatar" src="assets/img/users/5.jpg"></div>
													</td>
													<td>
														<h6 class="mg-b-0">Mariane Galeon</h6><small class="tx-11 tx-gray-500">Sales Manager4</small>
													</td>
													<td>
														<h6 class="mg-b-0 font-weight-bold">15%</h6><small class="tx-11 tx-gray-500">Conversion Rate</small>
													</td>
												</tr>

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-xl-4 col-lg-4">
							<div class="card custom-card">
								<div class="card-body">
									<div>
										<h6 class="card-title mb-1">Countrywise Sales</h6>
										<p class="text-muted mb-0 card-sub-title">Nemo enim ipsam voluptatem fugit sequi nesciunt.</p>
									</div>
								</div>
								<div class="country-sales scroll-widget bd-t">
									<div class="list-group">
										<div class="list-group-item  d-flex border-right-0 border-left-0 border-top-0">
											<i class="flag-icon flag-icon-us flag-icon-squared"></i>
											<p class="ml-3 mb-0">United States</p>
											<span class="ml-auto font-weight-bold">$12,897</span>
										</div>
										<div class="list-group-item d-flex border-right-0 border-left-0">
											<i class="flag-icon flag-icon-nl flag-icon-squared"></i>
											<p class="ml-3 mb-0">Netherlands</p>
											<span class="ml-auto font-weight-bold">$11,789</span>
										</div>
										<div class="list-group-item d-flex border-right-0 border-left-0">
											<i class="flag-icon flag-icon-gb flag-icon-squared"></i>
											<p class="ml-3 mb-0">United Kingdom</p>
											<span class="ml-auto font-weight-bold">$10,234</span>
										</div>
										<div class="list-group-item d-flex border-right-0 border-left-0">
											<i class="flag-icon flag-icon-ca flag-icon-squared"></i>
											<p class="ml-3 mb-0">Canada</p>
											<span class="ml-auto font-weight-bold">$9,104</span>
										</div>
										<div class="list-group-item d-flex border-right-0 border-left-0">
											<i class="flag-icon flag-icon-au flag-icon-squared"></i>
											<p class="ml-3 mb-0">Australia</p>
											<span class="ml-auto font-weight-bold">$16,205</span>
										</div>
										<div class="list-group-item d-flex border-right-0 border-left-0">
											<i class="flag-icon flag-icon-si flag-icon-squared"></i>
											<p class="ml-3 mb-0">Slovenia</p>
											<span class="ml-auto font-weight-bold">$18,165</span>
										</div>
										<div class="list-group-item d-flex border-right-0 border-left-0 rounded-0">
											<i class="flag-icon flag-icon-de flag-icon-squared"></i>
											<p class="ml-3 mb-0">Denmark</p>
											<span class="ml-auto font-weight-bold">$19,765</span>
										</div>
										<div class="list-group-item d-flex border-right-0 border-left-0">
											<i class="flag-icon flag-icon-si flag-icon-squared"></i>
											<p class="ml-3 mb-0">Slovenia</p>
											<span class="ml-auto font-weight-bold">$18,165</span>
										</div>
										<div class="list-group-item d-flex border-right-0 border-left-0 rounded-0">
											<i class="flag-icon flag-icon-de flag-icon-squared"></i>
											<p class="ml-3 mb-0">Denmark</p>
											<span class="ml-auto font-weight-bold">$19,765</span>
										</div>
										<div class="list-group-item d-flex border-right-0 border-left-0">
											<i class="flag-icon flag-icon-si flag-icon-squared"></i>
											<p class="ml-3 mb-0">Slovenia</p>
											<span class="ml-auto font-weight-bold">$18,165</span>
										</div>
										<div class="list-group-item d-flex border-right-0 border-left-0 rounded-0">
											<i class="flag-icon flag-icon-de flag-icon-squared"></i>
											<p class="ml-3 mb-0">Denmark</p>
											<span class="ml-auto font-weight-bold">$19,765</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End Row -->

					<!-- Row-->
					<div class="row">
						<div class="col-sm-12 col-xl-12 col-lg-12">
							<div class="card custom-card">
								<div class="card-body">
									<div>
										<h6 class="card-title mb-1">Product Summary</h6>
										<p class="text-muted card-sub-title">Nemo enim ipsam voluptatem fugit sequi nesciunt.</p>
									</div>
									<div class="table-responsive">
										<table class="table table-bordered text-nowrap mb-0">
											<thead>
												<tr>
													<th>#No</th>
													<th>Client Name</th>
													<th>Product ID</th>
													<th>Product</th>
													<th>Product Cost</th>
													<th>Payment Mode</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>#01</td>
													<td>Sean Black</td>
													<td>PRO12345</td>
													<td>Mi LED Smart TV 4A 80</td>
													<td>$14,500</td>
													<td>Online Payment</td>
													<td><span class="badge badge-success">Delivered</span></td>
												</tr>
												<tr>
													<td>#02</td>
													<td>Evan Rees</td>
													<td>PRO8765</td>
													<td>Thomson R9 122cm (48 inch) Full HD LED TV </td>
													<td>$30,000</td>
													<td>Cash on delivered</td>
													<td><span class="badge badge-primary">Add Cart</span></td>
												</tr>
												<tr>
													<td>#03</td>
													<td>David Wallace</td>
													<td>PRO54321</td>
													<td>Vu 80cm (32 inch) HD Ready LED TV</td>
													<td>$13,200</td>
													<td>Online Payment</td>
													<td><span class="badge badge-secondary">Pending</span></td>
												</tr>
												<tr>
													<td>#04</td>
													<td>Julia Bower</td>
													<td>PRO97654</td>
													<td>Micromax 81cm (32 inch) HD Ready LED TV</td>
													<td>$15,100</td>
													<td>Cash on delivered</td>
													<td><span class="badge badge-info">Delivering</span></td>
												</tr>
												<tr>
													<td>#05</td>
													<td>Kevin James</td>
													<td>PRO4532</td>
													<td>HP 200 Mouse &amp; Wireless Laptop Keyboard </td>
													<td>$5,987</td>
													<td>Online Payment</td>
													<td><span class="badge badge-danger">Shipped</span></td>
												</tr>
												<tr>
													<td>#06</td>
													<td>Theresa	Wright</td>
													<td>PRO6789</td>
													<td>Digisol DG-HR3400 Router </td>
													<td>$11,987</td>
													<td>Cash on delivered</td>
													<td><span class="badge badge-secondary">Delivering</span></td>
												</tr>
												<tr>
													<td>#07</td>
													<td>Sebastian	Black</td>
													<td>PRO4567</td>
													<td>Dell WM118 Wireless Optical Mouse</td>
													<td>$4,700</td>
													<td>Online Payment</td>
													<td><span class="badge badge-info">Add to Cart</span></td>
												</tr>
												<tr>
													<td>#08</td>
													<td>Kevin Glover</td>
													<td>PRO32156</td>
													<td>Dell 16 inch Laptop Backpack </td>
													<td>$678</td>
													<td>Cash On delivered</td>
													<td><span class="badge badge-success">Delivered</span></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End Row -->

				</div>
			</div>
			<!-- End Main Content-->
            		<!-- Sidebar -->
			<div class="sidebar sidebar-right sidebar-animate">
				<div class="sidebar-icon">
					<a href="#" class="text-right float-right text-dark fs-20" data-toggle="sidebar-right" data-target=".sidebar-right"><i class="fe fe-x"></i></a>
				</div>
				<div class="sidebar-body">
					<h5>Todo</h5>
					<div class="d-flex p-2">
						<label class="ckbox"><input checked="" type="checkbox"><span>Hangout With friends</span></label>
						<span class="ml-auto">
							<i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i>
							<i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
						</span>
					</div>
					<div class="d-flex p-2 border-top">
						<label class="ckbox"><input type="checkbox"><span>Prepare for presentation</span></label>
						<span class="ml-auto">
							<i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i>
							<i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
						</span>
					</div>
					<div class="d-flex p-2 border-top">
						<label class="ckbox"><input type="checkbox"><span>Prepare for presentation</span></label>
						<span class="ml-auto">
							<i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i>
							<i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
						</span>
					</div>
					<div class="d-flex p-2 border-top">
						<label class="ckbox"><input checked="" type="checkbox"><span>System Updated</span></label>
						<span class="ml-auto">
							<i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i>
							<i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
						</span>
					</div>
					<div class="d-flex p-2 border-top">
						<label class="ckbox"><input type="checkbox"><span>Do something more</span></label>
						<span class="ml-auto">
							<i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i>
							<i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
						</span>
					</div>
					<div class="d-flex p-2 border-top">
						<label class="ckbox"><input type="checkbox"><span>System Updated</span></label>
						<span class="ml-auto">
							<i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i>
							<i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
						</span>
					</div>
					<div class="d-flex p-2 border-top">
						<label class="ckbox"><input type="checkbox"><span>Find an Idea</span></label>
						<span class="ml-auto">
							<i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i>
							<i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
						</span>
					</div>
					<div class="d-flex p-2 border-top mb-4 border-bottom">
						<label class="ckbox"><input type="checkbox"><span>Project review</span></label>
						<span class="ml-auto">
							<i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i>
							<i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
						</span>
					</div>
					<h5>Overview</h5>
					<div class="p-2">
						<div class="main-traffic-detail-item">
							<div>
								<span>Founder &amp; CEO</span> <span>24</span>
							</div>
							<div class="progress">
								<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" class="progress-bar progress-bar-xs wd-20p" role="progressbar"></div>
							</div><!-- progress -->
						</div>
						<div class="main-traffic-detail-item">
							<div>
								<span>UX Designer</span> <span>1</span>
							</div>
							<div class="progress">
								<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="15" class="progress-bar progress-bar-xs bg-secondary wd-15p" role="progressbar"></div>
							</div><!-- progress -->
						</div>
						<div class="main-traffic-detail-item">
							<div>
								<span>Recruitment</span> <span>87</span>
							</div>
							<div class="progress">
								<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" class="progress-bar progress-bar-xs bg-success wd-45p" role="progressbar"></div>
							</div><!-- progress -->
						</div>
						<div class="main-traffic-detail-item">
							<div>
								<span>Software Engineer</span> <span>32</span>
							</div>
							<div class="progress">
								<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar progress-bar-xs bg-info wd-25p" role="progressbar"></div>
							</div><!-- progress -->
						</div>
						<div class="main-traffic-detail-item">
							<div>
								<span>Project Manager</span> <span>32</span>
							</div>
							<div class="progress">
								<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar progress-bar-xs bg-danger wd-25p" role="progressbar"></div>
							</div><!-- progress -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Sidebar -->
            		<!-- Main Footer-->
			<div class="main-footer text-center">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<span>Copyright © 2019 <a href="#">Dashlead</a>. Designed by <a href="../../index.htm">Spruko</a> All rights reserved.</span>
						</div>
					</div>
				</div>
			</div>
			<!--End Footer-->
		</div>
		<!-- End Page -->
		<!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

		<!-- Jquery js-->
		<script src="assets/plugins/jquery/jquery.min.js"></script>

		<!-- Bootstrap js-->
		<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Ionicons js-->
		<script src="assets/plugins/ionicons/ionicons.js"></script>
		
		<!-- Rating js-->
		<script src="assets/plugins/rating/jquery.rating-stars.js"></script>

		<!-- Flot Chart js-->
<script src="assets/plugins/jquery.flot/jquery.flot.js"></script>
<script src="assets/plugins/jquery.flot/jquery.flot.resize.js"></script>
<script src="assets/js/chart.flot.sampledata.js"></script>
<!-- Chart.Bundle js-->
<script src="assets/plugins/chart.js/Chart.bundle.min.js"></script>
<!-- Peity js-->
<script src="assets/plugins/peity/jquery.peity.min.js"></script>
<!-- Jquery-Ui js-->
<script src="assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>
<!-- Select2 js-->
<script src="assets/plugins/select2/js/select2.min.js"></script>
<!--MutipleSelect js-->
<script src="assets/plugins/multipleselect/multiple-select.js"></script>
<script src="assets/plugins/multipleselect/multi-select.js"></script>
<!-- Jquery.mCustomScrollbar js-->
<script src="assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- index -->
<script src="assets/js/index.js"></script>
		
		<!-- Perfect-scrollbar js-->
		<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

		<!-- Sidemenu js-->
		<script src="assets/plugins/sidemenu/sidemenu.js"></script>
		
		<!-- Sidebar js-->
		<script src="assets/plugins/sidebar/sidebar.js"></script>

		<!-- Sticky js-->
		<script src="assets/js/sticky.js"></script>
		
		<!-- Switcher js-->
		<script src="assets/switcher/js/switcher.js"></script>
		
		<!-- Custom js-->
		<script src="assets/js/custom.js"></script>

	
	</body>
</html>

@endsection