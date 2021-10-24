@extends('layouts.app')

@section('content')


<!-- Outer Row -->
<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
    <div class="container">
        <div class=" row">

            <div class="col-sm-12">

                <div class="login-card card-block auth-body">
                    <form class="md-float-material" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="text-center">
                            <img src="images/auth/logo.png" alt="logo.png">
                        </div>
                        <div class="auth-box">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-left txt-primary">Sign In</h3>
                                </div>
                            </div>
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" id="exampleInputEmail"
                                    aria-describedby="emailHelp" placeholder="Enter Email Address...">

                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                <span class="md-line"></span>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="exampleInputPassword"
                                    placeholder="Password">
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                                <span class="md-line"></span>
                            </div>

                            {{-- <div class="row m-t-25 text-left">
                                <div class="col-sm-7 col-xs-12">
                                    <div class="checkbox-fade fade-in-primary">
                                        <label>
                                            <input type="checkbox" value="">
                                            <span class="cr"><i
                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                            <span class="text-inverse">Remember me</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-5 col-xs-12 forgot-phone text-right">
                                    <a href="forgot-password.html" class="text-right f-w-600 text-inverse"> Forgot
                                        Your Password?</a>
                                </div>
                            </div> --}}
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit"
                                        class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">{{
                                        __('Login')
                                        }}</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <p class="text-inverse text-left m-b-0">Thank you and enjoy our website.</p>
                                    <p class="text-inverse text-left"><b>Your Autentification Team</b></p>
                                </div>
                                <div class="col-md-2">
                                    <img src="assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</section>


@endsection