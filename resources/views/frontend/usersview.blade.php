@extends('layouts.app')
@section('body')
@section('title',$user->name)

<style>
  @media screen and (max-width: 388px){
  #user_picture { display:none; }
}
</style>
<!-- Profle Content -->
<section class="g-bg-pos-center g-bg-cover g-bg-black-opacity-0_5--after g-color-white g-py-50 g-mb-20" style="background-position: center;
background-repeat: no-repeat; background-attachment: fixed;background-image: url({{asset('main-assets/assets/img/bg/pattern6-dark.png')}});">
  
  <div class="container g-bg-cover__inner">
    <header class="g-mb-20">
      <h2 class="h1 g-font-weight-300 text-uppercase">{{$user->name}}
        @if(Auth::User())
        @if(Auth::User()->slug == $user->slug)
        <a href="{{URL::to('user/profile')}}"  class="btn btn-sm u-btn-primary u-btn-hover-v1-4 g-font-weight-00 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50 g-mr-10 g-mb-10">
          <i class="fa fa-check-circle g-mr-3"></i>
          Edit Profile
        </a>
        @endif 
        @endif
          @if($user->photo == null)
          <img class="pull-right img-responsive" id="user_picture"  style="height:155px; width:150px; border-radius:50%;" src="{{asset('hub-images/users.png')}}" alt="{{$user->name}}"> 
        @else
        <img class="pull-right" id="user_picture"  style="height:155px; width:150px; border-radius:50%;" src="{{$user->photo}}" alt="{{$user->name}}">
        @endif
      </h2>
      @if($user->about != null)
      <p class="g-color-gray"><i class="fa fa-id-card" aria-hidden="true"></i> {{$user->about}}</p>
      <p class="g-color-gray"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{$user->email}}</p>  
      @else
      <h3 class="h5 g-font-weight-300 g-mb-5"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{$user->email}}</h3>  
      @endif
    </header>

    <ul class="u-list-inline">
      <li class="list-inline-item g-mr-7">
      <a class="u-link-v5 g-color-white g-color-primary--hover" href="{{URL::to('home')}}">Home</a>
        <i class="fa fa-angle-right g-ml-7"></i>
      </li>
      <li class="list-inline-item g-color-black">
      <span>{{$user->name}}</span>
      </li>
    </ul>
    
  </div>
</section>
    <section id="result_search" class="g-pb-90">
        <div class="container">
          <!-- End Search Info -->
          <ul class="nav u-nav-v5-1 g-brd-bottom--md g-brd-gray-light-v4" role="tablist" data-target="nav-5-1-default-hor-left-border-bottom" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-lightgray">
            <li class="nav-item">
              <a class="nav-link active" style="padding-left:7px; padding-right:7px;" data-toggle="tab" href="#nav-5-1-default-hor-left-border-bottom--1" role="tab"><b>Posts</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="padding-left:7px; padding-right:7px;" data-toggle="tab" href="#nav-5-1-default-hor-left-border-bottom--2" role="tab"><b>Liked Posts</b></a>
            </li>
          </ul>
          <!-- End Nav tabs -->
          
          <!-- Tab panes -->
          <div id="nav-5-1-default-hor-left-border-bottom" class="tab-content g-pt-20">
            <div class="tab-pane fade show active" id="nav-5-1-default-hor-left-border-bottom--1" role="tabpanel">
             
              @if($myarticles->count() == null)
              <article class="g-mb-30">
                <div class="g-mb-0 col-lg-9"> 
                  <h4>This User hasn't posted any articles yet.</h4>
                </div>
              </article>
              @else
                <!-- Blog Minimal Blocks -->
                @foreach($myarticles as $p)
                <article class="g-mb-30">
                  <div class="g-mb-0 col-lg-9"> 
                    @if($p->featured_image!=null)
                  <div class="row"  id="MoreDiv{{$p->id}}">
                      <div class="col-md-12" style="padding-bottom: 0px;">
                    <h2 class="h4 g-color-black g-font-weight-600">
                    <a class="u-link-v5 g-color-black g-color-primary--hover" href="{{URL::to('posts'.'/'.$p->slug)}}">{{$p->title}}</a>
                      </h2>
                      <span style="margin-bottom:10px;" class="d-block g-color-gray-dark-v4 g-font-weight-700 g-font-size-12 text-uppercase mb-7"><i class="fa fa-clock"></i> {{date('M j, Y',strtotime($p->created_at))}} | {{$p->name}}</span>
                      <div class="row">
                        <div class="col-xs-6 col-md-9">
                          <p class="g-color-gray-dark-v4 g-line-height-1_8 g-font-weight-500">{{str_limit(strip_tags($p->description),300)}}</p>
                        </div>
                        <div class="col-xs-6 col-md-3" style="padding-bottom:5px;">
                        <img class="img-fluid w-50 h-70 " src="{{asset('hub-images/posts-images'.'/'.$p->featured_image)}}" alt="{{$p->title}}">
                        </div>
                      </div>
                    <div class="row">
                      <?php
                      $counttags=count($p->tags);
                      ?>
                      @if($counttags != 0)
                        @foreach($p->tags as $tag)
                        <li class="list-inline-item g-mb-10">
                        <a class="u-tags-v1 g-color-gray-dark-v4 g-color-white--hover g-bg-gray-light-v5 g-bg-primary--hover g-font-size-12 g-rounded-50 g-py-4 g-px-15" href="{{URL::to('posts/tags'.'/'.$tag->name)}}"><i class="fa fa-tag mr-1"></i> {{$tag->name}}</a>
                        </li>
                        @endforeach
                      @endif  
                    </div>
                  </div>
                </div>
                @else
              <div class="g-mb-10" id="MoreDiv{{$p->id}}">
                <h2 class="h4 g-color-black g-font-weight-600 mb-3">
                <a class="u-link-v5 g-color-black g-color-primary--hover" href="{{URL::to('posts'.'/'.$p->slug)}}">{{$p->title}}</a>
                  </h2>
                  <span style="margin-bottom:10px;" class="d-block g-color-gray-dark-v4 g-font-weight-700 g-font-size-12 text-uppercase mb-7"><i class="fa fa-clock"></i> {{date('M j, Y',strtotime($p->created_at))}} | {{$p->name}}</span>
                <p class="g-color-gray-dark-v4 g-line-height-1_8">{{str_limit(strip_tags($p->description),500)}}</p>
                </div>
                </div>
                @endif
                  <ul class="list-inline g-brd-y g-brd-gray-light-v3 g-font-size-13 g-py-13 mb-0">
                    <li class="list-inline-item g-color-gray-dark-v4 mr-2">
                      <span class="d-inline-block g-color-gray-dark-v4">
                        @if($user->picture == 'users.png' || $user->picture == null)
                      <img class="g-g-width-40 g-height-40 rounded-circle mr-2" src="{{asset('hub-images/users.png')}}" alt="{{$user->name}}">
                      @else
                      <img class="g-g-width-40 g-height-40 rounded-circle mr-2" src="{{asset('hub-images/users-images'.'/'.$user->picture)}}" alt="{{$p->name}}">
                      @endif
                          {{$p->author}}
                        </span>
                    </li>
                    
                   
                {{-- @else --}}
                <li class="list-inline-item pull-center" style="margin-left:20px;">
                  @if(Auth::User())
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
            
                  @else
                <a  class="g-color-gray-dark-v5 g-color-red--hover g-font-size-default g-transition-0_3 g-text-underline--none--hover" href="{{URL::to('login')}}">
                    <i class="align-middle mr-1 fa fa-thumbs-o-up u-line-icon-pro" style="font-size:30px;"></i>  
                  </a>
                  <span id="countlike{{$p->id}}" class="g-color-gray-dark-v5">{{$p->likeusers()->count()}}</span>
                  @if($p->likeusers()->count() > 1)
                  <span class="g-color-gray-dark-v5"> likes</span>
                    @else
                  <span class="g-color-gray-dark-v5"> like</span>
                  @endif
                  @endif
                </li>         
                    <a hidden class="u-link-v5 g-color-main g-color-primary--hover hidden pull-right" id="article_spinner{{$p->id}}" style="margin-right:30px; margin-top:5px;">
                        <i class="fa fa-spinner fa-spin"></i>
                      </a>
                    @if(Auth::User())
                    <a  {{!in_array($p->id,$saves)?'hidden':''}} class="u-link-v5 g-color-main g-color-primary--hover pull-right" href="javascript:;" style="padding-top:5px;" data-toggle="tooltip" data-placement="top" title="Unsave Article" id="unsavepost{{$p->id}}">
                      <i class="fa fa-bookmark-o g-color-red-dark-v5 g-mr-5" style="color:red;"></i> Bookmarked
                    </a> 
                    <a  {{in_array($p->id,$saves)?'hidden':''}} class="u-link-v5 g-color-main g-color-primary--hover pull-right"  href="javascript:;" style="padding-top:5px;" id="savearticle{{$p->id}}">
                          <i  class="fa fa-bookmark-o g-color-gray-dark-v5 g-mr-5"></i> Bookmark
                    </a>
                     @else
                  <a  class="u-link-v5 g-color-main g-color-primary--hover pull-right"  href="{{URL::to('login')}}" style="padding-top:5px;">
                      <i  class="fa fa-bookmark-o g-color-gray-dark-v5 g-mr-5"></i> Bookmark
                    </a>
                    @endif
                  </ul>
                 
                </article>
                @endforeach
                {{-- <div class="text-center">
                    {{$posts->appends(['search'=>$query,'users' => $users->currentPage(),'events'=>$events->currentPage(),'opportunities'=>$opportunities->currentPage()])->links()}}
                </div> --}}
                <!-- End Blog Minimal Blocks -->
            @endif
            </div>
            <div class="tab-pane fade" id="nav-5-1-default-hor-left-border-bottom--2" role="tabpanel">
                @if($clappedarticles->count() == null)
                <article class="g-mb-30">
                  <div class="g-mb-0 col-lg-9"> 
                    <h4>This User hasn't liked any articles yet.</h4>
                  </div>
                </article>
                @else
                  <!-- Blog Minimal Blocks -->
                  @foreach($clappedarticles as $p)
                  <article class="g-mb-30">
                    <div class="g-mb-0 col-lg-9"> 
                      @if($p->featured_image!=null)
                    <div class="row"  id="MoreDiv{{$p->id}}">
                        <div class="col-md-12" style="padding-bottom: 0px;">
                      <h2 class="h4 g-color-black g-font-weight-600">
                      <a class="u-link-v5 g-color-black g-color-primary--hover" href="{{URL::to('posts'.'/'.$p->slug)}}">{{$p->title}}</a>
                        </h2>
                        <span style="margin-bottom:10px;" class="d-block g-color-gray-dark-v4 g-font-weight-700 g-font-size-12 text-uppercase mb-7"><i class="fa fa-clock"></i> {{date('M j, Y',strtotime($p->created_at))}} | {{$p->name}}</span>
                        <div class="row">
                          <div class="col-xs-6 col-md-9">
                            <p class="g-color-gray-dark-v4 g-line-height-1_8 g-font-weight-500">{{str_limit(strip_tags($p->description),300)}}</p>
                          </div>
                          <div class="col-xs-6 col-md-3" style="padding-bottom:5px;">
                          <img class="img-fluid w-50 h-70 " src="{{asset('hub-images/posts-images'.'/'.$p->featured_image)}}" alt="{{$p->title}}">
                          </div>
                        </div>
                      <div class="row">
                        <?php
                        $counttags=count($p->tags);
                        ?>
                        @if($counttags != 0)
                          @foreach($p->tags as $tag)
                          <li class="list-inline-item g-mb-10">
                          <a class="u-tags-v1 g-color-gray-dark-v4 g-color-white--hover g-bg-gray-light-v5 g-bg-primary--hover g-font-size-12 g-rounded-50 g-py-4 g-px-15" href="{{URL::to('posts/tags'.'/'.$tag->name)}}"><i class="fa fa-tag mr-1"></i> {{$tag->name}}</a>
                          </li>
                          @endforeach
                        @endif  
                      </div>
                    </div>
                  </div>
                  @else
                <div class="g-mb-10" id="MoreDiv{{$p->id}}">
                  <h2 class="h4 g-color-black g-font-weight-600 mb-3">
                  <a class="u-link-v5 g-color-black g-color-primary--hover" href="{{URL::to('posts'.'/'.$p->slug)}}">{{$p->title}}</a>
                    </h2>
                    <span style="margin-bottom:10px;" class="d-block g-color-gray-dark-v4 g-font-weight-700 g-font-size-12 text-uppercase mb-7"><i class="fa fa-clock"></i> {{date('M j, Y',strtotime($p->created_at))}} | {{$p->name}}</span>
                  <p class="g-color-gray-dark-v4 g-line-height-1_8">{{str_limit(strip_tags($p->description),500)}}</p>
                  </div>
                  </div>
                  @endif
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
                </ul>
                   
                  </article>
                  @endforeach
                  {{-- <div class="text-center">
                      {{$posts->appends(['search'=>$query,'users' => $users->currentPage(),'events'=>$events->currentPage(),'opportunities'=>$opportunities->currentPage()])->links()}}
                  </div> --}}
                  <!-- End Blog Minimal Blocks -->
              @endif
            
            </div>
            {{-- <div class="tab-pane fade" id="nav-5-1-default-hor-left-border-bottom--3" role="tabpanel">
              @if($events->count()==null)
              <article class="g-mb-30">
                  <div class="g-mb-0 col-lg-9"> 
                    <h4>No results found in Events</h4>
                  </div>
                </article>
              @else
              <div class="col-lg-9 g-mb-10">
                  <!-- Events -->
                    
                      <div class="container g-py-10">
                        <!-- More Events List -->
                        <ul class="list-unstyled g-mb-30 events endless-pagination"  data-next-page="{{$events->nextPageUrl()}}">
                          <!-- Events Item -->
                          @foreach($events as $event)
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
                              <div class="col-md-9 col-lg-8 g-mb-30 g-mb-0--lg">
                              <h3 class="h5 g-font-primary g-font-weight-500 mb-1">{{$event->title}}</h3>
                                
                                <a class="d-inline-block u-link-v5 g-color-text-light-v1 g-color-primary--hover" href="{{route('single.events',$event->slug)}}">
                                  <i class="align-middle g-color-primary mr-2 icon-real-estate-027 u-line-icon-pro"></i>
                                  {{$event->venue}}
                                </a>
                              </div>
                              @if($event->featured_image!=null)
                              <div class="col-lg-2">
                              <img class="img-fluid g-mb-0 img-thumbnail" src="{{asset('hub-images/events-images'.'/'.$event->featured_image)}}" alt="{{$event->title}}">
                              </div>
                              @endif
                            </div>
                          <a class="u-link-v2" href="{{route('single.events',$event->slug)}}"></a>
                          </li>
                          @endforeach
                          <!-- End Events Item -->
                        </ul>
                        <!-- End More Events List -->
                      
                       
                        <div class="text-center">
                            {{$events->appends(['search'=>$query,'users' => $users->currentPage(),'posts'=>$posts->currentPage(),'opportunities'=>$opportunities->currentPage()])->links()}}
                        </div>
                      
                     
                    </div>
                    <!-- End Events -->
              
                    
                  </div>
                @endif
            </div> --}}
            {{-- <div class="tab-pane fade" id="opportunities-tab" role="tabpanel">
              @if($opportunities->count() == null)
              <article class="g-mb-30">
                  <div class="g-mb-0 col-lg-9"> 
                    <h4>No results found in opportunities</h4>
                  </div>
                </article>
              @else
                <section class="g-py-20">
                    <div class="container">
                      <div class="row g-mb-30">
                        @foreach($opportunities as $s)
                        <div class="col-lg-4 g-mb-30 g-mb-0--lg">
                          <!-- Recent Jobs -->
                          <article class="g-pa-25 u-shadow-v11 rounded" style="margin-bottom:15px;">
                            <h2 class="h4 g-mb-15">
                            <a class="u-link-v5 g-color-gray-dark-v1 g-color-primary--hover" href="{{URL::to('opportunities'.'/'.$s->slug)}}">{{str_limit(strip_tags($s->title),22
                              )}}</a>
                              </h2>
              
                            <ul class="list-inline d-flex justify-content-between g-mb-15">
                              <li class="list-inline-item g-mr-20">
                              <img class="g-height-25 g-width-25 rounded-circle g-mr-5" src="{{asset('hub-images/opportunities-images'.'/'.$s->featured_image)}}" alt="Image Description"> <a class="u-link-v5 g-color-main g-color-primary--hover">{{$s->organization}}</a>
                              </li>
                              <li class="list-inline-item">
                                <span class="js-rating d-block g-color-primary" data-rating="5"></span>
                              </li>
                            </ul>
              
                          <p class="g-mb-15">{!!str_limit(strip_tags($s->description),150
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
              
                            <hr class="g-brd-gray-light-v4">
              
                            <ul class="list-inline d-flex justify-content-between mb-0">
                              <li class="list-inline-item">
                                  
                                      <ul class="list-inline mb-0">
                                          <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                                            <a href="#!">
                                              <i class="fa fa-facebook"></i>
                                            </a>
                                          </li>
                                          <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin">
                                            <a href="#!">
                                              <i class="fa fa-linkedin"></i>
                                            </a>
                                          </li>
                                          <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
                                            <a href="#!">
                                              <i class="fa fa-twitter"></i>
                                            </a>
                                          </li>
                                          <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dribbble">
                                            <a href="#!">
                                              <i class="fa fa-dribbble"></i>
                                            </a>
                                          </li>
                                        </ul>
                                  
                              </li>
                              <li class="list-inline-item">
                                <a href="{{URL::to('opportunities'.'/'.$s->slug)}}">See Details</a>
                              </li>
                            </ul>
                          </article>
                          <!-- End Recent Jobs -->
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </section>
                  <div class="text-center">
                      {{$opportunities->appends(['search'=>$query,'users' => $users->currentPage(),'events'=>$events->currentPage(),'posts'=>$posts->currentPage()])->links()}}
                  </div>
                  @endif
            </div> --}}
          </div>
          <!-- End Tab panes -->
        </div>
      </section>

@endsection
@section('js')
<script>
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

  $(document).on('click',"[id*='savearticle']",function(event){
            var id = $(this).attr("id").slice(11);
            var articlename = $('#articlename'+id).val();
            $('#savearticle'+id).attr('hidden','true');  
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
          $('#article_spinner'+id).attr('hidden','true');
          $('#unsavepost'+id).removeAttr('hidden');
          $('#countbox'+id).html(function(i, val) { return +val+1 });
           $('#messages').append(
            '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-success alert-dismissible fade show" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; bottom: 20px; right: 10px; animation-iteration-count: 1;">'+
            '<button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">'+
            '<span aria-hidden="true">×</span>'+
            '</button>'+
            '<h4 class="h5">'+
            '<i class="fa fa-check-circle-o"></i>'+
            ' Bookmark added!'+
            '</h4>'+
            '<p>Article was bookmarked. Go to your profile to view the saved article!</p>'+
        '</div>'
          ).find('.alert-dismissible').delay(8000).fadeOut(2000);
        },
        error: function(result) {
            $('#savearticle'+id).show();  
        }
    });
        });
        $(document).on('click',"[id*='unsavepost']",function(event){
            var id = $(this).attr("id").slice(10);
            var articlename = $('#articlename'+id).val();
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
          $('#article_spinner'+id).attr('hidden','true');
          $('#savearticle'+id).removeAttr('hidden');
          $('#countbox'+id).html(function(i, val) { return +val-1 });
          $('#messages').append(
            '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-success alert-dismissible fade show" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; bottom: 20px; right: 10px; animation-iteration-count: 1;">'+
            '<button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">'+
            '<span aria-hidden="true">×</span>'+
            '</button>'+
            '<h4 class="h5">'+
            '<i class="fa fa-check-circle-o"></i>'+
            ' Bookmark removed!'+
            '</h4>'+
            '<p>Article was removed from saved articles.</p>'+
        '</div>'
          ).find('.alert-dismissible').delay(8000).fadeOut(2000);
        },
        error: function(result) {
            $('#unsavepost'+id).show();  
        }
    });
        });
$(document).click(function() {
  $('#messages').empty();
});
</script>
@endsection