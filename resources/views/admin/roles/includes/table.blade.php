<div class="row">
	<div class="col-xs-12">
		{{-- <div class="clearfix">
			<span class="pull-right tableTools-container"></span>
		</div> --}}
		<div class="table-header">
			Roles Record list on table. Filter list using search box as your Wish.
		</div>
		<div class="table-responsive">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center">
							<label class="pos-rel">
									<input type="checkbox" class="ace" />
									<span class="lbl"></span>
							</label>
					</th>
					<th>No.</th>
					<th>Name</th>
					<th>Display Name</th>
					<th>Description</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@if (isset($roles) && $roles->count() > 0)
					@php($i = 1)
					@foreach($roles as $role)
						<tr>
							<td class="center">
									<label>
											<input type="checkbox" name="chkIds[]" value="{{ $role->id }}" class="ace" />
											<span class="lbl"></span>
									</label>
							</td>
							<td>{{ $i }}</td>
							<td> {{ $role->name }}  </td>
							<td>{{ $role->display_name }}</td>
							<td>{{ $role->description }}</td>
							<td>
								<center>
									{!! $role->status==1?'<label class="label label-success">Active</label>':'<label class="label label-warning">Disactive</label>' !!}</td>
								</center>
							<td>
									<div class="hidden-sm hidden-xs action-buttons">
										<a href="{{route('admin.roles.edit',$role->id)}}" class="tooltip-success" data-rel="tooltip" title="Edit-{{$role->name}}">
											<span class="blue">
												<i class="ace-icon fa fa-pencil bigger-120"></i>
											</span>
										</a>
										<form method="POST" action="{{route('admin.roles.destroy',$role->id)}}" accept-charset="UTF-8" style="display:inline" id="deleteObject({{$role->id}})">
											{{csrf_field()}}
											{{method_field('DELETE')}}
											<a href="#" class="tooltip-error" onclick="deleteObject({{$role->id}})" data-rel="tooltip" title="Delete-{{$role->name}}">
												<center>                                    
													<span class="red">
														<i class="ace-icon fa fa-trash-o bigger-120"></i>
													</span>                               
												</center>
											</a>
										</form>
									</div>
									<div class="hidden-md hidden-lg">
										<a href="{{route('admin.roles.edit',$role->id)}}" class="tooltip-success" data-rel="tooltip" title="Edit-{{$role->name}}">
											<span class="blue">
												<i class="ace-icon fa fa-pencil bigger-120"></i>
											</span>
										</a>
										<form method="POST" action="{{route('admin.roles.destroy',$role->id)}}" accept-charset="UTF-8" style="display:inline" id="deleteObject-2">
											{{csrf_field()}}
											{{method_field('DELETE')}}
											<a href="#" class="tooltip-error" onclick="deleteObject($role->id)" data-rel="tooltip" title="Delete-{{$role->name}}">
												<center>                                    
													<span class="red">
														<i class="ace-icon fa fa-trash-o bigger-120"></i>
													</span>                               
												</center>
											</a>
										</form>
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
