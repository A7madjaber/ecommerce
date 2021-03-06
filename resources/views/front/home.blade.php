@extends('front.index',['title'=>'home'])

@section('content')

<?php $productMain=mainSliderProduct();

?>

@include('front.layouts.mnu')

<!-- Menu -->

<div class="page_menu">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="page_menu_content">

                    <div class="page_menu_search">
                        <form action="#">
                            <input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
                        </form>
                    </div>
                    <ul class="page_menu_nav">

                        <li class="page_menu_item">
                            <a href="{{route('home')}}">Home<i class="fa fa-angle-down"></i></a>
                        </li>



                        <li class="page_menu_item has-children">
                            <a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
                            <ul class="page_menu_selection">

                                <li><a href="">Featured Brands<i class="fa fa-angle-down"></i></a></li>
                                @foreach(brands() as $brand)
                                    <li><a href="{{route('product.brand',$brand->id)}}">{{$brand->brand_name}}<i class="fa fa-angle-down"></i></a></li>
                                @endforeach

                            </ul>
                        </li>

                        <li class="page_menu_item"><a href="{{route('blog.posts')}}">blog<i class="fa fa-angle-down"></i></a></li>
                        <li class="page_menu_item"><a href="{{route('contact')}}">contact<i class="fa fa-angle-down"></i></a></li>
                    </ul>

                    <div class="menu_contact">
                        <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{asset('front/images/phone_white.png')}}" alt=""></div>+38 068 005 3570</div>
                        <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{asset('front/images/mail_white.png')}}" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</header>


    <div class="banner">
        <div class="banner_background" style="background-image:url(front/images/banner_background.jpg)"></div>
        <div class="container fill_height">
            <div class="row fill_height">
                <div class="banner_product_image"><img src="{{@asset('public/media/product/'.$productMain->image_one)}}" alt=""></div>
               @if($productMain!=null)
                <div class="col-lg-5 offset-lg-4 fill_height">
                    <div class="banner_content">
                        <h1 class="banner_text">{{@$productMain->name}}</h1>

                        @if($productMain->discount_price!=null)
                            <div class="banner_price">
                                <span>{{@$productMain->price}}</span>
                                {{@$productMain->discount_price}}
                            </div>
                                @else
                                    <div class="banner_price">
                                       {{@$productMain->price}}
                                    </div>
                        @endif
                        <div class="banner_product_name">{{@$productMain->brand->brand_name}}</div>


                        <div class="button banner_button"><a href="{{route('product',$productMain->id)}}">Shop Now</a></div>
                    </div>
                </div>
                   @endif
            </div>
        </div>
    </div>

    <!-- Characteristics -->



    <!-- Deals of the week -->


    <div class="deals_featured mt-5">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

                    <!-- Deals -->



                    <!-- Featured -->
                    <div class="featured">
                        <div class="tabbed_container">
                            <div class="tabs">
                                <ul class="clearfix">
                                    <li class="active">Featured</li>

                                </ul>
                                <div class="tabs_line"><span></span></div>
                            </div>


                            <!-- Product Panel -->
                            <div  class="product_panel panel active">

                                <div  class="featured_slider slider">

                                    @foreach(AllProducts() as$product )

                                    <!-- Slider Item -->
                                    <div class="featured_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                <img src="{{asset('public/media/product/'.$product->image_one)}}"
                                                     width="120px" height="100px" alt=""></div>

                                            <div class="product_content" >

                                                @if($product->discount_price!=null)
                                                    <div class="product_price discount">

                                                       {{@$product->discount_price}}
                                                        <span>{{@$product->price}}</span>
                                                    </div>
                                                @else
                                                    <div class="product_price discount">
                                                     {{@$product->price}}
                                                    </div>
                                                @endif

                                                <div class="product_name">
                                                    <div><a href="{{route('product',$product->id)}}">{{$product->name}}</a></div></div>



                                                    <div class="product_extras">

                                                        <button id="{{ $product->id }}"
                                                                class="product_cart_button "
                                                                data-toggle="modal"
                                                                data-target="#cartmodal"
                                                                onclick="productview(this.id)">

                                                            Add to Cart</button>
                                                    </div>



                                        </div>


                                            <a href="#" id="Whish" route="{{route('add.wihshList',$product->id)}}"
                                                   model_id="{{$product->id}}">
                                            <div class="product_fav"><i class="fas fa-heart"></i></div></a>


                                            <ul class="product_marks">

                                                @if($product->discount_price!=null)
                                                    <?php $amount= $product->price - $product->discount_price;

                                                    $discount=$amount/ $product->price *100;

                                                    ?>
                                                    <li class="product_mark product_discount">{{intval($discount)}}%</li>
                                                    @else
                                                    <li class="product_mark product_discount" style="background:#0e8ce4 ">New</li>
                                                    @endif


                                            </ul>
                                        </div>
                                    </div>

                                        @endforeach
                                </div>

                                <div class="featured_slider_dots_cover"></div>
                            </div>

                            <!-- Product Panel -->



                        </div>
                    </div>


                    @if(count(HotDeal())<=0)


                        <div class="deals" style="margin-left: 150px">
                            <div class="deals_title">Deals of the Week</div>
                            <div class="deals_slider_container">
                                <div class="owl-carousel owl-theme deals_slider">
                                    <div class="deals_item_name"><span class="font-weight-light" style="color: red">No Deals </span></div>
                                </div>
                            </div>
                            @else

                    <div class="deals " style="margin-left: 90px">
                        <div class="deals_title">Deals of the Week</div>
                        <div class="deals_slider_container">

                            <!-- Deals Slider -->
                            <div class="owl-carousel owl-theme deals_slider">


                            @foreach(HotDeal() as $product)

                                    <!-- Deals Item -->
                                        <div class="owl-item deals_item">
                                            <div class="deals_image">
                                                <img src="{{asset('public/media/product/'.$product->product->image_one)}}" alt=""></div>
                                            <div class="deals_content">
                                                <div class="deals_info_line d-flex flex-row justify-content-start">
                                                    <div class="deals_item_category"><a href="#">{{@$product->product->brand->brand_name}}</a></div>

                                                    @if($product->discount_price==null)
                                                    @else
                                                        <div class="deals_item_price_a ml-auto">{{$product->product->price}}</div>
                                                    @endif
                                                </div>

                                                <div class="deals_info_line d-flex flex-row justify-content-start">
                                                    <div class="deals_item_name"><a href="{{route('product',$product->product->id)}}">{{$product->product->name}}</a> </div>


                                                    @if($product->product->discount_price==null)
                                                        <div class="deals_item_price ml-auto">{{$product->product->price}}</div>
                                                    @else
                                                    @endif

                                                    @if($product->product->discount_price!=null)
                                                        <div class="deals_item_price ml-auto">{{$product->product->discount_price}}</div>
                                                    @else
                                                    @endif

                                                </div>
                                                <div class="available">
                                                    <div class="available_line d-flex flex-row justify-content-start">
                                                        <div class="available_title">Available: <span>{{$product->product->quantity}}</span></div>
                                                    </div>
                                                    <div class="available_bar"><span style="width:{{$product->product->quantity*0.5}}%"></span></div>
                                                </div>
                                                <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
                                                    <div class="deals_timer_title_container">
                                                        <div class="deals_timer_title">Hurry Up</div>
                                                        <div class="deals_timer_subtitle">Offer ends in:</div>
                                                    </div>
                                                    <div class="deals_timer_content ml-auto">
                                                        <div class="deals_timer_box clearfix" data-target-time="{{$product->date}}">
                                                            <div class="deals_timer_unit">
                                                                <div id="deals_timer1_hr" class="deals_timer_hr"></div>
                                                                <span>hours</span>
                                                            </div>
                                                            <div class="deals_timer_unit">
                                                                <div id="deals_timer1_min" class="deals_timer_min"></div>
                                                                <span>mins</span>
                                                            </div>
                                                            <div class="deals_timer_unit">
                                                                <div id="deals_timer1_sec" class="deals_timer_sec"></div>
                                                                <span>secs</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                @endforeach


                            </div>

                        </div>

                        <div class="deals_slider_nav_container">
                            <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
                            <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
                        </div>
                    </div>
                        @endif

                </div>
            </div>
        </div>
    </div>

    <!-- Popular Categories -->

    <div class="popular_categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="popular_categories_content">
                        <div class="popular_categories_title">Popular Categories</div>
                        <div class="popular_categories_slider_nav">
                            <div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                            <div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                    </div>
                </div>




                <!-- Popular Categories Slider -->

                <div class="col-lg-9">
                    <div class="popular_categories_slider_container">
                        <div class="owl-carousel owl-theme popular_categories_slider">

                            @foreach(categories() as $category)
                            <!-- Popular Categories Item -->
                            <div class="owl-item">
                                <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                    <div class="popular_category_image">
                                        <img src="{{asset('front/images/marker.png')}}" alt=""></div>
                                    <div class="popular_category_text">{{$category->category_name}}</div>
                                </div>
                            </div>
                                @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Banner -->

    <div class="banner_2">
        <div class="banner_2_background" style="background-image:url(front/images/banner_2_background.jpg)"></div>
        <div class="banner_2_container">
            <div class="banner_2_dots"></div>
            <!-- Banner 2 Slider -->



            <div class="owl-carousel owl-theme banner_2_slider">

                @foreach(midSliderProduct() as $product)
                <!-- Banner 2 Slider Item -->
                <div class="owl-item">
                    <div class="banner_2_item">
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col-lg-4 col-md-6 fill_height">
                                    <div class="banner_2_content">
                                        <div class="banner_2_category"><h4>{{$product->category->category_name}}</h4></div>
                                        <div class="banner_2_title">{{$product->name}}</div>
                                        <div class="banner_2_text"><h4>{{@$product->brand->brand_name}}</h4><br>
                                       <h2> {{$product->price}} </h2>
                                        </div>
                                        <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="button banner_2_button"><a href="{{route('product',$product->id)}}">Explore</a></div>
                                    </div>

                                </div>
                                <div class="col-lg-8 col-md-6 fill_height">
                                    <div class="banner_2_image_container">
                                        <div class="banner_2_image">
                                            <img src="{{asset('public/media/product/'.$product->image_one)}}"height="300px" width="250px" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                    @endforeach


            </div>
        </div>
    </div>

    <!-- Hot New Category One -->

    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">{{FirstCategory()->category_name}}</div>
                            <ul class="clearfix">
                                <li class="active"></li>

                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12" style="z-index:1;">

                                <!-- Product Panel -->
                                <div class="product_panel panel active">
                                    <div class="arrivals_slider slider">


                                        @foreach(FirstCategory()->Products->take(10) as $product)
                                        <!-- Slider Item -->
                                            <div class="featured_slider_item">
                                                <div class="border_active"></div>
                                                <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        <img src="{{asset('public/media/product/'.$product->image_one)}}"
                                                             width="120px" height="100px" alt=""></div>

                                                    <div class="product_content" >

                                                        @if($product->discount_price!=null)
                                                            <div class="product_price discount">

                                                                {{@$product->discount_price}}
                                                                <span>{{@$product->price}}</span>
                                                            </div>
                                                        @else
                                                            <div class="product_price discount">
                                                                {{@$product->price}}
                                                            </div>
                                                        @endif

                                                        <div class="product_name">
                                                            <div><a href="product.html">{{$product->name}}</a></div></div>
                                                        <div class="product_extras">



                                                                <button id="{{ $product->id }}"
                                                                        class="product_cart_button "
                                                                        data-toggle="modal"
                                                                        data-target="#cartmodal"
                                                                        onclick="productview(this.id)">

                                                                    Add to Cart</button>
                                                            </div>

                                                    </div>





                                                    <a href="#" id="Whish" route="{{route('add.wihshList',$product->id)}}"
                                                       model_id="{{$product->id}}">
                                                        <div class="product_fav"><i class="fas fa-heart"></i></div></a>


                                                    <ul class="product_marks">

                                                        @if($product->discount_price!=null)
                                                            <?php $amount= $product->price - $product->discount_price;

                                                            $discount=$amount/ $product->price *100;

                                                            ?>
                                                            <li class="product_mark product_discount">{{intval($discount)}}%</li>
                                                        @else
                                                            <li class="product_mark product_discount" style="background:#0e8ce4 ">New</li>
                                                        @endif


                                                    </ul>
                                                </div>
                                            </div>
                                            @endforeach

                                    </div>
                                    <div class="arrivals_slider_dots_cover"></div>
                                </div>

                            </div>



                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Hot New Category Two -->

<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabbed_container">
                    <div class="tabs clearfix tabs-right">
                        <div class="new_arrivals_title">{{SecondCategory()->category_name}}</div>
                        <ul class="clearfix">
                            <li class="active"></li>

                        </ul>
                        <div class="tabs_line"><span></span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12" style="z-index:1;">

                            <!-- Product Panel -->
                            <div class="product_panel panel active">
                                <div class="arrivals_slider slider">


                                @foreach(SecondCategory()->products->take(10) as $product)
                                    <!-- Slider Item -->
                                        <div class="featured_slider_item">
                                            <div class="border_active"></div>
                                            <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{asset('public/media/product/'.$product->image_one)}}"
                                                         width="120px" height="100px" alt=""></div>

                                                <div class="product_content" >
                                                    @if($product->discount_price!=null)
                                                        <div class="product_price discount">

                                                            {{@$product->discount_price}}
                                                            <span>{{@$product->price}}</span>
                                                        </div>
                                                    @else
                                                        <div class="product_price discount">
                                                            {{@$product->price}}
                                                        </div>
                                                    @endif

                                                    <div class="product_name">
                                                        <div><a href="{{route('product',$product->id)}}">{{$product->name}}</a></div></div>



                                                        <div class="product_extras">

                                                            <button id="{{ $product->id }}"
                                                                    class="product_cart_button "
                                                                    data-toggle="modal"
                                                                    data-target="#cartmodal"
                                                                    onclick="productview(this.id)">

                                                                Add to Cart</button>
                                                        </div>

                                                </div>


                                                <ul class="product_marks">

                                                    @if($product->discount_price!=null)
                                                        <?php $amount= $product->price - $product->discount_price;

                                                        $discount=$amount/ $product->price *100;

                                                        ?>
                                                        <li class="product_mark product_discount">{{intval($discount)}}%</li>
                                                    @else
                                                        <li class="product_mark product_discount" style="background:#0e8ce4 ">New</li>
                                                    @endif


                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="arrivals_slider_dots_cover"></div>
                            </div>

                        </div>



                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Best Sellers -->



    <!-- Adverts -->



    <div class="adverts">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 advert_col">

                    <!-- Advert Item -->

                    <div class="advert d-flex flex-row align-items-center justify-content-start">
                        <div class="advert_content">
                            <div class="advert_title"><a href="#">Trends 2018</a></div>
                            <div class="advert_text">Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</div>
                        </div>
                        <div class="ml-auto"><div class="advert_image"><img src="images/adv_1.png" alt=""></div></div>
                    </div>
                </div>

                <div class="col-lg-4 advert_col">

                    <!-- Advert Item -->

                    <div class="advert d-flex flex-row align-items-center justify-content-start">
                        <div class="advert_content">
                            <div class="advert_subtitle">Trends 2018</div>
                            <div class="advert_title_2"><a href="#">Sale -45%</a></div>
                            <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
                        </div>
                        <div class="ml-auto"><div class="advert_image"><img src="images/adv_2.png" alt=""></div></div>
                    </div>
                </div>

                <div class="col-lg-4 advert_col">

                    <!-- Advert Item -->

                    <div class="advert d-flex flex-row align-items-center justify-content-start">
                        <div class="advert_content">
                            <div class="advert_title"><a href="#">Trends 2018</a></div>
                            <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
                        </div>
                        <div class="ml-auto"><div class="advert_image"><img src="images/adv_3.png" alt=""></div></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Trends -->


    <div class="trends">
        <div class="trends_background" style="background-image:url(front/images/trends_background.jpg)"></div>
        <div class="trends_overlay"></div>
        <div class="container">
            <div class="row">

                <!-- BUy ONGETONE Slider -->
                <div class="col-lg-3">
                    <div class="trends_container">
                        <h2 class="trends_title">BuyOne Get One</h2>
                        <div class="trends_text"><p>Buy One Product From This Then You Will Get FREE One .</p></div>
                        <div class="trends_slider_nav">
                            <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                            <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                    </div>
                </div>

                <!-- BUy ONGETONE Slider -->
                <div class="col-lg-9">
                    <div class="trends_slider_container">

                        <!-- Trends Slider -->

                        <div class="owl-carousel owl-theme trends_slider">

                            @foreach(BuyOneGetOne() as $product)
                            <!-- Trends Slider Item -->
                            <div class="owl-item">
                                <div class="trends_item is_new">
                                    <div class="trends_image d-flex flex-column align-items-center justify-content-center">
                                        <img src="{{asset('public/media/product/'.$product->image_one)}}" alt=""></div>

                                    <div class="trends_content">
                                        <div class="trends_category"><a href="#">{{@$product->brand->brand_name}}</a></div>
                                        <div class="trends_info clearfix">
                                            <div class="trends_name"><a href="{{route('product',$product->id)}}">{{$product->name}}</a></div>


                                            @if($product->discount_price == NULL)
                                                <div class="product_price discount">{{ $product->price }}<span> </div>
                                            @else
                                                <div class="product_price discount">${{ $product->discount_price }}<span>${{ $product->price }}</span></div>
                                            @endif



                                                <a href="#" class="btn btn-primary btn-sm" id="{{ $product->id }}"
                                                        class="product_cart_button "
                                                        data-toggle="modal"
                                                        data-target="#cartmodal"
                                                        onclick="productview(this.id)">
                                                    <i class="fa fa-shopping-cart"></i>

                                                 </a>



                                        </div>


                                    </div>


                                <ul class="trends_marks">

                                    <li class="trends_mark trends_new">BuyGet</li>
                                </ul>

                                    <a href="#" id="Whish" route="{{route('add.wihshList',$product->id)}}"
                                       model_id="{{$product->id}}">
                                        <div class="trends_fav"><i class="fas fa-heart"></i></div></a>


                                </div>
                            </div>

                                @endforeach

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Reviews -->

    <div class="reviews">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="reviews_title_container">
                        <h3 class="reviews_title">Top Rating</h3>
                        <div class="reviews_all ml-auto"><a href="#">view all <span>reviews</span></a></div>
                    </div>

                    <div class="reviews_slider_container">

                        <!-- Reviews Slider -->
                        <div class="owl-carousel owl-theme reviews_slider">

                            <!-- Reviews Slider Item -->

                            @foreach(TopRating() as $pro)
                           <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image"><img src="{{asset('public/media/product/'.$pro->image_one)}}" alt=""></div></div>
                                    <div class="review_content">
                                        <div class="review_name"><a href="{{route('product',$pro->id)}}">{{$pro->name}}</a> </div>
                                        <div class="review_rating_container">




                                            @if(count($pro->ratings) > 0)


                                                @if($pro->ratings()->avg('rating_count')<=1.9)

                                                    <div class="rating_r rating_r_1 product_rating"><i></i><i></i><i></i><i></i><i></i></div>

                                                        @elseif($pro->ratings()->avg('rating_count')<=2.9)
                                                            <div class="rating_r rating_r_2 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                                        @elseif($pro->ratings()->avg('rating_count')<=3.9)
                                                            <div class="rating_r rating_r_3 product_rating"><i></i><i></i><i></i><i></i><i></i></div>

                                                        @elseif($pro->ratings()->avg('rating_count')<=4.9)
                                                            <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>

                                                        @elseif($pro->ratings()->avg('rating_count')>=5)
                                                            <div class="rating_r rating_r_5 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                                        @else
                                                    <div class="rating_r rating_r_0 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                                @endif

                                            @else
                                                <div class="rating_r rating_r_0 product_rating"><i></i><i></i><i></i><i></i><i></i></div>

                                            @endif

                                        </div>
                                        <div class="review_text">
                                            <p>{{$pro->category->category_name }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                                @endforeach


                        </div>
                        <div class="reviews_dots"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recently Viewed -->

    <div class="viewed">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="viewed_title_container">
                        <h3 class="viewed_title">Recently Added</h3>
                        <div class="viewed_nav_container">
                            <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </div>

                    <div class="viewed_slider_container">

                        <!-- Recently Viewed Slider -->
                        <div class="owl-carousel owl-theme viewed_slider">
                        @foreach(RecentlyAdded() as $product)
                            <!-- Recently Viewed Item -->
                                <div class="owl-item">
                                    <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image">
                                            <img  src="{{asset('public/media/product/'.$product->image_one)}}" alt="">
                                        </div>
                                        <div class="trends_content">

                                            <div class="trends_category">

                                                <span class="font-weight-light">
                                                    {{$product->brand !=null?$product->brand->brand_name:'No Brand'}}
                                                </span>
                                            </div>

                                            <div class="trends_info clearfix">
                                                <div class="trends_name"><a href="{{route('product',$product->id)}}">{{$product->name}}</a></div>


                                                @if($product->discount_price == NULL)
                                                    <div class="product_price discount">{{ $product->price }}<span> </div>
                                                @else
                                                    <div class="product_price discount">${{ $product->discount_price }}<span>${{ $product->price }}</span></div>
                                                @endif
                                            </div>
                                        </div>

                                        <ul class="item_marks">

                                            @if($product->discount_price!=null)
                                                <?php $amount= $product->price - $product->discount_price;
                                                $discount=$amount/ $product->price *100;
                                                ?>
                                                <li class="item_mark item_discount">{{intval($discount)}}%</li>
                                            @else
                                                <li class="item_mark item_discount" style="background:#0e8ce4">New</li>                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Brands -->

    <div class="brands">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="brands_slider_container">

                        <!-- Brands Slider -->

                        <div class="owl-carousel owl-theme brands_slider">
@foreach(brands() as $brand)
                            <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{$brand->brand_logo}}" style="width: 120px" alt=""></div></div>
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



<div class=" modal fade" id="cartmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLavel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLavel">Product Quick View</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="" id="pimage" style="height: 220px; width: 200px;">
                            <div class="card-body">
                                <h5 class="card-title text-center" id="pname"></h5>

                            </div>

                        </div>

                    </div>


                    <div class="col-md-4">
                        <ul class="list-group">

                            <li class="list-group-item">Category: <span id="pcat"></span></li>
                            <li class="list-group-item">Subcategory: <span id="psub"></span></li>
                            <li class="list-group-item">Brand:<span id="pbrand"></span> </li>
                            <li class="list-group-item">Stock: <span class="badge" style="background: green;color: white;" > Available</span> </li>
                        </ul>

                    </div>

                    <div class="col-md-4">

                        <form id="productForm" action="#">
                            @csrf

                            <input type="hidden" name="product_id" id="product_id">

                            <div class="form-group">
                                <label for="exampleInputcolor">Color</label>
                                <select name="color" class="form-control" id="color">

                                </select>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputcolor">Size</label>
                                <select name="size" class="form-control" id="size">

                                </select>

                            </div>


                            <div class="form-group">
                                <label for="exampleInputcolor">Quantity</label>
                                <input type="number" class="form-control" name="qty" value="1">
                            </div>


                            <button id="addcart" type="submit" class="btn btn-primary">Add to Cart </button>

                        </form>

                    </div>



                </div>
            </div>


            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
</div>


@push('front-js')


{{--add product to whishlist--}}

<script>

    $(document).on("click", "#Whish", function(e){
        e.preventDefault();
        var model_id =  $(this).attr('model_id');
        var route =  $(this).attr('route');
        $.ajax({
            data: {
                "_token": "{{ csrf_token() }}",
                'id' :model_id,


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



        $("#wishlist").load(location.href + " #wishlist")


        $(".cart").load(location.href + " .cart");




    });
</script>

{{--    add to cart form moodal--}}

<script type="text/javascript">
        function productview(id){
            $.ajax({
                url: "{{ url('/cart/product/view/') }}/"+id,
                type: "GET",
                dataType:"json",
                success:function(data){

                    $('#pcat').text(data.category);
                    $('#psub').text(data.subcategory);
                    $('#pbrand').text(data.brand);
                    $('#pname').text(data.product.name);
                    $('#pimage').attr('src','{{asset('public/media/product')}}/'+data.product.image_one);
                    $('#product_id').val(data.product.id);

                    var d = $('select[name="color"]').empty();
                    $.each(data.color,function(key,value){
                        $('select[name="color"]').append('<option value="'+value+'">'+value+'</option>');
                    });

                    var d = $('select[name="size"]').empty();
                    $.each(data.size,function(key,value){
                        $('select[name="size"]').append('<option value="'+value+'">'+value+'</option>');
                    });


                }
            })
        }


    </script>

{{--add to product to moodal --}}
    <script>


        $('#addcart').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#productForm').serialize(),
                url: "{{ route('add.cart') }}",
                type: "post",
                dataType: 'json',
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

                        $(".cart").load(location.href + " .cart");

                    }else{
                        Toast.fire({
                            icon: data.icon,
                            title: data.message
                        })
                    }
                },
            });
        });

    </script>
@endpush

@stop
