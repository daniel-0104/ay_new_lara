@extends('admin.layouts.master')

@section('title','Trend Product')

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
                                <h2 class="title-1">Trend Product List</h2>
                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('trend#createPage') }}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>add type of trend
                                </button>
                            </a>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                CSV download
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-5">
                            <h5 class="text-secondary">Search Key : <span class="text-danger">  {{ request('key') }}  </span> </h5>
                        </div>
                        <div class="col-4 offset-3">
                            <form action="{{ route('trend#list') }}" method="get">
                                @csrf
                                <div class="d-flex">
                                    <input type="text" name="key" class="form-control" placeholder="search here" value="{{ request('key') }}">
                                    <button class="btn bg-dark text-white" type="submit">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-3 bg-white shadow-sm py-2 text-center">
                            <h4>Total - {{ $trendProduct->total() }}</h4>
                        </div>

                        <div class="col-4">
                            <a href="{{ route('trend#list') }}">
                                <button class="btn btn-primary text-white">All Trend Product <i class="fa-solid fa-rotate"></i> </button>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8 offset-4">
                            @if(session('deleteSuccess'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('deleteSuccess') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8 offset-4">
                            @if(session('createSuccess'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('createSuccess') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                    </div>


                   @if(count($trendProduct) != 0)
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Trend Name</th>
                                        <th>Updated Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trendProduct as $t)
                                        <tr class="tr-shadow">
                                            <td>{{ $t->id }}</td>
                                            <td>{{ $t->name }}</td>
                                            <td>{{ $t->updated_at->format('j-F-Y') }}</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <a href="{{ route('trend#edit',$t->id) }}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    </a>

                                                    <a href="{{ route('trend#delete',$t->id) }}">
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
                            {{ $trendProduct->links() }}
                        </div>
                   @else
                        <h4 class="text-secondary text-center mt-4">There is no trend product here!</h4>
                   @endif
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
