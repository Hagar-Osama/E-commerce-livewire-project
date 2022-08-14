@extends('layouts.master')
@section('title')
Edit Product
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
                            <form class="forms-sample" method="post" action="{{route('product.update')}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="productId" value="{{$product->id}}">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-seoTags" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">SEO TAGS</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-details" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">DETAILS</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-image" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Product Image</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-productColor" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Product Color</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <div class="form-group">
                                            <label for="exampleSelectGender">Category Name</label>
                                            <select name="category_id" class="form-control" id="exampleSelectGender">
                                                <option value="none" selected disabled hidden>Select a Category</option>
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{$category->id == $product->category->id ? 'selected': ""}}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('category_id')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="exampleSelectGender">Brand Name</label>
                                            <select name="brand_id" class="form-control" id="exampleSelectGender">
                                                <option value="none" selected disabled hidden>Select a Brand</option>
                                                @foreach($brands as $brand)
                                                <option value="{{$brand->id}}" {{$brand->id == $product->brand->id ? 'selected': ""}}>{{$brand->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('brand_id')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Product Slug</label>
                                            <input type="text" name="slug" value="{{$product->slug}}" class="form-control" id="exampleInputEmail3" placeholder="Slug">
                                        </div>
                                        @error('slug')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Brief</label>
                                            <textarea name="brief" class="form-control" id="exampleTextarea1" placeholder="brief about the product" rows="4">{{$product->brief}}</textarea>
                                        </div>
                                        @error('brief')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Description</label>
                                            <textarea name="description" class="form-control" id="exampleTextarea1" rows="4" placeholder="description">{{$product->description}}</textarea>
                                        </div>
                                        @error('description')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="tab-pane fade" id="pills-seoTags" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">Meta Title</label>
                                            <input type="text" name="meta_title" value="{{$product->meta_title}}" class="form-control" id="exampleInputPassword4" placeholder="Meta Title">
                                        </div>
                                        @error('meta_title')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Meta Keyword</label>
                                            <textarea name="meta_keyword" class="form-control" id="exampleTextarea1" placeholder="Meta keyword" rows="4">{{$product->meta_keyword}}</textarea>
                                        </div>
                                        @error('meta_keyword')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Meta Description</label>
                                            <textarea name="meta_description" class="form-control" id="exampleTextarea1" placeholder="Meta description" rows="4">{{$product->meta_description}}</textarea>
                                        </div>
                                        @error('meta_description')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="tab-pane fade" id="pills-details" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Product Name</label>
                                            <input type="text" name="name" value="{{$product->name}}" class="form-control" id="exampleInputName1" placeholder="Name">
                                        </div>
                                        @error('name')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Quantity</label>
                                            <input type="number" name="qty" value="{{$product->qty}}" class="form-control" id="exampleInputEmail3" placeholder="quantity">
                                        </div>
                                        @error('qty')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Price</label>
                                            <input type="number" name="price" value="{{$product->price}}" class="form-control" id="exampleInputEmail3" placeholder="price">
                                        </div>
                                        @error('price')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Selling Price</label>
                                            <input type="number" name="selling_price" value="{{$product->selling_price}}" class="form-control" id="exampleInputEmail3" placeholder="selling price">
                                        </div>
                                        @error('selling_price')
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
                                                            <input type="radio" class="form-check-input" name="status" id="membershipRadios1"
                                                            value="visible" {{$product->status == 'visible' ? 'checked' : ''}}>
                                                            Visible
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="status" id="membershipRadios2"
                                                            value="hidden" {{$product->status == 'hidden' ? 'checked' : ''}}>
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
                                                            <input type="radio" class="form-check-input" name="trendy" id="membershipRadios1" value="yes" {{$product->trendy == 'yes' ? 'checked' : 'no'}}>
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
                                    </div>
                                    <div class="tab-pane fade" id="pills-image" role="tabpanel" aria-labelledby="pills-contact-tab">
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
                                            @if($product->images)
                                            <div class="row">
                                                @foreach($product->images as $image)
                                                <div class="col-md-2">
                                                    <img src="{{asset('storage/products/'.$product->name.'/'. $image->image)}}" class="me-4 border" width="80px" height="80" />
                                                    <a href="{{route('product.image.delete', $image->id)}}" class="btn btn-inverse-warning btn-fw mt-3 btn-sm">Remove</a>
                                                </div>
                                                @endforeach
                                            </div>
                                            @else
                                            <div class="text-danger">No Image Available</div>
                                            @endif

                                        </div>
                                        @error('image')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="tab-pane fade" id="pills-productColor" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        <div class="form-check form-check-primary mb-3">
                                            <label class="form-check-label"></label>
                                            <div class="row">
                                                @forelse($colors as $color)
                                                <div class="col-md-3">
                                                    <div class="p-2 border">
                                                        <input type="checkbox" name="colors[{{$color->id}}]" class="form-check-input" value="{{$color->id}}">
                                                        {{$color->name}}<br>
                                                        Quantity: <input type="number" name="color_qty[{{$color->id}}]" style="width: 70px;border: 1px solid;">
                                                    </div>
                                                </div>

                                                @empty
                                                <div class="col-md-12">
                                                    <h1> Color Found</h1>
                                                </div>
                                                @endforelse
                                            </div>
                                            <div class="col-lg-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="table-responsive pt-3">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>

                                                                        <th>
                                                                            Color Name
                                                                        </th>
                                                                        <th>
                                                                            Color Quantity
                                                                        </th>
                                                                        <th>
                                                                            Delete
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @forelse($product->productColors as $productColor)
                                                                    <tr class="productColorTr">
                                                                        <td>
                                                                            {{$productColor->colors->name}}
                                                                        </td>
                                                                        <td><input type="number" class="colorQtyInput" value="{{$productColor->color_qty}}" style="width: 60px;">
                                                                            <button type="button" value="{{$productColor->id}}" class="productColorUpdateBtn btn-sm btn btn-warning btn-fw">
                                                                                Update
                                                                                <i class="mdi mdi-file-check btn-icon-append"></i>
                                                                            </button>
                                                                        </td>
                                                                        <td>
                                                                            <button type="button" value="{{$productColor->id}}" class="productColorDeleteBtn btn btn-danger btn-fw btn-sm">
                                                                                <i class="mdi mdi-alert btn-icon-prepend"></i>
                                                                                Delete
                                                                            </button>
                                                                        </td>
                                                                        @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
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
        <script>
$(document).ready(function () {

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $(document).on('click', '.productColorUpdateBtn', function () {

        var productId = "{{$product->id}}";
        var product_color_id = $(this).val();
        var color_qty = $(this).closest('.productColorTr').find('.colorQtyInput').val();
        if(color_qty <=0) {
             alert('quantity is requird');
             return false;
        }
            //this is the request data that will be used in the update productColorqty method
            var data = {
                'productId' : productId,
                'color_qty' : color_qty,
            };
            $.ajax ({
                type : "POST",
                url : "{{URL::to('product/update/productColor')}}/" + product_color_id,
                data: "data",
                dataType : "dataType",
                success : function(response) {
                    alert(response.message) //is the message that returned in thr repository
                }

            });


    });

    $(document).on('click', '.productColorDeleteBtn', function () {
                var product_color_id = $(this).val();
                var thisClick = $(this);
                thisClick.closest('.productColorTr').remove();

                $.ajax ({
                type : "GET",
                url : "{{URL::to('product/delete/productColor')}}/" + product_color_id,
                success : function(response) {
                    thisClick.closest('.productColorTr').remove();
                    alert(response.message) //is the message that returned in thr repository
                }

            });
            });


});

        </script>
        @endsection
