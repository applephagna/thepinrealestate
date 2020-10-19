		<input type="hidden" name="category_id" value="{{$category->id}}">
		<input type="hidden" name="parent_id" value="{{$subcategory->id}}">
		{{-- category --}}
		<div class="form-group">
				<label for="title" class="col control-label">Category</label>
				<div class="col-6 cat_path">
						<div class="category-selected">
								<ul class="list-unstyled list-inline">
										<li>{{$category->category_name}}</li>
										<li>{{$subcategory->category_name}}</li>
								</ul>
								@if (Request::route()->getName() == "agent.post.edit")
										<a class="btn btn-sm  btn-primary btn_change_cat" href="{{route('agent.post.indexEdit',[$property->id,$property->parent_id])}}">Change</a>
								@endif
								@if (Request::route()->getName() == "agent.post.create")
								<a class="btn btn-sm  btn-primary btn_change_cat" href="{{route('agent.post.index')}}">Change</a>
						@endif
						</div>
				</div>
		</div>
		{{-- Title --}}
		<div class="form-group">
				<label for="ad_headline" class="col control-label">Title <span class="red">*</span></label>
				<div class="col col-6 form-input">
				<input id="title" class="form-control" type="text" name="title" value="{{ isset($property->title)?$property->title :'' }}" required="">
				</div>
		</div>
		{{-- Bedroom --}}
		<div class="form-group input-ad_field">
				<label for="ad_field" class="col-sm-3 control-label">Bedroom</label>
				<div class="form-input col-sm-6 col-lg-3">
						<select id="ad_field" name="bedroom" id="bedroom" class="form-control ">
							<option value="" data-value=""></option>
							@foreach ($bedrooms as $slug => $room)
								@if (isset($property))
									@if ($room==strtolower($property->bedroom))
										<option value="{{ $room }}" data-value="{{ $slug }}" class="empty1" selected>{{ $slug }}</option>
									@else
										<option value="{{ $room }}" data-value="{{ $slug }}" class="empty1">{{ $slug }}</option>
									@endif
								@else
									<option value="{{ $room }}" data-value="{{ $slug }}" class="empty1">{{ $slug }}</option>
								@endif
							@endforeach
						</select>
				</div>
		</div>
		{{-- Bathroom --}}
		<div class="form-group input-ad_model">
				<label for="ad_model" class="col-sm-3 control-label">Bathroom</label>
				<div class="form-input col-sm-6 col-lg-3">
						<select id="ad_model" name="bathroom" id="bathroom" class="form-control ">
							<option value="" data-value=""></option>
							@foreach ($bathrooms as $slug => $room)
								@if (isset($property))
									@if ($room==strtolower($property->bathroom))
										<option value="{{ $room }}" data-value="{{ $room }}" class="empty1" selected>{{ $slug }}</option>
									@else
										<option value="{{ $room }}" data-value="{{ $room }}" class="empty1">{{ $slug }}</option>
									@endif
								@else
									<option value="{{ $room }}" data-value="{{ $room }}" class="empty1">{{ $slug }}</option>
								@endif
							@endforeach
						</select>
				</div>
		</div>
		{{-- Facing --}}
		<div class="form-group input-ad_auto_condition">
				<label for="ad_auto_condition" class="col-sm-3 control-label">Facing</label>
				<div class="form-input col-sm-6 col-lg-3">
						<select id="ad_auto_condition" name="facing" id="facing" class="form-control ">
							<option value="" data-value=""></option>
							@foreach ($facings as $key => $facing)
								@if (isset($property))
									@if ($facing==$property->facing)
										<option value="{{ $facing}}" data-value="{{ $facing}}" class="empty1" selected>{{ $facing}}</option>
									@else
										<option value="{{ $facing}}" data-value="{{ $facing}}" class="empty1">{{ $facing}}</option>
									@endif
								@else
									<option value="{{ $facing}}" data-value="{{ $facing}}" class="empty1">{{ $facing}}</option>
								@endif
							@endforeach
						</select>
				</div>
		</div>
		{{-- Size --}}
		<div class="form-group input-ad_year">
				<label for="size" class="col-sm-3 control-label">Size(m<sup>2</sup>)</label>
				<div class="form-input col-sm-6 col-lg-3">
						<input type="text" name="size" value="{{ isset($property->size)?$property->size :'' }}" id="size" class="form-control  number" />
				</div>
		</div>
		{{-- Price --}}
		<div class="form-group input-ad_price">
				<label for="ad_price" class="col-sm-3 control-label">Price <i class="red">*</i></label>
				<div class="form-input col-sm-6 col-lg-3">
						<div class="input-group">
								<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroupPrepend_ad_price">$</span>
								</div>
								<input type="number" min="1" name="price" id="price" class="form-control  number " required aria-describedby="basic-addon1" value="{{ isset($property->price)?$property->price :'' }}">
						</div>
				</div>
		</div>
		{{-- Description --}}
		<div class="form-group">
				<label for="ad_description" class="col control-label">Description <span class="red">*</span></label>
				<div class="col col-8 form-input">
						<textarea name="description" id="description" class="form-control" rows="4" required>
								{{isset($property->description)?$property->description :''}}
						</textarea>
				</div>
		</div>
		{{-- Photo --}}
		<div class="form-group">
				<input type="hidden" name="property_id" id="property_id" value="{{ isset($property)?$property->id:'' }}">
				<label for="ad_text" class="col control-label">Ad Photos <i class="red">*</i></label>
				<div id="plupload" class="col-8">
						<div class="row plupload_block">
								<div class="pl fleft col-12">
										<span class="drop_file_hear"></span>
										<div id="multi-upload" style="position: relative;">
												<div id="console"></div>
												<div
														class="list-image"
														data-token="{{csrf_token()}}"
														data-limit-image="{{ $limit_field }}"
														data-images='{!! isset($images) ? json_encode($images):'' !!}'
														data-upload-url="{{ $upload_url }}"
														data-delete-url="{{ $delete_url }}"
														data-rotate-url="{{ $rotate_url }}"
														data-allow-size="{{ $allow_size }}">
												</div>
										</div>
								</div>
						</div>
						<div class="clear"></div>
				</div>
		</div>
		{{-- Name --}}
		<div class="form-group">
				<label for="name" class="col control-label">Name <span class="red">*</span></label>
				<div class="col col-lg-4 form-input">
				<input id="name" class="form-control" type="text" name="name" value="{{ isset($property->name)?$property->name :'' }}">
				</div>
		</div>
		{{-- Phone --}}
		<div class="form-group">
				<label for="phone" class="col control-label">Phone <span class="red">*</span></label>
				<div class="col col-lg-4 phone">
						<div class="phone-1 form-input">
								<input type="tel" name="phone_1" value="{{ isset($property->phone1)?$property->phone1 :'' }}" id="phone_1" class="form-control number" maxlength="10" placeholder="Tel 1" required>
								<a href="javascript:void(0)" class="add_phone" data-id="add"><i class="icon-plus-full"></i></a>
						</div>
						<div class="phone-2 form-input  d-none">
								<input type="tel" name="phone_2" value="{{ isset($property->phone2)?$property->phone2 :'' }}" id="phone_2" class="form-control number" maxlength="10" placeholder="Tel 2">
								<a href="javascript:void(0)" class="delete_phone" data-id="phone-2"><i class="icon-remove"></i></a>
						</div>
						<div class="phone-3 form-input d-none">
								<input type="tel" name="phone_3" value="{{ isset($property->phone3)?$property->phone3 :'' }}" id="phone_3" class="form-control number" maxlength="10" placeholder="Tel 3">
								<a href="javascript:void(0)" class="delete_phone" data-id="phone-3"><i class="icon-remove"></i></a>
						</div>
				</div>
		</div>
		{{-- email --}}
		<div class="form-group">
				<label for="email" class="col control-label">Email</label>
				<div class="col col-6 form-input">
						<input type="email" name="email" id="email" class="form-control" value="{{ isset($property->email)?$property->email :'' }}">
				</div>
		</div>
		{{-- address detail group --}}
		<div class="locations_box">
				<div class="controls">
						{{-- Province --}}
						<div class="form-group">
								<label for="province" class="col control-label">City/Province<i class="red">*</i></label>
								<div class="col col-3 form-input">
										<select data-placeholder="Select a province" id="province" name="province_id" class="form-control map_form" required>
												<option value="0" data-value="0">Select a City/Province</option>
												@foreach ($provinces as $key => $province)
														@if (isset($property))
																@if ($key==$property->province_id)
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
						{{-- District --}}
						<div class="form-group">
								<label for="district" class="col control-label">Khan/District <i class="red">*</i></label>
								<div class="col col-3 form-input">
								<select data-placeholder="Select a district" id="district" name="district_id" class="form-control map_form" required disabled>
										<option value="0" data-value="0">Select a Khan/District</option>
												@if (isset($property))
														@foreach ($districts as $district)
																		@if ($district->id==$property->district_id)
																				<option data-en-title="{{$district->name_en}}" value="{{$district->id}}" data-value="{{$district->name_en}}" data-chained="{{$district->name_en}}" class="{{$district->name_en}}" selected>{{$district->name_en}}</option>
																		@else
																				<option data-en-title="{{$district->name_en}}" value="{{$district->id}}" data-value="{{$district->name_en}}" data-chained="{{$district->name_en}}" class="{{$district->name_en}}">{{$district->name_en}}</option>
																		@endif
														@endforeach
												@endif
								</select>
								</div>
						</div>
						{{-- Commune --}}
						<div class="form-group">
								<label for="commune" class="col control-label">Sangkat/Commune <i class="red">*</i></label>
								<div class="col col-3 form-input">
										<select data-placeholder="Select a commune" id="commune" name="commune_id" class="form-control map_form" required disabled>
												<option value="0" data-value="">Select a Sangkat/Commune</option>
														@if (isset($property))
																@foreach ($communes as $commune)
																				@if ($commune->id==$property->commune_id)
																						<option data-en-title="{{$commune->name_en}}" value="{{$commune->id}}" data-value="{{$commune->name_en}}" data-chained="{{$commune->name_en}}" class="{{$commune->name_en}}" selected>{{$commune->name_en}}</option>
																				@else
																						<option data-en-title="{{$commune->name_en}}" value="{{$commune->id}}" data-value="{{$commune->name_en}}" data-chained="{{$commune->name_en}}" class="{{$commune->name_en}}">{{$commune->name_en}}</option>
																				@endif
																@endforeach
														@endif
										</select>
								</div>
						</div>
						{{-- location Detail --}}
						<div class="form-group location">
								<label for="address" class="col control-label">Location Details<i class="red">*</i></label>
								<div class="col col-8 form-input">
								<textarea name="location" id="location" class="form-control" required="">
										{{ isset($property)?$property->location :'' }}
								</textarea>
								</div>
						</div>
				</div>
		</div>
		{{-- save contact information --}}
		<div class="form-group">
			<div class="col col-8">
				<label class="save_contact">
					<div class="custom-control custom-checkbox ">
						<input name="chk_save_contact" id="chk_save_contact" type="checkbox" value="{{ isset($property->save_contact)?$property->save_contact:'' }}" {{isset($property)?$property->save_contact==1?'checked':'' :'' }} class="custom-control-input">
						<div class="custom-control-label" for="save_contact">Save contact information (<i>Name, Phone, Location, Address</i>) for the next ads.</div>
						<input type="hidden" name="is_active" id="is_active" value="1">
					</div>
				</label>
			</div>
		</div>
		{{-- submit button --}}
		<div class="form-group submit_box">
				<div class="col-sm-offset-2 col col-3 btn_submit">
						<input type="submit" value="Submit" class="btn btn-lg btnsavead btn-warning btn-block">
				</div>
		</div>

		{{-- 	<div class="modal fade" id="account-question" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
				<div class="modal-content">
						<div class="account-question-box">
								<div class="title-head">
										<div class="text">Please! register or login to publish your ad</div>
										<div class="icon">
										<span class="user-photo" style="background: url('https://www.khmer24.com/khmer24-reform21/template/img/default_profile.jpg') no-repeat center; background-size: cover;"></span>
										</div>
										<button class="btn btn-clear btn-close-modal"><span class="icon icon-cross"></span></button>
								</div>
								<div class="detail-box">
										<div>
												<div class="info">Already have an account?</div>
												<a class="btn btn_blue btn-primary btn-md" href="https://www.khmer24.com/en/login">Log in</a>
										</div>
										<div class="devide">
												<span>Or</span>
										</div>
										<div>
												<div class="info">No account yet?</div>
												<a class="btn btn-warning btn-yellow_dark btn-md" href="https://www.khmer24.com/en/register">Register</a>
										</div>
								</div>
						</div>
				</div>
		</div>
		</div> --}}


