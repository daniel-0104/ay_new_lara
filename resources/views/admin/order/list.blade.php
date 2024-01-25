@extends('admin.layouts.master');

@section('title','Order Lists')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1">Order Lists</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row my-5">
                        <div class="col-3 bg-white shadow-sm py-2 text-center">
                            <h4>Total - {{ count($orders) }}</h4>
                        </div>

                        <form action="{{ route('order#Search') }}" method="post">
                            @csrf
                            <div class="d-flex mt-3">
                                <label for="" class="mt-2 me-2">Order Status</label>
                                <select class="form-control w-25" name="orderStatus">
                                    <option value="" @if(!request()->has('orderStatus')) selected @endif>All</option>
                                    <option value="0" @if( request('orderStatus') == '0' ) selected @endif>Pending</option>
                                    <option value="1" @if( request('orderStatus') == '1' ) selected @endif>Accept</option>
                                    <option value="2" @if( request('orderStatus') == '2' ) selected @endif>Reject</option>
                                </select>

                                <button type="submit" class="btn btn-sm bg-dark text-white">Search</button>
                            </div>
                        </form>
                    </div>

                    @if (session('deleteSuccess'))
                        <div class="row">
                            <div class="alert alert-success alert-dismissible fade show col-lg-6 offset-5" role="alert">
                                {{ session('deleteSuccess') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif

                    @if (count($orders) != 0)
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th class="px-5">Date</th>
                                    <th>Order Code</th>
                                    <th>Amount</th>
                                    <th class="px-5">Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $o)
                                <tr class="tr-shadow">
                                    <input type="hidden" value="{{ $o->id }}" id="orderId">
                                    <td>{{ $o->id }}</td>
                                    <td>{{ $o->user_name }}</td>
                                    <td>{{ $o->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('order#view',$o->order_code) }}">{{ $o->order_code }}</a>
                                    </td>
                                    <td>{{ $o->total_price }} Kyats</td>
                                    <td>
                                        <select class="form-control statusChange" name="status">
                                            <option value="0" @if( $o->status == 0 ) selected @endif>Pending</option>
                                            <option value="1" @if( $o->status == 1 ) selected @endif>Accept</option>
                                            <option value="2" @if( $o->status == 2 ) selected @endif>Reject</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="{{ route('order#listDelete',$o->order_code) }}">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $orders->links() }}
                    </div>
                    @else
                        <h4 class="text-secondary text-center mt-4">There is no order here!</h4>
                    @endif
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection


@section('scriptSource')
    <script>
        $(document).ready(function(){
            // status change
            $('.statusChange').click(function(){
                $currentStatus = $(this).val();
                $parentNode = $(this).parents('tr');
                $orderId = $parentNode.find('#orderId').val();

                $.ajax({
                    type : 'get',
                    url : 'http://127.0.0.1:8000/admin/order/status/change',
                    data : { 'status' : $currentStatus , 'orderId' : $orderId },
                    dataType : 'json'
                });
            });
        });
    </script>
@endsection


