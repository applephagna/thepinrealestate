<div class="clearfix hidden-print ">
	<div class="easy-link-menu align-left">
		<a class="{!! request()->is('roles*')?'btn-success':'btn-primary' !!} btn-sm" href="{{ route('roles.index') }}"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Detail</a>
		<a class="{!! request()->is('roles/create')?'btn-success':'btn-primary' !!} btn-sm" href="{{ route('roles.create') }}"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Create Role</a>
		<a style="margin-right: 0px;" class="{!! request()->is('users*')?'btn-success':'btn-primary' !!} btn-sm pull-right" href="{{ route('users.index') }}"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;User</a>
		<a style="margin-right: 5px;" class="{!! request()->is('permissions*')?'btn-success':'btn-primary' !!} btn-sm pull-right" href="{{ route('permissions.index') }}"><i class="fa fa-certificate" aria-hidden="true"></i> Permission</a>
	</div>
</div>
<hr class="hr-6">
