@extends('admin.layouts.app',['title'=>'Edit Sub Category'])

@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
            <span class="breadcrumb-item active">Edit SubCategory</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Sub Category Update</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Sub Category Update
                </h6>
                <div class="table-wrapper">
                    @if($errors->any())
                        <div class="p-3 mb-2 alter alert-danger">
                            @foreach($errors->all() as $error)
                                <p class="mb-0">{{$error}}</p>
                            @endforeach
                        </div>
                    @endif
                    <form method="post" action="{{route('admin.subCategory.update',$subCategory->id) }}">
                        @csrf
                        <div class="modal-body pd-20">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Category Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $subCategory->subcategory_name }}" name="subcategory_name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Category Name</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $row)
                                        <option value="{{ $row->id }}"
                                            {{$row->id == $subCategory->category_id ?'selected' : ''}}>
                                            {{ $row->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- modal-body -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info pd-x-20">Update</button>
                        </div>
                    </form>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div><!-- sl-mainpanel -->
    </div>
@endsection
