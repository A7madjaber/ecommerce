@extends('admin.layouts.app',['title'=>'Subscriber News'])

@section('content')

    <div class="sl-mainpanel">

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
            <span class="breadcrumb-item active">Newsletter </span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Subscribers List</h5>

            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Subscribers List
                    <a href="#" class="btn btn-sm btn-danger" title="delete All" style="float: right;" data-toggle="modal" data-target="#modaldemo3">
                        <i class="fa fa-trash"></i></a>
                </h6>


                <div class="table-wrapper">
                    <table id="datatable1" class=" table display responsive nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable1_info" style="width: 949px;">
                        <thead>
                        <tr>
                            <th class="wd-15p sorting_asc">ID</th>
                            <th class="wd-15p sorting_asc">Email</th>
                            <th class="wd-15p sorting_asc">Subscribing Time</th>
                            <th class="wd-15p sorting_asc">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sub as $key=>$row)
                            <tr>
                                <td> <input type="checkbox" name=""> {{ $key +1 }}</td>
                                <td>{{ $row->email}}</td>

                                <td>{{ $row->created_at->diffForHumans()}}</td>

                                <td>
                                    <a href="" id="delete" route="{{route('admin.coupon.delete.newsletters')}}" model_id="{{$row->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->




        </div><!-- sl-mainpanel -->



        <!-- LARGE MODAL -->

    </div>

@endsection
