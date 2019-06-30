@extends('layouts.app')
@section('body')
@section('title','Home')
 <!-- Revolution Slider -->
 <link rel="stylesheet" href="{{asset('main-assetsassets/vendor/revolution-slider/revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}">
 <link rel="stylesheet" href="{{asset('main-assets/assets/vendor/revolution-slider/revolution/css/settings.css')}}">
 <link rel="stylesheet" href="{{asset('main-assets/assets/vendor/revolution-slider/revolution/css/layers.css')}}">
 <link rel="stylesheet" href="{{asset('main-assets/assets/vendor/revolution-slider/revolution/css/navigation.css')}}">

<style>
  .panel.date {
    margin: 0px;
    width: 60px;
    text-align: center;
}

.panel.date .month {
   
    font-weight: 700;
    text-transform: uppercase;
}

.panel.date .day {
    padding: 3px 0px;
    font-weight: 700;
    font-size: 1.5em;
}
@media screen and (max-width: 992px) {
  .loading {
    visibility: hidden;
  }
}
@media screen and (min-width: 992px) {
  .view-more {
    visibility: hidden;
  }
}
@media screen and (max-width: 993px){
  #category_links { display: none; }   /* hide it elsewhere */
}
@media screen and (min-width: 993px){
  #category_sidebar { display:none; }
}

</style>
@if(count($featuredposts) != 0)
<div id="rev_slider_477_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="clean-new-slider" data-source="gallery" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:25px;">
  <!-- START REVOLUTION SLIDER 5.4.1 auto mode -->
  <div id="rev_slider_477_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.1">
    <ul>  <!-- SLIDE  -->
      @foreach($featuredposts as $fp)
    <li data-index="rs-{{$fp->id}}" data-transition="fadethroughtransparent" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="{{asset('hub-images/posts-images'.'/'.$fp->featured_image)}}" data-rotate="0" data-fstransition="fade" data-fsmasterspeed="1000" data-fsslotamount="7" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
        <!-- MAIN IMAGE -->
      <img src="{{asset('hub-images/posts-images'.'/'.$fp->featured_image)}}" alt="{{$fp->title}}" data-lazyload="{{asset('hub-images/posts-images'.'/'.$fp->featured_image)}}" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg">
        <!-- LAYERS -->

        <!-- LAYER NR. 1 -->
        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"
             id="slide-1651-layer-1"
             data-x="['right','right','right','right']" data-hoffset="['30','30','30','20']"
             data-y="['top','top','top','top']" data-voffset="['30','30','30','20']"
             data-width="['430','430','350','250']"
             data-height="['540','540','540','410']"
             data-whitespace="nowrap"

             data-type="shape"
             data-responsive_offset="on"

             data-frames='[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":1400,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","ease":"Power3.easeInOut"}]'
             data-textAlign="['left','left','left','left']"
             data-paddingtop="[0,0,0,0]"
             data-paddingright="[0,0,0,0]"
             data-paddingbottom="[0,0,0,0]"
             data-paddingleft="[0,0,0,0]"

             style="z-index: 5;background-color:rgba(255, 255, 255, 1.00);border-color:rgba(0, 0, 0, 0);border-width:0px;"></div>

        <!-- LAYER NR. 2 -->
        <div class="tp-caption PostSlider-Category   tp-resizeme"
             id="slide-1651-layer-3"
             data-x="['right','right','right','right']" data-hoffset="['60','60','60','40']"
             data-y="['top','top','top','top']" data-voffset="['60','60','60','40']"
             data-fontsize="['15','15','13','13']"
             data-lineheight="['15','15','13','13']"
             data-width="['370','370','290','210']"
             data-height="none"
             data-whitespace="nowrap"

             data-type="text"
             data-responsive_offset="on"

             data-frames='[{"from":"y:20px;opacity:0;","speed":500,"to":"o:1;","delay":600,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","ease":"Power3.easeInOut"}]'
             data-textAlign="['left','left','left','left']"
             data-paddingtop="[0,0,0,0]"
             data-paddingright="[0,0,0,0]"
             data-paddingbottom="[0,0,0,0]"
             data-paddingleft="[0,0,0,0]"

             style="z-index: 6; min-width: 370px; max-width: 370px; white-space: nowrap;">{{$fp->name}}
        </div>

        <!-- LAYER NR. 3 -->
        <div class="tp-caption PostSlider-Title   tp-resizeme"
             id="slide-1651-layer-2"
             data-x="['right','right','right','right']" data-hoffset="['60','60','60','40']"
             data-y="['top','top','top','top']" data-voffset="['102','102','92','68']"
             data-fontsize="['40','40','30','20']"
             data-lineheight="['40','40','30','20']"
             data-width="['370','370','290','210']"
             data-height="none"
             data-whitespace="normal"

             data-type="text"
             data-responsive_offset="on"

             data-frames='[{"from":"y:20px;opacity:0;","speed":500,"to":"o:1;","delay":700,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","ease":"Power3.easeInOut"}]'
             data-textAlign="['left','left','left','left']"
             data-paddingtop="[0,0,0,0]"
             data-paddingright="[0,0,0,0]"
             data-paddingbottom="[0,0,0,0]"
             data-paddingleft="[0,0,0,0]"

             style="z-index: 7; min-width: 370px; max-width: 370px; white-space: normal;">{{$fp->title}}
        </div>

        <!-- LAYER NR. 4 -->
        <div class="tp-caption PostSlider-Content   tp-resizeme"
             id="slide-1651-layer-4"
             data-x="['right','right','right','right']" data-hoffset="['60','60','60','40']"
             data-y="['top','top','top','top']" data-voffset="['265','265','215','154']"
             data-fontsize="['15','15','14','13']"
             data-lineheight="['23','23','21','20']"
             data-width="['370','370','290','210']"
             data-height="none"
             data-whitespace="normal"

             data-type="text"
             data-responsive_offset="on"

             data-frames='[{"from":"y:20px;opacity:0;","speed":500,"to":"o:1;","delay":800,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","ease":"Power3.easeInOut"}]'
             data-textAlign="['left','left','left','left']"
             data-paddingtop="[0,0,0,0]"
             data-paddingright="[0,0,0,0]"
             data-paddingbottom="[0,0,0,0]"
             data-paddingleft="[0,0,0,0]"

             style="z-index: 8; min-width: 370px; max-width: 370px; white-space: normal;">{!! substr($fp->description,0,200) !!}
        </div>

        <!-- LAYER NR. 5 -->
        <a href="{{URL::to('posts'.'/'.$fp->slug)}}">
        <div class="tp-caption PostSlider-Button rev-btn  tp-resizeme"
             id="slide-1651-layer-5"
             data-x="['left','left','left','left']" data-hoffset="['770','593','428','230']"
             data-y="['top','top','top','top']" data-voffset="['496','496','496','366']"
             data-width="none"
             data-height="none"
             data-whitespace="nowrap"

             data-type="button"
             data-responsive_offset="on"

             data-frames='[{"from":"y:10px;opacity:0;","speed":500,"to":"o:1;","delay":900,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"y:10px;opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"200","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(0, 0, 0, 1.00);bg:rgba(238, 238, 238, 1.00);bw:1px 1px 1px 1px;"}]'
             data-textAlign="['left','left','left','left']"
             data-paddingtop="[1,1,1,1]"
             data-paddingright="[55,55,55,55]"
             data-paddingbottom="[1,1,1,1]"
             data-paddingleft="[23,23,23,23]"
             style="z-index: 9; white-space: nowrap;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
          <i class="pe-7s-comment" style="font-size:25px; float:left; margin-top:9px;margin-right:10px;"></i>
          Continue Reading
        </div>
      </a>
      </li>
      <!-- SLIDE  -->
     @endforeach
    </ul>
    <div class="tp-bannertimer tp-bottom" style="height: 5px; background-color: rgba(255, 255, 255, 0.75);"></div>
  </div>
