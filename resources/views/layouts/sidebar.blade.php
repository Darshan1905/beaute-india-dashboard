<!-- Sidemenu -->
<div class="main-sidebar main-sidebar-sticky side-menu">
				<div class="sidemenu-logo">
					<a class="main-logo" href="index.html">
						<img src="{{ URL::to('/') }}/assets/img/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
						<img src="{{ URL::to('/') }}/assets/img/brand/icon.png" class="header-brand-img icon-logo" alt="logo">
						<img src="{{ URL::to('/') }}/assets/img/brand/logo-light.png" class="header-brand-img desktop-logo theme-logo" alt="logo">
						<img src="{{ URL::to('/') }}/assets/img/brand/icon-light.png" class="header-brand-img icon-logo theme-logo" alt="logo">
					</a>
				</div>
				<div class="main-sidebar-body">
					<ul class="nav">
						<li class="nav-label">Dashboard</li>
						<li class="nav-item show">
							<a class="nav-link" href="{{ URL::to('/') }}"><i class="fe fe-airplay"></i><span class="sidemenu-label">Dashboard</span></a>
						</li>
						<li class="nav-label">Applications</li>
                        <li class="nav-item">
							<a class="nav-link" href="{{ URL::to('roles') }}"><i class="fe fe-database"></i><span class="sidemenu-label">Role</span></a>
						</li>
                        <li class="nav-item">
							<a class="nav-link" href="{{ URL::to('permissions') }}"><i class="fe fe-database"></i><span class="sidemenu-label">Permission</span></a>
						</li>
                        <!-- <li class="nav-item">
							<a class="nav-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/widgets"><i class="fe fe-database"></i><span class="sidemenu-label">Role Permission</span></a>
						</li> -->
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('industrysegments') }}"><i class="fe fe-database"></i><span class="sidemenu-label">Industry Segment</span></a>
						</li>
                       
                        <li class="nav-item">
							<a class="nav-link" href="{{ URL::to('uoms') }}"><i class="fe fe-database"></i><span class="sidemenu-label">UOM</span></a>
						</li>
                        <li class="nav-item">
							<a class="nav-link" href="{{ URL::to('taxes') }}"><i class="fe fe-database"></i><span class="sidemenu-label">TAX</span></a>
						</li>
                        <li class="nav-item">
							<a class="nav-link" href="{{ URL::to('businesses') }}"><i class="fe fe-database"></i><span class="sidemenu-label">Business</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('businessactivities') }}"><i class="fe fe-database"></i><span class="sidemenu-label">Business Activity</span></a>
						</li>
                        <li class="nav-item">
							<a class="nav-link" href="{{ URL::to('branches') }}"><i class="fe fe-database"></i><span class="sidemenu-label">Branches</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('users') }}"><i class="fe fe-database"></i><span class="sidemenu-label">Users</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('userbranches') }}"><i class="fe fe-database"></i><span class="sidemenu-label">UserBranch</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('brands') }}"><i class="fe fe-database"></i><span class="sidemenu-label">Brand</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('vendors') }}"><i class="fe fe-database"></i><span class="sidemenu-label">Vendor</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('vendorbrands') }}"><i class="fe fe-database"></i><span class="sidemenu-label">Vendor Brand</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('material') }}"><i class="fe fe-database"></i><span class="sidemenu-label">Material</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('materialvendor') }}"><i class="fe fe-database"></i><span class="sidemenu-label">Material Vendor</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('categorys') }}"><i class="fe fe-database"></i><span class="sidemenu-label">Category</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('subcategorys') }}"><i class="fe fe-database"></i><span class="sidemenu-label">Sub Category</span></a>
						</li>
						
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('customermaster') }}"><i class="fe fe-database"></i><span class="sidemenu-label">Customer Master</span></a>
						</li>
						
					</ul>
				</div>
			</div>
			<!-- End Sidemenu -->