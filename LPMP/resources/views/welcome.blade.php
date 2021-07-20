@extends('master')
@section('content')
    {{-- content --}}
    <div class="container">

        <div class="row">
            {{-- admin --}}
            <div class="col-md-2">
                <div class="card border-info mb-3" style="width: 30rem;">
                    <div class="card-body">
                        <h3>Admin</h3>
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
            <div class="col-md-2 offset-md-4">
                <div class="card border-info mb-3" style="width: 30rem;">
                    <div class="card-body">
                        <h3>TPMPS</h3>
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

        <div class="row" style="margin-top:100px">
            {{-- pengawas --}}
            <div class="col-md-2">
                <div class="card border-info mb-3" style="width: 30rem;">
                    <div class="card-body">
                        <h3>Pengawas</h3>
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
            <div class="col-md-2 offset-md-4">
                <div class="card border-info mb-3" style="width: 30rem;">
                    <div class="card-body">
                        <h3>LPMP</h3>
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
    <br>
    <br>
@endsection
