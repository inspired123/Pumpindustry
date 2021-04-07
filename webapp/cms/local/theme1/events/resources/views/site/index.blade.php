@extends('layout::site.master')

@section('sIte_tItle','Upcoming Events')
@section('addlinks')
<style>
	hr{
	border-top: 1px solid #b73640 !important;
	
	}
	.form-control{
	    
	width:50%!important;
	}

	body{margin-top:20px;}

.section {
   
    position: relative;
}
.gray-bg {
    background-color: #ebf4fa;
}
/* Blog 
---------------------*/
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
	
</style>

@endsection

@section('body')
<br />
<br />
<br />
<br />
<br />
<div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-lg-7 text-center">
          <div class="section-title m-3">
            <h2>Upcoming Events</h2>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach($events as $event)
        <div class="col-lg-4 mb-4">
          <div class="blog-grid">
            <div class="blog-img"></div>
            <div class="blog-info">
              <h5>
                <a target="_blank" href="{{$event->url}}">{{$event->title}}</a>
              </h5>
              <p>
                {{$event->short_content}}
              </p>
              <div class="btn-bar">
                <a target="_blank" href="{{$event->url}}" class="px-btn-arrow">
                  <span>Read More</span>
                  <i class="arrow"></i>
                </a>
                @php
                    $d=date_create($event->event_date);
                @endphp
                <a href="#" target="_blank" class="date">{{date_format($d, 'd M')}}</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="row justify-content-end mb-5">
            {!! $events->links('vendor.pagination.bootstrap-4'); !!}
        </div>
    </div>
@endsection