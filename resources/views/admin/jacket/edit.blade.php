@extends('admin.layouts.master');

@section('title','Edit Jacket')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="container-fluid">
                        <a href="{{ route('jacket#list') }}" class="btn btn-sm btn-dark text-white fs-4 mb-2">
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
                                        <h3 class="text-center title-2">Edit Jacket</h3>
                                    </div>

                                    <hr>
                                    <form action="{{ route('jacket#update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-4 offset-4">
                                                <img src="{{ asset('storage/'.$jackets->image) }}"  class="shadow-sm"/>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="form-group mb-3">
                                                <input type="hidden" value="{{ $jackets->id }}" name="jacketId">
                                                <label class="control-label mb-1">Name</label>
                                                <input id="cc-pament" type="text" name="jacketName"
                                                class="form-control @error('jacketName') is-invalid @enderror" value="{{ old('jacketName',$jackets->name) }}" aria-required="true" aria-invalid="false" placeholder="Enter jacket name">
                                                @error('jacketName')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="control-label mb-1">Price</label>
                                                <input id="cc-pament" type="number" name="jacketPrice"
                                                class="form-control @error('jacketPrice') is-invalid @enderror" value="{{ old('jacketPrice',$jackets->price) }}" aria-required="true" aria-invalid="false" placeholder="Enter jacket price">
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
                                                class="form-control @error('jacketColor') is-invalid @enderror" value="{{ old('jacketColor',$jackets->color) }}" aria-required="true" aria-invalid="false" placeholder="Enter jacket color">
                                                @error('jacketColor')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="control-label mb-1">Type</label>
                                                <input id="cc-pament" type="text" name="jacketType"
                                                class="form-control @error('jacketType') is-invalid @enderror" value="{{ old('jacketType',$jackets->type) }}" aria-required="true" aria-invalid="false" placeholder="Enter jacket type">
                                                @error('jacketType')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="control-label mb-1">Size</label>
                                                <input id="cc-pament" type="text" name="jacketSize"
                                                class="form-control @error('jacketSize') is-invalid @enderror" value="{{ old('jacketSize',$jackets->size) }}" aria-required="true" aria-invalid="false" placeholder="Enter jacket size">
                                                @error('jacketSize')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="control-label mb-1">Description</label>
                                                <textarea name="jacketDescription" class="form-control @error('jacketDescription') is-invalid @enderror" cols="30" rows="6" placeholder="Enter description">{{ old('jacketDescription',$jackets->description) }}</textarea>
                                                @error('jacketDescription')
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
            const formElements =  document.querySelectorAll('input,textarea');
            const updateBtn = document.getElementById('update-btn');

            const initialValues = {};
            let hasChanged = false;

            formElements.forEach(function(element){
                initialValues[element.name] = element.value;
            });

            function checkUpdateVal(){
                hasChanged = false;
                formElements.forEach(function(element){
                    const currentValue = element.value;
                    const initialValue = initialValues[element.name];
                    if(currentValue !== initialValue){
                        hasChanged = true;
                    }
                    updateBtn.disabled = !hasChanged;
                });
            }

            formElements.forEach(function(element){
                element.addEventListener('input',checkUpdateVal);
                element.addEventListener('change',checkUpdateVal);
            });

            checkUpdateVal();
        });
    </script>
@endsection
