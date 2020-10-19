@extends('layouts.frontend.front_layout')

@section('pagetitle','Profile Page')

@push('css')
	<link rel="stylesheet" href="{{ asset('assets/css/user_profiles.css') }}">
@endpush

@section('content')

	<div class="user-profile my-container">
		
		<div class="user-header bg-white rounded border mt-3">
			<div class="cover">
				<a href="http://imagescdn.khmer24.com/members/369136/banner/p-70393143_1591891908_dc.jpg" data-fancybox="images" data-caption="សុភ័ក្រ លាប">
					<img src="http://imagescdn.khmer24.com/members/369136/banner/p-70393143_1591891908_dc.jpg" alt="សុភ័ក្រ លាប" class="img-cover">
				</a>
			</div>

			<div class="profile">
				<div class="photo">
					<a href="http://imagescdn.khmer24.com/members/369136/p-70393143_1591891908_6f.jpg" data-fancybox="images" data-caption="សុភ័ក្រ លាប">
					<img src="http://imagescdn.khmer24.com/members/369136/p-70393143_1591891908_6f.jpg" class="img-cover">
					</a>
				</div>
				<div class="user-info">
					<h1 class="name">សុភ័ក្រ លាប</h1>
					<div class="username">@p-70393143</div>
					<p class="registered_dater">Member since 13-Apr-2019</p>
				</div>
			</div>

			<div id="menu">
				<ul class="nav">
					<li class="nav-item active"><a class="nav-link" href="https://www.khmer24.com/en/p-70393143">All Posts</a></li>
					<li class="nav-item "><a class="nav-link" href="https://www.khmer24.com/en/p-70393143/contact">Contact</a></li>
					<li class="nav-item "><a class="nav-link" href="https://www.khmer24.com/en/p-70393143/memberstatus">Member Status</a></li>
				</ul>
			</div>

			<div class="btn-actions col-4">
				<div class="row">
					<div class="col pl-0 pr-2">
						<a class="btn btn-outline-primary btn-sm btn-block btn-call" rel="nofollow" onclick="if (!window.__cfRLUnblockHandlers) return false; javascript:void window.open('https://www.facebook.com/sharer/sharer.php?u=https://www.khmer24.com/p-70393143','1422871850498','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://www.khmer24.com/p-70393143"><span class="icon icon-share"></span> Share</a>
					</div>
					<div class="col pl-2 pr-0">
						<div class="dropdown">
							<a class="btn btn-primary btn-sm btn-block btn-call" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="icon icon-call"></span> Call Now
							</a>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
								<a class="dropdown-item" href="tel:070393143">070393143</a>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>

		@if (Request::route()->getName() == "agent.dashboard")
			@include('agent.my_ads')
		@endif

	</div>

@endsection

@push('js')
	<script>
		$(document).ready(function(){

		});
	</script>
@endpush
