@extends('layouts.admin')

@section('css') 

<link href="/admin-assets/dist/styles.imageuploader.css" rel="stylesheet" type="text/css">
<link href="/admin-assets/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css">
@endsection

@section('body')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Settings</h2>
        </div>
    </div>
    <div class="content-body">
        <div class="card">
            <div class="card-body collapse in">
                <div class="card-block">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link {{$active=='home'?'active':''}}" id="home-tab" data-toggle="tab" href="#home" aria-controls="home" aria-expanded="true" onclick="window.history.pushState( {} , '', '?active=home' );">Home Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{$active=='contact'?'active':''}}" id="contact-tab" data-toggle="tab" href="#contact" aria-controls="contact" aria-expanded="false" onclick="window.history.pushState( {} , '', '?active=contact' );">Contacts Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$active=='about'?'active':''}}" id="aboutUs-tab" data-toggle="tab" href="#aboutUs" aria-controls="aboutUs" aria-expanded="false" onclick="window.history.pushState( {} , '', '?active=about' );">AboutUs Settings</a>
                        </li>
                    </ul>
                    <div class="tab-content px-1 pt-1">
                        <div role="tabpanel" class="tab-pane fade {{$active=='home'?'active':''}} in" id="home" aria-labelledby="home-tab" aria-expanded="true">
                            <div style="text-align:right;margin-bottom:15px;">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#uploadImagesModal">
                                Add Images
                                </button>
                            </div>
                            @if(count($images)==0)
                                <p class="font-medium-3 text-muted text-xs-center" style="margin:100px">No Images Yet</p>   
                            @endif
                            <div class="row match-height">
                                @foreach($images as $image)
                                    <div class="col-xl-3 col-md-6 col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <img class="card-img-top img-fluid" src="{{ route('asset', ['landing_images',$image->image,319,160]) }}" alt="Card image cap" style="widht:319px;height:160px">
                                                <form action="{{ route('admin.settings.removeImage',$image->id) }}" method="POST" style="text-align:center; margin-top:12px">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button id='deleteImage' type="button" class="btn btn-danger btn-min-width mr-1 mb-1">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade {{$active=='contact'?'active in':''}}" id="contact" role="tabpanel" aria-labelledby="contact-tab" aria-expanded="false">
                            <p><strong>Address     : </strong> <a href="javascript:void(0);" id="address">{{ $contact->address }}</a> </p>
                            <p><strong>Email(s)    : </strong> <a href="javascript:void(0);" id="email">{{ $contact->email }}</a></p>
                            <p><strong>Phone No.(s): </strong> <a href="javascript:void(0);" id="phone">{{ $contact->phone }}</a> </p>
                            <div style="height:199px"></div>
                        </div>
                        <div class="tab-pane fade {{$active=='about'?'active in':''}}" id="aboutUs" role="tabpanel" aria-labelledby="aboutUs-tab" aria-expanded="false">
                            <form class="form" id="aboutform" method="POST" action="{{ route('admin.settings.aboutUpdate') }}"  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input name="image" type="file" id="upload" class="hidden" onchange="">
                                <div class="form-group">
                                    <label for="aboutImage"><strong>Image:</strong></label>
                                    @if ($errors->has('aboutImage'))
                                        <div class="alert alert-danger no-border mb-2">
                                            <strong>{{ $errors->first('aboutImage') }}</strong>
                                        </div>
                                    @endif
                                    <input type="file" id="aboutImage" class="form-control" name="aboutImage"/>
                                    
                                    <div>
                                        <img src="{{ route('asset', ['landing_images',$about->photo,100,100]) }}" alt="About Us image" style="width:100px;height: 100px;" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>About Us:</strong></label>
                                    @if ($errors->has('aboutContent'))
                                        <div class="alert alert-danger no-border mb-2">
                                            <strong>{{ $errors->first('aboutContent') }}</strong>
                                        </div>
                                    @endif
                                    <div class="editable">
                                        {!! $about->content !!}
                                    </div>
                                </div>
                                <div class="form-actions right">
                                    <button id="aboutsubmit" class="btn btn-primary">
                                        <i class="icon-check2"></i> Save
                                    </button>
                                </div>
                            </form>
                            
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
  
    <!-- Modal -->
    <div class="modal fade text-xs-left" id="uploadImagesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true" style="min-height:500px;min-width:500px;">
        <div class="modal-dialog" role="document">

            <div style="text-align:right">             
                <button id="cross"  type="button" class="btn btn-outline-secondary" data-dismiss="modal" style="background-color: #185284;color: #fff;">&times;</button>
            </div>            
            <div class=" uploader__box js-uploader__box l-center-box">
                <form class="form" enctype="multipart/form-data" method="POST" action="{{ route('admin.settings.addImage') }}">
                       
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
    <script src="/admin-assets/dist/jquery.imageuploader.js"></script>
    <script src="/admin-assets/bootstrap3-editable/js/bootstrap-editable.js"></script>
	<script>
		(function(){
            var options = {'ajaxUrl':"{{ route('admin.settings.addImage') }}"};
            $('.js-uploader__box').uploader(options);
        }());
        $.fn.editable.defaults.mode = 'inline';
        $('#address').editable({
            type: 'text',
            name: 'address',
            url: '{{route("admin.settings.contactUpdate")}}',
            title: 'Enter address',
            send: 'always',
            validate: function(value) {
                if($.trim(value) == '') {
                    return 'This field is required';
                }
            }
        });
        $('#email').editable({
            type: 'textarea',
            name: 'email',
            url: '{{route("admin.settings.contactUpdate")}}',
            title: 'Enter emails',
            send: 'always',
            validate: function(value) {
                if($.trim(value) == '') {
                    return 'This field is required';
                }
            }
        });
        $('#phone').editable({
            type: 'textarea',
            name: 'phone',
            url: '{{route("admin.settings.contactUpdate")}}',
            title: 'Enter phone',
            send: 'always',
            validate: function(value) {
                if($.trim(value) == '') {
                    return 'This field is required';
                }
            }
        });
    </script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script>
		tinymce.init({
            selector: 'div.editable',
            inline: true,
            theme: "modern",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons paste textcolor colorpicker textpattern"
            ],
            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            toolbar2: "print preview | forecolor backcolor emoticons",
            image_advtab: true,
            file_picker_callback: function(callback, value, meta) {
                if (meta.filetype == 'image') {
                    $('#upload').trigger('click');
                    $('#upload').on('change', function() {
                    var file = this.files[0];
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        callback(e.target.result, {
                        alt: ''
                        });
                    };
                    reader.readAsDataURL(file);
                    });
                }
            }
        });

        $('#aboutsubmit').click(function(e){
            e.preventDefault();
            param = $('#mce_1').html();
            param = "<textarea name='aboutContent' hidden>" + param + "</textarea>";

            // append it to the form
            $('#aboutform').append(param);
            this.form.submit();
        });
    </script>
   
@endsection