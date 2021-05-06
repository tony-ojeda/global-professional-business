<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
	<div class="navbar-wrapper">
		<div class="navbar-container content">
			<div class="navbar-collapse" id="navbar-mobile">
				<div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
					<ul class="nav navbar-nav">
						<li class="nav-item mobile-menu d-xl-none mr-auto">
							<a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
								<i class="ficon feather icon-menu"></i>
							</a>
						</li>
					</ul>
					{{-- <ul class="nav navbar-nav bookmark-icons">
						<li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-todo" data-toggle="tooltip"
							data-placement="top" title="Todo"><i class="ficon feather icon-check-square"></i></a></li>
						<li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-chat" data-toggle="tooltip"
							data-placement="top" title="Chat"><i class="ficon feather icon-message-square"></i></a></li>
						<li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-email" data-toggle="tooltip"
							data-placement="top" title="Email"><i class="ficon feather icon-mail"></i></a></li>
						<li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-calender" data-toggle="tooltip"
							data-placement="top" title="Calendar"><i class="ficon feather icon-calendar"></i></a></li>
					</ul> --}}
					{{-- <ul class="nav navbar-nav">
						<li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i
								class="ficon feather icon-star warning"></i></a>
							<div class="bookmark-input search-input">
								<div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>
								<input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="0"
									data-search="laravel-search-list" />
								<ul class="search-list search-list-bookmark"></ul>
							</div>
						</li>
					</ul> --}}
				</div>
				<ul class="nav navbar-nav float-right">
					
					<li class="nav-item d-none d-lg-block">
						<a class="nav-link nav-link-expand">
							<i class="ficon feather icon-maximize"></i>
						</a>
					</li>
					
					
					<li class="dropdown dropdown-user nav-item">
						<a class="dropdown-toggle nav-link dropdown-user-link" href="#"
							data-toggle="dropdown">
							<div class="user-nav d-sm-flex d-none">
								<span class="user-name text-bold-600">{{ Auth::user()->name }}</span>
								<span class="user-status"></span>
							</div>
							<span>
								<img class="round" src="{{asset('vuexy/images/portrait/small/avatar-s-11.jpg') }}" alt="avatar" height="40" width="40" />
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="{{ route('admin.logout') }}">
								<i class="feather icon-power"></i> Cerrar sesión
							</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>