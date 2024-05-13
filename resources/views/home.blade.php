@extends('layout.main')

@section('container')
    @include('layout.carousel')

    @if(session()->has('success'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="row mb-5">
        @foreach ($products as $product)

            <div class="col-md-4 mb-4">
                <div class="card" style="width: 18rem;">
                    <img style="height: 350px;" src="{{ asset('image/productdummy.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Category : {{ $product->category->name }}</p>
                        <p class="card-text">Store : {{ $product->store->name }}</p>
                        <a href="#" class="btn btn-primary">Go Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
