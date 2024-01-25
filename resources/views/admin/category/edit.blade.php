@extends('admin.layouts.master');

@section('title','Edit Category')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="container-fluid">
                        <div class="col-lg-6 offset-3">
                            <a href="{{ route('admin#homePage') }}" class="btn btn-sm btn-dark text-white fs-4 mb-2">
                                <i class="fa-solid fa-arrow-left-long"></i>
                            </a>
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Edit Your category</h3>
                                    </div>
                                    <hr>
                                    <form action="{{ route('category#update') }}" method="post" novalidate="novalidate">
                                        @csrf
                                        <div class="form-group">
                                            <input type="hidden" name="categoryId" value="{{ $category->id }}">
                                            <label class="control-label mb-1">Name</label>
                                            <input id="input-field" name="categoryName" type="text" value ="{{ old('categoryName',$category->name) }}"
                                            class="form-control @error('categoryName') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="type of bike">
                                            @error('categoryName')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div>
                                            <button id="update-btn" type="submit" class="mt-3 btn btn-success btn-block" disabled>
                                                <span id="payment-button-amount">Update</span>
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

@section('scriptSource')
    <script>
        $('document').ready(function(){
            const $inputField = $('#input-field');
            const $updateBtn = $('#update-btn');

            let $initialVal = $inputField.val();

            $inputField.on('input',function(){
                $currentVal = $inputField.val();
                if($initialVal !== $currentVal){
                    $updateBtn.prop('disabled',false);
                }
                else{
                    $updateBtn.prop('disabled',true);
                }
            });
        });
    </script>
@endsection
