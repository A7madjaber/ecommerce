@extends('front.index',['title'=>'Tracking'])
@section('content')

    <div class="container">
        <hr>
        <div class="row justify-content-center p-5 box-shadow ">

            <div class="col-12 offset-lg-1">
                <div class="contact_form_title">
                    <h3 class="font-weight-light"> Your Order Status </h3></div>


                <div class="progress">

                    @if($order->status == 0)
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>

                    @elseif($order->status == 1)
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>

                        <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>

                    @elseif($order->status == 2)
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>

                        <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>

                        <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>

                    @elseif($order->status == 3)
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>

                        <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>

                        <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>

                        <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>

                    @else

                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                    @endif

                </div><br>

                @if($order->status == 0)
                    <h4>Note : Your Order are Under Review  </h4>

                @elseif($order->status == 1)
                    <h4>Note : Payment Accept Under Process  </h4>

                @elseif($order->status == 2)
                    <h4>Note : Packing Done Handover Process  </h4>

                @elseif($order->status == 3)
                    <h4>Note : Order Complete  </h4>

                @else

                    <h4>Note : Order Cancel  </h4>

                @endif




            </div>



            <div class="col-6 offset-lg-1">
                <div class="contact_form_title">
                    <br>
                    <h3 class="font-weight-light"> Your Order Details</h3> </div>

                <ul class="list-group col-lg-12">
                    <li class="list-group-item"> <b>Payment Type:</b> {{ $order->payment_type  }} </li>
                    <li class="list-group-item"> <b>Transection ID:</b> {{ $order->payment_id  }}</li>
                    <li class="list-group-item"> <b>Balance ID:</b> {{ $order->blnc_transection  }}</li>
                    <li class="list-group-item"> <b>Subtotal:</b> {{ $order->subtotal  }}</li>
                    <li class="list-group-item"> <b>Shipping:</b>  {{ $order->shipping  }}</li>
                    <li class="list-group-item"> <b>Vat:</b>  {{ $order->vat  }}</li>
                    <li class="list-group-item"> <b>Total:</b> {{ $order->total  }}</li>
                    <li class="list-group-item"> <b>Month:</b> {{ $order->month  }}</li>
                    <li class="list-group-item"> <b>Date:</b> {{ $order->date  }}</li>
                    <li class="list-group-item"> <b>Year:</b> {{ $order->year  }}</li>



                </ul>


            </div>



        </div>



    </div>
    <br>
    <br>
    <br>

@stop
