@extends('layouts.backend.master_layout')

@section('title', '| Create Product')

@push('css')
  <style>
    a.btn.btn-success.btn-xs.insert-space {
      margin-top: 28px;
		}
		.row.spacing-top {
				margin-top: 15px;
		}
  </style>
@endpush

@section('content')
	<div class="row">
    <div class="col-xs-12">
			<div class="widget-box">
				<div class="widget-header">
					<h4 class="widget-title">Add New Product</h4>
					<div class="widget-toolbar">
						<a href="#" data-action="collapse">
							<i class="ace-icon fa fa-chevron-up"></i>
						</a>
					</div>
					@if ($message = Session::get('success'))
						<div class="alert alert-success">
							<p>{{ $message }}</p>
						</div>
					@endif
				</div>
				<div class="widget-body">
					<div class="widget-main no-padding">
						<div class="row spacing-top">
							<form method="POST" action="{{ route('admin.products.store') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
								{{ csrf_field() }}
								@include('admin.products.includes.form',['formMode' => 'create'])
							</form>
						</div>
					</div>
				</div>
			</div>
    </div>
	</div>
@endsection

@push('js')
	<script>
		function changeProfile() {
			$('#image').click();
		}
		$('#image').change(function () {
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
			$('#preview').attr('src',"{{asset('images/no-image.png')}}");
			$("#remove").val(1);
			$('#btn-remove').css('display','none');
			$('#btn-upload').text('Upload');
		}
	</script>
@endpush
