@extends('endUser.includes.app')
@section('title')
{{$product->name}}
@endsection
@section('meta_description')
{{$product->meta_description}}
@endsection
@section('meta_keyword')
{{$product->meta_keyword}}
@endsection
@section('content')
<!--we will add livewire here for add to cart or wishlist so we dont need to reload the page-->
<div>
@livewire('end-user.products.view', ['category' => $category, 'product' => $product])

</div>
@endsection
