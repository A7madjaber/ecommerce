@extends('admin.layouts.app',['title'=>'Brand'])

@section('content')

 <div class="sl-mainpanel">

     <nav class="breadcrumb sl-breadcrumb">
         <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
         <span class="breadcrumb-item active">Brands</span>
     </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Brand List</h5>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Brand List
              <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">
                  <i class="fa fa-plus"></i></a>
            </h6>


          <div class="table-wrapper">
              <table id="datatable1" class=" table display responsive nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable1_info" style="width: 949px;">
                  <thead>
                <tr>
                    <th class="wd-15p sorting_asc">ID</th>
                    <th class="wd-15p sorting_asc">Brand Name</th>
                    <th class="wd-15p sorting_asc">Brand Logo</th>
                    <th class="wd-15p sorting_asc">Action</th>

                </tr>
              </thead>
              <tbody>
                @foreach($brand as $key=>$row)
                <tr>
                  <td>{{ $key +1 }}</td>
                  <td>{{ $row->brand_name }}</td>
                  <td> <img  class="img-fluid img-thumbnail" src="{{asset($row->brand_logo) }}" height="60px;" width="70px;"> </td>
                  <td>


                      <a href="{{route('admin.brand.edit',$row->id) }} "class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                      <a href="" id="delete" route="{{route('admin.brand.delete')}}" model_id="{{$row->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a>

                  </td>

                </tr>
                @endforeach

              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->




    </div><!-- sl-mainpanel -->



  <!-- LARGE MODAL -->
        <div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content "style="width:150% ">
              <div class="modal-header pd-x-20" >
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Brand Add</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

                @if($errors->any())
                    <div class="p-3 mb-2 alter alert-danger">
                        @foreach($errors->all() as $error)
                            <p class="mb-0">{{$error}}</p>
                        @endforeach
                    </div>
                @endif
       <form method="post" action="{{ route('admin.brand.store') }}" enctype="multipart/form-data" >
        @csrf
         <div class="modal-body pd-20">
        <div class="form-group">
          <label for="exampleInputEmail1">Brand Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Brand" name="brand_name">

        </div>


 <div class="form-group">
          <label for="exampleInputEmail1">Brand Logo</label>
          <input type="file" class="form-control" aria-describedby="emailHelp" placeholder="Brand Logo" name="brand_logo">

        </div>



              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary pd-x-20">Sumbit</button>
                <button type="button" class="btn btn-danger pd-x-20" data-dismiss="modal">Close</button>
              </div>
                </form>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->


</div>
@endsection
