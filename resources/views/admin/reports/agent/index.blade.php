{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.backend.master_layout')

@section('pagetitle', '| Users Registation Report')

@push('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
@endpush
@section('content')
	<div class="row">
		<div class="col-xs-12 ">
			<center><h3><i class="fa fa-users"></i> Users Registation Report</h3></center>
		</div>
    </div>
	<div class="row">
		<div class="col-xs-12 ">
			@include('admin.reports.agent.includes.buttons')
		</div>
	</div>
	@include('admin.reports.agent.includes.table')

@endsection

@push('js')
	{{-- @include('layouts.backend.includes.datatable_script') --}}
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
		<script src="{{ asset('js/printPage.js') }}"></script>
		<script>
			$(document).ready(function(){
				$('.input-daterange').datepicker({
				todayBtn:'linked',
				format:'yyyy-mm-dd',
				autoclose:true
				});
			});
		</script>
		<script>
			$(document).ready(function(){
				$('.btn_print').printPage();
			});
		</script>

@endpush
