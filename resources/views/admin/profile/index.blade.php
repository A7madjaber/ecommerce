@extends('admin.layouts.app',['title'=>'Profile'])

@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
            <span class="breadcrumb-item active">Profile Settings</span>
        </nav>

        <div class="sl-pagebody">


            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Profile Setting</h6><br>

                @if ($errors->any())
                    <div class="alert alert-danger">

                            @foreach ($errors->all() as $error)
                               {{ $error }}
                            @endforeach

                    </div>
                @endif

                <form method="post" action="{{route('admin.profile.update')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout ">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label"> Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="shop_name" value="{{old('name',$admin->name)}}"  >
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">email : <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" value="{{old('email',$admin->email) }}"  >
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Phone : <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="phone" value="{{old('phone',$admin->phone )}}"  >
                                </div>
                            </div><!-- col-4 -->
                        </div><!-- row -->
                    </div><!-- end row -->


                    <div class="col-lg-4">
                        <div class="d-flex justify-content">

                            <img src="{{asset('public/media/admin/'.$admin->avatar) }}"
                                  style="width:100px;height:100px" id="one" class="img-fluid img-thumbnail ml-3">
                            <input type="hidden" name="old_avatar" value="{{ $admin->avatar }}">
                        </div>
                        <br>
                        <label class="form-control-label">Avatar: <span class="tx-danger">*</span></label>


                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="avatar" onchange="readURL(this);">
                            <span class="custom-file-control"></span>
                        </label>

                    </div><!-- col-4 -->

                    <div class="form-layout-footer">

                            <button  class="btn btn-primary mg-r-5 pull-right">Update</button>

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
