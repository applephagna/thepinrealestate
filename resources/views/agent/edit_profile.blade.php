@extends('layouts.frontend.front_layout')

@push('css')
	{{-- <script src="{{asset('assets/js/plupload.full.min.js')}}"></script> --}}
  <link rel="stylesheet" href="{{asset('assets/css/members.css')}}">
  {{-- <link rel="stylesheet" href="{{asset('assets/sweetalert2/sweetalert2.min.css')}}"> --}}
@endpush

@section('content')

  <div class="my-account-page account-page">
    <div class="my-account-head bg-white border-bottom">
			@include('agent.includes.user_info')
    </div>

		<div class="my-container pt-3 pb-3">
			<div class="setting-page">
				<div class="my-container">
					<div class="bg-white">
						<div class="content row">
							<div class="left-content col-2">
								@include('agent.includes.list_setting')
							</div>
							<div class="right-content col-10">
								<div id="my_content" class="">
									<section class="box">
										<div class="list active">
											<div class="head">
											<h1 class="title">Edit Profile</h1>
											@if (count($errors) > 0)
												<div class="alert alert-danger">
													<strong>Whoops!</strong> There were some problems with your input.
													<ul>
														@foreach ($errors->all() as $error)
															<li>{{ $error }}</li>
														@endforeach
													</ul>
												</div>
											@endif
											</div>
											<div class="list_data">
												<form action="{{route('agent.update-profile',auth()->id())}}" class="mar_t15 form form-horizontal"
													method="post" accept-charset="utf-8" enctype="multipart/form-data">
													{{ csrf_field() }}
													{{ method_field('PUT') }}
													<div class="edit_cover">
														<div class="img_cover">
															<img class="img-cover" id="img-cover" src="{{ $user->cover_photo<>''?asset('uploads/user/cover/'.$user->cover_photo) :asset('assets/img/profile_cover.png') }}" alt="Cover">
														</div>
														<a href="javascript:changeProfile()" id="btn-upload-profile-cover" style="display: block;z-index: 1;" class="btn btn-success btn-sm">Upload Cover</a>
														<input type="hidden" id="remove" name="file_cover_remove" value="1">
														<a style="color: red; display: none;" class="btn btn-danger btn-sm" id="remove_cover" href="javascript:removeImage()"></a>
														<div class="moxie-shim moxie-shim-html5" style="position: absolute; top: 274px; left: 653px; width: 105px; height: 31px; overflow: hidden; z-index: 0;">
															<input id="img_cover" name="img_cover" type="file" style="font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;" accept="image/jpeg,.jpg,image/gif,.gif,image/png,.png,.jpeg">
														</div>
													</div>
													<div class="edit_profile">
														<div class="img_profile">
															<div class="plupload text-center" style="display: inline-block; position: relative;">
																<div class="pl_img">
																	<div class="default_image">
																		<img class="img-cover" id="img_profile_photo" src="{{ $user->cover_photo<>''?asset('uploads/user/profile/'.$user->photo) :asset('assets/img/user.png') }}" alt="Photo">
																	</div>
																</div>
																<a href="javascript:changeProfilePhoto()" id="pl_browse" class="btn btn-warning btn-sm " style="position: relative; z-index: 1;">Change Photos</a>
																<input type="hidden" id="remove_photo" name="file_photo_remove" value="1">
																<div id="profile_container" class="moxie-shim moxie-shim-html5" style="position: absolute; top: 136px; left: 3px; width: 114px; height: 31px; overflow: hidden; z-index: 0;">
																	<input id="profile_photo" name="profile_photo" type="file" style="font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;" accept="image/jpeg,.jpg,image/gif,.gif,image/png,.png,.jpeg">
																</div>
															</div>
														</div>
														{{-- name --}}
														<div class="row">
															{{-- first name --}}
															<div class="col-md-6">
																<div class="form-group row">
																	<label for="firstname" class="col-md-4 text-right col-form-label">{{ __('Name En') }}<span class="red">*</span>:</label>
																	<div class="col-md-8">
																		<input id="name_en" type="text" class="form-control{{ $errors->has('name_en') ? ' is-invalid' : '' }}" name="name_en" value="{{ $user->name_en }}" required autofocus>
																		@if ($errors->has('name_en'))
																		<span class="invalid-feedback" role="alert">
																			<strong>{{ $errors->first('name_en') }}</strong>
																		</span>
																		@endif
																	</div>
																</div>
															</div>
															{{-- first name kh--}}
															<div class="col-md-6">
																<div class="form-group row">
																	<label for="name_kh" class="col-md-4 col-form-label text-right">{{ __('Name KH') }}<span class="red">*</span>:</label>
																	<div class="col-md-8">
																		<input id="name_kh" type="text" class="form-control{{ $errors->has('name_kh') ? ' is-invalid' : '' }}" name="name_kh" value="{{ $user->name_kh }}" required autofocus>
																		@if ($errors->has('name_kh'))
																		<span class="invalid-feedback" role="alert">
																			<strong>{{ $errors->first('name_kh') }}</strong>
																		</span>
																		@endif
																	</div>
																</div>
															</div>
														</div>
														{{-- phone --}}
														<div class="form-group row">
															<label for="phone" class="col-3 text-right col-form-label">Phone <span class="red">*</span>:</label>
															<div class="phone col-5">
																<div class="phone-1 form-input">
																<input type="text" name="phone" value="{{ $user->phone }}" id="phone-1" class="form-control number" maxlength="10" placeholder="Phone 1">
																<a href="javascript:void(0)" class="add_phone" data-id="add"><i class="icon-plus-full"></i></a>
																</div>
																<div class="phone-2 form-input  d-none">
																<input type="text" name="phone-1" value="{{ $user->phone1 }}" id="phone-2" class="form-control number" maxlength="10" placeholder="Phone 2">
																<a href="javascript:void(0)" class="delete_phone" data-id="phone-2"><i class="icon-remove"></i></a>
																</div>
																<div class="phone-3 form-input d-none">
																<input type="text" name="phone-2" value="{{ $user->phone2 }}" id="phone-3" class="form-control number" maxlength="10" placeholder="Phone 3">
																<a href="javascript:void(0)" class="delete_phone" data-id="phone-3"><i class="icon-remove"></i></a>
																</div>
															</div>
														</div>
														{{-- Select a City/Province --}}
														<div class="form-group row">
															<label for="province" class="col-3 text-right col-form-label">City/Province <span class="red">*</span>:</label>
															<div class="col-5">
																<select data-placeholder="Select a province" id="province" name="province_id" class="form-control map_form" required>
																	<option value="0" data-value="0">Select a City/Province</option>
																	@foreach ($provinces as $key => $province)
																		@if (isset($user))
																			@if ($key==$user->province_id)
																				<option data-en-title="{{$province}}" value="{{$key}}" data-value="{{$province}}" data-chained="{{ $province }}" class="{{ $province }}" selected>{{$province}}</option>
																			@else
																				<option data-en-title="{{$province}}" value="{{$key}}" data-value="{{ $province }}" data-chained="{{ $province }}" class="{{ $province }}">{{$province}}</option>
																			@endif
																		@else
																			<option data-en-title="{{$province}}" value="{{$key}}" data-value="{{ $province }}" data-chained="{{ $province }}" class="{{ $province }}">{{$province}}</option>
																		@endif
																	@endforeach
																</select>
															</div>
														</div>
														{{-- Select a Khan/District --}}
														<div class="form-group row">
															<label for="district" class="col-3 text-right col-form-label">Khan/District <span class="red">*</span>:</label>
															<div class="col-5">
																<select data-placeholder="Select a district" id="district" name="district_id" class="form-control map_form" required
																{{ $user->district_id==''?'disabled':'' }}>
																	<option value="0" data-value="0">Select a Khan/District</option>
																	@if (isset($user))
																		@foreach ($districts as $district)
																			@if ($district->id==$user->district_id)
																				<option data-en-title="{{$district->name_en}}" value="{{$district->id}}" data-value="{{$district->name_en}}" data-chained="{{$district->name_en}}" class="{{$district->name_en}}" selected>{{$district->name_en}}</option>
																			@else
																				<option data-en-title="{{$district->name_en}}" value="{{$district->id}}" data-value="{{$district->name_en}}" data-chained="{{$district->name_en}}" class="{{$district->name_en}}">{{$district->name_en}}</option>
																			@endif
																		@endforeach
																	@endif
																</select>
															</div>
														</div>
														{{-- Select a Sangkat/Commune --}}
														<div class="form-group row">
															<label for="commune" class="col-3 text-right col-form-label">Sangkat/Commune <span class="red">*</span>:</label>
															<div class="col-5">
																<select data-placeholder="Select a commune" id="commune" name="commune_id" class="form-control map_form" required
																{{ $user->commune_id==''?'disabled':'' }}>>
																	<option value="0" data-value="">Select a Sangkat/Commune</option>
																		@if (isset($user))
																			@foreach ($communes as $commune)
																				@if ($commune->id==$user->commune_id)
																					<option data-en-title="{{$commune->name_en}}" value="{{$commune->id}}" data-value="{{$commune->name_en}}" data-chained="{{$commune->name_en}}" class="{{$commune->name_en}}" selected>{{$commune->name_en}}</option>
																				@else
																					<option data-en-title="{{$commune->name_en}}" value="{{$commune->id}}" data-value="{{$commune->name_en}}" data-chained="{{$commune->name_en}}" class="{{$commune->name_en}}">{{$commune->name_en}}</option>
																				@endif
																			@endforeach
																		@endif
																</select>
															</div>
														</div>
														{{-- Location Details --}}
														<div class="form-group row">
															<label for="address" class="col-3 text-right col-form-label">Location Details :</label>
															<div class="col-8">
															<textarea name="address" cols="40" rows="10" id="address" class="form-textarea  form-control" style="height: 55px;">

															</textarea>
															</div>
														</div>
														<div class="form-group">
															<div class="map_view">
																<div class="map_box hidden" id="ad_map">
																	<div id="map" style="position: relative; overflow: hidden;">
																		<div class="centerMarker"></div>
																	</div>
																	<a id="find_location" href="#"><span class="icon icon-my-location"></span> Find My Location</a>
																	<span id="map_loading" class="loading"></span>
																</div>
																<input type="hidden" id="x" name="x" value="">
																<input type="hidden" id="y" name="y" value="">
																<input type="hidden" id="z" name="z" value="">
															</div>
														</div>
														{{-- submit button --}}
														<div class="form-group">
															<input type="submit" name="btnsave" value="Save" class="btn btn-block btn-primary ">
														</div>
													</div>
												</form>
											</div>
										</div>
									</section>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

    <a href="#totop" id="totop"><i class="icon-up"></i></a>
    <div class="fix-feedback">
        <a href="#feedback" class="btn btn-primary btn-sm">Feedback</a>
    </div>
  </div>

