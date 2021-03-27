@php
$siteName = isset(Configurations::getConfig('site')->site_name) ? Configurations::getConfig('site')->site_name : '';
$logoImg = isset(Configurations::getConfig('site')->site_logo) ? Configurations::getConfig('site')->site_logo : skin('/images/logo.svg');
@endphp
<!DOCTYPE html>
<html>
<head>
    @if(trim($__env->yieldContent('sIte_tItle')))
        <title>  @yield('sIte_tItle')</title>
    @else
        <title></title>
    @endif

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Military news, defence news">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" rel="stylesheet">
    <link href="{{skin('/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{skin('/css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{skin('/css/swiper.css')}}" rel="stylesheet">
    <link href="{{skin('/css/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{skin('/css/styles.css')}}" rel="stylesheet">
    


    @yield('addlinks')

</head>
<body data-spy="scroll" data-target=".fixed-top">
@include('layout::site.notifications')

    
    <!-- Preloader -->
    <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Leno</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="{{url('/')}}"><img src="{{ $logoImg }}" alt="alternative"></a> 
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#header">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#features">FEATURES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#preview">PREVIEW</a>
                </li>

                <!-- Dropdown Menu -->          
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle page-scroll" href="#details" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">DETAILS</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{url('page/terms-condition')}}"><span class="item-text">TERMS CONDITIONS</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="privacy-policy.html"><span class="item-text">PRIVACY POLICY</span></a>
                    </div>
                </li>
                <!-- end of dropdown menu -->

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#contact">CONTACT</a>
                </li>
            </ul>
            <span class="nav-item social-icons">
                <span class="fa-stack">
                    <a href="#your-link">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                    </a>
                </span>
                <span class="fa-stack">
                    <a href="#your-link">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-twitter fa-stack-1x"></i>
                    </a>
                </span>
            </span>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->




<div id="feedback"></div>
@yield('body')

<!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-col">
                        <h4>About {{isset(Configurations::getConfig('site')->site_name) ? Configurations::getConfig('site')->site_name : '' }}</h4>
                        <p>We're passionate about creating the best mobile apps for personal development</p>
                    </div>
                </div> <!-- end of col -->
                <div class="col-md-4">
                    <div class="footer-col middle">
                        <h4>Important Links</h4>
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Our business partners <a class="turquoise" href="#your-link">startupguide.com</a></div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Read our <a class="turquoise" href="{{url('page/terms-condition')}}">Terms & Conditions</a></div>
                            </li>
                        </ul>
                    </div>
                </div> <!-- end of col -->
                <div class="col-md-4">
                    <div class="footer-col last">
                        <h4>Social Media</h4>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-google-plus-g fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-linkedin-in fa-stack-1x"></i>
                            </a>
                        </span>
                    </div> 
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->  
    <!-- end of footer -->


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright {{date('Y')}} .All Right Reserved</p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright --> 
    <!-- end of copyright -->


@includeIf(Plugins::get('Feedback')[0],['data'=>Plugins::get('Feedback')[1]])

 <!-- Scripts -->
<script src="{{skin('/js/jquery.min.js')}}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
<script src="{{skin('/js/popper.min.js')}}"></script> <!-- Popper tooltip library for Bootstrap -->
<script src="{{skin('/js/bootstrap.min.js')}}"></script> <!-- Bootstrap framework -->
<script src="{{skin('/js/jquery.easing.min.js')}}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
<script src="{{skin('/js/swiper.min.js')}}"></script> <!-- Swiper for image and text sliders -->
<script src="{{skin('/js/jquery.magnific-popup.js')}}"></script> <!-- Magnific Popup for lightboxes -->
<script src="{{skin('/js/morphext.min.js')}}"></script> <!-- Morphtext rotating text in the header -->
<script src="{{skin('/js/validator.min.js')}}"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
<script src="{{skin('/js/scripts.js')}}"></script> <!-- Custom scripts -->

@section('script')

@endsection
</body>
</html>
