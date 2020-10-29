@extends('admin.layouts.app',['title'=>'Create Product'])
<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
@section('content')



    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
            <span class="breadcrumb-item active">Create Product</span>
        </nav>

        <div class="sl-pagebody">


            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">New Product ADD
                    <a href="{{route('admin.product.all')}}" class="btn btn-secondary btn-sm pull-right"> All Products</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">Add New Product Form</p>

                <form method="post" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" required type="text" name="name"  placeholder="Enter Product Name">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                    <input class="form-control" required type="text" name="product_code"  placeholder="Enter Product Code">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="number"  required name="price" placeholder="Selling Price" >
                                </div>
                            </div><!-- col-4 -->




                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Discount Price: </label>
                                    <input class="form-control"  type="number" name="discount_price" placeholder="Discount Price">
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose Category" required name="category_id">
                                        <option label="Choose Category"></option>
                                        @foreach($category as $row)
                                            <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose Category" name="sub_category_id">

                                    </select>
                                </div>
                            </div><!-- col-4 -->



                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Brand:</label>

                                    <select class="form-control select2"  name="brand_id">

                                        <option value="" selected>None</option>

                                        @foreach($brand as $row)
                                            <option value="{{ $row->id }}">{{ $row->brand_name }}</option>

                                        @endforeach


                                    </select>

                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text"  name="size" id="size" data-role="tagsinput"  >
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                                    <input class="form-control " type="text"   name="color" id="color" data-role="tagsinput"  >
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                                    <input class="form-control" required type="number" name="quantity"  placeholder="product quantity">
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>

                                    <textarea  class="form-control" id="summernote"  name="details" >

             </textarea>

                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Video Link: </label>
                                    <input class="form-control" name="video" placeholder="Video Link" >
                                </div>
                            </div><!-- col-4 -->


                            <img src="{{asset('admin/img/placeholder.png')}}"
                                 style="width:60px;height: 60px" id="one" class="img-fluid img-thumbnail">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Image One ( Main Thumbnali): <span class="tx-danger">*</span></label>
                                    <label class="custom-file">
                                        <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL(this);" required="">
                                        <span class="custom-file-control"></span>
                                    </label>

                                </div>
                            </div><!-- col-4 -->

                            <img src="{{asset('admin/img/placeholder.png')}}"
                                 style="width:60px;height: 60px" id="two" class="img-fluid img-thumbnail">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                                    <label class="custom-file">
                                        <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL2(this);" required="">
                                        <span class="custom-file-control"></span>

                                    </label>

                                </div>
                            </div><!-- col-4 -->



                            <img src="{{asset('admin/img/placeholder.png')}}"
                                 style="width:60px;height: 60px" id="three" class="img-fluid img-thumbnail">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
                                    <label class="custom-file">
                                        <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL3(this);" required="">
                                        <span class="custom-file-control"></span>

                                    </label>

                                </div>
                            </div><!-- col-4 -->

                        </div><!-- row -->

                        <hr>
                        <br><br>

                        <div class="row">
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="main_slider" value="1">
                                    <span>Main Slider</span>
                                </label>

                            </div> <!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="hot_deal" value="1">
                                    <span>Hot Deal</span>
                                </label>

                            </div> <!-- col-4 -->



                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="best_rated" value="1">
                                    <span>Best Rated</span>
                                </label>

                            </div> <!-- col-4 -->


                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="trend" value="1">
                                    <span>Trend Product </span>
                                </label>

                            </div> <!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="mid_slider" value="1">
                                    <span>Mid Slider</span>
                                </label>

                            </div> <!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="hot_new" value="1">
                                    <span>Hot New </span>
                                </label>

                            </div> <!-- col-4 -->


                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="buyone_getone" value="1">
                                    <span>Buy one Get one</span>
                                </label>

                            </div> <!-- col-4 -->


                        </div><!-- end row -->
                        <br><br>


                        <div class="form-layout-footer">
                            <button class="btn btn-primary mg-r-5 pull-right">Create Product</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->

                </form>

            </div><!-- card -->

            </div>
        </div>



        </div><!-- sl-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="category_id"]').on('change',function(){
                var category_id = $(this).val();
                if (category_id) {

                    $.ajax({
                        url: "{{ url('admin/product/get/sub-categories') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var d =$('select[name="sub_category_id"]').empty();
                            $.each(data, function(key, value){

                                $('select[name="sub_category_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');

                            });
                        },
                    });

                }else{
                    alert('danger');
                }

            });
        });

    </script>


    <script type="text/javascript">
        function readURL(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(70)
                        .height(70);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script type="text/javascript">
        function readURL2(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#two')
                        .attr('src', e.target.result)
                        .width(70)
                        .height(70);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>



    <script type="text/javascript">
        function readURL3(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#three')
                        .attr('src', e.target.result)
                        .width(70)
                        .height(70);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
