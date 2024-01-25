<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AY Japan Bikes Shop</title>

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
<body data-page="page1">


    <div id="top"></div>
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

    <!-- return to top  -->
    <div id="return-to-top">
        <a href="#top"><i class="fa-solid fa-angles-up"></i></a>
    </div>

    <!-- home start  -->
    <section id="home">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1"  aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active p-3" id="home-bg">
                    <div class="container-lg">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-6 col-sm-6 mb-3" id="home-content1">
                                <p>THE ALL NEW</p>
                                <h1>RIDE LIKE LOCAL</h1>
                                <label for="" class="mt-2">Special 40% Off On Your First Order</label> <br>
                                <a href="javascript:void(0)" class="btn">Shop Now</a>
                            </div>
                            <div class="col-lg-6 col-sm-6 text-center" id="home-img">
                                <img src="{{ asset('image/home1.png') }}" class="w-100 d-block">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item p-3" id="home-bg">
                    <div class="container-lg">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-6 col-sm-6 mb-3" id="home-content2">
                                <p>ONLY $29.</p>
                                <h1>DIRT BIKE EVENT</h1>
                                <label for="" class="mt-2">New Arrivals Accesesories Available</label> <br>
                                <a href="javascript:void(0)" class="btn">Shop Now</a>
                            </div>
                            <div class="col-lg-6 col-sm-6 text-center order-sm-first" id="home-img">
                                <img src="{{ asset('image/home2.png') }}" class="w-100 d-block">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- home end  -->

    <!-- product start -->
    <section id="product">
        <div class="text-center">
            <p><span></span>PRODUCTS</p>
            <h2>Trending Products</h2>
        </div>
        <div id="product-link">
            <a href="{{ route('user#homePage') }}" class="product product-active" onclick="activeProduct(event, 'rowLayout', 'swiperLayout')">Features</a>
            @foreach ($trends as $t)
                <a href="{{ route('user#product',$t->name) }}" class="product" onclick="activeProduct(event, 'rowLayout', 'swiperLayout')"> {{ $t->name }} </a>
            @endforeach
        </div>

        <div id="product-content" class="container-lg mt-4">
            <div class="product-row-layout">
                <div class="row" id="row-layout">
                    @foreach ($products as $p)
                        <div class="col-lg-3 mb-4" id="product-item">
                            <input type="hidden" class="userId" value="{{ Auth::user()->id }}">
                            <input type="hidden" class="productName" value="{{ $p->name }}">
                            <input type="hidden" class="orderCount" value="1">
                            <div id="product-img-content">
                                <img src="{{ asset('storage/'.$p->image) }}" class="w-100 d-block">
                                <div id="product-img-link">
                                    <a href="{{ route('detail#view',$p->id) }}" id="eye"><i class="fa-solid fa-eye"></i></a>
                                    <a href="{{ route('cart#list') }}" id="shop" class="btn cartBtn"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                            <div id="product-name" class="mt-2 border px-1 py-1">
                                <h5>{{ $p->name }}</h5>
                                <div class="d-flex justify-content-between" style="color: #a2b2ee;">
                                    <label class="text-white">{{ $p->category_name }}</label>
                                    <span>{{ $p->price }} Kyats </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="container-lg product-swiper-layout">
                <div class="swiper" id="swiper-layout">
                    <div class="swiper-wrapper">
                        @foreach ($products as $p)
                            <div class="swiper-slide" id="product-item">
                                <input type="hidden" class="userId" value="{{ Auth::user()->id }}">
                                <input type="hidden" class="productName" value="{{ $p->name }}">
                                <input type="hidden" class="orderCount" value="1">
                                <div id="product-img-content">
                                    <img src="{{ asset('storage/'.$p->image) }}" class="w-100 d-block">
                                    <div id="product-img-link">
                                        <a href="{{ route('detail#view',$p->id) }}" id="eye"><i class="fa-solid fa-eye"></i></a>
                                        <a href="{{ route('cart#list') }}" id="shop" class="btn cartBtn"><i class="fa-solid fa-cart-shopping"></i></a>
                                    </div>
                                </div>
                                <div id="product-name" class="mt-2 border px-1 py-1 text-center">
                                    <h5>{{ $p->name }}</h5>
                                    <div class="d-flex justify-content-between" style="color: #a2b2ee;">
                                        <label class="text-white">{{ $p->category_name }}</label>
                                        <span>{{ $p->price }} Kyats </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="product-pagination">
            <div class="feat-pagination text-center mx-auto mt-3"></div>
        </div>

    </section>
    <!-- product end  -->

    <!-- shop start  -->
    <section id="shop">
        <div class="text-center">
            <p><span></span>CATEGORY</p>
            <h2>Shop By Riding</h2>
        </div>

        <div class="container-lg mt-4">
            <div class="row mx-auto">
                <div class="col-lg-4 col-sm-6 mb-4" id="shop-content">
                    <img src="{{ asset('image/shopShoe.jpg') }}" class="w-100 d-block rounded">
                    <div id="shop-label">
                        <h4>Sporty Shoes</h4>
                        <a href="javascript:void(0)">View More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4" id="shop-content">
                    <img src="{{ asset('image/shopLight.jpg') }}" class="w-100 d-block rounded">
                    <div id="shop-label">
                        <h4>Side Light</h4>
                        <a href="javascript:void(0)">View More</a>
                    </div>
                </div>
                <div class="col-lg-4 shop-content mb-4" id="shop-content">
                    <img src="{{ asset('image/shopHelmet.jpg') }}" class="w-100 d-block rounded">
                    <div id="shop-label">
                        <h4>Sporty Helmets</h4>
                        <a href="javascript:void(0)">View More</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-lg mt-5">
            <div class="row mx-auto">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="d-flex justify-content-between" id="shop-slide">
                        <h4>Helmets</h4>
                        <div class="d-flex">
                            <button class="btn me-2" onclick="controller(-1)"><i class="fa-solid fa-chevron-left"></i></button>
                            <button class="btn" onclick="controller(1)"><i class="fa-solid fa-chevron-right"></i></button>
                        </div>
                    </div>
                    <hr>

                    @php
                        $groupHelmets = $helmets->chunk(3);
                    @endphp

                    <div class="card-container mt-3">
                        @foreach ($groupHelmets as $group)
                        <div class="row mb-3 align-items-center justify-content-center" id="cards">
                                @foreach ($group as $h)
                                    <div class="col-lg-5 col-sm-5" id="card-shop">
                                        <a href="{{ route('user#helmetView',$h->id) }}" id="product-img-content">
                                            <img src="{{ asset('storage/'.$h->image) }}" class="w-100 d-block">
                                        </a>
                                    </div>
                                    <div class="col-lg-7 col-sm-7" id="card-shop-content">
                                        <h5>{{ $h->name }}</h5>
                                        <label class="d-block">{{ $h->price }} Kyats</label>
                                    </div>
                                @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="d-flex justify-content-between" id="shop-slide">
                        <h4>Jackets</h4>
                        <div class="d-flex">
                            <button class="btn me-2" onclick="controller2(-1)"><i class="fa-solid fa-chevron-left"></i></button>
                            <button class="btn" onclick="controller2(1)"><i class="fa-solid fa-chevron-right"></i></button>
                        </div>
                    </div>
                    <hr>

                    @php
                        $groupJackets = $jackets->chunk(3);
                    @endphp

                    <div class="card-container2 mt-3">
                        @foreach ($groupJackets as $jacket)
                        <div class="row mb-3 align-items-center justify-content-center" id="cards">
                                @foreach ($jacket as $j)
                                    <div class="col-lg-5 col-sm-5" id="card-shop">
                                        <a href="{{ route('user#jacketView',$j->id) }}" id="product-img-content">
                                            <img src="{{ asset('storage/'.$j->image) }}" class="w-100 d-block">
                                        </a>
                                    </div>
                                    <div class="col-lg-7 col-sm-7" id="card-shop-content">
                                        <h5>{{ $j->name }}</h5>
                                        <label class="d-block">{{ $j->price }} Kyats</label>
                                    </div>
                                @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 mx-auto">
                    <div class="d-flex justify-content-between" id="shop-slide">
                        <h4>Gloves</h4>
                        <div class="d-flex">
                            <button class="btn me-2" onclick="controller3(-1)"><i class="fa-solid fa-chevron-left"></i></button>
                            <button class="btn" onclick="controller3(1)"><i class="fa-solid fa-chevron-right"></i></button>
                        </div>
                    </div>
                    <hr>

                    @php
                        $groupGloves = $gloves->chunk(3);
                    @endphp

                    <div class="card-container3 mt-3">
                        @foreach ($groupGloves as $glove)
                        <div class="row mb-3 align-items-center justify-content-center" id="cards">
                                @foreach ($glove as $g)
                                    <div class="col-lg-5 col-sm-5" id="card-shop">
                                        <a href="{{ route('user#gloveView',$g->id) }}" id="product-img-content">
                                            <img src="{{ asset('storage/'.$g->image) }}" class="w-100 d-block">
                                        </a>
                                    </div>
                                    <div class="col-lg-7 col-sm-7" id="card-shop-content">
                                        <h5>{{ $g->name }}</h5>
                                        <label class="d-block">{{ $g->price }} Kyats</label>
                                    </div>
                                @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop end  -->

    <!-- about us start  -->
    <section id="about" class="mb-5">
        <div class="text-center">
            <p><span></span>TESTIMONIALS</p>
            <h2>OUR RIDERS</h2>
        </div>

        <div class="container-lg">
            <div class="p-slider">
                <div class="glider-contain">
                    <div class="glider">
                        <div class="rider-box">
                            <div class="p-img-container">
                                <div class="p-img">
                                    <img src="{{ asset('image/rider1.jpg') }}">
                                </div>
                            </div>
                            <div class="p-box-text">
                                <div class="p-text">
                                    <h4>Jhon Smith</h4>
                                    <label for="">Web Developer</label>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis, reiciendis ea explicabo consequuntur.</p>
                                </div>
                            </div>
                        </div>

                        <div class="rider-box">
                            <div class="p-img-container">
                                <div class="p-img">
                                    <img src="{{ asset('image/rider2.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="p-box-text">
                                <div class="p-text">
                                    <h4>Steven Joe</h4>
                                    <label for="">Web Developer</label>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis, reiciendis ea explicabo consequuntur.</p>
                                </div>
                            </div>
                        </div>

                        <div class="rider-box">
                            <div class="p-img-container">
                                <div class="p-img">
                                    <img src="{{ asset('image/rider3.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="p-box-text">
                                <div class="p-text">
                                    <h4>Johny Winn</h4>
                                    <label for="">Web Developer</label>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis, reiciendis ea explicabo consequuntur.</p>
                                </div>
                            </div>
                        </div>

                        <div class="rider-box">
                            <div class="p-img-container">
                                <div class="p-img">
                                    <img src="{{ asset('image/rider4.avif') }}" alt="">
                                </div>
                            </div>
                            <div class="p-box-text">
                                <div class="p-text">
                                    <h4>Jame Lupus</h4>
                                    <label for="">Web Developer</label>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis, reiciendis ea explicabo consequuntur.</p>
                                </div>
                            </div>
                        </div>

                        <div class="rider-box">
                            <div class="p-img-container">
                                <div class="p-img">
                                    <img src="{{ asset('image/rider5.webp') }}" alt="">
                                </div>
                            </div>
                            <div class="p-box-text">
                                <div class="p-text">
                                    <h4>Tryon Ken</h4>
                                    <label for="">Web Developer</label>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis, reiciendis ea explicabo consequuntur.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slider-btns">
                    <button aria-label="Previous" class="glider-prev">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button aria-label="Next" class="glider-next">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- about us end  -->


    <!-- service start  -->
    <section id="service">
        <div class="p-3 mx-auto">
            <div class="row">
                <div class="col-lg-3 col-sm-6 text-center mb-4" id="service-content">
                    <div>
                        <a href="javascript:void(0)">
                            <i class="fa-solid fa-bicycle"></i>
                        </a>
                    </div>
                    <h5>Mountain & Road Bikes</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, modi nostrum nulla quis veniam iusto labore veritatis.</p>
                </div>
                <div class="col-lg-3 col-sm-6 text-center mb-4" id="service-content">
                    <div>
                        <a href="javascript:void(0)">
                            <i class="fa-solid fa-gear"></i>
                        </a>
                    </div>
                    <h5>City & Electric Cycles</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, modi nostrum nulla quis veniam iusto labore veritatis.</p>
                </div>
                <div class="col-lg-3 col-sm-6 text-center mb-4" id="service-content">
                    <div>
                        <a href="javascript:void(0)">
                            <i class="fa-solid fa-vest"></i>
                        </a>
                    </div>
                    <h5>Parts & bikes mechanics</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, modi nostrum nulla quis veniam iusto labore veritatis.</p>
                </div>
                <div class="col-lg-3 col-sm-6 text-center mb-4" id="service-content">
                    <div>
                        <a href="javascript:void(0)">
                            <i class="fa-solid fa-mitten"></i>
                        </a>
                    </div>
                    <h5>Bicycle accesories</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, modi nostrum nulla quis veniam iusto labore veritatis.</p>
                </div>
            </div>
            <div id="service-link">
                <a href="{{ route('user#aboutPage') }}">Learn More</a>
            </div>
        </div>
    </section>
    <!-- service end  -->

    <!-- additional info start -->
    <section id="additional">
        <div class="container-lg">
            <div class="row additional">
                <div class="col-lg-6 col-sm-6 h-100vh">
                    <img src="{{ asset('image/add_img.webp') }}" class="w-100 d-block">
                </div>
                <div class="col-lg-6 col-sm-6 add-fir-content order-sm-first">
                    <h3>Additional Information</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid ullam vitae temporibus sunt! Eum exercitationem perspiciatis nam sed ex et neque quae, explicabo sunt quos accusantium doloribus quibusdam aliquid quas?</p>
                    <div class="row">
                        <div class="col-lg-4 col-sm-4 mb-3 add-content">
                            <i class="fa-solid fa-gauge"></i>
                            <h5>15 MPH</h5>
                            <span>Speed</span>
                        </div>
                        <div class="col-lg-4 col-sm-4 mb-3 add-content">
                            <i class="fa-solid fa-dharmachakra"></i>
                            <h5>24 Inch</h5>
                            <span>Wheel Size</span>
                        </div>
                        <div class="col-lg-4 col-sm-4 mb-3 add-content">
                            <i class="fa-solid fa-bicycle"></i>
                            <h5>Carbon</h5>
                            <span>Fork</span>
                        </div>
                    </div>
                    <a href="javascript:void(0)" class="btn">Shop Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- additional info end -->

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
        // add to cart
        $(document).on('click', '.cartBtn', function(event){
            event.preventDefault();
            var $container = $(this).closest('#product-content');
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
                        window.location.hash = '#product';
                        alert('Successfully added to the cart');
                    }
                }
            });
        });
    });
</script>
