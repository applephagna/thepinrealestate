@extends('layouts.frontend.front_layout')

@push('css')
  <link rel="stylesheet" href="{{asset('assets/css/members.css')}}">
  {{-- <link rel="stylesheet" href="{{asset('assets/sweetalert2/sweetalert2.min.css')}}"> --}}

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
										<h1 class="title">Change Password</h1>
										</div>
										<div class="list_data">
											<div class="row">
												<div class="col-6 pt-2">
												<form action="{{ route('agent.update-password',auth()->id()) }}" class="mar_t15 form form-horizontal" method="post" accept-charset="utf-8">
													{{ csrf_field() }}
													{{ method_field('PUT') }}
													<div class="form-group">
														<label for="old_password">Old Password <span class="red">*</span>:</label>
														<input type="password" name="old_password" value="" id="old_password" class="form-control">
													</div>
													<div class="form-group">
														<label for="password">New Password <span class="red">*</span>:</label>
														<input type="password" name="password" value="" class="form-control" id="password">
													</div>
													<div class="form-group">
														<label for="con_password">Confirm Password <span class="red">*</span>:</label>
														<input type="password" name="password_confirmation" value="" class="form-control" id="con_password">
													</div>
													<div class="form-group">
														<input type="submit" name="btnsave" value="Change" class="btn btn-block btn-primary ">
													</div>
												</form>
											</div>
											</div>
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
