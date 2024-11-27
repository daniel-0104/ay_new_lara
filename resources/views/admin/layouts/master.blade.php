<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <title>@yield('title')</title>

    <!-- bootstrap css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Fontfaces CSS-->
    <link href="{{ asset('admin/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    {{-- fontawesome  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Vendor CSS-->
    {{-- <link href="{{ asset('admin/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all"> --}}

    <!-- css  -->
    <link href="{{ asset('admin/css/theme.css') }}" rel="stylesheet" media="all">

    @yield('head')
</head>
    <link rel="icon" href="{{ asset('image/icon/ay japan bikes shop.png') }}">
<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('image/icon/logo.png') }}" alt="AY" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="{{ route('report#page') }}" class="text-decoration-none">
                                <i class="fa-solid fa-chart-simple"></i>Report</a>
                        </li>
                        <li>
                            <a href="{{ route('admin#homePage') }}" class="text-decoration-none">
                                <i class="fas fa-chart-bar"></i>Category</a>
                        </li>
                        <li>
                            <a href="{{ route('trend#list') }}" class="text-decoration-none">
                                <i class="fa-solid fa-arrow-trend-up"></i>Trend</a>
                        </li>
                        <li>
                            <a href="{{ route('product#list') }}" class="text-decoration-none">
                                <i class="fa-brands fa-product-hunt"></i>Product</a>
                        </li>
                        <li>
                            <a href="{{ route('helmet#list') }}" class="text-decoration-none">
                                <i class="fa-solid fa-helmet-safety"></i>Helmets</a>
                        </li>
                        <li>
                            <a href="{{ route('jacket#list') }}" class="text-decoration-none">
                                <i class="fa-solid fa-vest"></i>Jackets</a>
                        </li>
                        <li>
                            <a href="{{ route('glove#list') }}" class="text-decoration-none">
                                <i class="fa-solid fa-mitten"></i>Gloves</a>
                        </li>
                        <li>
                            <a href="{{ route('order#list') }}" class="text-decoration-none">
                                <i class="fa-solid fa-list-check"></i>Order Lists</a>
                        </li>
                        <li>
                            <a href="{{ route('contact#list') }}" class="text-decoration-none">
                                <i class="fa-solid fa-address-book"></i>Contact Messages</a>
                        </li>
                        <li>
                            <a href="{{ route('rating#list') }}" class="text-decoration-none">
                                <i class="fa-solid fa-message"></i>Review Comments</a>
                        </li>
                        <li>
                            <a href="{{ route('user#list') }}" class="text-decoration-none">
                                <i class="fa-solid fa-user"></i>User List</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <span class="form-header">
                                <h4>AY Japan Bikes Shop</h4>
                            </span>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            @if (Auth::user()->image == null)
                                                @if (Auth::user()->gender == 'male')
                                                    <img src="{{ asset('admin/image/profileMale.avif') }}" class="shadow-sm">
                                                @else
                                                    <img src="{{ asset('admin/image/profileFemale.avif') }}" class="shadow-sm">
                                                @endif
                                            @else
                                                <img src="{{ asset('storage/'.Auth::user()->image) }}" class="shadow-sm">
                                            @endif
                                        </div>
                                        <div class="content text-decoration-none">
                                            <a class="js-acc-btn" href="#">{{ Auth::user()->name }}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                   <a href="">
                                                        @if (Auth::user()->image == null)
                                                            @if (Auth::user()->gender == 'male')
                                                                <img src="{{ asset('admin/image/profileMale.avif') }}" class="shadow-sm">
                                                            @else
                                                                <img src="{{ asset('admin/image/profileFemale.avif') }}" class="shadow-sm">
                                                            @endif
                                                        @else
                                                            <img src="{{ asset('storage/'.Auth::user()->image) }}" class="shadow-sm">
                                                        @endif
                                                   </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name ">
                                                        <a href="#" class="text-decoration-none">{{ Auth::user()->name }}</a>
                                                    </h5>
                                                    <span class="email">{{ Auth::user()->email }}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{ route('account#profile') }}" class="text-decoration-none">
                                                        <i class="fa-solid fa-user"></i>Account</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{ route('list#page') }}" class="text-decoration-none">
                                                        <i class="fa-solid fa-users"></i>Admin List</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{ route('pass#changePage') }}" class="text-decoration-none">
                                                        <i class="fa-solid fa-lock"></i>Change Password</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer my-3">
                                                <form action="{{ route('logout') }}" method="post" class="d-flex justify-content-center">
                                                    @csrf
                                                    <button class="btn bg-dark text-white text-center col-10" type="submit">
                                                        Logout
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            @yield('content')
            <!-- END PAGE CONTAINER-->
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('admin/vendor/jquery-3.2.1.min.js') }}"></script>

    <!-- Vendor JS       -->
    {{-- <script src="{{ asset('admin/vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset('admin/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('admin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('admin/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/select2/select2.min.js') }}"> --}}
    </script>

    <!-- Main JS-->
    <script src="{{ asset('admin/js/main.js') }}"></script>

    {{-- jquery cdn  --}}
    {{-- <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script> --}}

    {{-- bootstrap js  --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    @yield('scriptLink')
</body>

@yield('scriptSource')
</html>
