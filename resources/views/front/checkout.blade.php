@extends('front.index',['title'=>'Checkout'])
@section('content')
    @push('front-css')

        <link rel="stylesheet" type="text/css" href="{{ asset('front/styles/cart_styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/styles/cart_responsive.css') }}">
    @endpush


    <!-- Cart -->
    <div class="container" id="row">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart_container" >
                    <div class="cart_title font-weight-light">Checkout</div>
                    <div id="cart" class="cart_items">

                        @if(Cart::total()==0.00)
                            <ul class="cart_list">
                                <li class="cart_item clearfix">
                                    <h2 class="title font-weight-light">The cart Is Empty</h2>
                                </li>
                            </ul>
                        @else
                            <ul class="cart_list">
                                @foreach($cart as $row)
                                    <hr style="margin-right: 150px; margin-left:150px;">

                                    <li class="cart_item clearfix" id="rwo{{$row->rowId}}">
                                        <div class="cart_item_image text-center"><br><img src="{{ asset('public/media/product/'.$row->options->image) }} " style="width: 70px; width: 70px;" alt=""></div>
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Name</div>
                                                <div class="cart_item_text">{{ $row->name  }}</div>
                                            </div>

                                            @if($row->options->color == NULL)

                                            @else
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title">Color</div>
                                                    <div class="cart_item_text"> {{ $row->options->color }}</div>
                                                </div>
                                            @endif


                                            @if($row->options->size == NULL)

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

                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Total</div>
                                                <div class="cart_item_text">{{ $row->price*$row->qty }}</div>
                                            </div>

                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Action</div><br>
                                                <a href="#" route="{{route('remove.form.cart')}}" row_id="{{$row->rowId}}"id="remove-cart"
                                                   class="btn btn-sm btn-danger">x</a></div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="cart_buttons">
                                <div class="order_total_content" style="padding: 15px;">
                                    @if(Session::has('coupon'))

                                    @else

                                        <h5 style="margin-right: 255px;"> Apply Coupon </h5>

                                        <div class="form group col-lg-4 float_right ">
                                                <input type="text" name="coupon" class="form-control coupon" required="" placeholder="Enter Your Coupon">
                                            </div>
                                            <br><br><br>
                                            <button type="submit" route="{{route('coupon')}}" id="coupon" class="btn btn-danger">Submit</button>
                                    @endif
                                </div>
                            </div>


                            <ul class="list-group col-lg-4" style="float: right;">

                                @if(Session::has('coupon'))


                                    <li class="list-group-item">Subtotal : <span style="float: right;">
                                            {{ Session::get('coupon')['balance'] }} </span> </li>
                                    <li class="list-group-item">Coupon : ( {{ Session::get('coupon')['name'] }} )



                                        <span style="float: right;">
                                            {{ Session::get('coupon')['discount']}} </span> </li>

                                @else
                                    <li class="list-group-item">Subtotal : <span style="float: right;">
                                            {{  Cart::Subtotal() }} </span> </li>
                                @endif


                                <li class="list-group-item">Shiping Charge : <span style="float: right;">{{Settings()->shipping_charge}} </span> </li>
                                    <li class="list-group-item">Vat : <span style="float: right;">{{Settings()->vat}} </span> </li>
                                    @if(Session::has('coupon'))
                                        <li class="list-group-item">Total : <span style="float: right;">
                                                {{ Session::get('coupon')['balance']+Settings()->shipping_charge+Settings()->vat }} </span> </li>
                                    @else
                                        <li class="list-group-item">Total : <span style="float: right;">
                                                {{ Cart::Subtotal()+ Settings()->shipping_charge+Settings()->vat }} </span> </li>
                                    @endif

                            </ul>
                            <div class="cart_buttons"><br><br><br><br><br><br><br><br><br>

                                @if(Session::has('coupon'))
                                <a href="#"  id="cancelcoupon"
                                   route="{{route('coupon.remove')}}"

                                   class="btn btn-danger btn">Cancel Coupon</a>
                                @endif

                                <a href="{{route('payment.step')}}" title="Checkout" class="btn btn-primary">Final Step</a>
                            </div>
                            <!-- Order Total -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <br>

    @push('front-js')


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
                            $("#row").load(location.href + " #row")


                            $(".cart").load(location.href + " .cart");
                            $("#cart").load(location.href + " #cart");




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
                            $("#cart").load(location.href + " #cart");
                            $("#row").load(location.href + " #row")


                        }

                    },

                })


            });






        </script>


{{--        submit coupon--}}
        <script>

            $(document).on('click','#coupon',function(e) {



                e.preventDefault();
                var route =  $(this).attr('route');
                var coupon =  $('.coupon').val();


                $.ajax({
                    data: {

                        'coupon':coupon,
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
                            $("#cart").load(location.href + " #cart");
                            $("#row").load(location.href + " #row")


                        }

                    },

                })


            });






        </script>

        {{--        Cancel coupon--}}
        <script>

            $(document).on("click", "#cancelcoupon", function(e){
                e.preventDefault();

                var route =  $(this).attr('route');

                $.ajax({
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


                            $("#row").load(location.href + " #row");
                            $(".cart").load(location.href + " .cart");
                            $("#cart").load(location.href + " #cart");




                        }

                    },

                })


            });






        </script>

    @endpush
@endsection
