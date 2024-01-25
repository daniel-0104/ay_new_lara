@extends('admin.layouts.master');

@section('title','Helmet List')

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
                                <h2 class="title-1">Helmets List</h2>
                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('helmet#createPage') }}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>Create new Helmet
                                </button>
                            </a>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                CSV download
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-5">
                            <h5 class="text-secondary">Search Key : <span class="text-danger">{{ request('key') }}</span> </h5>
                        </div>
                        <div class="col-4 offset-3">
                            <form action="{{ route('helmet#list') }}" method="get">
                                <div class="d-flex">
                                    <input type="text" name="key" class="form-control" value="{{ request('key') }}" placeholder="name or color...">
                                    <button class="btn bg-dark text-white" type="submit">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                        @if (session('data_displayed'))
                            <script>
                                document.addEventListener('DOMContentLoaded',function(){
                                    document.querySelector('input[name="key"]').value = '';
                                });
                            </script>
                            <?php session(['data_displayed'=>false]); ?>
                        @endif
                    </div>

                    <div class="row my-3">
                        <div class="col-3 bg-white shadow-sm py-2 text-center">
                            <h4>Total - {{ count($helmets) }}</h4>
                        </div>

                        <div class="col-4">
                            <a href="{{ route('helmet#list') }}">
                                <button class="btn btn-primary text-white">All Products <i class="fa-solid fa-rotate"></i> </button>
                            </a>
                        </div>
                    </div>

                    <div class="row mt-2">
                        @if (session('deleteSuccess'))
                        <div class="row">
                            <div class="alert alert-success alert-dismissible fade show col-lg-8 offset-4" role="alert">
                                {{ session('deleteSuccess') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                        @endif
                    </div>

                    @if (count($helmets) !== 0)
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Type</th>
                                    <th>Material</th>
                                    <th>Color</th>
                                    <th>View Count</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($helmets as $h)
                                <tr class="tr-shadow">
                                    <td>{{ $h->id }}</td>
                                    <td><img src="{{ asset('storage/'.$h->image) }}" class="img-thumbnail"></td>
                                    <td>{{ $h->name }}</td>
                                    <td>{{ $h->price }}</td>
                                    <td>{{ $h->type }}</td>
                                    <td>{{ $h->material }}</td>
                                    <td>{{ $h->color }}</td>
                                    <td><i class="fa-solid fa-eye me-1"></i>{{ $h->view_count }}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="{{ route('helmet#view',$h->id) }}">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="View">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                            </a>
                                            <a href="{{ route('helmet#edit',$h->id) }}">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                            </a>

                                            <a href="{{ route('helmet#delete',$h->id) }}">
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
                        {{ $helmets->links() }}
                    </div>

                    @else
                        <h4 class="text-secondary text-center mt-4">There is no helmet yet!</h4>
                    @endif



                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
