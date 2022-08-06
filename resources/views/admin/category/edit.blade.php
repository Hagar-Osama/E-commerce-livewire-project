@extends('layouts.master')
@section('title')
Edit Category
@endsection
@section('css')
@endsection
@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Category
                        <a href="{{route('category.index')}}" class="btn btn-inverse-primary btn-fw float-end">BACK</a>
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
                            <form class="forms-sample" method="post" action="{{route('category.update')}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="catId" value="{{$category->id}}">
                                <div class="form-group">
                                    <label for="exampleInputName1">Name</label>
                                    <input type="text" name="name" value="{{$category->name}}" class="form-control" id="exampleInputName1" placeholder="Name">
                                </div>
                                @error('name')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Slug</label>
                                    <input type="text" name="slug" value="{{$category->slug}}" class="form-control" id="exampleInputEmail3" placeholder="Slug">
                                </div>
                                @error('slug')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <!-- <div class="form-group">
                                    <label for="exampleSelectGender">Status</label>
                                    <select name="status" class="form-control" id="exampleSelectGender">
                                        <option value="none" selected disabled hidden>Choose a status</option>
                                        <option value="visible">Visible</option>
                                        <option value="hidden">Hidden</option>
                                    </select>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-4">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="status" id="membershipRadios1" value="visible" @if($category->status == 'visible') checked @else "" @endif>
                                                    Visible
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="status" id="membershipRadios2" value="hidden" @if($category->status == 'hidden') checked @else "" @endif>
                                                    Hidden
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>File upload</label>
                                    <input type="file" name="image" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-danger" type="button">
                                                <i class="mdi mdi-upload btn-icon-prepend"></i>
                                                Upload
                                            </button>

                                        </span>
                                    </div>
                                    <img src="{{asset('storage/categories/'. $category->image)}}" width="80px" height="80" />
                                </div>
                                @error('image')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleTextarea1">Description</label>
                                    <textarea name="description" class="form-control" id="exampleTextarea1" rows="4">{{$category->description}}</textarea>
                                </div>
                                @error('description')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <h3>SEO Tags</h3><br />
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Meta Title</label>
                                    <input type="text" name="meta_title" value="{{$category->meta_title}}" class="form-control" id="exampleInputPassword4" placeholder="Meta Title">
                                </div>
                                @error('meta_title')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleTextarea1">Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control" id="exampleTextarea1" rows="4">{{$category->meta_keyword}}</textarea>
                                </div>
                                @error('meta_keyword')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleTextarea1">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" id="exampleTextarea1" rows="4">{{$category->meta_description}}</textarea>
                                </div>
                                @error('meta_description')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <button type="submit" class="btn btn-success me-2 btn-sm">
                                    <i class="mdi mdi-file-check btn-icon-prepend"></i>
                                    Update
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
