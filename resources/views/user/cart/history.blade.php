<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History - AY Japan Bikes Shop</title>

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

<body>

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


    <a href="javascript:history.back()" class="btn btn-secondary mt-3 ms-5 px-3">
        <i class="fa-solid fa-arrow-left-long"></i>
    </a>

    <!-- History Start -->
    <div class="container-lg d-block mx-auto mt-3 w-75">
        <label for="" class="mb-3">Waiting Times : 3 Days</label>
        <table class="table table-light table-borderless table-hover text-center mb-4">
            <thead class="thead-dark">
                <tr>
                    <th>Date</th>
                    <th>Order ID</th>
                    <th>Total Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                @foreach ($orders as $o)
                    <tr>
                        <td class="align-middle">{{ $o->updated_at->format('j-F-Y') }}</td>
                        <td class="align-middle">{{ $o->order_code }}</td>
                        <td class="align-middle">{{ $o->total_price }} Kyats</td>
                        <td class="align-middle">
                            @if ($o->status == 0)
                                <span class="text-primary"><i class="fa-regular fa-clock me-1"></i> Pending...</span>
                            @elseif($o->status == 1)
                                <span class="text-success"><i class="fa-solid fa-check me-1"></i> Success...</span>
                            @elseif($o->status == 2)
                                <span class="text-danger"><i class="fa-solid fa-triangle-exclamation me-2"></i> Reject...</span>
                            @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        <span>
            {{ $orders->links() }}
        </span>
    </div>
    <!-- History End -->
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

