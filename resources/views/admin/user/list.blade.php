@extends('admin.layouts.master')

@section('title','User List')

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
                                <h2 class="title-1">User List</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-3 bg-white shadow-sm py-1 text-center">
                            <h4>Total - {{ $users->where('role', 'user')->count() }}</h4>
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

                    @if (count($users) !== 0)
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
                            <tbody id="dataList">
                                @foreach ($users as $u)
                                <tr>
                                    <td>{{ $u->id }}</td>
                                    <td>
                                        @if ($u->image == null)
                                            @if ($u->gender == 'male')
                                                <img src="{{ asset('admin/image/profileMale.avif') }}" class="shadow-sm">
                                            @else
                                                <img src="{{ asset('admin/image/profileFemale.avif') }}" class="shadow-sm">
                                            @endif
                                        @else
                                            <img src="{{ asset('storage/'. $u->image) }}" class="shadow-sm">
                                        @endif
                                    </td>
                                    <input type="hidden" value="{{ $u->id }}" id="userId">
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>{{ $u->gender }}</td>
                                    <td>{{ $u->phone }}</td>
                                    <td>{{ $u->address }}</td>
                                    <td>
                                        <select class="form-control statusChange" style="width: 60px;">
                                            <option value="user" @if($u->role == 'user') selected @endif>User</option>
                                            <option value="admin" @if($u->role == 'admin') selected @endif>Admin</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="{{ route('user#delete',$u->id) }}">
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
                        {{$users->links()}}
                    </div>

                    @else
                    <div class="py-2 d-block mx-auto text-center">
                        <h4 class="text-secondary">There is no user yet!</h4>
                    </div>
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
            //statusChage
            $('.statusChange').change(function(){
                $currentStatus = $(this).val();
                $parentNode = $(this).parents('tr');
                $userId = $parentNode.find('#userId').val();

                $data =  { 'userId' : $userId , 'role' : $currentStatus }

                $.ajax({
                    type : 'get',
                    url : '/admin/user/change/role',
                    data : $data,
                    dataType : 'json'
                });
                location.reload();
            })
        });
    </script>
@endsection
