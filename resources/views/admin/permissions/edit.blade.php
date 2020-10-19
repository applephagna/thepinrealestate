@extends('layouts.backend.master_layout')

@section('title', '| Edit Permission')

@section('content')

	<div class="main-content">
		<div class="main-content-inner">
			<div class="page-content">
				<div class="row">
					<div class="col-xs-12 ">
					@include('admin.permissions.includes.buttons')
					<h4 class="header large lighter blue"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Edit Permissions</h4>
					<!-- PAGE CONTENT BEGINS -->
							{{ Form::model($permission, array('route' => array('admin.permissions.update', $permission->id), 'method' => 'PUT','class' => 'form-horizontal')) }}

							@include('admin.permissions.includes.form')

							<div class="clearfix form-actions">
								<div class="col-md-12 align-right">
										<a href="{{ route('admin.permissions.index') }}" class="btn btn-primary btn-xs"><i class="icon-undo bigger-110"></i>
											{{ __('Back') }}</a>
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
