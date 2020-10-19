<div class="row">
	<div class="col-xs-12">
		<div class="table-responsive">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>No.</th>
						<th>Title</th>
						<th>Price</th>
						<th>Category</th>
						<th>Type</th>
						<th>Post By</th>
						<th>Province</th>
						<th>District</th>
						<th>Commune</th>
						<th>Views</th>
					</tr>
				</thead>
					<tbody>
						@if (isset($properties) && $properties->count() > 0)
							{!! Form::open(['route' => 'admin.properties.index', 'id' => 'bulk_action_form']) !!}
							@php($i = 1)
							@foreach($properties as $row)
								<tr>
									<td>{{ $i }}</td>
									<td>
										<b>{{ $row->title }}</b>
									</td>
									<td>$ {{ $row->price }}</td>
									<td>
										<b>{{ $row->category->category_name }}</b>
									</td>
									<td>
										<b style="font-family: kh-Battambang;">{{ $row->parent->category_name }}</b>
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
									<td>{{ $row->view_count }}</td>
								</tr>
							@php($i++)
							@endforeach
							{!! Form::close() !!}
						@else
							<tr><td colspan="11">No data found.</td></tr>
						@endif
					</tbody>
			</table>
		</div>
	</div>
</div>

