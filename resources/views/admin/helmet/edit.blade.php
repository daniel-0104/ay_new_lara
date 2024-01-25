@extends('admin.layouts.master');

@section('title','Edit Helmet')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="container-fluid">
                        <a href="{{ route('helmet#list') }}" class="btn btn-sm btn-dark text-white fs-4 mb-2">
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
                                        <h3 class="text-center title-2">Edit Helmet</h3>
                                    </div>

                                    <hr>
                                    <form action="{{ route('helmet#update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-4 offset-4">
                                                <img src="{{ asset('storage/'.$helmets->image) }}"  class="shadow-sm"/>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="form-group mb-3">
                                                <input type="hidden" value="{{ $helmets->id }}" name="helmetId">
                                                <label class="control-label mb-1">Name</label>
                                                <input id="cc-pament" type="text" name="helmetName"
                                                class="form-control @error('helmetName') is-invalid @enderror" value="{{ old('helmetName',$helmets->name) }}" aria-required="true" aria-invalid="false" placeholder="Enter helmet name">
                                                @error('helmetName')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="control-label mb-1">Price</label>
                                                <input id="cc-pament" type="number" name="helmetPrice"
                                                class="form-control @error('helmetPrice') is-invalid @enderror" value="{{ old('helmetPrice',$helmets->price) }}" aria-required="true" aria-invalid="false" placeholder="Enter helmet price">
                                                @error('helmetPrice')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="control-label mb-1">Type</label>
                                                <input id="cc-pament" type="text" name="helmetType"
                                                class="form-control @error('helmetType') is-invalid @enderror" value="{{ old('helmetType',$helmets->type) }}" aria-required="true" aria-invalid="false" placeholder="Enter helmet type">
                                                @error('helmetType')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="control-label mb-1">Color</label>
                                                <input id="cc-pament" type="text" name="helmetColor"
                                                class="form-control @error('helmetColor') is-invalid @enderror" value="{{ old('helmetColor',$helmets->color) }}" aria-required="true" aria-invalid="false" placeholder="Enter helmet color">
                                                @error('helmetColor')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="control-label mb-1">Description</label>
                                                <textarea name="helmetDescription" class="form-control @error('helmetDescription') is-invalid @enderror" cols="30" rows="6" placeholder="Enter description">{{ old('helmetDescription',$helmets->description) }}</textarea>
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
                                                class="form-control @error('helmetMaterial') is-invalid @enderror" value="{{ old('helmetMaterial',$helmets->material) }}" aria-required="true" aria-invalid="false" placeholder="Enter helmet material">
                                                @error('helmetMaterial')
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
