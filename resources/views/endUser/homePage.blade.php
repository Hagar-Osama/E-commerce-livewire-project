@extends('endUser.includes.app')
@section('title')
E-commerce Website
@endsection
@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  <div class="carousel-inner">
    @foreach($sliders as $slider)
    <div class="carousel-item active">
      <img src="{{asset('storage/sliders/'.$slider->image)}}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>{{$slider->title}}</h1>
        <p>{{$slider->description}}</p>
      </div>
    </div>
 @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
@endsection

