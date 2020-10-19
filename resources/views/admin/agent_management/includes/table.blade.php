<div class="row">
	<div class="col-xs-12">
		<div class="table-responsive">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>No.</th>
						<th>User Email</th>
						<th>User Type</th>
						<th>Register Date</th>
						<th>Image</th>
						<th>Status</th>
					</tr>
				</thead>
					<tbody>
						@if (isset($agents) && $agents->count() > 0)
							{!! Form::open(['route' => 'admin.users.index', 'id' => 'bulk_action_form']) !!}
							@php($i = 1)
							@foreach($agents as $row)
								<tr>
									<td>{{ $i }}</td>
									<td>
										<b>{{ $row->name }}</b>
										<hr class="hr-2">
										{{ $row->email }}
									</td>
									<td>
										@php($roles = $row->roles)
										@if(isset($roles) && $roles->count() > 0)
											@foreach($roles as $role)
												<div class="label label-info arrowed-right arrowed-in">
														{{ $role->display_name }}
												</div>
												<hr class="hr-2">
											@endforeach
										@endif
									</td>
                  <td>{{ date('Y-m-d',strtotime($row->created_at)) }}</td>
									<td>
										@if ($row->photo)
											<img src="{{ asset('uploads/user/profile/'.$row->photo) }}" width="25px">
										@else
											<p>No image</p>
										@endif
									</td>
									<td class="hidden-480 ">
										<div class="btn-group">
											<button class="btn btn-primary btn-minier">
												{{ $row->is_active == 1?"Active":"In Active" }}
											</button>
										</div>
									</td>
								</tr>
							@php($i++)
							@endforeach
							{!! Form::close() !!}
						@else
							<tr><td colspan="7">No data found.</td></tr>
						@endif
					</tbody>
			</table>
		</div>
	</div>
</div>

