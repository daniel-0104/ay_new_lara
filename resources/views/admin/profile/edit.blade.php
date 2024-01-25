@extends('admin.layouts.master');

@section('title','Account Profile')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="container-fluid">
                        <a href="{{ route('account#profile') }}" class="text-dark fs-4 pb-2">
                            <i class="fa-solid fa-arrow-left-long"></i>
                        </a>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">

                                    @if (session('updateSuccess'))
                                        <div class="col-10 offset-2">
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session('updateSuccess') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="card-title">
                                        <h3 class="text-center title-2">Account Profile</h3>
                                    </div>

                                    <hr>
                                    <form action="{{ route('account#update',Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-4 offset-4">
                                                @if (Auth::user()->image == null)
                                                    @if (Auth::user()->gender == 'male')
                                                        <img src="{{ asset('admin/image/profileMale.avif') }}" class="shadow-sm">
                                                    @else
                                                        <img src="{{ asset('admin/image/profileFemale.avif') }}" class="shadow-sm">
                                                    @endif
                                                @else
                                                    <img src="{{ asset('storage/'.Auth::user()->image) }}" class="shadow-sm">
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="form-group mb-3">
                                                <label class="control-label mb-1">Name</label>
                                                <input name="name" type="text" value="{{ old('name',Auth::user()->name) }}"
                                                class="form-control @error('name') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter your name">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="control-label mb-1">Email</label>
                                                <input name="email" type="email" value="{{ old('email',Auth::user()->email) }}"
                                                class="form-control @error('email') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter your email">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="control-label mb-1">Phone</label>
                                                <input name="phone" type="number" value="{{ old('phone',Auth::user()->phone) }}"
                                                class="form-control @error('phone') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter your phone number">
                                                @error('phone')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="control-label mb-1">Gender</label>
                                                <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                                    <option value="">Choose gender...</option>
                                                    <option value="male" @if(Auth::user()->gender == 'male') selected @endif>Male</option>
                                                    <option value="female" @if(Auth::user()->gender == 'female') selected @endif>Female</option>
                                                </select>
                                                @error('gender')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="control-label mb-1">Address</label>
                                                <textarea name="address" class="form-control @error('address') is-invalid @enderror" cols="30" rows="5" placeholder="Enter your address">{{ old('address',Auth::user()->address) }}</textarea>
                                                @error('address')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mt-3 mb-3">
                                                <label class="control-label mb-1">Profile Image</label>
                                                <input type="file" class="form-control" name="image">
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="control-label mb-1">Role</label>
                                                <input id="cc-pament" name="role" type="text" value="{{ old('role',Auth::user()->role) }}"
                                                class="form-control" aria-required="true" aria-invalid="false" disabled>
                                            </div>

                                            <div class="mt-3">
                                                <button id="update-btn" class="btn bg-dark text-white col-12" type="Submit" disabled>Update</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection

@section('scriptSource')
    <script>
        document.addEventListener('DOMContentLoaded',function(){
            const formElements = document.querySelectorAll('input,select,textarea');
            const updateBtn = document.getElementById('update-btn');

            const initialValues  = {};
            let haschanged = false;

            formElements.forEach(function(element){
                initialValues[element.name] = element.value;
            });

            function checkUpdateValue(){
                haschanged = false;
                formElements.forEach(function(element){
                    const currentValue = element.value;
                    const initialValue = initialValues[element.name];
                    if(currentValue !== initialValue){
                        haschanged = true;
                        return;
                    }
                });
                updateBtn.disabled = !haschanged;
            }

            formElements.forEach(function(element){
                element.addEventListener('input',checkUpdateValue);
                element.addEventListener('change',checkUpdateValue);
            });

            checkUpdateValue();
        });
    </script>
@endsection

