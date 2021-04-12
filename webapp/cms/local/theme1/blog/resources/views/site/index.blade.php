@extends('layout::site.master')

@section('sIte_tItle','Blogs')
@section('addlinks')
    <style>
        body {
    background-color: #ebf4fa;
    font-family: 'Manrope', sans-serif;
}
.single-blog {
    padding: 0;
    background: white;
}
.blog-details {
    padding: 0 15px;
}
    </style>
@endsection
@section('body')
    <div class="container pb-4">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
            <div class="section-title m-3">
                <h2>Blogs</h2>
            </div>
            </div>
        </div>
        <div class="row">
          @foreach($blogs as $b)
          <div class="single-blog col-lg-4 col-md-4">
            <div class="thumb">
              <img class="f-img img-fluid mx-auto" src="{{$b->image}}" alt="" />
            </div>
            <div class="blog-details">
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
          </div>
          @endforeach
        </div>
        <div class="row justify-content-end">
            {!! $blogs->links('vendor.pagination.bootstrap-4'); !!}
        </div>
    </div>
@endsection