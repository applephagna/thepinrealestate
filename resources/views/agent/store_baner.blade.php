@extends('layouts.frontend.front_layout')

@push('css')
	<script src="{{asset('assets/js/plupload.full.min.js')}}"></script>
  <link rel="stylesheet" href="{{asset('assets/css/members.css')}}">
  <link rel="stylesheet" href="{{asset('assets/sweetalert2/sweetalert2.min.css')}}">
@endpush

@section('content')

  <div class="my-account-page account-page">
    <div class="my-account-head bg-white border-bottom">
			@include('agent.includes.user_info')
    </div>

		<div class="my-container pt-3 pb-3">
			<div class="setting-page">
				<div class="my-container">
					<div class="bg-white">
					<div class="content row">
						<div class="left-content col-3">
							@include('agent.includes.list_setting')
						</div>
						<div class="right-content col">
							<div id="my_content" class="">
								<section class="box">
									<div class="list active">
										<div class="head">
										<h1 class="title">Store Banner</h1>
										</div>
										<div class="list_data pb-3">
										<div id="plerror"></div>
										<form action="#" class="form form-horizontal" method="post" accept-charset="utf-8">
										<input type="hidden" name="csrf_test_name" value="ff765c806cb14fd49015cf2d8a9a772e">
										<div id="form-banner" class="upload">
										<div id="upload_banner_box">
										<div class="image-placeholder">
										</div>
										<div class="big-text">Upload your banner here</div>
										<div class="small-text">Supported file types: jpg, png, jpeg.<br>(Max size: 10MB, 900x105px)</div>
										<br>
										<button id="pl_browse" class="btn btn-warning btn_yellow_brown btn-md" style="position: relative; z-index: 1;">Browse Photo</button>
										<div id="html5_1dbctb3fuplt1b67u2l1b6ic3n3_container" class="moxie-shim moxie-shim-html5" style="position: absolute; top: 219px; left: 290px; width: 127px; height: 38px; overflow: hidden; z-index: 0;"><input id="html5_1dbctb3fuplt1b67u2l1b6ic3n3" type="file" style="font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;" accept="image/jpeg,.jpg,image/png,.png,.jpeg"></div></div>
										<div id="display_banner_box">
										</div>
										</div>
										<br>
										<div class="text-center pb-3">
										<input type="submit" name="btnsave" value="Save" class="btn col-3 btn-primary btn_blue ">
										</div>
										</form>
										<input type="hidden" id="csrf" value="ff765c806cb14fd49015cf2d8a9a772e">
										</div>
									</div>
								</section>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>

		<a href="#totop" id="totop"><i class="icon-up"></i></a>
    <div class="fix-feedback">
        <a href="#feedback" class="btn btn-primary btn-sm">Feedback</a>
    </div>
  </div>

@endsection

@push('js')

@endpush
