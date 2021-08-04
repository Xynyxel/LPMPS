@extends('master')
@section('content')
    <style>
        h4 {
            margin: 0;
        }
    </style>
    {{-- content --}}
    <div class="container" style="padding: 1.25rem; display: flex; flex-grow:1; flex-direction: column; justify-content: space-evenly">
        <div class="row" style="padding: 1.25rem;">
            <div class="col-12">
                <h1 style="font-size: 2.5em;">
                    <b>
                        Lembaga Penjaminan Mutu Pendidikan (LPMP) Riau 
                    </b>
                </h1>
                <p style="font-size: 1.5em;" align="justify">
                    Bertugas untuk melaksanakan penjaminan mutu pendidikan dasar dan menengah berdasarkan kebijakan Menteri Pendidikan dan Kebudayaan
                </p>
            </div>
        </div>
        
        <div class="d-flex justify-content-between">
            
            {{-- admin --}}
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <h1 style="font-weight: bold">Admin</h1>
                            <span class='fa fa-user-cog fa-2x ml-2'></span>
                        </div>
                        
                        <p class="lead mb-0">
                            Pengelolaan untuk akun admin<br>
                            Berfokus dalam <b>mengelola data</b> dan
                            <b>memelihara data</b> dari berbagai sekolah
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
                        <div class="d-flex">
                            <h1 style="font-weight: bold">TPMPS</h1>
                            <span class='fa fa-user-plus fa-2x ml-2'></span>
                        </div>
                       
                        <p class="lead mb-0">
                            Pengelolaan untuk akun admin<br>
                            Berfokus dalam <b>mengirim data</b> seputar
                            sekolah seperti nilai raport sekolah, rencana untuk
                            meningkatakan kualitas sekolah, realisasi kerja dan
                            audit mutu 
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
                        <div class="d-flex">
                            <h1 style="font-weight: bold">Pengawas</h1>
                            <span class='fa fa-user-tie fa-2x ml-2'></span>
                        </div>
                        
                        <p class="lead mb-0">
                            Pengelolaan untuk akun Pengawas<br>
                            Berfokus dalam <b>mengawasi data</b> yang
                            diberikan sekolah serta <b> memeriksa dan memberikan masukan</b>
                            kepada masing-masing sekolah 
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
                        <div class="d-flex">
                            <h1 style="font-weight: bold">LPMP</h1>
                            <span class='fa fa-user-tie fa-2x ml-2'></span>
                        </div>
                        
                        <p class="lead mb-0">
                            Pengelolaan untuk akun LPMP<br>
                            Berfokus dalam <b>mengawasi data</b> yang 
                            diberikan sekolah serta <b> memeriksa dan memberikan masukan</b>
                            kepada semua sekolah 
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
