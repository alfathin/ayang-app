@extends('layout.main')

@section('container')
    <h1>{{ $store->name }} Store</h1>
    <div class="text-end">
        <button type="button" class="btn btn-success mb-5" data-bs-toggle="modal" data-bs-target="#modal_form">
            Add Category
        </button>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
                {{ session('success') }}
            </div>
        </div>
    @endif


    <div class="modal fade" data-bs-backdrop="static" id="modal_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form" method="POST">
                    @csrf
                        <div class="mb-3">
                            <label for="category_product" class="form-label">Category Product</label>
                            <input type="text" class="form-control" id="name" placeholder="Category Product" name="name" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="form" id="save"><i class="fa fa-user"></i> Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <table class="table table-striped mb-5">
        <thead>
            <tr>
              <th scope="col" class="text-center">Category</th>
              <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)    
                <tr>
                    <td class="text-center">{{ $category->name }}</td>
                    <td class="text-end">
                        <a href="/storeCategory/{{ auth()->user()->store->id }}/{{ $category->id }}" class="btn btn-primary">Products Category</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection