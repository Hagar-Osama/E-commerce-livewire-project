@extends('layouts.master')
@section('title')
Add Slider
@endsection
@section('css')
@endsection
@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Slider
                        <a href="{{route('slider.index')}}" class="btn btn-inverse-primary btn-fw float-end">BACK</a>
                    </h2>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" method="post" action="{{route('slider.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">Slider Title</label>
                                    <input type="text" name="title" value="{{old('title')}}" class="form-control" id="exampleInputName1" placeholder="Title">
                                </div>
                                @error('title')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleTextarea1">Description</label>
                                    <textarea name="description" class="form-control" id="exampleTextarea1" rows="4">{{old('description')}}</textarea>
                                </div>
                                @error('description')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="form-group">
                                    <label>File upload</label>
                                    <input type="file" name="image" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-info" type="button">
                                                <i class="mdi mdi-upload btn-icon-prepend"></i>
                                                Upload
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                @error('image')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-4">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="status" id="membershipRadios1" value="visible">
                                                    Visible
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="status" id="membershipRadios2" value="hidden">
                                                    Hidden
                                                </label>
                                            </div>
                                        </div>
                                    </div>
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
