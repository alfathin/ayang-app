@extends('layout.main')

@section('style')
    <link rel="stylesheet" href="/css/product.css">
@endsection

@section('container')

    <div class="card mt-5 mb-5 p-5">
        <div class="row">
            <div class="col-md-4">
                <img style="height: 350px;" src="{{ asset('image/productdummy.jpg') }}">
            </div>
            <div class="col-md-6 text-start">
                <h2 class="card-title">{{ $product->name }}</h2>
                <br>
                <h5 class="card-text text-secondary">Price : Rp.{{ $product->price }}</h5>
                <h5 class="card-text text-secondary">Stock : {{ $product->stock }}</h5>
                <p class="card-text">Product Category: {{ $product->category->name }}</p>
                <p class="card-text">Store : {{ $product->store->name }}</p>
                <a href="/product/{{ $product->id }}" class="btn btn-success">Add to Cart</a>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        @foreach ($products as $product)

            <div class="col-md-4 mb-4">
                <div class="card" style="width: 18rem;">
                    <img style="height: 200px; widht: 200px;" src="{{ asset('image/productdummy.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Rp. : {{ $product->price }}</p>
                       <a href="/product/{{ $product->id }}" class="btn btn-success">Add to Cart</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection