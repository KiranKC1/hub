@extends('layouts.app')
@section('body')
@section('title','Post'.' | '.$posts->title )
<style>
  .share-it{
	position:fixed;
	min-height:200px;
	width:40px;
	background:#fff;
	left:0;
	z-index:9;
	top:40%;
}	
.share-it i{
	font-size:16px;
}
	
a.multipage{background:#ee3046; border:2px #ee3046 solid; color:#fff;} 	
a.multipage:hover{background:#fff; border:2px #fff solid; color:#333;} 	
	
	
	.facebook{margin:0 auto; float:right; margin-left:4px;}
.facebook  a{
	color:#fff;
	padding:10px 16px;
	background-color:#527aba;
	display:inline-block;
	transition:0.5s ease;
}
.facebook  a:hover{
	color:#fff;
	padding:10px 20px;
	margin-right:-20px;
	background-color:#527aba;
	display:inline-block;
}

.twitter{margin:0 auto; float:right; margin-left:4px;}
.twitter  a{
	color:#fff;
	padding:10px 16px;
	background-color:#77cdf1;
	display:inline-block;
	text-align:center;
	transition:0.5s ease;
}
.twitter  a:hover{
	color:#fff;
	padding:10px 20px;
	margin-right:-20px;
	background-color:#77cdf1;
	display:inline-block;
	text-align:center;

}

.google{margin:0 auto; float:right; margin-left:4px;}
.google  a{
	color:#fff;
	padding:10px 16px;
	background-color:#4c4c4c;
	display:inline-block;
	transition:0.5s ease;
}
.google  a:hover{
	color:#fff;
	padding:10px 20px;
	margin-right:-20px;
	background-color:#4c4c4c;
	display:inline-block;
	
}

.rss{margin:0 auto; float:right; margin-left:4px;}
.rss a{
	color:#fff;
	padding:10px 16px;
	background-color:#fe8f19;
	display:inline-block;
	transition:0.5s ease;
}
.rss a:hover{
	color:#fff;
	padding:10px 20px;
	margin-right:-20px;
	background-color:#fe8f19;
	display:inline-block;
}

.linkedin{margin:0 auto; float:right; margin-left:4px;}
.linkedin a{
	color:#fff;
	padding:10px 16px;
	background-color:#157ecc;
	display:inline-block;
	transition:0.5s ease;
}
.linkedin a:hover{
	color:#fff;
	padding:10px 20px;
	margin-right:-20px;
	background-color:#157ecc;
	display:inline-block;
	
}

.youtube{margin:0 auto; float:right; margin-left:4px;}
.youtube a{
	color:#fff;
	padding:10px 16px;
	background-color:#fe322f;
	display:inline-block;
	transition:0.5s ease;
}
.youtube a:hover{
	color:#fff;
	padding:10px 20px;
	margin-right:-20px;
	background-color:#fe322f;
	display:inline-block;
	transition:0.3s ease;
}
@media screen and (max-width: 993px){
  #social_share_options { display:none; }   /* hide it elsewhere */
}
@media screen and (min-width: 993px){
  #social_share_mini { display:none; }
}
  </style>
<div id="social_share_options" class="container">
    <div class="row">
    <div class="share-it">
      <div class="facebook">
       <a href="#"><i class="fa fa-facebook"></i></a>
      </div>
      <div class="twitter">
       <a href="#"><i class="fa fa-twitter"></i></a>
      </div>
      <div class="google hidden-xs">
       <a href="#"><i class="fa fa-google-plus"></i></a>
      </div>
      <div class="rss">
       <a href="#"><i class="fa fa-rss"></i></a>
      </div>
      <div class="linkedin">
       <a href="#"><i class="fa fa-linkedin"></i></a>
      </div>
      <hr>
      <div class="twitter">
        <a href="#"><i class="fa fa-comment"></i></a>
       </div>
      </div>
    </div>
  </div>
    <!-- Blog Single Item Info -->
    <section class="container g-pt-50 g-pb-10">
      <div class="row justify-content-center">
        <div class="col-lg-9">
          <div class="g-mb-60">
            <div class="mb-5 text-center">
            <p class="h2 g-color-black g-font-weight-600">{{$posts->title}}</p>
            </div>

            <!-- Author -->
            <div class="media align-items-center g-brd-bottom g-brd-gray-light-v4 pb-3 mb-3">

                @if($posts->picture == 'users.png' || $posts->picture == null)
            <img class="d-flex img-fluid g-width-40 g-height-40 rounded-circle mr-3" src="{{asset('hub-images/users.png')}}" alt="{{$posts->name}}">
              @else
            <img class="d-flex img-fluid g-width-40 g-height-40 rounded-circle mr-3" src="{{asset('hub-images/users-images'.'/'.$posts->picture)}}" alt="{{$posts->name}}">
              @endif
              @if($posts->name == null)
              <div class="media-body">
              <h4 class="h6 g-color-black g-font-weight-600 mb-0">By EduHub</h4>
                <span class="d-block g-color-gray-dark-v5 g-font-size-12">{{date('M j, Y',strtotime($posts->created_at))}}</span>
              </div>
              @else
              <div class="media-body">
                  <h4 class="h6 g-color-black g-font-weight-600 mb-0">By {{$posts->name}}</h4>
                    <span class="d-block g-color-gray-dark-v5 g-font-size-12">{{date('M j, Y',strtotime($posts->created_at))}} </span>
              </div>
              @endif
              

              <!-- Figure Social Icons -->
              <ul id="social_share_mini" class="list-inline mb-0">
                <li class="list-inline-item g-mx-2">
                  <a class="u-icon-v2 u-icon-size--xs g-brd-gray-light-v4 g-brd-primary--hover g-color-gray-dark-v3 g-color-white--hover g-bg-primary--hover rounded-circle g-text-underline--none--hover" href="#!">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item g-mx-2">
                  <a class="u-icon-v2 u-icon-size--xs g-brd-gray-light-v4 g-brd-primary--hover g-color-gray-dark-v3 g-color-white--hover g-bg-primary--hover rounded-circle g-text-underline--none--hover" href="#!">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item g-mx-2">
                  <a class="u-icon-v2 u-icon-size--xs g-brd-gray-light-v4 g-brd-primary--hover g-color-gray-dark-v3 g-color-white--hover g-bg-primary--hover rounded-circle g-text-underline--none--hover" href="#!">
                    <i class="fa fa-google-plus"></i>
                  </a>
                </li>
                <li class="list-inline-item g-mx-2">
                  <a class="u-icon-v2 u-icon-size--xs g-brd-gray-light-v4 g-brd-primary--hover g-color-gray-dark-v3 g-color-white--hover g-bg-primary--hover rounded-circle g-text-underline--none--hover" href="#!">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </li>
              </ul>
              <!-- End Figure Social Icons -->
            </div>
          {!!$posts->description!!}
          </div>
        </div>
      </div>
    </section>
    <!-- End Blog Single Item Info -->
    <!-- Blog Single Item Author -->
    <section class="container">
      <div class="row justify-content-center">
        <div class="col-lg-9">
          <!-- Tags -->
          <div class="g-mb-0">
            <ul class="u-list-inline">
              @foreach($posts->tags as $tag)
              <li class="list-inline-item g-mb-10">
              <a class="u-tags-v1 g-brd-around g-brd-gray-dark-v5 g-brd-primary--hover g-color-black g-color-white--hover g-bg-primary--hover g-font-weight-600 g-font-size-12 g-rounded-50 g-py-4 g-px-15" href="#!">{{$tag->name}}</a>
              </li>
              @endforeach
            </ul>
          </div>
          <!-- End Tags -->

          <!-- Social Icons -->
          <div>
              <ul class="list-inline g-brd-y g-brd-gray-light-v3 g-font-size-13 g-py-13 mb-0">
                  <li class="list-inline-item g-color-gray-dark-v4 mr-2">
                    <span class="d-inline-block g-color-gray-dark-v4">
                      @if($posts->picture == 'users.png' || $posts->picture == null)
                    <img class="g-g-width-40 g-height-40 rounded-circle mr-2" src="{{asset('hub-images/users.png')}}" alt="{{$posts->name}}">
                    @else
                    <img class="g-g-width-40 g-height-40 rounded-circle mr-2" src="{{asset('hub-images/users-images'.'/'.$posts->picture)}}" alt="{{$posts->name}}">
                    @endif
                    @if($posts->name != null)
                        {{$posts->name}}
                    @else
                        EzuHub
                    @endif    
                      </span>
                  </li>
                  
                 
              {{-- @else --}}
              <li class="list-inline-item pull-center" style="margin-left:20px;">
                @if(Auth::User())
              <a id="likearticle{{$posts->id}}" 
                @if(!in_array($posts->id,$likes))
                cid="like"
                @else
                cid="liked"
                @endif
                class="g-color-primary-dark-v5 g-color-gray--hover g-font-size-default g-transition-0_3 g-text-underline--none--hover" href="javascript:;">
              <i  {{in_array($posts->id,$likes)?'hidden':''}} id="like{{$posts->id}}" class="align-middle mr-1 fa fa-thumbs-o-up" style="font-size:30px;"></i>
              <i  {{!in_array($posts->id,$likes)?'hidden':''}} id="unlike{{$posts->id}}" class="align-middle mr-1 fa fa-thumbs-up u-line-icon-pro" style="font-size:30px;"></i>
                </a>
                <span id="countlike{{$posts->id}}" class="g-color-gray-dark-v5">{{$posts->likeusers()->count()}}</span>
      
                @if($posts->likeusers()->count() > 1)
                <span class="g-color-gray-dark-v5"> likes</span>
                  @else
                <span class="g-color-gray-dark-v5"> like</span>
                @endif
          
                @else
              <a  class="g-color-gray-dark-v5 g-color-red--hover g-font-size-default g-transition-0_3 g-text-underline--none--hover" href="{{URL::to('login')}}">
                  <i class="align-middle mr-1 fa fa-thumbs-o-up u-line-icon-pro" style="font-size:30px;"></i>  
                </a>
                <span id="countlike{{$posts->id}}" class="g-color-gray-dark-v5">{{$posts->likeusers()->count()}}</span>
                @if($posts->likeusers()->count() > 1)
                <span class="g-color-gray-dark-v5"> likes</span>
                  @else
                <span class="g-color-gray-dark-v5"> like</span>
                @endif
                @endif
              </li>         
                  <a hidden class="u-link-v5 g-color-main g-color-primary--hover hidden pull-right" id="article_spinner{{$posts->id}}" style="margin-right:30px; margin-top:5px;">
                      <i class="fa fa-spinner fa-spin"></i>
                    </a>
                  @if(Auth::User())
                  <a  {{!in_array($posts->id,$saves)?'hidden':''}} class="u-link-v5 g-color-main g-color-primary--hover pull-right" href="javascript:;" style="padding-top:5px;" data-toggle="tooltip" data-placement="top" title="Unsave Article" id="unsavepost{{$posts->id}}">
                    <i class="fa fa-bookmark-o g-color-red-dark-v5 g-mr-5" style="color:red;"></i> Bookmarked
                  </a> 
                  <a  {{in_array($posts->id,$saves)?'hidden':''}} class="u-link-v5 g-color-main g-color-primary--hover pull-right"  href="javascript:;" style="padding-top:5px;" id="savearticle{{$posts->id}}">
                        <i  class="fa fa-bookmark-o g-color-gray-dark-v5 g-mr-5"></i> Bookmark
                  </a>
                   @else
                <a  class="u-link-v5 g-color-main g-color-primary--hover pull-right"  href="{{URL::to('login')}}" style="padding-top:5px;">
                    <i  class="fa fa-bookmark-o g-color-gray-dark-v5 g-mr-5"></i> Bookmark
                  </a>
                  @endif
                </ul>
          </div>
          <!-- End Social Icons -->

          <!-- Author -->
          @if($posts->about !=null)
          <div class="g-brd-top g-brd-gray-light-v3 g-pt-30 g-pb-10">
            <div class="row justify-content-between">
              <div class="media">
                @if($posts->picture == null || $posts->picture == 'users.png')
                  <img class="d-flex img-fluid g-width-40 g-height-40 rounded-circle mr-3" src="{{asset('hub-images/users.png')}}" alt="{{$posts->name}}">
                @else
                <img class="d-flex img-fluid g-width-40 g-height-40 rounded-circle mr-3" src="{{asset('hub-images/users-images'.'/'.$posts->picture)}}" alt="{{$posts->name}}">
                @endif
                
                <div class="media-body">
                <h4 class="h5 g-color-black g-font-weight-600">{{$posts->name}}</h4>
                  <p class="g-color-gray-dark-v5 mb-4">I am an ambitious workaholic, but apart from that, pretty simple person. Whether it's branding, print, UI + UX I've got you covered. I strive to figure out the right solutions for your look to stand out amongst the rest.</p>
                  <a class="btn u-btn-outline-primary g-brd-gray-light-v1 g-font-weight-600 g-font-size-12 text-uppercase g-py-12 g-px-25" href="#!">Posts by this author</a>
                </div>
              </div>
            </div>
          </div>
          @endif 
          <!-- End Author -->
        </div>
      </div>
    </section>
    <!-- End Blog Single Item Author -->

    <!-- Related Posts -->
    @if($relatedposts->count() != null)
    <section class="g-bg-white-light-v5">
      <div class="container g-pt-50 g-pb-10">
        <h3 class="h5 g-color-black g-font-weight-600 text-center text-uppercase g-mb-20">Related Posts</h3>

        <div class="row">
          @foreach($relatedposts as $r)
          <div class="col-sm-6 col-lg-4 g-mb-30">
            <!-- Blog Classic Blocks -->
            <article class="u-shadow-v19 g-bg-white">
                @if($r->featured_image == null)
                <?php
                $cat=$categories->where('id','=',$r->category_id)->first();
                $cat_image = $cat->category_image;
                ?>
                <img class="img-fluid w-100" src="{{asset('hub-images/posts-images'.'/'.$r->featured_image)}}" alt="{{$r->title}}">
                @else
                <img class="img-fluid w-100" src="{{asset('hub-images/posts-images'.'/'.$r->featured_image)}}" alt="{{$r->title}}">
                @endif
            
              <div class="g-bg-white g-pa-30">
                <span class="d-block g-color-gray-dark-v4 g-font-weight-600 g-font-size-12 text-uppercase mb-2"> {{date('M j, Y',strtotime($r->created_at))}} </span>
                <h2 class="h5 g-color-black g-font-weight-600 mb-3">
                <a class="u-link-v5 g-color-black g-color-primary--hover g-cursor-pointer" href="{{URL::to('posts'.'/'.$r->slug)}}">{{$r->title}}</a>
                  </h2>
                <p class="g-color-gray-dark-v4 g-line-height-1_8">{{str_limit(strip_tags($r->description),100)}}</p>
              </div>
            </article>
            <!-- End Blog Classic Blocks -->
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- End Related Posts -->
    @endif

    {{-- <!-- Blog Single Item Comments -->
    <section class="container g-pb-20">
      <div class="row justify-content-center">
        <div class="col-lg-9">
          <!-- Blog Single Item Comments -->
          <div class="g-brd-bottom g-brd-gray-light-v4 g-pb-30 g-mb-50">
            <div class="g-brd-y g-brd-gray-light-v4 g-py-30 mb-5">
              <h3 class="h6 g-color-black g-font-weight-600 text-uppercase mb-0">3 Comments</h3>
            </div>

            <div class="media g-mb-30">
              <img class="d-flex g-width-60 g-height-60 rounded-circle g-mt-3 g-mr-20" src="../../assets/img-temp/100x100/img7.jpg" alt="Image Description">
              <div class="media-body">
                <div class="d-flex align-items-start g-mb-15 g-mb-10--sm">
                  <div class="d-block">
                    <h5 class="h6 g-color-black g-font-weight-600">James Coolman</h5>
                    <span class="d-block g-color-gray-dark-v5 g-font-size-11">June 7, 2017</span>
                  </div>
                  <div class="ml-auto">
                    <a class="u-link-v5 g-color-black g-color-primary--hover g-font-weight-600 g-font-size-12 text-uppercase" href="#!">Reply</a>
                  </div>
                </div>

                <p>The time has come to bring those ideas and plans to life. This is where we really begin to visualize your napkin sketches and make them into beautiful pixels. Whether through commerce or just an experience to tell your brand's story, the
                  time has come to start using development languages that fit your projects needs.</p>

                <ul class="list-inline my-0">
                  <li class="list-inline-item g-mr-20">
                    <a class="g-color-gray-dark-v5 g-text-underline--none--hover" href="#!">
                      <i class="icon-like g-pos-rel g-top-1 g-mr-3"></i> 5
                    </a>
                  </li>
                  <li class="list-inline-item g-mr-20">
                    <a class="g-color-gray-dark-v5 g-text-underline--none--hover" href="#!">
                      <i class="icon-finance-206 u-line-icon-pro g-pos-rel g-top-1 g-mr-3"></i> 1
                    </a>
                  </li>
                </ul>
              </div>
            </div>

            <div class="media g-brd-top g-brd-gray-light-v4 g-pt-30 g-ml-40 g-mb-30">
              <img class="d-flex g-width-60 g-height-60 rounded-circle g-mt-3 g-mr-15" src="../../assets/img-temp/100x100/img4.jpg" alt="Image Description">
              <div class="media-body">
                <div class="d-flex align-items-start g-mb-15 g-mb-10--sm">
                  <div class="d-block">
                    <h5 class="h6 g-color-black g-font-weight-600">Alberta Watson</h5>
                    <span class="d-block g-color-gray-dark-v5 g-font-size-11">June 7, 2017</span>
                  </div>
                  <div class="ml-auto">
                    <a class="u-link-v5 g-color-black g-color-primary--hover g-font-weight-600 g-font-size-12 text-uppercase" href="#!">Reply</a>
                  </div>
                </div>

                <p>Now that your brand is all dressed up and ready to party, it's time to release it to the world. By the way, let's celebrate already.</p>

                <ul class="list-inline my-0">
                  <li class="list-inline-item g-mr-20">
                    <a class="g-color-gray-dark-v5 g-text-underline--none--hover" href="#!">
                      <i class="icon-like g-pos-rel g-top-1 g-mr-3"></i> 2
                    </a>
                  </li>
                  <li class="list-inline-item g-mr-20">
                    <a class="g-color-gray-dark-v5 g-text-underline--none--hover" href="#!">
                      <i class="icon-finance-206 u-line-icon-pro g-pos-rel g-top-1 g-mr-3"></i> 0
                    </a>
                  </li>
                </ul>
              </div>
            </div>

            <div class="media g-brd-top g-brd-gray-light-v4 g-pt-30 g-mb-30">
              <img class="d-flex g-width-60 g-height-60 rounded-circle g-mt-3 g-mr-15" src="../../assets/img-temp/100x100/img14.jpg" alt="Image Description">
              <div class="media-body">
                <div class="d-flex align-items-start g-mb-15 g-mb-10--sm">
                  <div class="d-block">
                    <h5 class="h6 g-color-black g-font-weight-600">David Lee</h5>
                    <span class="d-block g-color-gray-dark-v5 g-font-size-11">June 7, 2017</span>
                  </div>
                  <div class="ml-auto">
                    <a class="u-link-v5 g-color-black g-color-primary--hover g-font-weight-600 g-font-size-12 text-uppercase" href="#!">Reply</a>
                  </div>
                </div>

                <p>We get it, you're busy and it's important that someone keeps up with marketing and driving people to your brand. We've got you covered.</p>

                <ul class="list-inline my-0">
                  <li class="list-inline-item g-mr-20">
                    <a class="g-color-gray-dark-v5 g-text-underline--none--hover" href="#!">
                      <i class="icon-like g-pos-rel g-top-1 g-mr-3"></i> 0
                    </a>
                  </li>
                  <li class="list-inline-item g-mr-20">
                    <a class="g-color-gray-dark-v5 g-text-underline--none--hover" href="#!">
                      <i class="icon-finance-206 u-line-icon-pro g-pos-rel g-top-1 g-mr-3"></i> 0
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- End Blog Single Item Comments -->

          <h3 class="h6 g-color-black g-font-weight-600 text-uppercase g-mb-30">Add Comment</h3>

          <form>
            <div class="row">
              <div class="col-md-6 form-group g-mb-30">
                <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--focus rounded-3 g-py-13 g-px-15" type="text" placeholder="First name">
              </div>

              <div class="col-md-6 form-group g-mb-30">
                <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--focus rounded-3 g-py-13 g-px-15" type="email" placeholder="Email">
              </div>
            </div>
          </form>

          <div class="g-mb-30">
            <textarea class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--focus g-resize-none rounded-3 g-py-13 g-px-15" rows="12" placeholder="Your message"></textarea>
          </div>

          <button class="btn u-btn-primary g-font-weight-600 g-font-size-12 text-uppercase g-py-12 g-px-25" type="submit" role="button">Add Comment</button>
        </div>
      </div>
      </div>
    </section>
    <!-- End Blog Single Item Comments --> --}}
  
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
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
  </script>
@endsection