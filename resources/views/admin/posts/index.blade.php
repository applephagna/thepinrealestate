@extends('layouts.backend.ace_layout')

@section('title', '| Post List')

@push('css')
  <style>
    a.btn.btn-success.btn-xs.insert-space {
      margin-top: 28px;
    }
  </style>
@endpush

@section('content')
  <div class="row">
    <div class="col-xs-12">
      <div class="pull-left">
        <h1><i class="fa fa-list-alt"></i> Posts List</h1>
      </div>
      <div class="pull-right">
          @can('post-create')
          <a class="btn btn-success btn-xs insert-space" href="{{ route('admin.posts.create') }}"> Create New Post</a>
          @endcan
      </div>      
    </div>
  </div>
	<div class="row">
    <div class="col-xs-12">
      @include('posts.includes.table')          
    </div>
  </div>

  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif

@endsection

@push('js')
	@include('posts.includes.datatable_script')
@endpush
