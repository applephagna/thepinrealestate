@extends('layouts.frontend.front_layout')

@push('css')
	<link rel="stylesheet" href="{{asset('assets/css/member_profile.css')}}">
@endpush

@section('content')

	<div id="top-bar">
		<div class="my-container">
			<a href="https://www.khmer24.com/en/"><span class="icon icon-home"></span> https://www.khmer24.com/en/p-70393143</a>
			<a href="https://www.khmer24.com/en/manage-ads.html" class="float-right"><span class="icon icon-user"></span>Hi! p-70393143</a>
		</div>
	</div>

	<header>
		<div class="my-container">
		<div class="content border rounded bg-white">
		<div id="cover" class=" no-image ">
		 <a class="btn-edit btn btn-outline-primary btn-sm" href="https://www.khmer24.com/en/member/store-banner"><span class="icon icon-image"></span> Change</a>
		</div>
		<div id="profile">
		<div class="profile-photo">
		<img class="img-cover" src="https://www.khmer24.com/khmer24-reform21/template/img/default_profile.jpg">
		</div>
		<div class="profile-detail">
		<h1 class="title">p 70393143<a class="btn-edit btn btn-clear" href="https://www.khmer24.com/en/member/edit-profile"><span class="icon icon-edit"></span></a>
		</h1>
		<p class="info">Member since 13-Apr-2019</p>
		</div>
		<a rel="nofollow" onclick="javascript:void window.open('https://www.facebook.com/sharer/sharer.php?u=https://www.khmer24.com/p-70393143','1422871850498','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://www.khmer24.com/p-70393143" class="btn btn-clear btn-store-share">Share <span class="icon icon-share"></span></a>
		</div>
		<div id="menu">
		<ul class="nav">
		<li class="nav-item  active"><a class="nav-link" href="https://www.khmer24.com/en/p-70393143.html">All Posts</a></li>
		<li class="nav-item "><a class="nav-link" href="https://www.khmer24.com/en/p-70393143/about.html">About Us</a></li>
		<li class="nav-item "><a class="nav-link" href="https://www.khmer24.com/en/p-70393143/contact.html">Contact</a></li>
		<li class="nav-item "><a class="nav-link" href="https://www.khmer24.com/en/p-70393143/memberstatus.html">Member Status</a></li>
		</ul>
		</div>
		</div>
		</div>
	</header>

	<section class="listing-page">
		<div class="my-container">
		<div class="filters">
		<div class="row">
		<div class="col">
		<h1 class="title">All Posts</h1>
		</div>
		<form class="col text-right" action="https://www.khmer24.com/en/p-70393143" id="filter-form" method="get">
		<label>Filter:</label>
		<span class="btn-group" role="group" aria-label="Basic example">
		<button type="button" class="btn btn-sm btn-default btn-change-view disabled" data-type="list"><span class="icon icon-list"></span></button>
		<button type="button" class="btn btn-sm btn-default btn-change-view " data-type="grid"><span class="icon icon-gallery"></span></button>
		</span>
		<span class="dropdown ml-2">
		<label>Sort:</label>
		<button class="btn btn-sm btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Laste Ads </button>
		<div class="dropdown-menu sort-items" aria-labelledby="dropdownMenuButton">
		<a class="dropdown-item " href="#latestads" data-value="latestads">Laste Ads</a>
		<a class="dropdown-item " href="#newads" data-value="newads">New Ads</a>
		<a class="dropdown-item " href="#mosthitads" data-value="mosthitads">Most Hit Ads</a>
		</div>
		</span>
		<input type="hidden" name="sort" value="">
		<input type="hidden" name="per_page" value="">
		</form>
		</div>
		</div>
		<div class="list-items">
		<ul class="list-unstyled list-items item-list">
		<li class="item ">
		<a class="border" href="https://www.khmer24.com/en/property/គមរងដឡតសមរសបបផសរង-adid-3378240.html" title="គម្រោងដីឡួត៌សម្រស់បុប្ផាស្រង៉ែ">
		<article>
		<div class="item-image">
		<img class="img-cover" src="http://imagescdn.khmer24.com/19-04-15/s-369136-66-b.jpg" alt="គម្រោងដីឡួត៌សម្រស់បុប្ផាស្រង៉ែ">
		</div>
		<div class="item-detail">
		<h2 class="item-title truncate truncate-2 ">គម្រោងដីឡួត៌សម្រស់បុប្ផាស្រង៉ែ</h2>
		<p class="description truncate truncate-2">តើ Comdo ឬ ផ្ទះបែរមុខទៅទិសណាដែលសមនិងអ្នកបំផុត!
		1. ទិសខាងជើង
		* ត្រជាក់សប្បាយពេញមួយឆ្នាំមិនសូវបានទទួលកំដៅព្រះអាទិត្យ.
		* សមសំរាប់អ្នកចូលចិត្តនៅបន្ទប់ឬផ្ទះ.
		2. ទិសខាងត្បូង
		* ទទួលបានខ្យល់ត្រជាក់ ៨ខែ និងទទួលបានកំដៅថ្ងៃខ្លះដែរ.
		* សាកសមសំរាប់មនុស្សគ្រប់គ្នា...</p> <ul class="list-unstyled summary">
		<li>Siem Reap</li>
		<li><time datetime="2019-04-15 11:48:54">15-Apr-2019</time></li>
		<li>93 hits</li> </ul>
		<p class="item-price m-0 text-red">$500</p>
		</div>
		</article>
		</a>
		</li>
		</ul>
		</div>
		</div>
	</section>



@endsection

@push('js')
	<script type="text/javascript">
		$(document).ready(function(){
			$('.btn-change-view').click(function(e){
				e.preventDefault();
				var type = $(this).attr('data-type');
				$.get('https://www.khmer24.com/en/change-ad-view.html',function(respone){
					location.reload();
				});
			});
			$('.sort-items a').click(function(e){
				e.preventDefault();
				$('input[name="sort"]').val($(this).attr('data-value'));
				$('#filter-form').submit();
			});
		});
	</script>
@endpush
