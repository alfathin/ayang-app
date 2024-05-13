@extends('layout.main')

@section('container')
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-7">
            <div class="card p-5">
                <h1 class="text-center mb-5">Register</h1>
                <form method="POST">
                @csrf
                    <div class="mb-3">
                        <label for="Username" class="form-label">Username</label>
                        <input type="username" class="form-control" required id="username" aria-describedby="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" required name="email" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" required id="name" aria-describedby="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" required class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <p class="text-center mt-2">You have an account? <a href="/">login</a></p>
                </form>
            </div>
        </div>
    </div>
        
@endsection