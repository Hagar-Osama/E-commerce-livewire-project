@extends('endUser.includes.app')
@section('title')
User Profile
@endsection
@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h4>User Profile
                <a href="{{route('ChangePassword.index')}}" class="btn btn-warning float-end">Change Password</a>
                </h4>
                <div class="underline mb-4">
                </div>
            </div>
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header bg-primary">
                        <h4 class="mb-0 text white">User Details
                        </h4>
                    </div>
                    <div class="card-body">
                        <form class="forms-sample" method="post" action="{{route('profile.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="md-3">
                                        <label>User Name</label>
                                        <input type="text" name="name" value="{{auth()->user()->name}}" class="form-control" placeholder="Name">
                                    </div>
                                    @error('name')
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="md-3">
                                        <label>User Email</label>
                                        <input type="email" name="email" readonly value="{{auth()->user()->email}}" class="form-control" placeholder="Email">
                                    </div>
                                    @error('email')
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="md-3">
                                        <label>User Phone</label>
                                        <input type="text" name="phone"  value="{{auth()->user()->profile->phone ?? ''}}" class="form-control" placeholder="Phone">
                                    </div>
                                    @error('phone')
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="md-3">
                                        <label>Zip/Pin code</label>
                                        <input type="text" name="zip_code" value="{{auth()->user()->profile->zip_code ?? ''}}" class="form-control" placeholder="Zip Code">
                                    </div>
                                    @error('zip_code')
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="md-3">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control" rows="3" placeholder="Address">{{auth()->user()->profile->address ?? ''}}</textarea>
                                    </div>
                                    @error('address')
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mt-3 btn-sm">
                                    <i class="mdi mdi-file-check btn-icon-prepend"></i>
                                    Submit
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection
