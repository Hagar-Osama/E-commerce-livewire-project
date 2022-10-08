@extends('layouts.master')
@section('title')
Users
@endsection
@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Users
                        <a href="{{route('users.create')}}" class="btn btn-primary float-end">Add User</a>
                    </h2>
                </div>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                User Name
                                            </th>
                                            <th>
                                                Email
                                            </th>
                                            <th>
                                                Role
                                            </th>
                                            <th>
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($users as $user)
                                        <tr>
                                            <td>
                                                {{$loop->iteration}}
                                            </td>
                                            <td>
                                                {{$user->name}}
                                            </td>
                                            <td>
                                                {{$user->email}}
                                            </td>

                                            <td>
                                                @if($user->role == 'admin')

                                                <p class="badge btn-success">admin</p>
                                                @else
                                                <p class="badge btn-warning">user</p>

                                                @endif
                                            </td>
                                            <td><a href="{{route('users.edit',$user->id)}}" class="btn-sm btn btn-outline-dark btn-fw">
                                                    Edit
                                                    <i class="mdi mdi-file-check btn-icon-append"></i>
                                                </a>
                                                <button class="btn btn-outline-danger btn-fw btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUser{{$user->id}}">
                                                    <i class="mdi mdi-alert btn-icon-prepend"></i>
                                                    Delete
                                                </button>
                                            </td>
                                       @include('admin.users.delete')
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5">No Users Found</td>
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

    </div>
    @endsection
