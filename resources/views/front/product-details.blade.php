
@extends('front.index',['title'=>$product->name])

@section('content')

    @push('front-css')

        <link rel="stylesheet" type="text/css" href="{{asset('front/styles/product_styles.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('front/styles/product_responsive.css')}}">
    @endpush


    @include('front.layouts.mnu')


    <div class="single_product">
        <div class="container">
            <div class="row">

                <!-- Images -->
                <div class="col-lg-2 order-lg-1 order-2">
                    <ul class="image_list">
                        <li data-image="{{asset('public/media/product/'.$product->image_one)}}"><img src="{{asset('public/media/product/'.$product->image_one)}}"  alt=""></li>
                        <li data-image="{{asset('public/media/product/'.$product->image_two)}}"><img src="{{asset('public/media/product/'.$product->image_two)}}"  alt=""></li>
                        <li data-image="{{asset('public/media/product/'.$product->image_three)}}"><img src="{{asset('public/media/product/'.$product->image_three)}}"  alt=""></li>
                    </ul>
                </div>

                <!-- Selected Image -->
                <div class="col-lg-5 order-lg-2 order-1">
                    <div class="image_selected"><img src="{{asset('public/media/product/'.$product->image_one)}}" alt=""></div>
                </div>

                <!-- Description -->
                <div class="col-lg-5 order-3">
                    <div class="product_description">
                        <div class="product_category">
                            {{$product->category->category_name}} >
                            {{@$product->subcategory->subcategory_name}}
                        </div>
                        <div class="product_name">{{$product->name}}</div>
                        <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                        <div class="product_text"><p>{!! str_limit( $product->details ,500)!!}</p></div>
                        <div class="order_info d-flex flex-row">
                            <form action="{{route('product.add.cart')}}" method="post">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                @csrf
                                @if($product->color == NULL)

                                @else
                                <div class="clearfix" style="z-index: 1000;">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Color</label>
                                                <select class="form-control input-lg" id="exampleFormControlSelect1" name="color">
                                                    @foreach(explode(',', $product->color) as $color)
                                                        <option value="{{ $color }}">
                                                            {{$color }}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @endif

                                        @if($product->size == NULL)

                                        @else
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Size</label>
                                                    <select class="form-control input-lg" id="exampleFormControlSelect1" name="size">
                                                        @foreach(explode(',', $product->size) as $size)
                                                            <option value="{{ $size }}">{{ $size }}</option>

                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                        @endif


                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Quantity</label>
                                                <input class="form-control" type="number" value="1" pattern="[0-9]" name="qty">
                                            </div>
                                        </div>


                                    </div>


                                </div>



                                @if($product->discount_price == NULL)
                                    <div class="product_price">{{ $product->price}}<span> </div>
                                @else
                                    <div class="product_price">{{ $product->discount_price }}<span>
                                            {{ $product->price }}</span></div>
                                @endif

                                <div class="button_container">
                                    <button type="submit"  class="button cart_button">Add to Cart</button>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <div class="viewed">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="viewed_title_container">
                        <h3 class="viewed_title">Product Details</h3>

                    </div>


                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Product Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Video Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Product Review</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <br>{!! $product->details !!}</div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <br>{{ $product->video }}</div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"><br>

                            <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="5"></div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>



    <div class="brands">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="brands_slider_container">

                        <!-- Brands Slider -->

                        <div class="owl-carousel owl-theme brands_slider">
                            @foreach(brands() as $brand)
                                <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center">
                                        <img src="{{asset($brand->brand_logo)}}"
                                             style="width: 120px" alt=""></div></div>
                            @endforeach
                        </div>

                        <!-- Brands Slider Navigation -->
                        <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@push('front-js')

    <script src="{{asset('front/plugins/easing/easing.js')}}"></script>
    <script src="{{asset('front/js/product_custom.js')}}"></script>


@endpush
@stop
