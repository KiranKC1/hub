@include('admin.partials.header',['title'=>'| Admin Reset Password'])

  <body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1 box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                        <div class="card-header no-border pb-0">
                            <div class="card-title text-xs-center">
                                <img src="" alt="branding logo">
                            </div>
                            <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Change your password</span></h6>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">
                                <form class="form-horizontal" method="POST" action="{{ route('admin_password.request') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="email" class="form-control form-control-lg input-lg{{ $errors->has('email') ? ' border-danger' : '' }}" id="user-email" placeholder="Your Email Address" name="email" value="{{ old('email') }}" required>
                                        <div class="form-control-position">
                                            <i class="icon-mail6"></i>
                                        </div>
                                        @if ($errors->has('email'))
                                            <div class="alert alert-danger no-border ">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </div>
                                        @endif
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="password" class="form-control form-control-lg input-lg{{ $errors->has('password') ? ' border-danger' : '' }}" id="user-password" placeholder="Enter New Password" name="password" required>
                                        <div class="form-control-position">
                                            <i class="icon-key3"></i>
                                        </div>
                                        @if ($errors->has('password'))
                                            <div class="alert alert-danger no-border ">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </div>
                                        @endif
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="password" class="form-control form-control-lg input-lg{{ $errors->has('password_confirmation') ? ' border-danger' : '' }}" id="user-conpassword" placeholder="Comfirm Password" name="password_confirmation" required>
                                        <div class="form-control-position">
                                            <i class="icon-key3"></i>
                                        </div>
                                        @if ($errors->has('password_confirmation'))
                                            <div class="alert alert-danger no-border ">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </div>
                                        @endif
                                    </fieldset>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-lock4"></i> Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="{{asset('admin-assets/app-assets/js/core/libraries/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/app-assets/vendors/js/ui/tether.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/app-assets/js/core/libraries/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/app-assets/vendors/js/ui/unison.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/app-assets/vendors/js/ui/blockUI.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/app-assets/vendors/js/ui/jquery.matchHeight-min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/app-assets/vendors/js/ui/screenfull.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/app-assets/vendors/js/extensions/pace.min.js')}}" type="text/javascript"></script>
    <!-- BEGIN ROBUST JS-->
    <script src="{{asset('admin-assets/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/app-assets/js/core/app.js')}}" type="text/javascript"></script>
    <!-- END ROBUST JS-->
    <script>
        setTimeout(function(){ $(".alert").fadeOut(3000); }, 3000);
    </script>
  </body>
</html>
