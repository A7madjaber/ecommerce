@extends('admin.layouts.app',['title'=>'Blog-Posts'])

@section('content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
            <span class="breadcrumb-item active">Blog Posts</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Posts Table</h5>

            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Posts List

                    @if(auth()->user()->hasPermission('create_blogPost'))
                        <a href="{{route('admin.blog.post.create')}}" class="btn btn-sm btn-warning" style="float: right;" >
                            <i class="fa fa-plus"></i> </a>
                        @else
                        <a href="#" class="disabled btn btn-sm btn-warning" style="float: right;" >
                            <i class="fa fa-plus"></i> </a>
                    @endif
                </h6>


                <div class="table-wrapper">
                    <table id="datatable1" class=" table display responsive nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable1_info" style="width: 949px;">
                        <thead>
                        <tr>
                            <th class="wd-15p sorting_asc">ID</th>
                            <th class="wd-15p sorting_asc">Title</th>
                            <th class="wd-15p sorting_asc">Category</th>
                            <th class="wd-15p sorting_asc">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $key=>$row)
                            <tr>
                                <td>{{ $key +1 }}</td>
                                <td>{{ str_limit($row->title,20) }}</td>
                                <td>{{ $row->category->name }}</td>


                                <td>
                                    @if(auth()->user()->hasPermission('update_blogPost'))
                                        <a href="{{route('admin.blog.post.edit',$row->id) }} "class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                    @else
                                        <a href="#"class="disabled btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                    @endif
                                        @if(auth()->user()->hasPermission('delete_blogPost'))
                                            <a href="" id="delete" route="{{route('admin.blog.post.delete')}}" model_id="{{$row->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a>

                                        @else
                                            <a href="#" class="disabled btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a>

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

        <div id="modaldemo3" class="modal fade" >

            <div class="modal-dialog modal-lg col-12" role="document">
                <div class="modal-content"style="width:200%">
                    <div class="modal-header pd-x-20">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"> Category Add</h6>
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


                    <div class="modal-body">
                        <form method="post" action="{{ route('admin.blog.category.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name English</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Category" name="name_en">
                            </div><!-- modal-body -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name Arabic</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Category" name="name_ar">
                            </div><!-- modal-body -->

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary pd-x-20"> Submit</button>
                                <button type="button" class="btn btn-danger pd-x-20" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->
    </div>

@endsection
