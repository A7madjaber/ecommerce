@extends('admin.layouts.app',['title'=>'Deals'])
@section('content')


    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
            <span class="breadcrumb-item active">Deals</span>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Deals Table</h5>
            </div><!-- sl-page-title -->


        <div class="card pd-20 pd-sm-40">


            <h6 class="card-body-title">Deals List
                <a href="{{route('admin.deal.new')}}" title="New Deal" class="btn btn-sm btn-warning" style="float: right;">
                    <i class="fa fa-plus"></i></a>
            </h6>


            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-1p">Expired Date</th>
                        <th class="wd-1p">Product</th>
                        <th class="wd-2p">Quantity</th>
                        <th class="wd-2p">Status</th>
                        <th class="wd-2p">Action</th>

                    </tr>
                    </thead>

                    <tbody>
                    @foreach($deals as $row)
                        <tr>
                            <td>{{\Carbon\Carbon::parse( $row->date)->diffForHumans() }}</td>
                            <td>{{ $row->product->name }}</td>
                            <td>{{ $row->product->quantity }} </td>

                            @if($row->date >\Carbon\Carbon::now())
                                <td><span class="badge badge-success">Active</span></td>

                            @else
                                <td><span class="badge badge-warning">Time Out</span></td>
                            @endif

                            <td>
                                <a href="{{route('admin.deal.edit',$row->id) }} "class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                <a href="" id="delete" route="{{route('admin.deal.delete')}}" model_id="{{$row->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a>

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
