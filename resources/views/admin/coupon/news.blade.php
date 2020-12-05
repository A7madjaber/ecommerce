@extends('admin.layouts.app',['title'=>'Subscriber News'])

@section('content')

    <div class="sl-mainpanel">

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
            <span class="breadcrumb-item active">Newsletter </span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Subscribers List</h5>

            </div><!-- sl-page-title -->

            <form method="post" action="{{route('admin.coupon.delete.newsletters.all')}}">

                @csrf
                @method('DELETE')

                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">
                        @if(auth()->user()->hasPermission('delete_newsLetter'))
                            <button type="submit" class="btn btn-sm btn-danger" title="delete All Selected" data-toggle="modal" data-target="#modaldemo3">
                                <i class="fa fa-trash"></i></button>
                        @else
                            <button  disabled type="submit" class="btn btn-sm btn-danger" title="delete All Selected">
                                <i class="fa fa-trash"></i></button>
                        @endif
                    </h6>
                <div class="table-wrapper">
                    <table id="datatable1" class=" table display responsive nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable1_info" style="width: 949px;">
                        <thead>
                        <tr>
                            <th class="wd-15p sorting_asc">ID</th>
                            <th class="wd-15p sorting_asc">Email</th>
                            <th class="wd-15p sorting_asc">Subscribing Time</th>
                            <th class="wd-15p sorting_asc">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sub as $key=>$row)
                            <tr>
                                <td> <input type="checkbox" name="ids[]" value="{{$row->id}}">{{ $key +1 }}</td>
                                <td>{{ $row->email}}</td>
                                <td>{{ $row->created_at->diffForHumans()}}</td>
                                <td>
                                    @if(auth()->user()->hasPermission('delete_newsLetter'))
                                        <a href="" id="delete" route="{{route('admin.coupon.delete.newsletters')}}" model_id="{{$row->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a>
                                    @else
                                        <a href=""  class="disabled btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
            </form>
        </div><!-- sl-mainpanel -->
    </div>

@endsection
