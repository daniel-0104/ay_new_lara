<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products View - AY Japan Bikes Shop</title>

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

    <!-- nav bar start-->
    <nav class="navbar navbar-expand-lg sticky-top shadow-sm" id="nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" id="logo">
                <img src="{{ asset('image/icon/ay japan bikes shop.png') }}" class="w-100 d-block">
            </a>
            <label for="" id="ay-label">AY JAPAN BIKES SHOP.</label>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="text-white"><i class="fa-solid fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto" id="nav-unorder">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('user#homePage') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user#productList') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user#aboutPage') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user#contactPage') }}">Contact</a>
                    </li>
                </ul>
                <div class="nav-item d-flex">
                    <div class="dropdown d-inline me-4">
                        <a href="" class="ml-3 text-white btn border border-1 dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="dropdown">
                            <i class="fa-solid fa-user me-2"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item my-2" href="{{ route('user#accountpfp') }}">
                                    <i class="fa-solid fa-user me-2"></i>Account
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item my-2" href="{{ route('user#changePassPage') }}">
                                    <i class="fa-solid fa-lock me-2"></i>Change Password
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" id="btn-disabled">
                                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button class="btn bg-dark text-white w-100" type="submit">
                                            <i class="fa-solid fa-right-from-bracket"></i>Logout
                                        </button>
                                    </form>
                                </a>
                          </li>
                        </ul>
                    </div>
                    <div class="nav-item me-3">
                        <a href="{{ route('cart#list') }}" title="cart" type="button" class="btn btn-outline-light position-relative" id="dropdown">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                               {{ count($carts->where('user_id', Auth::user()->id)) }}
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </a>
                    </div>
                    <div class="nav-item me-2">
                        <a href="{{ route('user#productHistory') }}" title="history" type="button" class="btn btn-outline-light position-relative" id="dropdown">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                                {{ count($orders->where('user_name', Auth::user()->name)) }}
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- nav bar end  -->

    <!-- product view start  -->
    <section class="container-lg" id="product-view">
        <a href="javascript:history.back()" id="back-arrow">
            <i class="fa-solid fa-arrow-left-long"></i>
        </a>

        {{-- @if (session('ratingSuccess'))
            <div class="col-6 offset-6 mt-3">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('ratingSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif --}}

        <div class="container-lg mt-0">
            <form action="">
                <div class="row align-items-center justify-content-center mx-auto pb-4">
                    <div class="col-lg-5 col-md-5">
                        <img src="{{ asset('storage/'.$gloves->image) }}" class="w-100 d-block">
                    </div>
                    <div class="col-lg-7 col-md-7 mt-3">
                    <h3>{{ $gloves->name }}</h3>
                    <hr>
                    <div id="product-details">
                        <div class="mb-2">
                            <label for="">Type : <span>{{ $gloves->type }}</span></label>
                            <label for="">Color : <span>{{ $gloves->color }}</span></label>
                            <label for="">Price : <span>{{ $gloves->price }} Kyats </span></label>
                            <label>Size : <span> {{ $gloves->size }} </span></label>
                            <label for="">Viewers : <span> {{ $gloves->view_count }} </span></label>
                        </div>
                        <p style="font-family: calibri;">{{ $gloves->description }}</p>
                    </div>
                        <div class="mb-4 pt-2" id="order-count-btn" >
                            <div class="input-group quantity me-3" style="width: 130px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-minus">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control bg-body-tertiary border-0 text-center" id="orderCount" value="1">
                                <input type="hidden" value="{{ Auth::user()->id }}" id="userId">
                                <input type="hidden" value="{{ $gloves->name }}" id="gloveName">
                                <div class="input-group-btn">
                                    <button class="btn btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <button type="button" class="btn px-3" id="addCartBtn"><i class="fa fa-shopping-cart me-1"></i> Add To Cart</button>
                        </div>
                        <div class="d-flex mb-2 fs-6">
                            <strong class="text-dark me-2">Share on:</strong>
                            <div class="d-inline-flex">
                                <a class="text-dark px-2" href="javascript:void(0)">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="text-dark px-2" href="javascript:void(0)">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a class="text-dark px-2" href="javascript:void(0)">
                                    <i class="fa-brands fa-square-instagram"></i>
                                </a>
                                <a class="text-dark px-2" href="javascript:void(0)">
                                    <i class="fab fa-pinterest"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- product view end  -->

    {{-- product review start  --}}
    <div class="px-4 mx-auto bg-dark py-5">
        <div>
            <h5>Customer Reviews</h5>

            @if (count($comment) != null)
                <label for="" class="mt-3"><span id="review-count">{{ count($comment) }}</span> Reviews <i class="fa-solid fa-comment-dots ms-2 text-info"></i> </label>

                <div id="data-wrapper">
                    @include('user.product.data')
                </div>

                <div class="d-flex align-items-center ">
                    <button class="btn btn-outline-secondary text-white load-more-data"> See More ...
                        <span><i class="fa-solid fa-angle-down"></i></span>
                    </button>
                </div>

                <!-- Data Loader -->
                <div class="auto-load text-center mb-5" style="display: none;">
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

            <div id="rev-dropdown">
                <div id="rev-toggle" class="mt-3 mb-3 d-flex align-items-center border border-1 w-50 py-2 justify-content-center">
                    <a href="javascript:void(0)" class="me-2" id="rev-btn">Write a review</a>
                    <span>
                        <i class="fa-solid fa-chevron-down" id="rev-down"></i>
                        <i class="fa-solid fa-angle-up up" id="rev-up"></i>
                    </span>
                </div>
                <div id="rev-form">
                    <hr>
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
                                    <input type="text" name="ratingTitle" class="form-control @error('ratingTitle') is-invalid @enderror" value="{{ old('ratingTitle') }}" placeholder="eg. helmet, jacket , glove ...">
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
                            <button class="btn btn-secondary" type="submit">
                                <a href="" class="text-white text-decoration-none">Submit Review</a>
                            </button>
                        </form>
                </div>
                <hr>
                </div>
            </div>
        </div>
    </div>
    {{-- product review end  --}}

    <!-- related product start  -->
    <section id="related-product" class="my-5 px-5">
        <div class="d-block mx-auto text-center fw-bold" style="letter-spacing: 2px;">
            <h2>Related Product</h2>
        </div>
        <div class="swiper mySwiper" id="mySwiper">
            <div class="swiper-wrapper">
                    @foreach ($gloveList as $g)
                    <div class="swiper-slide">
                        <input type="hidden" class="userId" value="{{ Auth::user()->id }}">
                        <input type="hidden" class="productName" value="{{ $g->name }}">
                        <input type="hidden" class="orderCount" value="1">
                        <div id="product-img-content">
                            <img src="{{ asset('storage/'.$g->image) }}" class="w-100 d-block" style="height: 290px;">
                            <div id="product-img-link">
                                <a href="{{ route('user#gloveView',$g->id) }}" id="eye"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('cart#list') }}" id="shop" class="btn cartBtn"><i class="fa-solid fa-cart-shopping"></i></a>
                            </div>
                        </div>
                        <div id="product-name" class="product-name mt-2 border px-1 py-2 text-center">
                            <h5>{{ $g->name }}</h5>
                            <div id="pro-label">
                                <label for="">{{ $g->type }}</label>
                                <span style=" color: #a2b2ee;"> {{ $g->price }} Kyats </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
            <div id="swiper-pagination" class="d-block mx-auto text-center mt-2"></div>
          </div>
    </section>
    <!-- related product end  -->

    <!-- footer start  -->
        <section id="footer">
            <div class="px-5">
                <div class="row">
                    <div class="col-lg-3 col-sm-12 mb-5 footer-content1">
                        <h4>News Letter</h4>
                        <h5>Get the latest deals</h5>
                        <p>And receive 20% off coupon for first shopp</p>
                        <div class="input-group mt-4">
                            <input type="text" class="form-control" placeholder="Email Address" aria-describedby="button-addon2">
                            <button class="btn btn-dark" type="button" id="button-addon2">
                                <i class="fa-solid fa-paper-plane"></i>
                            </button>
                        </div>
                        <div class="d-flex" id="footer-icon">
                            <a href="javascript:void(0)"><i class="fa-brands fa-youtube"></i></a>
                            <a href="javascript:void(0)"><i class="fa-brands fa-pinterest"></i></a>
                            <a href="javascript:void(0)"><i class="fa-brands fa-instagram"></i></a>
                            <a href="javascript:void(0)"><i class="fa-brands fa-facebook"></i></a>
                            <a href="javascript:void(0)"><i class="fa-brands fa-twitter"></i></a>
                        </div>
                    </div>
                    <hr id="line-break">
                    <div class="offset-lg-1 col-lg-2 col-md-4 mb-4 footer-content2">
                        <div id="footer-simple">
                            <h4>Services</h4>
                            <ul>
                                <li><a href="javascript:void(0)">About Us</a></li>
                                <li><a href="javascript:void(0)">FAQ's</a></li>
                                <li><a href="javascript:void(0)">Contact Us</a></li>
                                <li><a href="javascript:void(0)">News</a></li>
                                <li><a href="javascript:void(0)">Blog</a></li>
                            </ul>
                        </div>
                        <div id="footer-dropdown">
                            <div id="toggle-btn">
                                <button class="btn w-100 text-start fs-5">Services</button>
                                <span>
                                    <i class="fa-solid fa-chevron-down" id="down"></i>
                                    <i class="fa-solid fa-angle-up up" id="up"></i>
                                </span>
                            </div>
                            <ul id="drop-items">
                                <li><a href="javascript:void(0)">About Us</a></li>
                                <li><a href="javascript:void(0)">FAQ's</a></li>
                                <li><a href="javascript:void(0)">Contact Us</a></li>
                                <li><a href="javascript:void(0)">News</a></li>
                                <li><a href="javascript:void(0)">Blog</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mb-4 footer-content2">
                        <div id="footer-simple">
                            <h4>Privacy & Terms</h4>
                            <ul>
                                <li><a href="javascript:void(0)">Payment Policy</a></li>
                                <li><a href="javascript:void(0)">Privacy Policy</a></li>
                                <li><a href="javascript:void(0)">Return Policy</a></li>
                                <li><a href="javascript:void(0)">Shipping Policy</a></li>
                                <li><a href="javascript:void(0)">Terms & Conditions</a></li>
                            </ul>
                        </div>
                        <div id="footer-dropdown">
                            <div id="toggle-btn2">
                                <button class="btn w-100 text-start fs-5">Privacy & Terms</button>
                                <span>
                                    <i class="fa-solid fa-chevron-down" id="down2"></i>
                                    <i class="fa-solid fa-angle-up up" id="up2"></i>
                                </span>
                            </div>
                            <ul id="drop-items2">
                                <li><a href="javascript:void(0)">Payment Policy</a></li>
                                <li><a href="javascript:void(0)">Privacy Policy</a></li>
                                <li><a href="javascript:void(0)">Return Policy</a></li>
                                <li><a href="javascript:void(0)">Shipping Policy</a></li>
                                <li><a href="javascript:void(0)">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mb-4 footer-content2 ">
                        <div id="footer-simple">
                            <h4>My Account</h4>
                            <ul>
                                <li><a href="javascript:void(0)">My Account</a></li>
                                <li><a href="javascript:void(0)">My Cart</a></li>
                                <li><a href="javascript:void(0)">Order History</a></li>
                                <li><a href="javascript:void(0)">My Wishlist</a></li>
                                <li><a href="javascript:void(0)">My Address</a></li>
                            </ul>
                        </div>
                        <div id="footer-dropdown">
                            <div id="toggle-btn3">
                                <button class="btn w-100 text-start fs-5">My Account</button>
                                <span>
                                    <i class="fa-solid fa-chevron-down" id="down3"></i>
                                    <i class="fa-solid fa-angle-up up" id="up3"></i>
                                </span>
                            </div>
                            <ul id="drop-items3">
                                <li><a href="javascript:void(0)">My Account</a></li>
                                <li><a href="javascript:void(0)">My Cart</a></li>
                                <li><a href="javascript:void(0)">Order History</a></li>
                                <li><a href="javascript:void(0)">my Wishlist</a></li>
                                <li><a href="javascript:void(0)">My Address</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <div id="copyright">
                    <p>Copyright <i class="fa-regular fa-copyright"></i> 2022 webtemplate rights reserved</p>
                    <div id="credit-card">
                        <img src="{{ asset('image/70599_visa_curved_icon.png') }}" title="Visa">
                        <img src="{{ asset('image/paypal.png') }}" title="Paypal">
                        <img src="{{ asset('image/70593_mastercard_curved_icon.png') }}" title="Mastercard">
                        <img src="{{ asset('image/70595_solo_curved_icon.png') }}" title="Solo">
                    </div>
                </div>
            </div>
        </section>
    <!-- footer end  -->

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
    $(document).ready(function(){
        $('.btn-minus').click(function(event){
            event.preventDefault();
            $currentValue = parseInt($('#orderCount').val());
            if($currentValue > 1){
                $('#orderCount').val($currentValue - 1);
            }
        });
        $('.btn-plus').click(function(event){
            event.preventDefault();
            $currentValue = parseInt($('#orderCount').val());
            $('#orderCount').val($currentValue + 1);
        });
        $('#addCartBtn').click(function(){
            $source = {
                'userId' : $('#userId').val(),
                'productName' : $('#gloveName').val(),
                'count' : $('#orderCount').val()
            };
            $.ajax({
                type : 'get',
                url : 'http://127.0.0.1:8000/user/ajax/cart',
                data : $source,
                dataType : 'json',
                success : function(response){
                    if(response.status == 'Success'){
                        window.location.reload();
                        alert('Successfully added to the cart');
                    }
                }
            });
        });

        //slider add to cart
        $('.cartBtn').click(function(event){
            event.preventDefault();
            var $container = $(this).closest('.swiper-slide');
            $source = {
                'userId' : $('.userId').val(),
                'productName' : $container.find('.productName').val(),
                'count' : $('.orderCount').val()
            };
            $.ajax({
                type : 'get',
                url : 'http://127.0.0.1:8000/user/ajax/cart',
                data : $source,
                dataType : 'json',
                success : function(response){
                    if(response.status == 'Success'){
                        window.location.reload();
                        alert('Successfully added to the cart');
                    }
                }
            });
        });
    });

    // load more data
    var ENDPOINT = "{{ route('user#gloveView',$gloves->id) }}" ;
    var page = 1;

    $('.load-more-data').click(function(){
        page++;
        infinteLoad(page);
    });
    function infinteLoad(page){
        $.ajax({
            type : "get",
            url : ENDPOINT + "?page=" + page,
            dataType : "html",
            beforeSend : function(){
                $('.auto-load').show();
            }
        })
        .done(function(response){
            if (!response.html || response.html.trim() === '') {
                $('.auto-load').html("We don't have more data to display :(");
                return;
            }
            $('.auto-load').hide();
            $('#data-wrapper').append(response.html);
            $('#review-count').text(response.newReviewCount);
        })
        .fail(function(jqXHR,ajaxOptions,thrownError){
            alert('Something went wrong.');
        });
    }
</script>
