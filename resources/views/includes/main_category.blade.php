<select name="category" class="form-control select-category">
	<option value="">All Category</option>
		@foreach ($category_by_user as $property)
			<option value="{{$property->category->slug}}" class="main_cate main">
				{{$property->category->category_name}}
				@if(count($property->category->childs))
					@include('includes.sub_category',['childs' => $property->category->childs])
				@endif
			</option>
		@endforeach
</select>
