@extends('layouts.backend.master_layout')

@push('css')

@endpush

@section('content')
	<div class="main-content">
		<div class="main-content-inner">
			<div class="page-content">
				<div class="row">
					<div class="col-xs-12 ">
					@include('admin.settings.includes.buttons')
					<h4 class="header large lighter blue"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Manage Settings</h4>
					<!-- PAGE CONTENT BEGINS -->
							{!! Form::model($setting,['route' =>['admin.settings.update',$setting->id], 'method' => 'POST', 'class' => 'form-horizontal',
							'id' => 'validation-form', "enctype" => "multipart/form-data"]) !!}
							@include('admin.settings.form', ['formMode' => 'create'])

							<div class="clearfix form-actions">
								<div class="col-md-12 align-right">
										<button class="btn btn-primary btn-xs" type="reset">
												<i class="icon-undo bigger-110"></i>
												{{ __('Reset') }}
										</button>
										<button class="btn btn-success btn-xs" type="submit">
												<i class="icon-ok bigger-110"></i>
												{{ __('Update') }}
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

@push('js')

@endpush
