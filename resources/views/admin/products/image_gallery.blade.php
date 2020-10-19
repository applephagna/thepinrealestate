@extends('layouts.backend.ace_layout')

@section('title', '| Create Product')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
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
					<h4 class="widget-title">Add New Image Gallery</h4>
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
						<div class="row">
							<div class="col-md-12">
								<form method="POST" action="{{ route('admin.upload.dropzone.store') }}" accept-charset="UTF-8" enctype="multipart/form-data" class="dropzone dz-clickable" id="dropzone">
									{{ csrf_field() }}
									<div class="form-group">
										<label for="product_id">Product ID</label>
										<select class="form-control" name="product_id" id="product_id">
											<option>Select Product</option>
											@foreach ($product as $key =>$value)
												<option value="{{ $key }}">{{ $value }}</option>
											@endforeach
										</select>
									</div>
									{{-- <div class="form-group">
										<label for="product_group">Product Group</label>
										<select class="form-control" name="product_group" id="product_group">
											@foreach ($product as $key => $value)
												<option value="{{ str_slug($value) }}">{{ str_slug($value) }}</option>
											@endforeach
										</select>
									</div> --}}
									<div class="form-group">
										<label for="product_group">Product Group</label>
										<input type="text" class="form-control" name="product_group" id="product_group" aria-describedby="helpId" placeholder="" readonly>
									</div>
									<div class="dz-default dz-message">
										<span>Drop files here to upload</span>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
    </div>
	</div>
@endsection

@push('js')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
    <script type="text/javascript">
      Dropzone.options.dropzone =
			{
				maxFilesize: 12,
				renameFile: function (file) {
						var dt = new Date();
						var time = dt.getTime();
						return time + file.name;
				},
				acceptedFiles: ".jpeg,.jpg,.png,.gif",
				addRemoveLinks: true,
				timeout: 50000,
				removedfile: function (file) {
					var name = file.upload.filename;
					$.ajax({
							headers: {
									'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
							},
							type: 'POST',
							url: '{{ route("admin.upload.dropzone.delete") }}',
							data: {filename: name},
							success: function (data) {
									console.log("File has been successfully removed!!");
							},
							error: function (e) {
									console.log(e);
							}
					});
					var fileRef;
					return (fileRef = file.previewElement) != null ?
					fileRef.parentNode.removeChild(file.previewElement) : void 0;
				},
				success: function (file, response) {
					console.log(response);
				},
				error: function (file, response) {
					return false;
				}
			};
    </script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#product_id").change(function(){
				$('#product_group').empty();
				var getSelected = $("#product_id").find("option:selected").text();
				$("#product_group").val(getSelected);
			});
		});
	</script>
@endpush