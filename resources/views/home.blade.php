@extends('front.index',['title'=>'profile'])
@section('content')
    <?php $orders=auth()->user()->orders ?>


    <div class="container">
            <div class="row">
                <div class="col-8 ">
                    <table class="table table-response box-shadow">
                        <thead>
                        <tr>
                            <th scope="col">Payment Type </th>
                            <th scope="col">Payment ID </th>
                            <th scope="col">Amount </th>
                            <th scope="col">Date </th>
                            <th scope="col">Status  </th>
                            <th scope="col">Status Code </th>
                            <th scope="col">Action </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $row)
                            <tr>
                                <td scope="col">{{ $row->payment_type }} </td>
                                <td scope="col">{{ $row->payment_id }} </td>
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
                                <td scope="col">
                                    <a href="" class="btn btn-sm btn-info"> View</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                </div>

                <div class="col-4 ">
                    <div class="shadow card ">


                    <div class="card box-shadow">
                        <br>
                        <img src="{{Auth::user()->avatar? Auth::user()->avatar :  asset('front/images/avatar.png') }}"
                             class="img-fluid img-thumbnail" style="height: 90px; width: 90px; margin-left: 34%;">
                        <div class="card-body">

                            <h5 class="card-text ">{{ Auth::user()->name }}</h5>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"> <a href="{{ route('password.change') }}">Change Password</a>  </li>
                            <li class="list-group-item">Edit Profile</li>
                            <li class="list-group-item"><a href="#"> Return Order</a> </li>
                        </ul>

                        <div class="card-body">
                            <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm  float_right">Logout</a>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        <br>
        <br>
        <br>


</div>
@endsection
