@extends('layouts.standalone')

@section('title', 'Luzarre - Login')

@section('content')
<div class="container-fluid auth-page d-flex justify-content-center align-items-center min-vh-100">
    <div class="row justify-content-center w-100">
        <div class="col-lg-4 col-md-6 col-12">
            <div class="auth-box px-5">
                <h2 class="text-center mb-3 form-title">Login</h2>

                <!-- Error notification -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Success notification -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif


                <!-- Form Login -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <!-- Remember Me Checkbox -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                    <button type="submit" class="btn btn-dark w-100 mb-3">Login</button>
                </form>


                <!-- Link to register page -->
                <div class="text-center">
                    <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
