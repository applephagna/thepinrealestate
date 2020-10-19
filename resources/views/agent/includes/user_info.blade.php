<div class="my-container text-center">
  <div></div>
</div>

<div class="my-container">
  <div class="user-profile">
    <div>
      <a href="{{ route('agent.edit-profile') }}" class="user-photo" style="background: url('{{ $user->photo==''?asset('assets/img/default_profile.jpg'):asset('uploads/user/profile/'.$user->photo) }}') no-repeat center; background-size: cover;">
      </a>
      <div class="user-info">
        <div class="name">Hi! <span id="text_name">{{ $user->firstname }}</span>
            <a id="btn-edit-name" class="text " data-toggle="modal" data-target="#popup_change_name" href="#popup_change_name"><span class="icon icon-edit"></span></a>
            {{-- <a href="#membership.html" style="position: absolute; right: 15px;" class="btn btn-sm btn-warning btn_yellow_brown">Upgrade To Business Account</a> --}}
        </div>
        <ul class="info list-unstyled">
            <li>
            <b>Username:</b> <span id="username_text">p-{{ $user->phone }}</span>
            <a class="text " data-toggle="modal" data-target="#popup_change_username" href="#popup_change_username"><span class="icon icon-edit"></span> Edit</a>
            </li>
            <li>
            <b>Register Phone:</b> {{ $user->phone }} <span class="icon icon-check"></span>
            <a class="text " data-toggle="modal" data-target="#popup_change_phone" href="#popup_change_phone"><span class="icon icon-edit"></span> Change</a>
            </li>
            <li><b>Account Type:</b> {{ $user->account_type }} <a href="#membership.html">Update</a></li>
            <li>
              <b>Email:</b>
              @if ($user->email)
                {{$user->email}}
                <span id="email_text"></span>
              <a class="text " data-toggle="modal" data-target="#popup_change_email" href="#popup_change_email">Change Email</a>
              @else
                <span id="email_text"></span>
                <a class="text " data-toggle="modal" data-target="#popup_change_email" href="#popup_change_email">Add Email</a>
              @endif
            </li>
            <li>
            <b>Connect with Facebook <span class="icon icon-facebook"></span></b>
            <span class="icon icon-delete"></span>
            <a href="#">Conncet Now</a>
            </li>
            <li class="store_url">
            <b>Store URL:</b> <a id="store_url" class="btn-link" href="{{ route('agent.profile') }}">https://www.thepinrealestate.com/{{ $user->name_en }}</a>
            </li>
        </ul>
      </div>
    </div>
    <div class="nav-controls">
      <ul class="nav nav-pills nav-fill">
          <li class="nav-item {{ Request::segment(2)=='manage_ads'?'active' :'' }}">
            <a class="nav-link" href="{{ route('agent.dashboard') }}">
            <span class="icon icon-folder"></span> My Ads</a>
          </li>
          <li class="nav-item {{ Request::segment(2)=='likes'?'active' :'' }}">
             <a class="nav-link" href="{{ route('agent.likes') }}">
             <span class="icon icon-like"></span> Likes</a>
          </li>
          <li class="nav-item {{ Request::segment(2)=='notifications'?'active' :'' }}">
            <a class="nav-link" href="{{ route('agent.notifications') }}">
            <span class="icon icon-notification"></span> Notification</a>
          </li>
          <li class="nav-item {{ Request::segment(2)=='chats'?'active' :'' }}">
            <a class="nav-link" href="{{ route('agent.chats') }}">
              <span class="icon icon-chat"></span> Chats
            </a>
          </li>
          <li class="nav-item {{ Request::segment(2)=='setting'?'active' :'' }}">
            <a class="nav-link" href="{{ route('agent.setting') }}">
            <span class="icon icon-setting-outline"></span> Setting</a>
          </li>
      </ul>
    </div>
  </div>
</div>
