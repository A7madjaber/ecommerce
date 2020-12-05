@extends('admin.layouts.app',['title'=>'New Admin'])
@section('content')


    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
            <span class="breadcrumb-item active">New Admin</span>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Create New Admin</h5>
            </div><!-- sl-page-title -->


                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title"> ADD New Admin
                        <a href="{{route('admin.admin.all')}}" class="btn btn-warning btn-sm pull-right">All Admins</a>
                    </h6>
                    <form action="{{route('admin.admin.store')}}" method="post">
                        @csrf

                        <div class="row row-sm mg-t-20">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="card-title">Admin Name <span class="tx-danger">*</span></label>
                                    <input  class="form-control @error('name') is-invalid @enderror" required type="text"  value="{{old('name')}}" name="name" placeholder="Enter  Name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                            <!-- col-4 -->
                            <div class="col-lg-4">

                                <div class="form-group">
                                    <label class="card-title">Email <span class="tx-danger">*</span></label>
                                    <input  class="form-control @error('email') is-invalid @enderror" type="text"  value="{{old('email')}}" name="email" placeholder="Enter Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="card-title">Phone </label>
                                    <input  class="form-control @error('phone') is-invalid @enderror" type="text"  value="{{old('phone')}}" name="phone" placeholder="Enter Phone">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="card-title">Password <span class="tx-danger">*</span></label>
                                    <input  class="form-control @error('Password') is-invalid @enderror" type="password"  value="{{old('Password')}}" name="password" placeholder="Enter Password">
                                    @error('Password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                          <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="card-title">Confirm Password <span class="tx-danger">*</span></label>
                                    <input placeholder="Confirm-Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="card-title">Roles <span class="tx-danger">*</span></label>
                                    <select  class="form-control select2 @error('role') is-invalid @enderror" multiple name="roles[]">

                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach


                                    </select>

                                    @error('role')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                        </div><!-- col-8 -->




                    <div class="form-layout-footer">
                        <button class="btn btn-primary mg-r-5 pull-right">Create Admin</button>
                    </div><!-- form-layout-footer -->

                    </form>
                </div>
            </div><!-- card -->




    @push('admin-js')
    @endpush

@endsection
