@extends('front.index',['title'=>'Blog'])
@section('content')

    @push('front-css')

        <link rel="stylesheet" type="text/css" href="{{ asset('front/styles/blog_styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/styles/blog_responsive.css') }}">

    @endpush
    @include('front.layouts.mnu')


    <div class="home">
        <div class="home_background parallax-window"
             style="background-image:url({{asset('public/media/post/'.$post->image)}})"></div>
    </div><br><br><br><br><br><br><br><br><br>

    <div class="single_post">

            <div class="row ">
                <div class="col-lg-8 offset-lg-2">
                    <div class="card-title font-weight-bold "style="font-size: 30px">{{ $post->title }}</div>

                    <div class="box-shadow card p-3">
                        <p>{!! $post->details !!}</p>
                    </div>

                    <br>
                    <br>
                    <br>
            </div>

        </div>
    </div>






    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="blog_posts d-flex flex-row align-items-start justify-content-between">

                        @foreach($relatePosts as $row)
                        <!-- Blog post -->
                        <div class="blog_post">
                            <div class="blog_image" style="background-image:url({{asset('public/media/post/'.$row->image)}})"></div>
                            <div class="blog_text">{{$row->title}}</div>
                            <div class="blog_button"><a href="{{route('post',$row->id)}}">Continue Reading</a></div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
