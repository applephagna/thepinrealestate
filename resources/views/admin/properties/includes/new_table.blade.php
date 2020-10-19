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
						<th>ID</th>
						<th>Name</th>
						<th>Category</th>
						<th>Type</th>
						<th>PostBy</th>
						<th>Province</th>
						<th>District</th>
						<th>Commune</th>
						<th>Photo</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
					<tbody>
						@if (isset($properties) && $properties->count() > 0)
							{!! Form::open(['route' => 'admin.properties.index', 'id' => 'bulk_action_form']) !!}
							{{-- @php($i = 1) --}}
							@foreach($properties as $key => $row)
								<tr>
									<td class="center">
										<label>
											<input type="checkbox" name="chkIds[]" value="{{ $row->id }}" class="ace" />
											<span class="lbl"></span>
										</label>
									</td>
									<td>{{ $key++ }}</td>
									<td>
										<b>{{ $row->title }}</b>
									</td>
									<td>
										<b>{{ $row->category->category_name }}</b>
									</td>
									<td>
										<b>{{ $row->parent->category_name }}</b>
									</td>
									<td>
										<b>{{ $row->name }}</b>
									</td>
									<td>
										<b>{{ $row->province->name_en }}</b>
									</td>
									<td>
										<b>{{ $row->district->name_en }}</b>
                  </td>
									<td>
										<b>{{ $row->commune->name_en }}</b>
									</td>
                  <td>
										@if ($row->galleries->count()>0)
											<img src="{{ asset('uploads/property/galleries/'.$row->galleries[0]->gallery_image) }}" width="25px" height="25px">
										@else
											<p>No image</p>
										@endif
									</td>
									<td class="hidden-480 ">
										<div class="btn-group">
											<button data-toggle="dropdown" class="btn {{ $row->save_contact == 1?"btn-success":"btn-warning" }} btn-minier dropdown-toggle" >
												{{ $row->save_contact == 1?"Active":"In Active" }}
												<span class="ace-icon fa fa-caret-down icon-on-right"></span>
											</button>
											<ul class="dropdown-menu">
												<li>
													<a href="#" title="Active"><i class="fa fa-check" aria-hidden="true"></i></a>
												</li>
												<li>
													<a href="#" title="In-Active"><i class="fa fa-remove" aria-hidden="true"></i></a>
												</li>
											</ul>
										</div>
									</td>
									<td>
										<div class="hidden-sm hidden-xs action-buttons">
											<a class="green" href="{{route('agent.post.edit',[$row->id,$row->parent_id])}}">
												<i class="ace-icon fa fa-pencil bigger-130"></i>
											</a>
											<a href="javascript:void(0)" class="red btn_delete" data-id="{{ $row->id }}">
												<i class="ace-icon fa fa-trash-o bigger-130"></i>
											</a>
										</div>
										<div class="hidden-md hidden-lg">
											<div class="inline pos-rel">
												<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
														<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
												</button>
												<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
													<li>
														<a href="{{route('admin.properties.edit',$row->id)}}" class="tooltip-success" data-rel="tooltip" title="Edit">
														<span class="green">
															<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
														</span>
														</a>
													</li>
													<li>
														<a href ="javascript:void(0)" class="tooltip-error btn_delete" data-id="{{ $row->id }}" data-rel="tooltip" title="Delete">
                              <span class="red ">
                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                              </span>
                            </a>
													</li>
												</ul>
											</div>
										</div>
									</td>
								</tr>
							{{-- @php($i++) --}}
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
