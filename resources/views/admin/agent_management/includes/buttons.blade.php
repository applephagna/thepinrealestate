<div class="clearfix hidden-print ">
	<div class="easy-link-menu align-left">
		<a class="{!! request()->is('admin/agent/list')?'btn-success':'btn-primary' !!} btn-sm" href="{{ route('admin.agent.list') }}"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Detail</a>
		<a class="{!! request()->is('admin/agent/create')?'btn-success':'btn-primary' !!} btn-sm" href="{{ route('admin.agent.create') }}"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Create Agent</a>
		<a style="margin-right: 0px;" class="{!! request()->is('admin/permissions*')?'btn-success':'btn-primary' !!} btn-sm pull-right" href="{{ route('admin.permissions.index') }}"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Permission</a>
		<a style="margin-right: 5px;" class="{!! request()->is('admin/roles*')?'btn-success':'btn-primary' !!} btn-sm pull-right" href="{{ route('admin.roles.index') }}"><i class="fa fa-certificate" aria-hidden="true"></i> Role Accessibility</a>
	</div>
</div>
<hr class="hr-6">
{{-- <div class="clearfix hidden-print ">
	<form action="{{ route('admin.report.agent') }}" method="get">
		<div class="row input-daterange">
			<div class="col-md-4">
					<input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly />
			</div>
			<div class="col-md-4">
					<input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
			</div>
			<div class="col-md-4">
				<button type="submit" name="filter" id="filter" class="btn btn-primary btn-sm">Filter</button>
        <button type="submit" name="excel_export" id="excel_export" class="btn btn-success btn-sm">Excel</button>
				<button type="submit" name="pdf_export" id="pdf_export" class="btn btn-warning btn-sm">PDF</button>
				<a href="{{ route('admin.report.agent') }}" class="btn btn-info btn-sm btn_print">Print</a>
			</div>
		</div>
	</form>
</div> --}}
<br>
