@extends('admin.layouts.master');

@section('title','Create Jacket')

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
                                        <h3 class="text-center title-2 py-2">Create Jacket Brand</h3>
                                    </div>
                                    <hr>
                                    <form action="{{ route('jacket#create') }}" method="post"  novalidate="novalidate" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Name</label>
                                            <input id="cc-pament" type="text" name="jacketName"
                                            class="form-control @error('jacketName') is-invalid @enderror" value="{{ old('jacketName') }}" aria-required="true" aria-invalid="false" placeholder="Enter jacket name">
                                            @error('jacketName')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Price</label>
                                            <input id="cc-pament" type="number" name="jacketPrice"
                                            class="form-control @error('jacketPrice') is-invalid @enderror" value="{{ old('jacketPrice') }}" aria-required="true" aria-invalid="false" placeholder="Enter jacket price">
                                            @error('jacketPrice')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Image</label>
                                            <input type="file" name="jacketImage" class="form-control @error('jacketImage') is-invalid @enderror">
                                            @error('jacketImage')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Color</label>
                                            <input id="cc-pament" type="text" name="jacketColor"
                                            class="form-control @error('jacketColor') is-invalid @enderror" value="{{ old('jacketColor') }}" aria-required="true" aria-invalid="false" placeholder="Enter jacket color">
                                            @error('jacketColor')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Type</label>
                                            <input id="cc-pament" type="text" name="jacketType"
                                            class="form-control @error('jacketType') is-invalid @enderror" value="{{ old('jacketType') }}" aria-required="true" aria-invalid="false" placeholder="Enter jacket type">
                                            @error('jacketType')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Size</label>
                                            <input id="cc-pament" type="text" name="jacketSize"
                                            class="form-control @error('jacketSize') is-invalid @enderror" value="{{ old('jacketSize') }}" aria-required="true" aria-invalid="false" placeholder="Enter jacket size">
                                            @error('jacketSize')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Description</label>
                                            <textarea name="jacketDescription" class="form-control @error('jacketDescription') is-invalid @enderror" cols="30" rows="6" placeholder="Enter description">{{ old('jacketDescription') }}</textarea>
                                            @error('jacketDescription')
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
