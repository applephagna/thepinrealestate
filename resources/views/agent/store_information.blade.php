@extends('layouts.frontend.front_layout')

@push('css')
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
										<h1 class="title">Store Information</h1>
										</div>
										<div class="list_data pt-2">
											<form action="#" class="mar_t15 form form-horizontal" method="post" accept-charset="utf-8">
												<input type="hidden" name="csrf_test_name" value="ff765c806cb14fd49015cf2d8a9a772e">
												<div class="form-group">
												<label for="title"><span class="text-red">*</span> Title :</label>
												<div class="row">
												<div class="col-sm-8">
												<input type="text" name="title" value="" class="form-control" id="title">
												</div>
												</div>
												</div>
												<div class="form-group">
												<label for="about">About :</label>
												<textarea name="about" cols="40" rows="10" class="store_about form-control" id="about"></textarea>
												</div>
												<div class="form-group">
													<input type="submit" name="btnsave" value="Save" class="btn btn-block btn-primary ">
												</div>
											</form>
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
