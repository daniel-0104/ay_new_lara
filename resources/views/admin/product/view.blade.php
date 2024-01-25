@extends('admin.layouts.master');

@section('title','Product View')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        {{-- <div class="row">
            <div class="col-5 offset-5">
                @if (session('updateSuccess'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('updateSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div> --}}
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="container-fluid">
                        <div class="col-lg-12">
                            <a href="{{ route('product#list') }}" class="btn btn-sm btn-dark text-white fs-4 mb-2">
                                <i class="fa-solid fa-arrow-left-long"></i>
                            </a>
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Bike Details</h3>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-5 offset-1 mt-2">
                                            <img src="{{ asset('storage/'.$products->image) }}" class="shadow-sm"/>
                                        </div>
                                        <div class="col-6">
                                            <div class="my-2 btn bg-dark">
                                                <h3 class="text-info">{{ $products->name }}</h3>
                                            </div>
                                            <div class="my-2 btn bg-dark text-white">
                                                <i class="fa-solid fa-money-bill me-2"></i> {{ $products->price }} kyats
                                            </div>
                                            <div class="my-2 btn bg-dark text-white">
                                                <i class="fa-solid fa-eye me-2"></i> {{ $products->view_count }}
                                            </div>
                                            <div class="my-2 btn bg-dark text-white">
                                                <i class="fa-solid fa-calendar-week me-2"></i>
                                                {{ $products->updated_at->format('j-F-Y') }}
                                            </div>
                                            <div class="my-2 btn bg-dark text-white">
                                                <i class="fas fa-chart-bar me-2"></i> {{ $products->category_name }}
                                            </div>
                                            <div class="my-2 btn bg-dark text-white">
                                                <i class="fa-solid fa-arrow-trend-up me-2"></i> {{ $products->trend_name }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-11 offset-1">
                                                <div class="my-3">
                                                    <i class="fa-solid fa-file-word me-2"></i> {{ $products->description }}
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
    </div>
    <!-- END MAIN CONTENT-->
@endsection

