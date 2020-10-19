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
                    <a href="{{ route('admin.users.show',$item->causer->id) }}">{{ $item->causer->name }}</a>
                @else
                    -
                @endif
            </td>
            <td>{{ $item->created_at }}</td>
            <td>
                <a href="{{ url('/admin/activitylogs/' . $item->id) }}" title="View Activity"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                {!! Form::open([
                    'method' => 'DELETE',
                    'url' => ['/admin/activitylogs', $item->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete Activity',
                            'onclick'=>'return confirm("Confirm delete?")'
                    )) !!}
                {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
