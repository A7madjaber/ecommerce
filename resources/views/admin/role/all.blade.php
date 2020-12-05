@extends('admin.layouts.app',['title'=>'Roles'])

@section('content')

 <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
         <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
         <span class="breadcrumb-item active">Roles</span>
     </nav>


      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Roles Table</h5>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Roles List
              @if(auth()->user()->hasPermission('create_roles'))

              <a href="{{route('admin.role.create')}}" class="btn btn-sm btn-warning" style="float: right;">
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
                    <th class="wd-15p sorting_asc">Description</th>
                    <th class="wd-15p sorting_asc">Some Of Permissions</th>
                    <th class="wd-15p sorting_asc">Action</th>

                </tr>
              </thead>
              <tbody>
                @foreach($roles as $key=>$row)
                <tr>
                  <td>{{ $key +1 }}</td>
                  <td>{{ $row->name }}</td>

                    <td>{{$row->description }}</td>

                    <td>
                        @foreach($row->permissions->take(5) as $permission)
                            <span class="badge badge-primary">{{$permission->name}}</span>
                        @endforeach
                    </td>

                    <td>
                        @if(auth()->user()->hasPermission('update_roles'))
                    <a href="{{route('admin.role.edit',$row->id) }} "class="btn btn-sm btn-info">
                        <i class="fa fa-edit"></i></a>
                        @else
                            <a href="#"class="disabled btn btn-sm btn-info">
                                <i class="fa fa-edit"></i></a>
                            @endif
                        @if(auth()->user()->hasPermission('delete_roles'))
                                <a href="" id="delete" route="{{route('admin.role.delete')}}" model_id="{{$row->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a>
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


 </div>

@endsection
