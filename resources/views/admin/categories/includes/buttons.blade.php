<div class="clearfix hidden-print ">
	<div class="easy-link-menu align-left">
		<a class="{!! request()->is('admin/categories')?'btn-success':'btn-primary' !!} btn-sm" href="{{ route('admin.categories.index') }}"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Detail</a>
		{{-- <a class="{!! request()->is('admin/categories/create')?'btn-success':'btn-primary' !!} btn-sm" href="{{ route('admin.categories.create') }}"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Create Category</a> --}}
		<a style="margin-right: 0px;" class="{!! request()->is('admin/properties*')?'btn-success':'btn-primary' !!} btn-sm pull-right" href="{{ route('admin.properties.index') }}"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Properties</a>
		{{-- <a style="margin-right: 5px;" class="{!! request()->is('admin/roles*')?'btn-success':'btn-primary' !!} btn-sm pull-right" href="{{ route('admin.roles.index') }}"><i class="fa fa-certificate" aria-hidden="true"></i> Role Accessibility</a> --}}
	</div>
</div>
<hr class="hr-6">
