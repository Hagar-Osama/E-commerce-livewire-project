@extends('layouts.master')
@section('title')
Colors
@endsection
@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Color
                        <a href="{{route('color.create')}}" class="btn btn-primary float-end">Add Color</a>
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
                                                Color Name
                                            </th>
                                            <th>
                                                Code
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
                                        @forelse($colors as $color)
                                        <tr>
                                            <td>
                                                {{$loop->iteration}}
                                            </td>
                                            <td>
                                                {{$color->name}}
                                            </td>
                                            <td>
                                                {{$color->code}}
                                            </td>

                                            <td>
                                                @if($color->status == 'visible')

                                                <p class="text-success">Visible</p>
                                                @else
                                                <p class="text-danger">Hidden</p>

                                                @endif
                                            </td>
                                            <td><a href="{{route('color.edit',$color->id)}}" class="btn-sm btn btn-outline-dark btn-fw">
                                                    Edit
                                                    <i class="mdi mdi-file-check btn-icon-append"></i>
                                                </a>
                                                <button class="btn btn-outline-danger btn-fw btn-sm" data-bs-toggle="modal" data-bs-target="#deleteColor{{$color->id}}">
                                                    <i class="mdi mdi-alert btn-icon-prepend"></i>
                                                    Delete
                                                </button>
                                            </td>
                                       @include('admin.color.delete')
                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="text-danger">No Colors Found</td>
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
