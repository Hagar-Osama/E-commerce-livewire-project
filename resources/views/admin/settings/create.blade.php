@extends('layouts.master')
@section('title')
Add Seetings
@endsection
@section('css')
@endsection
@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Settings</h2>
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
                @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>

                @endif
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <form class="forms-sample" method="post" action="{{route('settings.store')}}">
                            @csrf
                            <div class="card mb-3">
                                <div class="card-header bg-primary">
                                    <h3 class="text-white mb-0">Website</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="exampleInputName1">Website Name</label>
                                            <input type="text" name="website_name" value="{{$settings->website_name ?? '' }}" class="form-control" id="exampleInputName1" placeholder="website Name">
                                        </div>
                                        @error('website_name')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="exampleInputEmail3">Website Url</label>
                                            <input type="text" name="website_url" value="{{$settings->website_url ?? ''}}" class="form-control" id="exampleInputEmail3" placeholder="Url">
                                        </div>
                                        @error('website_url')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="exampleInputEmail3">Page Title</label>
                                            <input type="text" name="page_title" value="{{$settings->page_title ?? ''}}" class="form-control" id="exampleInputEmail3" placeholder="Title">
                                        </div>
                                        @error('page_title')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="exampleTextarea1">Meta Keyword</label>
                                            <textarea name="meta_keyword"  class="form-control" id="exampleTextarea1" rows="4">{{$settings->meta_keyword ?? ''}}</textarea>
                                        </div>
                                        @error('meta_keyword')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="exampleTextarea1">Meta Description</label>
                                            <textarea name="meta_description"  class="form-control" id="exampleTextarea1" rows="4">{{$settings->meta_description ?? ''}}</textarea>
                                        </div>
                                        @error('meta_description')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header bg-primary">
                                    <h3 class="text-white mb-0">Website - Information</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="exampleInputName1">Phone 1</label>
                                            <input type="text" name="phone1" value="{{$settings->phone1 ?? ''}}" class="form-control" id="exampleInputName1" placeholder="phone">
                                        </div>
                                        @error('phone1')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <label for="exampleInputName1">Phone 2</label>
                                        <input type="text" name="phone2" value="{{$settings->phone2 ?? ''}}" class="form-control" id="exampleInputName1" placeholder="phone">
                                        @error('phone2')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="exampleInputEmail3">Email 1</label>
                                            <input type="email" name="email1" value="{{$settings->email1 ?? ''}}" class="form-control" id="exampleInputEmail3" placeholder="email 1">
                                        </div>
                                        @error('email1')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="exampleInputEmail3">Email 2</label>
                                            <input type="email" name="email2" value="{{$settings->email2 ?? ''}}" class="form-control" id="exampleInputEmail3" placeholder="email 1">
                                        </div>
                                        @error('email2')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="exampleTextarea1">Address</label>
                                            <textarea name="address"  class="form-control" id="exampleTextarea1" rows="4">{{$settings->address ?? ''}}</textarea>
                                        </div>
                                        @error('address')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header bg-primary">
                                    <h3 class="text-white mb-0">Website - Social Media</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="exampleInputName1">Facebook (optional)</label>
                                            <input type="text" name="facebook" value="{{$settings->facebook ?? ''}}" class="form-control" id="exampleInputName1" placeholder="facbook">
                                        </div>
                                        @error('facebook')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <label for="exampleInputName1">Twitter (optional)</label>
                                        <input type="text" name="twitter" value="{{$settings->twitter ?? ''}}" class="form-control" id="exampleInputName1" placeholder="twiiter">

                                        @error('twitter')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="exampleInputEmail3">Instagram (optional)</label>
                                            <input type="text" name="instagram" value="{{$settings->instagram ?? ''}}" class="form-control" id="exampleInputEmail3" placeholder="instagram">
                                        </div>
                                        @error('instagram')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="exampleInputEmail3">Youtube (optional)</label>
                                            <input type="text" name="youtube" value="{{$settings->youtube ?? ''}}" class="form-control" id="exampleInputEmail3" placeholder="yotube">
                                        </div>
                                        @error('youtube')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
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
