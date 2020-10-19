@extends('layouts.backend.master_layout')

@section('title', '| Post List')

@push('css')
  <style>
    a.btn.btn-success.btn-xs.insert-space {
      margin-top: 28px;
    }
  </style>
@endpush

@section('content')
  <div class="pull-left">
    <h1><i class="fa fa-list-alt"></i> Product List</h1>
  </div>
  <div class="pull-right">
      @can('post-create')
      <a class="btn btn-success btn-xs insert-space" href="{{ route('admin.posts.create') }}"> Create New Product</a>
      @endcan
  </div>
	<div class="row">
    <div class="col-xs-12">
      <div class="row">
        <div class="col-xs-12">
          @include('admin.products.includes.table')
        </div>
      </div>
    </div>
  </div>

  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif

@endsection

@push('js')
	@include('admin.products.includes.datatable_script')
@endpush
