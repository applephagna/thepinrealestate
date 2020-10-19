<div class="table-header">
  Products Record list on table. Filter list using search box as your Wish.
</div>
<div class="table-responsive">
  <table id="dynamic-table" class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Image</th>
        <th>Product Name</th>
        <th>Product Detail</th>
        <th>Status</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Action</th>
      </tr>
    </thead>
    @foreach ($products as $product)
      <tbody>
        <tr>
          <td>{{ ++$i }}</td>
          <td>
            <img src="{{ asset('uploads/product/'.$product->image) }}" alt="{{ $product->title }}" width="40px;" height="40px;">
          </td>
          <td>{{ $product->name }}</td>
          <td>{{ $product->detail }}</td>
          <td>{{ $product->status }}</td>
          <td>{{ $product->created_at }}</td>
          <td>{{ $product->updated_at }}</td>
          <td>
            <form action="{{ route('admin.products.destroy',$product->id) }}" method="product">
              <a class="btn btn-info btn-minier" href="{{ route('admin.products.show',$product->id) }}">Show</a>
              @can('product-edit')
              <a class="btn btn-primary btn-minier" href="{{ route('admin.products.edit',$product->id) }}">Edit</a>
              @endcan
              @csrf
              @method('DELETE')
              @can('product-delete')
              <button type="submit" class="btn btn-danger btn-minier">Delete</button>
              @endcan
            </form>
          </td>
        </tr>
      </tbody>
    @endforeach
  </table>
</div>