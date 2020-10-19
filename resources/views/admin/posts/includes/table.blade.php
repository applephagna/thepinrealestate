<div class="table-header">
  Roles Record list on table. Filter list using search box as your Wish.
</div>
<div class="table-responsive">
  <table id="dynamic-table" class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Image</th>
        <th>Title</th>
        <th>Body</th>
        <th>Status</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Action</th>
      </tr>
    </thead>
    @foreach ($posts as $post)
      <tbody>
        <tr>
          <td>{{ ++$i }}</td>
          <td>
            <img src="{{ asset('uploads/post/'.$post->image) }}" alt="{{ $post->title }}" width="40px;" height="40px;">
          </td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->body }}</td>
          <td>{{ $post->status }}</td>
          <td>{{ $post->created_at }}</td>
          <td>{{ $post->updated_at }}</td>
          <td>
            <form action="{{ route('admin.posts.destroy',$post->id) }}" method="POST">
              <a class="btn btn-info btn-minier" href="{{ route('admin.posts.show',$post->id) }}">Show</a>
              @can('post-edit')
              <a class="btn btn-primary btn-minier" href="{{ route('admin.posts.edit',$post->id) }}">Edit</a>
              @endcan
              @csrf
              @method('DELETE')
              @can('post-delete')
              <button type="submit" class="btn btn-danger btn-minier">Delete</button>
              @endcan
            </form>
          </td>
        </tr>
      </tbody>
    @endforeach
  </table>
</div>