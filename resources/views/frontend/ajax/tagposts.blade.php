<!-- Blog Minimal Blocks -->
@foreach($posts as $p)
<input type="hidden" id="articlename{{$p->id}}" value="{{$p->title}}"/>
    <article class="g-mb-30">
      <div class="g-mb-0">
        
        @if($p->featured_image!=null)
      <div class="row"  id="MoreDiv{{$p->id}}">
          <div class="col-md-12" style="padding-bottom: 0px;">
        <h2 class="h4 g-color-black g-font-weight-600">
        <a class="u-link-v5 g-color-black g-color-primary--hover" href="{{URL::to('posts'.'/'.$p->slug)}}">{{$p->title}}</a>
          </h2>
          <span style="margin-bottom:10px;" class="d-block g-color-gray-dark-v4 g-font-weight-700 g-font-size-12 text-uppercase mb-7"><i class="fa fa-clock"></i> {{date('M j, Y',strtotime($p->created_at))}} | {{$p->name}}</span>
          <div class="row">
            <div class="col-xs-6 col-md-9">
              <p class="g-color-gray-dark-v4 g-line-height-1_8 g-font-weight-500">{{str_limit(strip_tags($p->description),375)}}</p>
            </div>
            <div class="col-xs-6 col-md-3" style="padding-bottom:25px;">
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
    <a class="u-link-v5 g-color-black g-color-primary--hover" href="javascript:;">{{$p->title}}</a>
      </h2>
      <span style="margin-bottom:10px;" class="d-block g-color-gray-dark-v4 g-font-weight-700 g-font-size-12 text-uppercase mb-7"><i class="fa fa-clock"></i> {{date('M j, Y',strtotime($p->created_at))}} | {{$p->name}}</span>
    <p class="g-color-gray-dark-v4 g-line-height-1_8">{{str_limit(strip_tags($p->description),300)}}</p>
    <a class="g-font-size-13" href="javascript:;" id="ShowMore{{$p->id}}">Read more...</a>
    </div>
  <div id="LessDiv{{$p->id}}" hidden>
        <h2 class="h4 g-color-black g-font-weight-600 ">
            <a class="u-link-v5 g-color-black g-color-primary--hover" href="#!">{{$p->title}}</a>
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
            @if($p->picture == 'users.png' || $p->picture == null)
          <img class="g-g-width-40 g-height-40 rounded-circle mr-2" src="{{asset('hub-images/users.png')}}" alt="{{$p->author}}">
          @else
          <img class="g-g-width-40 g-height-40 rounded-circle mr-2" src="{{asset('hub-images/users-images'.'/'.$p->picture)}}" alt="{{$p->author}}">
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
    <!-- End Blog Minimal Blocks -->