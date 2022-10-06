<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
		<meta name="description" content="Beaut India -  Admin Panel HTML Dashboard Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="sales dashboard, admin dashboard, bootstrap 4 admin template, html admin template, admin panel design, admin panel design, bootstrap 4 dashboard, admin panel template, html dashboard template, bootstrap admin panel, sales dashboard design, best sales dashboards, sales performance dashboard, html5 template, dashboard template">
		<!-- Favicon -->
		<link rel="icon" href="{{ URL::to('/') }}/assets/img/brand/favicon.ico" type="image/x-icon"/>

		<!-- Title -->
		<title>Beaut India -  Admin Panel </title>

		<!---Fontawesome css-->
		<link href="{{ URL::to('/') }}/assets/plugins/fontawesome-free/css/all.min.css" rel="stylesheet">

		<!---Ionicons css-->
		<link href="{{ URL::to('/') }}/assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet">

		<!---Typicons css-->
		<link href="{{ URL::to('/') }}/assets/plugins/typicons.font/typicons.css" rel="stylesheet">

		<!---Feather css-->
		<link href="{{ URL::to('/') }}/assets/plugins/feather/feather.css" rel="stylesheet">

		<!---Falg-icons css-->
		<!-- <link href="{{ URL::to('/') }}/assets/plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet"> -->

		<!---Style css-->
		<link href="{{ URL::to('/') }}/assets/css/style.css" rel="stylesheet">
		<link href="{{ URL::to('/') }}/assets/css/custom-style.css" rel="stylesheet">
		<link href="{{ URL::to('/') }}/assets/css/skins.css" rel="stylesheet">
		<link href="{{ URL::to('/') }}/assets/css/dark-style.css" rel="stylesheet">
		<link href="{{ URL::to('/') }}/assets/css/custom-dark-style.css" rel="stylesheet">

		
	</head>

	<body style="background: #000000;">
		<!-- Loader -->
		<div id="global-loader">
			<img src="{{ URL::to('/') }}/assets/img/loader.svg" class="loader-img" alt="Loader">
		</div>
		<!-- End Loader -->


							<!-- Page -->
		<div class="page main-signin-wrapper">

			<!-- Row -->
			<div class="row text-center pl-0 pr-0 ml-0 mr-0">
				<div class="col-lg-3 d-block mx-auto">
					<div class="text-center mb-2">
						<img src="{{ URL::to('/') }}/assets/img/beautindia.png" class="header-brand-img" alt="logo">
						<img src="{{ URL::to('/') }}/assets/img/beautindia.png" class="header-brand-img theme-logos" alt="logo">
					</div>
					<div class="card custom-card">
						<div class="card-body">
							<h4 class="text-center">Signin to Your Account</h4>
							<form method="POST" action="{{ route('login') }}">
								@csrf
								<div class="form-group text-left">
									<label for="email" >Email</label>
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>

								<div class="form-group text-left">
									<label for="password" >Password</label>

										<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

										@error('password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
								</div>

								
 
								<button type="submit"  class="btn ripple btn-main-primary btn-block">Sign In</button>

							</form>
						
							<div class="mt-3 text-center">
							<!-- 	@if (Route::has('password.request'))
								<p class="mb-1"><a  href="{{ route('password.request') }}">Forgot password?</a></p>
								@endif -->
							<!-- <p class="mb-0">Don't have an account? <a href="signup">Create an Account</a></p> -->
						</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Row -->

		</div>
		<!-- End Page -->

		
		<!-- End Page -->
		<!-- Jquery js-->
		<script src="{{ URL::to('/') }}/assets/plugins/jquery/jquery.min.js"></script>

		<!-- Bootstrap js-->
		<script src="{{ URL::to('/') }}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Ionicons js-->
		<script src="{{ URL::to('/') }}/assets/plugins/ionicons/ionicons.js"></script>
		
		<!-- Rating js-->
		<script src="{{ URL::to('/') }}/assets/plugins/rating/jquery.rating-stars.js"></script>

		
		<!-- Custom js-->
		<script src="{{ URL::to('/') }}/assets/js/custom.js"></script>



	
	</body>
</html>