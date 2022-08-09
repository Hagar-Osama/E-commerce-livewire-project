@extends('layouts.master')
@section('title')
Products
@endsection
@section('content')
<div>
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Category
                            <a href="{{route('product.create')}}" class="btn btn-primary float-end">Add Product</a>
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
                                                    Product Name
                                                </th>
                                                <th>
                                                    Category Name
                                                </th>
                                                <th>
                                                    Brand Name
                                                </th>
                                                <th>
                                                    Product Image
                                                </th>
                                                <th>
                                                    slug Name
                                                </th>
                                                <th>
                                                    Status
                                                </th>
                                                <th>
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($products as $product)
                                            <tr>
                                                <td>
                                                    {{$loop->iteration}}
                                                </td>
                                                <td>
                                                    {{$product->name}}
                                                </td>
                                                <td>
                                                    {{$product->category->name}}
                                                </td>
                                                <td>
                                                    {{$product->brand->name}}
                                                </td>
                                                <td>
                                                    @forelse($product->images as $image)
                                                    <img src="{{asset('storage/products/'.$product->name.'/'. $image->image)}}" width="60px" height="60px" alt="image" />
                                                    @empty
                                                    <div class="text-danger">No Image Available</div>
                                                    @endforelse
                                                </td>
                                                <td>
                                                    {{$product->slug}}
                                                </td>
                                                <td>
                                                    @if($product->status == 'visible')

                                                    <p class="text-success">Visible</p>
                                                    @else
                                                    <p class="text-danger">Hidden</p>

                                                    @endif
                                                </td>
                                                <td> <a href="{{route('product.edit', $product->id)}}" class="btn-sm btn btn-outline-dark btn-fw">
                                                        Edit
                                                        <i class="mdi mdi-file-check btn-icon-append"></i>
                                                    </a>
                                                    <form action="{{route('product.destroy')}}" method="post" style="display:inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="productId" value="{{$product->id}}">
                                                        <button onclick="return confirm('Are You Sure You Want to delete this data')" class="btn btn-outline-danger btn-fw btn-sm">
                                                            <i class="mdi mdi-alert btn-icon-prepend"></i>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>

                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="7" class="text-danger">No products Found</td>
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
        @foreach($products as $product)
        @push('script')
        <script>
            window.addEventListener('close-modal', event => {
                $('#editBrand').modal('hide');
                $('#deleteBrand{{$product->id}}').modal('hide');

            });
        </script>
        @endpush
        @endforeach
        @endsection
