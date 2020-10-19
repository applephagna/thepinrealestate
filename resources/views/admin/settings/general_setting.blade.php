@extends('layouts.backend.master_layout')

@section('pagetitle', '| Edit Webmaster Settings')

@push('css')
  <style>
    a.btn.btn-success.btn-xs.insert-space {
      margin-top: 28px;
		}
		.row.spacing-top {
				margin-top: 15px;
		}
    .row.spacing-right {
        padding: 0px;
        margin-right: 10px;
    }
    button.btn.btn-success.btn-xs.pull-right.space-top {
      margin-top: -11px;
      margin-right: -6px;
      margin-bottom: 5px;
    }
  </style>
@endpush

@section('content')
  <div class="row">
    <div class="col-xs-12">
      <form action="{{ route('admin.general.update') }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="tabbable tabs-left">
          <ul class="nav nav-tabs" id="myTab3">
            <li class="active">
              <a data-toggle="tab" href="#home3">
                <i class="pink ace-icon fa fa-tachometer bigger-110"></i>
                Social Login
              </a>
            </li>
            <li>
              <a data-toggle="tab" href="#profile3">
                <i class="blue ace-icon fa fa-user bigger-110"></i>
                ReCaptcha
              </a>
            </li>
            <li>
              <a data-toggle="tab" href="#dropdown13">
                <i class="ace-icon fa fa-rocket"></i>
                Mail Settings
              </a>
            </li>
          </ul>
          <div class="tab-content">
            <button type="submit" class="btn btn-success btn-xs pull-right space-top">Save Settings</button>
            {{-- Social Login --}}
            <div id="home3" class="tab-pane in active">
              {{-- <div class="col-xs-12 col-sm-6">
                <div class="control-group">
                  <label class="control-label bolder blue">Facebook Login</label>
                  <div class="radio">
                    <label>
                      <input name="form-field-radio" type="radio" class="ace">
                      <span class="lbl"> radio option 1</span>
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input name="form-field-radio" type="radio" class="ace">
                      <span class="lbl"> radio option 2</span>
                    </label>
                  </div>
                </div>
              </div>             --}}
              {{-- Login with Facebook --}}
              <div class="row spacing-right">
                <div class="col-xs-12 col-sm-4">
                  <div class="form-group">
                    <label class="control-label bolder blue">Facebook Login </label>
                    <div class="radio">
                      <label>
                        <input id="login_facebook_status2" class="ace" name="login_facebook_status" type="radio"
                        value="0" {{$social->facebook_client_status?'':'checked'}}>
                        <span class="lbl"> Not Active</span>
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input id="login_facebook_status1" class="ace" name="login_facebook_status" type="radio"
                        value="1" value="{{$social->facebook_client_status}}" {{$social->facebook_client_status?'checked':''}}>
                        <span class="lbl"> Active</span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-8" id="facebook_ids_div" style="display: {{$social->facebook_client_status?'block':'none'}}">
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">App ID</label>
                    <div class="col-sm-10">
                    <input placeholder="" class="form-control has-value" dir="ltr" name="login_facebook_client_id" type="text" value="{{$social->facebook_client_id}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">App Secret</label>
                    <div class="col-sm-10">
                    <input placeholder="" class="form-control has-value" dir="ltr" name="login_facebook_client_secret" type="text" value="{{$social->facebook_client_secret}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">
                      <small>Callback URL</small>
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control has-value" readonly="" style="font-size:12px" dir="ltr" name="login_facebook_callbackURL" type="text"
                      value="{!! env('APP_URL') . '/oauth/facebook/callback'!!}">
                    </div>
                  </div>
                </div>
              </div>
              {{-- Login with Twitter --}}
              <div class="row spacing-right">
                <div class="col-xs-12 col-sm-4">
                  <div class="form-group">
                    <label class="control-label bolder blue">Twitter Login</label>
                    <div class="radio">
                      <label>
                        <input id="login_twitter_status2" class="ace" name="login_twitter_status" type="radio"
                        value="0" {{$social->twitter_client_status?'':'checked'}}>
                        <span class="lbl"> Not Active</span>
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input id="login_twitter_status1" class="ace" name="login_twitter_status" type="radio"
                        value="1" {{$social->twitter_client_status?'checked':''}}>
                        <span class="lbl"> Active</span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-md-8" id="twitter_ids_div" style="display: {{$social->twitter_client_status?'block':'none'}}">
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">API Key</label>
                    <div class="col-sm-10">
                      <input placeholder="" class="form-control" dir="ltr" name="login_twitter_client_id" type="text"
                      value="{{$social->twitter_client_id}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">API Secret</label>
                    <div class="col-sm-10">
                      <input placeholder="" class="form-control" dir="ltr" name="login_twitter_client_secret" type="text"
                      value="{{$social->twitter_client_secret}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">
                      <small>Callback URL</small>
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control has-value" readonly="" style="font-size:12px" dir="ltr" name="login_twitter_callbackURL" type="text"
                      value="{!!env('APP_URL') . '/oauth/twitter/callback'!!}">
                    </div>
                  </div>
                </div>
              </div>
              {{-- Login with Google --}}
              <div class="row spacing-right">
                <div class="col-xs-12 col-sm-4">
                  <div class="form-group">
                    <label class="control-label bolder blue">Google Login </label>
                    <div class="radio">
                      <label>
                        <input id="login_google_status2" class="ace" name="login_google_status" type="radio"
                        value="0" {{$social->google_client_status?'':'checked'}}>
                        <span class="lbl"> Not Active</span>
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input id="login_google_status1" class="ace" name="login_google_status" type="radio"
                        value="1" {{$social->google_client_status?'checked':''}}>
                        <span class="lbl"> Active</span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-8" id="google_ids_div" style="display: {{$social->google_client_status?'block':'none'}}">
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Client ID</label>
                    <div class="col-sm-10">
                      <input placeholder="" class="form-control" dir="ltr" name="login_google_client_id" type="text"
                      value="{{$social->google_client_id}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Client Secret</label>
                    <div class="col-sm-10">
                      <input placeholder="" class="form-control" dir="ltr" name="login_google_client_secret" type="text"
                      value="{{$social->google_client_secret}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">
                      <small>Callback URL</small>
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control has-value" readonly="" style="font-size:12px" dir="ltr" name="login_google_callbackURL" type="text"
                      value="{!!config('app.url') . '/oauth/google/callback'!!}">
                    </div>
                  </div>
                </div>
              </div>
              {{-- Login with LinkedIn --}}
              <div class="row spacing-right">
                <div class="col-xs-12 col-sm-4">
                  <div class="form-group">
                    <label class="control-label bolder blue">LinkedIn Login </label>
                    <div class="radio">
                      <label>
                        <input id="login_linkedin_status2" class="ace" name="login_linkedin_status" type="radio"
                        value="0" {{$social->twitter_client_status?'':'checked'}}>
                        <span class="lbl"> Not Active</span>
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input id="login_linkedin_status1" class="ace" name="login_linkedin_status" type="radio"
                        value="1" {{$social->twitter_client_status?'checked':''}}>
                        <span class="lbl"> Active</span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-8" id="linkedin_ids_div" style="display: {{$social->linkedin_client_status?'block':'none'}}">
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Client ID</label>
                    <div class="col-sm-10">
                      <input placeholder="" class="form-control" dir="ltr" name="login_linkedin_client_id" type="text"
                      value="{{$social->linkedin_client_id}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Client Secret</label>
                    <div class="col-sm-10">
                      <input placeholder="" class="form-control" dir="ltr" name="login_linkedin_client_secret" type="text"
                      value="{{$social->linkedin_client_secret}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">
                      <small>Callback URL</small>
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control has-value" readonly="" style="font-size:12px" dir="ltr" name="login_linkedin_callbackURL" type="text"
                      value="{!! env('APP_URL') . '/oauth/linkedin/callback'!!}">
                    </div>
                  </div>
                </div>
              </div>
              {{-- Login with GitHub   --}}
              <div class="row spacing-right">
                <div class="col-xs-12 col-sm-4">
                  <div class="form-group">
                    <label class="control-label bolder blue">GitHub Login </label>
                    <div class="radio">
                      <label>
                        <input id="login_github_status2" class="ace" name="login_github_status" type="radio"
                        value="0" {{$social->twitter_client_status?'':'checked'}}>
                        <span class="lbl"> Not Active</span>
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input id="login_github_status1" class="ace" name="login_github_status" type="radio"
                        value="1" {{$social->twitter_client_status?'checked':''}}>
                        <span class="lbl"> Active</span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-8" id="github_ids_div" style="display: {{$social->github_client_status?'block':'none'}}">
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Client ID</label>
                    <div class="col-sm-10">
                      <input placeholder="" class="form-control" dir="ltr" name="login_github_client_id" type="text"
                      value="{{$social->github_client_id}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Client Secret</label>
                    <div class="col-sm-10">
                      <input placeholder="" class="form-control" dir="ltr" name="login_github_client_secret" type="text"
                      value="{{$social->github_client_secret}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">
                      <small>Callback URL</small>
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control has-value" readonly="" style="font-size:12px" dir="ltr" name="login_github_callbackURL" type="text"
                      value="{!!env('APP_URL') . '/oauth/github/callback'!!}">
                    </div>
                  </div>
                </div>
              </div>
              {{-- Login with Bitbucket   --}}
              <div class="row spacing-right">
                <div class="col-xs-12 col-sm-4">
                  <div class="form-group">
                    <label class="control-label bolder blue">Bitbucket Login </label>
                    <div class="radio">
                      <label>
                        <input id="login_bitbucket_status2" class="ace" name="login_bitbucket_status" type="radio"
                        value="0" {{$social->twitter_client_status?'':'checked'}}>
                        <span class="lbl"> Not Active</span>
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input id="login_bitbucket_status1" class="ace" name="login_bitbucket_status" type="radio"
                        value="1" {{$social->twitter_client_status?'checked':''}}>
                        <span class="lbl"> Active</span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-8" id="bitbucket_ids_div" style="display: {{$social->bitbucket_client_status?'block':'none'}}">
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Key</label>
                    <div class="col-sm-10">
                      <input placeholder="" class="form-control" dir="ltr" name="login_bitbucket_client_id" type="text"
                      value="{{$social->bitbucket_client_id}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Secret</label>
                    <div class="col-sm-10">
                      <input placeholder="" class="form-control" dir="ltr" name="login_bitbucket_client_secret" type="text"
                      value="{{$social->bitbucket_client_secret}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">
                      <small>Callback URL</small>
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control has-value" readonly="" style="font-size:12px" dir="ltr" name="login_bitbucket_callbackURL" type="text"
                      value="{!!env('APP_URL') . '/oauth/bitbucket/callback'!!}">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            {{-- Google Captcha --}}
            <div id="profile3" class="tab-pane">
              {{-- Google reCAPTCHA Status --}}
              <div class="col-xs-12 col-md-12">
                <div class="form-group">
                  <label class="control-label bolder blue">Google reCAPTCHA Status : </label>
                  <div class="radio">
                    <label class="control-label bolder blue">
                      <input id="nocaptcha_status2" class="ace" name="nocaptcha_status" type="radio"
                      value="0" {{$social->nocaptcha_status?'':'checked'}}>
                      <span class="lbl"> Not Active</span>
                    </label>
                  </div>
                  <div class="radio">
                    <label class="control-label bolder blue">
                      <input id="nocaptcha_status1" class="ace" name="nocaptcha_status" type="radio"
                      value="1" {{$social->nocaptcha_status?'checked':''}}>
                      <span class="lbl"> Active</span>
                    </label>
                  </div>
                </div>
                <div id="nocaptcha_div" style="display: {{$social->nocaptcha_status?'block':'none'}};">
                  <div class="form-group">
                    <label>NOCAPTCHA_SECRET</label>
                    <input placeholder="" class="form-control" dir="ltr" name="nocaptcha_secret" type="text"
                    value="{{ isset($social)?$social->nocaptcha_secret:''}}">
                  </div>
                  <div class="form-group">
                    <label>NOCAPTCHA_SITEKEY</label>
                    <input placeholder="" class="form-control" dir="ltr" name="nocaptcha_sitekey" type="text"
                    value="{{ isset($social)?$social->nocaptcha_sitekey:''}}">
                  </div>
                </div>
                <small><a href="https://www.google.com/recaptcha" style="text-decoration: underline" target="_blank"><i class="material-icons"></i> Google reCAPTCHA</a></small>
              </div>
            </div>
            {{-- Mail Settings --}}
            <div id="dropdown13" class="tab-pane">
              <label class="control-label bolder blue">Mail Configuration Status </label>
              <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                  <label>Mail Driver</label>
                  <input placeholder="" class="form-control has-value" dir="ltr" name="mail_driver" type="text"
                  value="smtp">
                </div>
                <div class="form-group">
                  <label>Mail Host</label>
                  <input placeholder="" class="form-control" dir="ltr" name="mail_host" type="text"
                  value="{{ isset($social)?$social->mail_host:'' }}">
                </div>
                <div class="form-group">
                  <label>Mail Port</label>
                  <input placeholder="" class="form-control" dir="ltr" name="mail_port" type="text"
                  value="{{ isset($social)?$social->mail_port:'' }}">
                </div>
                <div class="form-group">
                  <label>Mail Username</label>
                  <input placeholder="" class="form-control" dir="ltr" name="mail_username" type="text"
                  value="{{ isset($social)?$social->mail_username:'' }}">
                </div>
                <div class="form-group">
                  <label>Mail Password</label>
                  <input placeholder="" class="form-control" dir="ltr" name="mail_password" type="password"
                  value="{{ isset($social)?$social->mail_password:'' }}">
                </div>
                <div class="form-group">
                  <label>Mail Encryption</label>
                  <input placeholder="" class="form-control" dir="ltr" name="mail_encryption" type="text"
                  value="{{ isset($social)?$social->mail_encryption:'' }}">
                </div>
                <div class="form-group">
                  <label>No Replay Email</label>
                  <input placeholder="" class="form-control has-value" dir="ltr" name="mail_no_replay" type="text"
                  value="{{ isset($social)?$social->mail_no_replay:'' }}">
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
	</div>
