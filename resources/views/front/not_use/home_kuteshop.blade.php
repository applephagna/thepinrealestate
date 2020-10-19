@extends('layouts.front.master')

@section('title','Shopping Cart Homepage')

@push('css')
	{{-- expr --}}
@endpush

@section('main-content')

  <!--  Popup Newsletter-->
    {{-- @include('layouts.front.ads.news_letter') --}}
  <!--Popup Newsletter-->

  {{-- box-section-top --}}
  <div class="block-section-top block-section-top1">
    <div class="container">
      <div class="box-section-top">    
        @include('layouts.includes.front.section_top')
      </div>
    </div>
  </div>
  {{-- end box-section-top --}}

  {{-- block-service --}}
    @include('layouts.includes.front.block_service')
  {{-- block-service --}}

  {{-- Best Sallers --}}
    @include('layouts.includes.front.best_saller')
  {{-- Best Sallers --}}

    <div class="clearfix" style="background-color: #eeeeee;margin-bottom: 40px; padding-top:30px;">
      <!-- block -floor -products / floor 1 :Fashion-->
        {{-- @include('layouts.includes.front.fashion') --}}
      <!-- block -floor -products / floor 1 :Fashion-->

      {{-- Sports --}}
        {{-- @include('layouts.includes.front.sports') --}}
      {{-- Sports --}}

      {{-- Electronics --}}
        {{-- @include('layouts.includes.front.electronic') --}}
      {{-- Electronics --}}

      {{-- Digital --}}
        {{-- @include('layouts.includes.front.digital') --}}
      {{-- Digital --}}

      {{-- Fornitures --}}
        {{-- @include('layouts.includes.front.furniture') --}}
      {{-- Fornitures --}}

      {{-- jewelry --}}
        {{-- @include('layouts.includes.front.jewelry') --}}
      {{-- jewelry --}}

      <!-- Banner -->
        {{-- @include('layouts.includes.front.banner') --}}
      <!-- Banner -->
    </div>

  <!-- block  showcase-->
    {{-- @include('layouts.includes.front.showcase') --}}
  <!-- block  showcase-->

  <!-- block  hot categories-->
    {{-- @include('layouts.includes.front.hot_categories') --}}
  <!--block  hot categories-->
@endsection

@push('js')
	{{-- expr --}}
@endpush