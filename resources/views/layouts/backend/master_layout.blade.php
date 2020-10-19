<!DOCTYPE html>
<html lang="en">
	<head>
		@include('layouts.backend.includes.ace.head')
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default ace-save-state navbar-fixed-top">
			@include('layouts.backend.includes.ace.top_header')
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>
			{{-- left sidebar --}}
			<div id="sidebar" class="sidebar responsive ace-save-state sidebar-fixed">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>
				{{-- sidebar shortcut icon --}}
				{{-- @include('layouts.backend.includes.ace.sidebar_shortcut') --}}
				{{-- sidebar --}}
				<ul class="nav nav-list">
					@include('layouts.backend.includes.ace.sidebar')
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			{{-- main content --}}
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li>
								<a href="#">Other Pages</a>
							</li>
							<li class="active">Blank Page</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							{{-- @include('layouts.backend.includes.ace.ace_setting') --}}
						</div><!-- /.ace-settings-container -->
						<!-- PAGE CONTENT BEGINS -->
						{{-- <div class="row">
							<div class="col-xs-12"> --}}
								@yield('content')
							{{-- </div><!-- /.col -->
						</div><!-- /.row --> --}}
						<!-- PAGE CONTENT ENDS -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			{{-- footer --}}
			@include('layouts.backend.includes.ace.footer')
		<!-- inline scripts related to this page -->
		@stack('js')
	</body>
</html>
