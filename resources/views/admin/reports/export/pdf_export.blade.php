{{-- @extends('layouts.backend.master_layout')

@section('pagetitle', '| Users Registation Report')

@push('css')

@endpush

@section('content') --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Users Regisration Report</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 ">
                <center><h3><i class="fa fa-users"></i> Users Registation Report</h3></center>
            </div>
        </div>
        @include('admin.reports.export.pdf_table')
    </div>
</body>
</html>
{{--
@endsection

@push('js')

@endpush --}}
