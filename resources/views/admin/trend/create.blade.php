@extends('admin.layouts.master');

@section('title','Create Trend Product')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3 offset-2">
                                <a href="{{ route('trend#list') }}" class="btn btn-dark fs-4 mb-2">
                                    <i class="fa-solid fa-arrow-left-long"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 offset-3">

                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Create Your Trend Product</h3>
                                    </div>
                                    <hr>
                                    <form action="{{ route('trend#create') }}" method="post" novalidate="novalidate">
                                        @csrf
                                        <div class="form-group">
                                            <label class="control-label mb-1">Name</label>
                                            <input id="cc-pament" name="trendName" type="text"
                                            class="form-control @error('trendName') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="type of trend">
                                            @error('trendName')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-success mx-auto mt-3">
                                                <span id="payment-button-amount">Create</span>
                                                <i class="fa-solid fa-circle-right"></i>
                                            </button>
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
