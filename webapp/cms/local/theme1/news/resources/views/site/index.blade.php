@extends('layout::site.master')

@section('sIte_tItle','Home Page')
@section('addlinks')
    <style>
      .b-0 {
    bottom: 0;
}
.bg-shadow {
    background: rgba(76, 76, 76, 0);
    background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(179, 171, 171, 0)), color-stop(49%, rgba(48, 48, 48, 0.37)), color-stop(100%, rgba(19, 19, 19, 0.8)));
    background: linear-gradient(to bottom, rgba(179, 171, 171, 0) 0%, rgba(48, 48, 48, 0.71) 49%, rgba(19, 19, 19, 0.8) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4c4c4c', endColorstr='#131313', GradientType=0 );
}
.top-indicator {
    right: 0;
    top: 1rem;
    bottom: inherit;
    left: inherit;
    margin-right: 1rem;
}
.overflow {
    position: relative;
    overflow: hidden;
}
.zoom img {
    transition: all 0.2s linear;
}
.zoom:hover img {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}

@import url('https://fonts.googleapis.com/css2?family=Manrope&display=swap');

body {
    background-color: #eee;
    font-family: 'Manrope', sans-serif
}

.news-card {
    border-radius: 8px
}

.news-feed-image {
    border-radius: 8px;
    width: 100%
}

.date {
    font-size: 12px
}

.username {
    color: blue
}

.share {
    color: blue
}

@media screen and (min-width: 480px) {
	.feed-image img {
    height:250px;
  }
}
    </style>
@endsection
@section('body')
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
@php
  $startsFrom = 0;
@endphp
@if($news->currentPage() == 1 && count($news) > 8)
@php
$startsFrom = 8;
@endphp
<div class="container">
<div class="row">
    <div class="col-12 pb-5">
        <!--SECTION START-->
        <section class="row">
            <!--Start slider news-->
            <div class="col-12 col-md-6 pb-0 pb-md-3 pt-2 pr-md-1">
                <div id="featured" class="carousel slide carousel" data-ride="carousel">
                    <!--dots navigate-->
                    <ol class="carousel-indicators top-indicator">
                        <li data-target="#featured" data-slide-to="0" class="active"></li>
                        <li data-target="#featured" data-slide-to="1"></li>
                        <li data-target="#featured" data-slide-to="2"></li>
                        <li data-target="#featured" data-slide-to="3"></li>
                    </ol>
                    
                    <!--carousel inner-->
                    <div class="carousel-inner">
                        @for($i = 0; $i < 4; $i++)
                        <!--Item slider-->
                        <div class="carousel-item {{$i== 0 ? 'active' : ''}}">
                            <div class="card border-0 rounded-0 text-light overflow zoom">
                                <div class="position-relative">
                                    <!--thumbnail img-->
                                    <div class="ratio_left-cover-1 image-wrapper">
                                        <a href="#">
                                            <img class="img-fluid w-100"
                                                  src="{{$news[$i]->image}}"
                                                  alt="Bootstrap news template" style="height: 457px;">
                                        </a>
                                    </div>
                                    <div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
                                        <!--title-->
                                        <a target="_blank" href="{{$news[$i]->url}}">
                                            <h2 class="h3 post-title text-white my-1">{{$news[$i]->title}}</h2>
                                        </a>
                                        <!-- meta title -->
                                        <div class="news-meta">
                                            <span class="news-author">by <a class="text-white font-weight-bold" href="../category/author.html">
                                              {{$news[$i]->source}}
                                            </a></span>
                                            @php
                                                $d=date_create($news[$i]->created_at);
                                            @endphp
                                            
                                            <span class="news-date">{{date_format($d, 'd M, Y')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                    <!--end carousel inner-->
                </div>
                
                <!--navigation-->
                <a class="carousel-control-prev" href="#featured" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#featured" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!--End slider news-->
            
            <!--Start box news-->
            <div class="col-12 col-md-6 pt-2 pl-md-1 mb-3 mb-lg-4">
                <div class="row">
                  <!--news box-->
                    @for($i = 4; $i < 8; $i++)
                    <div class="col-6 pb-1 pt-0 pr-1">
                        <div class="card border-0 rounded-0 text-white overflow zoom">
                            <div class="position-relative">
                                <!--thumbnail img-->
                                <div class="ratio_right-cover-2 image-wrapper">
                                    <a target="_blank" href="{{$news[$i]->url}}">
                                        <img class="img-fluid"
                                              src="{{$news[$i]->image}}"
                                              alt="simple blog template bootstrap" style=" height: 225px;width: auto;">
                                    </a>
                                </div>
                                <div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
                                    <!-- category -->
                                    <!-- <a class="p-1 badge badge-primary rounded-0" href="#">Lifestyle</a> -->

                                    <!--title-->
                                    <a target="_blank" href="{{$news[$i]->url}}">
                                        <h2 class="h5 text-white my-1">{{$news[$i]->title}}</h2>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                    
                    <!--end news box-->
                </div>
            </div>
            <!--End box news-->
        </section>
        <!--END SECTION-->
    </div>
</div>    
</div>
@endif
<div class="container pb-4">
    <div class="row d-flex justify-content-center">
        @for($i = $startsFrom;$i < count($news); $i++)
        <div class="col-md-12 mb-5">
            <div class="row news-card  bg-white">
                <div class="col-md-3">
                    <div class="feed-image">
                      <img class="news-feed-image rounded img-fluid img-responsive" src="{{$news[$i]->image}}" />
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="news-feed-text p-3">
                        <a target="_blank" href="{{$news[$i]->url}}">
                            <h5 class="mb-2">{{$news[$i]->title}}</h5>
                        </a>
                        <span>
                          {{$news[$i]->short_content}}
                        </span>
                        <div class="d-flex flex-row justify-content-between align-items-center mt-2">
						
                            <div class="d-flex creator-profile">
                                <div class="d-flex flex-column ml-2">
								                    <p><i>Source:</i></p>
                                    <h6 class="username">{{$news[$i]->source}}</h6>
                                    @php
                                        $d=date_create($news[$i]->created_at);
                                    @endphp
                                    <span class="date">{{date_format($d, 'd M, Y')}}</span>
                                </div>
                            </div>
                            <!-- <i class="fa fa-share share"></i> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endfor
    </div>
    <div class="row justify-content-end">
        {!! $news->links('vendor.pagination.bootstrap-4'); !!}
    </div>
</div>
@endsection