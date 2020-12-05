@extends('admin.layouts.app',['title'=>'Site Settings'])

@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
            <span class="breadcrumb-item active">Site Settings</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Site Setting</h6><br>
                <form method="post" action="{{route('admin.settings.update',$settings->id)}}"
                      enctype="multipart/form-data">
                @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Shop Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="shop_name" value="{{$settings->shop_name }}"  >
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">email : <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" value="{{$settings->email }}"  >
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">address : <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="address" value="{{$settings->address }}"  >
                                </div>
                            </div><!-- col-4 -->



                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Phone One: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="phone" value="{{$settings->phone }}"  >


                                </div>
                            </div>



                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Phone Two: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="phone_two" value="{{$settings->phone_two }}"  >


                                </div>
                            </div>



                            <!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Facebook: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="facebook" value="{{$settings->facebook }}"  >


                                </div>
                            </div><!-- col-4 -->
  <!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Twitter: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="twitter" value="{{$settings->twitter }}"  >


                                </div>
                            </div><!-- col-4 -->
  <!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Tntagram: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="intagram" value="{{$settings->instagram }}"  >


                                </div>
                            </div><!-- col-4 -->




                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Vat: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="vat" value="{{$settings->vat }}"  >


                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Shipping Charge: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="shipping_charge" value="{{$settings->shipping_charge }}"  >


                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-4">
                                <div class="d-flex justify-content">
                                    <img  src="{{asset('public/media/logo/'.$settings->logo) }}"
                                          style="width:100px;height:100px" id="one" class="img-fluid img-thumbnail ml-3">

                                    <input type="hidden" name="old_image" value="{{ $settings->logo }}">

                                </div>
                                <br>
                                <label class="form-control-label">Site Logo: <span class="tx-danger">*</span></label>


                                <label class="custom-file">
                                    <input type="file" id="file" class="custom-file-input" name="logo" onchange="readURL(this);">
                                    <span class="custom-file-control"></span>
                                </label>

                            </div><!-- col-4 -->


                        </div><!-- row -->
                    </div><!-- end row -->


                    <div class="form-layout-footer">

                        @if(auth()->user()->hasPermission('update_settings'))
                            <button  class="btn btn-primary mg-r-5 pull-right">Update</button>
                        @else
                            <button disabled class="btn btn-primary mg-r-5 pull-right">Update</button>
                        @endif
                    </div><!-- form-layout-footer -->
                </form>

            </div><!-- card -->
        </div><!-- card -->

    </div><!-- row -->

    @push('admin-js')





        <script type="text/javascript">
            function readURL(input){
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#one')
                            .attr('src', e.target.result)
                            .width(100)
                            .height(100);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>



    @endpush



@endsection
