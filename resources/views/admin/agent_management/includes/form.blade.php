{{-- name_en and name_kh --}}
<div class="form-group">
    {!! Form::label('name_en', 'Name', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::text('name_en', null, ["placeholder" => "", "class" => "form-control border-form","autofocus"]) !!}
        {{-- @include('includes.form_fields_validation_message', ['name' => 'name_en']) --}}
    </div>

    {!! Form::label('name_kh', 'Name Kh', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::text('name_kh', null, ["placeholder" => "", "class" => "form-control border-form","autofocus"]) !!}
        {{-- @include('includes.form_fields_validation_message', ['name' => 'name_kh']) --}}
    </div>
</div>
{{-- email and phone --}}
<div class="form-group">
    {!! Form::label('email', 'Email', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::email('email', null, ["placeholder" => "", "class" => "form-control border-form"]) !!}
        {{-- @include('includes.form_fields_validation_message', ['name' => 'email']) --}}
    </div>
    {!! Form::label('contact_number', 'Contact Number', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::text('phone', null, ["placeholder" => "", "class" => "form-control border-form","autofocus"]) !!}
        {{-- @include('includes.form_fields_validation_message', ['name' => 'phone']) --}}
    </div>
</div>

{{-- address and Referal --}}
<div class="form-group">
    {!! Form::label('address', 'Address', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::text('address', null, ["placeholder" => "", "class" => "form-control border-form"]) !!}
    </div>
    {!! Form::label('Referal ID', 'Referal ID:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::text('referal_user_id', null, ["id"=>"referal_user_id","placeholder" => "", "class" => "form-control border-form","autofocus"]) !!}
        <span id="error_referal_code"></span>
    </div>
    {!! Form::hidden('referal_id', null, ["id"=>"referal_id"]) !!}
</div>

{{-- photo --}}
<div class="form-group">
    {!! Form::label('profile_image', 'Profile Image', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::file('photo') !!}
        {{-- @include('includes.form_fields_validation_message', ['name' => 'photo']) --}}
    </div>
    {!! Form::label('Job Title', 'Job Title:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::text('job_title', null, ["placeholder" => "", "class" => "form-control border-form","autofocus"]) !!}
        {{-- @include('includes.form_fields_validation_message', ['name' => 'job_title']) --}}
    </div>    
</div>

{{-- password --}}
<div class="form-group">
    {!! Form::label('password', 'Password', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::password('password',  ["placeholder" => "", "class" => "form-control border-form","autofocus","id"=>"pass"]) !!}
        {{-- @include('includes.form_fields_validation_message', ['name' => 'password']) --}}
    </div>

    {!! Form::label('password', 'Confirm Password', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::password('password_confirmation',  ["placeholder" => "", "class" => "form-control border-form"/*,"onkeyup"=>"passCheck()"*/,"id"=>"repeatpass"]) !!}
        {{-- @include('includes.form_fields_validation_message', ['name' => 'password_confirmation']) --}}
    </div>
</div>

{{-- user role --}}
@if(isset($data['roles']) && $data['roles']->count() > 0)
    <div class="form-group">
        {!! Form::label('Access Level', 'User Access Level', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-9">
            <div class="checkbox">
                @foreach($data['roles'] as $role)
                    <label>
                        @if (!isset($data['row']))
                            {!! Form::checkbox('roles[]', $role->id, false, ['class' => 'ace']) !!}
                        @else
                            {!! Form::checkbox('roles[]', $role->id, array_key_exists($role->id, $data['active_roles']), ['class' => 'ace']) !!}
                        @endif
                            <span class="lbl"> {{ $role->display_name }} </span>
                    </label>
                @endforeach
                </div>
                <div class="control-group">
            </div>
        </div>
    </div>
@endif

<div class="space-4"></div>

@if (isset($data['row']))
    <div class="form-group">
        <label class="col-sm-2 control-label">Existing Image</label>
        <div class="col-sm-10">
            @if ($data['row']->photo)
                <img src="{{ asset('uploads/user/profile/'.$data['row']->photo) }}" width="120px" >
            @else
                <p>No image.</p>
            @endif
        </div>
    </div>
@endif

<div class="space-4"></div>