</div><!-- END REVOLUTION SLIDER -->
@endif


<!-- Blog Minimal Blocks -->
<div class="container g-pt-10 g-pb-10">
  <div class="row">
    <div class="col-lg-2 hidden-sm" style="padding-left: 0px;padding-right: 0px;" id="category_links">
        <div class="g-pr-20--lg">
            <!-- Links -->
            <div class="g-mb-50">
              <h3 class="h5 g-color-black g-font-weight-600 mb-4">Feed</h3>
              <ul class="list-unstyled g-font-size-13 mb-0">
                  <li>
                      <a class="
                      @if(Request::is('home') || Request::is('/'))
                      d-block active u-link-v5 g-color-black g-bg-gray-light-v5 g-font-weight-800 g-px-5 g-py-8
                      @else
                      d-block u-link-v5 g-color-black g-px-5 g-py-8                      
                      @endif
                      " href="{{URL::to('home')}}"><i class="mr-2 fa fa-angle-right"></i> All</a>
                      </li>
                @foreach($categories as $c)
                <li>
                <a class="
                @if(Request::is('category'.'/'.$c->slug))
                d-block active u-link-v5 g-color-black g-bg-gray-light-v5 g-font-weight-800 g-px-5 g-py-8
                @else
                d-block u-link-v5 g-color-black g-px-5 g-py-8
                @endif
                " href="{{URL::to('category'.'/'.$c->slug)}}">
                <span class="d-inline-block g-pos-rel">
                    @if(Request::is('category'.'/'.$c->slug))
                  <span class="u-badge-v2--xs g-brd-around g-brd-white"></span>
                  @endif
                <img class="media-object g-rounded-50x" style="height:20px;width:20px;" src="{{asset('hub-images/categories-images'.'/'.$c->category_image)}}" alt="{{$c->name}}">
                  </span> {{$c->name}} </a>
                </li>
                @endforeach
              </ul>
            </div>
            <!-- End Links -->
          </div>
    </div>
    <div class="col-lg-7 g-mb-20" >
    <div  class="g-pr-20--lg posts endless-pagination" data-next-page="{{$posts->nextPageUrl()}}">
        <!-- Blog Minimal Blocks -->
        @foreach($posts as $p)
    <input type="hidden" id="articlename{{$p->id}}" value="{{$p->title}}"/>
        <article class="g-mb-30">
          <div id="articles_division" class="g-mb-0"> 
            @if($p->featured_image!=null)
          <div class="row"  id="MoreDiv{{$p->id}}">
              <div class="col-md-12" style="padding-bottom: 0px;">
            <h2 class="h4 g-color-black g-font-weight-600">
            <a class="u-link-v5 g-color-black g-color-primary--hover" href="{{URL::to('posts'.'/'.$p->slug)}}">{{$p->title}}</a>
              </h2>
              <span style="margin-bottom:10px;" class="d-block g-color-gray-dark-v4 g-font-weight-700 g-font-size-12 text-uppercase mb-7"><i class="fa fa-clock"></i> {{date('M j, Y',strtotime($p->created_at))}} | {{$p->name}}</span>
              <div class="row">
                <div class="col-xs-6 col-md-9">
                  <p class="g-color-gray-dark-v4 g-line-height-1_8 g-font-weight-500">{{str_limit(strip_tags($p->description),175)}}</p>
                </div>
                <div class="col-xs-6 col-md-3" style="padding-bottom:5px;">
                    <img class="img-fluid w-100 h-100 " src="{{asset('hub-images/posts-images'.'/'.$p->featured_image)}}" alt="Image Description">
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
            <a class="g-font-size-13" href="javascript:;" id="ShowMore{{$p->id}}">Read more...</a>
          </div>
        
         
        </div>
      <div id="LessDiv{{$p->id}}" hidden>
            <h2 class="h4 g-color-black g-font-weight-600 ">
            <a class="u-link-v5 g-color-black g-color-primary--hover" href="{{URL::to('posts'.'/'.$p->slug)}}">{{$p->title}}</a>
                  </h2>
                  <span style="margin-bottom:10px;" class="d-block g-color-gray-dark-v4 g-font-weight-700 g-font-size-12 text-uppercase mb-7"><i class="fa fa-clock"></i> {{date('M j, Y',strtotime($p->created_at))}} | {{$p->name}}</span>
                  <img class="img-fluid w-100 g-mb-25" src="{{asset('hub-images/posts-images'.'/'.$p->featured_image)}}" alt="{{$p->title}}">
      
            <p class="g-color-gray-dark-v4 g-line-height-1_8">{!!$p->description!!}</p>
            <div class="row">
                <?php
                $counttagss=count($p->tags);
                ?>
                @if($counttagss != 0)
                  @foreach($p->tags as $tag)
                  <li class="list-inline-item g-mb-10">
                  <a class="u-tags-v1 g-color-gray-dark-v4 g-color-white--hover g-bg-gray-light-v5 g-bg-primary--hover g-font-size-12 g-rounded-50 g-py-4 g-px-15" href="{{URL::to('posts/tags'.'/'.$tag->normalized)}}"><i class="fa fa-tag mr-1"></i> {{$tag->name}}</a>
                  </li>
                  @endforeach
                @endif  
              </div>
              <ul class="list-inline text-center g-mb-10">
                <li class="list-inline-item g-mx-2">
                  <a class="u-icon-v1 u-icon-slide-up--hover g-color-gray-dark-v4 g-color-facebook--hover" href="#!">
                    <i class="g-font-size-default g-line-height-1 u-icon__elem-regular fa fa-facebook"></i>
                    <i class="g-font-size-default g-line-height-0_8 u-icon__elem-hover fa fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item g-mx-2">
                  <a class="u-icon-v1 u-icon-slide-up--hover g-color-gray-dark-v4 g-color-twitter--hover" href="#!">
                    <i class="g-font-size-default g-line-height-1 u-icon__elem-regular fa fa-twitter"></i>
                    <i class="g-font-size-default g-line-height-0_8 u-icon__elem-hover fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item g-mx-2">
                  <a class="u-icon-v1 u-icon-slide-up--hover g-color-gray-dark-v4 g-color-google-plus--hover" href="#!">
                    <i class="g-font-size-default g-line-height-1 u-icon__elem-regular fa fa-google-plus"></i>
                    <i class="g-font-size-default g-line-height-0_8 u-icon__elem-hover fa fa-google-plus"></i>
                  </a>
                </li>
                <li class="list-inline-item g-mx-2">
                  <a class="u-icon-v1 u-icon-slide-up--hover g-color-gray-dark-v4 g-color-linkedin--hover" href="#!">
                    <i class="g-font-size-default g-line-height-1 u-icon__elem-regular fa fa-linkedin"></i>
                    <i class="g-font-size-default g-line-height-0_8 u-icon__elem-hover fa fa-linkedin"></i>
                  </a>
                </li>
              </ul>
                <a class="g-font-size-13" href="javascript:;" id="ShowLess{{$p->id}}">Done reading..</a>
        </div>
        @else
      <div class="g-mb-10" id="MoreDiv{{$p->id}}">
        <h2 class="h4 g-color-black g-font-weight-600 mb-3">
        <a class="u-link-v5 g-color-black g-color-primary--hover" href="{{URL::to('posts'.'/'.$p->slug)}}">{{$p->title}}</a>
          </h2>
          <span style="margin-bottom:10px;" class="d-block g-color-gray-dark-v4 g-font-weight-700 g-font-size-12 text-uppercase mb-7"><i class="fa fa-clock"></i> {{date('M j, Y',strtotime($p->created_at))}} | {{$p->name}}</span>
        <p class="g-color-gray-dark-v4 g-line-height-1_8">{{str_limit(strip_tags($p->description),300)}}</p>
        <a class="g-font-size-13" href="javascript:;" id="ShowMore{{$p->id}}">Read more...</a>
        </div>
      <div id="LessDiv{{$p->id}}" hidden>
            <h2 class="h4 g-color-black g-font-weight-600 ">
            <a class="u-link-v5 g-color-black g-color-primary--hover" href="{{URL::to('posts'.'/'.$p->slug)}}">{{$p->title}}</a>
                  </h2>
                  <span style="margin-bottom:10px;" class="d-block g-color-gray-dark-v4 g-font-weight-700 g-font-size-12 text-uppercase mb-7"><i class="fa fa-clock"></i> {{date('M j, Y',strtotime($p->created_at))}} | {{$p->name}}</span>
            <p class="g-color-gray-dark-v4 g-line-height-1_8">{!!$p->description!!}</p>
                <a class="g-font-size-13" href="javascript:;" id="ShowLess{{$p->id}}">Done reading..</a>
        </div>
        </div>
        @endif
          <ul class="list-inline g-brd-y g-brd-gray-light-v3 g-font-size-13 g-py-13 mb-0">
           <li class="list-inline-item g-color-gray-dark-v4 mr-2">
             <span class="d-inline-block g-color-gray-dark-v4">
               @if($p->user_id != null)
              <?php
                 $user_picture=$users->where('id','=',$p->user_id)->first();
                 $picture=$user_picture['photo'];
               ?>
               @else
               <?php
                $picture =null;
               ?>
               @endif
               @if($picture == 'users.png' || $picture == null)
             <img class="g-g-width-40 g-height-40 rounded-circle mr-2" src="{{asset('hub-images/users.png')}}" alt="{{$p->author}}">
             @else
             <img class="g-g-width-40 g-height-40 rounded-circle mr-2" src="{{asset('hub-images/users-images'.'/'.$picture)}}" alt="{{$p->author}}">
             @endif
             @if($p->username != null)
             <a class="g-color-primary-dark-v5" href="{{URL::to('user/'.'@'.$p->username)}}">{{$p->author}}</a>
             @else
             <a class="g-color-primary-dark-v5" href="{{URL::to('/about')}}">Kiran KC</a>
             @endif
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
        <!-- End Blog Minimal Blocks -->
      </div>
      @if($countposts > 5)
      <div class="loading hidden-xs text-center" id="stickyblock-end">
          <img src="{{asset('main-assets/stock/loading.gif')}}" style="width:50px; height:50px;"/>
      </div>
      @endif
      @if($countposts > 5)
      <div class="text-center view-more" id="view-more">
        <a class="btn u-shadow-v33 g-color-white g-color-white--hover g-bg-primary g-bg-main--hover g-rounded-30 g-px-25 g-py-10 g-mb-10"><i class="fa fa-cog fa-spin" id="spinner"></i> View More</a>
      </div> 
      <div class="text-center" id="posts-end">
        <p id="end-posts"></p>
      </div> 
      @endif
      <div id="stickyblock-end">
      </div>
    </div>
    
    
    <div class="col-lg-3 g-brd-left--lg g-brd-gray-light-v4 text-center g-mb-20">
      <div class="g-pl-20--lg">
        <div>
  
        <div class="g-mb-5">
        <a href="{{URL::to('user/post/article')}}"  class="btn btn-md u-btn-primary u-btn-hover-v1-4 g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50 g-mr-10 g-mb-15">
                <i class="fa fa-check-circle g-mr-3"></i>
                Write To Us
              </a>
        </div>
     
        
          {{-- <div class="g-mb-20">
            <h3 class="h5 g-color-black g-font-weight-600 mb-4"><i class="fa fa-calendar-check-o g-mr-3"></i>Upcoming Events</h3>
            <ul class="list-unstyled g-font-size-13 mb-0">
              @foreach($events as $e)
              <li>
              <a class="u-link-v5 g-color-black" href="{{route('single.events',$e->slug)}}">
                  <article class="media g-mb-10">
                      <div class="panel panel-danger text-center date" style="padding-right:5px; border-color:#ebccd1;">
                          <div class="panel-heading month" style="background-color:#ebccd1; border-top-left-radius: 3px; border-top-right-radius: 3px;">
                              <span class="panel-title strong">
                                  {{date('M',strtotime($e->event_date))}}
                              </span>
                          </div>
                          <div class="panel-body day text-danger" style="border: 1px solid #ebccd1; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px;">
                              {{date('j',strtotime($e->event_date))}}
                          </div>
                      </div>
                    <div class="media-body">
                    <h4 class="h6 g-color-black g-font-weight-600"   data-toggle="tooltip" data-placement="right" title="{{$e->title}}">{{str_limit(strip_tags($e->title),19)}}</h4>
                    <p><i class="icon-location-pin"></i> {{$e->venue}}</p>                   
                    </div>
                  </article>
              </a>
              </li>
              @endforeach
            </ul>
          </div> --}}
{{--   
          <hr class="g-brd-gray-light-v4 g-my-10"> --}}
          
                {{-- <div class="g-mb-20" id="stickyblock-start" class="js-sticky-block g-sticky-block--lg g-pt-50" data-start-point="#stickyblock-start" data-end-point="#stickyblock-end">
                    <h3 class="h5 g-color-black g-font-weight-600 mb-4"><i class="fa fa-handshake-o g-mr-3"></i>Opportunites</h3>
                    <ul class="list-unstyled g-font-size-13 mb-0">
                      @foreach($opportunities as $o)
                      <li>
                      <a class="u-link-v5 g-color-black" href="{{URL::to('opportunities'.'/'.$o->slug)}}">
                        <article class="media g-mb-10">
                          <img class="g-width-50 g-height-50" src="{{asset('hub-images/opportunities-images'.'/'.$o->featured_image)}}" alt="Image Description" style="
                          margin-right: 10px;">
                          <div class="media-body">
                          <h4 class="h6 g-color-black g-font-weight-600"   data-toggle="tooltip" data-placement="right" title="{{$o->title}}">{{str_limit(strip_tags($o->title),19)}}</h4>
                          <p class="g-color-gray-dark-v4"><i class="icon-organization"></i> {{$o->organization}}</p>
                          </div>
                        </article>
                      </a>
                      </li>
                      @endforeach
                    </ul>
                  </div> --}}
                  {{--  End Opportunities  --}}
                  {{--  <hr class="g-brd-gray-light-v4 g-my-10">  --}}
                  {{--  Recommedn posts  --}}
                {{--  <div class="g-mb-20">
                    <h3 class="h5 g-color-black g-font-weight-600 mb-4">Recommended Posts</h3>
                    <ul class="list-unstyled g-font-size-13 mb-0">
                      <li>
                        <article class="media g-mb-10">
                          <img class="g-width-50 g-height-50 rounded-circle" src="{{asset('main-assets/assets/img-temp/100x100/img5.jpg')}}" alt="Image Description" style="
                          margin-right: 10px;">
                          <div class="media-body">
                            <h4 class="h6 g-color-black g-font-weight-600">Htmlstream</h4>
                            <p class="g-color-gray-dark-v4">This is where we sit down, grab a cup of coffee and dial in the details.</p>
                          </div>
                        </article>
                      </li>
                      <li>
                          <article class="media g-mb-10">
                              <img class="g-width-50 g-height-50 rounded-circle" src="{{asset('main-assets/assets/img-temp/100x100/img5.jpg')}}" alt="Image Description" style="
                              margin-right: 10px;">
                              <div class="media-body">
                                <h4 class="h6 g-color-black g-font-weight-600">In the Future of the misiisasd</h4>
                                <p class="g-color-gray-dark-v4">This is where we sit down, grab a cup of coffee and dial in the details.</p>
                              </div>
                            </article>
                      </li>
                      <li>
                          <article class="media g-mb-10">
                              <img class="g-width-50 g-height-50 rounded-circle" src="{{asset('main-assets/assets/img-temp/100x100/img5.jpg')}}" alt="Image Description" style="
                              margin-right: 10px;">
                              <div class="media-body">
                                <h4 class="h6 g-color-black g-font-weight-600">Htmlstream</h4>
                                <p class="g-color-gray-dark-v4">This is where we sit down, grab a cup of coffee and dial in the details.</p>
                              </div>
                            </article>
                      </li>
                    </ul>
                  </div>  --}}
                  <!-- End Opportunities -->

          {{-- <hr class="g-brd-gray-light-v4 g-my-10"> --}}

  
          {{-- <div id="category_sidebar" class="g-mb-10">
            <h3 class="h5 g-color-black g-font-weight-600 mb-4">Categories</h3>
            <ul class="u-list-inline mb-0">
              @foreach($categories as $c)
              <li class="list-inline-item g-mb-10">
              <a class="u-tags-v1 g-color-gray-dark-v4 g-color-white--hover g-bg-gray-light-v5 g-bg-primary--hover g-font-size-12 g-rounded-50 g-py-4 g-px-15" href="{{URL::to('posts/category'.'/'.$c->slug)}}">{{$c->name}}</a>
              </li>
              @endforeach
            </ul>
          </div> --}}

          <div class="u-shadow-v25 u-bg-overlay g-bg-img-hero g-bg-white-gradient-opacity-v2--after g-py-40 g-px-20 g-mb-50" style="background-image: url(assets/img-temp/500x600/img1.jpg);">
            <div class="u-bg-overlay__inner text-center">
              <div class="g-mb-40">
                <h2 class="g-color-white">Vancouver, BC</h2>
                <p class="g-color-white-opacity-0_8">Unit 25 Suite 3, 925 Prospect PI,<br>Beach Resort, 23001</p>
              </div>

              <div class="g-mb-30">
                <h3 class="d-inline-block g-bg-primary-opacity-0_6 g-color-white g-font-weight-600 g-font-size-12 text-uppercase g-py-5 g-px-10">Phone number</h3>
                <span class="d-block g-color-white g-font-size-18">+01 (0) 333 444 55</span>
              </div>
            </div>
          </div>
   

          <hr class="g-brd-gray-light-v4 g-my-10">

          <div class="u-shadow-v25 u-bg-overlay g-bg-img-hero g-bg-white-gradient-opacity-v2--after g-py-40 g-px-20 g-mb-50" style="background-image: url(assets/img-temp/500x600/img1.jpg);">
            <div class="u-bg-overlay__inner text-center">
              <div class="g-mb-40">
                <h2 class="g-color-white">Vancouver, BC</h2>
                <p class="g-color-white-opacity-0_8">Unit 25 Suite 3, 925 Prospect PI,<br>Beach Resort, 23001</p>
              </div>

              <div class="g-mb-30">
                <h3 class="d-inline-block g-bg-primary-opacity-0_6 g-color-white g-font-weight-600 g-font-size-12 text-uppercase g-py-5 g-px-10">Phone number</h3>
                <span class="d-block g-color-white g-font-size-18">+01 (0) 333 444 55</span>
              </div>
            </div>
          </div>

          <hr class="g-brd-gray-light-v4 g-my-10">

          <div class="u-shadow-v25 u-bg-overlay g-bg-img-hero g-bg-white-gradient-opacity-v2--after g-py-40 g-px-20 g-mb-50" style="background-image: url(assets/img-temp/500x600/img1.jpg);">
            <div class="u-bg-overlay__inner text-center">
              <div class="g-mb-40">
                <h2 class="g-color-white">Vancouver, BC</h2>
                <p class="g-color-white-opacity-0_8">Unit 25 Suite 3, 925 Prospect PI,<br>Beach Resort, 23001</p>
              </div>

              <div class="g-mb-30">
                <h3 class="d-inline-block g-bg-primary-opacity-0_6 g-color-white g-font-weight-600 g-font-size-12 text-uppercase g-py-5 g-px-10">Phone number</h3>
                <span class="d-block g-color-white g-font-size-18">+01 (0) 333 444 55</span>
              </div>
            </div>
          </div>
          <hr class="g-brd-gray-light-v4 g-my-10">

          <div class="u-shadow-v25 u-bg-overlay g-bg-img-hero g-bg-white-gradient-opacity-v2--after g-py-40 g-px-20 g-mb-50" style="background-image: url(assets/img-temp/500x600/img1.jpg);">
            <div class="u-bg-overlay__inner text-center">
              <div class="g-mb-40">
                <h2 class="g-color-white">Vancouver, BC</h2>
                <p class="g-color-white-opacity-0_8">Unit 25 Suite 3, 925 Prospect PI,<br>Beach Resort, 23001</p>
              </div>

              <div class="g-mb-30">
                <h3 class="d-inline-block g-bg-primary-opacity-0_6 g-color-white g-font-weight-600 g-font-size-12 text-uppercase g-py-5 g-px-10">Phone number</h3>
                <span class="d-block g-color-white g-font-size-18">+01 (0) 333 444 55</span>
              </div>
            </div>
          </div>
          <hr class="g-brd-gray-light-v4 g-my-10">

          <div class="u-shadow-v25 u-bg-overlay g-bg-img-hero g-bg-white-gradient-opacity-v2--after g-py-40 g-px-20 g-mb-50" style="background-image: url(assets/img-temp/500x600/img1.jpg);">
            <div class="u-bg-overlay__inner text-center">
              <div class="g-mb-40">
                <h2 class="g-color-white">Vancouver, BC</h2>
                <p class="g-color-white-opacity-0_8">Unit 25 Suite 3, 925 Prospect PI,<br>Beach Resort, 23001</p>
              </div>

              <div class="g-mb-30">
                <h3 class="d-inline-block g-bg-primary-opacity-0_6 g-color-white g-font-weight-600 g-font-size-12 text-uppercase g-py-5 g-px-10">Phone number</h3>
                <span class="d-block g-color-white g-font-size-18">+01 (0) 333 444 55</span>
              </div>
            </div>
          </div>
          <hr class="g-brd-gray-light-v4 g-my-10">

          <div class="u-shadow-v25 u-bg-overlay g-bg-img-hero g-bg-white-gradient-opacity-v2--after g-py-40 g-px-20 g-mb-50" style="background-image: url(assets/img-temp/500x600/img1.jpg);">
            <div class="u-bg-overlay__inner text-center">
              <div class="g-mb-40">
                <h2 class="g-color-white">Vancouver, BC</h2>
                <p class="g-color-white-opacity-0_8">Unit 25 Suite 3, 925 Prospect PI,<br>Beach Resort, 23001</p>
              </div>

              <div class="g-mb-30">
                <h3 class="d-inline-block g-bg-primary-opacity-0_6 g-color-white g-font-weight-600 g-font-size-12 text-uppercase g-py-5 g-px-10">Phone number</h3>
                <span class="d-block g-color-white g-font-size-18">+01 (0) 333 444 55</span>
              </div>
            </div>
          </div>
          <hr class="g-brd-gray-light-v4 g-my-10">

          <div class="u-shadow-v25 u-bg-overlay g-bg-img-hero g-bg-white-gradient-opacity-v2--after g-py-40 g-px-20 g-mb-50" style="background-image: url(assets/img-temp/500x600/img1.jpg);">
            <div class="u-bg-overlay__inner text-center">
              <div class="g-mb-40">
                <h2 class="g-color-white">Vancouver, BC</h2>
                <p class="g-color-white-opacity-0_8">Unit 25 Suite 3, 925 Prospect PI,<br>Beach Resort, 23001</p>
              </div>

              <div class="g-mb-30">
                <h3 class="d-inline-block g-bg-primary-opacity-0_6 g-color-white g-font-weight-600 g-font-size-12 text-uppercase g-py-5 g-px-10">Phone number</h3>
                <span class="d-block g-color-white g-font-size-18">+01 (0) 333 444 55</span>
              </div>
            </div>
          </div>
   

          {{--  <!-- Newsletter -->
          <div class="g-mb-10">
            <h3 class="h5 g-color-black g-font-weight-600 mb-4">Newsletter</h3>
            <div class="input-group">
              <span class="input-group-btn">
                  <button class="btn u-btn-primary g-rounded-left-50 g-py-13 g-px-20">
                    <i class="icon-communication-062 u-line-icon-pro g-pos-rel g-top-1"></i>
                  </button>
                </span>
              <input class="form-control g-brd-primary g-placeholder-gray-dark-v5 border-left-0 g-rounded-right-50 g-px-15" type="email" placeholder="Enter your email ...">
            </div>
          </div>
          <!-- End Newsletter --> --}}
        </div>
      </div>
    </div>
  </div>
