@extends('layouts.app')
@section('body')
@section('title','Opportunities')
<style>
  @media screen and (max-width: 992px) {
  .addopportunities {
    visibility: hidden;
  }

}
</style>
<section class="g-bg-size-cover g-bg-pos-center g-bg-cover g-bg-black-opacity-0_5--after g-color-white g-py-50 g-mb-20" style="background-image: url({{asset('main-assets/stock/opportunities.jpg')}});
background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
  <div class="container g-bg-cover__inner">
    <header class="g-mb-20">
      <h3 class="h5 g-font-weight-300 g-mb-5">Opportunities</h3>
      <h2 class="h1 g-font-weight-300 text-uppercase">DISCOVER,<span class="g-color-primary"> APPLY,</span>
        JOIN
      </h2>
    </header>

    <ul class="u-list-inline">
      <li class="list-inline-item g-mr-7">
        <a class="u-link-v5 g-color-white g-color-primary--hover" href="#!">Home</a>
        <i class="fa fa-angle-right g-ml-7"></i>
      </li>
      <li class="list-inline-item g-color-primary">
        <span>Opportunities</span>
      </li>
    </ul>
  </div>
</section>
<!-- Blog Minimal Blocks -->
<div class="container g-pt-10 g-pb-10">
<div class="row justify-content-between">
<div class="col-lg-12">
    <div class="row">
        <div class="col-sm-9">
          <!-- Area of Interest -->
          <h3>Area of Interest</h3>
          <select id="select_categories" class="js-custom-select w-100 u-select-v2 u-shadow-v19 g-brd-none g-color-black g-color-primary--hover g-bg-white text-left g-rounded-30 g-pl-30 g-py-12" data-placeholder="Area of Interest" data-open-icon="fa fa-angle-down" data-close-icon="fa fa-angle-up">
          <option
          @if(Request::is('opportunities'))
          selected="selected"
          @endif
           class="g-brd-secondary-light-v2 g-color-black g-color-white--active g-bg-primary--active" value="{{URL::to('opportunities')}}">All</option>
            @foreach($categories as $c)
          <option
          @if(Request::is('opportunities/category'.'/'.$c->slug))
          selected="selected"
          @endif 
          class="g-brd-secondary-light-v2 g-color-black g-color-white--active g-bg-primary--active" value="{{URL::to('opportunities/category'.'/'.$c->slug)}}">{{$c->name}}</option>
           @endforeach
          </select>
          <!-- End Area of Interest -->
        </div>
        <div class="g-mb-5 addopportunities">
          <a href="#!"  class="btn btn-md u-btn-primary u-btn-hover-v1-4 g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50 g-mr-10 g-mb-0" style="margin-bottom: 0px; top: 45px;left:25px;">
              <i class="fa fa-check-circle g-mr-3"></i>
              Add Opportunities
            </a>
      </div>
      </div>
 <!-- Popular Jobs -->
 <section class="g-py-20">
    <div class="container">
      <h3 style="padding-top:5px; padding-bottom:5px;">Opportunities</h3>
      <div class="row g-mb-30 opportunities endless-pagination"  data-next-page="{{$opportunities->nextPageUrl()}}">
        @foreach($opportunities as $o)
        <div class="col-lg-4 g-mb-40 g-mb-0--lg">
          <ul class="list-unstyled mb-0">
            <li class="media u-shadow-v11 rounded g-pa-20 g-mb-10">
              <div class="d-flex align-self-center g-mt-3 g-mr-15">
                <img class="g-width-40 g-height-40" src="{{asset('hub-images/opportunities-images'.'/'.$o->featured_image)}}" alt="Image Description">
              </div>
              <div class="media-body">
              <a class="d-block u-link-v5 g-color-main g-color-primary--hover g-font-weight-600 g-mb-3"  
              @if(strlen($o->title)>16)
              data-toggle="tooltip" data-placement="top" title="{{$o->title}}"
              @endif  href="{{route('single.opportunities',$o->slug)}}">{{str_limit(strip_tags($o->title),29
              )}}</a>
                <span class="g-font-size-13 g-color-gray-dark-v4 g-mr-15">
                    <i class="icon-directions g-pos-rel g-top-1 mr-1"></i> {{$o->organization}}
                  </span>
              </div>
            </li>
          </ul>
        </div>
        @endforeach
      </div>

      @if($counto > 12)
     
      <div class="text-center view-more" id="view-more">
        <a class="btn u-shadow-v33 g-color-white g-color-white--hover g-bg-primary g-bg-main--hover g-rounded-30 g-px-25 g-py-10 g-mb-10"><i class="fa fa-cog fa-spin" id="spinner"></i> View More Opportunities</a>
      </div> 
      <div class="text-center" id="opportunities-end">
        <p id="end-opportunities"></p>
      </div> 
      @endif
    </div>
  </section>
  <!-- End Popular Jobs -->
  <!-- Recent Jobs -->
  
