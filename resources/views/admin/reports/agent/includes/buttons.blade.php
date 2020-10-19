<div class="clearfix hidden-print ">
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
</div>
<br>
