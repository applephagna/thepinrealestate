{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.backend.master_layout')

@section('title', '| Permissons')

@section('content')
	<div class="row">
		<div class="col-xs-12 ">
			<h1><i class="fa fa-key"></i> Permissions
		</div>
    </div>
    <hr class="hr-6">
	<div class="row">
		<div class="col-xs-12 ">
			@include('admin.permissions.includes.buttons')
		</div>
	</div>
	@include('admin.permissions.includes.table')

@endsection

@push('js')
	@include('layouts.backend.includes.datatable_script')
@endpush
