 @extends('layouts.admin')

 @section('body')

    <div class="content-header row">
    </div>
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Reply to {{ $contact->name }}</h4>
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
                    <form class="form" method="POST" action="{{ route('contact-us-messages.replySend',$contact->id) }}"  enctype="multipart/form-data">
                        {{ csrf_field() }}

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
                                <i class="icon-paperplane"></i> Send
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
            theme: "modern",
            plugins: [
                "advlist autolink lists link charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons paste textcolor colorpicker textpattern"
            ],
            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link",
            toolbar2: "print preview | forecolor backcolor emoticons"
        });
    </script>
   
@endsection