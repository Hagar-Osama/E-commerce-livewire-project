@extends('layouts.master')
@section('title')
Add Product
@endsection
@section('css')
@endsection
@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Product
                        <a href="{{route('product.index')}}" class="btn btn-inverse-primary btn-fw float-end">BACK</a>
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
                            <form class="forms-sample" method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">Product Name</label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputName1" placeholder="Name">
                                </div>
                                @error('name')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Product Slug</label>
                                    <input type="text" name="slug" value="{{old('slug')}}" class="form-control" id="exampleInputEmail3" placeholder="Slug">
                                </div>
                                @error('slug')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Quantity</label>
                                    <input type="number" name="qty" value="{{old('qty')}}" class="form-control" id="exampleInputEmail3" placeholder="quantity">
                                </div>
                                @error('qty')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Price</label>
                                    <input type="number" name="price" value="{{old('price')}}" class="form-control" id="exampleInputEmail3" placeholder="price">
                                </div>
                                @error('price')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Selling Price</label>
                                    <input type="number" name="selling_price" value="{{old('selling_price')}}" class="form-control" id="exampleInputEmail3" placeholder="selling price">
                                </div>
                                @error('selling_price')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleSelectGender">Brand Name</label>
                                    <select name="brand_id" class="form-control" id="exampleSelectGender">
                                        <option value="none" selected disabled hidden>Select a Brand</option>
                                        @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('brand_id')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleSelectGender">Category Name</label>
                                    <select name="category_id" class="form-control" id="exampleSelectGender">
                                        <option value="none" selected disabled hidden>Select a Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
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
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Trendy</label>
                                        <div class="col-sm-4">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="trendy" id="membershipRadios1" value="yes">
                                                    Yes
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="trendy" id="membershipRadios2" value="no">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>File upload</label>
                                    <input type="file" accept="image/*" name="images[]" class="file-upload-default" multiple />
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
                                <div class="form-group">
                                    <label for="exampleTextarea1">Brief</label>
                                    <textarea name="brief" class="form-control" id="exampleTextarea1" placeholder="brief about the product" rows="4">{{old('breif')}}</textarea>
                                </div>
                                @error('brief')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleTextarea1">Description</label>
                                    <textarea name="description" class="form-control" id="exampleTextarea1" rows="4" placeholder="description">{{old('description')}}</textarea>
                                </div>
                                @error('description')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <h3>SEO Tags</h3><br />
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Meta Title</label>
                                    <input type="text" name="meta_title" value="{{old('meta_title')}}" class="form-control" id="exampleInputPassword4" placeholder="Meta Title">
                                </div>
                                @error('meta_title')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleTextarea1">Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control" id="exampleTextarea1" placeholder="Meta keyword" rows="4">{{old('meta_keyword')}}</textarea>
                                </div>
                                @error('meta_keyword')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleTextarea1">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" id="exampleTextarea1" placeholder="Meta description" rows="4">{{old('meta_description')}}</textarea>
                                </div>
                                @error('meta_description')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
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
