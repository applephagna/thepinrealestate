<div class="table-responsive">
  <table class="table table-hover table-striped table-condensed">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Created At</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="admin_list">
			@foreach ($admins as $key => $row)
				<tr id="{{ $row->id }}">
					<td>{{ ++$key }}</td>
					<td>{{ $row->firstname }}</td>
					<td>{{ $row->username }}</td>
					<td>{{ $row->email }}</td>
					<td>{{ $row->created_at }}</td>
					<td>
						<a href="#" class="btn btn-info btn-sm btn-view" id="view" data-id="{{ $row->id }}">View</a>|
						<a href="#" class="btn btn-success btn-sm btn-edit" id="edit" data-id="{{ $row->id }}">Edit</a>|
						<a href="#" class="btn btn-danger btn-sm btn-del" id="del" data-id="{{ $row->id }}">Delete</a>
					</td>
				</tr>
			@endforeach
    </tbody>
  </table>

</div>
{{ $admins->links() }}