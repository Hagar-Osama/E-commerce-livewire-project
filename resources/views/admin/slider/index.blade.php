@extends('layouts.master')
@section('title')
Sliders
@endsection
@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Color
                        <a href="{{route('slider.create')}}" class="btn btn-primary float-end">Add Slider</a>
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
                                                Slider Title
                                            </th>
                                            <th>
                                                Description
                                            </th>
                                            <th>
                                                Image
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
                                        @forelse($sliders as $slider)
                                        <tr>
                                            <td>
                                                {{$loop->iteration}}
                                            </td>
                                            <td>
                                                {{$slider->title}}
                                            </td>
                                            <td>
                                                {{mb_substr($slider->description,0,70). '...'}}
                                            </td>
                                            <td>
                                               <img src="{{asset('storage/sliders/'.$slider->image)}}" style="width:70px; height: 70px;">
                                            </td>

                                            <td>
                                                @if($slider->status == 'visible')

                                                <p class="text-success">Visible</p>
                                                @else
                                                <p class="text-danger">Hidden</p>

                                                @endif
                                            </td>
                                            <td><a href="{{route('slider.edit',$slider->id)}}" class="btn-sm btn btn-outline-dark btn-fw">
                                                    Edit
                                                    <i class="mdi mdi-file-check btn-icon-append"></i>
                                                </a>
                                                <button class="btn btn-outline-danger btn-fw btn-sm" data-bs-toggle="modal" data-bs-target="#deleteSlider{{$slider->id}}">
                                                    <i class="mdi mdi-alert btn-icon-prepend"></i>
                                                    Delete
                                                </button>
                                            </td>
                                       @include('admin.slider.delete')
                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="text-danger">No Sliders Found</td>
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
