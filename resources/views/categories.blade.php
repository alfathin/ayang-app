@extends('layout.main')

@section('container')

<h1 class="mt-5 mb-5">All {{ $titlePage }}</h1>

<table class="table table-striped mb-5">
    <thead>
        <tr>
          <th scope="col" class="text-center">Kategori</th>
          <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)    
            <tr>
                <td class="text-center">{{ $category->name }}</td>
                <td class="text-end">
                    <a href="/categories/{{$category->name}}" class="btn btn-primary">Products Category</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    
@endsection