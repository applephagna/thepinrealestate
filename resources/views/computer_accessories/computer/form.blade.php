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
				<a class="btn btn-sm  btn-primary btn_change_cat" href="{{route('post.index')}}">Change</a>
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
{{-- Computer Brands --}}
<div class="form-group input-ad_field">
	<label for="ad_field" class="col-sm-3 control-label">Computer Brands <i class="red">*</i>
	</label>
	<div class="form-input col-sm-6 col-lg-3">
		<select id="ad_field" name="ad_field" class="form-control " required="">
			<option value="" data-value=""></option>
			<option value="apple" data-value="apple" class="empty1">Apple</option>
			<option value="samsung" data-value="samsung" class="empty1">Samsung</option>
			<option value="huawei" data-value="huawei" class="empty1">Huawei</option>
			<option value="sony-ericsson" data-value="sony-ericsson" class="empty1">Sony</option>
			<option value="Oppo" data-value="Oppo" class="empty1">Oppo</option>
			<option value="lg" data-value="lg" class="empty1">LG</option>
			<option value="vivo" data-value="vivo" class="empty1">Vivo</option>
			<option value="nokia" data-value="nokia" class="empty1">Nokia</option>
			<option value="Meizu" data-value="Meizu" class="empty1">Meizu</option>
			<option value="OnePlus" data-value="OnePlus" class="empty1">OnePlus</option>
			<option value="blackberry" data-value="blackberry" class="empty1">BlackBerry</option>
			<option value="htc" data-value="htc" class="empty1">HTC</option>
			<option value="acer" data-value="acer" class="empty1">Acer</option>
			<option value="google" data-value="google" class="empty1">Google</option>
			<option value="Xiaomi" data-value="Xiaomi" class="empty1">Xiaomi</option>
			<option value="motorola" data-value="motorola" class="empty1">Motorola</option>
			<option value="alcatel" data-value="alcatel" class="empty1">Alcatel</option>
			<option value="philips" data-value="philips" class="empty1">Philips</option>
			<option value="singtech" data-value="singtech" class="empty1">SingTech</option>
			<option value="BLU" data-value="BLU" class="empty1">BLU</option>
			<option value="vertu" data-value="vertu" class="empty1">Vertu</option>
			<option value="zte" data-value="zte" class="empty1">ZTE</option>
			<option value="other" data-value="other" class="empty1">Other</option>
		</select>
	</div>
</div>
{{-- Condition --}}
<div class="form-group input-ad_condition">
	<label for="ad_condition" class="col-sm-3 control-label">Condition <i class="red">*</i></label>
	<div class="form-input col-sm-6 col-lg-3">
		<select id="ad_condition" name="ad_condition" class="form-control " required="">
			<option value="" data-value=""></option>
			<option value="new" data-value="new" class="empty1">New</option>
			<option value="used" data-value="used" class="empty1">Used</option>
		</select>
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
	<label for="ad_text" class="col control-label">Description <span class="red">*</span></label>
	<div class="col col-8 form-input">
		<textarea name="description" id="description" class="form-control" rows="4" required>
			{{isset($property->description)?$property->description :''}}
		</textarea>
	</div>
</div>
{{-- Photo --}}
<div class="form-group">
	<label for="ad_text" class="col control-label">Ad Photos <i class="red">*</i></label>
	<div id="plupload" class="col-8">
		<div class="row plupload_block">
			<div class="pl fleft col-12">
			<!-- Code Begins -->
				<input style="display:none;" type="file" name="imageGalleries[]" id="vpb-data-file" onchange="vpb_image_preview(this)" multiple="multiple" />
				<div align="center" style="width:300px;">
					<!-- Browse File Button -->
					<span class="vpb_browse_file" onclick="document.getElementById('vpb-data-file').click();"></span>
				</div>
			</div>
			<div style="width:710px; margin-top:5px;" align="center" id="vpb-display-preview">
				@if (isset($images))
					@foreach ($images as $image)
        		<div id="selector_{{$image->id}}" class="vpb_wrapper">
	            <img class="vpb_image_style" class="img-thumbnail" src="{{asset('uploads/property/galleries/'.$image->gallery_image)}}"
	            alt="{{$image->gallery_image}}" /><br /> 
	            <a style="cursor:pointer;padding-top:5px;" title="Click here to remove" 
	            onclick="vpb_remove_selected()">Remove</a>
        		</div>
					@endforeach
				@endif
			</div>
		<!-- Code Begins -->
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
							@if ($key==$property->id)
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
		{{-- location Detail --}}
		<div class="form-group">
			<label for="address" class="col control-label">Location Details<i class="red">*</i></label>
			<div class="col col-8 form-input">
			<textarea name="location" id="location" class="form-control" required="">
				{{ isset($property)?$property->location :'' }}
			</textarea>
			</div>
		</div>
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

<a href="#totop" id="totop"><i class="icon-up"></i></a>
