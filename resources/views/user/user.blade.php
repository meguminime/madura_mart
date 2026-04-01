@extends('be.master')
@section('menu')
    @include('be.menu')
@endsection

@section('user')
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{ $title }}</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">{{ $title }}</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Search users...">
                    </div>
                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="javascript:;" class="btn btn-primary btn-sm mb-0">User Table</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid py-4 px-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>List of Users</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alamat</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $user->id }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $user->name }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm text-secondary mb-0">{{ $user->email }}</p>
                                            </td>
                                            <td>
                                                <span class="badge badge-sm bg-gradient-primary">{{ $user->role }}</span>
                                            </td>
                                            <td>
                                                <p class="text-sm text-secondary mb-0">{{ $user->no_telepon }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm text-secondary mb-0">{{ $user->alamat }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm text-secondary mb-0">{{ $user->created_at->format('Y-m-d') }}</p>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-4">No users found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
