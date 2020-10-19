{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.backend.master_layout')

@section('title', '| Users')

@section('content')
	<div class="row">
		<div class="col-xs-12 ">
			<h1><i class="fa fa-users"></i>Manage Properties</h1>
		</div>
    </div>
    <hr class="hr-6">
	<div class="row">
		<div class="col-xs-12 ">
			@include('admin.properties.includes.buttons')
		</div>
	</div>
	@include('admin.properties.includes.table')

@endsection

@push('js')
	@include('admin.properties.includes.datatable_script')
	<script>
		// delete data from database
		$(document).on('click','.btn_delete',function(e){
				e.preventDefault();
				var id = $(this).data('id');
				Swal.fire({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
					if (result.value) {
						$.ajax({
							type: "POST",
							url: "{{ route('agent.post.destroy') }}",
							data: {id:id},
							dataType: "JSON",
							success: function (data) {
									location.reload();
							}
						});
						Swal.fire({
							position: 'top-end',
							type: 'success',
							title: 'Your Data has been deleted',
							showConfirmButton: false,
							timer: 1500
						})
					}
				})
			});
	</script>
@endpush
