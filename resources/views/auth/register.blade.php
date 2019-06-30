@extends('layouts.app')

@section('title','Register')

@section('body')
 <!-- Login -->
 <section class="dzsparallaxer auto-init height-is-based-on-content use-loading mode-scroll loaded dzsprx-readyall" data-options="{direction: 'reverse', settings_mode_oneelement_max_offset: '150'}">
    <!-- Parallax Image -->
    <div class="divimage dzsparallaxer--target w-100 u-bg-overlay g-bg-size-cover g-bg-bluegray-opacity-0_3--after" style="height: 140%; background-image: url({{asset('main-assets/assets/img-temp/1920x1080/img2.jpg')}});"></div>
    <!-- End Parallax Image -->
    <div class="container g-pt-100 g-pb-20">
      <div class="row justify-content-between">
        <div class="col-md-6 col-lg-5 flex-md-unordered align-self-center g-mb-80">
          <div class="u-shadow-v21 g-bg-white rounded g-pa-50">
            <header class="text-center mb-4">
              <h2 class="h2 g-color-black g-font-weight-600">Signup</h2>
            </header>

            <!-- Form -->
            <form class="g-py-15" action="{{ route('register') }}" method="POST" >
              {{csrf_field()}}
            <div class="mb-4{{$errors->has('name') ? 'has-error' : ''}}">
            <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" name="name" type="text" value="{{old('name')}}" placeholder="John Doe" required autofocus>
            @if ($errors->has('name'))
            <small class="form-text text-muted g-font-size-default g-mt-10 g-color-red">{{ $errors->first('name') }}</small>
              
            @endif
              </div>

            <div class="mb-4{{$errors->has('email') ? 'has-error' : ''}}">
            <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" name="email" id="email" value="{{old('email')}}" type="email" placeholder="johndoe@gmail.com">
            @if($errors->has('email'))
            <small class="form-text text-muted g-font-size-default g-mt-10 g-color-red">{{$errors->first('email')}}</small>
            @endif
              </div>

            <div class="g-mb-30{{$errors->has('password') ? 'has-error' : ''}}">
                <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" name="password" type="password" placeholder="Password">
                @if($errors->has('password'))
                <small class="form-text text-muted g-font-size-default g-mt-10 g-color-red">{{$errors->first('password')}}</small>
                @endif
              </div>
              
              <div class="g-mb-30">
                  <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" id="password-confirm" name="password_confirmation" type="password" placeholder="Confirm Password">
                </div>

              <div class="text-center mb-5">
                <button class="btn btn-block u-btn-primary rounded g-py-13" type="submit">Sign Up</button>
              </div>

              <div class="d-flex justify-content-center text-center g-mb-30">
                <div class="d-inline-block align-self-center g-width-50 g-height-1 g-bg-gray-light-v1"></div>
                <span class="align-self-center g-color-gray-dark-v5 mx-4">OR</span>
                <div class="d-inline-block align-self-center g-width-50 g-height-1 g-bg-gray-light-v1"></div>
              </div>

              <ul class="list-inline text-center mb-4">
                <li class="list-inline-item g-mx-2">
                <a class="u-icon-v1 u-icon-size--sm u-icon-slide-up--hover g-color-white g-bg-facebook rounded-circle" href="/signin/facebook">
                    <i class="g-font-size-default g-line-height-1 u-icon__elem-regular fa fa-facebook"></i>
                    <i class="g-font-size-default g-line-height-0_8 u-icon__elem-hover fa fa-facebook"></i>
                  </a>
                </li>
                
                <li class="list-inline-item g-mx-2">
                  <a class="u-icon-v1 u-icon-size--sm u-icon-slide-up--hover g-color-white g-bg-google-plus rounded-circle" href="/signin/google">
                    <i class="g-font-size-default g-line-height-1 u-icon__elem-regular fa fa-google-plus"></i>
                    <i class="g-font-size-default g-line-height-0_8 u-icon__elem-hover fa fa-google-plus"></i>
                  </a>
                </li>
         
              </ul>
              <!-- End Form Social Icons -->
            </form>
           

            <footer class="text-center">
              <p class="g-color-gray-dark-v5 mb-0">Already have an account? <a class="g-font-weight-600" href="{{URL::to('login')}}">Sign In</a>
              </p>
            </footer>
          </div>
        </div>

        <div class="col-md-6 flex-md-first align-self-center g-mb-80">
          <div class="mb-5">
            <h1 class="h3 g-color-white g-font-weight-600 mb-3">Profitable contracts,<br>invoices &amp; payments for the best cases!</h1>
            <p class="g-color-white-opacity-0_8 g-font-size-12 text-uppercase">Trusted by 31,000+ users globally</p>
          </div>

          <div class="row">
            <div class="col-md-11 col-lg-9">
              <!-- Icon Blocks -->
              <div class="media mb-4">
                <div class="d-flex mr-4">
                  <span class="align-self-center u-icon-v1 u-icon-size--lg g-color-primary">
                    <i class="icon-finance-168 u-line-icon-pro"></i>
                  </span>
                </div>
                <div class="media-body align-self-center">
                  <p class="g-color-white mb-0">Reliable contracts, multifanctionality &amp; best usage of Unify template</p>
                </div>
              </div>
              <!-- End Icon Blocks -->

              <!-- Icon Blocks -->
              <div class="media mb-5">
                <div class="d-flex mr-4">
                  <span class="align-self-center u-icon-v1 u-icon-size--lg g-color-primary">
                    <i class="icon-finance-193 u-line-icon-pro"></i>
                  </span>
                </div>
                <div class="media-body align-self-center">
                  <p class="g-color-white mb-0">Secure &amp; integrated options to create individual &amp; business websites</p>
                </div>
              </div>
              <!-- End Icon Blocks -->

              <!-- Testimonials -->
              <blockquote class="u-blockquote-v1 g-color-main rounded g-pl-60 g-pr-30 g-py-25 g-mb-40">Look no further you came to the right place. Unify offers everything you have dreamed of in one package.</blockquote>
              <div class="media">
                <img class="d-flex align-self-center rounded-circle g-width-40 g-height-40 mr-3" src="../../assets/img-temp/100x100/img12.jpg" alt="Image Description">
                <div class="media-body align-self-center">
                  <h4 class="h6 g-color-primary g-font-weight-600 g-mb-0">Alex Pottorf</h4>
                  <em class="g-color-white g-font-style-normal g-font-size-12">Web Developer</em>
                </div>
              </div>
              <!-- End Testimonials -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Login -->
{{--  <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  --}}
@endsection
