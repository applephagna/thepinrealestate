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
							<a href="{{ route('home') }}">{{ $cat_type->category_name }}</a>
						</li>
						<li class="breadcrumb-item" aria-current="page">{{ $pro_type->category_name }} in Cambodia</li>
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
								<form class="form" id="ftr_left" method="get" action="{{ route('property.searchByCategory') }}">
									@if ($search_category=='house-for-sale' || $search_category=='house-for-rent')
										{{-- Bedroom --}}
										<div class="form-group filter-group active">
											<label class="filter-title">Bedroom</label>
											<div class="filter-data scrollbar-light">
												<select name="ad_bedroom" class="form-control list_filter fter_d form-control-">
													<option value="">All</option>
													@foreach ($bedrooms as $room =>$slug)
														<option value="{{ $slug }}">{{ $room }} Bedroom</option>
													@endforeach
													<option value="more">More+</option>
												</select>
											</div>
										</div>
										{{-- Bathroom --}}
										<div class="form-group filter-group ">
											<label class="filter-title">Bathroom</label>
											<div class="filter-data scrollbar-light">
												<select name="ad_bathroom" class="form-control list_filter fter_d form-control-">
													<option value="">All</option>
													@foreach ($bathrooms as $room => $slug)
														<option value="{{ $slug }}">{{ $room }} Bathroom</option>
													@endforeach
													<option value="more">More+</option>
												</select>
											</div>
										</div>
										{{-- Facing --}}
										<div class="form-group filter-group ">
											<label class="filter-title">Facing</label>
											<div class="filter-data scrollbar-light">
												<div class="list_filter fter_d">
													@foreach ($facings as $key => $facing)
													<div class="custom-control custom-radio">
														<input type="radio" id="ad_facing-{{ strtolower($facing) }}" name="ad_facing" class="custom-control-input" value="{{ strtolower($facing) }}">
														<label class="custom-control-label a_fter_d" for="ad_facing-{{ strtolower($facing) }}">{{ $facing }}</label>
													</div>
													@endforeach
												</div>
											</div>
										</div>
									@endif
									{{-- Price --}}
									<div class="form-group filter-group ">
										<label class="filter-title">Price</label>
										<div class="form-row">
											<div class="filter-data col">
												<input type="text" name="from_ad_price" value="" class="form-control form-control-" placeholder="From">
											</div>
											<div class="filter-data col">
												<input type="text" name="to_ad_price" value="" class="form-control form-control-" placeholder="To">
											</div>
											<div class="filter-data col-3">
												<button class="btn btn-default btn-"><span class="icon icon-next"></span></button>
											</div>
										</div>
									</div>
									{{-- Size(m2) --}}
									<div class="form-group filter-group ">
										<label class="filter-title">Size(m<sup>2</sup>)</label>
										<div class="form-row">
											<div class="filter-data col">
												<input type="text" name="from_ad_size" value="" class="form-control form-control-" placeholder="From">
											</div>
											<div class="filter-data col">
												<input type="text" name="to_ad_size" value="" class="form-control form-control-" placeholder="To">
											</div>
											<div class="filter-data col-3">
												<button class="btn btn-default btn-"><span class="icon icon-next"></span></button>
											</div>
										</div>
									</div>
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
													<option value="{{Str::slug($province)}}"{{Str::slug($province)==$province_id?'selected':''}}>{{$province}}</option>
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
																<option value="{{Str::slug($district)}}"{{Str::slug($district)==$district_id?'selected':'' }}>{{$district}}</option>
															@endforeach
														@endif
												</select>
											</div>
										</div>
									@endif
									{{-- Commune --}}
									{{-- @if (isset($district_id)) --}}
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
																<option value="{{Str::slug($commune)}}"{{Str::slug($commune)==$commune_id?'selected':''}}>{{$commune}}</option>
															@endforeach
													@endif
												</select>
											</div>
										</div>
									@endif
									{{-- @endif --}}
									<input type="hidden" name="category" value="{{ $search_category }}">
									{{-- <input type="hidden" name="sortby" value="newads"> --}}
								</form>
						</div>
					</div>
					<!-- content right			 -->
					<div class="col col-9 right-side">
						<div class="bar">
							<div class="left">
								{{-- @foreach ($property_by_categories as $item)
									<h2 class="title">{{ $item->properties->count() }} Result on {{ now() }} </h2>
								@endforeach --}}
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
								@foreach ($property_by_categories as $property)
									{{-- @foreach ($category->properties as $property) --}}
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
									{{-- @endforeach --}}
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
	<script type="text/javascript">
		// function slugify(string) {
		// 	return string.trim() // Remove surrounding whitespace.
		// 	.toLowerCase() // Lowercase.
		// 	.replace(/[^a-z0-9]+/g,'-') // Find everything that is not a lowercase letter or number, one or more times, globally, and replace it with a dash.
		// 	.replace(/^-+/, '') // Remove all dashes from the beginning of the string.
		// 	.replace(/-+$/, ''); // Remove all dashes from the end of the string.
		// }
	// distrct get data by provice change
		$('#province').change(function(){
			var provinceID = $(this).val();
			if(provinceID!=''){
				$.ajax({
					type:"GET",
					url:"{{url('get-district-search')}}?province_id="+provinceID,
					success:function(res){
						if(res){
							// $("#district").removeAttr('disabled');
							$("#district").prop( "disabled", false );
							$("#district").empty();
							$("#district").append('<option value="" data-value="">Select a Khan/District</option>');
							$.each(res,function(key,value){
							$("#district").append('<option value="'+key+'">'+value+'</option>');
							});
						}else{
							$("#district").empty();
							$("#district" ).prop( "disabled", true );
							$("#commune" ).prop( "disabled", true );
						}
					}
				});
			}else{
					$("#district").empty();
					$("#commune").empty();
					$("#district").append('<option value="0" data-value="0">Select a Khan/District</option>');
					$("#commune").append('<option value="0" data-value="0">Select a Sangkat/Commune</option>');
					$("#district" ).prop( "disabled", true );
					$("#commune" ).prop( "disabled", true );
			}
		});
	// commune get data by district change
		$('#district').on('change',function(){
			var districtID = $(this).val();
			if(districtID!=''){
				$.ajax({
					type:"GET",
					url:"{{url('get-commune-search')}}?district_id="+districtID,
					data:{district:districtID},
					success:function(res){
						if(res){
							$("#commune").prop( "disabled", false );
							$("#commune").empty();
							$("#commune").append('<option value="" data-value="0">Select a Sangkat/Commune</option>');

							$.each(res,function(key,value){
								$("#commune").append('<option value="'+key+'">'+value+'</option>');
							});

						}else{
							$("#commune").empty();
							$("#commune" ).prop( "disabled", true );
						}
					}
				});
			}else{
				$("#commune").empty();
				$("#commune").append('<option value="" data-value="">Select a Sangkat/Commune</option>');
				$("#commune" ).prop( "disabled", true );
			}
		});
	</script>
@endpush
