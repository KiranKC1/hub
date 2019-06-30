<style>  
@media screen and (min-width: 993px){
  #main_body { padding-top:50px;}
}
</style>
@if(Auth::User())
<style>
  @media screen and (max-width: 993px){
  #main_body { padding-top:176px; }   /* hide it elsewhere */
}
</style>
@else
<style>
@media screen and (max-width: 993px){
  #main_body { padding-top:118px; }   /* hide it elsewhere */
}
</style>
@endif

<body id="main_body">
  <div class="se-pre-con">
    {{-- <blockquote style="color:black;">Quotation blah blah blah<p>Joe Bloggs</p></blockquote> --}}
    </div>
  <main>
    <!-- Header -->
    <header id="js-header" class="u-header u-header--sticky-top u-header--show-hide u-header--toggle-section" data-header-fix-moment="100" data-header-fix-effect="slide">
      <!-- Top Bar -->
      <div class="text-center text-lg-left u-header__section u-header__section--light g-bg-white g-brd-bottom g-brd-gray-light-v4 g-py-5">
          <div class="container">
            <div class="row flex-lg-row align-items-center justify-content-lg-start">
              <div class="col-lg-2 g-mb-30 g-mb-0--lg">
                <!-- Logo -->
              <a href="{{URL::to('/')}}" class="navbar-brand">
                  <img src="{{asset('main-assets/assets/img/logo/logo-1.png')}}" alt="Image Description">
                </a>
                <!-- End Logo -->
              </div>
              @if(Auth::User())
              <div class="col-lg-6 g-mb-30 g-mb-0--lg">
                  <div class="col-auto g-px-15 w-100 g-width-auto--md">
                      <ul id="dropdown-megamenu" class="d-md-block collapse list-inline g-line-height-1 g-mx-minus-4 mb-0">
                        <li class="d-block d-md-inline-block g-mx-4">
                            <?php
                            $date = \Carbon\Carbon::now()->format('l, d F, Y');
                             ?>
                          <time datetime="2017-01-01">{{$date}}</time>
                        </li>
                        <li class="d-block g-hidden-md-down d-md-inline-block g-mx-4">|</li>
                        <li class="d-block d-md-inline-block g-mx-4">
                        <a href="{{URL::to('/')}}" class="g-color-black g-color-primary--hover g-text-underline--none--hover">HOME</a>
                        </li>
                        <li class="d-block g-hidden-md-down d-md-inline-block g-mx-4">|</li>
                        <li class="d-block d-md-inline-block g-mx-4">
                          <a href="{{URL::to('user/profile')}}" class="g-color-black g-color-primary--hover g-text-underline--none--hover">PROFILE</a>
                        </li>
                      </ul>
                    </div>
              </div>
  
              <div class="col-lg-4 g-mb-30 g-mb-0--lg">
                <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-end g-mx-minus-15 g-mt-minus-10">
                    <div class="u-basket d-inline-block g-valign-middle g-color-main g-mt-10 g-mx-10">
                        <a href="#!" class="g-color-gray-dark-v4 g-font-size-16 g-text-underline--none--hover g-valign-middle u-icon-v1 g-font-size-20 g-color-gray-light-v1 g-text-underline--none--hover g-width-25 g-height-15" aria-haspopup="true" aria-expanded="false" aria-controls="searchform-1" data-dropdown-target="#searchform-1" data-dropdown-type="css-animation" data-dropdown-duration="300" data-dropdown-animation-in="fadeInUp" data-dropdown-animation-out="fadeOutDown">
                            <i class="fa fa-search"></i>
                        </a>

                        <!-- Search Form -->
                        <form id="searchform-1" action="{{route('search.everything')}}" class="u-searchform-v1 u-dropdown--css-animation g-bg-white g-pa-10 g-mt-25--lg g-mt-15--lg--scrolling u-dropdown--hidden" style="animation-duration: 300ms; right: -15px;">
                            <div class="input-group g-brd-primary--focus">
                                <input class="form-control rounded-0 u-form-control" name="search" type="search" placeholder="Enter Your Search Here...">

                                <div class="input-group-addon p-0">
                                    <button class="btn rounded-0 btn-primary btn-md g-font-size-14 g-px-18" type="submit">Go</button>
                                </div>
                            </div>
                        </form>
                        <!-- End Search Form -->
                    </div>


                    <div class="u-basket d-inline-block g-valign-middle g-color-main g-mt-10 g-mx-10">
                    <a href="{{URL::to('user/profile#bookmarks')}}" id="notfication-drop-down" class="g-color-gray-dark-v4 g-font-size-16 g-text-underline--none--hover g-valign-middle u-icon-v1 g-font-size-20 g-color-gray-light-v1 g-text-underline--none--hover g-width-25 g-height-15">
                        <i class="et-icon-ribbon g-color-primary--hover"></i>
                        </a>
                      </div>
                      <div class="u-basket d-inline-block g-valign-middle g-color-main g-mt-10 g-mx-10">
                        <a href="#!" id="notfication-drop-down" class="g-color-gray-dark-v4 g-font-size-16 g-text-underline--none--hover g-valign-middle u-icon-v1 g-font-size-24 g-color-gray-light-v1 g-text-underline--none--hover g-width-30 g-height-20" aria-controls="basket-bar-9" aria-haspopup="true" aria-expanded="false" data-bage-info="12" data-dropdown-event="click" data-dropdown-target="#notification-drop"
                        data-dropdown-type="css-animation" data-dropdown-duration="300" data-dropdown-hide-on-scroll="false" data-dropdown-animation-in="fadeIn" data-dropdown-animation-out="fadeOut">
                        @if(count(auth()->user()->unreadNotifications) != null)
                      <span class="u-badge-v1 g-color-white g-bg-primary g-rounded-50x">{{count(auth()->user()->unreadNotifications)}}</span>
                      @endif
                        <i class="fa fa-bell-o g-color-primary--hover"></i>
                        </a>
                        <div id="notification-drop" class="u-basket__bar u-dropdown--css-animation u-dropdown--hidden g-brd-top g-brd-2 g-brd-primary g-color-main g-mt-20" aria-labelledby="basket-bar-invoker">
                          <div class="js-scrollbar g-height-220">
                            @foreach(auth()->user()->notifications as $notifications)
                            @if($notifications->type == "App\Notifications\HubNotification")
                          <a href=
                          "{{URL::to('home')}}"
                            class="u-link-v5 g-color-black g-color-primary--hover" target="_blank">
                          <div class="alert fade show g-brd-around g-brd-gray-light-v3 rounded-0" role="alert" style="margin-bottom:0px;">  
                            <div class="media">
                              <div class="d-flex g-mr-10">
                                <span class="u-icon-v3 u-icon-size--sm g-bg-lightred g-color-white g-rounded-50x">
                                  <i class="{{$notifications->data['message']['icon-class']}}"></i>
                                </span>
                              </div>
                              <div class="media-body ">
                                <div class="d-flex justify-content-between">
                                <p class="m-0"><strong>Welcome To EzHub</strong>
                                  </p>
                                  <span class="align-self-center small text-nowrap">{{$notifications->created_at->diffForHumans()}}</span>
                                </div>
                                <p class="m-0 g-font-size-12"> Click to find out more.</p>
                              </div>
                             </div>
                            </div>
                          </a>
                          @elseif($notifications->type=="App\Notifications\LikedPost")
                          <a href="{{URL::to('posts'.'/'.$notifications->data['post']['slug'])}}"
                          class="u-link-v5 g-color-black g-color-primary--hover" target="_blank">
                          <div class="alert fade show g-brd-around g-brd-gray-light-v3 rounded-0" role="alert" style="margin-bottom:0px;">  
                            <div class="media">
                              <div class="d-flex g-mr-10">
                                <span class="u-icon-v3 u-icon-size--sm g-bg-lightred g-color-white g-rounded-50x">
                                  <i class="{{$notifications->data['message']['icon-class']}}"></i>
                                </span>
                              </div>
                              <div class="media-body ">
                                <div class="d-flex justify-content-between">
                                  <p class="m-0"><strong>{{$notifications->data['user']['name']}}</strong>
                                  </p>
                                  <span class="align-self-center small text-nowrap">{{$notifications->created_at->diffForHumans()}}</span>
                                </div>
                                <p class="m-0 g-font-size-12"> {{$notifications->data['message']['title']}}</p>
                              </div>
                             </div>
                            </div>
                          </a>
                          @endif
                          @endforeach
                          </div>
                          
                        <div class="g-brd-top g-brd-gray-light-v4 g-pa-15 g-pb-20">
                          <div class="d-flex flex-row align-items-center justify-content-between g-font-size-12">
                            <a href="#!" class="btn btn-sm u-btn-outline-primary rounded-0 g-width-120">See All</a>
                            <a href="#!" class="btn btn-sm u-btn-outline-primary rounded-0 g-width-120">Mark All</a>
                          </div>
                        </div>
                        </div>
                      </div>
                      <!-- End Basket -->

                  <div class="g-px-15 g-pt-10">
                    <a href="#!" class="d-flex flex-row align-items-center text-center g-color-gray-dark-v4  g-text-underline--none--hover g-line-height-1_2">
                    <img class="g-width-40 g-height-40 g-rounded-50x g-mr-15" 
                    
                    @if(Auth::User()->photo == null)
                    src="{{asset('hub-images/users.png')}}"
                    @else
                    src="{{Auth::User()->picture}}"
                    @endif
                    aria-controls="basket-bar-9" aria-haspopup="true" aria-expanded="false" data-bage-info="12" data-dropdown-event="click" data-dropdown-target="#user-settings-drop"
                    data-dropdown-type="css-animation" data-dropdown-duration="300" data-dropdown-hide-on-scroll="false" data-dropdown-animation-in="fadeIn" data-dropdown-animation-out="fadeOut" alt="{{Auth::User()->name}}">
                                           
                      <div id="user-settings-drop" class="u-basket__bar u-dropdown--css-animation u-dropdown--hidden g-color-main" style="animation-duration: 300ms;width: 175px;" aria-labelledby="basket-bar-invoker">
                          <div class="dropdown-menu-center rounded-0 g-mt-10">
                              <a class="dropdown-item g-px-10" href="#!">
                                <i class="icon-layers g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> View Profile
                              </a>
                              <a class="dropdown-item g-px-10" href="#!">
                                <i class="icon-wallet g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Edit Profile
                              </a>
                              <a class="dropdown-item g-px-10" href="#!">
                                <i class="icon-fire g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Marked Notes
                              </a>
                              <a class="dropdown-item g-px-10" href="#!">
                                <i class="icon-settings g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> EZ-Drive
                              </a>
          
                              <div class="dropdown-divider"style="margin-bottom:0px; margin-top:0px;"></div>
          
                              <a class="dropdown-item g-pt-5 g-pb-5" onclick="event.preventDefault();document.getElementById('user-logout-form').submit();" href="{{ url('/logout') }}">
                                <i class="icon-plus g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Logout
                              </a>
                            
                              <form id="user-logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                              </form>
                            </div>
                      </div>
                    </a>
                  </div>
               
                </div>
              </div>
              @else()
              <div class="col-lg-6 g-mb-0 g-mb-0--lg">
                </div>
                <div class="col-lg-4 g-mb-0 g-mb-0--lg">
                  
                  <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-end g-mx-minus-15 g-mt-minus-10">
                      <div class="u-basket d-inline-block g-valign-middle g-color-main g-mt-10 g-mx-10">
                          <a href="#!" class="g-color-gray-dark-v4 g-font-size-16 g-text-underline--none--hover g-valign-middle u-icon-v1 g-font-size-20 g-color-gray-light-v1 g-text-underline--none--hover g-width-25 g-height-15" aria-haspopup="true" aria-expanded="false" aria-controls="searchform-1" data-dropdown-target="#searchform-1" data-dropdown-type="css-animation" data-dropdown-duration="300" data-dropdown-animation-in="fadeInUp" data-dropdown-animation-out="fadeOutDown">
                              <i class="fa fa-search"></i>
                          </a>

                          <!-- Search Form -->
                          <form id="searchform-1" action="{{route('search.everything')}}" class="u-searchform-v1 u-dropdown--css-animation g-bg-white g-pa-10 g-mt-25--lg g-mt-15--lg--scrolling u-dropdown--hidden" style="animation-duration: 300ms; right: -15px;">
                              <div class="input-group g-brd-primary--focus">
                                  <input class="form-control rounded-0 u-form-control" name="search" type="search" placeholder="Enter Your Search Here...">

                                  <div class="input-group-addon p-0">
                                      <button class="btn rounded-0 btn-primary btn-md g-font-size-14 g-px-18" type="submit">Go</button>
                                  </div>
                              </div>
                          </form>
                            </div>
                      <ul class="list-inline g-line-height-1  g-mx-minus-4 mb-0">
                          <li class="list-inline-item g-mx-4 g-mt-0">
                          <a class="g-color-black g-color-primary--hover g-text-underline--none--hover" href="{{URL::to('login')}}">Login
                              </a>
                          </li>
                          <li class="list-inline-item g-mx-4 g-mt-10">|</li>
                          <li class="list-inline-item g-mx-4 g-mt-10">
                          <a href="{{URL::to('register')}}" class="g-color-black g-color-primary--hover g-text-underline--none--hover">Register</a>
                          </li>
                        </ul>
                  </div>
                </div>
                @endif
           
            </div>
          </div>
        </div>
    </header>
    <!-- End Header -->


    
    