@endsection

@push('js')

	<script type="text/javascript">
		// distrct get data by provice change
		$('#province').change(function(){
				var provinceID = $(this).val();
				if(provinceID>=1){
					$.ajax({
					type:"GET",
					url:"{{url('get-district-list')}}?province_id="+provinceID,
					success:function(res){
						if(res){
								// $("#district").removeAttr('disabled');
								$("#district" ).prop( "disabled", false );
								$("#district").empty();
								$("#district").append('<option value="0" data-value="">Select a Khan/District</option>');
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
					$("#district").append('<option value="0" data-value="">Select a Khan/District</option>');
					$("#commune").append('<option value="0" data-value="">Select a Sangkat/Commune</option>');
					$("#district" ).prop( "disabled", true );
					$("#commune" ).prop( "disabled", true );
				}
			});
		// commune get data by district change
		$('#district').on('change',function(){
			var districtID = $(this).val();
			if(districtID>=1){
					$.ajax({
						type:"GET",
						url:"{{url('get-commune-list')}}?district_id="+districtID,
						success:function(res){
							if(res){
									$("#commune" ).prop( "disabled", false );
									$("#commune").empty();
									$("#commune").append('<option value="0" data-value="">Select a Sangkat/Commune</option>');

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
				$("#commune").append('<option value="0" data-value="">Select a Sangkat/Commune</option>');
				$("#commune" ).prop( "disabled", true );
			}
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function () {
			$(".number").keypress(function(evt) {
				if (evt.keyCode != 8) {
					var theEvent = evt || window.event;
					var key = theEvent.keyCode || theEvent.which;
					key = String.fromCharCode(key);
					var regex = /[0-9]|\./;
					if (!regex.test(key)) {
							theEvent.returnValue = false;
						if (theEvent.preventDefault)
							theEvent.preventDefault();
					}
				}
			});

			$('.phone a').click(function(e) {
				e.preventDefault();
				if($(this).attr('data-id') == 'add') {
					if($( "body" ).find('div.phone-2').hasClass( "d-none" )) {
						$('.phone-2').removeClass('d-none');
					} else {
						$('.phone-3').removeClass('d-none');
						$('a.add_phone').addClass('d-none');
					}
				} else {
					if ($(this).attr('data-id') == 'phone-2') {
						if($('input[name="phone-3"]').val()) {
							$('input[name="phone-2"]').val($('input[name="phone-3"]').val());
							$('input[name="phone-3"]').val('');
						} else {
							if($('input[name="phone-2"]').val()) {
								$('input[name="phone-2"]').val('');
							} else {
								if(!$('input[name="phone-2"]').val()) {
									$('.phone-2').addClass('d-none');
								}
								$('.phone-3').addClass('d-none');
								$('a.add_phone').removeClass('d-none');
							}
						}
					}
					if ($(this).attr('data-id') == 'phone-3') {
							if($('input[name="phone-3"]').val()) {
									$('input[name="phone-3"]').val('');
							} else {
									$('a.add_phone').removeClass('d-none');
									$('.phone-3').addClass('d-none');
									$('input[name="phone-3"]').val('');
							}
					}
				}
			});

			$('.phone input').on('keypress keyup focus change', function() {
				if ($(this).val()) {
					var input_name = $(this).attr('name');
					if (input_name == 'phone-1') {
							$('.phone-2').removeClass('d-none');
					}
					if (input_name == 'phone-2') {
							$('.phone-3').removeClass('d-none');
					}
				}
			});
		});
	</script>
	{{-- upload profile cover --}}
	<script>
		function changeProfile() {
			$('#img_cover').click();
		}
		$('#img_cover').change(function () {
			var imgPath = this.value;
			var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
			if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg") {
				$('#remove_cover').css('display','block');
				// $('#btn-upload').text('Change');
				readURL(this);
			} else {
				alert("Please select image file (jpg, jpeg, png).")
			}
		});
		function readURL(input) {
			if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.readAsDataURL(input.files[0]);
					reader.onload = function (e) {
						$('#img-cover').attr('src', e.target.result);
					};
				$("#remove").val(0);
			}
		}
		function removeImage() {
			$('#img-cover').attr('src',"{{asset('img/profile_cover.png')}}");
			$("#remove").val(1);
			$('#remove_cover').css('display','none');
			// $('#btn-upload').text('Upload');
		}
	</script>
	{{-- upload profile photo --}}
	<script>
		function changeProfilePhoto() {
			$('#profile_photo').click();
		}
		$('#profile_photo').change(function () {
			var imgPath = this.value;
			var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
			if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg") {
				$('#btn_remove_photo').css('display','block');
				// $('#btn-upload').text('Change');
				readURLPhoto(this);
			} else {
				alert("Please select image file (jpg, jpeg, png).")
			}
		});
		function readURLPhoto(input) {
			if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.readAsDataURL(input.files[0]);
					reader.onload = function (e) {
						$('#img_profile_photo').attr('src', e.target.result);
					};
			}
		}
	</script>

@endpush
