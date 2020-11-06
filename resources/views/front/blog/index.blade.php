@extends('front.index',['title'=>'Blog'])
@section('content')

    @push('front-css')

        <link rel="stylesheet" type="text/css" href="{{ asset('front/styles/blog_styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/styles/blog_responsive.css') }}">

    @endpush

    @include('front.layouts.mnu')


    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll">
            <img src="{{asset('front/images/shop_background.jpg')}}" height="600px">
        </div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">BLOG POSTS</h2>
        </div>
    </div>

    <div class="blog ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="blog_posts d-flex flex-row align-items-start justify-content-between">

                    @foreach($posts as $row)
                        <!-- Blog post -->
                            <div class="blog_post">
                                <div class="blog_image" style="background-image:url({{ asset('public/media/post/'.$row->image) }})"></div>
                                <div class="blog_text">{{ $row->title }}</div>
                                <div class="blog_button"><a href="{{route('post',$row->id)}}">Continue Reading</a></div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>





@stop
