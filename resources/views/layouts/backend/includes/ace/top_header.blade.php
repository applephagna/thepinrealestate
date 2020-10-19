<div class="navbar-container ace-save-state" id="navbar-container">
  <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
    <span class="sr-only">Toggle sidebar</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <div class="navbar-header pull-left">
    <a href="{{ route('home') }}" class="navbar-brand">
      <small style="color: white">
        <i class="fa fa-leaf"></i>
        The Pin Realestate
      </small>
    </a>
  </div>
  <div class="navbar-buttons navbar-header pull-right" role="navigation">
    <ul class="nav ace-nav" style="">
      <li class="grey dropdown-modal">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
          <i class="ace-icon fa fa-tasks"></i>
          <span class="badge badge-grey">4</span>
        </a>

        <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
          <li class="dropdown-header">
            <i class="ace-icon fa fa-check"></i>
            4 Tasks to complete
          </li>

          <li class="dropdown-content ace-scroll" style="position: relative;"><div class="scroll-track" style="display: none;"><div class="scroll-bar"></div></div><div class="scroll-content" style="max-height: 200px;">
            <ul class="dropdown-menu dropdown-navbar">
              <li>
                <a href="#">
                  <div class="clearfix">
                    <span class="pull-left">Software Update</span>
                    <span class="pull-right">65%</span>
                  </div>

                  <div class="progress progress-mini">
                    <div style="width:65%" class="progress-bar"></div>
                  </div>
                </a>
              </li>

              <li>
                <a href="#">
                  <div class="clearfix">
                    <span class="pull-left">Hardware Upgrade</span>
                    <span class="pull-right">35%</span>
                  </div>

                  <div class="progress progress-mini">
                    <div style="width:35%" class="progress-bar progress-bar-danger"></div>
                  </div>
                </a>
              </li>

              <li>
                <a href="#">
                  <div class="clearfix">
                    <span class="pull-left">Unit Testing</span>
                    <span class="pull-right">15%</span>
                  </div>

                  <div class="progress progress-mini">
                    <div style="width:15%" class="progress-bar progress-bar-warning"></div>
                  </div>
                </a>
              </li>

              <li>
                <a href="#">
                  <div class="clearfix">
                    <span class="pull-left">Bug Fixes</span>
                    <span class="pull-right">90%</span>
                  </div>

                  <div class="progress progress-mini progress-striped active">
                    <div style="width:90%" class="progress-bar progress-bar-success"></div>
                  </div>
                </a>
              </li>
            </ul>
          </div></li>

          <li class="dropdown-footer">
            <a href="#">
              See tasks with details
              <i class="ace-icon fa fa-arrow-right"></i>
            </a>
          </li>
        </ul>
      </li>

      <li class="purple dropdown-modal">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="true">
          <i class="ace-icon fa fa-bell"></i>
          <span class="badge badge-important">8</span>
        </a>
        <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
          <li class="dropdown-header">
            <i class="ace-icon fa fa-exclamation-triangle"></i>
            8 Notifications
          </li>
          <li class="dropdown-content ace-scroll" style="position: relative;"><div class="scroll-track" style="display: none;"><div class="scroll-bar"></div></div><div class="scroll-content" style="">
            <ul class="dropdown-menu dropdown-navbar navbar-pink">
              <li>
                <a href="#">
                  <div class="clearfix">
                    <span class="pull-left">
                      <i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
                      New Comments
                    </span>
                    <span class="pull-right badge badge-info">+12</span>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="btn btn-xs btn-primary fa fa-user"></i>
                  Bob just signed up as an editor ...
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="clearfix">
                    <span class="pull-left">
                      <i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
                      New Orders
                    </span>
                    <span class="pull-right badge badge-success">+8</span>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="clearfix">
                    <span class="pull-left">
                      <i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
                      Followers
                    </span>
                    <span class="pull-right badge badge-info">+11</span>
                  </div>
                </a>
              </li>
            </ul>
          </div></li>
          <li class="dropdown-footer">
            <a href="#">
              See all notifications
              <i class="ace-icon fa fa-arrow-right"></i>
            </a>
          </li>
        </ul>
      </li>

      <li class="green dropdown-modal">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
          <i class="ace-icon fa fa-envelope"></i>
          <span class="badge badge-success">5</span>
        </a>
        <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
          <li class="dropdown-header">
            <i class="ace-icon fa fa-envelope-o"></i>
            5 Messages
          </li>
          <li class="dropdown-content ace-scroll" style="position: relative;"><div class="scroll-track" style="display: block; height: 200px;"><div class="scroll-bar" style="height: 111px; top: 0px;"></div></div><div class="scroll-content" style="max-height: 200px;">
            <ul class="dropdown-menu dropdown-navbar">
              <li>
                <a href="#" class="clearfix">
                  <img src="{{asset('cpanel/images/avatars/avatar.png')}}" class="msg-photo" alt="Alex's Avatar">
                  <span class="msg-body">
                    <span class="msg-title">
                      <span class="blue">Alex:</span>
                      Ciao sociis natoque penatibus et auctor ...
                    </span>

                    <span class="msg-time">
                      <i class="ace-icon fa fa-clock-o"></i>
                      <span>a moment ago</span>
                    </span>
                  </span>
                </a>
              </li>
              <li>
                <a href="#" class="clearfix">
                  <img src="{{asset('cpanel/images/avatars/avatar3.png')}}" class="msg-photo" alt="Susan's Avatar">
                  <span class="msg-body">
                    <span class="msg-title">
                      <span class="blue">Susan:</span>
                      Vestibulum id ligula porta felis euismod ...
                    </span>

                    <span class="msg-time">
                      <i class="ace-icon fa fa-clock-o"></i>
                      <span>20 minutes ago</span>
                    </span>
                  </span>
                </a>
              </li>
              <li>
                <a href="#" class="clearfix">
                  <img src="{{asset('cpanel/images/avatars/avatar4.png')}}" class="msg-photo" alt="Bob's Avatar">
                  <span class="msg-body">
                    <span class="msg-title">
                      <span class="blue">Bob:</span>
                      Nullam quis risus eget urna mollis ornare ...
                    </span>

                    <span class="msg-time">
                      <i class="ace-icon fa fa-clock-o"></i>
                      <span>3:15 pm</span>
                    </span>
                  </span>
                </a>
              </li>
              <li>
                <a href="#" class="clearfix">
                  <img src="{{asset('cpanel/images/avatars/avatar2.png')}}" class="msg-photo" alt="Kate's Avatar">
                  <span class="msg-body">
                    <span class="msg-title">
                      <span class="blue">Kate:</span>
                      Ciao sociis natoque eget urna mollis ornare ...
                    </span>
                    <span class="msg-time">
                      <i class="ace-icon fa fa-clock-o"></i>
                      <span>1:33 pm</span>
                    </span>
                  </span>
                </a>
              </li>
              <li>
                <a href="#" class="clearfix">
                  <img src="{{asset('cpanel/images/avatars/avatar5.png')}}" class="msg-photo" alt="Fred's Avatar">
                  <span class="msg-body">
                    <span class="msg-title">
                      <span class="blue">Fred:</span>
                      Vestibulum id penatibus et auctor  ...
                    </span>
                    <span class="msg-time">
                      <i class="ace-icon fa fa-clock-o"></i>
                      <span>10:09 am</span>
                    </span>
                  </span>
                </a>
              </li>
            </ul>
          </div></li>
          <li class="dropdown-footer">
            <a href="inbox.html">
              See all messages
              <i class="ace-icon fa fa-arrow-right"></i>
            </a>
          </li>
        </ul>
      </li>

      {{-- user menu --}}
      <li class="dark dropdown-modal">
        <a data-toggle="dropdown" href="#" class="dropdown-toggle" aria-expanded="false">
          <img class="nav-user-photo" src="{{ auth()->user()->photo==''?asset('images/no-image.png'):asset('uploads/user/profile/'.auth()->user()->photo)}}" alt="Jason's Photo">
          <span class="user-info">
            <small>Welcome,</small>
            {{isset(auth()->user()->name_en)?auth()->user()->name_en:""}}
          </span>
          <i class="ace-icon fa fa-caret-down"></i>
        </a>
        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
          <li>
            <a href="#">
              <i class="ace-icon fa fa-cog"></i>
              Settings
            </a>
          </li>
          <li class="divider"></li>
          <li>
            <a href="{{-- route('admin.profile') --}}">
              <i class="ace-icon fa fa-user"></i>
              Profile
            </a>
          </li>
          <li class="divider"></li>
          <li>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="ace-icon fa fa-power-off"></i>
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div><!-- /.navbar-container -->

{{-- flag languages --}}
  <nav role="navigation" class="navbar-menu pull-right collapse navbar-collapse">
    <ul class="nav navbar-nav">
      {{-- @ability('super-admin', 'admin-control') --}}
        <li class="dark dropdown-modal user-min">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php  $flag = app()->getLocale(); ?>
            <img src="{{asset('images/flags/'.$flag.'.png')}}" class="img-flag" alt="" width="32" height="18">
            &nbsp;{{ strtoupper($flag) }}
          </a>
          <ul class="dropdown-menu dropdown-light-blue dropdown-caret">
            <li>
              <a href="{{ url('locale') }}/en">
                <img src="{{asset('images/flags/en.png')}}" class="img-flag" alt="" width="32" height="18">
                English
              </a>
            </li>
            <li>
              <a href="{{ url('locale') }}/km">
                <img src="{{asset('images/flags/km.png')}}" class="img-flag" alt="" width="32" height="18">
                Khmer
              </a>
            </li>
          </ul>
        </li>
      {{-- @endability --}}
    </ul>
  </nav>
