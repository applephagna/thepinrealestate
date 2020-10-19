@extends('layouts.frontend.front_layout')

@section('pagetitle','Welcome to Property Homepage')

@push('css')
	<link href="{{ asset('assets/css/property.css')}}" rel="stylesheet">
	<link href="{{ asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet">
	<script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
	<script src="{{ asset('assets/js/jquery.fancybox.min.js')}}"></script>
@endpush

@section('content')

	<div class="container">
		<div class="home-page">
			<!-- top menu -->
			<section class="bg-white border-bottom nav-header-bar menu-items">
				<div class="my-container">
					<ul class="nav">
						<li class="nav-item">
							<a class="nav-link active" href="{{ route('home') }}"><span class="icon icon-home"></span></a>
						</li>
						@foreach ($protypes as $ptype)
							<li class="nav-item">
								<div class="dropdown">
									@if ($ptype->cateSub->count()>1)
										<button class="nav-link btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{$ptype->name_en}}</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												@foreach ($ptype->cateSub as $cat)
													<a class="dropdown-item" href="{{route('property.by.type',$cat->slug)}}">{{$cat->category_name}}</a>
												@endforeach
										</div>
									@else
										@foreach ($ptype->cateSub as $cat)
											<a class="nav-link" href="{{ route('property.by.type',$cat->slug) }}">{{$ptype->name_en}}</a>
										@endforeach
									@endif
                </div>
							</li>
						@endforeach
					</ul>
				</div>
			</section>
			<!-- Find Properties in Cambodia -->
			<section class="border-bottom search-box">
				<div class="my-container">
					<div class="text-center">
						<h1 class="big-title">Find Properties in Cambodia</h1>
						<p class="small-title">Welcome to thepinrealestate.com, the biggest online market in Cambodia.</p>
					</div>
					<div class="pb-3 pt-2">
						<div class="row justify-content-center">
							<div class="col-9">
								<form class="form" action="{{route('property.mainSearch')}}" method="get">
									<div class="input-group form-row">
											<input type="text" class="form-control" name="q" value="" placeholder="Search House & Lands...">
										<select class="form-control col-3" name="category" required>
											<option value="">Category</option>
											@foreach ($category_by_properties as $category)
												<option value="{{$category->slug}}" {{ $category->slug==$s_category?'selected':'' }}>
												{{$category->category_name}}</option>
											@endforeach
											</select>
										<select class="form-control col-3" name="location">
											<option value="">Locations</option>
											@foreach ($provinces as $province)
												<option value="{{$province->slug}}" {{$province->slug==$location?'selected':'' }}>
												{{$province->name_en}}</option>
											@endforeach
										</select>
										<input type="submit" value="Search" name="" class="form-control btn btn-primary col-2">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Find House & Lands by Category -->
			<section class="list-categories">
				<div class="my-container">
					<div class="categories-items">
						<div class="header">
							<h2 class="title">Find House & Lands by Category</h2>
							<a class="btn btn-outline-primary btn-sm" href="{{route('property.allProperties')}}">View All</a>
						</div>
						<div class="content">
							<ul class="list-unstyled items-has-image sale-categories">
								@foreach ($property_types as $type)
									<li class="">
										<div class="item">
											<div class="detail">
												<div class="image">
													<img class="img-cover" src="{{ asset('assets/img/'.$type->image) }}" />
												</div>
 												<div class="title">{{ $type->name_en }}</div>
											</div>
											@if ($type->childs->count()>1)
												<div class="controls">
											@else
												<div class="controls one">
											@endif
												@foreach ($type->childs as $subtype)
													@foreach ($subtype->cateType as $slug)
														<a href="{{ route('property.by.type',$slug->slug) }}"><span class="btn">{{ $slug->subtype->name_en }}</span></a>
													@endforeach
												@endforeach
											</div>
										</div>
									</li>
								@endforeach
							<input type="hidden" name="main_type" id="main_type" value="I miss you">
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- Top House & Lands -->
			<section class="top-items pt-3">
				<div class="my-container">
					<div class="top-item-box">
						<div class="header">
							<h1 class="title">Top House & Lands</h1>
							<a href="{{route('property.allProperties')}}" class="btn btn-outline-primary btn-sm">View All</a>
						</div>
							<div class="content">
								<div class="list-top-items owl-carousel owl-carousel-top-items">
									@foreach ($properties as $property)
										<div class="item">
											<a class="item" href="{{ route('property.show',$property->slug) }}" title="{{ $property->title }}">
											<article>
											<div class="company-logo">
											<img class="img-cover" src="{{isset($property->galleries[0]->gallery_image) ? asset('uploads/property/galleries/'.$property->galleries[0]->gallery_image):asset('assets/img/no_image.gif')}}" alt="{{ $property->title }}">
											</div>
											<h3 class="title truncate truncate-2">{{ $property->title }}</h3>
											<p class="price text-red m-0">{{ $property->price }}</p>
											</article>
											</a>
										</div>
									@endforeach
								</div>
							</div>

					</div>
				</div>
			</section>
			<!-- Browse by Location -->
			<section class="list-locations pt-3">
				<div class="my-container">
					<div class="list-locations">
						<div class="header">
							<h2 class="title">Browse by Location</h2>
							</div>
							<div class="content">
							<ul class="list-unstyled">
								@foreach ($provinces as $province)
									<li class="big">
									<a href="{{ route('property.by.province',$province->slug) }}" title="{{ $province->name_en }}" class="truncate">{{ $province->name_en }}</a>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- Recent House & Lands -->
			<section class="list-last-items pt-3">
				<div class="my-container">
					<div class="last-items pt-3 pb-3">
						<div class="header">
							<h2 class="title">Recent House & Lands</h2>
							<a class="btn btn-outline-primary btn-sm" href="#all-property.html">View All</a>
						</div>
						<div class="content">
							<ul class="list-unstyled">
								@foreach ($properties as $property)
									<li class="item">
										<a class="item border bg-white rounded" href="{{ route('property.show',$property->slug) }}" title="{{ $property->title }}">
											<article>
												<div class="image">
													<img class="img-cover" src="{{isset($property->galleries[0]->gallery_image) ? asset('uploads/property/galleries/'.$property->galleries[0]->gallery_image):asset('assets/img/no_image.gif')}}" alt="{{ $property->title }}">
												</div>
												<div class="detail">
													<h3 class="title truncate truncate-2">{{ $property->title }}</h3>
													<p class="price text-red m-0">${{ $property->price }}</p>
												</div>
											</article>
										</a>
									</li>
								@endforeach
							</ul>
							<div class="row justify-content-md-center pt-3">
								<div class="col-8">
									<a href="{{route('property.allProperties')}}" class="btn btn-primary btn-block">View All</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<script type="text/javascript">
					$(document).ready(function(){
						$('.owl-carousel-top-items').owlCarousel({
						    loop:true,
						    margin:15,
						    responsiveClass:true,
						    dots: false,
						    nav: true,
						    autoplay: true,
						    autoplayHoverPause:true,
						    autoplayTimeout: 5000,
						    loop:true,
						    responsive:{
						        0:{
						            items:1,
						            nav:true
						        },
						        600:{
						            items:3,
						            nav:false
						        },
						        1000:{
						            items:4,
						            nav:true,
						            loop:false
						        }
						    }
						});
					});
			</script>
		</div>
	</div>

@endsection

@push('js')
	<script>
		$(document).ready(function(){

		});
	</script>
@endpush
