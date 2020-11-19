@extends('front.index',['title'=>'Edit profile'])
@section('content')

    <div class="container">
<hr>
            <div class="row">


                <div class="col-8 ">

                    <form method="post" action="{{route('edit.profile')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-layout">
                            <div class="row mg-b-25">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">User Name: </label>
                                        <input class="form-control" required type="text" name="name"  value="{{auth()->user()->name}}">

                                    </div>
                                </div><!-- col-4 -->

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Email: </label>

                                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',auth()->user()->email) }}"  aria-describedby="emailHelp"  required="">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div><!-- col-4 -->




                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">phone: </label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone',auth()->user()->phone) }}" required="">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div><!-- col-4 -->





                                <img src="{{Auth::user()->avatar ==null ?  asset('front/images/avatar.png')
                                : asset('public/media/user/'.auth()->user()->avatar)}}"
                                     style="width:80px;height:80px" id="one" class="img-fluid img-thumbnail">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Image:</label>
                                        <label class="custom-file">
                                            <input type="file" id="file" class="custom-file-input" name="avatar" onchange="readURL(this);">
                                            <span class="custom-file-control"></span>
                                            <input type="hidden" name="old_avatar" value="{{ auth()->user()->avatar }}">

                                        </label>

                                    </div>
                                </div><!-- col-4 -->




</div>
<hr>
                            <div class="form-layout-footer float_right">
                                <button class="btn btn-primary mg-r-5 pull-right">Update</button>
                            </div><!-- form-layout-footer -->
                        </div><!-- form-layout -->

                    </form>

                </div>

                <div class="col-3 ml-5">


                        <div class="card box-shadow">
                        <br>
                            <img src="{{Auth::user()->avatar ==null ?  asset('front/images/avatar.png')
                             : asset('public/media/user/'.auth()->user()->avatar)}}"
                                 class="img-fluid img-thumbnail" style="height: 90px; width: 90px; margin-left: 34%;">
                        <div class="card-body">
                            <h5 class="card-text ">{{ Auth::user()->name }}</h5>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"> <a href="{{ route('password.change') }}">Change Password</a></li>
                            <li class="list-group-item"><a href="{{route('edit.profile')}}"> Edit Profile</a></li>
                            <li class="list-group-item"><a href="{{route('return.order.list')}}"> Return Order</a> </li>
                        </ul>

                        <div class="card-body">
                            <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm  float_right">Logout</a>
                        </div>

                    </div>

                </div>
            </div>


        <br>
        <br>
        <br>


</div>


    <script type="text/javascript">
        function readURL(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(90)
                        .height(90);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>



@endsection