</div>

@section('js')
 <!-- JS Revolution Slider -->
 <script src="{{asset('main-assets/assets/vendor/revolution-slider/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
 <script src="{{asset('main-assets/assets/vendor/revolution-slider/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>

 <script src="{{asset('main-assets/assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
 <script src="{{asset('main-assets/assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
 <script src="{{asset('main-assets/assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
 <script src="{{asset('main-assets/assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
 <script src="{{asset('main-assets/assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
 <script src="{{asset('main-assets/assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
 <script src="{{asset('main-assets/assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
 <script src="{{asset('main-assets/assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
 <script src="{{asset('main-assets/assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
 <script>
    var tpj = jQuery;

var revapi477;
tpj(document).ready(function () {
  if (tpj("#rev_slider_477_1").revolution == undefined) {
    revslider_showDoubleJqueryError("#rev_slider_477_1");
  } else {
    revapi477 = tpj("#rev_slider_477_1").show().revolution({
      sliderType: "standard",
      jsFileLocation: "revolution/js/",
      sliderLayout: "auto",
      dottedOverlay: "none",
      delay: 9000,
      navigation: {
        keyboardNavigation: "off",
        keyboard_direction: "horizontal",
        mouseScrollNavigation: "off",
        mouseScrollReverse: "default",
        onHoverStop: "on",
        touch: {
          touchenabled: "on",
          swipe_threshold: 75,
          swipe_min_touches: 50,
          swipe_direction: "horizontal",
          drag_block_vertical: false
        }
        ,
        thumbnails: {
          style: "gyges",
          enable: true,
          width: 80,
          height: 80,
          min_width: 80,
          wrapper_padding: 10,
          wrapper_color: "#333333",
          wrapper_opacity: "0",
          tmp: '<span class="tp-thumb-img-wrap">  <span class="tp-thumb-image"></span></span>',
          visibleAmount: 5,
          hide_onmobile: false,
          hide_onleave: false,
          direction: "vertical",
          span: true,
          position: "inner",
          space: 5,
          h_align: "left",
          v_align: "top",
          h_offset: 0,
          v_offset: 0
        }
      },
      responsiveLevels: [1240, 1024, 778, 480],
      visibilityLevels: [1240, 1024, 778, 480],
      gridwidth: [1200, 1024, 778, 480],
      gridheight: [600, 600, 600, 450],
      lazyType: "single",
      parallax: {
        type: "scroll",
        origo: "slidercenter",
        speed: 400,
        levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 51, 55],
        type: "scroll",
      },
      shadow: 0,
      spinner: "off",
      stopLoop: "off",
      stopAfterLoops: -1,
      stopAtSlide: -1,
      shuffle: "off",
      autoHeight: "off",
      hideThumbsOnMobile: "off",
      hideSliderAtLimit: 0,
      hideCaptionAtLimit: 0,
      hideAllCaptionAtLilmit: 0,
      debugMode: false,
      fallbacks: {
        simplifyAll: "off",
        nextSlideOnWindowFocus: "off",
        disableFocusListener: false,
      }
    });
  }
});
   </script>
