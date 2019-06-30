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
        .search-form .form-group {
            float: right !important;
            transition: all 0.35s, border-radius 0s;
            width: 32px;
            height: 32px;
            background-color: #fff;
            box-shadow: 0 2px 2px rgba(0, 0, 0, 0.075) inset;
            border-radius: 25px;
            border: 1px solid #967adc;
          }
          .search-form .form-group input.form-control {
            padding-right: 20px;
            border: 0 none;
            background: transparent;
            box-shadow: none;
            display:block;
          }
          .search-form .form-group input.form-control::-webkit-input-placeholder {
            display: none;
          }
          .search-form .form-group input.form-control:-moz-placeholder {
            /* Firefox 18- */
            display: none;
          }
          .search-form .form-group input.form-control::-moz-placeholder {
            /* Firefox 19+ */
            display: none;
          }
          .search-form .form-group input.form-control:-ms-input-placeholder {
            display: none;
          }
          .search-form .form-group:hover,
          .search-form .form-group.hover {
            width: 100%;
            border-radius: 4px 25px 25px 4px;
          }
          .search-form .form-group span.form-control-feedback {
            position: absolute;
            top: -1px;
            right: -2px;
            z-index: 2;
            display: block;
            width: 34px;
            height: 34px;
            line-height: 34px;
            text-align: center;
            color: #3596e0;
            left: initial;
            font-size: 14px;
          }
          
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
            <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" ><a data-action="collapse"><button  class="btn btn-md btn-primary"><i class="icon-plus4" aria-hidden="true"></i> Add Event </button></a></h4>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                  
                                    <li><a data-action="collapse"><i class="icon-plus4"></i></a></li>
                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
          
                                </ul>
                            </div>
                        </div>
             
                          <div class="card-body collapse">
                              
                              <div class="card-block " style="padding-top: 0px;">
                                    <form class="form" action="#" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="icon-ios-compose"></i> Add Event Details</h4>
                                                <div class="form-group">
                                                    <label for="title"><b>Event Title</b></label>
                                                    <div class="position-relative has-icon-left">
                                                    <input class="form-control border-primary" type="text" placeholder="Title for the event..." value="{{old('title')}}" id="title" name="title">
                                                    <div class="form-control-position">
                                                            <i class="icon-font2"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="description"><b>Description</b></label>
                                                        <textarea id="description" class="form-control border-primary my-editor" name="description" placeholder="Description of the post">{{old('description')}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                        <label for="event_date"><b>Event Date</b></label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="date" id="event_date" class="form-control border-primary" name="event_date" value="{{old('event_date')}}">
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
                                                                <input type="time" id="start_time" class="form-control border-primary" name="start_time" value="{{old('start_time')}}">
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
                                                                <input type="time" id="end_time" class="form-control border-primary" name="end_time" value="{{old('end_time')}}">
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
                                                    <input class="form-control border-primary" id="venue" name="venue" type="text" placeholder="Event venue" value="{{old('venue')}}">
                                                    <div class="form-control-position">
                                                            <i class="icon-map-marker"></i>
                                                    </div>
                                                    </div>
                                                </div>
        
                                                <div class="form-group">
                                                        <label for="tags"><b>Tags</b></label>
                                                        <div class="position-relative has-icon-left">
                                                        <input class="form-control border-primary" id="tags" type="text" name="event_tag" value="{{old('event_tag')}}"  placeholder="Tags for the event" data-role="tagsinput">
                                                        <div class="form-control-position">
                                                                <i class="icon-tags"></i>
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
                                                            <input type="text" class="form-control border-primary" name="featured_image" readonly>
                                                            <div class="form-control-position">
                                                                    <i class="icon-photo"></i>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <img style="padding-bottom: 15px;" id='img-upload'/>
                                                    </div>
                                                    
                
                
                                            </div>
                
                                            <div class="form-actions right" style="padding-top: 10px;margin-top: 0px;">
                                                <a data-action="collapse" class="btn btn-outline-danger btn-warning mr-1">
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
        
  
        
        <div class="row">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Search results for "{{$search}}"</h4>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block card-dashboard" style="padding-top:5px;padding-bottom:0px;">
                                <div class="row">
                                    <div class="col-md-8">
                                    <button style="margin-top: 5px;" class="btn btn-sm btn-success" onclick="location.href = '{{URL::to('admin/events')}}';"><i class="icon-reply4"></i> Back to Events</button>
                                </div>
                                        <div class="col-md-4 pull-right" style="
                                        height: 35px;
                                        ">
                                            <form action="{{route('events.search')}}" method="GET" class="search-form">
                                                <div class="form-group has-feedback">
                                                    <label for="search" class="sr-only">Search</label>
                                                    <input type="text" class="form-control" name="search" id="search" placeholder="Search by title" >
                                                    <span class="icon-search7 form-control-feedback" style="right: 13px;margin-top: 0px;"></span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @if(count($events)!=null)
                            <div class="table-responsive" id="eventstable">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                           <th>Event date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($events as $index => $p)
                                        <tr>
                                            <th scope="row">{{ $index +1 }}</th>
                                            <td>{{$p->title}}</td>
                                            <td>{{date('M j,Y',strtotime($p->event_date))}}</td>
                                            <td>
                                                    <a href="" class="btn btn-sm btn-info"><i class="icon-eye4"></i>View</a>
                                                    <a href="{{route('events.edit',$p->id)}}" class="btn btn-sm btn-primary"><i class="icon-pencil3"></i>Edit</a>
                                                    <a href="#" id="deleteevent{{$p->id}}" class="btn btn-sm btn-danger"><i class="icon-trash-o"></i>Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                            @endif
                            @if(count($events)==null)
                            <div class="card-block">
                                    <div class="card-text">
                                        <h3>No results found</h3>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                {{$events->links("pagination::bootstrap-4")}}
            </div>
  </section>
 

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
        $(document).on('click',"[id*='deleteevent']",function(event){
            var id = $(this).attr("id").slice(11);
            console.log(id);
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this file!",
                type: "warning",
        
                showCancelButton: true,
        
              }).then(function(){
                $.post("{{route('posts.destroy')}}",{id:id,_token:"{{csrf_token()}}"},function(data){
                  swal({
                    title:"Deleted Successfully",
                    type:"success"
        
                  }).then(function(){
                    $('#eventstable').load(location.href + ' #eventstable');
                  })
                })
              });
        });
</script>
@endsection
@endsection