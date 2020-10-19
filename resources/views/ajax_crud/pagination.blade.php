@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h3>Ajax Pagination</h3>
                </div>
                <div class="card-body"> 
                  @include('ajax_crud.studentPage')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
  <script>
    $(document).ready(function(){
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $(document).on('click','.pagination a',function(e){
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        readPage(page)
      });

      function readPage(page) {
        $.ajax({
          url : '{{ route('ajax.studentPage') }}?page='+page
        }).done(function(data){
          $('.card-body').html(data)
          location.hash=page;
        })
      }
     
    });    

  </script>
@endpush

