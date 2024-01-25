@extends('layouts.master')

@section('title','LogIn - AY Japan Bikes Shop')

@section('content')
    <div class="container-lg">
        <div class="login-container">
            <div class="login-form">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-4">
                        <img src="{{ asset('image/icon/ay japan bikes shop.png') }}" alt="Logo" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <h5>AY japan Bikes Shop</h5>
                    </div>
                </div>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Email Address</label>
                        <input class="form-control mt-2 @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email">
                        <small class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="form-group mb-4">
                        <label>Password</label>
                        <input class="form-control mt-2 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
                        <small class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>

                    <button class="btn btn-success text-white w-100" type="submit">SIGN IN</button>

                </form>
                <div class="register-link mt-4 text-center">
                    <p>
                        Don't you have account?
                        <a href="{{ route('auth#registerPage') }}">Sign Up Here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
