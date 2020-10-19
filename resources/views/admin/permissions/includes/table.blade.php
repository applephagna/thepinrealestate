<div class="row">
  <div class="col-xs-12">
    {{-- <div class="clearfix">
      <span class="pull-right tableTools-container"></span>
    </div> --}}
    <div class="table-header">
      Permissions  Record list on table. Filter list using search box as your Wish.
    </div>
    <!-- div.table-responsive -->
    <div class="table-responsive">
      <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>No.</th>
            <th>Group</th>
            <th>Name</th>
            <th>Display Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @if (isset( $permissions) &&  $permissions->count() > 0)
          @php($i = 1)
          @foreach( $permissions as $permission)
          <tr>
            <td>{{ $i }}</td>
            <td> {{ $permission->group }}  </td>
            <td> {{ $permission->name }}  </td>
            <td>{{ $permission->display_name }}</td>
            <td>{{ $permission->description }}</td>
            <td>{!! $permission->status==1?'<label class="label label-success">Active</label>':'<label class="label label-warning">Disactive</label>' !!}</td>
            <td>
              <div class="hidden-sm hidden-xs action-buttons">
                <a class="green" href="{{ route('admin.permissions.edit',$permission->id) }}">
                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                </a>
                {{-- @role('super-admin') --}}
                <a href="#" class="red bootbox-confirm">
                  <i class="ace-icon fa fa-trash-o bigger-130"></i>
                </a>
                {{-- @endrole --}}
              </div>
              <div class="hidden-md hidden-lg">
                <div class="inline pos-rel">
                  <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                  <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                    <li>
                      <a href="{{ route('admin.permissions.edit',$permission->id) }}" class="tooltip-success" data-rel="tooltip" title="Edit">
                        <span class="green">
                          <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                        </span>
                      </a>
                    </li>
                    @role('super-admin')
                    <li>
                      <a href="#" class="tooltip-error bootbox-confirm" data-rel="tooltip" title="Delete">
                        <span class="red ">
                          <i class="ace-icon fa fa-trash-o bigger-120"></i>
                        </span>
                      </a>
                    </li>
                    @endrole
                  </ul>
                </div>
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


{{-- <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Permissions</th>
			<th>Operation</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($permissions as $permission)
			<tr>
				<td>{{ $permission->name }}</td>
				<td>
				<a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left btn-sm" style="margin-right: 3px;">Edit</a>
				{!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
				{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
				{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
	</tbody>
</table> --}}
