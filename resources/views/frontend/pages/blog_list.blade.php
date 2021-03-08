@extends('frontend.layouts.master')
@section('title', 'Blog List')
@section('content')
    <div class="ps-page--blog">
        <div class="container">
            <div class="ps-page__header">
                <h1>Our Blogs</h1>
                <div class="ps-breadcrumb--2">
                    <ul class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>Our Blogs</li>
                    </ul>
                </div>
            </div>
            <div class="ps-blog">
                <div class="ps-blog__content">
                    <div class="row">
                        @foreach($blogs as $blog)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                            <div class="ps-post">
                                <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.html"></a><img src="{{url($blog->image)}}" alt="">

                                </div>
                                <div class="ps-post__content">
{{--                                    <div class="ps-post__meta"><a href="#">{{$blog->author}}</a>--}}
                                    </div><a class="ps-post__title" href="#">{{$blog->title}}</a>
                                    <p>{{date('jS M, Y',strtotime($blog->created_at))}}<a href="#"> {{$blog->author}}</a></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="ps-pagination">
                        <ul class="pagination">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
