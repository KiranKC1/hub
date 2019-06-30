@extends('layouts.app')
@section('body')
@section('title','Event'.' | '.$event->title)
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

</style>
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
  
    </style>
  <div class="container">
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
        <div class="youtube cboxElement">
         <a href="#"><i class="fa fa-youtube"></i></a>
        </div>
        </div>
      </div>
    </div>

<section class="g-bg-size-cover g-bg-pos-center g-bg-cover g-bg-black-opacity-0_5--after g-color-white g-py-50 g-mb-20" style="background-attachment: fixed;
background-position: center;
background-repeat: no-repeat;
background-size: cover;background-image: url({{asset('hub-images/events-images'.'/'.$event->featured_image)}});">
  <div class="container g-bg-cover__inner">
    <header class="g-mb-20">
      {{--  <h3 class="h5 g-font-weight-300 g-mb-5">Breadcrumbs</h3>  --}}
      <h2 class="h1 g-font-weight-300 text-uppercase">{{$event->title}}
      </h2>
      <p>Grow your business, go global, and boost conversions in other countries by localizing your education experience.</p>
    </header>

    <ul class="u-list-inline">
      <li class="list-inline-item g-mr-7">
      <a class="u-link-v5 g-color-white g-color-primary--hover" href="{{URL::to('home')}}">Home</a>
        <i class="fa fa-angle-right g-ml-7"></i>
      </li>
      <li class="list-inline-item g-mr-7">
      <a class="u-link-v5 g-color-white g-color-primary--hover" href="{{URL::to('events')}}">Events</a>
        <i class="fa fa-angle-right g-ml-7"></i>
      </li>
      <li class="list-inline-item g-color-primary">
      <span>{{$event->title}}</span>
      </li>
    </ul>
  </div>
</section>
 <!-- Jobs Description -->
 <section class="g-py-20">
    <div class="container">
      <div class="row">
          <div class="col-lg-9 g-mb-30 g-mb-0--lg">
              <article class="u-shadow-v11 rounded g-pa-20">
                <!-- Content Header -->
                <div class="row">
                  <div class="col-md-8 g-mb-30 g-mb-0--md">
                    <div class="media">
                      <div class="media-body">
                        <span class="d-block g-mb-2">
                        <a class="u-link-v5 g-font-size-25 g-color-gray-dark-v1" href="javascript:;">{{$event->title}}</a>
                          </span>
                      </div>
                    </div>
                  </div>
                  
          
                  
                </div>
                <!-- End Content Header -->
          
                <hr class="g-brd-gray-light-v4" style="margin-top: 10px;">
          
                <div class="row mb-0">
                  @if($event->featured_image != null)
                  <div class="col-md-4">
                  <a class="js-fancybox" href="javascript:;" data-src="{{asset('hub-images/events-images'.'/'.$event->featured_image)}}" data-animate-in="bounceIn" data-animate-out="bounceOut" data-speed="1000" data-overlay-bg="rgba(0, 0, 0, 1)">
                  <img class="img-fluid" src="{{asset('hub-images/events-images'.'/'.$event->featured_image)}}" alt="{{$event->title}}">
                      </a>
                    </div>
                  @endif
                  <div class="@if($event->featured_image == null) col-md-12 @endif col-md-8">
                      <div class="col-lg g-mb-30 g-mb-0--lg" style="margin-top:10px;">
                          <h3 class="h5 g-color-gray-dark-v1 g-mb-10">Event Details</h3>
                          <ul class="list-unstyled mb-0">
                           
                            <li class="media g-mb-10">
                                <span class="d-block g-color-gray-dark-v5 g-width-110">
                                    <i class="icon-calendar g-pos-rel g-top-1 g-mr-5"></i> Date:
                                  </span>
                                <span class="media-body">{{date('M,j Y',strtotime($event->event_date))}}</span>
                              </li>
                            <li class="media g-mb-10">
                                <span class="d-block g-color-gray-dark-v5 g-width-110">
                                    <i class="icon-location-pin g-pos-rel g-top-1 g-mr-5"></i> Location:
                                  </span>
                                <span class="media-body">{{$event->venue}}</span>
                              </li>
                            <li class="media g-mb-10">
                                  <span class="d-block g-color-gray-dark-v5 g-width-110">
                                      <i class="fa fa-clock-o g-pos-rel g-top-1 g-mr-5"></i> Event Time:
                                    </span>
                                  <span class="media-body">{{date('h:i A', strtotime($event->start_time))}} - {{date('h:i A', strtotime($event->end_time))}}</span>
                                  </li>
                          </ul>
                        </div>
                  </div>
                </div>
                <hr class="g-brd-gray-light-v4">
                <h3 class="h5 g-color-gray-dark-v1 g-mb-10">Events Description</h3>
               {!! $event->description !!}
               @if(count($event->tags) != null)
               <hr class="g-brd-gray-light-v4">
               <li class="media">
                  <h3 class="h5 g-color-gray-dark-v1 g-mb-10">Tags: </h3>
                   <span class="media-body">
                       <ul class="u-list-inline mb-0">
                         @foreach($event->tags as $tag)
                       <a class="u-tags-v1 g-color-main g-brd-around g-brd-gray-light-v3 g-bg-gray-dark-v2--hover g-brd-gray-dark-v2--hover g-color-white--hover g-py-4 g-px-10" href="{{URL::to('events/tags'.'/'.$tag->name)}}">
                             <i class="fa fa-tag mr-1"></i>
                             {{$tag->name}}
                          </a>
                         @endforeach  
                       </ul>
                   </span>
                 </li>
               @endif  
               <hr class="g-brd-gray-light-v4">

               <!-- Save or Print  -->
       <!-- Save or Print  -->
       <ul class="list-unstyled d-flex justify-content-between">
         <li>
          <a hidden class="u-link-v5 g-color-main g-color-primary--hover hidden pull-right" id="event_spinner" style="margin-right:30px; margin-top:5px;">
              <i class="fa fa-spinner fa-spin" style="font-size:24px; margin-left:40px;" ></i>
            </a>
          @if(Auth::User())
          <a {{!in_array($event->id,$saves)?'hidden':''}} href="javascript:;" id="unsaveevent" cid="{{$event->id}}" class="btn btn-md u-btn-primary u-btn-hover-v1-4 g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50">
              <i class="fa fa-check-circle g-mr-3"></i>
            Saved
            </a>
            <a {{in_array($event->id,$saves)?'hidden':''}} href="javascript:;" id="saveevent" cid="{{$event->id}}" class="btn btn-md u-btn-primary u-btn-hover-v1-4 g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50">
                <i class="fa fa-check-circle g-mr-3"></i>
              Save and Notify
              </a> 
            @else
            <a  href="{{URL::to('login')}}" class="btn btn-md u-btn-primary u-btn-hover-v1-4 g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50">
                <i class="fa fa-check-circle g-mr-3"></i>
              Save and Notify
              </a> 
            @endif
            </li>  
     
      </ul>
        </article>
              
             
            </div>

        <!-- Sidebar -->
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
                     <!-- Events -->
          <div class="g-mb-20">
            <h3 class="h5 g-color-black g-font-weight-600 mb-4">Upcoming Events</h3>
            <ul class="list-unstyled g-font-size-13 mb-0">
              @foreach($upcomingevents as $event)
              <li>
                  <a class="u-link-v5 g-color-black" href="{{route('single.events',$event->slug)}}">
                  <article class="media g-mb-10">
                      <div class="panel panel-danger text-center date" style="padding-right:5px; border-color:#ebccd1;">
                          <div class="panel-heading month" style="background-color:#ebccd1; border-top-left-radius: 3px; border-top-right-radius: 3px;">
                              <span class="panel-title strong">
                                  {{date('M',strtotime($event->event_date))}}
                              </span>
                          </div>
                          <div class="panel-body day text-danger" style="border: 1px solid #ebccd1; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px;">
                              {{date('j',strtotime($event->event_date))}}
                          </div>
                      </div>
                    <div class="media-body">
                    <h4 class="h6 g-color-black g-font-weight-600">{{str_limit(strip_tags($event->title),19)}}</h4>
                    <p><i class="icon-location-pin"></i>{{$event->venue}}</p>                   
                    </div>
                  </article>
                </a>
              </li>
              @endforeach
            </ul>
          </div>
          <!-- End Events -->
       
      
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
        <!-- Sidebar -->
      </div>
    </div>
  </section>
  <!-- End Jobs Description -->
