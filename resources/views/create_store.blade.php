@extends('layout.main')

@section('container')
    
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-7">
            <div class="card p-5">
                <h1 class="text-center mb-5">{{ $titlePage }}</h1>
                <form method="POST">
                @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Store Name</label>
                        <input type="name" class="form-control" id="name" aria-describedby="name" required name="name">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
        
@endsection