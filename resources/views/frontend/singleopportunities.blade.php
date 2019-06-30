@extends('layouts.app')
@section('body')
@section('title','Opportunity'.' | '.$os->title)
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

<section class="g-bg-size-cover g-bg-pos-center g-bg-cover g-bg-black-opacity-0_5--after g-color-white g-py-50 g-mb-0" style="background-image: url({{asset('hub-images/opportunities-images'.'/'.$os->featured_image)}});
  background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;">
    <div class="container g-bg-cover__inner">
      <header class="g-mb-20">
        <h3 class="h5 g-font-weight-500 g-mb-5"><i class="fa fa-briefcase"></i> {{$os->organization}}</h3>
        <h2 class="h1 g-font-weight-500 text-uppercase">{{$os->title}}
        </h2>
      </header>
  
      <ul class="u-list-inline">
        <li class="list-inline-item g-mr-7">
        <a class="u-link-v5 g-color-white g-color-primary--hover" href="{{URL::to('/home')}}">Home</a>
          <i class="fa fa-angle-right g-ml-7"></i>
        </li>
        <li class="list-inline-item g-mr-7">
        <a class="u-link-v5 g-color-white g-color-primary--hover" href="{{URL::to('opportunities')}}">Opportunities</a>
          <i class="fa fa-angle-right g-ml-7"></i>
        </li>
        <li class="list-inline-item g-color-primary">
        <span class=" g-font-weight-1000">{{$os->title}}</span>
        </li>
      </ul>
      <div class="g-mb-5 g-mt-20">
            @if($os->link != null)
          <a href="{{$os->link}}" target="_blank"  class="btn btn-md u-btn-primary u-btn-hover-v1-4 g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50 g-mr-10 g-mb-15">
              <i class="fa fa-check-circle g-mr-3"></i>
            Apply Now!
            </a>
            @endif
      </div>
    </div>
  </section>
   <!-- Jobs Description -->
   <section class="g-py-20">
      <div class="container">
        <div class="row">
          <!-- Content -->
          <div class="col-lg-8 g-mb-30 g-mb-0--lg">
            <article class="u-shadow-v11 rounded g-pa-30">
              <!-- Content Header -->
              <div class="row">
                <div class="col-md-8 g-mb-30 g-mb-0--md">
                  <div class="media">
                    <div class="media-body">
                      <span class="d-block g-mb-3">
                      <a class="u-link-v5 g-font-size-18 g-color-gray-dark-v1 g-color-primary--hover" href="javascript:;">{{$os->title}}</a>
                        </span>
                        @if($os->location !=null)
                      <span class="g-font-size-13 g-color-gray-dark-v4 g-mr-15">
                          <i class="icon-location-pin g-pos-rel g-top-1 mr-1"></i> {{$os->location}}
                        </span>
                        @endif
                      <span class="g-font-size-13 g-color-gray-dark-v4 g-mr-15">
                          <i class="icon-directions g-pos-rel g-top-1 mr-1"></i> {{$os->organization}}
                        </span>
                    </div>
                  </div>
                </div>
                @if($os->date !=  null)
                <div class="col-md-4 align-self-center text-md-right">
                <a class="g-font-size-12 g-color-main">Deadline : <strong>{{$deadline}}</strong> days from today</a>
                  </div>
                @endif  
              </div>
              <!-- End Content Header -->
    

              <hr class="g-brd-gray-light-v4" style="margin-bottom: 20px;margin-top: 20px;">

              <!-- Jobs Description -->
              <h3 class="h5 g-color-gray-dark-v1 g-mb-10">Opportunity Description</h3>
              <p>{!!$os->description!!}</p>
        

              <!-- Social Links -->
            
              <!-- End Social Links -->
              <hr class="g-brd-gray-light-v4">

              <!-- Save or Print  -->
           
              <!-- End Save or Print  -->
              <!-- End Jobs Description -->
              <?php
              $o=count($os->tags);
              ?>
              @if($o != 0)
              <hr class="g-brd-gray-light-v4">
              <!-- Offer Details & Skills -->
              <div class="row">
                <!-- Skills -->
                <div class="col-lg">
                  <h3 class="h5 g-color-gray-dark-v1 g-mb-10">Tags</h3>
                  <ul class="list-inline mb-0">
                 
                    @foreach($os->tags as $tag)
                    <li class="list-inline-item g-mb-10">
                      <a class="u-tags-v1 g-font-size-13 g-color-main g-brd-around g-bg-gray-light-v5 g-bg-primary--hover g-color-white--hover rounded g-py-5 g-px-15" href="#!">{{$tag->name}}</a>
                    </li>
                    @endforeach
                  </ul>
                </div>
                <!-- End Skills -->
              </div>
              @endif
              <!-- End Offer Details & Skills -->
            </article>
          </div>
          <!-- End Content -->

          <!-- Sidebar -->
          <!-- Sidebar -->
          <div class="col-lg-4">
            <aside class="u-shadow-v11 rounded" style="padding-top:30px; padding-bottom:15px; padding-right:30px; padding-left:30px;">
                <a class="js-fancybox" href="javascript:;" data-src="{{asset('hub-images/opportunities-images'.'/'.$os->featured_image)}}" data-animate-in="bounceIn" data-animate-out="bounceOut" data-speed="1000" data-overlay-bg="rgba(0, 0, 0, 1)">
                  <img class="img-fluid" src="{{asset('hub-images/opportunities-images'.'/'.$os->featured_image)}}" alt="{{$os->title}}">
                </a>

              <hr class="g-brd-gray-light-v4" style="margin-top: 0px;margin-bottom: 10px;">

              <!-- Contacts -->
              <ul class="list-unstyled mb-0">
                @if($os->location != null)
                <li class="d-flex align-items-baseline g-mb-12">
                  <i class="icon-location-pin g-color-gray-dark-v5 g-mr-10"></i>
                <span>{{$os->location}}</span>
                </li>
                @endif
                @if($os->contact_details != null)
                <li class="d-flex align-items-baseline g-mb-10">
                  <i class="icon-phone g-color-gray-dark-v5 g-mr-10"></i>
                <span>{{$os->contact_details}}</span>
                </li>
                @endif
                @if($os->email != null)
                <li class="d-flex align-items-baseline g-mb-10">
                  <i class="icon-envelope g-color-gray-dark-v5 g-mr-10"></i>
                <a class="u-link-v5 g-color-main g-color-primary--hover" href="mailto:info@htmlstream.com">{{$os->email}}</a>
                </li>
                @endif
              </ul>
              <!-- End Contacts -->
              @if($os->link != null)
              <hr class="g-brd-gray-light-v4">
            <a class="btn btn-xl btn-block u-btn-primary text-uppercase g-font-weight-600 g-font-size-12" href="{{$os->link}}" target="_blank">Apply Now</a>
              @endif
              <a hidden class="u-link-v5 g-color-main g-color-primary--hover hidden" id="jobs_spinner" style="text-align:center; margin-left:130px;"  >
                  <i class="fa fa-spinner fa-spin" style="font-size:24px; margin-top:7px;" ></i>
                </a>
            @if(Auth::User())
          <a {{!in_array($os->id,$saves)?'hidden':''}} href="javascript:;" id="unsavejob" cid="{{$os->id}}" class="btn btn-xl btn-block u-btn-primary text-uppercase g-font-weight-600 g-font-size-12" style="margin-top:7px;">
              <i class="fa fa-check-circle g-mr-3"></i>
            Saved
            </a>
            <a {{in_array($os->id,$saves)?'hidden':''}} href="javascript:;" id="savejob" cid="{{$os->id}}" class="btn btn-xl btn-block u-btn-primary text-uppercase g-font-weight-600 g-font-size-12">
                <i class="fa fa-check-circle g-mr-3"></i>
              Save
              </a> 
            @else
            <a  href="{{URL::to('login')}}" cid="{{$os->id}}" class="btn btn-xl btn-block u-btn-primary text-uppercase g-font-weight-600 g-font-size-12">
                <i class="fa fa-check-circle g-mr-3"></i>
              Save
              </a> 
            @endif  
         
            </aside>
          </div>
          <!-- Sidebar -->
      
        </div>
      </div>
    </section>
    <!-- End Jobs Description -->
    <!-- Recent Jobs -->
    <?php
    $countsos=count($sos);
    ?>
    @if($countsos != null)
    <section class="g-py-20">
      <div class="container">
        <header class="text-center g-width-60x--md mx-auto g-mb-50">
          <h2 class="h1 g-color-gray-dark-v1 g-font-weight-300">Similar Opportunities</h2>
        <p class="lead">Showing total of <strong>"{{$countsos}}"</strong> similar opportunities</p>
        </header>

        <div class="row g-mb-30">
          @foreach($sos as $s)
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
    @endif
    <!-- End Recent Jobs -->

