@extends('layouts.app')
@section('body')
@section('title','Profile')
<!-- Breadcrumb -->
<section class="g-my-30">
  <div class="container">
    <ul class="u-list-inline">
      <li class="list-inline-item g-mr-7">
        <a class="u-link-v5 g-color-main g-color-primary--hover" href="{{URL::to('home')}}">Home</a>
        <i class="fa fa-angle-right g-ml-7"></i>
      </li>
      <li class="list-inline-item g-color-primary">
        <span>Profile</span>
      </li>
    </ul>
  </div>
</section>
<!-- End Breadcrumb -->
<input type="hidden" id="csrf_token" value="{{csrf_token()}}"/>

<section class="g-mb-100">
  <div class="container">
    <div class="row">
      <!-- Profile Sidebar -->
      <div class="col-lg-3 g-mb-50 g-mb-0--lg">
        <!-- User Image -->
        <div class="u-block-hover g-pos-rel">
          <figure>
            <img class="img-fluid w-100 u-block-hover__main--zoom-v1"
          @if(Auth::User()->photo == null)
          src="{{asset('hub-images/users.png')}}" alt="{{Auth::User()->name}}">
          @else
          src="{{Auth::User()->photo}}"
            @endif
          </figure>

          <!-- Figure Caption -->
          <figcaption class="u-block-hover__additional g-pa-30">
            <div class="g-flex-middle">
            </div>
          </figcaption>
          <!-- End Figure Caption -->
          <figcaption class="u-block-hover__additional--fade g-bg-black-opacity-0_5 g-pa-30">
              <div class="u-block-hover__additional--fade u-block-hover__additional--fade-up g-flex-middle">
                <!-- Figure Social Icons -->
                <ul class="list-inline text-center g-flex-middle-item--bottom g-mb-20">
                  <li class="list-inline-item align-middle g-mx-7">
                    <a class="u-icon-v1 u-icon-size--md g-color-white" data-toggle="modal" data-target="#exampleModal" href="javascript:;">
                      <i class="icon-note u-line-icon-pro"></i>
                    </a>
                </li>

                </ul>
                <!-- End Figure Social Icons -->
              </div>
            </figcaption>
          <!-- User Info -->
          <span class="g-pos-abs g-top-20 g-left-0">
            <a class="btn btn-sm u-btn-primary rounded-0" href="#!" id="profilepicture_name">{{Auth::User()->name}}</a>
            @if(Auth::User()->position != null)
            <small class="d-block g-bg-black g-color-white g-pa-5">{{Auth::User()->Position}}</small>
            @endif
          </span>
          <!-- End User Info -->
        </div>
        <!-- User Image -->

        <!-- Sidebar Navigation -->
        <div class="list-group list-group-border-0 g-mb-40">


          <!-- Profile -->
          <a data-toggle="tab" href="#profile" role="tab" class="list-group-item justify-content-between active">
            <span>
              <i class="icon-cursor g-pos-rel g-top-1 g-mr-8"></i> Profile</span>
          </a>
          <!-- End Profile -->

          <!-- Users Contacts -->
          <!-- End Users Contacts -->
          <a data-toggle="tab" href="#my-articles" id="myarticles" role="tab" class="list-group-item list-group-item-action justify-content-between">
              <span>
                <i class="icon-education-007 u-line-icon-pro g-pos-rel g-top-1 g-mr-8"></i> My articles</span>
                @if(count($verified) != null)
              <span class="u-label g-font-size-11 g-bg-pink g-rounded-20 g-px-8" id="count-my-articles">{{count($verified)}}</span>
              @endif
            </a>
          <!-- articles -->
          <a data-toggle="tab" href="#saved-articles" role="tab" id="bookmarks" class="list-group-item list-group-item-action justify-content-between">
            <span>
              <i class="fa fa-bookmark u-line-icon-pro g-pos-rel g-top-1 g-mr-8"></i> Bookmarks</span>
              @if(count($posts) != null)
            <span class="u-label g-font-size-11 g-bg-pink g-rounded-20 g-px-8" id="counttab">{{count($posts)}}</span>
            @endif
          </a>
          <!-- End articles -->
          <!-- My Projects -->
          <a data-toggle="tab" href="#saved-opportunities" role="tab" class="list-group-item list-group-item-action justify-content-between">
            <span>
              <i class="icon-education-123 u-line-icon-pro g-pos-rel g-top-1 g-mr-8"></i> Saved Opportunities</span>
              @if(count($opportunities) != null)
              <span class="u-label g-font-size-11 g-bg-pink g-rounded-20 g-px-8" id="count-opportunities-tab">{{count($opportunities)}}</span>
              @endif
          </a>
          <!-- End My Projects -->
          <a data-toggle="tab" href="#saved-events" role="tab" class="list-group-item list-group-item-action justify-content-between">
            <span>
              <i class="icon-communication-011 u-line-icon-pro g-pos-rel g-top-1 g-mr-8"></i> Saved Events</span>
              @if(count($events) != null)
              <span class="u-label g-font-size-11 g-bg-pink g-rounded-20 g-px-8" id="count-event-box">{{count($events)}}</span>
              @endif
          </a>

          <a data-toggle="tab" href="#hub-settings" role="tab" class="list-group-item list-group-item-action justify-content-between">
              <span>
                <i class="icon-settings g-pos-rel g-top-1 g-mr-8"></i> Settings</span>
            </a>

        </div>
        <!-- End Sidebar Navigation -->


        <!-- End Project Progress -->
      </div>
      <!-- End Profile Sidebar -->

      <!-- Profle Content -->
      <div class="col-lg-9">
        {{-- Start Profile --}}
        <div id="nav-1-2-primary-hor-justified" class="tab-content">
          <div class="tab-pane fade show active" id="profile" role="tabpanel">
            <div class="g-brd-around g-brd-gray-light-v4 g-pa-20 g-mb-40">
              <div class="row">
                <div style="padding-right:20px;padding-left: 20px;">
                  <!-- User Details -->
                  <div class="d-flex align-items-center justify-content-sm-between g-mb-5">
                  <h2 class="g-font-weight-300 g-mr-10" id="profilecard_name">{{Auth::User()->name}}</h2>
                  </div>
                  <!-- End User Details -->

                  <!-- User Position -->
                  <h4 class="h6 g-font-weight-300 g-mb-10">
                    <i class="fa fa-envelope-o g-pos-rel g-top-1 g-mr-5 g-color-gray-dark-v5"></i> {{Auth::User()->email}}
                  </h4>
                  <!-- End User Position -->

                  <hr class="g-brd-gray-light-v4 g-my-20">

                <p class="lead g-line-height-1_8">{{Auth::User()->about}}</p>
                </div>
              </div>
            </div>
            <!-- End User Block -->
          </div>
          {{-- End Profile --}} 
          {{-- Settings --}}
          <div class="tab-pane fade" id="hub-settings" role="tabpanel">
            <!-- Profle Content -->
            <div class="col-lg-12">
                  <h2 class="h4 g-font-weight-300">Manage your Name, ID and Email Addresses</h2>
                  <p>Below are name, email addresse, contacts and more on file for your account.</p>

                  <ul class="list-unstyled g-mb-30">
                    <!-- Name -->
                    <li id="name" class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                        <div class="g-pr-10">
                          <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Name</strong>
                        <span class="align-top" id="user_name">{{Auth::User()->name}}</span>
                        </div>
                        <span>
                          <i id="editname" class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                          <i hidden id="remove-edit-name" class="fa fa-close g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                        </span>
                    </li>
                    <!-- End Name -->
                    {{-- Edit Name --}}
                    <li hidden id="editname-box" class="g-brd-bottom g-brd-gray-light-v4" style="padding-top:15px;">
                    <div class="form-group row"  >
                        <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-left g-mb-10"></label>
                      <div class="col-sm-9" style="padding-right:0px; padding-left:0px;">
                        <div class="input-group g-brd-primary--focus" style="transition: all 0.5s ease-in-out; animation-iteration-count: 1;">
                            <input type="text"  id="edit_username" class="form-control rounded-0 form-control-md" placeholder="Your Name">
                            <span class="input-group-btn">
                              <button class="btn btn-md u-btn-cyan rounded-0" id="edit_username_button"> <i hidden id="editname_spinner" class="fa fa-spinner fa-spin"></i><i id="editname_check" class="icon-pencil"></i>
                              </button>    
                             </span>   
                        </div>
                      </div>
                    </div>
                  </li>
                    {{-- end edit name --}}
                    <!-- Company Name -->
                    <li id="edit_institution" {{Auth::User()->institution == null ? 'hidden':''}} class="align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15" style="display:flex">
                    <div class="g-pr-10">
                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Company name</strong>
                        <span class="align-top" id="user_institution">{{Auth::User()->institution}}</span>
                      </div>
                      <span>
                        <i id="edit_institution_button" class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                          <i hidden id="remove-edit-institution" class="fa fa-close g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span>
                    </li>

                    {{-- Edit Institution --}}
                    <li hidden id="editinstitution-box" class="g-brd-bottom g-brd-gray-light-v4" style="padding-top:15px;">
                      <div class="form-group row"  >
                          <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-left g-mb-10"></label>
                        <div class="col-sm-9" style="padding-right:0px; padding-left:0px;">
                          <div class="input-group g-brd-primary--focus" style="transition: all 0.5s ease-in-out; animation-iteration-count: 1;">
                              <input type="text"  id="editinstitution_field" class="form-control rounded-0 form-control-md" value="" placeholder="Name of the Institution you currently are in">
                              <span class="input-group-btn">
                                <button class="btn btn-md u-btn-cyan rounded-0" id="editinstitution_button"> 
                                <i hidden id="editinstitution_spinner" class="fa fa-spinner fa-spin"></i><i id="editinstitution_check" class="icon-pencil"></i>
                                </button>    
                               </span>   
                          </div>
                        </div>
                      </div>
                    </li>
                    {{-- end edit institution --}}
                    
                    <li {{Auth::User()->institution != null ? 'hidden':''}} id="addinstitution" class="g-brd-bottom g-brd-gray-light-v4" style="padding-top:15px;">
                    <div class="form-group row"  >
                      <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-left g-mb-10">Company Name</label>
                      <div class="col-sm-9" style="padding-right:0px; padding-left:0px;">
                        <div class="input-group g-brd-primary--focus" style="transition: all 0.5s ease-in-out; animation-iteration-count: 1;">
                          <input type="text"  id="institution_add" class="form-control rounded-0 form-control-md" placeholder="Name of the Institution you currently are in">
                          <span class="input-group-btn">
                            <button id="institution_add_button" class="btn btn-md u-btn-cyan rounded-0" type="button"><i hidden id="addinstitution_spinner" class="fa fa-spinner fa-spin"></i><i id="addinstitution_check" class="fa fa-check"></i></button>
                          </span>
                        </div>
                      </div>
                  </div>
                </li>

                    <!-- End Company Name -->
                    <!-- Position -->
                  
                    <li {{Auth::User()->position == null ? 'hidden':''}} class="align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15" style="display:flex;">
                      <div class="g-pr-10">
                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Position</strong>
                        <span class="align-top">{{Auth::User()->position}}</span>
                      </div>
                      <span>
                        <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span>
                    </li>
                  
                    <li {{Auth::User()->postition != null ? 'hidden':''}} class="g-brd-bottom g-brd-gray-light-v4" style="padding-top:15px;">
                    <div id="editposition-box" class="form-group row"  >
                      <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-left g-mb-10">Position</label>
                    <div class="col-sm-9" style="padding-right:0px; padding-left:0px;">
                      <div class="input-group g-brd-primary--focus" style="transition: all 0.5s ease-in-out; animation-iteration-count: 1;">
                          <input type="text"  id="edit_position" class="form-control rounded-0 form-control-md" placeholder="example: Student, Teacher, Project Manager">
                          <span class="input-group-btn">
                            <button class="btn btn-md u-btn-cyan rounded-0" type="button"><i class="fa fa-check"></i></button>
                          </span>
                      </div>
                    </div>
                  </div>
                </li>
                    <!-- End Position -->

                    <!-- Primary Email Address -->
                    <li class="align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                      <div class="g-pr-10">
                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Primary email address</strong>
                      <span class="align-top">{{Auth::User()->email}}</span>
                      </div>
                    </li>
                    <!-- End Primary Email Address -->

                    <!-- Website -->
                   
                    <li {{Auth::User()->slug == null ? 'hidden':''}} class="align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15" style="display:flex;">
                      <div class="g-pr-10">
                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Username</strong>
                        <span class="align-top">{{Auth::User()->slug}}</span>
                      </div>
                      <span>
                        <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span>
                    </li>
                 
                    <li {{Auth::User()->slug != null ? 'hidden':''}} class="g-brd-bottom g-brd-gray-light-v4" style="padding-top:15px;">
                    <div id="editwebsite-box" class="form-group row"  >
                      <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-left g-mb-10">Website-Link</label>
                    <div class="col-sm-9" style="padding-right:0px; padding-left:0px;">
                      <div class="input-group g-brd-primary--focus" style="transition: all 0.5s ease-in-out; animation-iteration-count: 1;">
                          <input type="text"  id="edit_website" class="form-control rounded-0 form-control-md" placeholder="any web-link which makes you understand well">
                          <span class="input-group-btn">
                            <button class="btn btn-md u-btn-cyan rounded-0" type="button"><i class="fa fa-check"></i></button>
                          </span>
                      </div>
                    </div>
                  </div>
                </li>
                  
                    <!-- End Website -->
                    <!-- Phone Number -->
            
                    <li {{Auth::User()->contact ==  null ? 'hidden':''}} class="align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15" style="display:flex;">
                      <div class="g-pr-10">
                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Contact Number</strong>
                        <span class="align-top">{{Auth::User()->contact}}</span>
                      </div>
                      <span>
                        <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span>
                    </li>
                    
                    <li {{Auth::User()->contact != null ? 'hidden':''}} class="g-brd-bottom g-brd-gray-light-v4" style="padding-top:15px;">
                    <div id="editcontact-box" class="form-group row"  >
                      <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-left g-mb-10">Contact number</label>
                    <div class="col-sm-9" style="padding-right:0px; padding-left:0px;">
                      <div class="input-group g-brd-primary--focus" style="transition: all 0.5s ease-in-out; animation-iteration-count: 1;">
                          <input type="text"  id="edit_contact" class="form-control rounded-0 form-control-md" placeholder="Contact Number">
                          <span class="input-group-btn">
                            <button class="btn btn-md u-btn-cyan rounded-0" type="button"><i class="fa fa-check"></i></button>
                          </span>
                      </div>
                    </div>
                  </div>
                </li>
                 <!-- End Phone Number -->
                    <!-- Address -->
                    <li {{Auth::User()->about == null ? 'hidden':''}} class="align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15" style="display:flex;">
                      <div class="g-pr-10">
                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">About</strong>
                        <span class="align-top">{{Auth::User()->about}}</span>
                      </div>
                      <span>
                        <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span>
                    </li>
                    <li {{Auth::User()->about != null ? 'hidden':''}} class="g-brd-bottom g-brd-gray-light-v4" style="padding-top:15px;">
                    <div id="editwebsite-box" class="form-group row"  >
                      <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-left g-mb-10">About</label>
                    <div class="col-sm-9" style="padding-right:0px; padding-left:0px;">
                      <div class="input-group g-brd-primary--focus" style="transition: all 0.5s ease-in-out; animation-iteration-count: 1;">
                          <textarea id="edit_about" class="form-control rounded-0 form-control-md" placeholder="Write about yourself"></textarea>
                          <span class="input-group-btn">
                            <button class="btn btn-md u-btn-cyan rounded-0" type="button"><i class="fa fa-check"></i></button>
                          </span>
                      </div>
                    </div>
                  </div>
                </li>
                    <!-- End Address -->
                  </ul>
                
                </div>
                <!-- End Edit Profile -->
              </div>
          {{-- endsettings --}}
          {{-- My Articles --}}
          <div class="tab-pane fade" id="my-articles" role="tabpanel">
              <div class="col-lg-12">
                <!-- Verified articles Panel -->
                @if(count($verified) != 0 )  
                  <div class="card border-0 g-mb-40">
                    <!-- Panel Header -->
                    <div class="card-header d-flex align-items-center justify-content-between g-bg-gray-light-v5 border-0 g-mb-15">
                      <h3 class="h6 mb-0">
                        <i class="icon-layers g-pos-rel g-top-1 g-mr-5"></i> My Articles
                      <span class="u-label g-font-size-11 g-bg-pink g-rounded-20 g-px-8" id="countbox">{{count($verified)}}</span>
                      </h3>
                    </div>
                    <!-- End Panel Header -->
    
                    <!-- Panel Body -->
                    <div class="js-scrollbar card-block u-info-v1-1 g-bg-white-gradient-v1--after 
                    @if(count($verified) == 0 || count($verified)== 1 )
                    g-height-300
                    @elseif(count($verified) == 2)
                    g-height-400
                    @else
                    g-height-600
                    @endif
                    g-pa-0" >
                      
                    <div class="my-verified-articles-window">
                      
                      @foreach($verified as $p)
                    <input type="hidden" id="articlename{{$p->id}}" value="{{$p->title}}"/>
                    <article class="g-mb-30" >
                        <div class="g-mb-0" style="padding-left:20px; padding-right:20px;">
                        <span class="d-block g-color-gray-dark-v4 g-font-weight-700 g-font-size-12 text-uppercase mb-2"><i class="icon-clock5"></i> {{$p->created_at->diffForHumans()}}</span>
                            <div class="row">
                            <div class="col-md-12" style="padding-bottom: 0px;">
                          <h2 class="h4 g-color-black g-font-weight-600 mb-3">
                          <a class="u-link-v5 g-color-black g-color-primary--hover" href="{{URL::to('posts'.'/'.$p->slug)}}">{{$p->title}}</a>
                            </h2>
                            <div class="row">
                              <div class="@if($p->featured_image != null) col-md-10 @else col-md-12 @endif">  
                                <p class="g-color-gray-dark-v4 g-line-height-1_8">{{str_limit(strip_tags($p->description),250)}}</p>
                              </div>
                              @if($p->featured_image != null)
                              <div class="col-md-2">
                                  <img class="img-fluid img-thumbnail" src="{{asset('hub-images/posts-images'.'/'.$p->featured_image)}}" alt="Image Description">
                              </div>
                              @endif
                            </div>
                            
                          <div class="row">
                              <?php
                              $counttags=count($p->tags);
                              ?>
                              @if($counttags != 0)
                                @foreach($p->tags as $tag)
                                <li class="list-inline-item g-mb-10">
                                <a class="u-tags-v1 g-color-gray-dark-v4 g-color-white--hover g-bg-gray-light-v5 g-bg-primary--hover g-font-size-12 g-rounded-50 g-py-4 g-px-15" href="{{URL::to('posts/tags'.'/'.$tag->name)}}"><i class="fa fa-tag mr-1" target="_blank"></i> {{$tag->name}}</a>
                                </li>
                                @endforeach
                              @endif
                          </div>
                        <a class="g-font-size-13" href="#">View Article</a>
                        </div>
                        
                       
                      </div>
                      <ul class="list-inline g-brd-y g-brd-gray-light-v3 g-font-size-13 g-py-13 mb-0">
                          <li class="list-inline-item g-color-gray-dark-v4 mr-2">
                            <span class="d-inline-block g-color-gray-dark-v4">
                             
                            <img class="g-g-width-40 g-height-40 rounded-circle mr-2" src="{{asset('hub-images/users-images'.'/'.Auth::User()->picture)}}" alt="{{$p->author}}">
                                {{$p->author}}
                              </span>
                          </li> 
                      {{-- @else --}}
                      <li class="list-inline-item pull-center" style="margin-left:20px;">
                      <a id="likearticle{{$p->id}}" 
                        @if(!in_array($p->id,$likes))
                        cid="like"
                        @else
                        cid="liked"
                        @endif
                        class="g-color-primary-dark-v5 g-color-gray--hover g-font-size-default g-transition-0_3 g-text-underline--none--hover" href="javascript:;">
                      <i  {{in_array($p->id,$likes)?'hidden':''}} id="like{{$p->id}}" class="align-middle mr-1 fa fa-thumbs-o-up" style="font-size:30px;"></i>
                      <i  {{!in_array($p->id,$likes)?'hidden':''}} id="unlike{{$p->id}}" class="align-middle mr-1 fa fa-thumbs-up u-line-icon-pro" style="font-size:30px;"></i>
                        </a>
                        <span id="countlike{{$p->id}}" class="g-color-gray-dark-v5">{{$p->likeusers()->count()}}</span>
              
                        @if($p->likeusers()->count() > 1)
                        <span class="g-color-gray-dark-v5"> likes</span>
                          @else
                        <span class="g-color-gray-dark-v5"> like</span>
                        @endif
                      </li>         
                    </ul>
                      
                      </article>
                      @endforeach  
                    </div>
              
                    </div>
                    <!-- End Panel Body -->
                  </div>
                  @else
                  <section class="g-bg-white g-color-primary g-pa-30 g-mb-20">
                    <div class="d-md-flex justify-content-md-center text-center">
                      <div class="align-self-md-center">
                          <a href="{{URL::to('user/post/article')}}"  class="btn btn-md u-btn-primary u-btn-hover-v1-4 g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50 g-mr-10 g-mb-15">
                            <i class="fa fa-check-circle g-mr-3"></i>
                            Write Article
                          </a>
                      </div>
                    </div>
                  </section>
                  @endif
                  <!-- End verified Panel -->
                </div>
                @if(count($unverified) != null)
            <div class="col-lg-12">
              <!-- awating verification Panel -->
              <div class="card border-0 g-mb-40">
                <!-- Panel Header -->
                <div class="card-header d-flex align-items-center justify-content-between g-bg-gray-light-v5 border-0 g-mb-15">
                  <h3 class="h6 mb-0">
                    <i class="icon-layers g-pos-rel g-top-1 g-mr-5"></i> Awaiting verification
                  <span class="u-label g-font-size-11 g-bg-pink g-rounded-20 g-px-8" id="countbox">{{count($unverified)}}</span>
                  </h3>
                </div>
                <!-- End Panel Header -->

                <!-- Panel Body -->
                <div class="js-scrollbar card-block u-info-v1-1 g-bg-white-gradient-v1--after g-height-600 g-pa-0" >
                  
                <div class="my-articles-window">
                  
                  @if(count($unverified) != 0 )  
                  @foreach($unverified as $p)
                <input type="hidden" id="articlename{{$p->id}}" value="{{$p->title}}"/>
                <article class="g-mb-30" >
                    <div class="g-mb-0" style="padding-left:20px; padding-right:20px;">
                    <span class="d-block g-color-gray-dark-v4 g-font-weight-700 g-font-size-12 text-uppercase mb-2"><i class="icon-clock5"></i> {{$p->created_at->diffForHumans()}}</span>
                                <div class="row"  id="MoreDiv20">
                        <div class="col-md-12" style="padding-bottom: 0px;">
                      <h2 class="h4 g-color-black g-font-weight-600 mb-3">
                      <a class="u-link-v5 g-color-black g-color-primary--hover" href="#!">{{$p->title}}</a>
                        </h2>
                        <div class="row">
                          <div class="@if($p->featured_image) col-md-10 @else col-md-12 @endif">  
                            <p class="g-color-gray-dark-v4 g-line-height-1_8">{{str_limit(strip_tags($p->description),300)}}</p>
                          </div>
                          @if($p->featured_image != null)
                          <div class="col-md-2">
                              <img class="img-fluid img-thumbnail" src="{{asset('hub-images/user-posts-images'.'/'.$p->featured_image)}}" alt="Image Description">
                          </div>
                          @endif
                        </div>
                        
                      <div class="row">
                          <?php
                          $counttags=count($p->tags);
                          ?>
                          @if($counttags != 0)
                            @foreach($p->tags as $tag)
                            <li class="list-inline-item g-mb-10">
                            <a class="u-tags-v1 g-color-gray-dark-v4 g-color-white--hover g-bg-gray-light-v5 g-bg-primary--hover g-font-size-12 g-rounded-50 g-py-4 g-px-15" href="{{URL::to('posts/tags'.'/'.$tag->name)}}"><i class="fa fa-tag mr-1" target="_blank"></i> {{$tag->name}}</a>
                            </li>
                            @endforeach
                          @endif
                      </div>
                    <a class="g-font-size-13" href="#">View Article</a>
                    </div>
                    
                   
                  </div>
                  </article>
                  @endforeach
                  @else
                  <section class="g-bg-white g-color-primary g-pa-30 g-mb-20">
                    <div class="d-md-flex justify-content-md-center text-center">
                      <div class="align-self-md-center">
                        <p class="lead g-font-weight-400 g-mr-20--md g-mb-15 g-mb-0--md"><i class="fa fa-info-circle"></i> No Articles Posted</p>
                      </div>
                      <div class="align-self-md-center">
                      <a class="btn btn-lg u-btn-primary text-uppercase g-font-weight-600 g-font-size-12" target="_blank" href="{{URL::to('/user/post/article')}}">Write Article</a>
                      </div>
                    </div>
                  </section>
                  @if($recentposts != null)
                  <!-- Related Articles -->
                  <div class="g-mb-40">
                    <div class="u-heading-v3-1 g-mb-30">
                      <h2 class="h5 u-heading-v3__title g-color-gray-dark-v1 text-uppercase g-brd-primary">Recent Articles</h2>
                    </div>
      
                    <div class="row">
                      @foreach($recentposts as $p)
                      <!-- Article Video -->
                      <div class="col-lg-4 col-sm-6 g-mb-30">
                        <article>
                          <figure class="u-shadow-v25 g-pos-rel g-mb-20">
                          <img class="img-fluid w-100" src="{{asset('hub-images/posts-images'.'/'.$p->featured_image)}}" alt="{{$p->title}}">
      
                            <figcaption class="g-pos-abs g-top-10 g-left-10">
                            <a class="btn btn-xs u-btn-blue text-uppercase rounded-0" href="{{URL::to('posts'.'/'.$p->slug)}}">{{$p->name}}</a>
                            </figcaption>
                          </figure>
      
                          <h3 class="g-font-size-16 g-mb-10">
                          <a class="u-link-v5 g-color-gray-dark-v1 g-color-primary--hover" href="{{URL::to('posts'.'/'.$p->slug)}}">{{str_limit(strip_tags($p->title),60)}}</a>
                          </h3>
                        </article>
                      </div>
                    
                      <!-- End Article Video -->
                      @endforeach
                      
                    </div>
                  </div>
                  @endif
                  @endif
                </div>
          
                </div>
                <!-- End Panel Body -->
              </div>
              <!-- End Latest Projects Panel -->


            </div>
            @endif
            <!-- End Activities Panel -->
          </div>
          {{-- End Saved Articles --}}
           {{-- Saved Articles --}}
           <div class="tab-pane fade" id="saved-articles" role="tabpanel">
              <div class="col-lg-12">
                <!-- Latest Projects Panel -->
                <div class="card border-0 g-mb-40">
                  <!-- Panel Header -->
                  <div class="card-header d-flex align-items-center justify-content-between g-bg-gray-light-v5 border-0 g-mb-15">
                    <h3 class="h6 mb-0">
                      <i class="icon-layers g-pos-rel g-top-1 g-mr-5"></i> Saved Posts
                    <span class="u-label g-font-size-11 g-bg-pink g-rounded-20 g-px-8" id="countbox">{{count($posts)}}</span>
                    </h3>
                  </div>
                  <!-- End Panel Header -->
                  <!-- Panel Body -->
                  <div class="js-scrollbar card-block u-info-v1-1 g-bg-white-gradient-v1--after g-height-600 g-pa-0" >
                    
                  <div class="saved-posts-window">
                    
                    @if(count($posts) != 0)  
                    @foreach($posts as $p)
                  <input type="hidden" id="articlename{{$p->id}}" value="{{$p->title}}"/>
                  <article class="g-mb-30" >
                      <div class="g-mb-0" style="padding-left:20px; padding-right:20px;">
                      <span class="d-block g-color-gray-dark-v4 g-font-weight-700 g-font-size-12 text-uppercase mb-2"><i class="icon-clock5"></i> {{$p->created_at->diffForHumans()}}</span>
                          <div class="row">
                          <div class="@if($p->featured_image != null)col-md-8 @else col-md-12 @endif" style="padding-bottom: 0px;">
                        <h2 class="h4 g-color-black g-font-weight-600 mb-3">
                        <a class="u-link-v5 g-color-black g-color-primary--hover" href="#!">{{$p->title}}</a>
                          </h2>
                          <p class="g-color-gray-dark-v4 g-line-height-1_8">{{str_limit(strip_tags($p->description),300)}}</p>
                        <div class="row">
                            <?php
                            $counttags=count($p->tags);
                            ?>
                            @if($counttags != 0)
                              @foreach($p->tags as $tag)
                              <li class="list-inline-item g-mb-10">
                              <a class="u-tags-v1 g-color-gray-dark-v4 g-color-white--hover g-bg-gray-light-v5 g-bg-primary--hover g-font-size-12 g-rounded-50 g-py-4 g-px-15" href="{{URL::to('posts/tags'.'/'.$tag->name)}}"><i class="fa fa-tag mr-1" target="_blank"></i> {{$tag->name}}</a>
                              </li>
                              @endforeach
                            @endif
                        </div>
                        <a class="g-font-size-13" href="#!">View Article</a>
                      </div>
                      @if($p->featured_image != null)
                      <div class="col-md-4" style="padding-bottom:25px;" >
                      <img class="img-fluid img-thumbnail" src="{{asset('hub-images/posts-images'.'/'.$p->featured_image)}}" alt="{{$p->title}}">
                        </div>
                      @endif  
                    </div>
                              <ul class="list-inline g-brd-y g-brd-gray-light-v3 g-font-size-13 g-py-13 mb-0">
                                  <li class="list-inline-item g-color-gray-dark-v4 mr-2">
                                      <span class="d-inline-block g-color-gray-dark-v4">
                                        <?php
                                          $user_picture=$users->where('id','=',$p->user_id)->first();
                                          $picture=$user_picture['picture'];
                                        ?>
                                        @if($picture == 'users.png' || $picture == null)
                                      <img class="g-g-width-40 g-height-40 rounded-circle mr-2" src="{{asset('hub-images/users.png')}}" alt="{{$p->author}}">
                                      @else
                                      <img class="g-g-width-40 g-height-40 rounded-circle mr-2" src="{{asset('hub-images/users-images'.'/'.$picture)}}" alt="{{$p->author}}">
                                      @endif
                                          {{$p->author}}
                                        </span>
                                    </li>
                                    
                                   
                          <a hidden class="u-link-v5 g-color-main g-color-primary--hover hidden pull-right" id="article_spinner{{$p->id}}" style="margin-right:30px; margin-top:5px;">
                            <i class="fa fa-spinner fa-spin"></i>
                          </a>
                        <a class="u-link-v5 g-color-main g-color-primary--hover pull-right" href="javascript:;" style="padding-top:5px;" title="Unsave Article" id="unsavepost{{$p->id}}">
                          <i class="fa fa-bookmark-o g-color-red-dark-v5 g-mr-5" style="color:red;"></i> Remove Article
                        </a> 
                      </ul>
                     
                    </article>
                    @endforeach
                    @else
                    <section class="g-bg-white g-color-primary g-pa-30 g-mb-20">
                      <div class="d-md-flex justify-content-md-center text-center">
                        <div class="align-self-md-center">
                          <p class="lead g-font-weight-400 g-mr-20--md g-mb-15 g-mb-0--md"><i class="fa fa-info-circle"></i> No saved Articles</p>
                        </div>
                        <div class="align-self-md-center">
                        <a class="btn btn-lg u-btn-primary text-uppercase g-font-weight-600 g-font-size-12" target="_blank" href="{{URL::to('/home')}}">Show Articles</a>
                        </div>
                      </div>
                    </section>
                    @if($recentposts != null)
                    <!-- Related Articles -->
                    <div class="g-mb-40">
                      <div class="u-heading-v3-1 g-mb-30">
                        <h2 class="h5 u-heading-v3__title g-color-gray-dark-v1 text-uppercase g-brd-primary">Recent Articles</h2>
                      </div>
        
                      <div class="row">
                        @foreach($recentposts as $p)
                        <!-- Article Video -->
                        <div class="col-lg-4 col-sm-6 g-mb-30">
                          <article>
                            <figure class="u-shadow-v25 g-pos-rel g-mb-20">
                                <?php
                                $cat=$category->where('id','=',$p->category_id)->first();
                                $cat_image = $cat->category_image;
                                $cat_name=$cat->name;
                                ?>
                             @if($p->featured_image != null)   
                            <img class="img-fluid w-100" src="{{asset('hub-images/posts-images'.'/'.$p->featured_image)}}" alt="{{$p->title}}">
                              @else
                              <img class="img-fluid w-100" src="{{asset('hub-images/categories-images'.'/'.$cat_image)}}" alt="{{$p->title}}">
                              @endif
                              <figcaption class="g-pos-abs g-top-10 g-left-10">
                              <a class="btn btn-xs u-btn-blue text-uppercase rounded-0" href="{{URL::to('posts'.'/'.$p->slug)}}">{{$cat_name}}</a>
                              </figcaption>
                            </figure>
        
                            <h3 class="g-font-size-16 g-mb-10">
                            <a class="u-link-v5 g-color-gray-dark-v1 g-color-primary--hover" href="{{URL::to('posts'.'/'.$p->slug)}}">{{str_limit(strip_tags($p->title),60)}}</a>
                            </h3>
                          </article>
                        </div>
                      
                        <!-- End Article Video -->
                        @endforeach
                        
                      </div>
                    </div>
                    @endif
                    @endif
                  </div>
            
                  </div>
                  <!-- End Panel Body -->
                </div>
                <!-- End Latest Projects Panel -->
  
  
              </div>
              <!-- End Activities Panel -->
            </div>
            {{-- End My Articles --}}
          {{-- Saved opporutunities --}}
          <div class="tab-pane fade" id="saved-opportunities" role="tabpanel">
            <div class="col-lg-12">
              <!-- Latest Projects Panel -->
              <div class="card bor der-0 g-mb-40">
                <!-- Panel Header -->
                <div class="card-header d-flex align-items-center justify-content-between g-bg-gray-light-v5 border-0 g-mb-15">
                  <h3 class="h6 mb-0">
                    <i class="icon-layers g-pos-rel g-top-1 g-mr-5"></i> Saved Opportunities
                  <span id="count-opportunities-box" class="u-label g-font-size-11 g-bg-pink g-rounded-20 g-px-8">{{count($opportunities)}}</span>
                  </h3>
                </div>
                <!-- End Panel Header -->

                <!-- Panel Body -->
                <div class="js-scrollbar card-block u-info-v1-1 g-bg-white-gradient-v1--after g-height-610 g-pa-0">
                  <ul class="list-unstyled">
                      <div class="saved-opportunities-window">
                        @if(count($opportunities) != 0)
                    @foreach($opportunities as $s)
                      <input type="hidden" value="{{$s->title}}" id="opporname{{$s->id}}"/>
                    <div class="col-lg-12 g-mb-30 g-mb-0--lg">
                      <!-- Recent Jobs -->
                      
                      <article class="g-pa-15 u-shadow-v11 rounded" style="margin-bottom:25px;">
                        <h2 class="h4 g-mb-15">
                        <a class="u-link-v5 g-color-gray-dark-v1 g-color-primary--hover" href="{{URL::to('opportunities'.'/'.$s->slug)}}">{{$s->title}}</a>
                          </h2>
                          
                        <ul class="list-inline d-flex justify-content-between g-mb-15">
                          <li class="list-inline-item g-mr-20">
                              <i class="fa fa-briefcase"></i> <a class="u-link-v5 g-color-main g-color-primary--hover"> {{$s->organization}}</a>
                          </li>
                          <li class="list-inline-item">
                            <span class="js-rating d-block g-color-primary" data-rating="5"></span>
                          </li>
                        </ul>
                      
                     
                      <div>
                        <div class="col-md-3 pull-right">
                            <img class="img-fluid img-thumbnail" src="{{asset('hub-images/opportunities-images'.'/'.$s->featured_image)}}" alt="Image Description">
                          
                        </div> 
                        <div class="col-md-9"> 
                      <p class="g-mb-15">{!!str_limit(strip_tags($s->description),200
                          )!!}</p>
          
                        <ul class="list-unstyled">
                     
                          <li class="media g-mb-10">
                            <span class="d-block g-color-gray-dark-v5 g-width-110">
                                <i class="icon-calendar g-pos-rel g-top-1 g-mr-5"></i> Deadline:
                              </span>
                              @if($s->date !=null)
                            <span class="media-body">{{date('M,j Y',strtotime($s->date))}}</span>
                            @else
                            <span class="media-body">N/A</span>
                            @endif
                          </li>
                      
                          <li class="media">
                            <span class="d-block g-color-gray-dark-v5 g-width-110">
                                <i class="icon-location-pin g-pos-rel g-top-1 g-mr-5"></i> Location:
                              </span>
                              @if($s->location != null)
                            <span class="media-body">{{$s->location}}</span>
                            @else
                            <span class="media-body">N/A</span>
                              @endif
                          </li>
                        </ul>
                      </div>
                      </div>
                        <hr class="g-brd-gray-light-v4" style="margin-top: 15px;margin-bottom: 10px;">
          
                        <ul class="list-inline d-flex justify-content-between mb-0">
                          <li class="list-inline-item">
                              
                                  <ul class="list-inline mb-0">
                                      <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                                        <a href="#!">
                                          <i class="fa fa-facebook"></i>
                                        </a>
                                      </li>
                            
                                      <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
                                        <a href="#!">
                                          <i class="fa fa-twitter"></i>
                                        </a>
                                      </li>
                                   
                                    </ul>
                              
                          </li>
                          <li class="list-inline-item">
                              <a hidden class="u-link-v5 g-color-main g-color-primary--hover hidden pull-right" id="opportunity_spinner{{$s->id}}" style="margin-right:30px; margin-top:5px;">
                                  <i class="fa fa-spinner fa-spin"></i>
                                </a>
                              <a class="u-link-v5 g-color-main g-color-primary--hover pull-right" href="javascript:;" style="padding-top:5px;" id="opportunityremove{{$s->id}}">
                                 <i class="fa fa-bookmark-o g-color-red-dark-v5 g-mr-5" style="color:red;"></i> Remove Opportunity
                                </a> 
                          </li>
                        </ul>
                      </article>
                      <!-- End Recent Jobs -->
                    </div>
                    @endforeach
                    @else
                    <section class="g-bg-white g-color-primary g-pa-30 g-mb-20">
                        <div class="d-md-flex justify-content-md-center text-center">
                          <div class="align-self-md-center">
                            <p class="lead g-font-weight-400 g-mr-20--md g-mb-15 g-mb-0--md"><i class="fa fa-info-circle"></i> No saved Opportunities</p>
                          </div>
                          <div class="align-self-md-center">
                          <a class="btn btn-lg u-btn-primary text-uppercase g-font-weight-600 g-font-size-12" target="_blank" href="{{URL::to('/opportunities')}}">Show opportunities</a>
                          </div>
                        </div>
                      </section>
                    @endif
                  </div>
                  </ul>
                </div>
                <!-- End Panel Body -->
              </div>
              <!-- End Latest Projects Panel -->


            </div>
            <!-- End Activities Panel -->
          </div>

          {{-- end Opportunitiees --}} 
          {{-- Saved Events --}}
          <div class="tab-pane fade" id="saved-events" role="tabpanel">
            <div class="col-lg-12">
              <!-- Latest Projects Panel -->
              <div class="card border-0 g-mb-40">
                <!-- Panel Header -->
                <div class="card-header d-flex align-items-center justify-content-between g-bg-gray-light-v5 border-0 g-mb-15">
                  <h3 class="h6 mb-0">
                    <i class="icon-layers g-pos-rel g-top-1 g-mr-5"></i> Saved Events
                  <span class="u-label g-font-size-11 g-bg-pink g-rounded-20 g-px-8" id="count-event-tab">{{count($events)}}</span>
                  </h3>
                </div>
                <!-- End Panel Header -->

                <!-- Panel Body -->
                <div class="js-scrollbar card-block u-info-v1-1 g-bg-white-gradient-v1--after g-height-600 g-pa-0">
                  <!-- More Events List -->
                  <ul class="list-unstyled g-mb-60">
                    <div class="saved-events-window">
                      @if(count($events) != 0)
                      @foreach($events as $event)
                    <input type="hidden" id="eventname_remove{{$event->id}}" value="{{$event->title}}"/>
                      <li class="u-block-hover u-shadow-v37--hover g-bg-secondary-dark-v1 g-bg-white--hover rounded g-px-50 g-py-30 mb-4">
                        <div class="row align-items-lg-center">
                          <div class="col-md-3 col-lg-2 g-mb-30 g-mb-0--lg">
                            <div class="d-flex align-items-center mb-3">
                            <span class="g-color-primary g-font-weight-500 g-font-size-50 g-line-height-1 mr-3">{{date('j',strtotime($event->event_date))}}</span>
                              <div class="g-color-text-light-v1 text-center g-line-height-1_4">
                                <span class="d-block">{{date('M',strtotime($event->event_date))}}</span>
                                <span class="d-block">{{date('Y',strtotime($event->event_date))}}</span>
                              </div>
                            </div>
                            <span class="d-block g-color-text-light-v1 g-font-size-9 g-font-weight-600">{{date('h:i A', strtotime($event->start_time))}} - {{date('h:i A', strtotime($event->end_time))}}</span>
                          </div>
                          <a href="{{route('single.events',$event->slug)}}" style="text-decoration:none;">
                          <div class="col-md-9 col-lg-8 g-mb-30 g-mb-0--lg">
                          <h3 class="h5 g-font-primary g-font-weight-500 mb-1">{{$event->title}}</h3>
                            
                            <a class="d-inline-block u-link-v5 g-color-text-light-v1 g-color-primary--hover" href="{{route('single.events',$event->slug)}}">
                              <i class="align-middle g-color-primary mr-2 icon-real-estate-027 u-line-icon-pro"></i>
                              {{$event->venue}}
                            </a>
                          </div>
                        </a>
                          @if($event->featured_image!=null)
                          <div class="col-lg-2">
                          <img class="img-fluid g-mb-0 img-thumbnail" src="{{asset('hub-images/events-images'.'/'.$event->featured_image)}}" alt="{{$event->title}}">
                          </div>
                          @endif
                        </div>
                        <a hidden class="u-link-v5 g-color-main g-color-primary--hover hidden pull-right" id="event_spinner{{$event->id}}" style="margin-right:30px; margin-top:5px;">
                            <i class="fa fa-spinner fa-spin"></i>
                          </a>
                        <a class="u-link-v5 g-color-main g-color-primary--hover pull-right" href="javascript:;" style="padding-top:5px;" id="eventremove{{$event->id}}">
                           <i class="fa fa-bookmark-o g-color-red-dark-v5 g-mr-5" style="color:red;"></i> Remove Event
                          </a> 
                      </li>
                      @endforeach
                      @else
                      <section class="g-bg-white g-color-primary g-pa-30 g-mb-20">
                          <div class="d-md-flex justify-content-md-center text-center">
                            <div class="align-self-md-center">
                              <p class="lead g-font-weight-400 g-mr-20--md g-mb-15 g-mb-0--md"><i class="fa fa-info-circle"></i> No saved Events</p>
                            </div>
                            <div class="align-self-md-center">
                            <a class="btn btn-lg u-btn-primary text-uppercase g-font-weight-600 g-font-size-12" target="_blank" href="{{URL::to('/events')}}">Show Events</a>
                            </div>
                          </div>
                        </section>
                      @endif  
                    </div>
                  </ul>
                </div>
                <!-- End Panel Body -->
              </div>
              <!-- End Latest Projects Panel -->
              
              
            </div>
            <!-- End Activities Panel -->
          </div>
          
          {{-- End Savde Events --}}
        </div>
        
      </div>
      <!-- End Profle Content -->
    </div>
  </div>
