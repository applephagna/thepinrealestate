{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.backend.master_layout')

@section('pagetitle', '| Properties Report')

@push('css')
	<style>
		@font-face {
				font-family: kh-Battambang;
				src: url("{{ asset('fonts/Kh-Battambang.ttf') }}");
				font-weight: normal;
		}
		@font-face {
				font-family: kh-Bokor;
				src: url("{{ asset('fonts/Kh-Bokor.ttf') }}");
				font-weight: bold;
		}
		@font-face {
				font-family: kh-Content;
				src: url("{{ asset('fonts/Kh-Content.ttf') }}");
				font-weight: bold;
		}
	</style>
	<link rel="stylesheet" href="{{ asset('cpanel/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" />
@endpush
@section('content')
	<div class="row">
		<div class="col-xs-12 ">
			<center><h3><i class="fa fa-users"></i>Properties Report</h3></center>
		</div>
    </div>
	<div class="row">
		<div class="col-xs-12 ">
			@include('admin.reports.property.includes.buttons')
		</div>
	</div>
	@include('admin.reports.property.includes.table')

@endsection

@push('js')

	<script src="{{ asset('cpanel/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
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
