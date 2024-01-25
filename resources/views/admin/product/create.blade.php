@extends('admin.layouts.master');

@section('title','Create Product')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3">
                                <a href="{{ route('product#list') }}" class="btn btn-dark fs-4 mb-2">
                                    <i class="fa-solid fa-arrow-left-long"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-10 ">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2 py-2">Create Bike Brand Name</h3>
                                    </div>
                                    <hr>
                                    <form action="{{ route('product#create') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-3">
                                            {{-- <input type="hidden" value="{{ $products->id }}" name="productId"> --}}
                                            <label class="control-label mb-1">Name</label>
                                            <input id="cc-pament" name="productName" type="text"
                                            class="form-control @error('productName') is-invalid @enderror" value="{{ old('productName') }}" aria-required="true" aria-invalid="false" placeholder="Enter Bike Name">
                                            @error('productName')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Category</label>
                                            <select name="productCategory" class="form-control @error('productCategory') is-invalid @enderror">
                                                <option value="">Choose your category</option>
                                                @foreach ($categories as $c)
                                                    <option value="{{ $c->name }}">{{ $c->name }}</option>
                                                @endforeach

                                            </select>
                                            @error('productCategory')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Trend Product</label>
                                            <select name="productTrend" class="form-control @error('productTrend') is-invalid @enderror">
                                                <option value="">Choose your trend</option>
                                                @foreach ($trend as $t)
                                                    <option value="{{ $t->name }}">{{ $t->name }}</option>
                                                @endforeach

                                            </select>
                                            @error('productTrend')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Description</label>
                                            <textarea name="productDescription" class="form-control @error('productDescription') is-invalid @enderror" cols="30" rows="6" placeholder="Enter description">{{ old('productDescription') }}</textarea>
                                            @error('productDescription')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Image</label>
                                            <input type="file" name="productImage" class="form-control @error('productImage') is-invalid @enderror">
                                            @error('productImage')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="control-label mb-1">Price</label>
                                            <input id="cc-pament" name="productPrice" type="number"
                                            class="form-control @error('productPrice') is-invalid @enderror" value="{{ old('productPrice') }}" aria-required="true" aria-invalid="false" placeholder="Enter product price">
                                            @error('productPrice')
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
