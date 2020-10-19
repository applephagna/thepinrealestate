@extends('layouts.frontend.front_layout')

@section('content')
  <div class="container" style="margin-top: 30px;">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header"><b>{{ __('Register') }}</b></div>
          <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="row">
                {{-- first name --}}
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="name_en" class="col-md-4 col-form-label text-md-right">{{ __('Name EN') }}</label>
                    <div class="col-md-8">
                      <input id="name_en" type="text" class="form-control{{ $errors->has('name_en') ? ' is-invalid' : '' }}" name="name_en" value="{{ old('name_en') }}" required autofocus>
                      @if ($errors->has('name_en'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name_en') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                </div>
                {{-- first name kh--}}
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="name_kh" class="col-md-4 col-form-label text-md-right">{{ __('Name KH') }}</label>
                    <div class="col-md-8">
                      <input id="name_kh" type="text" class="form-control{{ $errors->has('name_kh') ? ' is-invalid' : '' }}" name="name_kh" value="{{ old('name_kh') }}" required autofocus>
                      @if ($errors->has('name_kh'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name_kh') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                {{-- username --}}
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                    <div class="col-md-8">
                      <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                      @if ($errors->has('username'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                </div>
                {{-- phone --}}
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                    <div class="col-md-8">
                      <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>
                      @if ($errors->has('phone'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                {{-- email --}}
                <div class="col-md-7">
                  <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    <div class="col-md-8">
                      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                      @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                </div>
                {{-- Referal User Code  --}}
                <div class="col-md-5">
                  <div class="form-group row">
                    <label for="referal" class="col-md-4 col-form-label text-md-right">{{ __('Referal ID') }}</label>
                    <div class="col-md-8">
                      <input id="referal_code" type="text" class="form-control{{ $errors->has('referal_code') ? ' is-invalid' : '' }}" name="referal_code" value="{{ old('referal') }}" required autofocus>
                      @if ($errors->has('referal'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('referal') }}</strong>
                        </span>
                      @endif
                      <span id="error_referal_code"></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                {{-- password --}}
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    <div class="col-md-8">
                      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                      @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                </div>
                {{-- confirm password --}}
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                        <div class="col-md-8">
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                  </div>
                </div>
              </div>
              {{-- sumit button --}}
              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-5">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                  </button>
                </div>
              </div>
              <input type="hidden" id="referal_user_id" name="referal_user_id" value="">
              <input type="hidden" id="referal_user_code" name="referal_user_code" value="">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function(){
      $('#referal_code').blur(function(){
        var error_referal_code = '';
        var referal_code = $('#referal_code').val();
        var _token = $('input[name="_token"]').val();
          $.ajax({
            url:"{{ route('referal.check') }}",
            method:"POST",
            data:{referal_code:referal_code, _token:_token},
            success:function(result){
              Swal.fire({
                position: 'center',
                icon: result.type,
                title: result.message,
                showConfirmButton: false,
                timer: 800
              })
              $('#referal_user_id').val(result.data.id);
              $('#referal_user_code').val(result.data.referal_code);
            }
          })
      });
    });
  </script>
@endpush