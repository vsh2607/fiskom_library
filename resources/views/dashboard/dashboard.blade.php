@extends('base')

@section('content')

<style>
    /* Custom CSS to make the card body fill the screen */
    .card-body-full-height {
        min-height: 100vh;
    }
</style>

    <div class="row">
        <div class="col-3">
            <div class="card" style="background-color: #dcdbdb">
                <div class="card-body card-body-full-height">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="btn btn-danger btn-block mt-3" style="padding: 20px" href="{{ route('dashboard') }}">DASHBOARD</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-danger btn-block mt-3" style="padding: 20px" href="{{route('tambah-anggota')}}">PENDAFTARAN ANGGOTA</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-danger mt-3 btn-block" style="padding: 20px" href="#">PEMINJAMAN BUKU</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-danger mt-3 btn-block" style="padding: 20px" href="#">PENGEMBALIAN BUKU</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-danger mt-3 btn-block" style="padding: 20px" href="{{ route('list-buku') }}">DATA BUKU</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-danger mt-3 btn-block" style="padding: 20px" href="{{ route('list-anggota') }}">DATA ANGGOTA</a>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger mt-3 btn-block" style="padding: 20px">LOGOUT</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col">
            @include($menu)
        </div>
    </div>

@endsection
