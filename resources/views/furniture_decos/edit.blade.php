@extends('layouts.backend.khmer24_layout')

@push('css')
	<link  href="{{asset('assets/css/post.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="{{asset('css/upload.css')}}">
@endpush

@section('content')

	<script type="text/javascript">
	  $(document).ready(function() {
	  	$("#district" ).prop( "disabled", false );
	  	$("#commune" ).prop( "disabled", false );
		});
	</script>

	<div class="container">
		<div class="post_form bg-white rounded border my_content">
			<div class="header p-3">
				<h1 class="title">POST FREE AD</h1>
				<div class="step">
					<ul class="list-unstyled">
					<li class="active"><span class="text"><i>1</i> Choose a category</span></li>
					<li class="active"><span class="text"><i>2</i> Fill Description</span></li>
					</ul>
				</div>
			</div>

			<div class="post_form p-3">
				<div class="post_form">
					<form action="{{route('post.update',$property->id)}}" class="form form-horizontal" method="post" accept-charset="utf-8" enctype="multipart/form-data" id="form_post">
						{{csrf_field()}}
						{{ method_field('PUT') }}
							@include('freeads.form')
	</div>
	
@endsection

@push('js')
<script src="{{asset('js/upload.js')}}"></script>
<script type="text/javascript">
	$('document').ready(function(){
		vpb_image_preview('#vpb_browse_file');
	// distrct get data by provice change
    $('#province').change(function(){
   	 	var provinceID = $(this).val();
      if(provinceID>=1){
        $.ajax({
         type:"GET",
         url:"{{url('get-district-list')}}?province_id="+provinceID,
         success:function(res){               
          if(res){
          		// $("#district").removeAttr('disabled');
          		$("#district" ).prop( "disabled", false );
              $("#district").empty();
              $("#district").append('<option value="0" data-value="">Select a Khan/District</option>');
              $.each(res,function(key,value){
                $("#district").append('<option value="'+key+'">'+value+'</option>');
              });             
          }else{
            $("#district").empty();
            $("#district" ).prop( "disabled", true );
            $("#commune" ).prop( "disabled", true );
          }
         }
        });
      }else{
        $("#district").empty();
        $("#commune").empty();
        $("#district").append('<option value="0" data-value="">Select a Khan/District</option>');
        $("#commune").append('<option value="0" data-value="">Select a Sangkat/Commune</option>');
        $("#district" ).prop( "disabled", true );
        $("#commune" ).prop( "disabled", true );
      }      
    });
	// commune get data by district change    
    $('#district').on('change',function(){
      var districtID = $(this).val();
      if(districtID>=1){
          $.ajax({
             type:"GET",
             url:"{{url('get-commune-list')}}?district_id="+districtID,
             success:function(res){               
              if(res){
              		$("#commune" ).prop( "disabled", false );
                  $("#commune").empty();
                  $("#commune").append('<option value="0" data-value="">Select a Sangkat/Commune</option>');
                  										
                  $.each(res,function(key,value){
                    $("#commune").append('<option value="'+key+'">'+value+'</option>');
                  });
             
              }else{
                 $("#commune").empty();
                 $("#commune" ).prop( "disabled", true );
              }
             }
          });
      }else{
        $("#commune").empty();
        $("#commune").append('<option value="0" data-value="">Select a Sangkat/Commune</option>');
        $("#commune" ).prop( "disabled", true );
      }        
    });

 		$(".number").keypress(function(evt) {
	  	if (evt.keyCode != 8) {
	  		var theEvent = evt || window.event;
	  		var key = theEvent.keyCode || theEvent.which;
	  		key = String.fromCharCode(key);
	  		var regex = /[0-9]|\./;
	  		if (!regex.test(key)) {
	  			theEvent.returnValue = false;
	  			if (theEvent.preventDefault)
	  				theEvent.preventDefault();
	  		}
	  	}
	  });

	  $('.phone a').click(function(e) {
	  	e.preventDefault();
			if($(this).attr('data-id') == 'add') {
				if($( "body" ).find('div.phone-2').hasClass( "d-none" )) {
					$('.phone-2').removeClass('d-none');
				} else {
					$('.phone-3').removeClass('d-none');
					$('a.add_phone').addClass('d-none');
				}
			} else {
				if ($(this).attr('data-id') == 'phone-2') {
					if($('input[name="phone-3"]').val()) {
						$('input[name="phone-2"]').val($('input[name="phone-3"]').val());
						$('input[name="phone-3"]').val('');
					} else {
						if($('input[name="phone-2"]').val()) {
							$('input[name="phone-2"]').val('');
						} else {
							if(!$('input[name="phone-2"]').val()) {
								$('.phone-2').addClass('d-none');
							}
							$('.phone-3').addClass('d-none');
							$('a.add_phone').removeClass('d-none');
						}
					}
				}
				if ($(this).attr('data-id') == 'phone-3') {             
					if($('input[name="phone-3"]').val()) {
						$('input[name="phone-3"]').val('');
					} else {
						$('a.add_phone').removeClass('d-none');
						$('.phone-3').addClass('d-none');
						$('input[name="phone-3"]').val('');
					}
				}
			}
		});

	  $('.phone input').on('keypress keyup focus change', function() {
	  	if ($(this).val()) {
	  		var input_name = $(this).attr('name');
	  		if (input_name == 'phone-1') {
	  			$('.phone-2').removeClass('d-none');
	  		}
	  		if (input_name == 'phone-2') {
	  			$('.phone-3').removeClass('d-none');
	  		}
	  	}
	  });    
	});
</script>

@endpush