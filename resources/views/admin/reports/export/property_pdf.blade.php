{{-- @extends('layouts.backend.master_layout')

@section('pagetitle', '| Users Registation Report')

@push('css')

@endpush

@section('content') --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Users Regisration Report</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 ">
                <center><h3><i class="fa fa-users"></i> Users Registation Report</h3></center>
            </div>
        </div>
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
                                        {{-- <th>District</th>
                                        <th>Commune</th> --}}
                                        <th>Views</th>
									</tr>
								</thead>
									<tbody>
										@if (isset($properties) && $properties->count() > 0)
											@php($i = 1)
											@foreach($properties as $row)
												<tr>
													<td>{{ $i }}</td>
													<td>
														{{ $row->title }}
                                                    </td>
                                                    <td>$ {{ number_format($row->price,2, '.', ',') }}</td>
													<td>{{ $row->category->category_name }}</td>
													<td>
														{{ $row->parent->category_name }}
													</td>
													<td>
														{{ $row->name }}
													</td>
													<td>
                                                        {{ $row->province->name_en }}
                                                    </td>
													{{-- <td>
                                                        {{ $row->district->name_en }}
                                                    </td>
													<td>
                                                        {{ $row->commune->name_en }}
                                                    </td>  --}}
                                                    <td>{{ $row->view_count }}</td>                                                                                                       
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
				
				
    </div>
</body>
</html>
{{--
@endsection

@push('js')

@endpush --}}
