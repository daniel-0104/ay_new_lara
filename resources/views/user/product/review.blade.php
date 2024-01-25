<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Reviews</title>
    <!-- bootstrap css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- font awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- jquery cdn  -->
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

    <!-- swiper css  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <!-- glider css  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.8/glider.min.css" integrity="sha512-YM6sLXVMZqkCspZoZeIPGXrhD9wxlxEF7MzniuvegURqrTGV2xTfqq1v9FJnczH+5OGFl5V78RgHZGaK34ylVg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css  -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<link rel="icon" href="{{ asset('image/icon/ay japan bikes shop.png') }}">
<body data-page="page2">
    <section class="bg-dark pb-5">
        @if (session('ratingSuccess'))
            <div class="col-6 offset-1 mt-3">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('ratingSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
         @endif

        <button class="btn border-0">
            <a href="{{ route('user#productList') }}" id="back-arrow">
                <i class="fa-solid fa-arrow-left-long text-white border border-1"></i>
            </a>
        </button>

        <div class="px-4 mt-3 mx-auto">
            <div>
                <h5>Customer Reviews</h5>

                @if (count($comment) != null)
                    <label for="" class="mt-2"><span id="review-count">{{ count($comment) }}</span> Reviews <i class="fa-solid fa-comment-dots ms-2 text-info"></i> </label>

                    <div id="data-wrapper">
                        @include('user.product.data')
                    </div>

                    <div class="d-flex align-items-center ">
                        <button class="btn btn-outline-secondary text-white  load-more-data"> See More ...
                            <span><i class="fa-solid fa-angle-down"></i></span>
                        </button>
                    </div>

                    <!-- Data Loader -->
                    <div class="auto-load text-center" style="display: none;">
                        <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                            <path fill="#000"
                                d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                                <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                                    from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                            </path>
                        </svg>
                    </div>
                @else
                    <label class="d-block py-2">No reviews yet</label>
                @endif

                <div id="rev-form2">
                    <hr class="mb-4 mt-5">
                    <h5>Write a review</h5>
                    <div class="container-lg bg-gradient rounded p-3 border-info">
                        <form action="{{ route('user#ratingCount') }}" id="rev-form-content" class="row">
                            @csrf
                            <div class="col-lg-6 col-md-6 mb-3">
                                <input type="hidden" value="{{ Auth::user()->id }}" name="userId">
                                <label for="" class="col-form-label fs-6">Name</label>
                                <div class="">
                                    <input type="name" name="ratingName" class="form-control @error('ratingName') is-invalid @enderror" value="{{ old('ratingName',Auth::user()->name) }}" placeholder="Enter your name">
                                    <div class="invalid-feedback">
                                        @error('ratingName')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                <label for="" class="col-form-label fs-6">Email</label>
                                <div class="">
                                    <input type="email" name="ratingEmail" class="form-control text-bg-primary @error('ratingEmail') is-invalid @enderror" value="{{ old('ratingEmail',Auth::user()->email) }}" placeholder="example@gmail.com" disabled>
                                    <div class="invalid-feedback">
                                        @error('ratingEmail')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="" class="col-form-label fs-6">Review Title</label>
                                <div class="">
                                    <input type="text" name="ratingTitle" class="form-control @error('ratingTitle') is-invalid @enderror" value="{{ old('ratingTitle') }}" placeholder="eg. Road Bike, MTB, 700 Mountain...">
                                    <div class="invalid-feedback">
                                        @error('ratingTitle')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <label for="" class="col-form-label fs-6">Rating</label>
                                <div class="star-rating  @error('star-input') is-invalid @enderror">
                                    <input class="radio-input" type="radio" id="star5" name="star-input" value="5" />
                                    <label class="radio-label" class for="star5" title="5 stars">5 stars</label>

                                    <input class="radio-input" type="radio" id="star4" name="star-input" value="4" />
                                    <label class="radio-label" for="star4" title="4 stars">4 stars</label>

                                    <input class="radio-input" type="radio" id="star3" name="star-input" value="3" />
                                    <label class="radio-label" for="star3" title="3 stars">3 stars</label>

                                    <input class="radio-input" type="radio" id="star2" name="star-input" value="2" />
                                    <label class="radio-label" for="star2" title="2 stars">2 stars</label>

                                    <input class="radio-input" type="radio" id="star1" name="star-input" value="1" />
                                    <label class="radio-label" for="star1" title="1 star">1 star</label>
                                </div>
                                <div class="invalid-feedback">
                                    @error('star-input')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="" class="d-block col-form-label fs-6">Body of Review</label>
                                <textarea name="ratingComment" id="comment" cols="40" rows="8" class="w-100 form-control @error('ratingComment') is-invalid @enderror"
                                placeholder="Write your comment here">{{ old('ratingComment') }}</textarea>
                                <div class="invalid-feedback">
                                    @error('ratingComment')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-secondary" type="submit" >
                                <a href="#" class="text-white text-decoration-none">Submit Review</a>
                            </button>
                        </form>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </section>
</body>
<!-- glider js  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.8/glider.min.js" integrity="sha512-AZURF+lGBgrV0WM7dsCFwaQEltUV5964wxMv+TSzbb6G1/Poa9sFxaCed8l8CcFRTiP7FsCgCyOm/kf1LARyxA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<!-- js  -->
<script src="{{ asset('js/script.js') }}"></script>

<!-- jquery  -->
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

<!-- bootstrap js  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>


<script>
    //customer review see more btn
    var ENDPOINT = "{{ route('user#ratingReview') }}";
    var page = 1;
    $(".load-more-data").click(function(){
        page++;
        infinteLoadMore(page);
    });
    function infinteLoadMore(page) {
        $.ajax({
                type: "get",
                url: ENDPOINT + "?page=" + page,
                datatype: "html",
                beforeSend: function () {
                    $('.auto-load').show();
                }
            })
            .done(function (response) {
                if (response.html == '') {
                    $('.auto-load').html("We don't have more data to display :(");
                    return;
                }
                $('.auto-load').hide();
                $("#data-wrapper").append(response.html);

                // Update the review count
                $("#review-count").text(response.newReviewCount);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                    alert('Something went wrong.');
                });
    }
</script>
