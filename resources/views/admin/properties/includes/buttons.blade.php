<div class="clearfix hidden-print ">
	<div class="easy-link-menu align-left">
		<a class="{!! request()->is('admin/properties')?'btn-success':'btn-primary' !!} btn-sm" href="{{ route('admin.properties.index') }}"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Detail</a>
		<a class="{!! request()->is('admin/properties/create')?'btn-success':'btn-primary' !!} btn-sm" href="{{ route('agent.post.index') }}"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Create Property</a>
		<a style="margin-right: 0px;" class="{!! request()->is('admin/categories*')?'btn-success':'btn-primary' !!} btn-sm pull-right" href="{{ route('admin.categories.index') }}"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Categories</a>
		{{-- <a style="margin-right: 5px;" class="{!! request()->is('admin/roles*')?'btn-success':'btn-primary' !!} btn-sm pull-right" href="{{ route('admin.roles.index') }}"><i class="fa fa-certificate" aria-hidden="true"></i> Role Accessibility</a> --}}
	</div>
</div>
<hr class="hr-6">
