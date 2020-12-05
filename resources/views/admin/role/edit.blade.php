@extends('admin.layouts.app',['title'=>'Edit Role'])
@section('content')


    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
            <span class="breadcrumb-item active">Edit Role</span>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Edit Role</h5>
            </div><!-- sl-page-title -->


                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title"> Edit Role
                        <a href="{{route('admin.role.all')}}" class="btn btn-warning btn-sm pull-right">All Roles</a>
                    </h6>
                    <form action="{{route('admin.role.update',$role->id)}}" method="post">
                        @csrf

                        <div class="form-layout">

                        <div class="row row-sm mg-t-20">
                            <div class="col-lg-4 ml-5" style="margin:15px">
                                <div class="form-group">
                                    <label class="card-title">Role Name <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('name') is-invalid @enderror" required type="text" name="name" placeholder="Enter Role Name"  value="{{old('name',$role->name)}}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                            <!-- col-4 --> <div class="col-lg-6 ml-5" style="margin:15px">
                                <div class="form-group">
                                    <label class="card-title">Description <span class="tx-danger">*</span></label>
                                    <input  class="form-control @error('description') is-invalid @enderror"  type="text" name="description"  value="{{old('description',$role->description)}} "placeholder="Enter Role Description">
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-8 ml-5">
                                <div class="form-group">
                                    <label class="form-control @error('permissions') is-invalid @enderror" >Permissions <span class="tx-danger">*</span></label>

                                    @error('permissions')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div><!-- col-4 -->


                            @php
                                $models=['categories','brands','subcategory','product','roles','order','coupon','seo',
                                'settings','newsLetter','deal','admins','users','blogPost','blogCategory','contact'];
                            @endphp

                            @foreach($models as  $model)

                                @php

                                    $Permissions_maps=['create','read','update','delete'];
                                @endphp


                                @if($model=='settings'|| $model=='seo')
                                    @php
                                        $Permissions_maps=['update','read'];
                                    @endphp
                                @endif

                                @if($model=='order'||  $model=='contact')
                                    @php
                                        $Permissions_maps=['update','read','delete'];
                                    @endphp
                                @endif

                                @if($model=='newsLetter')
                                    @php
                                        $Permissions_maps=['read','delete'];
                                    @endphp
                                @endif

                            <div class="col-lg-4">
                                <div class="form-group" style="margin-left:60px ">

                                    <label class="form-control-label text-capitalize">{{$model}}</label>

                                    <select name="permissions[]" class="form-control select2" multiple >

                                        @foreach($Permissions_maps as $Permission_map)
                                            <option value="{{$Permission_map . '_' . $model}}"
                                                {{ $role->hasPermission($Permission_map . '_' .  $model)? 'selected' :''}}
                                            >
                                                {{$Permission_map}}</option>
                                        @endforeach

                                    </select>


                                </div>
                            </div>
                            @endforeach
                        </div><!-- col-8 -->
                    </div><!-- row -->


                    <div class="form-layout-footer">
                        <button class="btn btn-primary mg-r-5 pull-right">Update Role</button>
                    </div><!-- form-layout-footer -->

                    </form>
                </div><!-- form-layout -->
                </div>
            </div><!-- card -->



    @push('admin-js')
    @endpush

@endsection
