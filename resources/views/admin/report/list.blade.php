@extends('admin.layouts.master')

@section('title','Report')

@section('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@latest/dist/apexcharts.css">
@endsection

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1">Report</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="report-total-box">
                        <div class="col-lg-4">
                            <div>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-users me-2"></i>
                                    <h4 class="text-white">Total Users</h4>
                                </div>
                                <p class="w-100 text-end fs-3 pe-2">{{ $users->count() }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-bicycle me-2"></i>
                                    <h4 class="text-white">Total Products</h4>
                                </div>
                                <p class="w-100 text-end fs-3 pe-2">{{ $bikes }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-money-bill me-2"></i>
                                    <h4 class="text-white">Total Income</h4>
                                </div>
                                <p class="w-100 text-end fs-3 pe-2">4</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5 bg-white py-5 rounded">
                        <div class="col-lg-6">
                            <div id="chart"></div>
                        </div>
                        <div class="col-lg-5 offset-1">
                            <div class="box">
                                <div id="donut"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection


@section('scriptLink')
<script src="https://cdn.jsdelivr.net/npm/apexcharts@latest/dist/apexcharts.min.js"></script>
@endsection

@section('scriptSource')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var userData = @json($monthlyUsers);
        var options = {
            chart: {
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            title: {
                text: 'Total Users by Month',
                align: 'left'
            },
            series: [{
                name: 'users',
                data: Object.values(userData)
            }],
            xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug','Sep','Oct','Nov','Dec'] // X-axis labels
            }
        }
        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();



        var salesData = @json($bikeSales);
        var categories = [];
        var sales = [];

        salesData.forEach(function(item) {
            if (item.total_sales > 0) {
                categories.push(item.category_name);
                sales.push(Number(item.total_sales));
            }
        });
        var options = {
            series: sales,
            chart: {
                type: 'donut',
                height: 350,
            },
            title: {
                text: 'Department of Bike Sale',
                align: 'left'
            },
            labels: categories,
            responsive: [{
                breakpoint: 480,
                    options: {
                        chart: {
                            width: 180
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };
        var donut = new ApexCharts(document.querySelector("#donut"), options);
        donut.render();
    });
  </script>

@endsection
