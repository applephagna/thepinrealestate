{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.backend.master_layout')

@section('title', '| Manage Roles')

@section('content')
	<div class="row">
		<div class="col-xs-12 ">
			<h1><i class="fa fa-key"></i> Roles
		</div>
    </div>
    <hr class="hr-6">
	<div class="row">
		<div class="col-xs-12 ">
			@include('admin.roles.includes.buttons')
		</div>
	</div>
	@include('admin.roles.includes.table')

@endsection

@push('js')
	@include('layouts.backend.includes.datatable_script')
	@include('admin.includes.delete_confirm');
@endpush
