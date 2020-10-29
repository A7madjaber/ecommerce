@extends('admin.layouts.app',['title'=>'Subscriber News'])

@section('content')

    <div class="sl-mainpanel">


        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Subscribers List</h5>

            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Subscribers List
                    <a href="#" class="btn btn-sm btn-danger" style="float: right;" data-toggle="modal" data-target="#modaldemo3">
                        <i class="fa fa-plus"></i>Delete All  </a>
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
                                    <a href="" id="delete" route="{{route('admin.coupon.delete.newsletters')}}" model_id="{{$row->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"> Delete</i> </a>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->




        </div><!-- sl-mainpanel -->



        <!-- LARGE MODAL -->

        <div id="modaldemo3" class="modal fade" >

            <div class="modal-dialog modal-lg col-12" role="document">
                <div class="modal-content"style="width:200%">
                    <div class="modal-header pd-x-20">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"> Coupon Add</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                    @if($errors->any())
                        <div class="p-3 mb-2 alter alert-danger">
                            @foreach($errors->all() as $error)
                                <p class="mb-0">{{$error}}</p>
                            @endforeach
                        </div>
                    @endif


                    <div class="modal-body">
                        <form method="post" action="{{ route('admin.coupon.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Coupon Code</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Coupon Code" name="coupon">
                            </div><!-- modal-body
                            --> <div class="form-group">
                                <label for="exampleInputEmail1">Coupon Discount (%)</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Coupon Discount" name="discount">
                            </div><!-- modal-body -->

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary pd-x-20"> Submit</button>
                                <button type="button" class="btn btn-danger pd-x-20" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->
    </div>

@endsection
