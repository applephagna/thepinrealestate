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
						@include('admin.agent_management.includes.buttons')
						{{-- @include('includes.error_messages') --}}
						<!-- PAGE CONTENT BEGINS -->
							@include('includes.validation_error_messages')
							{!! Form::open(['route' =>'admin.agent.store', 'method' => 'POST', 'class' => 'form-horizontal',
							'id' => 'validation-form', "enctype" => "multipart/form-data"]) !!}
							@include('admin.agent_management.includes.form')
							<div class="clearfix form-actions">
								<div class="col-md-12 align-right">
                  <button class="btn btn-info btn-xs" type="submit">
										<i class="icon-ok bigger-110"></i>
										{{ __('Register') }}
									</button>

									<button class="btn btn-xs" type="reset">
										<i class="icon-undo bigger-110"></i>
										{{ __('Reset') }}
									</button>
								</div>
							</div>
							{!! Form::close() !!}
						</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.page-content -->
		</div>
	</div><!-- /.main-content -->

@endsection

@push('js')
	<script>
		$(document).ready(function(){
			$('#referal_user_id').blur(function(){
				var error_referal_code = '';
				var referal_code = $('#referal_user_id').val();
				var _token = $('input[name="_token"]').val();
					$.ajax({
						url:"{{ route('referal.check') }}",
						method:"POST",
						data:{referal_code:referal_code, _token:_token},
						success:function(result){
							Swal.fire({
								position: 'center',
								type: 'success',
								title: 'Referal ID is correct',
								showConfirmButton: false,
								timer: 800
							})
							$('#referal_id').val(result.id);
							if(result=='notfoune'){
								Swal.fire({
									position: 'center',
									type: 'error',
									title: 'Referal ID not correct',
									showConfirmButton: false,
									timer: 800
								})
								$('#referal_user_id').val('');
							}
						}
					})
				// }
			});
		});
	</script>
@endpush
