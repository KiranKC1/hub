@extends('layouts.admin')
@section('body')
@if (count($errors)>0 )
<div class="alert alert-dismissible fade in mb-2">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" style="color:black">&times;</span>
    </button>
    <ul class="list-group">
        @foreach ($errors->all() as $error)
        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
        @endforeach
    </ul>
</div>	
@endif
<style>
        .mce-panel {
            border: 0 solid #967adc;
            border: 1 solid #2851a22;
            background-color: #fff;
        }
        .btn-file {   
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }
        
        #img-upload{
            height:30%;
            width: 30%;
            text-align: center;
            padding-top:10px;
        }
</style>
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/tag-plugin/src/bootstrap-tagsinput.css')}}" />
<section id="posts">  
        <div class="row">
                <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb" style="padding-bottom:10px;">
                          <li class="breadcrumb-item active"><a href="{{URL::to('admin')}}">Dashboard</a>
                          </li>
                          <li class="breadcrumb-item active"><a href="{{URL::to('admin/posts')}}">Posts</a>
                          </li>
                          <li class="breadcrumb-item">Edit - {{$posts->title}}
                          </li>
                        </ol>
                      </div>
            <div class="col-md-12">
                <div class="card">
                      <div class="card-body">
                          
                          <div class="card-block" style="padding-top:0px;">
                                <form class="form" action="{{route('posts.update')}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="icon-ios-compose"></i>Edit Post Details | {{$posts->title}}</h4>
                                            <div class="form-group">
                                                <label for="title"><b>Post Title</b></label>
                                                <div class="position-relative has-icon-left">
                                                <input class="form-control border-primary" type="text" placeholder="Title for the post..." value="{{$posts->title}}" id="title" name="title">
                                                <div class="form-control-position">
                                                        <i class="icon-font2"></i>
                                                    </div>
                                                </div>
                                            </div>
            
                                            <div class="form-group">
                                                <label for="category"><b>Post category</b></label>
                                                <div class="position-relative has-icon-left">
                                                <select name="category" class="form-control border-primary" id='category'>
                                                        <option selected disabled>Choose here</option>
                                                        @foreach($categories as $c)
                                                          <option value="{{$c->id}}" 
                                                              @if($c->id == $posts->category_id) selected @endif >{{$c->name}}</option>
                                                        @endforeach
                                                 </select>
                                                 <div class="form-control-position">
                                                        <i class="icon-tree"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                    <label for="description"><b>Description</b></label>
                                                    <textarea id="description" class="form-control border-primary my-editor" name="description" placeholder="Description of the post">{{$posts->description}}</textarea>
                                            </div>
    
                                            <div class="form-group">
                                                    <label for="tags"><b>Tags</b></label>
                                                    <div class="position-relative has-icon-left">
                                                    <input class="form-control border-primary" id="post_tag" type="text" name="post_tag" value="{{$posts->tagList}}"  placeholder="Tags for the post" data-role="tagsinput">
                                                    <div class="form-control-position">
                                                            <i class="icon-tags"></i>
                                                        </div>
                                                    </div>
                                            </div>
            
                                            <div class="form-group">
                                                <label><b>Author</b></label>
                                                <div class="position-relative has-icon-left">
                                                <input class="form-control border-primary" id="author" name="author" type="text" placeholder="Author" value="{{$posts->author}}">
                                                <div class="form-control-position">
                                                        <i class="icon-user4"></i>
                                                </div>
                                                </div>
                                            </div>
    
                                            <div class="form-group">
                                                    <label><b>Upload Featured Image</b></label>
                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <span class="btn btn-primary btn-file">
                                                                Browse images… <input type="file" name="featured_image" id="imgInp">
                                                            </span>
                                                        </span>
                                                        <div class="position-relative has-icon-left">
                                                        <input type="text" class="form-control border-primary" value="{{$posts->featured_image}}" readonly>
                                                        <div class="form-control-position">
                                                                <i class="icon-photo"></i>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <img style="padding-bottom: 15px;" src="{{asset('hub-images/posts-images'.'/'.$posts->featured_image)}}" id='img-upload'/>
                                                </div>
                                                
            
            
                                        </div>
                                        <input type="hidden" name="id" value="{{$posts->id}}">
                                        <div class="form-actions right" style="padding-top: 10px;margin-top: 0px;">
                                            <a href="{{URL::to('admin/posts')}}" class="btn btn-outline-danger btn-warning mr-1">
                                                <i class="icon-cross2"></i> Cancel
                                            </a>
                                            <a class="btn btn-outline-primary" onclick="document.forms[1].submit()" >
                                                    <i class="icon-check2"></i> Save
                                            </a> 
                                        </div> 
                                    </form>
                        </div>
                            
                        </div>
                    </div>
                </div>
            </div>
      </section>
@endsection
@section('js')
<script src="{{asset('admin-assets/tag-plugin/src/bootstrap-tagsinput.js')}}"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

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

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no",
        forced_root_block : "", 
        force_br_newlines : true,
        force_p_newlines : false,
         image_class_list: [
            {title: 'Responsive', value: 'img-responsive'}
        ],
      });
    }
  };

  tinymce.init(editor_config);
</script>
<script>
        $(document).ready( function() {
            $(document).on('change', '.btn-file :file', function() {
            var input = $(this),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [label]);
            });
    
            $('.btn-file :file').on('fileselect', function(event, label) {
                
                var input = $(this).parents('.input-group').find(':text'),
                    log = label;
                
                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }
            
            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    
                    reader.onload = function (e) {
                        $('#img-upload').attr('src', e.target.result);
                    }
                    
                    reader.readAsDataURL(input.files[0]);
                }
            }
    
            $("#imgInp").change(function(){
                readURL(this);
            }); 	
        });
</script>
@endsection
     
    