@extends('frontend.layouts.master')
@section('title', 'Blog List')
@section('content')
    <div class="ps-page--blog">
        <div class="container">
            <div class="ps-page__header">
                <h1>Our Press</h1>
                <div class="ps-breadcrumb--2">
                    <ul class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>Our Blogs</li>
                    </ul>
                </div>
            </div>
            <div class="ps-blog--sidebar">
                <div class="ps-blog__left">
                    <div class="ps-post ps-post--small-thumbnail">
                        <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.html"></a><img src="{{asset('frontend/img/blog/grid/1.jpg')}}" alt="">
                            <div class="ps-post__badge"><i class="icon-volume-high"></i></div>
                        </div>
                        <div class="ps-post__content">
                            <div class="ps-post__top">
                                <div class="ps-post__meta"><a href="#">Entertaiment</a><a href="#">Technology</a>
                                </div><a class="ps-post__title" href="#">Experience Great Sound With Beats’s Headphone</a>
                                <p>Lorem ipsum dolor sit amet, dolor siterim consectetur adipiscing elit. Phasellus duio faucibus est sed…</p>
                            </div>
                            <div class="ps-post__bottom">
                                <p>December 17, 2017 by<a href="#"> drfurion</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-post ps-post--small-thumbnail">
                        <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.html"></a><img src="{{asset('frontend/img/blog/grid/2.jpg')}}" alt="">
                        </div>
                        <div class="ps-post__content">
                            <div class="ps-post__top">
                                <div class="ps-post__meta"><a href="#">Life Style</a><a href="#">Others</a>
                                </div><a class="ps-post__title" href="#">Products Necessery For Mom</a>
                                <p>Lorem ipsum dolor sit amet, dolor siterim consectetur adipiscing elit. Phasellus duio faucibus est sed…</p>
                            </div>
                            <div class="ps-post__bottom">
                                <p>December 17, 2017 by<a href="#"> drfurion</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-post ps-post--small-thumbnail">
                        <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.html"></a><img src="{{asset('frontend/img/blog/grid/3.jpg')}}" alt="">
                        </div>
                        <div class="ps-post__content">
                            <div class="ps-post__top">
                                <div class="ps-post__meta"><a href="#">Life Style</a><a href="#">Others</a>
                                </div><a class="ps-post__title" href="#">Home Interior: Modern Style 2017</a>
                                <p>Lorem ipsum dolor sit amet, dolor siterim consectetur adipiscing elit. Phasellus duio faucibus est sed…</p>
                            </div>
                            <div class="ps-post__bottom">
                                <p>December 17, 2017 by<a href="#"> drfurion</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-post ps-post--small-thumbnail">
                        <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.html"></a><img src="{{asset('frontend/img/blog/grid/4.jpg')}}" alt="">
                            <div class="ps-post__badge"><i class="icon-picture"></i></div>
                        </div>
                        <div class="ps-post__content">
                            <div class="ps-post__top">
                                <div class="ps-post__meta"><a href="#">Bussiness</a>
                                </div><a class="ps-post__title" href="#">DeerCo – A New Look About Startup In Product Manufacture Field7</a>
                                <p>Lorem ipsum dolor sit amet, dolor siterim consectetur adipiscing elit. Phasellus duio faucibus est sed…</p>
                            </div>
                            <div class="ps-post__bottom">
                                <p>December 17, 2017 by<a href="#"> drfurion</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-post ps-post--small-thumbnail">
                        <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.html"></a><img src="{{asset('frontend/img/blog/grid/5.jpg')}}" alt="">
                            <div class="ps-post__badge"><i class="icon-camera-play"></i></div>
                        </div>
                        <div class="ps-post__content">
                            <div class="ps-post__top">
                                <div class="ps-post__meta"><a href="#">Technology</a>
                                </div><a class="ps-post__title" href="#">B&amp;O Play – Best Headphone For You</a>
                                <p>Lorem ipsum dolor sit amet, dolor siterim consectetur adipiscing elit. Phasellus duio faucibus est sed…</p>
                            </div>
                            <div class="ps-post__bottom">
                                <p>December 17, 2017 by<a href="#"> drfurion</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="ps-post ps-post--small-thumbnail">
                        <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.html"></a><img src="{{asset('frontend/img/blog/grid/6.jpg')}}" alt="">
                        </div>
                        <div class="ps-post__content">
                            <div class="ps-post__top">
                                <div class="ps-post__meta"><a href="#">Businesses</a><a href="#">Life Style</a>
                                </div><a class="ps-post__title" href="#">Unique Products For Your Kitchen From IKEA Design</a>
                                <p>Lorem ipsum dolor sit amet, dolor siterim consectetur adipiscing elit. Phasellus duio faucibus est sed…</p>
                            </div>
                            <div class="ps-post__bottom">
                                <p>December 17, 2017 by<a href="#"> drfurion</a></p>
                            </div>
                        </div>
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
                <div class="ps-blog__right">
                    <aside class="widget widget--blog widget--search">
                        <form class="ps-form--widget-search" action="http://nouthemes.net/html/martfury/do_action" method="get">
                            <input class="form-control" type="text" placeholder="Search...">
                            <button><i class="icon-magnifier"></i></button>
                        </form>
                    </aside>
                    <aside class="widget widget--blog widget--categories">
                        <h3 class="widget__title">Categories</h3>
                        <div class="widget__content">
                            <ul>
                                <li><a href="blog-grid.html">Business</a></li>
                                <li><a href="blog-grid.html">Entertaiment</a></li>
                                <li><a href="blog-grid.html">Fashion</a></li>
                                <li><a href="blog-grid.html">Life style</a></li>
                                <li><a href="blog-grid.html">Others</a></li>
                                <li><a href="blog-grid.html">Technology</a></li>
                            </ul>
                        </div>
                    </aside>
                    <aside class="widget widget--blog widget--recent-post">
                        <h3 class="widget__title">Recent Posts</h3>
                        <div class="widget__content"><a href="blog-detail.html">Harman Kadon Onyx Studio Mini, Reviews & Experiences</a><a href="blog-detail.html">Experience Great Sound With Beats’s Headphone</a><a href="blog-detail.html">Products Necessery For Mom</a><a href="blog-detail.html">Home Interior: Modern Style 2017</a><a href="blog-detail.html">DeerCo – A New Look About Startup In Product Manufacture Field</a></div>
                    </aside>
                    <aside class="widget widget--blog widget--recent-comments">
                        <h3 class="widget__title">Recent Comments</h3>
                        <div class="widget__content">
                            <p><a class="author" href="#">drfurion</a> on<a href="#"> Dashboard</a></p>
                            <p><a class="author" href="#">logan</a> on<a href="#"> Rayban Rounded Sunglass Brown Color</a></p>
                            <p><a class="author" href="#">logan</a> on<a href="#"> Sound Intone I65 Earphone White Version</a></p>
                            <p><a class="author" href="#">logan</a> on<a href="#"> Sleeve Linen Blend Caro Pane Shirt</a></p>
                        </div>
                    </aside>
                    <aside class="widget widget--blog widget--tags">
                        <h3 class="widget__title">Popular Tags</h3>
                        <div class="widget__content"><a href="#">Business</a><a href="#">Clothing</a><a href="#">Design</a><a href="#">Entertaiment</a><a href="#">Fashion</a><a href="#">Internet</a><a href="#">Life Style</a><a href="#">Marketing</a><a href="#">Music</a></div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-newsletter">
        <div class="ps-container">
            <form class="ps-form--newsletter" action="http://nouthemes.net/html/martfury/do_action" method="post">
                <div class="row">
                    <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-form__left">
                            <h3>Newsletter</h3>
                            <p>Subcribe to get information about products and coupons</p>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-form__right">
                            <div class="form-group--nest">
                                <input class="form-control" type="email" placeholder="Email address">
                                <button class="ps-btn">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
