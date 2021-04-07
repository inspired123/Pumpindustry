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
            <ul>
            <li>
                <a
                href="https://www.facebook.com/Pump-Industry-120516858033092"
                ><i class="fa fa-facebook"></i
                ></a>
            </li>
            <li>
                <a href="https://twitter.com/PumpIndustry"
                ><i class="fa fa-twitter"></i
                ></a>
            </li>
            <li>
                <a href="https://www.linkedin.com/groups/3938215/"
                ><i class="fa fa-linkedin"></i
                ></a>
            </li>
            </ul>
        </div>
        <div class="col-lg-6 col-sm-6 col-8 header-top-right no-padding">
            <a href="mailto:krishnareddyk@yahoo.com"
            >krishnareddyk@yahoo.com</a
            >
        </div>
        </div>
    </div>
    </div>
    <div class="container main-menu">
    <div class="row align-items-center justify-content-between d-flex">
        <div id="logo">
        <a href="{{url('/')}}"
            ><img
            src="{{skin('/img/Pump-Industry-logo.jpg')}}"
            alt=""
            title=""
            style="height: 50px"
        /></a>
        </div>
        <nav id="nav-menu-container">
        <ul class="nav-menu">
            <li class="#"><a href="">Home</a></li>

            <li><a href="{{url('news')}}">Pump News</a></li>
            <li><a href="{{url('events')}}">Pump Events</a></li>

            <li><a href="#">Blog</a></li>

            <li><a href="contact.html">Contact</a></li>
        </ul>
        </nav>
        <!-- #nav-menu-container -->
    </div>
    </div>
</header>
<!-- #header -->

@yield('body')

<!-- start footer Area -->
<footer class="footer-area section-gap">
    <div class="container">
    <div class="row">
        <div class="col-lg-5 col-md-6 col-sm-6">
        <div class="single-footer-widget">
            <h6>About Us</h6>
            <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
            eiusmod tempor incididunt ut labore dolore magna aliqua.
            </p>
            <p class="footer-text">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;2006-2018 All rights reserved | by
            <a href="https://PumpIndustry.com" target="_blank"
                >PumpIndustry.com</a
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
            <a href="https://www.facebook.com/Pump-Industry-120516858033092"
                ><i class="fa fa-facebook"></i
            ></a>

            <a href="https://twitter.com/PumpIndustry"
                ><i class="fa fa-twitter"></i
            ></a>
            <a href="https://www.linkedin.com/groups/3938215/"
                ><i class="fa fa-linkedin"></i
            ></a>
            </div>
        </div>
        </div>
    </div>
    </div>
</footer>


{!!Cms::script('theme/vendors/jquery/dist/jquery.min.js')!!}
{!!Cms::script('js/bootstrap.min.js')!!}


@section('script')

@endsection
</body>
</html>
