@extends('layouts.backend.master_layout')

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Product Name :</strong>
					{{ $product->name }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Product Details :</strong>
					{{ $product->detail }}
				</div>
			</div>
		</div>
	</div>
@endsection
