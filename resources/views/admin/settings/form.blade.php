{{-- <h4 class="header large lighter blue"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;{{ $panel }}</h4> --}}

<div class="form-group">
    {!! Form::label('key', 'Key', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::text('key', null, ["placeholder" => "", "class" => "form-control border-form",  "required"]) !!}
        {{-- @include('includes.form_fields_validation_message', ['key' => 'key']) --}}
    </div>

    {!! Form::label('Value', 'Value', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::text('value', null, ["placeholder" => "", "class" => "form-control border-form", "required"]) !!}
        {{-- @include('includes.form_fields_validation_message', ['name' => 'Value']) --}}
    </div>
</div>