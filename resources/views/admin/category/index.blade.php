@extends('layouts.master')
@section('title')
Categories
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
                        <a href="{{route('category.create')}}" class="btn btn-primary float-end">Add Category</a>
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
                                                Category Name
                                            </th>
                                            <th>
                                                Image
                                            </th>
                                            <th>
                                                Description
                                            </th>
                                            <th>
                                                Meta Title
                                            </th>
                                            <th>
                                                Meta keyword
                                            </th>
                                            <th>
                                                Meta Description
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                        <tr>
                                            <td>
                                                {{$loop->iteration}}
                                            </td>
                                            <td>
                                                {{$category->name}}
                                            </td>
                                            <td class="py-1">
                                                <img src="{{asset('storage/categories/'. $category->image)}}" alt="image" />
                                            </td>
                                            <td>
                                            {{$category->description}}
                                            </td>
                                            <td>
                                            {{$category->meta_title}}
                                            </td>
                                            <td>
                                            {{$category->meta_keyword}}
                                            </td>
                                            <td>
                                            {{$category->meta_description}}
                                            </td>
                                            <td>
                                                @if($category->status == 'visible')

                                                <p class="text-success">Visible</p>
                                                @else
                                                <p class="text-danger">Hidden</p>

                                                @endif
                                            </td>

                                        </tr>
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
    @endsection
    @section('js')
    @endsection
