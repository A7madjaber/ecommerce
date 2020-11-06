@extends('admin.layouts.app',['title'=>'Edit Coupon'])

@section('content')

 <div class="sl-mainpanel">

     <nav class="breadcrumb sl-breadcrumb">
         <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
         <span class="breadcrumb-item active">Edit Coupon</span>
     </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Coupon Update</h5>

        </div><!-- sl-page-title -->

          <div class="card pd-20 pd-sm-40">
              <h6 class="card-body-title">Coupon Update</h6>
              <div class="table-wrapper">
                  @if($errors->any())
                      <div class="p-3 mb-2 alter alert-danger">
                          @foreach($errors->all() as $error)
                              <p class="mb-0">{{$error}}</p>
                          @endforeach
                      </div>
                  @endif
                  <form method="post" action="{{route('admin.coupon.update',$coupon->id)}}">
                      @csrf
                      <div class="modal-body pd-20">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Coupon Code</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $coupon->coupon }}" name="coupon">
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Discount percentage</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $coupon->discount}}"name="discount">
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
