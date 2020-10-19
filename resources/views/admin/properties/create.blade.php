@extends('layouts.backend.master_layout')

@section('title', '| Add User')

@section('content')

	<div class="main-content">
		<div class="main-content-inner">
			<div class="page-content">
				<div class="page-header">
				</div><!-- /.page-header -->
				<div class="row">
						<div class="col-xs-12 ">
						@include('admin.users.includes.buttons')
						@include('includes.flash_messages')
						<!-- PAGE CONTENT BEGINS -->
							@include('includes.validation_error_messages')
							{!! Form::open(['route' =>'admin.users.store', 'method' => 'POST', 'class' => 'form-horizontal',
							'id' => 'validation-form', "enctype" => "multipart/form-data"]) !!}
							@include('admin.users.includes.form')
							<div class="clearfix form-actions">
								<div class="col-md-12 align-right">
									<button class="btn btn-xs" type="reset">
										<i class="icon-undo bigger-110"></i>
										{{ __('Reset') }}
									</button>
									<button class="btn btn-info btn-xs" type="submit">
										<i class="icon-ok bigger-110"></i>
										{{ __('Register') }}
									</button>
								</div>
							</div>
							<div class="hr hr-24"></div>
							{!! Form::close() !!}
						</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.page-content -->
		</div>
	</div><!-- /.main-content -->

@endsection

@section('js')
  {{-- @include('includes.scripts.jquery_validation_scripts') --}}
  <script src="{{ asset('assets/js/notify.min.js') }}"></script>
  {{-- <script>
    $(document).ready(function () {
			jqueryValidation(
				{
					"name": {
							required: true,
					},
					"email": {
							required: true,
					},
					"password": {
							required: true,
					},
					"contact_number": {
							required: true,
					},
					"address": {
							required: true,
					}

				},
				{
					"name": {
							required: "Please, Add User Name.",
					},
					"email": {
							required: "Please, Add User Email.",
					},
					"password": {
							required: "Please, Add User Password.",
					},
					"contact_number": {
							required: "Please, Add Contact Number.",
					},
					"address": {
							required: "Please, Add Address.",
					}
				}
			);
    });
  </script> --}}
@endsection
