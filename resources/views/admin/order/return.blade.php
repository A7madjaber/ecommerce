@extends('admin.layouts.app',['title'=>'Return Orders'])
@section('content')


    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
            <span class="breadcrumb-item active">Return Orders</span>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Return Orders Table</h5>
            </div><!-- sl-page-title -->


        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Return Orders List </h6>


            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-1p">Payment Type</th>

                        <th class="wd-1p">SubTotal</th>
                        <th class="wd-2p">Shipping</th>
                        <th class="wd-2p">Total</th>
                        <th class="wd-2p">Date</th>
                        <th class="wd-2p">Return Status</th>
                        <th class="wd-2p">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $row)
                        <tr>
                            <td>{{ $row->payment_type }}</td>
                            <td>{{ $row->subtotal }} </td>
                            <td>{{ $row->shipping }} </td>
                            <td>{{ $row->total }} </td>
                            <td>{{ $row->date }}  </td>



                            <td scope="col">

                               @if($row->return_order == 1)
                                  <h6> <span class="badge badge-info">Pending</span></h6>
                                @elseif($row->return_order == 2)
                                   <h6> <span class="badge badge-warning">Success</span></h6>

                                @endif

                            </td>


                            <td>
                                @if($row->return_order == 1)
                                    <a href="#" id="return" model_id="{{$row->id}}"
                                       route="{{route('admin.order.return.approve')}}"
                                       title="return" class="btn btn-sm btn-info btn-sm">
                                        <i class="fa fa-check-square"></i>
                                    </a>
                                @elseif($row->return_order == 2)
                                    <h6><span class="badge badge-success">Return Success</span>
                                    </h6>
                                @endif
                            </td>


                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->


</div>

    </div><!-- sl-mainpanel -->



    @push('admin-js')

        <script>

            $(document).on("click", "#return", function(e){
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
                            icon: "success",
                            buttons: true,
                        });

                        $('#datatable1').load(document.URL +  ' #datatable1');
                    },
                })

            });
        </script>
    @endpush

@endsection
