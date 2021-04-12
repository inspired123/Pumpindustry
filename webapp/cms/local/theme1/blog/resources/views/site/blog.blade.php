@extends('layout::site.master')

@section('sIte_tItle','Blog')
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
                <h2>{{$blog->title}}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <img class="img img-fluid" src="{{$blog->image}}" />
        </div>
    </div>
    <div class="content-section py-3">
        {!! $blog->content !!}
    </div>
</div>
@endsection