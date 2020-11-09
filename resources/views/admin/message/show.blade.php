@extends('admin.layouts.app',['title'=>'Message'])
@section('content')
  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

            <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
            <span class="breadcrumb-item active">Message Details</span>
        </nav>

      <div class="sl-pagebody car">

<form method="post" action="{{route('admin.message.replay')}}">
@csrf

    <input type="hidden" name="email" value="{{$message->email}}">

          <div class="card pd-20 pd-sm-40 ">
              <div class="d-flex flex-row-reverse title">{{$message->created_at->diffForHumans() }}</div>

              <div class="title">Name: {{$message->name}}</div><br>
          <div class="title">Email: {{$message->email}}</div><br>

              <div class=" title">Details: {{$message->message}}</div><br>




<hr>
              <div class="col-lg-12">
                  <div class="form-group">
                      <label class="form-control-label">Message Replay: <span class="tx-danger">*</span></label>

                      <textarea  class="form-control" id="summernote"  name="replay" >

             </textarea>

                  </div>
              </div><!-- col-4 -->






              <div class="form-layout-footer">
                  <button class="btn btn-primary mg-r-5 pull-right">Send Replay Message</button>
              </div><!-- form-layout-footer -->



          </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



</form>

      </div>
      </div>
@endsection
