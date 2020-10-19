<header id="header" class="bg-white border-bottom">
	<div class="my-container header-content">
		<nav class="navbar row">
			<a href="{{route('home')}}" class="navbar-brand"><img src="{{asset('assets/img/thepin_logo.png')}}" alt="ThePin Realestate"></a>
			<ul class="nav mr-auto left-nav">
				<?php  $flag = app()->getLocale(); ?>
				@if ($flag=='km')
					<li class="nav-item">
						<a class="nav-link disabled btn-change-lang" href="{{ url('/locale') }}/en">
							<span class="icon english-flage">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Eng</span>
						</a>
					</li>
				@else
					<li class="nav-item">
						<a class="nav-link disabled btn-change-lang" href="{{ url('/locale') }}/km">
							<span class="icon khmer-flage">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ខ្មែរ</span>
						</a>
					</li>
				@endif
			</ul>
			@if (Auth::check())
			<ul class="nav nav-pills justify-content-end right-nav">
				<li class="nav-item nav-item-login">
					<a class="nav-link" href="#notifications"><span class="icon icon-notification-fill"></span>
						<span id="notification-badge" class="badge badge-pill badge-danger d-none">0</span>
					</a>
				</li>

				<li class="nav-item nav-item-login nav-user-photo">
					<div class="dropdown">
						<a class="nav-link" href="{{route('property.allProperties')}}" id="dropdownUserMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="icon icon-user-photo">
										<img class="img-cover" src="{{ auth()->user()->photo==''?asset('assets/img/user.png'):asset('uploads/user/profile/'.auth()->user()->photo)}}">
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownUserMenu">
							@if(Auth::user()->hasAnyRole(['Super-admin','Administer']))
							<a class="dropdown-item" href="{{route('admin.dashboard')}}" title="DASHBOARD">
								<span class="icon-list"></span>
								DASHBOARD
							{{-- </a><i class="fas fa-tachometer-alt"></i> --}}
							@endif
							<a class="dropdown-item" href="{{route('agent.post.index')}}" title="POST FREE AD">
								<span class="icon-plus-full"></span>
								POST FREE AD
							</a>
							<a class="dropdown-item" href="{{ route('agent.dashboard') }}" title="My Ads">
								<span class="icon-folder"></span>
								My Ads
							</a>
							<a class="dropdown-item" href="#" title="Likes">
								<span class="icon-like"></span>
								Likes
							</a>
							<a class="dropdown-item" href="{{ route('agent.setting') }}" title="Setting">
								<span class="icon-setting-outline"></span>
								Setting
							</a>
							<a class="dropdown-item" href="{{route('logout')}}"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();" title="Log out">
								<span class="icon-off"></span>
								Log out
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
							</form>
						</div>
					</div>
				</li>
				<li class="nav-item ml-2">
				<a class="nav-link btn-post btn-warning long-text" href="{{route('agent.post.index')}}">POST FREE AD</a>
				{{-- <a class="nav-link btn-post btn-warning short-text" href="{{route('agent.post.index')}}">POST</a> --}}
				</li>
			</ul>
		</nav>
		@else
			<nav class="navbar row">
				<ul class="nav nav-pills justify-content-end right-nav">
					<li class="nav-item item-wide-screen">
						<a class="nav-link" href="{{route('login')}}">Log in</a>
					</li>
					<li class="nav-item item-wide-screen">
						<sapn class="nav-link disabled pl-0 pr-0">Or</sapn>
					</li>
					<li class="nav-item item-wide-screen">
						<a class="nav-link" href="{{route('register')}}">Register</a>
					</li>
					<li class="nav-item item-small-screen">
						<a class="nav-link" href="{{route('register')}}"><span class="icon icon-user2"></span></a>
					</li>
					<li class="nav-item ml-2">
						<a class="nav-link btn-post btn-warning long-text" href="{{route('agent.post.index')}}">POST FREE AD</a>
						<a class="nav-link btn-post btn-warning short-text" href="{{route('agent.post.index')}}">POST</a>
					</li>
				</ul>
			</nav>
		@endif
	@stack('header_search')

	</div>
</header>
