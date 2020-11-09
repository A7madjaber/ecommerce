@extends('admin.layouts.app',['title'=>'Messages'])
@section('content')


    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
            <span class="breadcrumb-item active">Messages</span>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>All Messages</h5>
            </div><!-- sl-page-title -->


        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Messages List  </h6>


            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-1p">Name</th>
                        <th class="wd-1p">Phone</th>
                        <th class="wd-1p">Email</th>
                        <th class="wd-1p">Message</th>
                        <th class="wd-2p">Date</th>
                        <th class="wd-2p">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $row)
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>{{ $row->email }} </td>
                            <td>{{ str_limit($row->message,50) }} </td>
                            <td>{{ $row->created_at->diffForHumans()  }}  </td>


                            <td>
                                <a href="{{ route('admin.message.show',$row->id) }} " title="view" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>

                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->


</div>

    </div><!-- sl-mainpanel -->

@endsection