@endsection
<!-- End Blog Minimal Blocks -->
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $('.loading').hide();
    $('#spinner').hide();
    $('#posts-end').hide();
    $(document).on('click',"[id*='ShowMore']",function(event){
            var id = $(this).attr("id").slice(8);
            $('#MoreDiv'+id).attr("hidden","true");
            $('#LessDiv'+id).removeAttr('hidden');
        });
    $(document).on('click',"[id*='ShowLess']",function(event){
            var id = $(this).attr("id").slice(8);
            $('#LessDiv'+id).attr("hidden","true");
            $('#MoreDiv'+id).removeAttr('hidden');
            $('html, body').animate({
              scrollTop: $("#ShowMore"+id).offset().top
            },200);
        });
        if($(window).width() >= 994){
        $(window).scroll(fetchPosts);
        }
        if($(window).width()<=995){
          $('#view-more').click(viewmore);
        }
        
function viewmore(){
  var page = $('.endless-pagination').data('next-page');
  if(page===null)
  {
    $('#view-more').remove();
    $('#posts-end').show();
    $('#end-posts').html("No Posts to display!");
    $('#posts-end').fadeOut(4000);
  }
  if(page !== null) {
    $('#spinner').show();
    $.get(page, function(data){
                     $('.posts').append(data.posts);
                     $('.endless-pagination').data('next-page', data.next_page);
                    $('#spinner').hide();
        });
  }
}
function fetchPosts() {

     var page = $('.endless-pagination').data('next-page');

     if(page !== null) {
        $('.loading').show();
         clearTimeout( $.data( this, "scrollCheck" ) );

         $.data( this, "scrollCheck", setTimeout(function() {
             var scroll_position_for_posts_load = $(window).height() + $(window).scrollTop() + 500;

             if(scroll_position_for_posts_load >= $(document).height()) {
                 $.get(page, function(data){
                     $('.posts').append(data.posts);
                     $('.endless-pagination').data('next-page', data.next_page);
                    $('.loading').hide();
                 });
             }
         }, 350))
     }
    //  else{
      // $('.loading').hide();
    //  }
 }
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
<script>
function moveScroller() {
    var $anchor = $("#scroller-anchor");
    var $scroller = $('#scroller');

    var move = function() {
        var st = $(window).scrollTop();
        var ot = $anchor.offset().top;
        if(st > ot) {
            $scroller.css({
                position: "fixed",
                top: "0px"
            });
        } else {
            $scroller.css({
                position: "relative",
                top: ""
            });
        }
    };
    $(window).scroll(move);
    move();
}
  </script>

@if(Request::is('home/*'))
  <script>
    $(document).ready(function(){
      $('html, body').animate({
              scrollTop: $("#articles_division").offset().top
            },1000);
   
    });
  </script>

@endif
@stop


