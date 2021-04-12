@extends('layout::site.master')

@section('sIte_tItle','Home Page')
@section('addlinks')
    <style>
      body {
        margin-top: 20px;
      }

      .section {
        position: relative;
      }
      .gray-bg {
        background-color: #ebf4fa;
      }
      /* Blog */
      .blog-grid {
        margin-top: 15px;
        margin-bottom: 15px;
      }
      .blog-grid .blog-img {
        position: relative;
        border-radius: 5px;
        overflow: hidden;
      }
      .blog-grid .blog-img .date {
        position: absolute;
        background: #3a3973;
        color: #ffffff;
        padding: 8px 15px;
        left: 0;
        top: 10px;
        font-size: 14px;
      }
      .blog-grid .blog-info {
        box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
        border-radius: 5px;
        background: #ffffff;
        padding: 20px;
        margin: -30px 20px 0;
        position: relative;
      }
      .blog-grid .blog-info h5 {
        font-size: 22px;
        font-weight: 500;
        margin: 0 0 10px;
      }
      .blog-grid .blog-info h5 a {
        color: #3a3973;
      }
      .blog-grid .blog-info p {
        margin: 0;
      }
      .blog-grid .blog-info .btn-bar {
        margin-top: 20px;
      }

      .px-btn-arrow {
        padding: 0 50px 0 0;
        line-height: 20px;
        position: relative;
        display: inline-block;
        color: #fe4f6c;
        -moz-transition: ease all 0.3s;
        -o-transition: ease all 0.3s;
        -webkit-transition: ease all 0.3s;
        transition: ease all 0.3s;
      }

      .px-btn-arrow .arrow {
        width: 13px;
        height: 2px;
        background: currentColor;
        display: inline-block;
        position: absolute;
        top: 0;
        bottom: 0;
        margin: auto;
        right: 25px;
        -moz-transition: ease right 0.3s;
        -o-transition: ease right 0.3s;
        -webkit-transition: ease right 0.3s;
        transition: ease right 0.3s;
      }

      .px-btn-arrow .arrow:after {
        width: 8px;
        height: 8px;
        border-right: 2px solid currentColor;
        border-top: 2px solid currentColor;
        content: "";
        position: absolute;
        top: -3px;
        right: 0;
        display: inline-block;
        -moz-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
      }
      .date {
        float: right;
        font-weight: 800;
        background-color: #fe4f6c;
        color: white;
        padding: 5px;
        border-radius: 5px;
      }
      .news {
        color: black;
        font-size: 18px;
        font-weight: 800;
      }
      .news:hover {
        color: chocolate;
      }
    </style>
@endsection
    @section('body')
    

    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
      <div class="overlay overlay-bg"></div>
      <div class="container">
        <div
            style="height:789px;"
          class="row fullscreen d-flex align-items-center justify-content-center"
        >
          <div class="banner-content col-lg-12 col-md-12">
            <h6 class="text-uppercase">Don’t look further, here is the key</h6>
            <h1>We’re Industrial solution</h1>
            <p class="text-white">Guide to the globel PumpIndusrory</p>
            <a href="#" class="primary-btn header-btn text-uppercase"
              >Get Started</a
            >
          </div>
        </div>
      </div>
    </section>
    <!-- End banner Area -->

    <section
      class="section gray-bg"
      id="blog"
      style="padding: 0px 0px 52px 0px"
    >
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 text-center">
            <div class="section-title m-3">
              <h2>Latest Events</h2>
            </div>
          </div>
        </div>
        <div class="row">
          @foreach($events as $event)
          <div class="col-lg-4">
            <div class="blog-grid">
              <div class="blog-img"></div>
              <div class="blog-info">
                <h5>
                  <a href="#">{{$event->title}}</a>
                </h5>
                <p>
                  {{$event->short_content}}
                </p>
                <div class="btn-bar">
                  <a href="#" class="px-btn-arrow">
                    <span>Read More</span>
                    <i class="arrow"></i>
                  </a>
                  <a href="#" class="date">
                    @php
                      $d=date_create($event->event_date);
                    @endphp
                    {{date_format($d, 'd M')}}
                  </a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          
        </div>
      </div>
    </section>

    <!-- Start service Area -->
    <section class="service-area section-gap" id="service">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12 pb-30 header-text text-center">
            <h1 class="mb-10">Latest News</h1>
          </div>
        </div>
        <div class="row">
          @foreach($news as $n)
          <div class="col-lg-4">
            <div class="single-service mb-4">
              <div class="thumb">
                <img
                  src="{{$n->image}}"
                  alt=" "
                  style="height: 12rem; width: 19rem"
                />
              </div>
              <a href="{{$n->url}}" target="_blank" class="news">{{$n->title}}</a>
              <p>
                {{$n->short_content}}
              </p>
            </div>
          </div>
          @endforeach
        </div>
        
      </div>
    </section>
    <!-- End service Area -->

    <!-- Start blog Area -->
    <section
      class="blog-area section-gap"
      id="blog"
      style="background-color: #ebf4fa"
    >
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12 pb-30 header-text">
            <h1>Latest posts from our Blog</h1>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
              eiusmod tempor incididunt ut <br />
              labore et dolore magna aliqua.
            </p>
          </div>
        </div>
        <div class="row">
          @foreach($blogs as $b)
          <div class="single-blog col-lg-4 col-md-4">
            <div class="thumb">
              <img class="f-img img-fluid mx-auto" src="{{$b->image}}" alt="" />
            </div>
            <div
              class="bottom d-flex justify-content-between align-items-center flex-wrap"
            >
              <div>
                <!-- <img class="img-fluid" src="{{skin('/img/user.png')}}" alt="" /> -->
                <a href="#"><span>{{$b->author}}</span></a>
              </div>
              <div class="meta">
                @php
                    $d=date_create($b->created_at);
                @endphp
                {{date_format($d, 'd M')}}
                <!-- <span class="lnr lnr-heart"></span> 15
                <span class="lnr lnr-bubble"></span> 04 -->
              </div>
            </div>
            <a href="{{url('/blogs/'.$b->id)}}">
              <h4>{{$b->title}}</h4>
            </a>
            <p>
              {{substr(strip_tags($b->content),0,200)}}
            </p>
          </div>
          @endforeach
          <!--  ghvhvjh -->
        </div>
      </div>
    </section>
    <!-- end blog Area -->
    @endsection