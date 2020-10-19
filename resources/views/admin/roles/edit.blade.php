@extends('layouts.backend.master_layout')

@section('pagetitle','Roles | Edit')


@push('css')

@endpush

@section('content')
	<div class="main-content">
		<div class="main-content-inner">
			<div class="page-content">
				<div class="row">
					<div class="col-xs-12 ">
					@include('admin.roles.includes.buttons')
					<h4 class="header large lighter blue"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Manage Roles</h4>
					<!-- PAGE CONTENT BEGINS -->
					{!! Form::model($data['row'], ['route' => ['admin.roles.update', $data['row']->id], 'method' => 'POST', 'class' => 'form-horizontal',
					'id' => 'validation-form', "enctype" => "multipart/form-data"]) !!}
						{{method_field('PUT')}}
							{!! Form::hidden('id', $data['row']->id) !!}
							@include('admin.roles.includes.form')

							<div class="clearfix form-actions">
								<div class="col-md-12 align-right">
								<a href="{{route('admin.roles.index')}}" class="btn btn-primary btn-xs">
												<i class="icon-undo bigger-110"></i>
												{{ __('Cancel') }}
										</a>
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
		{{-- <script src="{{ asset('assets/js/notify.min.js') }}"></script> --}}
		{{-- @include('layouts.backend.includes.datatable_script') --}}
    <script>
        $(document).ready(function () {
            $('table th input:checkbox').on('click' , function(){
                var that = this;
                $(this).closest('table').find('input:checkbox')
                    .each(function(){
                        this.checked = that.checked;
                        $(this).closest('tr').toggleClass('selected');
                    });
            });
            $('.group').on('click' , function(){
                var that = this;
                $(this).closest('tr').find('input:checkbox')
                    .each(function(){
                        this.checked = that.checked;
                        $(this).closest('tr').toggleClass('selected');
                    });

            });


        });
    </script>

@endpush
