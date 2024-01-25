@extends('admin.layouts.master');

@section('title','Review Comments')

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
                                <h2 class="title-1">Comments List</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row my-5 mb-0">
                        <div class="col-3 bg-white shadow-sm py-2 text-center">
                            <h4>Total - {{ count($rating) }} </h4>
                        </div>
                    </div>

                    {{-- @if (session('messageDelete'))
                        <div class="row">
                            <div class="alert alert-success alert-dismissible fade show col-lg-6 offset-5" role="alert">
                                {{ session('messageDelete') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif --}}

                    @if (count($rating) != 0)
                    <div class="table-responsive table-responsive-data2 mt-5">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>Title</th>
                                    <th>Rating</th>
                                    <th>Message</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="dataList">
                                @foreach ($rating as $r)
                                <tr class="tr-shadow">
                                    <td>{{ $r->id }}</td>
                                    <td>{{ $r->user_name }}</td>
                                    <td>{{ $r->user_email }}</td>
                                    <td>{{ $r->title }}</td>
                                    <td>{{ $r->rating }}</td>
                                    <td colspan="6">{{ $r->message }}</td>
                                    <td>{{ $r->created_at->format('j-F-Y') }}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="">
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
                    @else
                        <h4 class="text-secondary text-center mt-5">There is no comment yet!</h4>
                    @endif
                    <!-- END DATA TABLE -->

                    <div class="mt-3">
                        {{ $rating->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection

