@extends('front.index')

@section('content')
    <hr>
    <div class="contact_form" >
        <div class="container">

            <div class="row d-flex justify-content-center ">
                <div class="col-lg-4 box-shadow" style="border: 1px solid #fafafa; padding: 20px; border-radius: 10px; width: 90%">
                    <div class="contact_form_container ">
                        <div class="title text-center "><h3 class="font-weight-light ">Register</h3></div>

                        <form action="{{ route('register') }}" id="contact_form" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Full Name</label>
                                <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your Full Name " name="name" required="">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  aria-describedby="emailHelp" placeholder="Enter Your Phone " required="">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  aria-describedby="emailHelp" placeholder="Enter Your Email " required="">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"  aria-describedby="emailHelp" name="password" required="">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror

                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Confirm Password</label>
                                <input type="password" class="form-control"  aria-describedby="emailHelp" placeholder="Re-Type Password " name="password_confirmation" required="">
                            </div>





                            <div class="contact_form_button">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>

                    </div>
                </div>





            </div>
            <br><br><br>
            <hr>
        </div>


    </div>





@endsection

