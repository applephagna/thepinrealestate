@extends('layouts.frontend.front_layout')

@push('css')
	<link  href="{{asset('assets/css/property.css')}}" rel="stylesheet" type="text/css">
	<style type="text/css">
    a[disabled="disabled"] {
        pointer-events: none;
    }
	</style>
@endpush

@push('header_search')
  @include('layouts.frontend.includes.header_search')
@endpush
@section('content')
	<div class="listing-page">
		<div class="my-breadcrumb">
			<div class="my-container">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item" aria-current="page">
							<a href="{{route('home')}}"><i class="icon-home"></i>Home</a>
            </li>
          	<li class="breadcrumb-item" aria-current="page">
							<a href="{{ route('home') }}">{{ $pro_type->category_name }}</a>
						</li>
						<li class="breadcrumb-item" aria-current="page">{{ $province_id }} in Cambodia</li>
					</ol>
				</nav>
			</div>
		</div>

		<section class="page-header">
			<div class="my-container">
				<h1 class="title"> {{ $pro_type->category_name }} in Cambodia</h1>
			</div>
		</section>

    <section class="pb-3">
			<div class="my-container">
				<div class="row">
					<!-- ads left	-->
					<div class="col-3 left-side">
						<div class="p-3 bg-white border rounded filter-box">
							<div class="filter_title">Refine your Results</div>
								<form class="form" id="ftr_left" method="get" action=" {{ route('property.allProperties') }}">
									{{-- Provinces --}}
									<div class="form-group filter-group ">
										@if ($province_id !='')
											<span class="clear_filter fter_d">
												<a rel="nofollow" class="a_fter_d" data-name="location" href="javascript:void(0);">Clear</a>
											</span>
										@endif
										<label class="filter-title">City/Province</label>
										<div class="filter-data">
											<select class="form-control fter_d form-control-" name="location" id="province">
												<option value="">All</option>
												@foreach ($provinces as $key => $province)
													<option value="{{$key}}"{{$key==$province_id?'selected':''}}>{{$province}}</option>
												@endforeach
											</select>
										</div>
									</div>
									{{-- District --}}
									@if ($province_id !='')
										<div class="form-group filter-group ">
											@if ($district_id !='')
												<span class="clear_filter fter_d">
													<a rel="nofollow" class="a_fter_d" data-name="location" href="javascript:void(0);">Clear</a>
												</span>
											@endif
											<label class="filter-title">Khan/District</label>
											<div class="filter-data scrollbar-light">
												<select class="form-control list_filter list-unstyled fter_d  form-control-" name="district" id="district">
													<option value="">All</option>
														@if (isset($districts))
															@foreach ($districts as $key => $district)
																<option value="{{$key}}"{{$key==$district_id?'selected':'' }}>{{$district}}</option>
															@endforeach
														@endif
												</select>
											</div>
										</div>
									@endif
									{{-- Commune --}}
									@if (isset($district_id))
										@if ($district_id!='')
											<div class="form-group filter-group ">
											@if ($commune_id !='')
												<span class="clear_filter fter_d">
													<a rel="nofollow" class="a_fter_d" data-name="location" href="javascript:void(0);">Clear</a>
												</span>
											@endif
												<label class="filter-title">Sangkat/Commune</label>
												<div class="filter-data scrollbar-light">
													<select class="form-control list_filter list-unstyled fter_d form-control-" name="commune" id="commune">
														<option value="">All</option>
															@if (isset($communes))
																@foreach ($communes as $key => $commune)
																	<option value="{{$key}}"{{$key==$commune_id?'selected':''}}>{{$commune}}</option>
																@endforeach
														@endif
													</select>
												</div>
											</div>
										@endif
									@endif
								</form>
						</div>
					</div>
					<!-- content right -->
					<div class="col col-9 right-side">
						<div class="bar">
							<div class="left">
								<h2 class="title">{{ $property_by_province->count() }} Result found in {{ $province_id }}  on {{ now() }} </h2>
							</div>
							<div class="right text-right">
								<ul class="nav justify-content-end">
									<li class="nav-item">
										<label>View</label>
										<span class="btn-group mr-1" role="group" aria-label="Basic example">
											{{-- <button type="button" class="btn btn-default icon icon-list btn-change-view" disabled></button>
											<button type="button" class="btn btn-default icon-gallery btn-change-view"></button> --}}
											<a href="{{route('property.allProperties')}}" class="btn btn-default icon icon-list btn-change-view" disabled="disabled"></a>
											<a href="{{route('property.allProperties.grid')}}" class="btn btn-default icon-gallery btn-change-view"></a>
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
								@foreach ($property_by_province as $property)
									<li class="item  special-item  top-item ">
									<a class="border post" href="{{ route('property.show',$property->slug) }}" title="{{$property->title}}">
										<article>
											<div class="item-image">
												<img class="img-cover" src="{{asset('uploads/property/galleries/'.$property->galleries[0]->gallery_image)}}" alt="{{$property->title}}">
											</div>
											<div class="item-detail">
												<h2 class="item-title truncate truncate-2 ">{{$property->title}}</h2>
												<p class="description truncate truncate-2">{{$property->description}}
												<i>tel: 010245643,011735635</i>
												</p>
												<ul class="list-unstyled summary">
													<li>{{ $property->province->name_en }}</li>
													<li>
														<time datetime="{{$property->created_at}}">{{$property->updated_at->diffForHumans()}}</time>
													</li>
													<li>{{$property->size}} (m<sup>2</sup>)</li>
												</ul>
												<p class="item-price m-0 text-red">${{$property->price}}</p>
												<div class="list_thumb">
													@if ($property->galleries->count()==1)
														<span class="thumb">
															<img class="img-cover" src="{{asset('uploads/property/galleries/'.$property->galleries[0]->gallery_image)}}">
														</span>
													@elseif($property->galleries->count()==2)
														<span class="thumb">
															<img class="img-cover" src="{{asset('uploads/property/galleries/'.$property->galleries[0]->gallery_image)}}">
														</span>
														<span class="thumb">
															<img class="img-cover" src="{{asset('uploads/property/galleries/'.$property->galleries[1]->gallery_image)}}">
														</span>
													@elseif($property->galleries->count()>2)
														<span class="thumb">
															<img class="img-cover" src="{{asset('uploads/property/galleries/'.$property->galleries[0]->gallery_image)}}">
														</span>
														<span class="thumb">
															<img class="img-cover" src="{{asset('uploads/property/galleries/'.$property->galleries[1]->gallery_image)}}">
														</span>
														<span class="thumb">
															<img class="img-cover" src="{{asset('uploads/property/galleries/'.$property->galleries[2]->gallery_image)}}">
														</span>
													@endif
												</div>
											</div>
										</article>
									</a>
									<a class="username-tag" href="#{{$property->user->firstname}}">{{$property->user->firstname}}</a> </li>
								@endforeach
							</ul>
						</div>
						<!-- pagination -->
						<div class="p-3">
							{{-- {{$allProperties->links()}} --}}
						</div>
					</div>
				</div>
			</div>
		</section>

	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.btn-change-view').click(function(e){
				e.preventDefault();
				var type = $(this).attr('data-type');
				$.get('https://www.khmer24.com/en/change-ad-view.html',function(respone){
					location.reload();
				});
			});

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

@endpush
