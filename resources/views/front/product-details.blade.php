@extends('front.index',['title'=>$product->name])

@section('content')

    @push('front-css')
        <style>
            .txt-center {
                text-align: center;
            }
            .hide {
                display: none;
            }

            .clear {
                float: none;
                clear: both;
            }

            .rating {
                width: 90px;
                unicode-bidi: bidi-override;
                direction: rtl;
                text-align: center;
                position: relative;
            }

            .rating > label {
                float: right;
                font-size: 15px;
                display: inline;
                padding: 0;
                margin: 0;
                position: relative;
                width: 1.1em;
                cursor: pointer;
                color: #000;
            }

            .rating > label:hover,
            .rating > label:hover ~ label,
            .rating > input.radio-btn:checked ~ label {
                color: transparent;
            }

            .rating > label:hover:before,
            .rating > label:hover ~ label:before,
            .rating > input.radio-btn:checked ~ label:before,
            .rating > input.radio-btn:checked ~ label:before {
                content: "\2605";
                position: absolute;
                left: 0;
                color: #FFD700;
            }


            .modal-backdrop {
                /* bug fix - no overlay */
                display: none;
            }
        </style>


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

                        @if($avg<=1.9)

                            <div class="rating_r rating_r_1 product_rating"><i></i><i></i><i></i><i></i><i></i></div>

                        @elseif($avg<=2.9)
                            <div class="rating_r rating_r_2 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                        @elseif($avg<=3.9)
                            <div class="rating_r rating_r_3 product_rating"><i></i><i></i><i></i><i></i><i></i></div>

                        @elseif($avg<=4.9)
                            <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>

                        @elseif($avg>=5)
                            <div class="rating_r rating_r_5 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                        @else
                            <div class="rating_r rating_r_0 product_rating"><i></i><i></i><i></i><i></i><i></i></div>

                        @endif
<br>
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-star"></i> Add Rating </button>



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
                                        <div class="product_price">{{ $product->price}}<span> </span></div>
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
                        @if($product->video)
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Video Link</a>
                        </li>
                        @endif
                            <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Product Review</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <br>{!! $product->details !!}</div>
                        <div class="tab-pane fade " style="margin-left: 200px" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <br>
                            <iframe width="720" height="345" src="{{$product->video}}">
                            </iframe>



                        </div>
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


    <!-- Modal -->
    <div class="modal fade" style="margin: 200px" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background:gainsboro">
                    <h5 class="modal-title" id="exampleModalLabel">Rating Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                     <div class="rating" style="margin:15px;font-size: 100px">
                            <input id="star5" name="star" type="radio" value="5" class="radio-btn hide" />
                       <label for="star5"> ☆</label>
                            <input id="star4" name="star" type="radio" value="4" class="radio-btn hide" />
                         <label for="star4">  ☆ </label>
                            <input id="star3" name="star" type="radio" value="3" class="radio-btn hide" />
                         <label for="star3">  ☆ </label>
                            <input id="star2" name="star" type="radio" value="2" class="radio-btn hide" />
                         <label for="star2">  ☆ </label>
                            <input id="star1" name="star" type="radio" value="1" class="radio-btn hide" />
                         <label for="star1"> ☆</label>
                        </div>

                        <button type="button"  class="btn btn-secondary btn-sm float_right ml-1" data-dismiss="modal">Close</button>
                        <a href="#"  id="rating"  model_id="{{$product->id}} "route="{{route('rating')}}" class="btn btn-primary btn-sm float_right">Submit</a>


                </div>


            </div>
        </div>
    </div>


@push('front-js')

    <script>

        $(document).on("click", "#rating", function(e){
            e.preventDefault();
            var model_id =  $(this).attr('model_id');
            var route =  $(this).attr('route');
            const val = $('input[name=star]:checked').val();


            $.ajax({
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id' :model_id,
                    'val':val

                },
                url: route,
                type: "GET",
                dataType: "JSON",


                success : function(data)
                {

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });



                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({

                            icon: data.icon,
                            title: data.message,
                        });

                    }else{
                        Toast.fire({
                            icon: data.icon,
                            title: data.message
                        })
                    }
                },


            })

        });
    </script>



    <script src="{{asset('front/plugins/easing/easing.js')}}"></script>
    <script src="{{asset('front/js/product_custom.js')}}"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0&appId=323572825316171&autoLogAppEvents=1" nonce="9KvkcnaH"></script>

@endpush
@stop
