{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.backend.master_layout')

@section('title', '| Agent Management')

@push('css')
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
  <link rel="stylesheet" href="{{ asset('cpanel/orgChart/css/jquery.orgchart.min.css') }}">
	<style type="text/css" media="screen">
		#chart-container {
			position: relative;
			display: inline-block;
			right: 10px;
			left: 10px;
			height: 100%;
			width: 100%;
			border-radius: 5px;
			overflow: auto;
			text-align: center;
		}
		.orgchart{
				padding: 0px;
		}
		.orgchart .node {
			box-sizing: border-box;
			display: inline-block;
			position: relative;
			margin: 0;
			padding: 3px;
			border: 2px dashed transparent;
			text-align: center;
			height: 112px;
		}
  	.panel-primary .panel-heading {
	    color: #fff;
	    background-color: #ea4646;
	    border-color: #428bca;
		}
  	.panel-heading {
	    padding: 5px 10px;
		}
  	.panel-body {
    	padding: 5px;
		}
		#sidepanel {
			float: left;
			min-width: 200px;
			max-width: 220px;
			width: 40%;
			height: 100%;
			background: #2c3e50;
			color: #f5f5f5;
			overflow: hidden;
			position: relative;
		}
		@media screen and (max-width: 735px) {
			#sidepanel {
				width: 58px;
				min-width: 58px;
			}
		}
		#sidepanel .contact{
			position: relative;
			padding: 10px 0 15px 0;
			font-size: 0.9em;
			cursor: pointer;
		}
		@media screen and (max-width: 735px) {
			#sidepanel .contact {
				padding: 6px 0 46px 8px;
			}
		}
		#sidepanel .contact:hover {
			background: #32465a;
		}
		#sidepanel .contact.active {
			background: #32465a;
			border-right: 5px solid #435f7a;
		}
		#sidepanel .contact.active span.contact-status {
			border: 2px solid #32465a !important;
		}
		#sidepanel .contact .wrap {
			width: 88%;
			margin: 0 auto;
			position: relative;
		}
		@media screen and (max-width: 735px) {
			#sidepanel .contact .wrap {
				width: 100%;
			}
		}
		#sidepanel .contact .wrap span {
			position: absolute;
			left: 0;
			margin: -2px 0 0 -2px;
			width: 10px;
			height: 10px;
			border-radius: 50%;
			border: 2px solid #2c3e50;
			background: #95a5a6;
		}
		#sidepanel .contact .wrap span.online {
			background: #2ecc71;
		}
		#sidepanel .contact .wrap span.away {
			background: #f1c40f;
		}
		#sidepanel .contact .wrap span.busy {
			background: #e74c3c;
		}
		#sidepanel .contact .wrap img {
			width: 40px;
			border-radius: 50%;
			float: left;
			margin-right: 10px;
		}
		@media screen and (max-width: 735px) {
			#sidepanel .contact .wrap img {
				margin-right: 0px;
			}
		}
		#sidepanel .contact .wrap .meta {
			padding: 5px 0 0 0;
			margin-left: 50px;
		}
		@media screen and (max-width: 735px) {
			#sidepanel .contact .wrap .meta {
				display: none;
			}
		}
		#sidepanel .contact .wrap .meta .name {
			font-weight: 600;
			text-align: justify;
		}
		#sidepanel .contact .wrap .meta .preview {
			margin: 5px 0 0 0;
			padding: 0 0 1px;
			font-weight: 400;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
			-moz-transition: 1s all ease;
			-o-transition: 1s all ease;
			-webkit-transition: 1s all ease;
			transition: 1s all ease;
			text-align: justify;
		}
		#sidepanel .contact .wrap .meta .preview span {
			position: initial;
			border-radius: initial;
			background: none;
			border: none;
			padding: 0 2px 0 0;
			margin: 0 0 0 1px;
			opacity: .5;
		}
	</style>
@endpush

@section('content')
	<div class="row">
		<div class="col-xs-12 ">
			<div>
				<select name="" id="agent">
					@foreach ($arr_merge as $row)
					<option data-url="{{ route('admin.agent.json',[$row['user_id']]) }}" value="{{ $row['user_id'] }}">{{ $row['name_en'] }}</option>
					@endforeach
				</select>
			</div>
			<div id="chart-container"></div>
		</div>
  </div>
@endsection

@push('js')
    <script src="{{ asset('cpanel/orgChart/js/jquery.orgchart.min.js') }}"></script>
    <script>
        (function($) {
            $(function() {
              var nodeTemplate = function(data) {
                return `
									<div class="panel panel-primary">
										<div class="panel-heading">
											<center>${data.name_en}</center>
										</div>
										<div class="panel-body">
											<div id="sidepanel">
												<ul>
													<li class="contact">
														<div class="wrap">
															<span class="contact-status online"></span>
															<img src="${data.photo}" alt="" />
															<div class="meta">
																<p class="name">Phone:${data.phone}</p>
																<p class="preview">Agent: ${data.ref_level}</p>
															</div>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
                `;
                }
              var oc = $("#chart-container").orgchart({
                data:"{{ route('admin.agent.json',[1]) }}",
                nodeTitle: "name_en",
                nodeContent: "name_en",
                nodeTemplate : nodeTemplate,
                exportButton: true
              });

              $('#agent').on('change',function(){
                  var value = $(this).val();
                  var option_url = $(this).find(`option[value="${value}"]`).data('url');
                  $.get(option_url).done((data)=>{
                    var oc = $("#chart-container").html("").orgchart({
                        data:data,
                        nodeTitle: "name_en",
                        nodeContent: "name_en",
                        nodeTemplate : nodeTemplate,
                        exportButton: true
                    });
                  });
              });
            });
          })(jQuery);
    </script>
@endpush
