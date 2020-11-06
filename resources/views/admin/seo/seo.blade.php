@extends('admin.layouts.app',['title'=>'SEO'])

@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
            <span class="breadcrumb-item active">SEO Settings</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Seo Setting</h6><br>
                <form method="post" action="{{route('admin.seo.update',$seo->id)}}" >
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Meta Title: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="meta_title" value="{{$seo->meta_title }}"  >
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Meta Author: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="meta_author" value="{{$seo->meta_author }}"  >
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Meta Tag: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="meta_tag" value="{{$seo->meta_tag }}"  >
                                </div>
                            </div><!-- col-4 -->



                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Meta Description: <span class="tx-danger">*</span></label>
                                    <textarea class="form-control" name="meta_description">{{$seo->meta_description }}
                                    </textarea>
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Google Analytics: <span class="tx-danger">*</span></label>
                                    <textarea class="form-control" name="google_analytics">{{ $seo->google_analytics }}
                                    </textarea>
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Bing Analytics: <span class="tx-danger">*</span></label>
                                    <textarea class="form-control" name="bing_analytics">{{ $seo->bing_analytics }}
                                    </textarea>
                                    <input type="hidden" name="id" value="{{ $seo->id }}">
                                </div>
                            </div><!-- col-4 -->
                        </div><!-- row -->
                    </div><!-- end row -->


                    <div class="form-layout-footer">
                        <button class="btn btn-primary mg-r-5 pull-right">Update</button>
                    </div><!-- form-layout-footer -->
                </form>

            </div><!-- card -->
        </div><!-- card -->

    </div><!-- row -->




@endsection
