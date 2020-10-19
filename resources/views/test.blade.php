<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>	
</head>
<body>
{{-- 	<div class="container">
		<ul style="list-style-type:none;">
			@foreach ($categories as $element)
				@foreach ($element->childs as $child)
				  	<a href="#">&nbsp;&nbsp;{{ $child->type->name_en }}</a>
				  <li>
						<a href="#">&nbsp;&nbsp;{{ $child->subtype->name_en }}</a>
				  </li>
				@endforeach			  
			@endforeach
		</ul>

		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th></th>
					</tr>
				</thead>
				<tbody>
				@foreach ($categories as $element)
					@foreach ($element->childs as $child)
						<tr>
							<td>{{$child->id}}</td>
							<td>{{$child->category_name}}</td>
						</tr>
						@foreach ($child->properties as $pro)
						<tr>
							<td>{{$pro->id}}</td>
							<td>{{$pro->title}}</td>
						</tr>
						@endforeach						
					@endforeach
				@endforeach					
				</tbody>
			</table>
		</div>
	</div> --}}
		<ul style="list-style-type:none;">
			@foreach ($property_types as $pro_type)
				  <li>
						<a href="#">&nbsp;&nbsp;{{ $pro_type->name_en }}</a>
				  </li>
				@foreach ($pro_type->childs as $child)
					<li>
						&nbsp;&nbsp;<a href="{{ $child->cateType->category_name }}">&nbsp;&nbsp;{{ $child->name_en }}</a>
					</li>
				@endforeach				  
			@endforeach
		</ul>	
</body>
</html>