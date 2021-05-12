@php
$siteName = isset(Configurations::getConfig('site')->site_name) ? Configurations::getConfig('site')->site_name : '';
$logoImg = isset(Configurations::getConfig('site')->site_logo) ? Configurations::getConfig('site')->site_logo : skin('/images/logo.svg');
@endphp
<!DOCTYPE html>
<html>
<head>

    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico" />
    <!-- Author Meta -->
    <meta name="author" content="" />
    <!-- Meta Description -->
    <meta name="description" content="" />
    <!-- Meta Keyword -->
    <meta name="keywords" content="" />
    <!-- meta character set -->
    <meta charset="UTF-8" />

    @if(trim($__env->yieldContent('sIte_tItle')))
        <title>  @yield('sIte_tItle')</title>
    @else
        <title></title>
    @endif


    {!!Cms::style('css/linearicons.css')!!}
    {!!Cms::style('css/font-awesome.min.css')!!}
	{!!Cms::style('css/bootstrap.css')!!}
	{!!Cms::style('css/main.css')!!}
    
{!!Cms::script('theme/vendors/jquery/dist/jquery.min.js')!!}
{!!Cms::script('js/bootstrap.min.js')!!}


    @yield('addlinks')

</head>
<body>

<button type="button" id="mobile-nav-toggle">
    <i class="lnr lnr-menu"></i>
</button>
<header id="header" ,id="home">
    <div class="header-top">
    <div class="container">
        <div class="row">
        <div class="col-lg-6 col-sm-6 col-4 header-top-left no-padding">
            @includeIf(Plugins::get('SocialLinks')[0],['data'=>Plugins::get('SocialLinks')[1]])
        </div>
        <div class="col-lg-6 col-sm-6 col-8 header-top-right no-padding">
            <a href="mailto:krishnareddyk@yahoo.com"
            >krishnareddyk@yahoo.com</a
            >
        </div>
        </div>
    </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light">

  
        <div id="logo">
        <a href="{{url('/')}}"
            ><img
            src="{{Configurations::getConfig('site')->site_logo}}"
            alt="Logo"
            title=""
            style="height: 50px"
        /></a>
        </div>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarText"
          aria-controls="navbarText"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto" id="menuright">
           
            <li class="nav-item">
              <a class="nav-link" href="{{url('/')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('news')}}">Pump News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('events')}}">Pump Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/blogs')}}">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/contact')}}">Contact</a>
            </li>
          </ul>
        </div>
        </nav>
        <!-- <nav id="nav-menu-container">
        <ul class="nav-menu">
            <li class="#"><a href="{{url('/')}}">Home</a></li>

            <li><a href="{{url('news')}}">Pump News</a></li>
            <li><a href="{{url('events')}}">Pump Events</a></li>

            <li><a href="{{url('/blogs')}}">Blog</a></li>

            <li><a href="{{url('/contact')}}">Contact</a></li>
        </ul>
        </nav> -->
        <!-- #nav-menu-container -->
    </div>
    </div>
</header>
<!-- #header -->
<div class="main" style="margin-top:128px;">
@yield('body')
<div>
<!-- start footer Area -->
<footer class="footer-area section-gap">
    <div class="container">
    <div class="row">
        <div class="col-lg-5 col-md-6 col-sm-6">
        <div class="single-footer-widget">
            <h6>About Us</h6>
            <p>
            {{Configurations::getConfig('site')->about}}
            </p>
            <p class="footer-text">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;{{date('Y')}} All rights reserved | by
            <a href="{{url('/')}}" target="_blank">{{Configurations::getConfig('site')->site_name}}</a
            >
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-6">
            <div class="single-footer-widget">
                @includeIf(Plugins::get('NewsLetter')[0],['data'=>Plugins::get('NewsLetter')[1]])
            </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
        <div class="single-footer-widget">
            <h6>Follow Us</h6>
            <p>Let us be social</p>
            <div class="footer-social d-flex align-items-center">
                @includeIf(Plugins::get('SocialLinks')[0],['data'=>Plugins::get('SocialLinks')[1]])
            </div>
        </div>
        </div>
    </div>
    </div>
</footer>

@include('layout::site.notifications')
@section('script')

@endsection
</body>
</html>
