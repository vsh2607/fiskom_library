@extends('base')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">

            <div class="col-md-6">

                @if (session()->has('loginFailed'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginFailed') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="text-center">
                    <img src="{{ asset('logo/fiskom.png') }}" alt="Institution Logo" class="img-fluid rounded-circle"
                        style="max-width: 200px;">
                    <h4 class="mt-3">SISTEM INFORMASI ADMIN

                        PERPUSTAKAAN FAKULTAS SAINS DAN KOMPUTER

                        UNIVERSITAS KRISTEN IMMANUEL YOGYAKARTA</h4>
                </div>

                <div class="card bg-danger">

                    <div class="card-body">
                        <form action="/login" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control rounded-top" id="username" name="username"
                                    required placeholder="Masukkan username anda" value="{{ old('username') }}">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required
                                    placeholder="Masukkan password anda">
                            </div>
                            <button type="submit" class="btn btn-light btn-block mt-5">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
