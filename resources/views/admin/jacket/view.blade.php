@extends('admin.layouts.master');

@section('title','Jacket View')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="container-fluid">
                        <div class="col-lg-12">
                            <a href="{{ route('jacket#list') }}" class="btn btn-sm btn-dark text-white fs-4 mb-2">
                                <i class="fa-solid fa-arrow-left-long"></i>
                            </a>
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Jacket Details</h3>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-5 offset-1 mt-2">
                                            <img src="{{ asset('storage/'.$jackets->image) }}" class="shadow-sm"/>
                                        </div>
                                        <div class="col-6">
                                            <div class="my-2 btn bg-dark">
                                                <h3 class="text-info">{{ $jackets->name }}</h3>
                                            </div>
                                            <div class="my-2 btn bg-dark text-white">
                                                <i class="fa-solid fa-money-bill me-1"></i> {{ $jackets->price }} Kyats
                                            </div>
                                            <div class="my-2 btn bg-dark text-white">
                                                <i class="fa-solid fa-eye me-1"></i> {{ $jackets->view_count }}
                                            </div>
                                            <div class="my-2 btn bg-dark text-white">
                                                <i class="fa-solid fa-palette me-1"></i> {{ $jackets->color }}
                                            </div>
                                            <div class="my-2 btn bg-dark text-white">
                                                <i class="fa-solid fa-ruler me-1"></i> {{ $jackets->size }}
                                            </div>
                                            <div class="my-2 btn bg-dark text-white">
                                                <i class="fa-solid fa-bicycle me-1"></i> {{ $jackets->type }}
                                            </div>
                                            <div class="my-2 btn bg-dark text-white">
                                                <i class="fa-solid fa-calendar-week me-2"></i>
                                                {{ $jackets->updated_at->format('j.F.Y') }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-11 offset-1">
                                                <div class="my-3">
                                                    <i class="fa-solid fa-file-word me-2"></i> {{ $jackets->description }}
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

