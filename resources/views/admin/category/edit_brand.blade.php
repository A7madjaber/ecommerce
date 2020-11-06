@extends('admin.layouts.app',['title'=>'Edit Brand'])

@section('content')

 <div class="sl-mainpanel">

     <nav class="breadcrumb sl-breadcrumb">
         <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
         <span class="breadcrumb-item active">Edit Brand</span>
     </nav>
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Brand Update</h5>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Brand Update

          </h6>


          <div class="table-wrapper">

              @if($errors->any())
                  <div class="p-3 mb-2 alter alert-danger">
                      @foreach($errors->all() as $error)
                          <p class="mb-0">{{$error}}</p>
                      @endforeach
                  </div>
              @endif
       <form method="post" action="{{route('admin.brand.update',$brand->id) }}" enctype="multipart/form-data" >
        @csrf
         <div class="modal-body pd-20">
        <div class="form-group">
          <label for="exampleInputEmail1">Brand Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $brand->brand_name }}" name="brand_name">

        </div>


         <div class="form-group">
          <label for="exampleInputEmail1">Brand Logo</label>
          <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="" name="brand_logo">

        </div>


        <div class="form-group">
          <label for="exampleInputEmail1"> Old Brand Logo</label>
            <img  class="img-fluid img-thumbnail" src="{{asset($brand->brand_logo) }}" height="100px;" width="180px;">
        <input type="hidden" name="old_logo" value="{{ $brand->brand_logo }}">

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
