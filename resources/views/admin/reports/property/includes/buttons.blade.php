<div class="clearfix hidden-print ">
	<form action="{{ route('admin.report.property') }}" method="get">
		<div class="row input-daterange">

      <div class="col-md-3 text-right">
				<div class="form-inline">
					<span class="filter_right  form-group">
						<label>Sort: </label>
						<select class="form-control" name="sortby" style="max-width: 200px;">
							<option value="posted_date_desc" Selected>Post Date: New to Old</option>
							<option value="posted_date_asc">Post Date: Old to New</option>
							<option value="renew_date_desc">Renew Date: New to Old</option>
							<option value="renew_date_asc">Renew Date: Old to New</option>
							<option value="price_desc">Price: High to Low</option>
							<option value="price_asc">Price: Low to High</option>
							<option value="view_desc">Views: High to Low</option>
							<option value="view_asc">Views: Low to High</option>							
						</select>
					</span>
				</div>
			</div>
			<div class="col-md-3">
					<input type="text" value="{{ $from_date }}" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly />
			</div>
			<div class="col-md-3">
					<input type="text"value="{{ $to_date }}" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
			</div>
      <div class="col-md-3 text-right">
				<div class="form-inline">
					<span class="filter_right form-group">
						<label>Category: </label>
						<select class="form-control" name="category" style="width: 180px;">
							@foreach ($rpt_categories as $row)
								<option value="{{ $row->id }}" selected>{{ $row->category_name }}</option>
							@endforeach
						</select>
					</span>
				</div>
			</div>

		</div>

		<hr class="hr-6">

		<div class="row">

      <div class="col-md-3 text-right">
				<div class="form-inline">
					<span class="filter_right form-group">
						<label>Location: </label>
						<select class="form-control" name="location" style="max-width: 180px;">
							<option value="">Choose Location</option>
              @foreach ($rpt_provinces as $row)
								<option value="{{ $row->id }}" {{ $row->id==$location? 'selected':'' }}>{{ $row->name_en }}</option>
							@endforeach
						</select>
					</span>
				</div>
			</div>
      <div class="col-md-3 text-right">
				<div class="form-inline">
					<span class="filter_right form-group">
						<label>Type: </label>
						<select class="form-control" name="type" style="max-width: 180px;">
							<option value="">Choose Category Type </option>
							@foreach ($rpt_cattype as $row)
								<option value="{{ $row->id }}" {{ $row->id==$type? 'selected':'' }}>-- {{ $row->category_name }}</option>
							@endforeach
						</select>
					</span>
				</div>
			</div>
      <div class="col-md-3 text-right">
				<div class="form-inline">
					<span class="filter_right form-group">
						<label>Purpose: </label>
						<select class="form-control" name="purpose" style="width: 180px;">
							<option value="" Selected>Chosse Purpose</option>
							<option value="1" {{ $purpose ==1?'selected':'' }}>Sale</option>
							<option value="2" {{ $purpose ==2?'selected':'' }}>Rent</option>
							<option value="3" {{ $purpose ==3?'selected':'' }}>Properties Wanted</option>
							<option value="4" {{ $purpose ==4?'selected':'' }}>Agent Services</option>
							<option value="5" {{ $purpose ==5?'selected':'' }}>Other Categories</option>
						</select>
					</span>
				</div>
			</div>
			<div class="col-md-3">
				<button type="submit" name="filter" id="filter" class="btn btn-primary btn-sm">Filter</button>
        <button type="submit" name="excel_export" id="excel_export" class="btn btn-success btn-sm">Excel</button>
				<button type="submit" name="pdf_export" id="pdf_export" class="btn btn-warning btn-sm">PDF</button>
				<a href="{{ route('admin.report.property') }}" class="btn btn-info btn-sm btn_print">Print</a>
			</div>

		</div>
	</form>
</div>
<br>
