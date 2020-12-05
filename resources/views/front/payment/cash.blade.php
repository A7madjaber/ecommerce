@extends('front.index',['title'=>'Cash'])
@section('content')

<script src="https://js.stripe.com/v3/"></script>

@push('front-css')
    <style>
  /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;

  height: 40px;
  width: 100%;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}

</style>
    <link rel="stylesheet" type="text/css" href="{{ asset('front/styles/contact_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/styles/contact_responsive.css') }}">

@endpush

@include('front.layouts.mnu')

<div class="contact_form" style="background: #f9f9f9">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5  box-shadow " style=" padding: 20px; border-radius: 10px;">
                <div class="contact_form_container">

                    <form action="{{route('cash.charge')}}" method="post" id="payment-form">
                        @csrf
                        <div class="form-row">
                            <h3 class="font-weight-light" >Cash On Delivery</h3>
                        </div>
                        <br>


                        <input type="hidden" name="shipping" value="{{ Settings()->shipping_charge }} ">
                        <input type="hidden" name="vat" value="{{ Settings()->vat  }} ">
                        <input type="hidden" name="total" value="{{ Cart::Subtotal() +Settings()->charge +Settings()->vat }} ">
                        <input type="hidden" name="ship_name" value="{{$data['name']}}">
                        <input type="hidden" name="ship_phone" value="{{$data['phone']}}">
                        <input type="hidden" name="ship_email" value="{{$data['email']}}">
                        <input type="hidden" name="ship_address" value="{{$data['address']}}">
                        <input type="hidden" name="ship_city" value="{{$data['city']}}">
                        <input type="hidden" name="payment_type" value="{{$data['payment']}}">
                        <button class="btn btn-success float_right">Pay Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br><br>

</div>


@push('front-js')


    @endpush


@endsection
