@extends('front.index',['title'=>'profile'])
@section('content')
    <?php $orders=auth()->user()->orders ?>

    <div class="container">
<hr>
            <div class="row">
                <div class="col-8 mr-5">

                @if(count($orders)<=0)

                  <a href="{{route('home')}}"> <img class="img-fluid" src="{{asset('front/images/shop.png')}}" style="width:300px;margin-left:200px ;"></a>

                    @else


                    <table class="table table-response box-shadow">
                        <thead>
                        <tr>
                            <th scope="col">Payment Type </th>
                            <th scope="col">Amount </th>
                            <th scope="col">Date </th>
                            <th scope="col">Status  </th>
                            <th scope="col">Status Code </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $row)
                            <tr>
                                <td scope="col">{{ $row->payment_type }} </td>
                                <td scope="col">{{ $row->total }} </td>
                                <td scope="col">{{ $row->date }}  </td>

                                <td scope="col">
                                    @if($row->status == 0)
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif($row->status == 1)
                                        <span class="badge badge-info">Payment Accept</span>
                                    @elseif($row->status == 2)
                                        <span class="badge badge-warning">Progress</span>
                                    @elseif($row->status == 3)
                                        <span class="badge badge-success">Delivered</span>
                                    @else
                                        <span class="badge badge-danger">Canceled</span>
                                    @endif
                                </td>
                                <td scope="col">{{ $row->status_code }}  </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    @endif
                </div>


                <div class="col-3 ml-5">


                        <div class="card box-shadow">
                        <br>
                            <img src="{{Auth::user()->avatar ==null ?  asset('front/images/avatar.png')
                                : asset('public/media/user/'.auth()->user()->avatar)}}"
                                 class="img-fluid img-thumbnail" style="height: 90px; width: 90px; margin-left: 34%;">
                        <div class="card-body">
                            <h5 class="card-text ">{{ Auth::user()->name }}</h5>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"> <a href="{{ route('password.change') }}">Change Password</a></li>
                            <li class="list-group-item"><a href="{{route('edit.profile')}}"> Edit Profile</a></li>
                            <li class="list-group-item"><a href="{{route('return.order.list')}}"> Return Order</a> </li>
                        </ul>

                        <div class="card-body">
                            <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm  float_right">Logout</a>
                        </div>

                    </div>

                </div>
            </div>


        <br>
        <br>
        <br>


</div>




@endsection
