@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control form-control-user"
                                    id="exampleFirstName" placeholder="Full Name">
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif

                                {{-- <div class="col-sm-6">
                                    <input type="text" name="lname" class="form-control form-control-user"
                                        id="exampleLastName" placeholder="Last Name">
                                    @error('lname')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div> --}}
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                            placeholder="Email Address">
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" name="password" class="form-control form-control-user"
                                id="exampleInputPassword" placeholder="Password">
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="col-sm-6">
                            <input type="password" name="password_confirmation" class="form-control form-control-user"
                                id="exampleRepeatPassword" placeholder="Repeat Password">
                        </div>
                    </div>
                    <button type="submit"
                        class="btn btn-primary btn-user btn-block">{{ __('Register Account') }}</button>
                    </form>

                    <div class="text-center">
                        <a class="btn btn-link"
                            href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                    </div>
                    <div class="text-center">
                        <a class="btn btn-link" href="{{ route('login') }}">{{ __('Already have an account?') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection