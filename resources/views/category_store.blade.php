@extends('layout.main')

@section('container')

    <h1 class="mt-5 mb-5"> All {{ $titlePage }} </h1>

    <div class="text-end">
        <button type="button" class="btn btn-success mb-5" data-bs-toggle="modal" data-bs-target="#modal_form">
            Add Product
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
                    <h1 class="modal-title fs-5" id="modal_title">Add Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form" method="POST">
                    @csrf
                    {{-- @method('PUT') --}}
                        <div class="mb-3">
                            <label for="name_product" class="form-label">Name Product : </label>
                            <input type="text" class="form-control" id="name" placeholder="Name Product" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="price_product" class="form-label">Price : </label>
                            <input type="number" class="form-control" id="price" placeholder="Rp. " name="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="stock_product" class="form-label">Stock : </label>
                            <input type="number" class="form-control" id="stock" placeholder="Stock Product" name="stock" required>    
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

    <div class="modal fade" data-bs-backdrop="static" id="modal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modaltitle">Add Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formedit" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name_product" class="form-label">Name Product : </label>
                            <input type="text" class="form-control" id="nameE" placeholder="Name Product" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="price_product" class="form-label">Price : </label>
                            <input type="number" class="form-control" id="priceE" placeholder="Rp. " name="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="stock_product" class="form-label">Stock : </label>
                            <input type="number" class="form-control" id="stockE" placeholder="Stock Product" name="stock" required>    
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="formedit" id="save"><i class="fa fa-user"></i> Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-striped mb-5">
        <thead>
            <tr>
              <th scope="col" class="text-center">Product</th>
              <th scope="col" class="text-center">Category</th>
              <th scope="col" class="text-center">Price</th>
              <th scope="col" class="text-center">Stock</th>
              <th scope="col" class="text-center">Store</th>
              <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)    
                <tr>
                    <td class="text-center">{{ $product->name }}</td>
                    <td class="text-center">{{ $product->category->name }}</td>
                    <td class="text-center">Rp. {{ $product->price }}</td>
                    <td class="text-center">{{ $product->stock }}</td>
                    <td class="text-center">{{ $product->store->name }}</td>
                    <td class="text-end">
                        <button class="btn btn-warning" onclick="editProduct({{ $product->id }}, '{{ $product->name }}', '{{ $product->price }}', '{{ $product->stock }}')">Edit</button>
                        <button class="btn btn-danger" onclick="deleteProduct({{ $product->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function deleteProduct(productId) {
            if (confirm('Are you sure you want to delete this product?')) {
                fetch(`/deleteProduct/${productId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
            }
            location.reload();
        }

        function editProduct(id, name, price, stock) {
            $('#modaltitle').text('Edit Product');
            $('#product_id').val(id);
            $('#nameE').val(name);
            $('#priceE').val(price);
            $('#stockE').val(stock);
            $('#formedit').attr('action', '/editProduct/' + id);
            $('#modal_edit').modal('show');
        }
    </script>
    

@endsection