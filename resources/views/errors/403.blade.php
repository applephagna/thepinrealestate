{{-- @extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Unauthorized')) --}}

@extends('layouts.frontend.front_layout')

@section('content')

    <div class="container-fluid">
        <div class='col-md-10 offset-1w'>
            <center>
                <h1>ACCESS DENIED</h1>
            </center>
        </div>
      </div>
@endsection
