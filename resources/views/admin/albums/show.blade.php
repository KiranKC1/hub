@extends('layouts.admin')
@section('css')
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/default-skin/default-skin.min.css'>
    <link href="/admin-assets/dist/styles.imageuploader.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/admin-assets/app-assets/css/pages/gallery.css">
    <link rel="stylesheet" type="text/css" href="/admin-assets/gallery/css/style.css">
@endsection

@section('body')

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Album Gallery #{{ $album->name }}</h2>
        </div>
        <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                    <a class="btn btn-primary btn-min-width mr-1 mb-1 " href="{{ route('albums.index') }}">Back</a>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-body">

        <!-- Image grid -->
        <section id="image-gallery" class="card">
            <div class="card-header">
                <h4 class="card-title">Image gallery</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div style="text-align:right">
                    <button type="button" class="btn btn-primary mt-1 mr-1 mb-1" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#uploadImagesModal">
                        Add Images
                    </button>

                </div>
                @if(count($album->album_images)==0)
                    <p class="font-medium-3 text-muted text-xs-center" style="margin:100px">No Images Yet</p>   
                @endif

                <div class="card-block my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
                    <div class="row">
                        @foreach($album->album_images as $image)
                            <figure class="col-lg-3 col-md-6 col-xs-12" itemprop="associatedMedia"  itemscope itemtype="http://schema.org/ImageObject" >
                                <a href="{{ route('asset', ['gallery',$image->image,480,360]) }}" itemprop="contentUrl" data-size="480x360">
                                    <img class="img-thumbnail img-fluid" src="{{ route('asset', ['gallery',$image->image,172,172]) }}" itemprop="thumbnail" alt="Image {{$loop->iteration}}" />
                                </a>
                                <form action="{{ route('albums.deleteImage',[$album->id,$image->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE" >
                                    <button id='deletePhoto' type="button" style="background-color: Transparent;border: none;outline:none;position: absolute;top: -10px;right: 0px;" ><a><i class="icon-cross"></i></a></button>
                                </form>
                            </figure> 
                        @endforeach
                    </div>
                </div>

                <!-- Root element of PhotoSwipe. Must have class pswp. -->
                <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

                    <!-- Background of PhotoSwipe. 
                        It's a separate element, as animating opacity is faster than rgba(). -->
                    <div class="pswp__bg"></div>

                    <!-- Slides wrapper with overflow:hidden. -->
                    <div class="pswp__scroll-wrap">

                        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
                        <!-- don't modify these 3 pswp__item elements, data is added later on. -->
                        <div class="pswp__container">
                            <div class="pswp__item"></div>
                            <div class="pswp__item"></div>
                            <div class="pswp__item"></div>
                        </div>

                        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                        <div class="pswp__ui pswp__ui--hidden">

                            <div class="pswp__top-bar">

                                <!--  Controls are self-explanatory. Order can be changed. -->

                                <div class="pswp__counter"></div>

                                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                                <button class="pswp__button pswp__button--share" title="Share"></button>

                                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                                <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                                <!-- element will get class pswp__preloader--active when preloader is running -->
                                <div class="pswp__preloader">
                                    <div class="pswp__preloader__icn">
                                    <div class="pswp__preloader__cut">
                                        <div class="pswp__preloader__donut"></div>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                <div class="pswp__share-tooltip"></div> 
                            </div>

                            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                            </button>

                            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                            </button>

                            <div class="pswp__caption">
                                <div class="pswp__caption__center"></div>
                            </div>

                        </div>

                        </div>

                </div>
            </div>
        </section>
        <!--/ Image grid -->
    </div>
    <!-- Modal -->
    <div class="modal fade text-xs-left" id="uploadImagesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true" style="min-height:500px;min-width:500px;">
        <div class="modal-dialog" role="document">

            <div style="text-align:right">             
                <button id="cross"  type="button" class="btn btn-outline-secondary" data-dismiss="modal" style="background-color: #185284;color: #fff;">&times;</button>
            </div>            
            <div class=" uploader__box js-uploader__box l-center-box">
                <form class="form" enctype="multipart/form-data" method="POST" action="{{ route('albums.addImages',$album->id) }}">
                       
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="uploader__contents">
                            <label class="button button--secondary" for="fileinput">Select Files</label>
                            <input id="fileinput" class="uploader__file-input" type="file" multiple value="Select Files">
                        </div>
                        <button class="button button--big-bottom" type="submit">Upload Selected Files</button>
                    </div>

                </form> 
            </div>
        </div>
    </div>
 @endsection

 @section('js')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe-ui-default.min.js'></script>

    <script  src="/admin-assets/gallery/js/index.js"></script>
    <script src="/admin-assets/dist/jquery.imageuploader.js"></script>
	<script>
		(function(){
            var options = {'ajaxUrl':"{{ route('albums.addImages',$album->id) }}"};
            $('.js-uploader__box').uploader(options);
        }());
    </script>
 @endsection
