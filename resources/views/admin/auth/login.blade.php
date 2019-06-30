@include('admin.partials.header',['title'=>'| Admin Login'])

    <body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
        <!-- ////////////////////////////////////////////////////////////////////////////-->
        <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 m-0">
                            <div class="card-header no-border">
                                <div class="card-title text-xs-center">
                                    <div class="p-1"><img src="" alt="branding logo"></div>
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Login as Admin</span></h6>
                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block">
                                    <form class="form-horizontal form-simple" method="POST" action="{{ route('admin_login') }}">
                                        {{ csrf_field() }}
                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                            <input type="email" class="form-control form-control-lg input-lg {{ $errors->has('email') ? 'border-danger' : '' }}" id="email" placeholder="Your Email" name="email" value="{{ old('email') }}" required autofocus>
                                            <div class="form-control-position">
                                                <i class="icon-head"></i>
                                            </div>
                                            @if ($errors->has('email'))
                                                <div class="alert alert-danger no-border mb-2">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </div>
                                            @endif
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" class="form-control form-control-lg input-lg {{ $errors->has('password') ? 'border-danger' : '' }}" name="password" placeholder="Enter Password" required>
                                            <div class="form-control-position">
                                                <i class="icon-key3"></i>
                                            </div>
                                            @if ($errors->has('password'))
                                                <div class="alert alert-danger no-border mb-2">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </div>
                                            @endif
                                        </fieldset>
                                        <fieldset class="form-group row">
                                            <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                                                <fieldset>
                                                    <input type="checkbox" id="remember-me" class="chk-remember" value="None" name="remember" {{ old('remember') ? 'checked' : '' }}  >
                                                    <label for="remember-me"> Remember Me</label>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6 col-xs-12 text-xs-center text-md-right"><a href="{{ route('admin_password.request') }}" class="card-link">Forgot Password?</a></div>
                                        </fieldset>
                                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i> Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
        </div>
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
    </body>
    <script>
        setTimeout(function(){ $(".alert").fadeOut(3000); }, 3000);
    </script>
</html>