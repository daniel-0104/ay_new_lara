@extends('admin.layouts.master');

@section('title','Edit Glove')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="container-fluid">
                        <a href="{{ route('glove#list') }}" class="btn btn-sm btn-dark text-white fs-4 mb-2">
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
                                        <h3 class="text-center title-2">Edit Glove</h3>
                                    </div>

                                    <hr>
                                    <form action="{{ route('glove#update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-4 offset-4">
                                                <img src="{{ asset('storage/'.$gloves->image) }}"  class="shadow-sm"/>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="form-group mb-3">
                                                <input type="hidden" name="gloveId" value="{{ $gloves->id }}">
                                                <label class="control-label mb-1">Name</label>
                                                <input id="cc-pament" type="text" name="gloveName"
                                                class="form-control @error('gloveName') is-invalid @enderror" value="{{ old('gloveName',$gloves->name) }}" aria-required="true" aria-invalid="false" placeholder="Enter glove name">
                                                @error('gloveName')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="control-label mb-1">Price</label>
                                                <input id="cc-pament" type="number" name="glovePrice"
                                                class="form-control @error('glovePrice') is-invalid @enderror" value="{{ old('glovePrice',$gloves->price) }}" aria-required="true" aria-invalid="false" placeholder="Enter glove price">
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
                                                class="form-control @error('gloveColor') is-invalid @enderror" value="{{ old('gloveColor',$gloves->color) }}" aria-required="true" aria-invalid="false" placeholder="Enter glove color">
                                                @error('gloveColor')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="control-label mb-1">Type</label>
                                                <input id="cc-pament" type="text" name="gloveType"
                                                class="form-control @error('gloveType') is-invalid @enderror" value="{{ old('gloveType',$gloves->type) }}" aria-required="true" aria-invalid="false" placeholder="Enter glove type">
                                                @error('gloveType')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="control-label mb-1">Size</label>
                                                <input id="cc-pament" type="text" name="gloveSize"
                                                class="form-control @error('gloveSize') is-invalid @enderror" value="{{ old('gloveSize',$gloves->size) }}" aria-required="true" aria-invalid="false" placeholder="Enter glove size">
                                                @error('gloveSize')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="control-label mb-1">Description</label>
                                                <textarea name="gloveDescription" class="form-control @error('gloveDescription') is-invalid @enderror" cols="30" rows="6" placeholder="Enter description">{{ old('gloveDescription',$gloves->description) }}</textarea>
                                                @error('gloveDescription')
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
            const formElements = document.querySelectorAll('input,textarea');
            const updateBtn = document.getElementById('update-btn');

            let hasChanged = false;
            const initialValues = {};
            formElements.forEach(function(element){
                initialValues[element.name] = element.value;
            });

            function checkUpdateValue(){
                hasChanged = false;
                formElements.forEach(function(element){
                    const currentValue = element.value;
                    const initialValue = initialValues[element.name];
                    if(currentValue != initialValue){
                        hasChanged = true;
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

