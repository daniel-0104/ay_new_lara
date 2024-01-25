@extends('admin.layouts.master');

@section('title','Account Profile')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="row">
            <div class="col-5 offset-5">
                {{-- @if (session('updateSuccess'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('updateSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif --}}
            </div>
        </div>
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="container-fluid">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Account Info</h3>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-4 offset-1 mt-4">
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
                                        <div class="col-6 offset-1">
                                            <h4 class="my-3">
                                                <i class="fa-solid fa-user me-2"></i>{{ Auth::user()->name }}
                                            </h4>
                                            <h4 class="my-3">
                                                <i class="fa-solid fa-envelope me-2"></i> {{ Auth::user()->email }}
                                            </h4>
                                            <h4 class="my-3">
                                                <i class="fa-solid fa-phone me-2"></i> {{ Auth::user()->phone }}
                                            </h4>
                                            <h4 class="my-3">
                                                <i class="fa-solid fa-venus-mars me-2"></i> {{ Auth::user()->gender }}
                                            </h4>
                                            <h4 class="my-3">
                                                <i class="fa-solid fa-address-card me-2"></i> {{ Auth::user()->address }}
                                            </h4>
                                            <h4 class="my-3">
                                                <i class="fa-solid fa-calendar-week me-2"></i> {{ Auth::user()->created_at->format('j-F-Y') }}
                                            </h4>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3 offset-1">
                                            <a href="{{ route('account#edit') }}">
                                                <button class="btn bg-dark text-white">
                                                    <i class="fa-solid fa-pen-to-square me-1"></i>Edit Profile
                                                </button>
                                            </a>
                                        </div>
                                    </div>
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
