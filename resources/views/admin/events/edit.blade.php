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
                          <li class="breadcrumb-item active"><a href="{{URL::to('admin/events')}}">Events</a>
                          </li>
                          <li class="breadcrumb-item">Edit - {{$events->title}}
                          </li>
                        </ol>
                      </div>
            <div class="col-md-12">
                <div class="card">
                      <div class="card-body">
                            <div class="card-block " style="padding-top: 0px;">
                                    <form class="form" action="{{route('events.update')}}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="icon-ios-compose"></i> Edit Event Details</h4>
                                                <div class="form-group">
                                                    <label for="title"><b>Edit Event Title</b></label>
                                                    <div class="position-relative has-icon-left">
                                                    <input class="form-control border-primary" type="text" placeholder="Title for the event..." value="{{$events->title}}" id="title" name="title">
                                                    <div class="form-control-position">
                                                            <i class="icon-font2"></i>
                                                        </div>
                                                    </div>
                                                </div>
                
                                                <div class="form-group">
                                                        <label for="description"><b>Description</b></label>
                                                        <textarea id="description" class="form-control border-primary my-editor" name="description" placeholder="Description of the post">{{$events->description}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                        <label for="event_date"><b>Event Date</b></label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="date" id="event_date" class="form-control border-primary" name="event_date" value="{{$events->event_date}}">
                                                            <div class="form-control-position">
                                                                <i class="icon-calendar5"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="start_time"><b>Start Time</b></label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="time" id="start_time" class="form-control border-primary" name="start_time" value="{{$events->start_time}}">
                                                                <div class="form-control-position">
                                                                    <i class="icon-clock-o"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="end_time"><b>End Time</b></label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="time" id="end_time" class="form-control border-primary" name="end_time" value="{{$events->end_time}}">
                                                                <div class="form-control-position">
                                                                    <i class="icon-clock-o"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Venue</b></label>
                                                    <div class="position-relative has-icon-left">
                                                    <input class="form-control border-primary" id="venue" name="venue" type="text" placeholder="Event venue" value="{{$events->venue}}">
                                                    <div class="form-control-position">
                                                            <i class="icon-map-marker"></i>
                                                    </div>
                                                    </div>
                                                </div>
        
                                                <div class="form-group">
                                                        <label for="tags"><b>Tags</b></label>
                                                        <div class="position-relative has-icon-left">
                                                        <input class="form-control border-primary" id="tags" type="text" name="event_tag" value="{{$events->tagList}}"  placeholder="Tags for the event" data-role="tagsinput">
                                                        <div class="form-control-position">
                                                                <i class="icon-tags"></i>
                                                            </div>
                                                        </div>
                                                </div>
                                                <input type="hidden" name="id" value="{{$events->id}}">
                                                <div class="form-group">
                                                        <label><b>Upload Featured Image</b></label>
                                                        <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <span class="btn btn-primary btn-file">
                                                                    Browse images… <input type="file" name="featured_image" id="imgInp">
                                                                </span>
                                                            </span>
                                                            <div class="position-relative has-icon-left">
                                                            <input type="text" class="form-control border-primary" name="image" placeholder="{{$events->featured_image}}" readonly>
                                                            <div class="form-control-position">
                                                                    <i class="icon-photo"></i>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <img style="padding-bottom: 15px;" src="{{asset('hub-images/events-images'.'/'.$events->featured_image)}}" id='img-upload'/>
                                                    </div>
                                            </div>
                                            
                                            <div class="form-actions right" style="padding-top: 10px;margin-top: 0px;">
                                                <a class="btn btn-outline-danger btn-warning mr-1" onclick="location.href = '{{URL::to('admin/events')}}';">
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
    plugins: [
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
        close_previous : "no"
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
     
    