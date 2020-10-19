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
						@if (isset($users) && $users->count() > 0)
							@php($i = 1)
							@foreach($users as $row)
								<tr>
									<td>{{ $i }}</td>
									<td>
										{{ $row->email }}
									</td>
									<td>
										@php($roles = $row->roles)
										@if(isset($roles) && $roles->count() > 0)
											@foreach($roles as $role)
												<div class="btn-group">
													<button class="btn btn-success btn-xs" >
														{{ $role->display_name }}
														<span class="ace-icon fa fa-caret-down icon-on-right"></span>
													</button>
												</div>
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
									<td>
										<div class="btn-group">
											<button class="btn btn-success btn-xs"}}" >
												{{ $row->is_active == 1?"Active":"In Active" }}
												<span class="ace-icon fa fa-caret-down icon-on-right"></span>
											</button>
										</div>
									</td>
								</tr>
							@php($i++)
							@endforeach
						@else
							<tr><td colspan="7">No data found.</td></tr>
						@endif
					</tbody>
			</table>
		</div>
	</div>
</div>

