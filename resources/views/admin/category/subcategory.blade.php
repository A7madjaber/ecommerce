@extends('admin.layouts.app',['title'=>'sub-category'])

@section('content')

 <div class="sl-mainpanel">

     <nav class="breadcrumb sl-breadcrumb">
         <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
         <span class="breadcrumb-item active">Sub Categories</span>
     </nav>
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Sub Category Table</h5>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Sub Category List

              @if(auth()->user()->hasPermission('create_subcategory'))

              <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">
                  <i class="fa fa-plus"></i></a>

                  @else

                  <a href="#" class="disabled btn btn-sm btn-warning" style="float: right;">
                      <i class="fa fa-plus"></i></a>


              @endif
          </h6>


          <div class="table-wrapper">
              <table id="datatable1" class=" table display responsive nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable1_info" style="width: 949px;">
                  <thead>
                <tr>
                    <th class="wd-15p sorting_asc">ID</th>
                    <th class="wd-15p sorting_asc">Sub Category name</th>
                    <th class="wd-15p sorting_asc">Category name</th>
                    <th class="wd-15p sorting_asc">Action</th>

                </tr>
              </thead>
              <tbody>
                @foreach($subCategory as $key=>$row)
                <tr>
                  <td>{{ $key +1 }}</td>
                  <td>{{ $row->subcategory_name }}</td>
                   <td>{{ $row->category->category_name}}</td>


                    <td>
                        @if(auth()->user()->hasPermission('update_subcategory'))
                      <a href="{{route('admin.subCategory.edit',$row->id)}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                        @else
                            <a href="#" class="disabled btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                        @endif

                            @if(auth()->user()->hasPermission('delete_subcategory'))

                            <a href="" id="delete" route="{{route('admin.subCategory.delete')}}" model_id="{{$row->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a>
                            @else
                                <a href="" id="delete"class="disabled btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a>
                            @endif

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
              <div class="modal-content"style="width:200%">
                  <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Sub Category Add</h6>
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

                  <form method="post" action="{{route('admin.subCategory.store')}}">
                      @csrf
                      <div class="modal-body pd-20">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Sub Category Name</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sub Category" name="subcategory_name">
                          </div>



        <div class="form-group">
          <label for="exampleInputEmail1">Category Name</label>
           <select class="form-control" name="category_id">
          @foreach($categories as $row)
          <option value="{{ $row->id }}"> {{ $row->category_name }}  </option>
          @endforeach
           </select>
        </div>


              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary pd-x-20">Create</button>
                <button type="button" class=" btn btn-danger pd-x-20" data-dismiss="modal">Close</button>
              </div>
                </form>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->



@endsection
