@extends('front.index',['title'=>'Shop'])
@push('front-css')


    <link rel="stylesheet" type="text/css" href="{{ asset('front/styles/shop_responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/styles/shop_styles.css') }}">
@endpush
@section('content')

    @include('front.layouts.mnu')


    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{asset('front/images/shop_background.jpg')}}"></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title font-weight-light "><span  style="color: dodgerblue">{{$brand}}</span> | Products </h2>
        </div>
    </div>



    <div class="shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">

                    <!- Shop Sidebar -->
                    <div class="shop_sidebar">
                        <div class="sidebar_section">
                            <div class="sidebar_title">Categories</div>
                            <ul class="sidebar_categories">
                                @foreach(categories() as $category)
                                    @if($category)
                                    <li><a href="{{route('product.category',$category->id)}}">{{ $category->category_name }}</a></li>
                                @endif
                                        @endforeach

                            </ul>
                        </div>


                        <div class="sidebar_section">
                            <div class="sidebar_subtitle ">SubCategories</div>
                            <ul class="sidebar_categories">
                                @foreach($subcategories as $subcategory)
                                    @if($subcategory)
                                    <li><a href="{{route('product.subcategory',$subcategory->id)}}">{{ $subcategory->subcategory_name }}</a></li>
                                @endif
                                        @endforeach
                            </ul>
                        </div>





                        <div class="sidebar_section">
                            <div class="sidebar_subtitle brands_subtitle">Brands</div>
                            <ul class="brands_list">
                                @foreach($brands as $brand)
                                    @if($brand)
                                <li><a href="{{route('product.brand',$brand->id)}}">{{ $brand->brand_name}}</a></li>
                               @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="col-lg-9">

                    <!-- Shop Content -->

                    <div class="shop_content">
                        <div class="shop_bar clearfix">
                            <div class="shop_product_count"><span>{{count($products)}}</span> products found</div>
                            <div class="shop_sorting">
                                <span>Sort by:</span>
                                <ul>
                                    <li>
                                        <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></i></span>
                                        <ul>
                                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
                                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
                                            <li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product_grid row">
                            <div class="product_grid_border"></div>

                        @foreach($products as $product)
                            <!-- Product Item -->
                                <div class="product_item is_new">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                        <img src="{{ asset('public/media/product/'.$product->image_one) }}" alt="" style="height: 100px; width: 100px;"></div>

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

                                    </div>


                                    <a href="#" id="Whish" route="{{route('add.wihshList',$product->id)}}"
                                       model_id="{{$product->id}}">
                                        <div class="product_fav"><i class="fas fa-heart"></i></div></a>


                                    <ul class="product_marks">





                                    @if($product->discount_price != NULL)



                                                <?php $amount= $product->price - $product->discount_price;

                                                $discount=$amount/ $product->price *100;

                                                ?>
                                                <li class="product_mark product_new product_discount">{{intval($discount)}}%</li>

                                    @else
                                            <li class="product_mark product_new">New</li>
                                        @endif
                                    </ul>
                                </div>
                            @endforeach

                        </div>

                        <!-- Shop Page Navigation -->

                        <div class="shop_page_nav d-flex flex-row justify-content-center">
                            <ul class="page_nav d-flex flex-row">
                             {{ $products->links() }}
                            </ul>
                        </div>

                </div>
            </div>
        </div>
    </div>
        <br>



    @push('front-js')
            <script src="{{asset('front/js/shop_custom.js')}}"></script>
            <script src="{{asset('front/plugins/parallax-js-master/parallax.min.js')}}"></script>


    </div>


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
    @endpush

@endsection
