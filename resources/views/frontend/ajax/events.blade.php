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
      
      <a class="d-inline-block u-link-v5 g-color-text-light-v1 g-color-primary--hover" href="#">
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
  <a class="u-link-v2" href="#"></a>
</li>
@endforeach