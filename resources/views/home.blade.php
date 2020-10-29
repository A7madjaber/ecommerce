@extends('front.index')
@section('content')
    <div class="container">
            <div class="row">
                <div class="col-8 ">
                    <table class="table table-response card box-shadow ">
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

                            <tr>
                                <td scope="col">payment_type</td>
                                <td scope="col">payment_id  </td>
                                <td scope="col">total $  </td>
                                <td scope="col"> $row </td>

                                <td scope="col">

                                    <span class="badge badge-danger">Cancle</span>

                                </td>

                                <td scope="col">status_code</td>
                                <td scope="col">
                                    <a href="" class="btn btn-sm btn-info"> View</a>
                                </td>
                            </tr>


                        </tbody>

                    </table>

                </div>

                <div class="col-4 ">
                    <div class="shadow card ">


                    <div class="card box-shadow">
                        <img src="{{Auth::user()->avatar? Auth::user()->avatar :  asset('front/images/avatar.png') }}"
                             class="card-img-top img-thumbnail" style="height: 90px; width: 90px; margin-left: 34%;">
                        <div class="card-body">

                            <h5 class="card-text ">{{ Auth::user()->name }}</h5>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"> <a href="{{ route('password.change') }}">Change Password</a>  </li>
                            <li class="list-group-item">Edit Profile</li>
                            <li class="list-group-item"><a href="#"> Return Order</a> </li>
                        </ul>

                        <div class="card-body">
                            <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>

                        </div>

                    </div>

                </div>

            </div>

        </div>





@endsection
