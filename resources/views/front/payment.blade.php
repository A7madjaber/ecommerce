@extends('front.index',['title'=>'Payment'])
@section('content')
    @push('front-css')

        <link rel="stylesheet" type="text/css" href="{{ asset('front/styles/contact_styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/styles/contact_responsive.css') }}">
    @endpush


    <div class="contact_form">
        <div class="container">
            <div class="row justify-content-center">

                <div class="box-shadow col-lg-5 mr-1" style="padding: 15px;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center font-weight-light">Shipping Address</div>
                        <form action="{{route('payment.process')}}" id="contact_form" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Full Name</label>
                                <input type="text" value="{{auth()->user()->name}}" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your Full Name " name="name" required="">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" class="form-control" value="{{auth()->user()->phone}} "aria-describedby="emailHelp" placeholder="Enter Your Phone " name="phone" required="">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control"value="{{auth()->user()->email}}  "aria-describedby="emailHelp" placeholder="Enter Your Email " name="email" required="">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Your Address" name="address" required="">
                            </div>



                            <div class="form-group">
                                <label for="exampleInputEmail1">City</label>
                                <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your City" name="city" required="">
                            </div>

                            <div class="contact_form_title text-center font-weight-light"> Payment By </div>
                            <div class="form-group">
                                <ul class="logos_list">
                                    <li><input type="radio" name="payment" value="stripe"><img src="{{ asset('front/images/mastercard.png') }}" style="width: 100px; height: 60px;"> </li>

                                    <li><input type="radio"  name="payment" value="paypal"><img src="{{ asset('front/images/paypal.png') }}" style="width: 100px; height: 60px;"> </li>

                                    <li><input type="radio" name="payment" value="ideal"><img src="{{ asset('front/images/mollie.png') }}" style="width: 100px; height: 60px;"> </li>

                                </ul>

                            </div>

                            <div class="contact_form_button text-center">
                                <button type="submit" class="btn btn-success">Pay Now</button>
                            </div>
                        </form>

                    </div>
                </div>




                <div class="box-shadow col-lg-6 ml-2" style=" padding: 20px;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center font-weight-light">Cart Products</div>


                        <div class="cart_items">
                            <ul class="cart_list">

                                @foreach($cart as $row)
                                    <hr style="margin-right: 150px; margin-left:150px;">
                                    <li class="cart_item clearfix">


                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">

                                            <div class="cart_item_name cart_info_col">

                                                <div class="cart_item_text"><img src="{{ asset('public/media/product/'.$row->options->image) }} " style="width: 70px; width: 70px;" alt=""></div>
                                            </div>


                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title"><b>Name</b></div>
                                                <div class="cart_item_text">{{ $row->name  }}</div>
                                            </div>

                                            @if($row->options->color == NULL)
                                                <div class="cart_item_title"><b>Color</b></div>

                                            @else
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title"><b>Color</b></div>
                                                    <div class="cart_item_text"> {{ $row->options->color }}</div>
                                                </div>
                                            @endif


                                            @if($row->options->size == NULL)
                                                <div class="cart_item_title"><b>Size</b></div>
                                            @else
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title"><b>Size</b></div>
                                                    <div class="cart_item_text"> {{ $row->options->size }}</div>
                                                </div>
                                            @endif


                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title"><b>Quantity</b></div>
                                                <div class="cart_item_text"> {{ $row->qty }}</div>

                                            </div>



                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title"><b>Price</b></div>
                                                <div class="cart_item_text">${{ $row->price }}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title"><b>Total</b></div>
                                                <div class="cart_item_text">${{ $row->price*$row->qty }}</div>
                                            </div>


                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>






                        <ul class="list-group col-lg-8" style="float: right;">

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

                    </div>
                </div>


            </div>
        </div>
       <br>
       <br>
    </div>


@endsection
