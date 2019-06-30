@extends('layouts.admin')

@section('css') 
    <link href="/admin-assets/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css">
@endsection

@section('body')

    <div class="content-header row">
    </div>
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Profile</h4>
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
                    <button id="changePswd" class="btn btn-warning btn-min-width mr-1 mb-2">Change Password</button>                            
                    <br><br>
                    <strong>Username: </strong> <a id="admin_name" href="javascript:void(0);">{{ Auth::user()->name }}</a><br><br>
                    <strong>Email: </strong> {{ Auth::user()->email }}<br>
                    
                    <div style="height:174px"></div>
                    <!-- Modal -->
                    <div class="modal fade text-xs-left" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true" >
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form class="form" method="POST" action="{{ route('profile.changePassword') }}">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        <div class="form-body">
                                            <h4 class="form-section">Password Update</h4>
                                            @if (count($errors->changePassword)>0 )
                                                <div class="alert alert-dismissible fade in mb-2">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true" style="color:black">&times;</span>
                                                    </button>
                                                    <ul class="list-group">
                                                        @foreach ($errors->changePassword->all() as $error)
                                                        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>	
                                            @endif
                                            <div class="form-group">
                                                <label for="oldPasswrd">Old Password</label>
                                                <input class="form-control " id="oldPasswrd" type="password" placeholder="Old Password"  name="oldPassword" required>
                                            
                                            </div>

                                            <div class="form-group">
                                                <label for="passwrd">New Password</label>
                                                <input class="form-control " id="passwrd" type="password" placeholder="New Password"  name="password" required>
                                                
                                            </div>

                                            <div class="form-group">
                                                <label for="passwrd-confirm">Confirm New Password</label>
                                                <input class="form-control " id="passwrd-confirm" type="password" placeholder="Confirm New Password"  name="password_confirmation" required>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-outline-primary">Save changes</button>
                                    </div>
                                </form>                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('js')

    <script>
        if({{ count($errors->changePassword)}} > 0){
            $('#changePasswordModal').modal('show');
        }
        $('#changePswd').click(function(){
            $('#changePasswordModal').modal('show');
        });
    </script>
    <script src="/admin-assets/bootstrap3-editable/js/bootstrap-editable.js"></script>
	<script>

        $.fn.editable.defaults.mode = 'inline';
        $('#admin_name').editable({
            type: 'text',
            url: '{{route("profile.updateName")}}',
            title: 'Edit Name',
            send: 'always',
            validate: function(value) {
                if($.trim(value) == '') {
                    return 'This field is required';
                }
            },
            success:function(value){
                $('#adminName').text(value);
            }
        });
    </script>
   
@endsection