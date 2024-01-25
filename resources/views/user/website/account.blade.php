@extends('user.website.layouts.master')

@section('title','Account Profile - AY Japan Bikes Shop')

@section('content')
    <!-- acc profile start  -->
    <div class="container-lg my-4">
        <div class="profile-container">
            <div class="profile-form card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Account Profile</h3>
                    </div>
                    <hr>

                    @if (session('updateSuccess'))
                        <div class="col-5 offset-7">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('updateSuccess') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('user#accountpfpUpdate',Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mx-auto align-items-center justify-content-center">
                            <div class="col-lg-5 col-sm-5 mb-4">
                                @if (Auth::user()->image == null)
                                    @if (Auth::user()->gender == 'male')
                                        <img src="{{ asset('image/profileMale.avif') }}" class="w-100"/>
                                    @else
                                        <img src="{{ asset('image/profileFemale.avif') }}" class="w-100"/>
                                    @endif
                                @else
                                    <img src="{{ asset('storage/'.Auth::user()->image) }}"  class="w-100"/>
                                @endif

                                <div class="form-group mt-3">
                                    <label class="control-label mb-1">Role</label>
                                    <input name="role" type="text" value="user"
                                    class="form-control" disabled>
                                </div>
                            </div>

                            <div class="col-lg-7 col-sm-7">
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <div class="form-group">
                                            <label class="control-label mb-1">Name</label>
                                            <input name="name" type="text"  value="{{ old('name',Auth::user()->name) }}"
                                            class="form-control @error('name') is-invalid @enderror" placeholder="Enter your name">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="form-group">
                                            <label class="control-label mb-1">Email</label>
                                            <input name="email" type="text" value="{{ old('email',Auth::user()->email) }}"
                                            class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="form-group">
                                            <label class="control-label mb-1">Phone</label>
                                            <input name="phone" type="number" value="{{ old('phone',Auth::user()->phone) }}"
                                            class="form-control @error ('phone') is-invalid @enderror" placeholder="Enter your phone number">
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="form-group">
                                            <label class="control-label mb-1">Gender</label>
                                            <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                                <option value="" disabled>Choose gender...</option>
                                                <option value="male" @if(Auth::user()->gender == 'male') selected @endif >Male</option>
                                                <option value="female" @if(Auth::user()->gender == 'female') selected @endif>Female</option>
                                            </select>
                                            @error('gender')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-2 mb-3">
                                    <label class="control-label mb-1">Profile Picture</label>
                                    <input type="file" class="form-control" name="image">
                                </div>

                                <div class="form-group" id="acc-address">
                                    <label class="control-label mb-1">Address</label>
                                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" cols="30" rows="4" placeholder="Enter your address">{{ old('address',Auth::user()->address) }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mt-4">
                                    <button class="btn bg-dark text-white col-12" id="update-btn" type="Submit" disabled>Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- acc profile end  -->
@endsection

@section('scriptSource')
    <script>
        document.addEventListener('DOMContentLoaded',function(){
            const formElements = document.querySelectorAll('input,select,textarea');
            const updateBtn = document.getElementById('update-btn');

            const initialValues = {};
            let hasChanged = false;

            formElements.forEach(function(element){
                initialValues[element.value] = element.name;
            });

            function checkUpdateValue(){
                hasChanged = false;
                formElements.forEach(function(element){
                    const currentValue = element.name;
                    const initialValue = initialValues[element.value];
                    if(currentValue !== initialValue){
                        hasChanged = true;
                        // return;
                    }
                    updateBtn.disabled = !hasChanged;
                });
            }

            formElements.forEach(function(element){
                element.addEventListener('input',checkUpdateValue);
                element.addEventListener('change',checkUpdateValue);
            });

            checkUpdateValue();
        });
    </script>
@endsection
