@extends('layout.main')

@section('container')
    
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-7">
            <div class="card p-5">
                @if(session()->has('success'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                @if(session()->has('loginError'))
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                        {{ session('loginError') }}
                    </div>
                  </div>
                @endif
                        
                <h1 class="text-center mb-5">Login</h1>
                <form method="POST">
                @csrf
                    <div class="mb-3">
                        <label for="Username" class="form-label">Username</label>
                        <input type="username" class="form-control" id="username" aria-describedby="username" required name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" required class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <p class="text-center mt-2">You don't have an account? <a href="/register">register</a></p>
                </form>
            </div>
        </div>
    </div>
        
@endsection