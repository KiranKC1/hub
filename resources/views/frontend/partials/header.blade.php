<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Title -->
  <title>EzuHub | @yield('title')</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- Favicon -->
  <link rel="shortcut icon" href="../../../favicon.ico">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- CSS Global Compulsory -->
  <link rel="stylesheet" href="{{asset('main-assets/assets/vendor/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('main-assets/assets/vendor/bootstrap/offcanvas.css')}}">
  <!-- CSS Global Icons -->
  <link rel="stylesheet" href="{{asset('main-assets/assets/vendor/icon-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('main-assets/assets/vendor/icon-line/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{asset('main-assets/assets/vendor/icon-etlinefont/style.css')}}">
  <link rel="stylesheet" href="{{asset('main-assets/assets/vendor/icon-line-pro/style.css')}}">
  <link rel="stylesheet" href="{{asset('main-assets/assets/vendor/icon-hs/style.css')}}">
  <link rel="stylesheet" href="{{asset('main-assets/assets/vendor/dzsparallaxer/dzsparallaxer.css')}}">
  <link rel="stylesheet" href="{{asset('main-assets/assets/vendor/dzsparallaxer/dzsscroller/scroller.css')}}">
  <link rel="stylesheet" href="{{asset('main-assets/assets/vendor/dzsparallaxer/advancedscroller/plugin.css')}}">
  <link rel="stylesheet" href="{{asset('main-assets/assets/vendor/animate.css')}}">
  <link rel="stylesheet" href="{{asset('main-assets/assets/vendor/hamburgers/hamburgers.min.css')}}">
  <link rel="stylesheet" href="{{asset('main-assets/assets/vendor/hs-megamenu/src/hs.megamenu.css')}}">
  <link rel="stylesheet" href="{{asset('main-assets/assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css')}}">
  <link rel="stylesheet" href="{{asset('main-assets/assets/vendor/slick-carousel/slick/slick.css')}}">
  <link rel="stylesheet" href="{{asset('main-assets/assets/vendor/fancybox/jquery.fancybox.css')}}">

  <!-- CSS Unify -->
  <link rel="stylesheet" href="{{asset('main-assets/assets/css/unify-core.css')}}">
  <link rel="stylesheet" href="{{asset('main-assets/assets/css/unify-components.css')}}">
  <link rel="stylesheet" href="{{asset('main-assets/assets/css/unify-globals.css')}}">

  <!-- CSS Customization -->
  <link rel="stylesheet" href="{{asset('main-assets/assets/css/custom.css')}}">
  
</head>

<div class="container">
  <div class="row">
    <div id="messages">
      
  </div>
  
  </div>
</div>
@if (Session::has('success'))
<div class="container">
  <div class="row">
    <div>
<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-success alert-dismissible fade show" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; bottom: 20px; right: 10px; animation-iteration-count: 1;">
  <button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">×</span>
  </button>
  <h4 class="h5">
  <i class="fa fa-check-circle-o"></i>
   Well Done!
  </h4>
  <p>{{Session::get('success')}}</p>
</div>
</div>
</div>
</div>
@endif


@if ($errors->any())
<div class="container">
  <div class="row">
    <div>
      <div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-dismissible fade show" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; bottom: 20px; right: 10px; animation-iteration-count: 1;">
        <button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="h5">
          <i class="fa fa-minus-circle"></i>
          Oh snap!
        </h4> 
        @foreach ($errors->all() as $error)
        <p>{!! $error !!}</p>
        @endforeach
</div>
</div>
</div>
</div>
@endif
<style>
  .no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url({{asset('hub-images/pageloading.gif')}}) center no-repeat #fff;
}
}
</style>

