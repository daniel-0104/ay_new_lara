<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Cart - AY Japan Bikes Shop</title>

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
                                   {{ count($cartList->where('user_id', Auth::user()->id)) }}
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


    <a href="javascript:history.back()" class="btn btn-secondary mt-5 ms-2">
        <i class="fa-solid fa-arrow-left-long"></i>
    </a>

    <!-- Cart Start -->
    <div class="container-fluid mt-1">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">

                @if (count($cartList) != 0)
                    <table class="table table-light table-borderless table-hover text-center mb-0" id="dataTable">
                        <thead class="thead-dark">
                            <tr>
                                <th></th>
                                <th>Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach ($cartList as $c)
                                <tr>
                                    <td>
                                        @if($c->bike_image)
                                            <img src="{{ asset('storage/'.$c->bike_image) }}" alt="" style="width: 50px;">
                                        @elseif($c->helmet_image)
                                            <img src="{{ asset('storage/'.$c->helmet_image) }}" alt="" style="width: 50px;">
                                        @elseif($c->jacket_image)
                                            <img src="{{ asset('storage/'.$c->jacket_image) }}" alt="" style="width: 50px;">
                                        @elseif($c->glove_image)
                                            <img src="{{ asset('storage/'.$c->glove_image) }}" alt="" style="width: 50px;">
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        @if($c->bike_name)
                                            {{ $c->bike_name }}
                                        @elseif($c->helmet_name)
                                            {{ $c->helmet_name }}
                                        @elseif($c->jacket_name)
                                            {{ $c->jacket_name }}
                                        @elseif($c->glove_name)
                                            {{ $c->glove_name }}
                                        @endif
                                        <input type="hidden" value="{{ $c->id }}" id="orderId">
                                        <input type="hidden" value="{{ $c->product_name }}" id="productName">
                                    </td>
                                    <td class="align-middle" id="price">
                                        @if($c->bike_price)
                                            {{ $c->bike_price }} Kyats
                                        @elseif($c->helmet_price)
                                            {{ $c->helmet_price }} Kyats
                                        @elseif($c->jacket_price)
                                            {{ $c->jacket_price }} Kyats
                                        @elseif($c->glove_price)
                                            {{ $c->glove_price }} Kyats
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-warning btn-minus" >
                                                <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" class="form-control form-control-sm bg-body-secondary border-0 text-center text-dark" value="{{ $c->qty }}" id="qty">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-warning btn-plus">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle" id="total">
                                        @if($c->bike_price)
                                            {{ $c->bike_price*$c->qty }} Kyats
                                        @elseif($c->helmet_price)
                                            {{ $c->helmet_price*$c->qty }} Kyats
                                        @elseif($c->jacket_price)
                                            {{ $c->jacket_price*$c->qty }} Kyats
                                        @elseif($c->glove_price)
                                            {{ $c->glove_price*$c->qty }} Kyats
                                        @endif
                                    </td>
                                    <td class="align-middle"><button class="btn btn-sm btn-danger btn-remove"><i class="fa fa-times"></i></button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center bg-body-secondary fs-4 text-dark col-6 offset-3 rounded py-2">There is no cart yet.<i class="fa-solid fa-cart-shopping"></i></p>
                @endif
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-gradient p-3">Cart Summary</span></h5>
                <div class="bg-light-subtle text-black px-3 pt-3 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6 id="subTotalPrice">{{ $totalPrice }} Kyats</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Delivery</h6>
                            <h6 class="font-weight-medium">5000 Kyats</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5 id="finalPrice">{{ $totalPrice+5000 }} Kyats</h5>
                        </div>
                        <button class="btn btn-block btn-warning font-weight-bold my-3 py-2" id="orderBtn">
                            <span>Proceed To Checkout</span>
                        </button>
                        <button class="btn btn-block btn-danger font-weight-bold my-2 py-2" id="clearCart">
                            <span>Clear Cart</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
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
        $('.btn-plus').click(function(){
            $parentNode = $(this).parents('tr');
            $qty = Number($parentNode.find('#qty').val());
            if($qty > 0){
                Number($parentNode.find('#qty').val($qty + 1));
            }
            $price = Number($parentNode.find('#price').text().replace('Kyats',''));
            $total = $price*($qty+1);
            $parentNode.find('#total').html($total + ' Kyats');

            summaryCalculation();
        });

        $('.btn-minus').click(function(){
            $parentNode = $(this).parents('tr');
            $qty = Number($parentNode.find('#qty').val());
            if($qty > 1){
                Number($parentNode.find('#qty').val($qty - 1));
                $price = Number($parentNode.find('#price').text().replace('Kyats',''));
                $total = $price*($qty-1);
            }
            $parentNode.find('#total').html($total + ' Kyats');

            summaryCalculation();
        });

        function summaryCalculation(){
            $totalPrice = 0;
            $('#dataTable tbody tr').each(function(index,row){
                $totalPrice += Number($(row).find('#total').text().replace('Kyats',''));
            });
            $('#subTotalPrice').html(`${$totalPrice} Kyats`);
            $('#finalPrice').html(`${$totalPrice+5000} Kyats`);
        }

        summaryCalculation()

    });

    //order btn
    $('#orderBtn').click(function(){
        $orderList = [];
        $random = Math.floor(Math.random() * 10000001);

        $('#dataTable tbody tr').each(function(index,row){
            $orderList.push({
                'product_name' : $(row).find('#productName').val(),
                'qty' : $(row).find('#qty').val(),
                'total' : $(row).find('#total').text().replace('Kyats','')*1,
                'order_code' : 'AY' + $random
            });
        });

        $.ajax({
                type : 'get',
                url : 'http://127.0.0.1:8000/user/ajax/cart/order',
                data : Object.assign({},$orderList),
                dataType : 'json',
                success : function(response){
                    if(response.status == 'true'){
                        alert('The product was ordered successfully');
                        window.location.href = 'http://127.0.0.1:8000/user/product/list';
                    }
                }
            });
    });

    //clear cart
    $('#clearCart').click(function(){
        $('#dataTable tbody tr').remove();
        $('#subTotalPrice').html('0 Kyats');
        $('#finalPrice').html('5000 Kyats');

        $.ajax({
            type : 'get',
            url : 'http://127.0.0.1:8000/user/ajax/cart/clear',
            dataType : 'json'
        });
    });

    //cart btn remove
    $('.btn-remove').click(function(){
        $parentNode = $(this).parents('tr');
        $orderId = $parentNode.find('#orderId').val();
        $productName = $parentNode.find('#productName').val();

        $.ajax({
            type : 'get',
            url : 'http://127.0.0.1:8000/user/ajax/cart/remove',
            data : {'orderId' : $orderId , 'productName' : $productName},
            dataType : 'json'
        });

        $parentNode.remove();
        summaryCalculation();
    });
</script>