@endsection

@push('js')
  <script type="text/javascript">
    $(document).ready(function () {
      $("#nocaptcha_status2").click(function () {
        $("#nocaptcha_div").css("display", "none");
      });
      $("#nocaptcha_status1").click(function () {
        $("#nocaptcha_div").css("display", "block");
      });
      $("#google_tags_status2").click(function () {
        $("#google_tags_div").css("display", "none");
      });
      $("#google_tags_status1").click(function () {
        $("#google_tags_div").css("display", "block");
      });
      $("#login_facebook_status2").click(function () {
        $("#facebook_ids_div").css("display", "none");
      });
      $("#login_facebook_status1").click(function () {
        $("#facebook_ids_div").css("display", "block");
      });
      $("#login_twitter_status2").click(function () {
      $("#twitter_ids_div").css("display", "none");
      });
      $("#login_twitter_status1").click(function () {
        $("#twitter_ids_div").css("display", "block");
      });
      $("#login_google_status2").click(function () {
        $("#google_ids_div").css("display", "none");
      });
      $("#login_google_status1").click(function () {
        $("#google_ids_div").css("display", "block");
      });
      $("#login_linkedin_status2").click(function () {
        $("#linkedin_ids_div").css("display", "none");
      });
      $("#login_linkedin_status1").click(function () {
        $("#linkedin_ids_div").css("display", "block");
      });
      $("#login_github_status2").click(function () {
      $("#github_ids_div").css("display", "none");
      });
      $("#login_github_status1").click(function () {
        $("#github_ids_div").css("display", "block");
      });
      $("#login_bitbucket_status2").click(function () {
        $("#bitbucket_ids_div").css("display", "none");
      });
      $("#login_bitbucket_status1").click(function () {
        $("#bitbucket_ids_div").css("display", "block");
      });
    });
  </script>
@endpush