@endsection
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
</script>
<script>
    $(document).on('click','#saveevent',function(event){
            var id = $(this).attr("cid");
            $('#saveevent').attr('hidden','true');  
            $('#event_spinner').removeAttr('hidden');
            console.log(id);
            $.ajax({
              type: "POST",
              url: "{{URL::to('/saveevent')}}",
              data: { 
              id: id,
              _token:"{{csrf_token()}}"
        },
        success: function(result) {
          $('#event_spinner').attr('hidden','true');
          $('#unsaveevent').removeAttr('hidden');
          $('#messages').append(
            '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-success alert-dismissible fade show" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; bottom: 20px; right: 10px; animation-iteration-count: 1;">'+
            '<button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">'+
            '<span aria-hidden="true">×</span>'+
            '</button>'+
            '<h4 class="h5">'+
            '<i class="fa fa-check-circle-o"></i>'+
            ' Event saved!'+
            '</h4>'+
            '<p>Event details was saved. Go to profile to view saved events details and get notifications!</p>'+
        '</div>'
          ).find('.alert-dismissible').delay(8000).fadeOut(2000);
        },
        error: function(result) {
          alert("Server didn't respond");
          $('#event_spinner').attr('hidden','true');
          $('#saveevent').removeAttr('hidden');  
        }
    });
  });
  $(document).on('click','#unsaveevent',function(event){
            var id = $(this).attr("cid");
            $('#unsaveevent').attr('hidden','true');  
            $('#event_spinner').removeAttr('hidden');
            console.log(id);
            $.ajax({
              type: "POST",
              url: "{{URL::to('/saveevent')}}",
              data: { 
              id: id,
              _token:"{{csrf_token()}}"
        },
        success: function(result) {
          $('#event_spinner').attr('hidden','true');
          $('#saveevent').removeAttr('hidden');
          $('#messages').append(
            '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-success alert-dismissible fade show" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; bottom: 20px; right: 10px; animation-iteration-count: 1;">'+
            '<button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">'+
            '<span aria-hidden="true">×</span>'+
            '</button>'+
            '<h4 class="h5">'+
            '<i class="fa fa-check-circle-o"></i>'+
            ' Event Removed'+
            '</h4>'+
            '<p>Event details was removed from your profile!</p>'+
        '</div>'
          ).find('.alert-dismissible').delay(8000).fadeOut(2000);
        },
        error: function(result) {
           alert("Server didn't respond");
           $('#event_spinner').attr('hidden','true');
          $('#unsaveevent').removeAttr('hidden');  
        }
    });
  });
  $(document).click(function() {
  $('#messages').empty();
});
</script>

