@extends('admin.layouts.master');

@section('title','Edit Product')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="container-fluid">
                        <a href="{{ route('product#list') }}" class="btn btn-sm btn-dark text-white fs-4 mb-2">
                            <i class="fa-solid fa-arrow-left-long"></i>
                        </a>
                        @if (session('updateSuccess'))
                            <div class="row">
                                <div class="alert alert-success alert-dismissible fade show col-lg-8 offset-4" role="alert">
                                    {{ session('updateSuccess') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        @endif
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Edit Bike Product</h3>
                                    </div>

                                    <hr>
                                    <form action="{{ route('product#update') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-4 offset-4">
                                                <img src="{{ asset('storage/'.$products->image) }}"  class="shadow-sm"/>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="form-group">
                                                <input type="hidden" value="{{ $products->id }}" name="productId">
                                                <label class="control-label mb-1">Name</label>
                                                <input id="cc-pament" name="productName" type="text" value="{{ old('productName',$products->name) }}"
                                                class="form-control @error('productName') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter your product name">
                                                @error('productName')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mt-3">
                                                <label class="control-label mb-1">Category</label>
                                                <select name="productCategory" class="form-control @error('productCategory') is-invalid @enderror">
                                                    <option value="">Choose your product category ...</option>
                                                    @foreach ($categories as $c)
                                                        <option value="{{ $c->name }}" @if($products->category_name == $c->name) selected @endif >{{ $c->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('productCategory')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mt-3">
                                                <label class="control-label mb-1">Trend Product</label>
                                                <select name="productTrend" class="form-control @error('productTrend') is-invalid @enderror">
                                                    <option value="">Choose your trend ...</option>
                                                    @foreach ($trend as $t)
                                                        <option value="{{ $t->name }}" @if($products->trend_name == $t->name) selected @endif >{{ $t->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('productTrend')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mt-3">
                                                <label class="control-label mb-1">Price</label>
                                                <input id="cc-pament" name="productPrice" type="number" value="{{ old('productPrice',$products->price) }}"
                                                class="form-control @error('productPrice') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter your product price">
                                                @error('productPrice')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mt-3">
                                                <label class="control-label mb-1">Bike Image</label>
                                                <input type="file" class="form-control @error('productImage') is-invalid @enderror" name="productImage">
                                                @error('productImage')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mt-3">
                                                <label class="control-label mb-1">Description</label>
                                                <textarea name="productDescription" class="form-control @error('productDescription') is-invalid @enderror" cols="30" rows="5" placeholder="Enter your product description">{{ old('productDescription',$products->description) }}</textarea>
                                                @error('productDescription')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mt-3">
                                                <button class="btn bg-dark text-white col-12" id="update-btn" type="Submit" disabled>Update</button>
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

            const initialValues = {};
            let hasChanged = false;

            formElements.forEach(function(element){
                initialValues[element.name] = element.value;
            });

            function checkUpdateValue(){
                hasChanged = false;
                formElements.forEach(function(element){
                    const currentValue = element.value;
                    const initialValue = initialValues[element.name];
                    if(currentValue !== initialValue){
                        hasChanged = true;
                    }
                    updateBtn.disabled = !hasChanged;
                })
            }

            formElements.forEach(function(element){
                element.addEventListener('input',checkUpdateValue);
                element.addEventListener('change',checkUpdateValue);
            })

            checkUpdateValue();
        })
    </script>
@endsection
