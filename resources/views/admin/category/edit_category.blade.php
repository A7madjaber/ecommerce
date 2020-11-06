@extends('admin.layouts.app',['title'=>'Edit Category'])

@section('content')

 <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
         <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
         <span class="breadcrumb-item active">Edit Category</span>
     </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Category Update</h5>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Category Update

          </h6>


          <div class="table-wrapper">


              @if($errors->any())
                  <div class="p-3 mb-2 alter alert-danger">
                      @foreach($errors->all() as $error)
                          <p class="mb-0">{{$error}}</p>
                      @endforeach
                  </div>
              @endif
       <form method="post" action="{{route('admin.category.update',$category->id)}}">
        @csrf
         <div class="modal-body pd-20">
        <div class="form-group">
          <label for="exampleInputEmail1">Category Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $category->category_name }}" name="category_name">

        </div>

              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Update</button>

              </div>
                </form>


          </div><!-- table-wrapper -->
        </div><!-- card -->




    </div><!-- sl-mainpanel -->





@endsection
