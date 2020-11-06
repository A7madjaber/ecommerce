@extends('front.index')
@section('content')

    @include('front.layouts.mnu')

    <hr>


                <div class="contact_form">
                    <div class="container">

            <div class="row d-flex justify-content-center ml-5 ">
                <div class="col-lg-4 box-shadow" style="border: 1px solid #fafafa; padding: 20px; border-radius: 10px; width: 90%">
                    <div class="contact_form_container ">
                        <div class="title text-center "><h3 class="font-weight-light ">Login</h3></div>

                        <form action="{{ route('login') }}" id="contact_form" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email or Phone</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  aria-describedby="emailHelp"  required="">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                @enderror
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


                            <div class="contact_form_button">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                        <br>
                        <a href="{{ route('password.request') }}">I forgot my password</a>   <br> <br>

                        <button type="submit" class="btn btn-primary btn-block"><i class="fab fa-facebook-square"></i> Login with Facebook </button>

                        <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger btn-block"><i class="fab fa-google"></i> Login with Google </a>

                    </div>

                </div>
            </div>


                        <br><br><br>

                        <hr>
 </div>

            </div>



@endsection

