@extends('admin.layouts.master');

@section('title','Order Lists')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <!-- DATA TABLE -->
                        <div class="table-responsive table-responsive-data2">
                            <a href="{{ route('order#list') }}"><i class="text-dark fa-sharp fa-solid fa-arrow-left fs-3"></i></a>

                            <div class="row">
                                <div class="col-7">
                                    <div class="card mt-4">
                                        <div class="card-header">
                                            <h4>Order Info</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col"><i class="fa-solid fa-user"></i> Customer Name</div>
                                                <div class="col">{{ $orderLists[0]->user_name }}</div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col"><i class="fa-solid fa-barcode"></i> Order Code</div>
                                                <div class="col">{{ $orderLists[0]->order_code }}</div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col"><i class="fa-regular fa-clock"></i> Order Date</div>
                                                <div class="col">{{ $orderLists[0]->created_at->format('j-F-Y') }}</div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col"><i class="fa-solid fa-dollar"></i> Total Price</div>
                                                <div class="col">{{ $orders->total_price }} Kyats</div>
                                                <small class="text-danger">Include Delivery Charges</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Product Category</th>
                                        <th>Order Date</th>
                                        <th>Quatity</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody id="dataList">
                                    @foreach ($orderLists as $o)
                                    <tr class="tr-shadow">
                                        <td>
                                            @if ($o->bike_image)
                                                <img src="{{ asset('storage/'.$o->bike_image) }}" class="img-thumbnail shadow-sm">
                                            @elseif($o->helmet_image)
                                                <img src="{{ asset('storage/'.$o->helmet_image) }}" class="img-thumbnail shadow-sm">
                                            @elseif($o->glove_image)
                                                <img src="{{ asset('storage/'.$o->glove_image) }}" class="img-thumbnail shadow-sm">
                                            @elseif($o->jacket_image)
                                                <img src="{{ asset('storage/'.$o->jacket_image) }}" class="img-thumbnail shadow-sm">
                                            @endif
                                        </td>
                                        <td>{{ $o->product_name }}</td>
                                        <td>
                                            @if ($o->bike_category)
                                                {{ $o->bike_category }}
                                            @elseif($o->helmet_category)
                                                {{ $o->helmet_category }}
                                            @elseif($o->jacket_category)
                                                {{ $o->jacket_category }}
                                            @elseif($o->glove_category)
                                                {{ $o->glove_category }}
                                            @endif
                                        </td>
                                        <td>{{ $o->created_at->format('j-F-Y') }}</td>
                                        <td class="text-center">{{ $o->qty }}</td>
                                        <td>{{ $o->total }} Kyats</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection


