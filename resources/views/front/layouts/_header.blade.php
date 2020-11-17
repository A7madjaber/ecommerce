<header class="header">

    <!-- Top Bar -->

    <div class="top_bar">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-row">
                    <div class="top_bar_contact_item">
                        <div class="top_bar_icon">
                            <img src="{{asset('front/images/phone.png')}}" alt="">
                        </div>{{Settings()->phone}}
                    </div>

                   <div class="top_bar_contact_item ml-3 ">
                        <div class="top_bar_icon">
                            <img src="{{asset('front/images/phone.png')}}" alt="">
                        </div>{{Settings()->phone_two}}
                    </div>



                    <div class="top_bar_contact_item ml-5 ">
                        <div class="top_bar_icon">
                            <img src="{{asset('front/images/mail.png')}}" alt="">
                        </div><a href="mailto:fastsales@gmail.com">{{Settings()->email}}</a></div>
                    <div class="top_bar_content ml-auto">

                        <div class="top_bar_menu">

                            @if(auth()->check())
                            <a href="#" data-toggle="modal" data-target="#exampleModal">
                                <div class="top_bar_contact_item">
                                    <i class="fa fa-truck"></i>
                                    Track My Order</div>
                            </a>

                                @endif
                        </div>

                        <div class="top_bar_user">


                            @guest



                                    <div class="user_icon"><img src="{{ asset('front/images/user.svg')}}" alt="">
                                    </div>
                                <div>
                                    <a href="{{ route('login') }}">
                                        Login</a></div>
                                <div>
                                    <a href="{{ route('register') }}">
                                        Register</a></div>



                            @else


                                <ul class="standard_dropdown top_bar_dropdown">
                                    <li>
                                        <a href="{{ route('profile') }}">
                                            <div class="user_icon"><img src="{{ asset('front/images/user.svg')}}" alt="">
                                            </div> Profile<i class="fas fa-chevron-down"></i></a>
                                        <ul>

                                            <li><a href="{{route('user.checkout')}}">Checkout</a></li>
                                            <li><a href="{{route('user.logout')}}">Logout</a></li>
                                        </ul>
                                    </li>

                                </ul>
                            @endguest



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Main -->

    <div class="header_main">
        <div class="container">
            <div class="row">

                <!-- Logo -->
                <div class="col-lg-2 col-sm-3 col-3 order-1">
                    <div class="logo_container">
                        <div class="logo"><a href="{{route('home')}}"><img src="{{asset('public/media/logo/'.Settings()->logo)}}"></a></div>
                    </div>
                </div>



                <!-- Search -->
                <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                    <div class="header_search">
                        <div class="header_search_content">
                            <div class="header_search_form_container">

                                <form action="{{route('product.search')}}" class="header_search_form" method="post">
                                    @csrf
                                    <input type="search" name="product" required="required" class="header_search_input" placeholder="Search for products...">


                                    <div class="custom_dropdown">
                                        <div class="custom_dropdown_list">
                                            <span class="custom_dropdown_placeholder clc">All Categories</span>
                                            <i class="fas fa-chevron-down"></i>
                                            <ul class="custom_list clc">
                                                 @foreach(categories() as $category)
                                                <li><a class="clc" href="{{route('product.category',$category->id)}}">{{$category->category_name}}</a></li>
                                                    @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                    <button type="submit" class="header_search_button trans_300" value="Submit">
                                        <img src="{{asset('front/images/search.png')}}" alt=""></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Wishlist -->
                <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                    <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                        <div class="wishlist d-flex flex-row align-items-center justify-content-end">

                            @guest

                                @else

                                <div class="wishlist_icon">
                                    <img src="{{asset('front/images/heart.png')}}" alt=""></div>
                                <div id="wishlist" class="wishlist_content">
                                    <div class="wishlist_text"><a href="{{route('user.whishlist')}}">Wishlist</a></div>
                                    <div class="wishlist_count">{{auth()->user()->whishlist ?auth()->user()->whishlist->count() :0}}

                                    </div>
                                </div>

                                @endguest


                        </div>

                        <!-- Cart -->
                        <div class="cart">
                            <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                <div class="cart_icon">
                                    <img src="{{asset('front/images/cart.png')}}" alt="">
                                    <div class="cart_count"><span>{{Cart::count()}}</span></div>
                                </div>
                                <div class="cart_content">
                                    <div class="cart_text"><a href="{{route('show.cart')}}">Cart</a></div>
                                    <div class="cart_price">{{Cart::subtotal()}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <!-- Main Navigation -->

