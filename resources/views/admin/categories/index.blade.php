{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.backend.master_layout')

@section('pagetitle', '| Categories List')

@section('content')
	<div class="row">
		<div class="col-xs-12 ">
			<h1><i class="fa fa-users"></i> Manage Caegories</h1>
		</div>
    </div>
    <hr class="hr-6">
	<div class="row">
		<div class="col-xs-12 ">
			@include('admin.categories.includes.buttons')
		</div>
	</div>
	@include('admin.categories.includes.table')

@endsection

@push('js')
	@include('admin.categories.includes.datatable_script')
@endpush