</div>
 {{-- <div class="col-lg-3 g-brd-left--lg g-brd-gray-light-v4 g-mb-20"> --}}
    {{-- <div class="g-pl-20--lg"> --}}
      {{-- <div id="stickyblock-start" class="js-sticky-block g-sticky-block--lg g-pt-5 --}}
      {{-- " data-start-point="#stickyblock-start" data-end-point="#stickyblock-end"> --}}
      {{--  Write To US Start  --}}
      {{-- <div class="g-mb-5"> --}}
          {{-- <a href="#!"  class="btn btn-md u-btn-primary u-btn-hover-v1-4 g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50 g-mr-10 g-mb-15">
              <i class="fa fa-check-circle g-mr-3"></i>
              Add Opportunities
            </a>
      </div>
       End Write To US Start  --}}
              {{-- <div class="g-mb-5">
                  <h3 class="h5 g-color-black g-font-weight-600 mb-4">Latest Posts</h3>
                  <ul class="list-unstyled g-font-size-13 mb-0">
                    @foreach($posts as $post)
                      <li>
                          <article class="media g-mb-10">
                            @if($post->featured_image == null)
                            <img class="g-width-50 g-height-50 rounded-circle" src="{{asset('main-assets/assets/img-temp/100x100/img5.jpg')}}" alt="Image Description" style="
                            margin-right: 10px;">
                            @else
                          <img class="g-width-50 g-height-50 rounded-circle" src="{{asset('hub-images/posts-images'.'/'.$post->featured_image)}}" alt="{{$post->title}}" style="
                            margin-right: 10px;">
                            @endif
                            <div class="media-body">
                            <h4 class="h6 g-color-black g-font-weight-600">{{str_limit(strip_tags($post->title),22)}}</h4>
                              <p class="g-color-gray-dark-v4">{{str_limit(strip_tags($post->description),80)}}</p>
                            </div>
                          </article>
                        </li>
                    @endforeach    
                  </ul>
                </div>
 

        <hr class="g-brd-gray-light-v4 g-my-15"> --}}

        <!-- Newsletter -->
        {{-- <div class="g-mb-20">
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
        <!-- End Newsletter -->
      </div>
    </div>
  </div> --> --}}
  {{-- @if($counto >= 12)
<section class="g-py-30">
    <div class="container">
      <header class="text-center g-width-60x--md mx-auto g-mb-50">
        <h2 class="h1 g-color-gray-dark-v1 g-font-weight-300">Most Viewed Opportunities</h2>
        <p class="lead">Ut fringilla lectus tellusimp imperdiet molestie. Nullam elementum tincidunt massa, a pulvinar leo ultricies ut.</p>
      </header>

      <div class="row g-mb-30">
        <div class="col-lg-4 g-mb-30 g-mb-0--lg">
          <!-- Recent Jobs -->
          <article class="u-shadow-v11 rounded g-pa-25">
            <h2 class="h4 g-mb-15">
                <a class="u-link-v5 g-color-gray-dark-v1 g-color-primary--hover" href="#!">Junior UX Designer</a>
              </h2>

            <ul class="list-inline d-flex justify-content-between g-mb-15">
              <li class="list-inline-item g-mr-20">
                <img class="g-height-25 g-width-25 rounded-circle g-mr-5" src="../../assets/img-temp/100x100/img1.jpg" alt="Image Description"> <a class="u-link-v5 g-color-main g-color-primary--hover" href="#!">Htmlstream</a>
              </li>
              <li class="list-inline-item">
                <span class="js-rating d-block g-color-primary" data-rating="5"></span>
              </li>
            </ul>

            <p class="g-mb-15">Nullam elementum tincidunt massa, a pulvinar leo ultricies ut. Ut fringilla lectus tellusimp imperdiet molestie est volutpat at, sed viverra cursus nibh.</p>

            <ul class="list-unstyled">
              <li class="media g-mb-10">
                <span class="d-block g-color-gray-dark-v5 g-width-110">
                    <i class="icon-wallet g-pos-rel g-top-1 g-mr-5"></i> Sallery:
                  </span>
                <span class="media-body">$4000 - $5000</span>
              </li>
              <li class="media g-mb-10">
                <span class="d-block g-color-gray-dark-v5 g-width-110">
                    <i class="icon-calendar g-pos-rel g-top-1 g-mr-5"></i> Date:
                  </span>
                <span class="media-body">3 July, 2017</span>
              </li>
              <li class="media g-mb-10">
                <span class="d-block g-color-gray-dark-v5 g-width-110">
                    <i class="icon-user g-pos-rel g-top-1 g-mr-5"></i> Skills:
                  </span>
                <span class="media-body">Photoshop, Sketch</span>
              </li>
              <li class="media">
                <span class="d-block g-color-gray-dark-v5 g-width-110">
                    <i class="icon-location-pin g-pos-rel g-top-1 g-mr-5"></i> Location:
                  </span>
                <span class="media-body">London, UK</span>
              </li>
            </ul>

            <hr class="g-brd-gray-light-v4">

            <ul class="list-inline d-flex justify-content-between mb-0">
              <li class="list-inline-item">
                <a class="u-tags-v1 g-font-size-12 g-color-main g-brd-around g-brd-gray-light-v3 g-bg-gray-dark-v2--hover g-brd-gray-dark-v2--hover g-color-white--hover rounded g-py-3 g-px-8" href="#!">Part-Time</a>
              </li>
              <li class="list-inline-item">
                <a href="#!">See Details</a>
              </li>
            </ul>
          </article>
          <!-- End Recent Jobs -->
        </div>

        <div class="col-lg-4 g-mb-30 g-mb-0--lg">
          <!-- Recent Jobs -->
          <article class="u-shadow-v11 rounded g-pa-25">
            <h2 class="h4 g-mb-15">
                <a class="u-link-v5 g-color-gray-dark-v1 g-color-primary--hover" href="#!">Ruby Developer</a>
              </h2>

            <ul class="list-inline d-flex justify-content-between g-mb-15">
              <li class="list-inline-item g-mr-20">
                <img class="g-height-25 g-width-25 rounded-circle g-mr-5" src="../../assets/img-temp/100x100/img5.jpg" alt="Image Description"> <a class="u-link-v5 g-color-main g-color-primary--hover" href="#!">Pinterest</a>
              </li>
              <li class="list-inline-item">
                <span class="js-rating d-block g-color-primary" data-rating="4"></span>
              </li>
            </ul>

            <p class="g-mb-15">Nullam elementum tincidunt massa, a pulvinar leo ultricies ut. Ut fringilla lectus tellusimp imperdiet molestie est volutpat at, sed viverra cursus nibh.</p>

            <ul class="list-unstyled">
              <li class="media g-mb-10">
                <span class="d-block g-color-gray-dark-v5 g-width-110">
                    <i class="icon-wallet g-pos-rel g-top-1 g-mr-5"></i> Sallery:
                  </span>
                <span class="media-body">$6000 - $8000</span>
              </li>
              <li class="media g-mb-10">
                <span class="d-block g-color-gray-dark-v5 g-width-110">
                    <i class="icon-calendar g-pos-rel g-top-1 g-mr-5"></i> Date:
                  </span>
                <span class="media-body">3 July, 2017</span>
              </li>
              <li class="media g-mb-10">
                <span class="d-block g-color-gray-dark-v5 g-width-110">
                    <i class="icon-user g-pos-rel g-top-1 g-mr-5"></i> Skills:
                  </span>
                <span class="media-body">Ruby in Rails, JavaScript</span>
              </li>
              <li class="media">
                <span class="d-block g-color-gray-dark-v5 g-width-110">
                    <i class="icon-location-pin g-pos-rel g-top-1 g-mr-5"></i> Location:
                  </span>
                <span class="media-body">New York, US</span>
              </li>
            </ul>

            <hr class="g-brd-gray-light-v4">

            <ul class="list-inline d-flex justify-content-between mb-0">
              <li class="list-inline-item">
                <a class="u-tags-v1 g-font-size-12 g-color-main g-brd-around g-brd-gray-light-v3 g-bg-gray-dark-v2--hover g-brd-gray-dark-v2--hover g-color-white--hover rounded g-py-3 g-px-8" href="#!">Full-Time</a>
              </li>
              <li class="list-inline-item">
                <a href="#!">See Details</a>
              </li>
            </ul>
          </article>
          <!-- End Recent Jobs -->
        </div>

        <div class="col-lg-4">
          <!-- Recent Jobs -->
          <article class="u-shadow-v11 rounded g-pa-25">
            <h2 class="h4 g-mb-15">
                <a class="u-link-v5 g-color-gray-dark-v1 g-color-primary--hover" href="#!">AngularJS Developer</a>
              </h2>

            <ul class="list-inline d-flex justify-content-between g-mb-15">
              <li class="list-inline-item g-mr-20">
                <img class="g-height-25 g-width-25 rounded-circle g-mr-5" src="../../assets/img-temp/100x100/img3.jpg" alt="Image Description"> <a class="u-link-v5 g-color-main g-color-primary--hover" href="#!">Pixeel Ltd.</a>
              </li>
              <li class="list-inline-item">
                <span class="js-rating d-block g-color-primary" data-rating="4.5"></span>
              </li>
            </ul>

            <p class="g-mb-15">Nullam elementum tincidunt massa, a pulvinar leo ultricies ut. Ut fringilla lectus tellusimp imperdiet molestie est volutpat at, sed viverra cursus nibh.</p>

            <ul class="list-unstyled">
              <li class="media g-mb-10">
                <span class="d-block g-color-gray-dark-v5 g-width-110">
                    <i class="icon-wallet g-pos-rel g-top-1 g-mr-5"></i> Sallery:
                  </span>
                <span class="media-body">$7000 - $9000</span>
              </li>
              <li class="media g-mb-10">
                <span class="d-block g-color-gray-dark-v5 g-width-110">
                    <i class="icon-calendar g-pos-rel g-top-1 g-mr-5"></i> Date:
                  </span>
                <span class="media-body">7 July, 2017</span>
              </li>
              <li class="media g-mb-10">
                <span class="d-block g-color-gray-dark-v5 g-width-110">
                    <i class="icon-user g-pos-rel g-top-1 g-mr-5"></i> Skills:
                  </span>
                <span class="media-body">JavaScript, HTML, CSS</span>
              </li>
              <li class="media">
                <span class="d-block g-color-gray-dark-v5 g-width-110">
                    <i class="icon-location-pin g-pos-rel g-top-1 g-mr-5"></i> Location:
                  </span>
                <span class="media-body">Remote (Worldwide)</span>
              </li>
            </ul>

            <hr class="g-brd-gray-light-v4">

            <ul class="list-inline d-flex justify-content-between mb-0">
              <li class="list-inline-item">
                <a class="u-tags-v1 g-font-size-12 g-color-main g-brd-around g-brd-gray-light-v3 g-bg-gray-dark-v2--hover g-brd-gray-dark-v2--hover g-color-white--hover rounded g-py-3 g-px-8" href="#!">Full-Time</a>
              </li>
              <li class="list-inline-item">
                <a href="#!">See Details</a>
              </li>
            </ul>
          </article>
          <!-- End Recent Jobs -->
        </div>
      </div>

      <div class="row g-mb-40">
        <div class="col-lg-4 g-mb-30 g-mb-0--lg">
          <!-- Recent Jobs -->
          <article class="u-shadow-v11 rounded g-pa-25">
            <h2 class="h4 g-mb-15">
                <a class="u-link-v5 g-color-gray-dark-v1 g-color-primary--hover" href="#!">ASP.NET Developer</a>
              </h2>

            <ul class="list-inline d-flex justify-content-between g-mb-15">
              <li class="list-inline-item g-mr-20">
                <img class="g-height-25 g-width-25 rounded-circle g-mr-5" src="../../assets/img-temp/100x100/img4.jpg" alt="Image Description"> <a class="u-link-v5 g-color-main g-color-primary--hover" href="#!">Starbucks</a>
              </li>
              <li class="list-inline-item">
                <span class="js-rating d-block g-color-primary" data-rating="3.5"></span>
              </li>
            </ul>

            <p class="g-mb-15">Nullam elementum tincidunt massa, a pulvinar leo ultricies ut. Ut fringilla lectus tellusimp imperdiet molestie est volutpat at, sed viverra cursus nibh.</p>

            <ul class="list-unstyled">
              <li class="media g-mb-10">
                <span class="d-block g-color-gray-dark-v5 g-width-110">
                    <i class="icon-wallet g-pos-rel g-top-1 g-mr-5"></i> Sallery:
                  </span>
                <span class="media-body">$6000 - $8000</span>
              </li>
              <li class="media g-mb-10">
                <span class="d-block g-color-gray-dark-v5 g-width-110">
                    <i class="icon-calendar g-pos-rel g-top-1 g-mr-5"></i> Date:
                  </span>
                <span class="media-body">3 July, 2017</span>
              </li>
              <li class="media g-mb-10">
                <span class="d-block g-color-gray-dark-v5 g-width-110">
                    <i class="icon-user g-pos-rel g-top-1 g-mr-5"></i> Skills:
                  </span>
                <span class="media-body">ASP.NET, JavaScript</span>
              </li>
              <li class="media">
                <span class="d-block g-color-gray-dark-v5 g-width-110">
                    <i class="icon-location-pin g-pos-rel g-top-1 g-mr-5"></i> Location:
                  </span>
                <span class="media-body">New York, US</span>
              </li>
            </ul>

            <hr class="g-brd-gray-light-v4">

            <ul class="list-inline d-flex justify-content-between mb-0">
              <li class="list-inline-item">
                <a class="u-tags-v1 g-font-size-12 g-color-main g-brd-around g-brd-gray-light-v3 g-bg-gray-dark-v2--hover g-brd-gray-dark-v2--hover g-color-white--hover rounded g-py-3 g-px-8" href="#!">Full-Time</a>
              </li>
              <li class="list-inline-item">
                <a href="#!">See Details</a>
              </li>
            </ul>
          </article>
          <!-- End Recent Jobs -->
        </div>

        <div class="col-lg-4 g-mb-30 g-mb-0--lg">
          <!-- Recent Jobs -->
          <article class="u-shadow-v11 rounded g-pa-25">
            <h2 class="h4 g-mb-15">
                <a class="u-link-v5 g-color-gray-dark-v1 g-color-primary--hover" href="#!">AngularJS Developer</a>
              </h2>

            <ul class="list-inline d-flex justify-content-between g-mb-15">
              <li class="list-inline-item g-mr-20">
                <img class="g-height-25 g-width-25 rounded-circle g-mr-5" src="../../assets/img-temp/100x100/img3.jpg" alt="Image Description"> <a class="u-link-v5 g-color-main g-color-primary--hover" href="#!">Pixeel Ltd.</a>
              </li>
              <li class="list-inline-item">
                <span class="js-rating d-block g-color-primary" data-rating="4.5"></span>
              </li>
            </ul>

            <p class="g-mb-15">Nullam elementum tincidunt massa, a pulvinar leo ultricies ut. Ut fringilla lectus tellusimp imperdiet molestie est volutpat at, sed viverra cursus nibh.</p>

            <ul class="list-unstyled">
              <li class="media g-mb-10">
                <span class="d-block g-color-gray-dark-v5 g-width-110">
                    <i class="icon-wallet g-pos-rel g-top-1 g-mr-5"></i> Sallery:
                  </span>
                <span class="media-body">$7000 - $9000</span>
              </li>
              <li class="media g-mb-10">
                <span class="d-block g-color-gray-dark-v5 g-width-110">
                    <i class="icon-calendar g-pos-rel g-top-1 g-mr-5"></i> Date:
                  </span>
                <span class="media-body">7 July, 2017</span>
              </li>
              <li class="media g-mb-10">
                <span class="d-block g-color-gray-dark-v5 g-width-110">
                    <i class="icon-user g-pos-rel g-top-1 g-mr-5"></i> Skills:
                  </span>
                <span class="media-body">JavaScript, HTML, CSS</span>
              </li>
              <li class="media">
                <span class="d-block g-color-gray-dark-v5 g-width-110">
                    <i class="icon-location-pin g-pos-rel g-top-1 g-mr-5"></i> Location:
                  </span>
                <span class="media-body">Remote (Worldwide)</span>
              </li>
            </ul>

            <hr class="g-brd-gray-light-v4">

            <ul class="list-inline d-flex justify-content-between mb-0">
              <li class="list-inline-item">
                <a class="u-tags-v1 g-font-size-12 g-color-main g-brd-around g-brd-gray-light-v3 g-bg-gray-dark-v2--hover g-brd-gray-dark-v2--hover g-color-white--hover rounded g-py-3 g-px-8" href="#!">Full-Time</a>
              </li>
              <li class="list-inline-item">
                <a href="#!">See Details</a>
              </li>
            </ul>
          </article>
          <!-- End Recent Jobs -->
        </div>

        <div class="col-lg-4">
          <!-- Recent Jobs -->
          <article class="u-shadow-v11 rounded g-pa-25">
            <h2 class="h4 g-mb-15">
                <a class="u-link-v5 g-color-gray-dark-v1 g-color-primary--hover" href="#!">UX/UI Designer</a>
              </h2>

            <ul class="list-inline d-flex justify-content-between g-mb-15">
              <li class="list-inline-item g-mr-20">
                <img class="g-height-25 g-width-25 rounded-circle g-mr-5" src="../../assets/img-temp/100x100/img1.jpg" alt="Image Description"> <a class="u-link-v5 g-color-main g-color-primary--hover" href="#!">Htmlstream</a>
              </li>
              <li class="list-inline-item">
                <span class="js-rating d-block g-color-primary" data-rating="5"></span>
              </li>
            </ul>

            <p class="g-mb-15">Nullam elementum tincidunt massa, a pulvinar leo ultricies ut. Ut fringilla lectus tellusimp imperdiet molestie est volutpat at, sed viverra cursus nibh.</p>

            <ul class="list-unstyled">
              <li class="media g-mb-10">
                <span class="d-block g-color-gray-dark-v5 g-width-110">
                    <i class="icon-wallet g-pos-rel g-top-1 g-mr-5"></i> Sallery:
                  </span>
                <span class="media-body">$4000 - $5000</span>
              </li>
              <li class="media g-mb-10">
                <span class="d-block g-color-gray-dark-v5 g-width-110">
                    <i class="icon-calendar g-pos-rel g-top-1 g-mr-5"></i> Date:
                  </span>
                <span class="media-body">3 July, 2017</span>
              </li>
              <li class="media g-mb-10">
                <span class="d-block g-color-gray-dark-v5 g-width-110">
                    <i class="icon-user g-pos-rel g-top-1 g-mr-5"></i> Skills:
                  </span>
                <span class="media-body">Photoshop, Sketch</span>
              </li>
              <li class="media">
                <span class="d-block g-color-gray-dark-v5 g-width-110">
                    <i class="icon-location-pin g-pos-rel g-top-1 g-mr-5"></i> Location:
                  </span>
                <span class="media-body">London, UK</span>
              </li>
            </ul>

            <hr class="g-brd-gray-light-v4">

            <ul class="list-inline d-flex justify-content-between mb-0">
              <li class="list-inline-item">
                <a class="u-tags-v1 g-font-size-12 g-color-main g-brd-around g-brd-gray-light-v3 g-bg-gray-dark-v2--hover g-brd-gray-dark-v2--hover g-color-white--hover rounded g-py-3 g-px-8" href="#!">Part-Time</a>
              </li>
              <li class="list-inline-item">
                <a href="#!">See Details</a>
              </li>
            </ul>
          </article>
          <!-- End Recent Jobs -->
        </div>
      </div>

      <div class="text-center">
        <a class="btn btn-xl u-btn-outline-primary text-uppercase g-font-weight-600 g-font-size-12" href="#!">View More Jobs</a>
      </div>
    </div>
  </section>
  @endif --}}
  <!-- End Recent Jobs -->
@endsection
<script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
  $('#spinner').hide();
  $('#opportunities-end').hide();
  $('#view-more').click(viewmore);
function getval(sel)
{
    alert(sel.value);
}       
function viewmore(){
var page = $('.endless-pagination').data('next-page');
if(page===null)
{
  $('#view-more').remove();
  $('#opportunities-end').show();
  $('#end-opportunities').html("No more to display!");
  $('#opportunities-end').fadeOut(4000);
}
if(page !== null) {
  $('#spinner').show();
  $.get(page, function(data){
                   $('.opportunities').append(data.opportunities);
                   $('.endless-pagination').data('next-page', data.next_page);
                  $('#spinner').hide();
      });
}
}
});
    $(function(){
      // bind change event to select
      $('#select_categories').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
</script>
