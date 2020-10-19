@extends('layouts.frontend.front_layout')

@push('css')
<link  href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
	<link  href="{{asset('assets/css/property.css')}}" rel="stylesheet" type="text/css">
	<link  href="{{asset('assets/css/theme.css')}}" rel="stylesheet" type="text/css">
@endpush

@section('content')

	<div class="listing-page">
		<div class="my-breadcrumb">
			<div class="my-container">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item" aria-current="page"><a href="{{route('home')}}"><i class="icon-home"></i>Home</a>
						</li>
						<li class="breadcrumb-item" aria-current="page">House & Lands in Cambodia</li>
					</ol>
				</nav>
			</div>
		</div>

		<section class="page-header">
			<div class="my-container">
				<h1 class="title">House & Lands in Cambodia</h1>
			</div>
		</section>

		<section class="categories-items">
			<div class="my-container">
			<div class="lists-categories">
				<ul class="list-unstyled sub_categories">
					@foreach ($category_by_properties as $category)
						<li><a href="#">{{$category->category_name}}</a></li>
					@endforeach
				</ul>
				</div>
			</div>
		</section>

		<section class="pb-3">
			<div class="my-container">
				<div class="row">
				<!-- ads left	-->
					<div class="col-3 left-side">
						<div class="p-3 bg-white border rounded filter-box">
							<div class="filter_title">Refine your Results</div>
								<form class="form" id="ftr_left" method="get" action="#property/all-property.html?">
									<div class="form-group filter-group ">
											<label class="filter-title">City/Province</label>
											<div class="filter-data">
												<select class="form-control fter_d  form-control-" name="location">
													<option value="0">All</option>
													@foreach ($provinces as $province)
														<option value="{{$province->id}}">{{$province->name_en}}</option>
													@endforeach
												</select>
											</div>
									</div>
									<input type="hidden" name="category" value="48" />
									<input type="hidden" name="sortby" value="" />
								</form>
						</div>
						<div class="sponsors text-center pt-3">
						</div>
					</div>
				<!-- content right			 -->
					<div class="col col-9 right-side">
						<div class="bar">
							<div class="left">
								<h2 class="title">30775 Result On 13 Apr, 2019 </h2>
							</div>
							<div class="right text-right">
								<ul class="nav justify-content-end">
									<li class="nav-item">
										<label>View</label>
										<span class="btn-group mr-1" role="group" aria-label="Basic example">
										<button type="button" class="btn btn-default icon icon-list btn-change-view" data-view="list"></button>
										<button type="button" class="btn btn-default icon-gallery btn-change-view" data-view="grid"></button>
										</span>
									</li>
									<li class="nav-item dropdown">
										<label>Sort By</label>
										<a class="btn btn-default btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Laste Ads </a>
										<div class="dropdown-menu btn-sortby" aria-labelledby="dropdownMenuLink">
											<a class="dropdown-item " data-value="latestads" href="#">Laste Ads</a>
											<a class="dropdown-item " data-value="newads" href="#">New Ads</a>
											<a class="dropdown-item " data-value="mosthitads" href="#">Most Hit Ads</a>
											<a class="dropdown-item " data-value="priceasc" href="#">Price: Low to High</a>
											<a class="dropdown-item " data-value="pricedesc" href="#">Price: High to Low</a>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div>
							<ul class="list-unstyled list-items item-list">
								@foreach ($allProperties as $property)
									<li class="item  special-item  top-item ">
										<a class="border post" href="{{route('post.show',$property->slug)}}" title="{{$property->title}}">
										<article>
											<div class="item-image">
												<img class="img-cover" src="{{asset('uploads/property/galleries/'.$property->galleries[1]->gallery_image)}}" alt="{1property->title}" />
											</div>
											<div class="item-detail">
												<h2 class="item-title truncate truncate-2 ">{{$property->title}}</h2>
												<p class="description truncate truncate-2">
													{{$property->description}}
													<i>tel: 010245643,011735635</i>
												</p>
											</div>
										</article>
										</a>
										<a class="username-tag" href="#{{$property->user->firstname}}">{{$property->user->firstname}}</a>
									</li>
								@endforeach
							</ul>
						</div>
						<!-- pagination -->
						<div class="p-3">
							<div class="Page navigation my-pagination">
								<ul class="pagination justify-content-center m-0">
									<li class="page-item active"><a class="page-link" href="#">1</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			// $('.btn-change-view').click(function(e){
			// 	e.preventDefault();
			// 	var type = $(this).attr('data-type');
			// 	$.get('#change-ad-view.html',function(respone){
			// 		location.reload();
			// 	});
			// });

			$('#ftr_left select, input[type="radio"]').change(function(){
				$('#ftr_left').submit();
			});

			$('.btn-sortby a').click(function(e){
				e.preventDefault();
				$('#ftr_left').find('input[name="sortby"]').val($(this).attr('data-value'));
				$('#ftr_left').submit();
			});

			$('.clear_filter .a_fter_d').click(function(){
				var btn = $(this);
				var parent = btn.closest('div.form-group');
				parent.find('input').val('');
				parent.find('select').val('');
				$('#ftr_left').submit();
			});
		});
	</script>

@endsection


@push('js')
	<script src="{{ asset('assets/js/jquery_cookie.js') }}"></script>
	<script type="text/javascript">
		function display(view) {
			$('.products-list').removeClass('list grid').addClass(view);
			$('.list-view .btn').removeClass('active');
			if(view == 'list') {
				$('.products-list .product-layout').addClass('col-lg-12');
				$('.products-list .product-layout .left-block').addClass('col-md-4');
				$('.products-list .product-layout .right-block').addClass('col-md-8');
				$('.products-list .product-layout .item-desc').removeClass('hidden')
				$('.list-view .' + view).addClass('active');
				$.cookie('display', 'list');
			}else{
				$('.products-list .product-layout').removeClass('col-lg-12');
				$('.products-list .product-layout .left-block').removeClass('col-md-4');
				$('.products-list .product-layout .right-block').removeClass('col-md-8');
				$('.products-list .product-layout .item-desc').addClass('hidden');
				$('.list-view .' + view).addClass('active');
				$.cookie('display', 'grid');
			}
		}
		$(document).ready(function () {

			// Click Button
			$('.list-view .btn').each(function() {
				var ua = navigator.userAgent,
				event = (ua.match(/iPad/i)) ? 'touchstart' : 'click';
				$(this).bind(event, function() {
					$(this).addClass(function() {
						if($(this).hasClass('active')) return '';
						return 'active';
					});
					$(this).siblings('.btn').removeClass('active');
					$catalog_mode = $(this).data('view');
					display($catalog_mode);
				});

			});
		});
	// Check if Cookie exists
		if($.cookie('display')){
			view = $.cookie('display');
		}else{
			view = 'grid';
		}
		if(view) display(view);
	</script>
@endpush

