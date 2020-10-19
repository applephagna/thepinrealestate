{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.backend.master_layout')

@section('title', '| Permissons')

@section('content')
	<div class="row">
		<div class="col-xs-12 ">
			<h1><i class="fa fa-key"></i> Activity Logs
		</div>
    </div>
    <hr class="hr-6">
	<div class="row">
		<div class="col-xs-12 ">
			{{-- @include('admin.activitylogs.includes.buttons') --}}
		</div>
	</div>
	@include('admin.activitylogs.includes.table')

@endsection

@push('js')
	@include('admin.activitylogs.includes.datatable_script')
@endpush



{{--
@extends('layouts.backend.ace_layout')

@section('content')
	<div class="container">
		<div class="row">
				<div class="col-md-9">
						<div class="card">
								<div class="card-header">Activity Logs</div>
								<div class="card-body">
										{!! Form::open(['method' => 'GET', 'url' => '/admin/activitylogs', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
										<div class="input-group">
												<input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
												<span class="input-group-append">
														<button class="btn btn-secondary" type="submit">
																<i class="fa fa-search"></i>
														</button>
												</span>
										</div>
										{!! Form::close() !!}

										<br/>
										<br/>

										<div class="table-responsive">
												<table class="table table-borderless">
														<thead>
																<tr>
																		<th>ID</th><th>Activity</th><th>Actor</th><th>Date</th><th>Actions</th>
																</tr>
														</thead>
														<tbody>
														@foreach($activitylogs as $item)
																<tr>
																		<td>{{ $item->id }}</td>
																		<td>{{ $item->description }}</td>
																		<td>
																				@if ($item->causer)
																						<a href="{{ url('/admin/users/' . $item->causer->id) }}">{{ $item->causer->name }}</a>
																				@else
																						-
																				@endif
																		</td>
																		<td>{{ $item->created_at }}</td>
																		<td>
																				<a href="{{ url('/admin/activitylogs/' . $item->id) }}" title="View Activity"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
																				{!! Form::open([
																						'method' => 'DELETE',
																						'url' => ['/admin/activitylogs', $item->id],
																						'style' => 'display:inline'
																				]) !!}
																						{!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
																										'type' => 'submit',
																										'class' => 'btn btn-danger btn-sm',
																										'title' => 'Delete Activity',
																										'onclick'=>'return confirm("Confirm delete?")'
																						)) !!}
																				{!! Form::close() !!}
																		</td>
																</tr>
														@endforeach
														</tbody>
												</table>
												<div class="pagination-wrapper"> {!! $activitylogs->appends(['search' => Request::get('search')])->render() !!} </div>
										</div>

								</div>
						</div>
				</div>
		</div>
	</div>
@endsection --}}
