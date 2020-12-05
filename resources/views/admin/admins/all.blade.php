@extends('admin.layouts.app',['title'=>'Admins'])

@section('content')

 <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
         <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
         <span class="breadcrumb-item active">Admins</span>
     </nav>


      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Admins Table</h5>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Admins List
              @if(auth()->user()->hasPermission('create_admins'))

              <a href="{{route('admin.admin.create')}}" class="btn btn-sm btn-warning" style="float: right;">
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
                    <th class="wd-5p sorting_asc">ID</th>
                    <th class="wd-15p sorting_asc">Name</th>
                    <th class="wd-15p sorting_asc">Email</th>
                    <th class="wd-15p sorting_asc">Roles</th>
                    <th class="wd-15p sorting_asc">Action</th>

                </tr>
              </thead>
              <tbody>
                @foreach($admins as $key=>$row)
                <tr>
                  <td>{{ $key +1 }}</td>
                  <td>{{ $row->name }}</td>

                    <td>{{$row->email }}</td>

                    <td>
                        @foreach($row->roles as $role)
                            <span class="badge badge-primary">{{$role->name}}</span>
                        @endforeach
                    </td>

                    <td>
                        @if(auth()->user()->hasPermission('update_admins'))

                            <a  class="btn btn-warning btn-sm" href="{{route('admin.admin.edit',$row->id)}}"><i class="fa fa-edit"></i></a>

                        @else
                            <a class="disabled btn btn-warning btn-sm" href="#" ><i class="fa fa-edit"></i></a>

                        @endif


                            @if(auth()->user()->hasPermission('delete_admins'))

                                <a href="" id="delete" route="{{route('admin.admin.delete')}}" model_id="{{$row->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a>
                            @else
                                <button disabled  type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>

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


 </div>

@endsection
