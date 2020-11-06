@extends('admin.layouts.app',['title'=>'Products'])
@section('content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
            <span class="breadcrumb-item active">Products</span>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Product Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Products List
                    <a href="{{route('admin.product.create')}}" class="btn btn-sm btn-warning" style="float: right;">
                        <i class="fa fa-plus"></i></a>
                </h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable1_info" style="width: 949px;">
                        <thead>
                        <tr role="row">
                            <th class="wd-1p-force">Code</th>
                            <th class="wd-15p sorting_asc">Product name</th>
                            <th class="wd-15p sorting_asc">Image</th>
                            <th class="wd-15p sorting_asc">Brand</th>
                            <th class="wd-15p sorting_asc">Category</th>
                            <th class="wd-15p sorting_asc">Quantity</th>
                            <th class="wd-15p sorting_asc">Status</th>
                            <th class="wd-1p force">Date</th>
                            <th class="wd-15p sorting_asc">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($product as $row)
                            <tr id="rwo{{$row->id}}">
                                <td>{{ $row->product_code }}</td>
                                <td>{{ $row->name }}</td>
                                <td>
                                    <img height="70px" width="70px"  src="{{asset('public/media/product/'.$row->image_one) }}">
                                </td>
                                <td>{{ @$row->brand->brand_name }}</td>
                                <td>{{ $row->category->category_name }}</td>
                                <td>{{ @$row->quantity}}</td>
                                <td>
                                    @if($row->status==1)
                                        <h6> <span class="badge badge-success">Active</span></h6>
                                    @else
                                        <h6> <span class="badge badge-danger">Un-Active</span></h6>
                                    @endif
                                </td>
                                <td>{{$row->created_at->diffforhumans()}}</td>
                                <td>
                                    <a href="{{route('admin.product.edit',$row->id) }}
                                        "class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>

                                    <a href="{{route('admin.product.show',$row->id) }}"title="show"
                                       class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>

                                    <a href="" id="delete" route="{{route('admin.product.delete')}}"
                                       model_id="{{$row->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

                                    @if($row->status==1)

                                        <a href="" id="status" route="{{route('admin.product.status')}}"
                                           model_id="{{$row->id}}"class="btn btn-sm btn-danger"title="un-active">
                                            <i class="fa fa-thumbs-down"></i></a>
                                    @else

                                        <a href="" id="status"title="active" route="{{route('admin.product.status')}}"
                                           model_id="{{$row->id}}"class="btn btn-sm btn-info"><i class="fa fa-thumbs-up"></i></a>
                                    @endif
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
                        icon: "success",
                        buttons: true,
                    });

                    $('#datatable1').load(document.URL +  ' #datatable1');
                },
            })

        });
    </script>


@endpush
