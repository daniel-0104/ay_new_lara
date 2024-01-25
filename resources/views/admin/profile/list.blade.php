@extends('admin.layouts.master');

@section('title','Category List')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->


                    <div class="row">
                        <div class="col-5">
                            <h5 class="text-secondary">Search Key : <span class="text-danger"> {{ request('key') }} </span> </h5>
                        </div>
                        <div class="col-4 offset-3">
                            <form action="{{ route('list#page') }}" method="get">
                                @csrf
                                <div class="d-flex">
                                    <input type="text" name="key" class="form-control" value="{{ request('key') }}" placeholder="search here">
                                    <button class="btn bg-dark text-white" type="submit">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-3 bg-white shadow-sm pt-2 text-center">
                            <h4>Total - {{ $admin->total() }}</h4>
                        </div>

                        <div class="col-4">
                            <a href="{{ route('list#page') }}">
                                <button class="btn btn-outline-info text-dark">Click for all admin list</button>
                            </a>
                        </div>
                    </div>

                    @if (session('deleteSuccess'))
                        <div class="col-8 offset-4">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('deleteSuccess') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif

                    @if (count($admin) != 0)
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Role</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admin as $a)
                                        <tr class="tr-shadow">
                                            <td>{{ $a->id }}</td>
                                            <td>
                                                @if ($a->image == null)
                                                    @if ($a->gender == 'male')
                                                        <img src="{{ asset('admin/image/profileMale.avif') }}" class="w-100">
                                                    @else
                                                        <img src="{{ asset('admin/image/profileFemale.avif') }}" class="w-100">
                                                    @endif
                                                @else
                                                    <img src="{{ asset('storage/'.$a->image) }}" class="w-100">
                                                @endif
                                            </td>
                                            <input type="hidden" value="{{ $a->id }}" id="adminId">
                                            <td class="text-dark">{{ $a->name }}</td>
                                            <td class="text-dark">{{ $a->email }}</td>
                                            <td class="text-dark">{{ $a->gender }}</td>
                                            <td class="text-dark">{{ $a->phone }}</td>
                                            <td class="text-dark">{{ $a->address }}</td>
                                            <td>
                                                <select class="form-control statusChange" style="width: 80px;">
                                                    <option value="user" @if($a->role == 'user') selected @endif>User</option>
                                                    <option value="admin" @if($a->role == 'admin') selected @endif>Admin</option>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <a href="{{ route('list#delete',$a->id) }}">
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
                            {{$admin->links()}}
                        </div>

                    <!-- END DATA TABLE -->

                    @else
                        <div class="py-2 d-block mx-auto text-center">
                            <h4 class="text-secondary">There is no admin that you have searched.</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection

@section('scriptSource')
    <script>
        $(document).ready(function(){
            $('.statusChange').change(function(){
                $currentStatus = $(this).val();
                $parentNode = $(this).parents('tr');
                $adminId = $parentNode.find('#adminId').val();

                $data = { 'adminId' : $adminId, 'role' : $currentStatus };

                $.ajax({
                    type : 'get',
                    url: '/admin/list/change/role',
                    data: $data,
                    dataType: 'json'
                });
                location.reload();
            });
        });
    </script>
@endsection
