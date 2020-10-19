<div class="row">
	<div class="col-md-10">
		{{-- name_en and name_kh --}}
		<div class="form-group">
			<label for="phone" class="col-sm-2 text-right col-form-label">Name En <span class="red">*</span>:</label>
			<div class="col-sm-4">
					{!! Form::text('name_en', null, ["placeholder" => "", "class" => "form-control border-form","autofocus"]) !!}
					{{-- @include('includes.form_fields_validation_message', ['name' => 'name_en']) --}}
			</div>
			<label for="phone" class="col-sm-2 text-right col-form-label">Name Kh <span class="red">*</span>:</label>
			<div class="col-sm-4">
					{!! Form::text('name_kh', null, ["placeholder" => "", "class" => "form-control border-form","autofocus"]) !!}
					{{-- @include('includes.form_fields_validation_message', ['name' => 'name_kh']) --}}
			</div>
		</div>
		{{-- email and username --}}
		<div class="form-group">
			<label for="phone" class="col-sm-2 text-right col-form-label">Username <span class="red">*</span>:</label>
			<div class="col-sm-4">
				{!! Form::text('username', null, ["placeholder" => "", "class" => "form-control border-form","autofocus"]) !!}
				{{-- @include('includes.form_fields_validation_message', ['name' => 'phone']) --}}
			</div>
			<label for="phone" class="col-sm-2 text-right col-form-label">Email <span class="red">*</span>:</label>
			<div class="col-sm-4">
					{!! Form::email('email', null, ["placeholder" => "", "class" => "form-control border-form"]) !!}
					{{-- @include('includes.form_fields_validation_message', ['name' => 'email']) --}}
			</div>
		</div>
		{{-- phone and referal_id--}}
		<div class="form-group">
			<label for="phone" class="col-sm-2 text-right col-form-label">Phone <span class="red">*</span>:</label>
			<div class="phone col-sm-4">
				<div class="phone-1 form-input">
					{{-- <input type="text" name="phone" value="" id="phone-1" class="form-control number" maxlength="15" placeholder="Phone"> --}}
					{!! Form::text('phone', null, ["class"=>"form-control number","id"=>"phone-1","maxlength"=>"15","placeholder"=>"Phone"]) !!}
					<a href="javascript:void(0)" class="add_phone" data-id="add"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
				</div>
				<div class="phone-2 form-input  d-none">
					{{-- <input type="text" name="phone1" value="" id="phone-2" class="form-control number" maxlength="15" placeholder="Phone 1"> --}}
					{!! Form::text('phone1', null, ["class"=>"form-control number","id"=>"phone-2","maxlength"=>"15","placeholder"=>"Phone 1"]) !!}
					<a href="javascript:void(0)" class="delete_phone" data-id="phone-2"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
				</div>
				<div class="phone-3 form-input d-none">
					{{-- <input type="text" name="phone2" value="" id="phone-3" class="form-control number" maxlength="15" placeholder="Phone 2"> --}}
					{!! Form::text('phone2', null, ["class"=>"form-control number","id"=>"phone-3","maxlength"=>"15","placeholder"=>"Phone 2"]) !!}
					<a href="javascript:void(0)" class="delete_phone" data-id="phone-3"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
				</div>
			</div>
			<label for="referal_code" class="col-sm-2 text-right col-form-label">ReferalID <span class="red">*</span>:</label>
			<div class="col-sm-4">
				{!! Form::text('referal_code', null, ["id"=>"referal_code","placeholder" => "", "class" => "form-control border-form","autofocus"]) !!}
				<span id="error_referal_code"></span>
			</div>
			@if (isset($row))
				@if (Auth::id()==1)
					{!! Form::hidden('referal_user_id', null, ["id"=>"referal_user_id"]) !!}
					{!! Form::hidden('referal_user_code', null, ["id"=>"referal_user_code"]) !!}
				@else
					{!! Form::hidden('referal_user_id', $row->agent->referal_user_id, ["id"=>"referal_user_id"]) !!}
					{!! Form::hidden('referal_user_code', $row->agent->referal_user_code, ["id"=>"referal_user_code"]) !!}
				@endif
			@else
				{!! Form::hidden('referal_user_id', null, ["id"=>"referal_user_id"]) !!}
				{!! Form::hidden('referal_user_code', null, ["id"=>"referal_user_code"]) !!}
			@endif
		</div>
		{{-- Province District --}}
		<div class="form-group">
			{{-- Province --}}
			<label for="province" class="col-md-2 control-label">City/Province<i class="red">*</i> :</label>
			<div class="col-md-4">
				<select data-placeholder="Select a province" id="province" name="province_id" class="form-control map_form" required>
          <option value="0">Select a City/Province</option>
					@foreach ($provinces as $key => $province)
						@if (isset($row))
							@if ($key==$row->province_id)
								<option value="{{ $key }}" selected>{{$province}}</option>
							@else
								<option value="{{ $key }}">{{$province}}</option>
							@endif
						@else
							<option value="{{ $key }}">{{$province}}</option>
						@endif
					@endforeach
				</select>
			</div>
			{{-- District --}}
				<label for="district" class="col-md-2 control-label">Khan/District <i class="red">*</i> :</label>
				<div class="col-md-4">
					<select data-placeholder="Select a district" id="district" name="district_id" class="form-control map_form" required>
						<option value="0" data-value="0">Select a Khan/District</option>
							@if (isset($row))
								@foreach ($districts as $district)
									@if ($district->id==$row->district_id)
										<option value="{{$district->id}}" selected>{{$district->name_en}}</option>
									@else
										<option value="{{$district->id}}">{{$district->name_en}}</option>
									@endif
								@endforeach
							@endif
					</select>
				</div>
		</div>
		{{-- Commune and  Job Title --}}
		<div class="form-group">
			{{-- Commune --}}
			<label for="commune" class="col-md-2 control-label">Commune <i class="red">*</i> :</label>
			<div class="col-md-4">
				<select data-placeholder="Select a commune" id="commune" name="commune_id" class="form-control map_form" required>
					<option value="0" data-value="">Select a Sangkat/Commune</option>
						@if (isset($row))
							@foreach ($communes as $commune)
								@if ($commune->id==$row->commune_id)
									<option value="{{$commune->id}}" selected>{{$commune->name_en}}</option>
								@else
									<option value="{{$commune->id}}">{{$commune->name_en}}</option>
								@endif
							@endforeach
						@endif
				</select>
			</div>
			@if (Auth::id()==1)
				{!! Form::label('Job Title', 'Job Title:', ['class' => 'col-sm-2 control-label']) !!}
				<div class="col-sm-4">
					{!! Form::text('job_title',null, ["placeholder" => "job_title", "class" => "form-control border-form","autofocus"]) !!}
				</div>
      @else
        {!! Form::label('Job Title', 'Job Title:', ['class' => 'col-sm-2 control-label']) !!}
        @if (isset($row))
          <div class="col-sm-4">
            {!! Form::text('job_title', $row->agent->job_title, ["placeholder" => "job_title", "class" => "form-control border-form","autofocus"]) !!}
          </div>
        @else
        <div class="col-sm-4">
          {!! Form::text('job_title', null, ["placeholder" => "job_title", "class" => "form-control border-form","autofocus"]) !!}
        </div>
        @endif
			@endif
		</div>
		{{-- address --}}
		<div class="form-group">
			{!! Form::label('address', 'Address', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::text('address', null, ["placeholder" => "address", "class" => "form-control border-form"]) !!}
				{{-- {!! Form::textarea('address', null, ["rows"=>2,"placeholder" => "full address detail", "class" => "form-control border-form"]) !!} --}}
			</div>
		</div>
		{{-- password --}}
		<div class="form-group">
			<label for="password" class="col-sm-2 text-right col-form-label">Password <span class="red">*</span>:</label>
			<div class="col-sm-4">
				{!! Form::password('password',  ["placeholder" => "", "class" => "form-control border-form","autofocus","id"=>"pass"]) !!}
				{{-- @include('includes.form_fields_validation_message', ['name' => 'password']) --}}
			</div>
			<label for="repassword" class="col-sm-2 text-right col-form-label">Confirm Password</label>
			<div class="col-sm-4">
					{!! Form::password('password_confirmation',  ["placeholder" => "", "class" => "form-control border-form"/*,"onkeyup"=>"passCheck()"*/,"id"=>"repeatpass"]) !!}
					{{-- @include('includes.form_fields_validation_message', ['name' => 'password_confirmation']) --}}
			</div>
		</div>
		{{-- user role --}}
		@if(isset($roles) && $roles->count() > 0)
			<div class="form-group">
				<label for="role" class="col-sm-2 text-right col-form-label">User Level<span class="red"> *</span>:</label>
				<div class="col-sm-9">
					<div class="checkbox">
						@foreach($roles as $role)
							<label>
								@if (!isset($row))
									{!! Form::checkbox('roles[]', $role->id, false, ['class' => 'ace']) !!}
								@else
									{!! Form::checkbox('roles[]', $role->id, array_key_exists($role->id, $active_roles), ['class' => 'ace']) !!}
								@endif
									<span class="lbl"> {{ $role->display_name }} </span>
							</label>
						@endforeach
					</div>
				</div>
			</div>
		@endif
		<div class="space-4"></div>
	</div>
	{{-- photo --}}
	<div class="col-md-2">
		<label for="profile_image" class="col-sm-12 text-center col-form-label">Profile Image <span class="red">*</span>:</label>
		@if (isset($row))
			<img id="preview" src="{{ $row->photo==''?asset('images/no-image.png'):asset('uploads/user/profile/'.$row->photo) }}" width="150px" height="170px"/><br/>
		@else
    	<img id="preview" src="{{ asset('images/no-image.png') }}" alt="{{ _('Profile Photo') }}" width="150px" height="170px">
		@endif
		<input type="file" name="photo" id="photo" style="display: none;"/>
		<div class="space-4"></div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<a href="javascript:changeProfile()" class="btn btn-success btn-minier">Upload</a>|<a style="color: red" href="javascript:removeImage()" id="remove" class="btn btn-danger btn-minier">Remove</a>
			</div>
		</div>
	</div>
</div>
