@extends('layouts.master')

@section('title','Register - AY Japan Bikes Shop')

@section('content')
    <div class="container-lg" style="margin: 120px auto;">
        <div class="register-container">
            <div class="register-form">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-4">
                        <img src="{{{ asset('image/icon/ay japan bikes shop.png') }}}" alt="Logo" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <h5>AY japan Bikes Shop</h5>
                    </div>
                </div>
                <form action="{{ route('register') }}" method="post">
                    @csrf

                    @error('terms')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <div class="row">
                        <div class="col-lg-6 col-sm-6 form-group mb-3">
                            <label>Username</label>
                            <input class="form-control mt-2" value="{{ old('name') }}" type="text" name="name" placeholder="Name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-sm-6 form-group mb-3">
                            <label>Email Address</label>
                            <input class="form-control mt-2" value="{{ old('email') }}" type="email" name="email" placeholder="Email">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-sm-6 form-group mb-3">
                            <label>Phone</label>
                            <input class="form-control mt-2" value="{{ old('phone') }}" type="number" name="phone" placeholder="Phone number">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-sm-6 form-group mb-3">
                            <label>Gender</label>
                            <select name="gender" class="form-control mt-2">
                                <option value="">Choose gender...</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @error('gender')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Address</label>
                        <input class="form-control mt-2" value="{{ old('address') }}" type="text" name="address" placeholder="Address">
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Password</label>
                        <input class="form-control mt-2" type="password" name="password" placeholder="Password">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Password Confirmation</label>
                        <input class="form-control mt-2" type="password" name="password_confirmation" placeholder="Password Confirm">
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button class="btn btn-success w-100 mt-2" type="submit">REGISTER</button>

                </form>
                <div class="register-link mt-3 text-center">
                    <p>
                        Already have account?
                        <a href="{{ route('auth#loginPage') }}">Sign In</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
