@extends('admin.layouts.app',['title'=>'Create Product'])
<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
            <span class="breadcrumb-item active">Create Post</span>
        </nav>
        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">New Post
                    <a href="{{route('admin.blog.post.all')}}" class="btn btn-warning btn-sm pull-right"> All Posts</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">Add New Post Form</p>
                <form method="post" action="{{route('admin.blog.post.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Post Title : <span class="tx-danger">*</span></label>
                                    <input class="form-control" required type="text" name="title"  placeholder="Enter Post Title">
                                </div>
                            </div><!-- col-6 -->


                            <div class="col-lg-6">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose Category" required name="category_id">
                                        <option label="Choose Category"></option>
                                        @foreach($categories as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Post Details : <span class="tx-danger">*</span></label>
                                    <textarea  class="form-control" id="summernote"  name="details" ></textarea>
                                </div>
                            </div><!-- col-4 -->

                        </div><!-- row -->

                        <div class="d-flex justify-content-center">
                            <div class="form-group">
                                <label class="form-control-label">Image Post: <span class="tx-danger">*</span></label>
                                <label class="custom-file">
                                    <input type="file" id="file" class="custom-file-input" name="image" onchange="readURL(this);">
                                    <span class="custom-file-control"></span>
                                </label>
                            </div>
                        </div><!-- col-4 -->

                        <div class="d-flex justify-content-center">
                            <img src="{{asset('admin/img/placeholder.png')}}"
                                 style="width:880px;height:380px" id="one" class="img-fluid img-thumbnail ml-3">
                        </div>
                        <hr>

                        <div class="form-layout-footer">
                            <button class="btn btn-primary mg-r-5 pull-right">Create Post</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </form>
            </div><!-- card -->
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>


        <script type="text/javascript">
        function readURL(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(900)
                        .height(400);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>




@endsection
