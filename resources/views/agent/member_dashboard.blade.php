@extends('layouts.frontend.front_layout')

@push('css')
	<link rel="stylesheet" href="{{asset('assets/css/members.css')}}">
@endpush

@section('content')

	<div class="my-account-page account-page">
		<div class="my-account-head bg-white border-bottom">
			<div class="my-container text-center">
			</div>
			<div class="my-container">
				<div class="user-profile">
					<div>
						<a href="#" class="user-photo" style="background: url('https://www.khmer24.com/khmer24-reform21/template/img/default_profile.jpg') no-repeat center; background-size: cover;">
						</a>
						<div class="user-info">
							<div class="name">Hi! <span id="text_name">សុភ័ក្រ លាប</span>
								<a id="btn-edit-name" class="text " data-toggle="modal" data-target="#popup_change_name" href="#popup_change_name"><span class="icon icon-edit"></span></a>
								<a href="#" style="position: absolute; right: 15px;" class="btn btn-sm btn-warning btn_yellow_brown">Upgrade To Business Account</a>
							</div>
							<ul class="info list-unstyled">
								<li>
								<b>Username:</b> <span id="username_text">p-70393143</span>
								<a class="text " data-toggle="modal" data-target="#popup_change_username" href="#popup_change_username"><span class="icon icon-edit"></span> Edit</a>
								</li>
								<li>
								<b>Register Phone:</b> 070393143 <span class="icon icon-check"></span>
								<a class="text " data-toggle="modal" data-target="#popup_change_phone" href="#popup_change_phone"><span class="icon icon-edit"></span> Change</a>
								</li>
								<li><b>Account Type:</b> Normal Account <a href="#">Update</a></li>
								<li>
								<b>Email:</b> <span id="email_text"></span>
								<a class="text " data-toggle="modal" data-target="#popup_change_email" href="#popup_change_email">Add Email</a>
								</li>
								<li>
								<b>Connect with Facebook <span class="icon icon-facebook"></span></b>
								<span class="icon icon-delete"></span>
								<a href="#">Conncet Now</a>
								</li>
								<li class="store_url">
								<b>Store URL:</b> <a id="store_url" class="btn-link" href="#">p-70393143</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="nav-controls">
						<ul class="nav nav-pills nav-fill">
							<li class="nav-item active">
								<a class="nav-link" href="{{ route('home') }}">
									<span class="icon icon-folder"></span> My Ads</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link" href="{{ route('likes') }}">
									<span class="icon icon-like"></span> Likes</a>
								</li>
							<li class="nav-item ">
								<a class="nav-link" href="{{ route('notifications') }}">
									<span class="icon icon-notification"></span> Notification</a>
								</li>
							<li class="nav-item ">
								<a class="nav-link" href="{{ route('setting') }}">
									<span class="icon icon-setting-outline"></span> Setting</a>
								</li>
						</ul>
					</div>
				</div>
			</div>
			@if (Request::route()->getName() == "home")
				@include('member.my_ads')
			@endif
			@if (Request::route()->getName() == "likes")
				@include('member.my_like')
			@endif
			@if (Request::route()->getName() == "notifications")
				@include('member.my_notifications')
			@endif
			@if (Request::route()->getName() == "setting")
				@include('member.my_setting')
			@endif
		</div>

		<div class="modal" id="confirm_popup" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Please Re-enter Your Password</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
					<div id="popup_message"></div>
					<div class="info">For your security, you must re-enter your password to continue.</div>
					<div class="form pt-3"><label>Password:</label> <input id="txt_password" type="password" name="password"></div>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary" id="btn_confirm">Submit</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal" id="popup_change_name" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Change Name</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
					<input autocomplete="off" type="text" name="name" class="form-control" placeholder="Name" id="name">
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary btn_set_name">Save</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal" id="popup_change_username" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Username</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
					<div id="popup_change_username_message"></div>
					<div class="input_box">
					<input type="text" name="username" class="form-control" placeholder="Username" id="txt_username" autocomplete="off">
					<span id="username_status_icon" class="status_icon"></span>
					</div>
					<div class="error_message error" id="error_message_username"></div>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary btn_set_username">Save</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal" id="popup_change_email" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Email</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
					<div id="popup_change_email_message"></div>
					<div class="input_box">
					<input type="email" name="email" class="form-control" placeholder="Email" id="txt_email" autocomplete="off">
					<span id="email_status_icon" class="status_icon"></span>
					</div>
					<div class="error_message error" id="error_add_email"></div>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-secondary btn_cancel" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary btn_set_email">Save & Verify</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal" id="popup_change_phone" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Phone</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div id="popup_change_phone_message"></div>
						<div class="input_box">
						<input type="tel" name="phone" class="form-control" placeholder="Phone number" id="txt_phone" autocomplete="off">
						<span id="phone_status_icon" class="status_icon"></span>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary btn_set_phone">Save & Verify</button>
					</div>
				</div>
			</div>
		</div>
		<input type="hidden" value="https://www.khmer24.com/" id="base_url">
		<input type="hidden" value="https://www.khmer24.com/khmer24-reform21/template/" id="template_path">

		<script type="text/javascript">
		    $('document').ready(function(){
		      var xhr_topics = null;
		      var base_url = "https://www.khmer24.com/";
		      var csrf = "a71bc44da8b47c07b2781c66cbf58cdc";
		      var modal_type = '';
		      var input_text = "";
		      $('body').on('keyup change','#txt_username',function(){
		          var txt = $(this);
		          if(input_text==txt.val()) {
		              return;
		          }
		          if(!txt.val() || txt.val().length<2) {
		              $('body').find('div#error_message_username').html('');
		              $('#username_status_icon').attr('class','status_icon');
		              return;
		          }
		          if(xhr_topics != null) {
		              xhr_topics.abort();
		          }
		          $('.btn_set_username').addClass('disabled');
		          input_text = txt.val();
		          $('#username_status_icon').attr('class','status_icon loading');
		          xhr_topics = $.post('https://www.khmer24.com/en/ajax/check-username', {'username' : txt.val(), 'csrf_test_name' : csrf} , function(result){
		              xhr_topics = null;
		              if(result.status=='1') {
		                  $('.btn_set_username').removeClass('disabled');
		                  $('body').find('div#error_message_username').html('');
		                  $('#username_status_icon').attr('class','status_icon available');
		                  modal_type = 'username';

		              } else {
		                  $('body').find('div#error_message_username').html(result.info);
		                  $('#username_status_icon').attr('class','status_icon not_available');
		              }
		          },'json');
		      });
		      $('body').on('keyup change','#txt_phone',function(){
		          var txt = $(this);
		          if(input_text==txt.val()) {
		              return;
		          }
		          if(!txt.val() || txt.val().length<8) {
		              $('body').find('#error_add_phone').html('');
		              $('#phone_status_icon').attr('class','status_icon');
		              return;
		          }
		          if(xhr_topics != null) {
		              xhr_topics.abort();
		          }
		          $('.btn_set_phone').addClass('disabled');
		          input_text = txt.val();
		          $('#phone_status_icon').attr('class','status_icon loading');
		          xhr_topics =$.post('https://www.khmer24.com/en/ajax/check-phone', {'phone' : txt.val(), 'csrf_test_name' : csrf} , function(result){
		              xhr_topics = null;
		              if(result.status=='1') {
		                  $('.btn_set_phone').removeClass('disabled');
		                  $('body').find('#error_add_phone').html('');
		                  $('#phone_status_icon').attr('class','status_icon available');
		                  modal_type = 'phone';
		              } else {
		                  $('body').find('#error_add_phone').html(result.info);
		                  $('#phone_status_icon').attr('class','status_icon not_available');
		              }
		          },'json');
		      });
		      $('body').on('keyup change','#txt_email',function(){
		          var txt = $(this);
		          if(input_text==txt.val()) {
		              return;
		          }
		          if(!txt.val() || txt.val().length<8) {
		              $('body').find('#error_add_email').html('');
		              $('#email_status_icon').attr('class','status_icon');
		              return;
		          }
		          if(xhr_topics != null) {
		              xhr_topics.abort();
		          }
		          $('.btn_set_email').addClass('disabled');
		          input_text = txt.val();
		          $('#email_status_icon').attr('class','status_icon loading');
		          xhr_topics =$.post('https://www.khmer24.com/en/ajax/check-email', {'email' : txt.val(), 'csrf_test_name' : csrf} , function(result){
		              xhr_topics = null;
		              if(result.status=='1') {
		                  $('.btn_set_email').removeClass('disabled');
		                  $('body').find('#error_add_email').html('');
		                  $('#email_status_icon').attr('class','status_icon available');
		                  modal_type = 'email';

		              } else {
		                  $('body').find('#error_add_email').html(result.info);
		                  $('#email_status_icon').attr('class','status_icon not_available');
		              }
		          },'json');
		      });
		      $('.modal-body .text').click(function(event){
		          event.preventDefault();
		          $('.btn_set_username').addClass('disabled');
		          $('.btn_set_phone').addClass('disabled');
		          $('body').find('div.popup_input').removeClass('loading');
		          $('body').find('div.popup_input').find('input.form-control').val('');
		          $('body').find('div.popup_input').find('div.error_message').text('').removeClass("show");
		          $(this).closest('div.popup_input').find('span.status_icon').attr('class','status_icon');
		      });
		      $('.btn_set_username').click(function(event){
		          event.preventDefault();
		          var username = $('#txt_username').val();
		          var btn = $(this);
		          if(username.length>2) {
		              $('#popup_change_username').modal('hide');
		              $('#confirm_popup').modal('show');
		              setTimeout(function(){
		                  $('body').find('div#popup_message').html('');
		                  $('body').find('div#popup_message').attr('class','');

		                  $('body').find('div#error_message_username').html('');
		                  $('body').find('input#txt_password').focus();
		              }, 100);
		          } else {
		              $('#txt_username').focus();
		          }
		      });
		      $('body').on('click','#btn_confirm',function(e){
		          e.preventDefault();
		          if($('body').find('input#txt_password').val().length<6) {
		              $('body').find('input#txt_password').focus();
		              return;
		          }
		          if(modal_type=='username') {
		              var username = $('#txt_username').val();
		              var btn = $(this);
		              if(username.length>2) {
		                  $('#confirm_popup').addClass('loading');
		                  $.post(base_url+"ajax/set-username",{"username":username, 'password':$('body').find('input#txt_password').val(), "csrf_test_name":csrf},function(result){
		                      $('#confirm_popup').removeClass('loading');
		                      $('body').find('input#txt_password').val('');
		                      if(result.status=="1" || result.status==1) {
		                          $('body').find('#username_text').text(username);
		                          $('body').find('#store_url').text(base_url+username);
		                          $('body').find('#store_url').attr('href',base_url+username);
		                          // $('#btn-edit-name').html('<span class="icon icon-edit"></span> Edit');
		                          $('#confirm_popup').modal('hide');
		                      } else {
		                          if(result.type=='password') {
		                              $('body').find('div#popup_message').attr('class', 'alert alert-danger');
		                              $('body').find('div#popup_message').html(result.info);
		                              $('body').find('div#error_message_username').html('');
		                              $('body').find('input#txt_password').focus();

		                          } else {
		                            $('#confirm_popup').modal('hide');
		                            $('#popup_change_username').modal('show');
		                            $('body').find('div#popup_change_username_message').attr('class', 'alert alert-danger');
		                            $('body').find('div#popup_change_username_message').html(result.info);
		                          }
		                      }
		                  },'json');
		              } else {
		                  $('body').find('#txt_username').focus();
		              }
		          }

		          if(modal_type=='phone') {

		              var phone = $('#txt_phone').val();
		              var btn = $(this);

		              if(phone.length>2) {
		                  $('#confirm_popup').addClass('loading');
		                  $.post(base_url+"ajax/set-phone",{"phone":phone, 'password':$('body').find('input#txt_password').val(), "csrf_test_name":csrf},function(result){

		                      $('#confirm_popup').removeClass('loading');

		                      $('body').find('input#txt_password').val('');
		                      if(result.status=="1" || result.status==1) {

		                          $('body').find('#phone_text').text(phone);
		                          $('body').find('a#store_url').text(base_url+phone);
		                          $('body').find('a#store_url').attr('href',base_url+phone);
		                          $('#btn-edit-phone').text('<span class="icon icon-edit"></span> Edit');
		                          $('#confirm_popup').modal('hide');

		                          if(result.redirect) {
		                              window.location.href = result.redirect;
		                          }


		                      } else {
		                          if(result.type=='password') {
		                              $('#confirm_popup').modal('show');
		                              $('body').find('div#popup_message').html(result.info);
		                              $('body').find('div#popup_message').attr('class', 'alert alert-danger');
		                              $('body').find('#error_message_phone').html('');
		                              $('body').find('input#txt_password').focus();
		                          } else {
		                            $('#confirm_popup').modal('hide');
		                            $('#popup_change_phone').modal('show');
		                              $('body').find('div#popup_change_phone_message').html(result.info);
		                              $('body').find('div#popup_change_phone_message').attr('class', 'alert alert-danger');
		                          }
		                      }

		                  },'json');
		              } else {
		                  $('body').find('#txt_phone').focus();
		              }

		          }

		          if(modal_type=='email') {

		              var email = $('#txt_email').val();
		              var btn = $(this);

		              if(email.length>2) {
		                  $('#confirm_popup').addClass('loading');
		                  $.post(base_url+"ajax/set-email",{"email":email, 'password':$('body').find('input#txt_password').val(), "csrf_test_name":csrf},function(result){

		                      $('#confirm_popup').removeClass('loading');

		                      $('body').find('input#txt_password').val('');
		                      if(result.status=="1" || result.status==1) {

		                          $('body').find('#email_text').text(email);
		                          $('body').find('a#store_url').text(base_url+email);
		                          $('body').find('a#store_url').attr('href',base_url+email);
		                          $('#btn-edit-email').text('<span class="icon icon-edit"></span> Edit');

		                          $('#confirm_popup').modal('hide');

		                          if(result.redirect) {
		                              window.location.href = result.redirect;
		                          }

		                      } else {
		                          if(result.type=='password') {
		                              $('#confirm_popup').modal('show');
		                              $('body').find('div#popup_message').html(result.info);
		                              $('body').find('div#popup_message').attr('class', 'alert alert-danger');
		                              $('body').find('#error_message_email').html('');
		                              $('body').find('input#txt_password').focus();
		                          } else {
		                              $('#confirm_popup').modal('hide');
		                              $('#popup_change_email').modal('show');
		                              $('body').find('div#popup_change_email_message').html(result.info);
		                              $('body').find('div#popup_change_email_message').attr('class', 'alert alert-danger');
		                          }
		                      }

		                  },'json');
		              } else {
		                  $('body').find('#txt_email').focus();
		              }

		          }

		          if(modal_type=='remove-email') {
		              var btn = $(this);
		              $('#confirm_popup').addClass('loading');
		              $.post(base_url+"ajax/remove-email",{'password':$('body').find('input#txt_password').val(), "csrf_test_name":csrf},function(result){
		                  $('#confirm_popup').removeClass('loading');
		                  $('body').find('input#txt_password').val('');
		                  if(result.status=="1" || result.status==1) {
		                    location.reload();
		                  } else {
		                      if(result.type=='password') {
		                          $('#confirm_popup').modal('show');
		                          $('body').find('div#popup_message').html(result.info);
		                          $('body').find('div#popup_message').attr('class', 'alert alert-danger');
		                          $('body').find('#error_message_email').html('');
		                          $('body').find('input#txt_password').focus();
		                      } else {
		                          $('body').find('#error_add_email').html(result.info);
		                      }
		                  }

		              },'json');
		          }
		      });
		      $('.btn_set_email').click(function(event){
		          event.preventDefault();
		          var email = $('#txt_email').val();
		          var btn = $(this);
		          if(email.length>2) {
		            modal_type = 'email';
		              $('#popup_change_email').modal('hide');
		              $('#confirm_popup').modal('show');
		              setTimeout(function(){
		                  $('body').find('div#popup_message').html('');
		                  $('body').find('div#popup_message').attr('class','');
		                  $('body').find('#error_message_email').html('');
		                  $('body').find('input#txt_password').focus();
		              }, 100);
		          } else {
		              $('#txt_email').focus();
		          }
		      });
		      $('.btn_set_phone').click(function(event){
		          event.preventDefault();
		          var phone = $('#txt_phone').val();
		          var btn = $(this);
		          if(phone.length>8) {
		            modal_type = 'phone';
		              $('#popup_change_phone').modal('hide');
		              $('#confirm_popup').modal('show');
		              setTimeout(function(){
		                  $('body').find('div#popup_message').html('');
		                  $('body').find('div#popup_message').attr('class','');
		                  $('body').find('#error_add_phone').html('');
		                  $('body').find('#txt_phone').focus();
		              }, 100);
		          } else {
		              $('#txt_phone').focus();
		          }
		      });
		      $('.btn_set_name').click(function(event){
		          event.preventDefault();
		          var name = $('#name').val();
		          $(btn).closest('div.popup_input').find('div.error_message').removeClass("show");
		          $(btn).closest('div.popup_input').find('div.error_message').text('');
		          if(name.length<2) {
		              $('#name').focus();
		              return;
		          }
		          var btn = $(this);
		              $(this).closest('div.modal').addClass('loading');
		              $.post(base_url+"ajax/set-name",{"name":name,"csrf_test_name":csrf},function(result){

		                  if(result.status=="1" || result.status==1) {
		                      $('#text_name').text(name);
		                      $('input[name="name"]').val(name);
		                      $(btn).closest('div.popup_input').remove();
		                      $(btn).closest('div.modal').modal('hide');

		                  } else {
		                      $(btn).closest('div.popup_input').find('div.error_message').addClass("show");
		                      $(btn).closest('div.popup_input').find('div.error_message').text(result.info);
		                  }
		                  $(btn).closest('div.modal').removeClass('loading');

		              },'json');
		      });
		      $('.modal-body .form-control').focus(function(){
		          $(this).closest('div.popup_input').find('div.error_message').removeClass("show");
		          $(this).closest('div.popup_input').find('div.error_message').text('');
		      });
		      $('.btn-remove-email').click(function(e){
		        e.preventDefault();
		        modal_type = 'remove-email';
		        $('#confirm_popup').modal('show');
		      });
		    });
		</script>
		<a href="#totop" id="totop"><i class="icon-up"></i></a>
		<div class="fix-feedback">
			<a href="https://www.khmer24.com/en/feedback" class="btn btn-primary btn-sm">Feedback</a>
		</div>
	</div>

@endsection

@push('js')

@endpush
