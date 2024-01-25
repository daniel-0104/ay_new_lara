@extends('user.website.layouts.master')

@section('title','Change Password - AY Japan Bikes Shop')

@section('content')
    {{-- change password start  --}}
    <div class="container-lg">
        <div class="vh-100 d-flex align-items-center justify-content-center mx-auto">
            <div class="card" id="change-pass">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Change Password</h3>
                    </div>
                    <hr>

                    @if (session('changeSuccess'))
                        <div class="col-10 offset-2">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('changeSuccess') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif

                    @if (session('notMatch'))
                        <div class="col-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i> {{ session('notMatch') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('user#changePass') }}" method="post" novalidate="novalidate">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="control-label mb-1">Old Password</label>
                            <input type="password" name="oldPassword" class="form-control @error('oldPassword') is-invalid @enderror" placeholder="Enter old password">
                            @error('oldPassword')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="control-label mb-1">New Password</label>
                            <input type="password" name="newPassword" class="form-control @error('newPassword') is-invalid @enderror" placeholder="Enter new password">
                            @error('newPassword')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="control-label mb-1">Confirm Password</label>
                            <input type="password" name="confirmPassword" class="form-control @error('confirmPassword') is-invalid @enderror" placeholder="Enter confirm password">
                            @error('confirmPassword')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="btn btn-lg w-100 btn-outline-success text-white d-block mx-auto">
                                <span>Change Password</span>
                                <i class="fa-solid fa-lock"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- change password end  --}}
@endsection
