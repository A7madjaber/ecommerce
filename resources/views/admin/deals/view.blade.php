@extends('admin.layouts.app',['title'=>'Orders'])
@section('content')

    <style>
        .box-shadow {
            -webkit-box-shadow: 0px 10px 20px 0px rgba(50, 50, 50, 0.52);
            -moz-box-shadow:    0px 10px 20px 0px rgba(50, 50, 50, 0.52);
            box-shadow:         0px 10px 20px 0px rgba(50, 50, 50, 0.52)
        }    </style>




    <div class=" sl-mainpanel ">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
            <span class="breadcrumb-item active">View Order</span>
        </nav>
                <div class="sl-pagebody">

                    <div class="card pd-20 pd-sm-40 ">

                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="card box-shadow">
                                    <div class="card-header"><strong>Order</strong> Details</div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tr>
                                                <th> Name: </th>
                                                <th> {{ $order->user->name }} </th>
                                            </tr>

                                            <tr>
                                                <th> Phone: </th>
                                                <th> {{ $order->user->phone }} </th>
                                            </tr>



                                            <tr>
                                                <th> Payment Type: </th>
                                                <th>{{ $order->payment_type }} </th>
                                            </tr>



                                            <tr>
                                                <th> Payment Id: </th>
                                                <th> {{ $order->payment_id }} </th>
                                            </tr>


                                            <tr>
                                                <th> Total : </th>
                                                <th> {{ $order->total }}  </th>
                                            </tr>

                                            <tr>
                                                <th> Month: </th>
                                                <th> {{ $order->month }} </th>
                                            </tr>

                                            <tr>
                                                <th> Date: </th>
                                                <th> {{ $order->date }} </th>
                                            </tr>

                                        </table>


                                    </div>



                                </div>
                            </div>


                            <div class="col-md-6" >
                                <div class="card box-shadow" >
                                    <div class="card-header"><strong>Shipping</strong> Details</div>
                                    <div class="card-body"id="shipping">
                                        <table class="table">
                                            <tr>
                                                <th> Name: </th>
                                                <th> {{ $order->ship->ship_name }} </th>
                                            </tr>

                                            <tr>
                                                <th> Phone: </th>
                                                <th> {{ $order->ship->ship_phone }} </th>
                                            </tr>



                                            <tr>
                                                <th> Email: </th>
                                                <th>{{ $order->ship->ship_email }} </th>
                                            </tr>



                                            <tr>
                                                <th> Address: </th>
                                                <th> {{ $order->ship->ship_address }} </th>
                                            </tr>


                                            <tr>
                                                <th> City : </th>
                                                <th> {{ $order->shipping }} </th>
                                            </tr>

                                            <tr >
                                                <th> Status: </th>
                                                <th>
                                                    @if($order->status == 0)
                                                        <span class="badge badge-warning">Pending</span>
                                                    @elseif($order->status == 1)
                                                        <span class="badge badge-info">Payment Accept</span>
                                                    @elseif($order->status == 2)
                                                        <span class="badge badge-warning">Progress</span>
                                                    @elseif($order->status == 3)
                                                        <span class="badge badge-success">Delivered</span>
                                                    @else
                                                        <span class="badge badge-danger">Canceled</span>

                                                    @endif

                                                </th>

                                            </tr>


                                        </table>
                                    </div>

                                </div>
                            </div>



                        </div>

                        <br>
                        <br>
                        <div class="row">

                            <div class="  card pd-20 pd-sm-40 col-lg-12">
                                <h6 class="card-body-title">Products Details

                                </h6>


                                <div class="table-wrapper  ">
                                    <table class=" box-shadow table display responsive nowrap">
                                        <thead>
                                        <tr>
                                            <th class="wd-15p">Product ID</th>
                                            <th class="wd-15p">Product Name</th>
                                            <th class="wd-15p">Image</th>
                                            <th class="wd-15p">Color</th>
                                            <th class="wd-15p">Size</th>
                                            <th class="wd-15p">Quantity</th>
                                            <th class="wd-15p">Unit Price</th>
                                            <th class="wd-20p">Total</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $row)

                                            <tr>
                                                <td>{{ $row->product->product_code }}</td>
                                                <td>{{ $row->product_name }}</td>

                                                <td> <img class="img-fluid img-thumbnail" src="{{ asset('public/media/product/'.$row->product->image_one) }}" height="70px;" width=70px;"> </td>
                                                <td>{{ $row->color }}</td>
                                                <td>{{ $row->size }}</td>




                                                <td>{{ $row->quantity }}  {!! $row->product->buyone_getone==1?'<span class="badge badge-warning">Buy One Get One</span>':''!!}</td>
                                                <td>{{ $row->singleprice }}</td>
                                                <td>{{ $row->totalprice }}</td>

                                            </tr>
                                        @endforeach


                                        </tbody>
                                    </table>
                                </div><!-- table-wrapper -->
                            </div><!-- card -->


                        </div>

                        <div class="container m-2" id="shipping-status">


                        @if($order->status == 0)
                                <button id="status" model_id="{{$order->id}}"  route="{{route('admin.order.accept',$order->id)}}" title="Acceptance Payment" class="btn btn-success">
                                    <div><i class="fa fa-check-circle"></i></div>
                                </button>

                                <button  id="status" model_id="{{$order->id}}" route="{{route('admin.order.cancel',$order->id)}}" title="Cancel Order" class="btn btn-danger">
                                    <div><i class="fa fa-times-circle"></i></div>
                                </button>

                            @elseif($order->status ==1)


                                <button id="status" model_id="{{$order->id}}" route="{{route('admin.order.process-delivery',$order->id)}}"  title="Process Delivery" class="btn  btn-warning ">
                                    <div><i class="fa fa-truck"></i></div></button>


                            @elseif($order->status ==2)
                                <button id="status" model_id="{{$order->id}}" route="{{route('admin.order.delivery-done',$order->id)}}" title="Delivered Process Done" class="btn btn-success">
                                    <div><i class="fa fa-check-square"></i></div></button>


                            @elseif($order->status==3)

                            <p class="text-success card-header text-center font-weight-bold">This Product are Successfully Delivered </p>

                            @elseif($order->status==4)
                                <p class="text-danger card-header text-center font-weight-bold"> This order are Not valid </p>

                        @endif

                        </div>


                    </div>
                </div>
            </div>



@endsection

@push('admin-js')
    <script>

        $(document).on("click", "#status", function(e){
            e.preventDefault();
            var model_id =  $(this).attr('model_id');
            var route =  $(this).attr('route');
            $.ajax({
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id' :model_id,
                },
                url: route,
                type: "post",
                dataType: "JSON",
                success : function(data)
                {
                    swal({
                        text: data.message,
                        icon: data.icon,
                        buttons: true,
                    });
                    $("#shipping").load(location.href + " #shipping")
                    $("#shipping-status").load(location.href + " #shipping-status")

                },
            })

        });
    </script>

    @endpush
