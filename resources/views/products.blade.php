@extends('layout.main')

@section('container')

    <h1 class="mt-5 mb-5"> All {{ $titlePage }} </h1>

    <div class="row mb-5">
        @foreach ($products as $product)

            <div class="col-md-4 mb-4">
                <div class="card" style="width: 18rem;">
                    <img style="height: 350px;" src="{{ asset('image/productdummy.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Rp. : {{ $product->price }}</p>
                        <a href="/product/{{ $product->id }}" class="btn btn-primary">Go Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection