      <div class="header-top">
        <div class="container">
          <!-- nav-left -->
          <ul class="nav-left" >
            <li ><span><i class="fa fa-phone" aria-hidden="true"></i>00-62-658-658</span></li>
            <li ><span><i class="fa fa-envelope" aria-hidden="true"></i> Contact us today !</span></li>
            <li class="dropdown switcher  switcher-currency">
              <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle switcher-trigger"><span>USD</span> <i aria-hidden="true" class="fa fa-angle-down"></i></a>
              <ul class="dropdown-menu switcher-options ">
                <li class="switcher-option">
                  <a href="#">
                    <i class="fa fa-usd" aria-hidden="true"></i> USD
                  </a>
                </li>
                <li class="switcher-option">
                  <a href="#">
                    <i class="fa fa-eur" aria-hidden="true"></i> eur
                  </a>
                </li>
                <li class="switcher-option">
                  <a href="#">
                    <i class="fa fa-gbp" aria-hidden="true"></i> gbp
                  </a>
                </li>
              </ul>
            </li>
            <li class="dropdown switcher  switcher-language">
              <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle switcher-trigger" aria-expanded="false">
                <img class="switcher-flag" alt="flag" src="{{asset('assets/front/images/flags/flag_english.png')}}">
                <span>English</span> 
                <i aria-hidden="true" class="fa fa-angle-down"></i>
              </a>
              <ul class="dropdown-menu switcher-options ">
                <li class="switcher-option">
                  <a href="#">
                    <img class="switcher-flag" alt="flag" src="{{asset('assets/front/images/flags/flag_english.png')}}">English
                  </a>
                </li>
                <li class="switcher-option">
                  <a href="#">
                    <img class="switcher-flag" alt="flag" src="{{asset('assets/front/images/flags/flag_french.png')}}">French
                  </a>
                </li>
                <li class="switcher-option">
                  <a href="#">
                    <img class="switcher-flag" alt="flag" src="{{asset('assets/front/images/flags/flag_germany.png')}}">Germany
                  </a>
                </li>
              </ul>
            </li>
          </ul><!-- nav-left -->

          <!-- nav-right -->
          <ul class=" nav-right">
            <li class="dropdown setting">
              <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle "><span>My Account</span> <i aria-hidden="true" class="fa fa-angle-down"></i></a>
              <div class="dropdown-menu  ">
                <ul class="account">
                  <li><a href="#">Wishlist</a></li>
                  <li><a href="#">My Account</a></li>
                  <li><a href="#">Checkout</a></li>
                  <li><a href="#">Compare</a></li>
                  <li><a href="#">Login/Register</a></li>
                  <li><a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">Log Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                        </form>                          
                  </li>
                </ul>
              </div>
            </li>
            <li><a href="#" >Services</a></li>
            <li><a href="#">Support </a></li>
          </ul><!-- nav-right -->

        </div>
      </div>