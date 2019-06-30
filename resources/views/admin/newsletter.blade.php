@extends('layouts.admin')

@section('body')

    <div class="content-header row">
    </div>
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Newsletter</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="card-block card-dashboard">
                    <form class="form" method="POST" action="{{ route('newsletterSend') }}"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input name="image" type="file" id="upload" class="hidden" onchange="">

                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control{{ $errors->has('subject') ? ' border-danger' : '' }}" id="subject" name="subject">
                            @if ($errors->has('subject'))
                                <div class="alert alert-danger no-border mb-2">
                                    <strong>{{ $errors->first('subject') }}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="attachment">Attachment</label>
                            <input type="file" class="form-control" id="attachment" name="attachment">
                        </div>

                        <div class="form-group">
                            <label for="message">Message <span style="color:red;font-size:25px;">*</span></label>
                            @if ($errors->has('message'))
                                <div class="alert alert-danger no-border mb-2">
                                    <strong>{{ $errors->first('message') }}</strong>
                                </div>
                            @endif
                            <textarea cols="50" rows="20" class="form-control{{ $errors->has('message') ? ' border-danger' : '' }}" id="message" name="message"></textarea>
                        </div>

                        <div class="form-actions right">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-check2"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
   <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
   <script>
       tinymce.init({
           selector: "textarea#message",
           
           plugins: [
               "advlist autolink lists link image charmap print preview hr anchor pagebreak",
               "searchreplace wordcount visualblocks visualchars code",
               "insertdatetime media nonbreaking save table contextmenu directionality",
               "emoticons template paste textcolor colorpicker textpattern"
           ],
           toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
           toolbar2: "print preview | forecolor backcolor emoticons | template",
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
           },
           templates: [
               {title: 'Newsletter1', description: 'Notice', url: "/templates/newsletter.html"}
             ]
       });
   </script>
  
@endsection