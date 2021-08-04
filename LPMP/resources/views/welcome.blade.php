@extends('master')
@section('content')
    <style>
        h4 {
            margin: 0;
        }
    </style>
    {{-- content --}}
    <div class="container" style="padding: 1.25rem; display: flex; flex-grow:1; flex-direction: column; justify-content: space-evenly">
        <div class="d-flex justify-content-between">
            {{-- admin --}}
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h1 style="font-weight: bold">Admin</h1>
                        <p class="lead mb-0">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen
                            book.
                        </p>
                        <br>
                        <a href="auth/login" class="btn btn-primary btn-lg">
                            <h4>Login</h4>
                        </a>
                    </div>
                </div>
            </div>
            {{-- tpmps --}}
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h1 style="font-weight: bold">TPMPS</h1>
                        <p class="lead mb-0">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen
                            book.
                        </p>
                        <br>
                        <a href="auth/loginTpmps" class="btn btn-primary btn-lg">
                            <h4>Login</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            {{-- pengawas --}}
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h1 style="font-weight: bold">Pengawas</h1>
                        <p class="lead mb-0">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen
                            book.
                        </p>
                        <br>
                        <a href="auth/loginPengawas" class="btn btn-primary btn-lg">
                            <h4>Login</h4>
                        </a>
                    </div>
                </div>
            </div>
            {{-- lpmp --}}
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h1 style="font-weight: bold">LPMP</h1>
                        <p class="lead mb-0">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen
                            book.
                        </p>
                        <br>
                        <a href="auth/loginLpmp" class="btn btn-primary btn-lg">
                            <h4>Login</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
