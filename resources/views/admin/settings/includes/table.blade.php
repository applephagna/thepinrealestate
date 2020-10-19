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
            <th>Key</th>
            <th>Value</th>
            <th>Usage</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($settings as $key => $item)
          <tr>
          <td>{{++$key}}</td>
            <td>{{ $item->key }}</td>
            <td>{{ $item->value }}</td>
            <td><code>setting('{{ $item->key }}')</code></td>
            <td>
              <a href="{{ url('/admin/settings/' . $item->id) }}" title="View Setting"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
              <a href="{{ url('/admin/settings/' . $item->id . '/edit') }}" title="Edit Setting"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
              {!! Form::open([
                  'method' => 'DELETE',
                  'url' => ['/admin/settings', $item->id],
                  'style' => 'display:inline'
              ]) !!}
              {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                      'type' => 'submit',
                      'class' => 'btn btn-danger btn-xs',
                      'title' => 'Delete Setting',
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

