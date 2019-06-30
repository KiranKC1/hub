@extends('layouts.app')
@section('body')
<section class="g-bg-size-cover g-bg-pos-center g-bg-cover g-bg-black-opacity-0_5--after g-color-white g-py-50 g-mb-20" style="background-attachment: fixed;
background-position: center;
background-repeat: no-repeat;
background-size: cover;background-image: url({{asset('main-assets/assets/img-temp/1920x800/img4.jpg')}});">
  <div class="container g-bg-cover__inner">
    <header class="g-mb-20">
      {{--  <h3 class="h5 g-font-weight-300 g-mb-5">Breadcrumbs</h3>  --}}
      <h2 class="h1 g-font-weight-300 text-uppercase">Upcoming
        <span class="g-color-primary">Events</span>
      </h2>
      <p>Grow your business, go global, and boost conversions in other countries by localizing your education experience.</p>
    </header>

    <ul class="u-list-inline">
      <li class="list-inline-item g-mr-7">
      <a class="u-link-v5 g-color-white g-color-primary--hover" href="{{URL::to('home')}}">Home</a>
        <i class="fa fa-angle-right g-ml-7"></i>
      </li>
      <li class="list-inline-item g-color-primary">
        <span>Events</span>
      </li>
    </ul>
  </div>
</section>
<div class="container g-pt-10 g-pb-10">
    <div class="row justify-content-between">
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
          @if(count($allevents) > 5)
          <div class="text-center view-more" id="view-more">
            <a class="btn u-shadow-v33 g-color-white g-color-white--hover g-bg-primary g-bg-main--hover g-rounded-30 g-px-25 g-py-10 g-mb-10"><i class="fa fa-cog fa-spin" id="spinner"></i> View More Events</a>
          </div> 
          <div class="text-center" id="events-end">
            <p id="end-events"></p>
          </div> 
          @endif
       
      </div>
      <!-- End Events -->

      
    </div>
    <div class="col-lg-3 g-brd-left--lg g-brd-gray-light-v4 g-mb-20">
        <div class="g-pl-20--lg">
          <div id="stickyblock-start" class="js-sticky-block g-sticky-block--lg g-pt-5
          " data-start-point="#stickyblock-start" data-end-point="#stickyblock-end">
          {{--  Write To US Start  --}}
          <div class="g-mb-5">
              <a href="#!"  class="btn btn-md u-btn-primary u-btn-hover-v1-4 g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50 g-mr-10 g-mb-15">
                  <i class="fa fa-check-circle g-mr-3"></i>
                  Add Event
                </a>
          </div>
          {{--  End Write To US Start  --}}
                  <div class="g-mb-5">
                      <h3 class="h5 g-color-black g-font-weight-600 mb-4">Latest Posts</h3>
                      <ul class="list-unstyled g-font-size-13 mb-0">
                        @foreach($posts as $post)
                        <li>
                          <article class="media g-mb-10">
                            @if($post->featured_image == null)
                            <?php

                            $cat=$category->where('id','=',$post->category_id)->first();
                            $cat_image = $cat->category_image;
                            ?>
                            <img class="g-width-50 g-height-50 rounded-circle" src="{{asset('hub-images/categories-images'.'/'.$cat_image)}}" alt="Image Description" style="
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
     
    
            <hr class="g-brd-gray-light-v4 g-my-15">
    
            <!-- Newsletter -->
            <div class="g-mb-20">
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
      </div>

      <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
    <script>
      $(document).ready(function(){
        $('#spinner').hide();
        $('#events-end').hide();
        $('#view-more').click(viewmore);
             
    function viewmore(){
      var page = $('.endless-pagination').data('next-page');
      if(page===null)
      {
        $('#view-more').remove();
        $('#events-end').show();
        $('#end-events').html("No Events to display!");
        $('#events-end').fadeOut(4000);
      }
      if(page !== null) {
        $('#spinner').show();
        $.get(page, function(data){
                         $('.events').append(data.events);
                         $('.endless-pagination').data('next-page', data.next_page);
                        $('#spinner').hide();
            });
      }
    }
      });
      </script>
@endsection