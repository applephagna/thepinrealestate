<div class="clearfix hidden-print ">
	<div class="easy-link-menu align-left">
		<a class="{!! request()->is('admin/activitylogs')?'btn-success':'btn-primary' !!} btn-sm" href="{{ route('activitylogs.index') }}"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Detail</a>
		<a class="{!! request()->is('admin/activitylogs/create')?'btn-success':'btn-primary' !!} btn-sm" href="{{ route('activitylogs.create') }}"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Create Activitylogs</a>
		<a style="margin-right: 0px;" class="{!! request()->is('users*')?'btn-success':'btn-primary' !!} btn-sm pull-right" href="{{ route('users.index') }}"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;User</a>
		<a style="margin-right: 5px;" class="{!! request()->is('roles*')?'btn-success':'btn-primary' !!} btn-sm pull-right" href="{{ route('roles.index') }}"><i class="fa fa-certificate" aria-hidden="true"></i> Role Accessibility</a>
	</div>
</div>
<hr class="hr-6">
