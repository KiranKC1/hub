@extends('layouts.app')
@section('body')
@section('title','Share Post')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<style>
  .select2-container--default.select2-container--focus .select2-selection--multiple{
   border: 1px solid blue !important;;

}
  </style>
<link href="{{asset('main-assets/assets/tags/bootstrap-tagsinput.js')}}" rel="stylesheet"/>
<section class="g-bg-gray-light-v5 g-py-50" style="background-image: url({{asset('main-assets/assets/img/bg/pattern2.png')}});">
  <div class="container">
    <div class="d-sm-flex text-center">
      <div class="align-self-center">
        <h2 class="h3 g-font-weight-300 w-100 g-mb-10 g-mb-0--md">Share Article</h2>
      </div>

      <div class="align-self-center ml-auto">
        <ul class="u-list-inline">
          <li class="list-inline-item g-mr-5">
          <a class="u-link-v5 g-color-main" href="{{URL::to('home')}}">Home</a>
            <i class="g-color-gray-light-v2 g-ml-5">/</i>
          </li>
          <li class="list-inline-item g-mr-5">
          <a class="u-link-v5 g-color-main" href="{{URL::to('user/profile')}}">Profile</a>
            <i class="g-color-gray-light-v2 g-ml-5">/</i>
          </li>
          <li class="list-inline-item g-color-primary">
            <span>Share Article</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<div class="container g-pt-10 g-pb-10">
    <div class="row justify-content-left">
    <div class="col-lg-12 g-mb-10">
    <!-- Events -->
        <div class="container text-center g-py-10">
          <div role="tabpanel">
            {{-- <h2 class="h4 g-font-weight-600">Add post</h2> --}}
          <form action="{{URL::to('user/post/article')}}" method="POST" enctype="multipart/form-data">
              <!-- title -->
              <div class="form-group row g-mb-25">
                <label class="col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Title for the post</label>
                  <div class="input-group g-brd-primary--focus">
                    <input name="title" class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0" type="text" placeholder="Title...">
                    <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                    </div>
                  </div>
              </div>
              <!-- End  -->
              <!-- Password Reset -->
              <div class="form-group row g-mb-25">
                <label class="col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Description</label>
                    <textarea id="description" rows="4" cols="50" class="form-control border-primary my-editor" name="description" placeholder="Write article...">{{old('description')}}</textarea>                
              </div>
              <div class="form-group row g-mb-25">
                <label class="col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Category</label>
                <select name="category" class="js-custom-select w-100 u-select-v2 u-shadow-v32 g-brd-primary--focus g-color-black g-bg-white text-left g-pl-25 g-py-12" style="height: 40px;" data-placeholder="Category" data-open-icon="fa fa-angle-down" data-close-icon="fa fa-angle-up"> 
                      @foreach($categories as $c)  
                      <option class="g-brd-secondary-light-v2 g-color-black g-color-white--active g-bg-primary--active" value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                    </select>                
                </div>
                <div class="form-group row g-mb-25">
                  <label class="col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Tags</label>
                    <div class="input-group g-brd-primary--focus">
                      <select class="w-100 u-select-v2 u-shadow-v32 g-brd-primary--focus g-color-black g-bg-white text-left g-pl-25 g-py-12 js-example-basic-multiple" name="post_tag[]" multiple="multiple">
                      </select>
                    </div>
                </div>
                
                <!-- End Password Reset -->
                <!-- Login Verification -->
                <div class="form-group mb-0">
                    {{-- <label class="col-form-label  text-sm-right g-mb-10">Category</label> --}}
                    <p class="g-color-gray-dark-v2 g-font-weight-700">Choose Featured Image</p>
                    <label class="u-file-attach-v2 g-color-gray-dark-v5 mb-0">
                      <input style="cursor:pointer;" id="featured_image" name="featured_image" type="file">
                      <i class="icon-cloud-upload g-font-size-16 g-pos-rel g-top-2 g-mr-5"></i>
                      <span style="cursor:pointer;" id="image_name">Attach file</span>
                    </label>
                  </div>
                  {{csrf_field()}}
                  <!-- End Login Verification -->


              <hr class="g-brd-gray-light-v4 g-my-25">

              <div class="text-sm-right">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
              </div>
            </form>
          </div>
        </div>
      <!-- End Events -->

      
    </div>
    {{-- <div class="col-lg-3 g-brd-left--lg g-brd-gray-light-v4 g-mb-20">
        <div class="g-pl-20--lg">
          <div id="stickyblock-start" class="js-sticky-block g-sticky-block--lg g-pt-5
          " data-start-point="#stickyblock-start" data-end-point="#stickyblock-end">
          {{--  Write To US Start  --}}
          {{--  End Write To US Start  --}}
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
          </div>
        </div>
      </div> --}} 
@endsection
@section('js')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{asset('main-assets/assets/placeholder/plugin.min.js')}}"></script>
    <script src="{{asset('main-assets/assets/placeholder/plugin.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    content_style: "body {font-family: Verdana,Arial,Helvetica,sans-serif;font-size: 20px;}",
    branding: false,
    menubar:false,
	  toolbar: false,
	  placeholder_tokens: [
		{ token: "foo", title: "Foo example", image: "images/t_foo.gif" },
		{ token: "placeholder" },
		{ token: "project_path", image: "images/t_project_path.gif" }
	],
    plugins: [
      "placeholder",
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    height: "300",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
    }
  };

  tinymce.init(editor_config);

   $(document).ready(function(){
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('#image_name').html(fileName);
        });
    });
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
     $(".js-example-basic-multiple").select2({
        tags: true,
        placeholder: 'Add suitable tags for the article (Not more than 5)',
        allowClear: true,
        maximumSelectionLength: 5,
        tokenSeparators: [',', ' ']
    })

    });
</script>


<!-- JS Plugins Init. -->

@endsection
