@extends('admin.layouts.app',['title'=>'Edit Deal'])
@section('content')


    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
            <span class="breadcrumb-item active">Edit Deal</span>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Edit Deal</h5>
            </div><!-- sl-page-title -->



            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title"> Edit Deal
                    <a href="{{route('admin.deal.all')}}" class="btn btn-warning btn-sm pull-right">All Deals</a>
                </h6>




                <form method="post" action="{{route('admin.deal.update',$deal->id)}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-layout">
                        <div class="row mg-b-25">

                            <div class="col-lg-3">
                                <div class="form-group mg-b-10-force">
                                    <label for="exampleInputEmail1">Expired Date</label>
                                    <input type="date" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$deal->date}}" name="date">

                                </div>
                            </div><!-- modal-body -->



                            <div class="col-lg-3">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Select Product : <span class="tx-danger">*</span></label>
                                    <select class="form-control select2"  data-placeholder="Choose Product" required name="product_id">
                                        <option label="Choose Product"></option>
                                        @foreach($products as $row)
                                            <option value="{{ $row->id }}"
                                                {{$row->id == $deal->product_id ?'selected' : ''}}>
                                                {{ $row->name }}
                                            </option>
                                        @endforeach


                                    </select>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label">Product Image: <span class="tx-danger"></span></label>
                                </div>
                                <img src="{{asset('public/media/product/'.$deal->product->image_one)}}"
                                     style="width:100px;height:110px" id="image" class="img-fluid img-thumbnail">
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <p class="card-title"><b>Product Details  </b></p>
                                    <h6 class="form-control-label">Quantity :   <span name="qyt">{{$deal->product->quantity}}</span>

                                    </h6>

                                    <h6 class="form-control-label">Category :  <span name="category">{{$deal->product->category->category_name}}</span></h6>
                                    <h6 class="form-control-label">Brand :  <span name="brand">{{@$deal->product->brand->brand_name}}</span></h6>
                                </div>
                            </div><!-- col-4 -->

                        </div><!-- row -->




                        <div class="form-layout-footer">
                            <button class="btn btn-primary mg-r-5 pull-right">Create Deal</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->

                </form>

            </div><!-- card -->




        </div>

    </div><!-- sl-mainpanel -->



    @push('admin-js')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('select[name="product_id"]').on('change',function(){
                    var product_id = $(this).val();
                    if (product_id) {

                        $.ajax({
                            url: "{{ url('admin/deal/get/product') }}/"+product_id,
                            type:"GET",
                            dataType:"json",
                            success:function(data) {
                                var d =$('span[name="qyt"]').empty();
                                var d =$('span[name="category"]').empty();
                                var d =$('span[name="brand"]').empty();

                                $('span[name="qyt"]').append('<label>' + data[0] + '</label>');
                                $('span[name="category"]').append('<label>' + data[1] + '</label>');
                                $('span[name="brand"]').append('<label>' + data[2] + '</label>');
                                $('#image').attr('src', "{{asset('public/media/product')}}/"+data[3]).width(110).height(120);

                            },
                        });

                    }else{
                        var d =$('span[name="qyt"]').empty();
                        var d =$('span[name="category"]').empty();
                        var d =$('span[name="brand"]').empty();
                        $('#image').attr('src', "{{asset('admin/img/placeholder.png')}}").width(80).height(90);

                    }

                });
            });

        </script>






    @endpush

@endsection
