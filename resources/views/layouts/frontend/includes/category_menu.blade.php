<select name="category" class="form-control select-category">
	<option value="">All Category</option>
		@foreach ($categories as $category)
			<option value="{{$category->slug}}" {{ $category->slug==$search_category?'selected':'' }} class="main">
				{{$category->category_name}}
				@if(count($category->childs))
					@include('layouts.frontend.includes.category_submenu',['childs' => $category->childs])
				@endif
			</option>
		@endforeach
</select>
