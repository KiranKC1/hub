 <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

    <!-- navbar-fixed-top-->
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-light navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
            <li class="nav-item"><a href="" class="navbar-brand nav-link"><img alt="branding logo" src="" class="brand-logo"></a></li>
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5">         </i></a></li>
              <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon icon-expand2"></i></a></li>
            </ul>
            <ul class="nav navbar-nav float-xs-right">

              {{--  @if(Auth::user()->roles()->where('title', '=', 'Quotations')->exists())  --}} 
                <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown" class="nav-link nav-link-label" onclick="getUnseenQuote()"><i class="ficon icon-bell4"></i><span class="tag tag-pill tag-default tag-danger tag-default tag-up" id="qno1">{{ $mno }}</span></a>
                  <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                    <li class="dropdown-menu-header">
                      <h6 class="dropdown-header m-0"><span class="grey darken-2">Quotations</span><span class="notification-tag tag tag-default tag-danger float-xs-right m-0" id="qno2">{{ $mno }} New</span></h6>
                    </li>
                    <li class="list-group scrollable-container" id="Qnotis">
                      
                    </li>
                    <li class="dropdown-menu-footer"><a href="" class="dropdown-item text-muted text-xs-center">Read all new quotations</a></li>
                  </ul>
                </li>
              {{--  @endif
          
              @if(Auth::user()->roles()->where('title', '=', 'Contact Us Messages')->exists())  --}}
                <li class="dropdown dropdown-notification nav-item"><a href="#" onclick="getUnseenMsg()" data-toggle="dropdown" class="nav-link nav-link-label"><i class="ficon icon-mail6"></i><span class="tag tag-pill tag-default tag-info tag-default tag-up" id="mno1">{{ $mno }}</span></a>
                  <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                    <li class="dropdown-menu-header">
                      <h6 class="dropdown-header m-0"><span class="grey darken-2">Contact Us Messages</span><span class="notification-tag tag tag-default tag-info float-xs-right m-0" id="mno2">{{ $mno }} New</span></h6>
                    </li>
                    <li class="list-group scrollable-container" id="Mnotis">
                      
                    </li>
                    <li class="dropdown-menu-footer"><a href="{{ route('contact-us-messages.unseen') }}" class="dropdown-item text-muted text-xs-center">Read all new messages</a></li>
                  </ul>
                </li>
              
              
              <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="{{ route('asset2', ['img','avatar.png','png',30,30]) }}" alt="avatar"><i></i></span><span class="user-name" id="adminName">{{ Auth::guard('admin_user')->user()->name }}</span></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a href="{{ route('profile') }}" class="dropdown-item"><i class="icon-head"></i> Edit Profile</a>
                  <div class="dropdown-divider"></div>
                  <a href="{{ url('/admin/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">
                  <i class="icon-power3"></i> Logout</a>
                  <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- main menu-->
    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-light menu-accordion menu-shadow">
      
      <!-- main menu content-->
      <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
          <br>
        <li id="dashboard" class="nav-item "><a href="{{URL::to('admin/dashboard')}}"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Dashboard</span></a>
          </li>

        <li id="category" class="nav-item "><a href="{{URL::to('admin/categories')}}"><i class="icon-tree"></i><span data-i18n="nav.dash.main" class="menu-title">Manage Categories</span></a>
          </li>
      
          <li id="staffs" class="nav-item "><a href=""><i class="icon-android-contacts"></i><span data-i18n="nav.staffs.main" class="menu-title">Staffs</span></a>
          </li>

          <li id="albums" class="nav-item "><a href="{{ route('albums.index') }}"><i class="icon-image3"></i><span data-i18n="nav.albums.main" class="menu-title">Albums</span></a>
          </li>

          <li id="posts" class="nav-item "><a href="{{route('posts.index')}}"><i class="icon-list-alt"></i><span data-i18n="nav.albums.main" class="menu-title">Posts</span></a>
          </li>

          <li id="events" class="nav-item "><a href="{{route('events.index')}}"><i class="icon-calendar4"></i><span data-i18n="nav.events.main" class="menu-title">Events</span></a>
          </li>

          <li id="opportunities" class="nav-item "><a href="{{route('opportunities.index')}}"><i class="icon-bullhorn2"></i><span data-i18n="nav.opportunities.main" class="menu-title">Opportunities</span></a>
          </li>
        <li id="opportunities" class="nav-item "><a href="{{URL::to('admin/users/posts/verify')}}"><i class="icon-list-alt"></i><span data-i18n="nav.opportunities.main" class="menu-title">User Posts</span><span class="tag tag tag-primary tag-pill float-xs-right mr-2">{{$userposts}}</span></a>
          </li>

          <li id="newsletter" class="nav-item "><a href="{{ route('newsletter') }}"><i class="icon-mail6"></i><span data-i18n="nav.newsletter.main" class="menu-title">Newsletter</span></a>
          </li>

          <li id="testimonials" class="nav-item "><a href="{{ route('testimonials.index') }}"><i class="icon-commenting"></i><span data-i18n="nav.testimonials.main" class="menu-title">Testimonials</span></a>
          </li>

          <li id="contact-us-messages" class="nav-item "><a href="{{ route('contact-us-messages.index') }}"><i class="icon-at2"></i><span data-i18n="nav.contact-us-messages.main" class="menu-title">Contact Messages</span></a>
          </li>

          <li id="settings" class="nav-item "><a href="{{ route('admin.settings') }}"><i class="icon-gear"></i><span data-i18n="nav.settings.main" class="menu-title">Settings</span></a>
          </li>
        </ul>
      </div>
      <!-- /main menu content-->
      <!-- main menu footer-->
      <!-- include includes/menu-footer-->
      <!-- main menu footer-->
    </div>
    <!-- / main menu-->
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
          {{--  This is lazy validation. but if needed put it in that specifuc blade only  --}}
          {{--  @if (count($errors)>0 )
            <div class="alert alert-dismissible fade in mb-2">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" style="color:black">&times;</span>
              </button>
              <ul class="list-group">
                @foreach ($errors->all() as $error)
                  <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                @endforeach
              </ul>
            </div>	
          @endif  --}}