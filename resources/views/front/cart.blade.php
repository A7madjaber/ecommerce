@extends('front.index',['title'=>'Cart'])
@section('content')

    @push('front-css')

        <link rel="stylesheet" type="text/css" href="{{ asset('front/styles/cart_styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/styles/cart_responsive.css') }}">
        @endpush
    <!-- Cart -->

    @include('front.layouts.mnu')
<br>
<br>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart_container">

                        <div id="cart" class="cart_items">


                                @if(Cart::total()==0.00)

                                    <div class="d-flex justify-content-center" style="margin: -100px">
                                        <img src="{{asset('front/images/empty-cart.png')}}">
                                    </div>


                                    @else

                                <div class="cart_title font-weight-light">Shopping Cart</div>
                                <ul class="cart_list">

                                @foreach($cart as $row)
                                    <hr style="margin-right: 150px; margin-left:150px;">

                                    <li class="cart_item clearfix" id="rwo{{$row->rowId}}">
                                        <div class="cart_item_image text-center"><br>
                                            <img class="img-fluid img-thumbnail" src="{{ asset('public/media/product/'.$row->options->image) }} "
                                                 style="width: 100px; width: 100px;" alt=""></div>
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Name</div>
                                                <div class="cart_item_text">{{ $row->name  }}</div>
                                            </div>

                                            @if($row->options->color == NULL)
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title">Color</div>
                                                    <div class="cart_item_text"> --</div>
                                                </div>
                                            @else
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title">Color</div>
                                                    <div class="cart_item_text"> {{ $row->options->color }}</div>
                                                </div>
                                            @endif


                                            @if($row->options->size == NULL)
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title">Size</div>
                                                    <div class="cart_item_text"> --</div>
                                                </div>
                                            @else
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title">Size</div>
                                                    <div class="cart_item_text"> {{ $row->options->size }}</div>
                                                </div>
                                            @endif


                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title">Quantity</div><br>


                                                    <input class="form-control d-inline-flex qyt-val{{$row->rowId}}"
                                                           type="number" name="qty" value="{{ $row->qty }}"
                                                           style="width: 75px;">


                                                <button route="{{route('qty.update')}}"
                                                        row_id="{{$row->rowId}}"

                                                       type="submit" id="updateqty"
                                                       value="" class="btn btn-success">
                                                    <i class="fas fa-check-square"></i>
                                                </button>
                                            </div>



                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Price</div>
                                                <div class="cart_item_text">{{ $row->price }}</div>
                                            </div>

                                            <div class="cart_item_total cart_info_col qyt">
                                                <div class="cart_item_title">Total</div>
                                                <div class="cart_item_text" >{{ $row->price*$row->qty }}</div>
                                            </div>

                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Action</div><br>
                                                <a href="#" route="{{route('remove.form.cart')}}"
                                                   row_id="{{$row->rowId}}"
                                                   id="remove-cart"
                                                   class="btn btn-sm btn-danger">x</a>

                                            </div>



                                        </div>


                                    </li>

                                @endforeach

                            </ul>

                        </div>


                        <!-- Order Total -->
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Order Total:</div>
                                <div id="order_total_amount"
                                     class="order_total_amount">{{ Cart::total() }}</div>
                            </div>
                        </div>

                        @endif

                        @if(Cart::total()==0.00)
                            <br>
                            @else
                        <div class="cart_buttons">
                            <button id="destroy" title="Cancel All" type="button" class="btn btn-danger ">X</button>
                            <a href="{{route('user.checkout')}}" title="Checkout" class="btn btn-outline-primary">Checkout</a>

                        </div>

                            @endif
                    </div>
                </div>
            </div>
        </div>


    @push('front-js')



    <script src="{{ asset('front/js/cart_custom.js') }}"></script>





{{--    remove product form cart--}}
    <script>

        $(document).on("click", "#remove-cart", function(e){
            e.preventDefault();
            var id =  $(this).attr('row_id');
            var route =  $(this).attr('route');




            $.ajax({
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id' :id,

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


                        $('#rwo'+id).remove();

                  $("#order_total_amount").load(location.href + " #order_total_amount")


                        $(".cart").load(location.href + " .cart");
                        $("#cart").load(location.href + " #cart")


                    }

                },

            })

        });






    </script>


{{--    update quantity --}}
    <script>

        $(document).on('click','#updateqty',function(e) {



            e.preventDefault();

            var id =  $(this).attr('row_id');
            var route =  $(this).attr('route');
            var qyt =  $('.qyt-val'+id).val();


            $.ajax({
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id' :id,
                    'qty':qyt,
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

                        $(".cart").load(location.href + " .cart");
                  $("#order_total_amount").load(location.href + " #order_total_amount");

                        $(".qyt").load(location.href + " .qyt");



                    }

                },

            })


        });






    </script>

{{--    destroy cart--}}
    <script>

        $(document).on('click','#destroy',function(e) {



            e.preventDefault();

            $.ajax({

                url: "{{route('destroy.cart')}}",
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

                        $(".cart").load(location.href + " .cart");
                        $("#order_total_amount").load(location.href + " #order_total_amount");
                        $("#cart").load(location.href + " #cart")


                    }

                },

            })


        });






    </script>


    @endpush
@endsection
