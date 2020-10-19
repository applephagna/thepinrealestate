<div class="clearfix hidden-print ">
	<div class="easy-link-menu align-left">
		<a class="{!! request()->is('admin/roles')?'btn-success':'btn-primary' !!} btn-sm" href="{{ route('admin.roles.index') }}"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Detail</a>
		<a style="margin-right: 0px;" class="{!! request()->is('admin/roles/create')?'btn-success':'btn-primary' !!} btn-sm" href="{{ route('admin.roles.create') }}"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Create Role</a>
		<a style="margin-right: 3px;" class="{!! request()->is('admin/permissions*')?'btn-success':'btn-primary' !!} btn-sm pull-right" href="{{ route('admin.permissions.index') }}"><i class="fa fa-list" aria-hidden="true"></i>&nbsp; Permission</a>
		<a style="margin-right: 3px;" class="{!! request()->is('admin/user*')?'btn-success':'btn-primary' !!} btn-sm pull-right" href="{{ route('admin.users.index') }}"><i class="fa fa-list" aria-hidden="true"></i> User</a>
	</div>
</div>
<hr class="hr-6">
