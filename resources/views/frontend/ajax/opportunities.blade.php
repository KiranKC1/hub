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