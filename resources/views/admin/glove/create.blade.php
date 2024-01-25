@extends('admin.layouts.master');

@section('title','Create Gloves')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3">
                                <a href="" class="btn btn-dark fs-4 mb-2">
                                    <i class="fa-solid fa-arrow-left-long"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-10 ">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2 py-2">Create Gloves Brand</h3>
                                    </div>
                                    <hr>
                                    <form action="{{ route('glove#create') }}" method="post"  novalidate="novalidate" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Name</label>
                                            <input id="cc-pament" type="text" name="gloveName"
                                            class="form-control @error('gloveName') is-invalid @enderror" value="{{ old('gloveName') }}" aria-required="true" aria-invalid="false" placeholder="Enter glove name">
                                            @error('gloveName')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Price</label>
                                            <input id="cc-pament" type="number" name="glovePrice"
                                            class="form-control @error('glovePrice') is-invalid @enderror" value="{{ old('glovePrice') }}" aria-required="true" aria-invalid="false" placeholder="Enter glove price">
                                            @error('glovePrice')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Image</label>
                                            <input type="file" name="gloveImage" class="form-control @error('gloveImage') is-invalid @enderror">
                                            @error('gloveImage')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Color</label>
                                            <input id="cc-pament" type="text" name="gloveColor"
                                            class="form-control @error('gloveColor') is-invalid @enderror" value="{{ old('gloveColor') }}" aria-required="true" aria-invalid="false" placeholder="Enter glove color">
                                            @error('gloveColor')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Type</label>
                                            <input id="cc-pament" type="text" name="gloveType"
                                            class="form-control @error('gloveType') is-invalid @enderror" value="{{ old('gloveType') }}" aria-required="true" aria-invalid="false" placeholder="Enter glove type">
                                            @error('gloveType')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Size</label>
                                            <input id="cc-pament" type="text" name="gloveSize"
                                            class="form-control @error('gloveSize') is-invalid @enderror" value="{{ old('gloveSize') }}" aria-required="true" aria-invalid="false" placeholder="Enter glove size">
                                            @error('gloveSize')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Description</label>
                                            <textarea name="gloveDescription" class="form-control @error('gloveDescription') is-invalid @enderror" cols="30" rows="6" placeholder="Enter description">{{ old('gloveDescription') }}</textarea>
                                            @error('gloveDescription')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-success">
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
