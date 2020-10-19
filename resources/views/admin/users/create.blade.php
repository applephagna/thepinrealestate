@extends('layouts.backend.master_layout')

@section('title', '| Add User')

@push('css')
	<style>
		.page-content .phone .add_phone {
				font-size: 22px;
				display: inline-block;
				padding: 0;
				margin-left: 5px;
				position: absolute;
				top: 2px;
				right: 0;
				color: #028dcf;
				opacity: 0.75;
		}
		.page-content .phone .delete_phone {
				font-size: 22px;
				display: inline-block;
				padding: 0;
				margin-left: 5px;
				position: absolute;
				top: 3px;
				right: 0;
				color: #ff3500;
				opacity: 0.75;
		}
		.page-content .phone > *+* {
    	margin-top: 8px;
		}
		.page-content .phone > * {
			padding-right: 32px;
			position: relative;
		}

		.d-none {
			display: none!important;
		}
	</style>
@endpush

@section('content')

	<div class="main-content">
		<div class="main-content-inner">
			<div class="page-content">
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

@push('js')
	<script type="text/javascript">
		// distrct get data by provice change
		$('#province').change(function(){
			var provinceID = $(this).val();
			if(provinceID>=1){
					$.ajax({
						type:"GET",
						url:"{{url('get-district-list')}}?province_id="+provinceID,
						success:function(res){
							if(res){
								// $("#district").removeAttr('disabled');
								$("#district" ).prop( "disabled", false );
								$("#district").empty();
								$("#district").append('<option value="0" data-value="">Select a Khan/District</option>');
								$.each(res,function(key,value){
									$("#district").append('<option value="'+key+'">'+value+'</option>');
								});
							}else{
								$("#district").empty();
								$("#district" ).prop( "disabled", true );
								$("#commune" ).prop( "disabled", true );
							}
						}
					});
			}else{
				$("#district").empty();
				$("#commune").empty();
				$("#district").append('<option value="0" data-value="">Select a Khan/District</option>');
				$("#commune").append('<option value="0" data-value="">Select a Sangkat/Commune</option>');
				$("#district" ).prop( "disabled", true );
				$("#commune" ).prop( "disabled", true );
			}
		});
		// commune get data by district change
		$('#district').on('change',function(){
			var districtID = $(this).val();
			if(districtID>=1){
				$.ajax({
					type:"GET",
					url:"{{url('get-commune-list')}}?district_id="+districtID,
					success:function(res){
						if(res){
							$("#commune" ).prop( "disabled", false );
							$("#commune").empty();
							$("#commune").append('<option value="0" data-value="">Select a Sangkat/Commune</option>');

							$.each(res,function(key,value){
									$("#commune").append('<option value="'+key+'">'+value+'</option>');
							});
						} else{
							$("#commune").empty();
							$("#commune" ).prop( "disabled", true );
						}
					}
				});
			}else{
				$("#commune").empty();
				$("#commune").append('<option value="0" data-value="">Select a Sangkat/Commune</option>');
				$("#commune" ).prop( "disabled", true );
			}
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function () {
			$(".number").keypress(function(evt) {
				if (evt.keyCode != 8) {
					var theEvent = evt || window.event;
					var key = theEvent.keyCode || theEvent.which;
					key = String.fromCharCode(key);
					var regex = /[0-9]|\./;
					if (!regex.test(key)) {
							theEvent.returnValue = false;
						if (theEvent.preventDefault)
							theEvent.preventDefault();
					}
				}
			});

			$('.phone a').click(function(e) {
				e.preventDefault();
				if($(this).attr('data-id') == 'add') {
					if($( "body" ).find('div.phone-2').hasClass( "d-none" )) {
						$('.phone-2').removeClass('d-none');
					} else {
						$('.phone-3').removeClass('d-none');
						$('a.add_phone').addClass('d-none');
					}
				} else {
					if ($(this).attr('data-id') == 'phone-2') {
						if($('input[name="phone-3"]').val()) {
							$('input[name="phone-2"]').val($('input[name="phone-3"]').val());
							$('input[name="phone-3"]').val('');
						} else {
							if($('input[name="phone-2"]').val()) {
								$('input[name="phone-2"]').val('');
							} else {
								if(!$('input[name="phone-2"]').val()) {
									$('.phone-2').addClass('d-none');
								}
								$('.phone-3').addClass('d-none');
								$('a.add_phone').removeClass('d-none');
							}
						}
					}
					if ($(this).attr('data-id') == 'phone-3') {
							if($('input[name="phone-3"]').val()) {
									$('input[name="phone-3"]').val('');
							} else {
									$('a.add_phone').removeClass('d-none');
									$('.phone-3').addClass('d-none');
									$('input[name="phone-3"]').val('');
							}
					}
				}
			});

			$('.phone input').on('keypress keyup focus change', function() {
				if ($(this).val()) {
					var input_name = $(this).attr('name');
					if (input_name == 'phone-1') {
							$('.phone-2').removeClass('d-none');
					}
					if (input_name == 'phone-2') {
							$('.phone-3').removeClass('d-none');
					}
				}
			});
		});
	</script>
	<script>
		function changeProfile() {
			$('#photo').click();
		}
		$('#photo').change(function () {
			var imgPath = this.value;
			var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
			if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg") {
				$('#btn-remove').css('display','block');
				$('#btn-upload').text('Change');
				readURL(this);
			} else {
				alert("Please select image file (jpg, jpeg, png).")
			}
		});
		function readURL(input) {
			if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.readAsDataURL(input.files[0]);
					reader.onload = function (e) {
							$('#preview').attr('src', e.target.result);
					};
				$("#remove").val(0);
			}
		}
		function removeImage() {
			$('#preview').attr('src',"{{ asset('images/no-image.png') }}");
			$("#remove").val(1);
			$('#btn-remove').css('display','none');
			$('#btn-upload').text('Upload');
		}
  </script>
	<script>
		$(document).ready(function(){
			$('#referal_code').blur(function(){
				var error_referal_code = '';
				var referal_code = $('#referal_code').val();
				var _token = $('input[name="_token"]').val();
					$.ajax({
						url:"{{ route('referal.check') }}",
						method:"POST",
						data:{referal_code:referal_code, _token:_token},
						success:function(result){
              Swal.fire({
                position: 'center',
                type: result.type,
                title: result.message,
                showConfirmButton: false,
                timer: 800
              })
              $('#referal_user_id').val(result.data.id);
              $('#referal_user_code').val(result.data.referal_code);
            }
					})
			});
		});
	</script>
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
@endpush
