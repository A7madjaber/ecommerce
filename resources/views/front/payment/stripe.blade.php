@extends('front.index',['title'=>'Stripe'])
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
                    <div class="contact_form_title text-center font-weight-light">Card NO</div>
                    <form action="{{route('stripe.charge')}}" method="post" id="payment-form">
                        @csrf
                        <div class="form-row">
                            <label for="card-element">
                                Credit or debit card
                            </label>
                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div><br>

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

 <script type="text/javascript">

// Create a Stripe client.
var stripe = Stripe('pk_test_51HhEdOHkRBs1IQbgmNxrRDqAPGJ3v0dny1ChnskrYu6jgcfP83YNNy513dWYo06VosKRKwXr91TVIqsBmOViNQ7g006RUanGUo');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}


 </script>

    @endpush


@endsection
