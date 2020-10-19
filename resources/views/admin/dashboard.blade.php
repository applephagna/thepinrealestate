@extends('layouts.backend.master_layout')

@push('css')

@endpush

@section('content')
	<div class="container">
		<div class="row">
			{{trans('auth.failed')}}</br>
			@lang('auth.throttle')</br>
			{{ __('auth.throttle') }}
		</div>
	</div>
@endsection

@push('js')

@endpush
