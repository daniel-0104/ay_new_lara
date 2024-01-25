@extends('admin.layouts.master');

@section('title','Create Helmet')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3">
                                <a href="{{ route('helmet#list') }}" class="btn btn-dark fs-4 mb-2">
                                    <i class="fa-solid fa-arrow-left-long"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-10 ">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2 py-2">Create Helmet Brand</h3>
                                    </div>
                                    <hr>
                                    <form action="{{ route('helmet#create') }}" method="post"  novalidate="novalidate" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Name</label>
                                            <input id="cc-pament" type="text" name="helmetName"
                                            class="form-control @error('helmetName') is-invalid @enderror" value="{{ old('helmetName') }}" aria-required="true" aria-invalid="false" placeholder="Enter helmet name">
                                            @error('helmetName')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Price</label>
                                            <input id="cc-pament" type="number" name="helmetPrice"
                                            class="form-control @error('helmetPrice') is-invalid @enderror" value="{{ old('helmetPrice') }}" aria-required="true" aria-invalid="false" placeholder="Enter helmet price">
                                            @error('helmetPrice')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Type</label>
                                            <input id="cc-pament" type="text" name="helmetType"
                                            class="form-control @error('helmetType') is-invalid @enderror" value="{{ old('helmetType') }}" aria-required="true" aria-invalid="false" placeholder="Enter helmet type">
                                            @error('helmetType')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Color</label>
                                            <input id="cc-pament" type="text" name="helmetColor"
                                            class="form-control @error('helmetColor') is-invalid @enderror" value="{{ old('helmetColor') }}" aria-required="true" aria-invalid="false" placeholder="Enter helmet color">
                                            @error('helmetColor')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Description</label>
                                            <textarea name="helmetDescription" class="form-control @error('helmetDescription') is-invalid @enderror" cols="30" rows="6" placeholder="Enter description">{{ old('helmetDescription') }}</textarea>
                                            @error('helmetDescription')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Image</label>
                                            <input type="file" name="helmetImage" class="form-control @error('helmetImage') is-invalid @enderror">
                                            @error('helmetImage')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Material</label>
                                            <input id="cc-pament" type="text" name="helmetMaterial"
                                            class="form-control @error('helmetMaterial') is-invalid @enderror" value="{{ old('helmetMaterial') }}" aria-required="true" aria-invalid="false" placeholder="Enter helmet material">
                                            @error('helmetMaterial')
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