</section>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Picture</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" enctype="multipart/form-data" action="{{route('change.picture')}}">
          <div class="modal-body">
            <input type="file" name="picture"/>
            {{csrf_field()}}
          <input type="hidden" id="id" value="{{Auth::User()->id}}" name="id"/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
        </div>
    </div>
  </div>
@endsection
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script>
    
    $(document).ready(function(){
      $(this).scrollTop(0);
    });
    $(document).on('click',"[id*='unsavepost']",function(event){
      var id = $(this).attr("id").slice(10);
      var articlename=$('#articlename'+id).val();
      $('#unsavepost'+id).attr('hidden','true');  
      $('#article_spinner'+id).removeAttr('hidden');
            console.log(id);
            $.ajax({
              type: "POST",
              url: "{{URL::to('/savearticle')}}",
              data: { 
                post_id: id,
              _token:"{{csrf_token()}}"
            },
            success: function(result) {
          $(".saved-posts-window").load(" .saved-posts-window");
          $('#counttab').html(function(i, val) { return +val-1 });
          $('#countbox').html(function(i, val) { return +val-1 });
          $('#messages').append(
            '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-warning animated fadeInDown alert alert alert-dismissible fade show g-bg-gray-dark-v2 g-color-white rounded-0" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; bottom: 20px; right: 10px; animation-iteration-count: 1;">'+
            '<button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">'+
            '<span aria-hidden="true">×</span>'+
            '</button>'+
            '<span data-notify="icon" class="glyphicon glyphicon-warning-sign"></span> <span data-notify="title"> <i class="icon-info"></i> <strong>Article'+'"'+articlename+'"'+' was removed!</strong> </span>'+
        '</div>'
          )
          .find('.alert-dismissible').delay(8000).fadeOut(2000);
        },
        error: function(result) {
          alert("Server didn't respond!"); 
        }
      });
        });
        $(document).on('click',"[id*='eventremove']",function(event){
          var id = $(this).attr("id").slice(11);
          var eventname =$('#eventname_remove'+id).val();
          $('#event_spinner'+id).removeAttr('hidden');
            $('#eventremove'+id).attr('hidden','true');  
            console.log(id);
            $.ajax({
              type: "POST",
              url: "{{URL::to('/saveevent')}}",
              data: { 
                id: id,
                _token:"{{csrf_token()}}"
              },
              success: function(result) {
                $(".saved-events-window").load(" .saved-events-window");
                $('#count-event-tab').html(function(i, val) { return +val-1 });
                $('#count-event-box').html(function(i, val) { return +val-1 });
                $('#messages').append(
            '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-warning animated fadeInDown alert alert alert-dismissible fade show g-bg-gray-dark-v2 g-color-white rounded-0" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; bottom: 20px; right: 10px; animation-iteration-count: 1;">'+
            '<button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">'+
            '<span aria-hidden="true">×</span>'+
            '</button>'+
            '<span data-notify="icon" class="glyphicon glyphicon-warning-sign"></span> <span data-notify="title">  <i class="icon-communication-011"></i> <strong>'+' "'+eventname+'"'+' was removed!</strong> </span>'+
        '</div>')
        .find('.alert-dismissible').delay(8000).fadeOut(2000);
        },
        error: function(result) {
          alert("Server didn't respond!");
            $('#eventremove'+id).removeAttr('hidden');  
            $('#event_spinner'+id).attr('hidden'); 
          }
        });
      });
      $(document).on('click',"[id*='opportunityremove']",function(event){
        var id = $(this).attr("id").slice(17);
        var opporname=$('#opporname'+id).val();
            $('#opportunity_spinner'+id).removeAttr('hidden');
            $('#opportunityremove'+id).attr('hidden','true');  
            console.log(opporname);
            $.ajax({
              type: "POST",
              url: "{{URL::to('/saveopportunity')}}",
              data: { 
                id: id,
                _token:"{{csrf_token()}}"
              },
              success: function(result) {
                $(".saved-opportunities-window").load(" .saved-opportunities-window");
                $('#count-opportunities-tab').html(function(i, val) { return +val-1 });
                $('#count-opportunities-box').html(function(i, val) { return +val-1 });
                $('#messages').append(
            '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-warning animated fadeInDown alert alert alert-dismissible fade show g-bg-gray-dark-v2 g-color-white rounded-0" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; bottom: 20px; right: 10px; animation-iteration-count: 1;">'+
            '<button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">'+
            '<span aria-hidden="true">×</span>'+
            '</button>'+
            '<span data-notify="icon" class="glyphicon glyphicon-warning-sign"></span> <span data-notify="title">  <i class="icon-education-123"></i> <strong>'+' "'+opporname+'"'+' was removed!</strong> </span>'+
        '</div>'
          )
          .find('.alert-dismissible').delay(8000).fadeOut(2000);
              },
              error: function(result) {
                alert("Server didn't respond!");
            $('#opportunityremove'+id).removeAttr('hidden');  
            $('#opportunity_spinner'+id).attr('hidden');     
          }
        });
      });
      $(document).on('click',"[id*='likearticle']",function(event){
            var id = $(this).attr("id").slice(11);
            var articlename = $('#articlename'+id).val();
            var attr=$('#likearticle'+id).attr('cid');
            if(attr === "like")
          {
            $('#likearticle'+id).animate({ 'zoom': 0.7 }, 50);
            $('#likearticle'+id).animate({ 'zoom': 1 }, 50);
            $('#likearticle'+id).animate({ 'zoom': 0.8 }, 50);
            $('#likearticle'+id).animate({ 'zoom': 1 }, 50);
            $('#likearticle'+id).animate({ 'zoom': 0.9 }, 50);
            $('#likearticle'+id).animate({ 'zoom': 1 }, 50);
            $('#countlike'+id).html(function(i, val) { return +val+1 });
            $('#like'+id).attr('hidden','true');
            $('#unlike'+id).removeAttr("hidden");
            $('#likearticle'+id).attr('cid','liked')
          }
          else if(attr === "liked")
          {
            $('#likearticle'+id).animate({ 'zoom': 0.7 }, 50);
            $('#likearticle'+id).animate({ 'zoom': 1 }, 50);
            $('#likearticle'+id).animate({ 'zoom': 0.8 }, 50);
            $('#likearticle'+id).animate({ 'zoom': 1 }, 50);
            $('#likearticle'+id).animate({ 'zoom': 0.9 }, 50);
            $('#likearticle'+id).animate({ 'zoom': 1 }, 50);
            $('#countlike'+id).html(function(i, val) { return +val-1 });
            $('#unlike'+id).attr('hidden','true');
            $('#like'+id).removeAttr("hidden");
            $('#likearticle'+id).attr('cid','like');

          }
            $.ajax({
              type: "POST",
              url: "{{URL::to('/likearticle')}}",
              data: { 
              post_id: id,
              _token:"{{csrf_token()}}"
        },
        success: function(result) {
          
        },
        error: function(result) {
          alert('Something went wrong! Try refreshing the page or check your internet connection');
        }
    });
        });
      </script>
  
      
      <script src="{{asset('main-assets/assets/js/profile.js')}}">
    </script>

    