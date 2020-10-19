@extends('layouts.backend.ace_layout')


@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Post Title :</strong>
                    {{ $post->title }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Details :</strong>
                    {{ $post->body }}
                </div>
            </div>
        </div>
    </div>
@endsection
