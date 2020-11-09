@extends('front.index',['title'=>'Return Order'])
@section('content')

    <div class="container">

            <div class="row">
                <div class="col-8 mr-5">
                    <table class="table table-response box-shadow">
                        <thead>
                        <tr>
                            <th scope="col">Payment Type </th>
                            <th scope="col">Amount </th>
                            <th scope="col">Date </th>
                            <th scope="col">Status  </th>
                            <th scope="col">Status Code </th>
                            <th scope="col">Return </th>


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


                                <td scope="col">
                                    @if($row->return_order == 0)
                                        <a href="{{ route('return.order',$row->id) }}" class="btn btn-sm btn-danger" id="return"> <i class="fa fa-recycle"></i> </a>
                                    @elseif($row->return_order == 1)
                                        <span class="badge badge-info">Pending</span>
                                    @elseif($row->return_order == 2)
                                        <span class="badge badge-warning">Success</span>

                                    @endif

                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                </div>

                <div class="col-3 ml-5">


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


@push('front-js')
    <script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
        <script>
        $(document).on("click", "#return", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                title: "Are you Want to Return?",
                text: "Once return, this will return your money!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Cancel!");
                    }
                });
        });
    </script>
@endpush


@endsection
