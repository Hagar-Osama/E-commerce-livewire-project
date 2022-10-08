@extends('layouts.master')
@section('title')
Add User
@endsection
@section('css')
@endsection
@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>User
                        <a href="{{route('users.index')}}" class="btn btn-inverse-primary btn-fw float-end">BACK</a>
                    </h2>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" method="post" action="{{route('users.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">User Name</label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputName1" placeholder="Name">
                                </div>
                                @error('name')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Email</label>
                                    <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail3" placeholder="Email">
                                </div>
                                @error('email')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Password</label>
                                    <input type="password" name="password" value="{{old('password')}}" class="form-control" id="exampleInputEmail3" placeholder="password">
                                </div>
                                @error('email')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleSelectGender">Role</label>
                                        <select name="role" class="form-control" id="exampleSelectGender">
                                            <option value="none" selected disabled hidden>Select a Role</option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>
                                    @error('role')
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary me-2 btn-sm">
                                    <i class="mdi mdi-file-check btn-icon-prepend"></i>
                                    Submit
                                </button>
                                <button class="btn btn-outline-secondary btn-icon-text">Cancel</button>
                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        @endsection
        @section('js')
        <!-- plugins:js -->
        <script src="{{asset('assets/vendors/base/vendor.bundle.base.js')}}"></script>
        <!-- endinject -->
        <!-- inject:js -->
        <script src="{{asset('assets/js/off-canvas.js')}}"></script>
        <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
        <script src="{{asset('assets/js/template.js')}}"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="{{asset('assets/js/file-upload.js')}}"></script>
        @endsection
