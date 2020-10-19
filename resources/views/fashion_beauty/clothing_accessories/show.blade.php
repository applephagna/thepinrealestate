@extends('layouts.backend.khmer24_layout')

@push('css')
	<link href="{{ asset('assets\css\property.css')}}" rel="stylesheet">
	<link href="{{ asset('assets\css\owl.carousel.min.css')}}" rel="stylesheet">
	<link href="{{ asset('assets\css\jquery.fancybox.min.css')}}" rel="stylesheet">
	<script src="{{ asset('assets\js\owl.carousel.min.js')}}"></script>
	<script src="{{ asset('assets\js\jquery.fancybox.min.js')}}"></script>
@endpush

@section('content')

	<div class="detail-page">
		<div class="my-breadcrumb">
			<div class="my-container">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}"><i class="icon-home"></i>Home</a>
						</li>
						<li class="breadcrumb-item" aria-current="page"><a href="#property.html">House & Lands</a>
						</li>
						<li class="breadcrumb-item" aria-current="page"><a href="#property/landed-properties-for-sale.html">Land for Sale </a>
						</li>
					</ol>
				</nav>
			</div>
		</div>
		<section class="pb-3">
			<div class="my-container">
				<div class="row">
					<div class="col col-8">
						<div class="bg-white border rounded">

							<div class="item-header border-bottom">
								{{-- slider --}}
								<div id="slide-box">
									<div class="owl-carousel imglist">
										@foreach ($images as $image)
											<div class="item item-{{$image->id}}">
												<a class="w-100" href="" data-fancybox="images">
												<img class="img-contain" src="{{asset('uploads/property/galleries/'.$image->gallery_image)}}" alt="{{$property->title}}">
												</a>
											</div>
										@endforeach
									</div>
									<div class="owl-nav">
										<div class="owl-prev"><span class="icon icon-prev"></span></div>
										<div class="owl-next"><span class="icon icon-next"></span></div>
									</div>
									<div class="thumbs">
										@foreach ($images as $image)
											<div class="item item-{{$image->id}} active">
												<a class="" href="#slide-{{$image->id}}" data-id="{{$image->id}}">
													<img class="img-cover" src="{{asset('uploads/property/galleries/'.$image->gallery_image)}}" alt="{{$property->title}}">
												</a>
											</div>
										@endforeach
									</div>
								</div>
								<div class="item-short-description p-3 position-relative">
									<h1>{{$property->title}}</h1>
									<p class="price price_tag"><b class="price">{{$property->price}}</b></p>
									<ul class="list-unstyled item-info m-0">
										<li>
											<span class="title">Ad ID :</span>
											<span class="value">{{$property->id}}</span>
										</li>
										<li>
											<span class="title">Locations :</span>
											<span class="value">{{$property->province->name_en}}</span>
										</li>
										<li>
											<span class="title">Posted On :</span>
											<span class="value"><time datetime="2019-03-23 08:12:57">{{$property->created_at}}</time></span>
										</li>
										<li>
											<span class="title">View :</span>
											<span class="value">333</span>
										</li>
									</ul>
										<a rel="nofollow" href="#" class="btn-save-item save_ad">
											<i class="icon icon-like text_gray"></i>
										</a>
										<a rel="nofollow" onclick="javascript:void window.open('https://www.facebook.com/sharer/sharer.php?u=','1422871850498','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=" class="btn-share-item share_ad">
											<i class="icon icon-share text_gray"></i>
										</a>
								</div>
							</div>

							<div class="item-detail p-3">
								<h2>Description</h2>
								<ul class="list-unstyled item-fields">
									<li>
										<div>
											<span class="title">Size(m<sup>2</sup>):</span><span class="value">{{$property->size}}</span>
										</div>
									</li>
									<li>
										<div>
											<span class="title">Price:</span><span class="value">{{$property->price}}</span>
										</div>
									</li>
								</ul>
								<p class="post-description">{{$property->title}}<br />
								<br />
									{{$property->description}}
								</p>
							</div>

							<div class="p-3 item-contact">
								<div class="item-mention">
									<div>សូមចុចលើលេខទូរស័ព្ទ ដើម្បីបង្ហាញ ហើយកំុភ្លេចនិយាយថាអ្នកបានឃើញការផ្សព្វផ្សាយនេះនៅលើ tinhtoday.com។</div>
									<div>Please click on phone number to show and don't forget to mention that you found this ad on tinhtoday.com.</div>
								</div>
								<div class="phone_box btn_show_phone">
									<a href="#show_phone" rel="nofollow" class="btn_show_phone_box">
										<span class="icon_phone"></span>
										<div class="num">{{str_limit($property->phone1, 5, 'xxx')}}</div>
										<div class="btn_link">Click to show phone number</div>
									</a>
									<div class="list_numbers d-none">
										<ul class="list-unstyled m-0">
											@if (isset($property->phone1))
												<li class="number">
													<a href="tel:{{$property->phone1}}" rel="nofollow" class="number-0 small" title="{{$operator_name1}}:{{$property->phone1}}">
													<img class="icon-provider"
														@if ($operator_name1=="Cellcard")
															src="{{asset('assets/img/sim/cellcard.png')}}"												
														@endif
														@if ($operator_name1=="Smart")
															src="{{asset('assets/img/sim/smart.png')}}"												
														@endif
														@if ($operator_name1=="Metfone")
															src="{{asset('assets/img/sim/metfone.png')}}"												
														@endif											
													alt="{{$operator_name1}}">
													<div class="num">{{$property->phone1}}</div>
													</a>
												</li>
											@endif
											@if (isset($property->phone2))
												<li class="number">
													<a href="tel:{{$property->phone2}}" rel="nofollow" class="number-1 small" title="{{$operator_name2}}:{{$property->phone2}}">
													<img class="icon-provider" 
														@if ($operator_name2=="Cellcard")
															src="{{asset('assets/img/sim/cellcard.png')}}"												
														@endif
														@if ($operator_name2=="Smart")
															src="{{asset('assets/img/sim/smart.png')}}"												
														@endif
														@if ($operator_name2=="Metfone")
															src="{{asset('assets/img/sim/metfone.png')}}"												
														@endif											
													alt="{{$operator_name2}}">
													<div class="num">{{$property->phone2}}</div>
													</a>
												</li>
											@endif
											@if (isset($property->phone3))
												<li class="number">
													<a href="tel:{{$property->phone3}}" rel="nofollow" class="number-2 small" title="{{$operator_name3}}:{{$property->phone3}}">
													<img class="icon-provider" 
														@if ($operator_name3=="Cellcard")
															src="{{asset('assets/img/sim/cellcard.png')}}"												
														@endif
														@if ($operator_name3=="Smart")
															src="{{asset('assets/img/sim/smart.png')}}"												
														@endif
														@if ($operator_name3=="Metfone")
															src="{{asset('assets/img/sim/metfone.png')}}"												
														@endif	
													alt="{{$operator_name3}}">
													<div class="num">{{$property->phone3}}</div>
													</a>
												</li>
											@endif											
									 </ul>
									</div>
								</div>
							</div>

							<div class="item-footer border-top p-1">
								<a class="btn btn-link text-primary btn-sm" rel="nofollow" onclick="javascript:void window.open('https://www.facebook.com/sharer/sharer.php?u={{ $property->title }}','1422871850498','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$property->title}}">
									<span class="icon icon-share"></span> Share</a>
								<a class="btn btn-link text-primary btn-sm float-right" data-toggle="modal" data-target="#report-modal"><span class="icon icon-warning"></span> Report</a>
							</div>
						</div>

						<div class="disclaimer p-3 bg-white border mt-3">
							<div class="title">ការមិនទទួលខុសត្រូវ / Disclaimer</div>
							<div class="info">យើងខ្ញុំមិនគ្រប់គ្រងមាតិកា ដែលបានបង្ហោះឡើងដោយសមាជិកឡើយ។ ដូច្នេះយើងមិនទទួលខុសត្រូវលើការផ្សាយផលិតផលនេះទេ ហើយក៏មិនធានាចំពោះបញ្ហាដែលទាក់ទងដោយផ្ទាល់ ឬ ប្រយោលទៅនឹងសកម្មភាព ឬ អសកម្មណាមួយឡើយ។<br>We does not control the content posted by members and therefore assumes no responsibility and disclaims any liability for any consequence relating directly or indirectly to any action or inaction.</div>
						</div>

						<div class="relate-items mt-3">
							<div class="item-content">
								<ul class="list-unstyled items">
									@foreach ($random_properties as $key => $property)
									<li class="item">
										<a href="{{route('post.show',$property->slug)}}" title="{{$property->title}}" class="bg-white border rounded">
										<article>
										<div class="image"><img class="img-cover" src="{{isset($property->galleries[$key]->gallery_image) ? asset('uploads/property/galleries/'.$property->galleries[$key]->gallery_image):asset('assets/img/no_image.gif')}}" alt="{{$property->title}}"></div>
										<div class="detail">
										<h4 class="title truncate truncate-2">{{$property->title}}</h4>
										<p class="price text-red m-0">${{$property->price}}</p>
										</div>
										</article>
										</a>
									</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>

					<aside class="col-4 right-side">
						<div class="bg-white border rounded profile">
						<a class="header" href="#BusinessChannel">
						<div class="image">
						<img class="img-cover" src="{{asset('assets/img/businesschann_a4.jpg')}}" />
						</div>
						<div class="detail">
						<p class="name">Business Channel Cambodia</p>
						<p class="last-active">Last Active Yesterday</p>
						<p class="btn-link">Show all ad from this user</p>
						</div>
						</a>
						<div class="content">
							<div class="phone_box btn_show_phone">
								<a href="#show_phone" rel="nofollow" class="btn_show_phone_box">
									<span class="icon_phone"></span>
									<div class="num">{{str_limit($property->phone1, 5, 'xxx')}}</div>
									<div class="btn_link">Click to show phone number</div>
								</a>
								<div class="list_numbers d-none">
									<ul class="list-unstyled m-0">
										@if (isset($property->phone1))
											<li class="number">
												<a href="tel:{{$property->phone1}}" rel="nofollow" class="number-0 small" title="{{$operator_name1}}:{{$property->phone1}}">
												<img class="icon-provider"
													@if ($operator_name1=="Cellcard")
														src="{{asset('assets/img/sim/cellcard.png')}}"												
													@endif
													@if ($operator_name1=="Smart")
														src="{{asset('assets/img/sim/smart.png')}}"												
													@endif
													@if ($operator_name1=="Metfone")
														src="{{asset('assets/img/sim/metfone.png')}}"												
													@endif											
												alt="{{$operator_name1}}">
												<div class="num">{{$property->phone1}}</div>
												</a>
											</li>
										@endif
										@if (isset($property->phone2))
											<li class="number">
												<a href="tel:{{$property->phone2}}" rel="nofollow" class="number-1 small" title="{{$operator_name2}}:{{$property->phone2}}">
												<img class="icon-provider" 
													@if ($operator_name2=="Cellcard")
														src="{{asset('assets/img/sim/cellcard.png')}}"												
													@endif
													@if ($operator_name2=="Smart")
														src="{{asset('assets/img/sim/smart.png')}}"												
													@endif
													@if ($operator_name2=="Metfone")
														src="{{asset('assets/img/sim/metfone.png')}}"												
													@endif											
												alt="{{$operator_name2}}">
												<div class="num">{{$property->phone2}}</div>
												</a>
											</li>
										@endif
										@if (isset($property->phone3))
											<li class="number">
												<a href="tel:{{$property->phone3}}" rel="nofollow" class="number-2 small" title="{{$operator_name3}}:{{$property->phone3}}">
												<img class="icon-provider" 
													@if ($operator_name3=="Cellcard")
														src="{{asset('assets/img/sim/cellcard.png')}}"												
													@endif
													@if ($operator_name3=="Smart")
														src="{{asset('assets/img/sim/smart.png')}}"												
													@endif
													@if ($operator_name3=="Metfone")
														src="{{asset('assets/img/sim/metfone.png')}}"												
													@endif	
												alt="{{$operator_name3}}">
												<div class="num">{{$property->phone3}}</div>
												</a>
											</li>
										@endif											
								 	</ul>
								</div>
							</div>
						<ul class="list-unstyled user-info m-0">
						<li>
						<a class="btn-link" href="#BusinessChannel"><span class="icon icon-store"></span> https://www.tinhtoday.com/BusinessChannel</a>
						</li>
						<li>
						<span class="icon icon-location"></span> Kandal , Samdech decho Hun Sen (60M) and National road #2 (15minute drive from kbalthnal). </li>
						</ul>
						<a class="map_box btn_showMap" target="_blank" href="https://maps.google.com/maps?q=12.50062847042421,104.97525008197022&amp;17" rel="nofollow">
						<div class="text btn btn-block btn-default"><span class="icon icon-google-map"></span> Show on Google Map</div>
						</a>
						</div>
						<div class="footer border-top">
						<a class="btn btn-warning btn-block" href="/"><span class="icon icon-chat"></span> Chat</a>
						</div>
						</div>
					</aside>

				</div>
			</div>
		</section>

		<div class="modal" tabindex="-1" role="dialog" id="report-modal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Report</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="message"></div>
						<form action="/report" id="form_report" method="post" accept-charset="utf-8">
							<input type="hidden" name="csrf_test_name" value="{{ csrf_token() }}" />
							<input type="hidden" name="id" value="3016519" />
							<div class="custom-control custom-radio form-group">
							<input type="radio" name="report" class="custom-control-input" id="reason-1" value="1">
							<label class="custom-control-label" for="reason-1">Product already sold</label>
							</div>
							<div class="custom-control custom-radio form-group">
							<input type="radio" name="report" class="custom-control-input" id="reason-2" value="2">
							<label class="custom-control-label" for="reason-2">Seller not responding/phone unreachable</label>
							</div>
							<div class="custom-control custom-radio form-group">
							<input type="radio" name="report" class="custom-control-input" id="reason-3" value="3">
							<label class="custom-control-label" for="reason-3">Ad is duplicate</label>
							</div>
							<div class="custom-control custom-radio form-group">
							<input type="radio" name="report" class="custom-control-input" id="reason-4" value="4">
							<label class="custom-control-label" for="reason-4">Wrong category</label>
							</div>
							<div class="custom-control custom-radio form-group">
							<input type="radio" name="report" class="custom-control-input" id="reason-5" value="5">
							<label class="custom-control-label" for="reason-5">Fraud reason</label>
							</div>
						</form> 
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-clear btn-link" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary btn-submit-report">Submit</button>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			$(document).ready(function() {
				$.fancybox.defaults.hash = false;			        
				var owl = $(".owl-carousel").owlCarousel({items:1, center:true, dots:false, margin:10, callbacks:true, URLhashListener:true, autoplayHoverPause:true, startPosition:'URLHash'});
				$(".owl-nav div").click(function(e){
					if($(this).attr('class')=="owl-prev") {
						owl.trigger('prev.owl.carousel');
					} else {
						owl.trigger('next.owl.carousel');
					}
				});
				owl.on('changed.owl.carousel', function(event) {
					$('body').find('#slide-box .thumbs div').removeClass('active');
					$('body').find('#slide-box .thumbs div.item-'+(event.item.index+1)).addClass('active');
				});
				// Custom options
				$( '[data-fancybox="images"]' ).fancybox({
				  buttons : [
				    'close'
				  ]
				});
				$('body').on('click','#slide-box .thumbs a', function(e){
					e.preventDefault();
					$('body').find('#slide-box .thumbs div').removeClass('active');
					$(this).closest('div').addClass('active');
					var id = $(this).attr('data-id');
					owl.trigger('to.owl.carousel',id-1);
				});

		        var phone_show_status = false;
		        $('.btn_show_phone').click(function(e){        	
		        	if(phone_show_status == false) {
		        		e.preventDefault();
			        	$('.btn_show_phone').find('.btn_show_phone_box').addClass('d-none');
			        	$('.btn_show_phone').find('.list_numbers').removeClass('d-none');
			        	$('.post-description').find('.btn_show_phone');
			            $($('body').find('p.post-description').find('a.btn_show_phone')).each(function( index ) {
			                var phone = $(this).attr('data-value');
			              $(this).html(phone);
			            });
		        	}
		            if(phone_show_status==false) {
		                 e.preventDefault();

		                phone_show_status=true;
		                	                $('.phone_box').addClass('active');

		            }
		        	
		        	phone_show_status = true;
		        });


		        $('.btn-submit-report').click(function(e){
		        	e.preventDefault();
		        	
		        	$('#report-modal').addClass('active');

		        	$('#report-modal').find('.message').html('');
		        	$.post($('#form_report').attr('action'),$('#form_report').serialize(),function(respone) {
		        		$('#report-modal').removeClass('active');
		        		if(respone.status) {
			        		$('#report-modal').find('.modal-body').html('<div class="text-center p-3">'+respone.success+'</div>');
			        		$('#report-modal').find('.modal-footer').remove();
		        		} else {
			        		$('#report-modal').find('.message').html(respone.error);
		        		}
		        	},'json');
		        });


		        $('#suggestion_text .text').click(function(){
		        	$('#input-message').val($(this).text());
		        	$('#message-form').submit();
		        });

		        $('.btn-save-item').click(function(e){
		        	e.preventDefault();
		        	$.get($(this).attr('href'),function(respone){
		        		if(respone.save_status) {
		        			$('.btn-save-item').addClass('active');
		        		} else {
		        			$('.btn-save-item').removeClass('active');
		        		}
		        	},'json');
		        });
			});
		</script>
	</div>

@endsection

@push('js')
	{{-- expr --}}
@endpush