@endsection
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
</script>
<script>
    $(document).on('click','#savejob',function(event){
            var id = $(this).attr("cid");
            $('#savejob').attr('hidden','true');  
            $('#jobs_spinner').removeAttr('hidden');
            console.log(id);
            $.ajax({
              type: "POST",
              url: "{{URL::to('/savejob')}}",
              data: { 
              id: id,
              _token:"{{csrf_token()}}"
        },
        success: function(result) {
          $('#jobs_spinner').attr('hidden','true');
          $('#unsavejob').removeAttr('hidden');
          $('#messages').append(
            '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-success alert-dismissible fade show" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; bottom: 20px; right: 10px; animation-iteration-count: 1;">'+
            '<button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">'+
            '<span aria-hidden="true">×</span>'+
            '</button>'+
            '<h4 class="h5">'+
            '<i class="fa fa-check-circle-o"></i>'+
            ' Opportunity Saved!'+
            '</h4>'+
            '<p>Opportunity details was saved. Go to profile to view saved opportunities!</p>'+
        '</div>'
          ).find('.alert-dismissible').delay(8000).fadeOut(2000);
        },
        error: function(result) {
          alert("Server didn't respond!");
          $('#jobs_spinner').attr('hidden','true');
            $('#savejob').removeAttr('hidden');  
        }
    });
  });
  $(document).on('click','#unsavejob',function(event){
            var id = $(this).attr("cid");
            $('#unsavejob').attr('hidden','true');  
            $('#jobs_spinner').removeAttr('hidden');
            console.log(id);
            $.ajax({
              type: "POST",
              url: "{{URL::to('/savejob')}}",
              data: { 
              id: id,
              _token:"{{csrf_token()}}"
        },
        success: function(result) {
          $('#jobs_spinner').attr('hidden','true');
          $('#savejob').removeAttr('hidden');
          $('#messages').append(
            '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-success alert-dismissible fade show" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; bottom: 20px; right: 10px; animation-iteration-count: 1;">'+
            '<button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">'+
            '<span aria-hidden="true">×</span>'+
            '</button>'+
            '<h4 class="h5">'+
            '<i class="fa fa-check-circle-o"></i>'+
            ' Opportunity removed'+
            '</h4>'+
            '<p>Opportunity details was removed from your profile!</p>'+
        '</div>'
          ).find('.alert-dismissible').delay(8000).fadeOut(2000);
        },
        error: function(result) {
          alert("Server didn't respond!");
          $('#jobs_spinner').attr('hidden','true');
            $('#unsavejob').removeAttr('hidden');  
        }
    });
  });
  $(document).click(function() {
  $('#messages').empty();
});
</script>