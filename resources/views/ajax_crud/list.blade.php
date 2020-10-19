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
