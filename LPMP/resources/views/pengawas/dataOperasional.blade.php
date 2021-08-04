@extends('pengawas/master')

@section('title', 'DataOperasional - Pengawas')
@section('content')
    <style>
        #data1 td, #data2 td, #data3 td, #data4 td {
            vertical-align: text-top;
        }
        .modal {
            overflow-y: auto;
        }
        .modal-big {
            min-width: 90vw!important;
        }
        .modal-small{
            width: fit-content!important;
        }
        #fab {
            position: fixed;
            bottom: 0;
            right: 0;
            margin: 30px;
            padding: 20px;
            border: 1px solid black;
            border-radius: 50%;
            color: white;
            outline: none;
        }

        #modal-custom {
            overflow-y: auto;
            max-height: 50vh !important;
        }

        .comment-container {
            display: flex;
            flex-direction: column;
            margin-top: 25px;
        }

        .comment-header {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            font-weight: bold;
            font-size: 1.2em;
        }

        .comment-body {
            display: flex;
        }

        .comment {
            padding: 10px;
            border: 1px solid #ddd;
            width: 80%;
            border-radius: 10px;
        }

        .date {
            display: flex;
            flex-direction: column;
        }

        #editor {
            width: 100%;
        }

        .ck-content {
            min-height: 100px;
        }

        .left {
            display: flex;
            width: 100%;
        }

        .left .comment-header {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 10px;
        }

        .left .comment-body {
            justify-content: flex-start;
            align-items: center;
        }

        .left .comment {
            margin-right: 20px;
        }

        .left .date {
            align-items: flex-start;
        }

        .right {
            display: flex;
            width: 100%;
        }

        .right .comment-header {
            display: flex;
            justify-content: flex-end;
        }

        .right .comment-body {
            justify-content: flex-end;
            align-items: center;
        }

        .right .comment {
            margin-left: 20px;
        }

        .right .date {
            align-items: flex-end;
        }

    </style>
    <!-- Content area -->
    <div class="content container pt-3">
        {{-- Table Sekolah --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="card-title font-weight-semibold">Data Sekolah</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border-top-0">
                            <table class="table text-nowrap" id="table-sekolah">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Sekolah</th>
                                        <th>Status</th>
                                        <th>Capaian Siklus </th>
                                        <th>Kelola Pengajuan SPMI</th>
                                        
                                        {{-- <th class="text-center" style="width: 20px;"><i class="fa fa-chevron-down"></i></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($listSekolah->count() > 0)
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($listSekolah as $sekolah)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $sekolah->nama }}</td>
                                                <td>
                                                    @php
                                                        $cek = false;
                                                        $pengajuanSiklusstatus="";
                                                    @endphp
                                                    @foreach ($listPengajuanSiklus as $pengajuanSiklus)
                                                        @if ($pengajuanSiklus->tpmps->id == $sekolah->id)
                                                            @php
                                                                $cek = true;
                                                                $pengajuanSiklusstatus = $pengajuanSiklus;
                                                            @endphp
                                                            @if ($pengajuanSiklus->status == 1)
                                                                <span
                                                                    class="badge badge-primary-100 text-primary">Diajukan</span>
                                                            @elseif($pengajuanSiklus->status == 2)
                                                                <span class="badge badge-info-100 text-info">Diproses</span>
                                                            @elseif($pengajuanSiklus->status == 3)
                                                                <span
                                                                    class="badge badge-success-100 text-success">Diterima</span>
                                                            @elseif($pengajuanSiklus->status == 4)
                                                                <span
                                                                    class="badge badge-warning-100 text-warning">Komunikasi
                                                                    koordinasi</span>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                    @if ($cek == false)
                                                        <span class="badge badge-secondary-100 text-secondary">Belum ada
                                                            status</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        @for ($i = 1; $i <= 2; $i++)
                                                            <a onclick="liatLaporanSiklus('{{ $sekolah->nama }}',{{ $sekolah->id }},{{ $i }})" class="btn btn-info mr-2">
                                                                Siklus {{ $i }}
                                                            </a>
                                                        @endfor
                                                    </div>
                                                    <div class="row mt-2">
                                                        @for ($i = 3; $i <= 4; $i++)
                                                            <a onclick="liatLaporanSiklus('{{ $sekolah->nama }}',{{ $sekolah->id }},{{ $i }})" class="btn btn-info mr-2">
                                                                Siklus {{ $i }}
                                                            </a>
                                                        @endfor
                                                    </div>
                                                </td>
                                                <td>
                                                    <a onclick="fillRaport({{ $sekolah->id }})"
                                                        class="btn btn-primary mb-2" data-toggle="modal"
                                                        data-target="#raportSekolah">
                                                        <i class="fas fa-file-alt">
                                                            <span>Raport Sekolah</span>
                                                        </i>
                                                    </a>
                                                    <br>
                                                    @if($pengajuanSiklusstatus != '')
                                                        @if ($pengajuanSiklusstatus->status == 1)
                                                            <a href="/pengawas/dataOperasional/diproses/{{ $pengajuanSiklusstatus->id }}"
                                                                class="btn btn-primary">
                                                                <i class="fas fa-tasks">
                                                                    <span>Diproses</span>
                                                                </i>
                                                            </a>
                                                        @elseif($pengajuanSiklusstatus->status == 2)
                                                        <a href="/pengawas/dataOperasional/diterima/{{ $pengajuanSiklusstatus->id }}"
                                                            class="btn btn-success mr-2">
                                                            <i class="fas fa-check-square">
                                                                <span>Diterima</span>
                                                            </i>
                                                        </a>
                                                        <a href="/pengawas/dataOperasional/komunikasi/{{ $pengajuanSiklusstatus->id }}"
                                                            class="btn btn-warning">
                                                            <i class="fas fa-comment-alt">
                                                                <span>Komunikasi</span>
                                                            </i>
                                                        </a>
                                                        @elseif($pengajuanSiklusstatus->status == 4)
                                                            <a href="" class="btn btn-warning mr-2" data-toggle="modal"
                                                                data-target="#comments"
                                                                onclick="setID({{ $sekolah->id }})">
                                                                <i class="fas fa-comments">
                                                                    <span>Komentar</span>
                                                                </i>
                                                            </a>
                                                            <a href="/pengawas/dataOperasional/diterima/{{ $pengajuanSiklusstatus->id }}"
                                                                class="btn btn-success">
                                                                <i class="fas fa-check-square">
                                                                    <span>Diterima</span>
                                                                </i>
                                                            </a>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Comments -->
    <div class="modal fade" id="comments" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Komentar</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4" id="modal-custom">
                    <div id="list-comments"></div>
                    <div style="height: 2px; background-color: #ddd; margin-top: 15px;"></div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <form action="/pengawas/comment" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="sekolah" id="sekolah">
                            <textarea id="editor" name="comment" rows="5"></textarea>
                            <input type="submit" class="btn btn-primary mt-3" value="Send">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Comments -->

    <!-- Modal Raport Sekolah -->
    <div class="modal fade" id="raportSekolah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Data Raport Sekolah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive border-top-0">
                        <table class="table" id="table-raport-sekolah">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Sub Indikator</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody id="data">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Raport Sekolah -->

    
    <!-- Modal Loading -->
    <div class="modal fade" id="loading" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-small" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border m-5" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Loading -->

    <!-- Modal Laporan Sekolah siklus 1 -->
    <div class="modal fade" id="laporanSekolahSiklus1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-big" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="modal_title_1" class="modal-title">Laporan Sekolah nama sekolah </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="border-top-0">
                        <table class="table" id="table-raport-sekolah" style="column-width: 10%;"> 
                            <thead>
                                <tr>
                                    <th>Standar</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="data1">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Okay</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Laporan Sekolah siklus 1 -->

    <!-- Modal Laporan Sekolah siklus 2 -->
    <div class="modal fade" id="laporanSekolahSiklus2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-big" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="modal_title_2" class="modal-title">Laporan Sekolah nama sekolah </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="border-top-0">
                        <table class="table" id="table-raport-sekolah">
                            <thead>
                                <tr>
                                    <th>Standar</th>
                                    <th>Rekomendasi</th>
                                    <th>Program</th>
                                    <th>Kegiatan</th>
                                    <th>Indikator Kinerja</th>
                                    <th>Volume</th>
                                    <th>Kebutuhan Biaya</th>
                                    <th>Sumber Daya</th>
                                </tr>
                            </thead>
                            <tbody id="data2">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Okay</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Laporan Sekolah siklus 2 -->

    <!-- Modal Laporan Sekolah siklus 3 -->
    <div class="modal fade" id="laporanSekolahSiklus3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-big" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="modal_title_3" class="modal-title">Laporan Sekolah nama sekolah </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="border-top-0">
                        <table class="table" id="table-raport-sekolah">
                            <thead>
                                <tr>
                                    <th>Standar</th>
                                    <th>Rekomendasi</th>
                                    <th>Program</th>
                                    <th>Kegiatan</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Pemangku Kepentingan yang Dilibatkan</th>
                                    <th>Waktu Pelaksanaan</th>
                                    <th>Bukti Fisik</th>
                                </tr>
                            </thead>
                            <tbody id="data3">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Okay</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Laporan Sekolah siklus 3 -->

    <!-- Modal Laporan Sekolah siklus 4 -->
    <div class="modal fade" id="laporanSekolahSiklus4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="modal_title_4" class="modal-title">Laporan Sekolah nama sekolah </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive border-top-0">
                        <table class="table text-nowrap" id="table-raport-sekolah">
                            <thead>
                                <tr>
                                    <th>Program</th>
                                    <th>Kegiatan</th>
                                    <th>Input</th>
                                    <th>Proses</th>
                                    <th>Output</th>
                                    <th>Outcome</th>
                                </tr>
                            </thead>
                            <tbody id="data4">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Okay</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Laporan Sekolah siklus 4 -->

    <script>
        const url = "{{ URL::to('/') }}";

        let editor;
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(newEditor => {
                editor = newEditor
            })
            .catch(error => {
                console.error(error);
            });

        const getDataComment = async () => {
            const id = sessionStorage.getItem('sekolahID')
            const response = await fetch(`${url}/pengawas/comments/${id ? id : 0}`);
            const data = response.json();
            return new Promise(resolve => {
                resolve(data);
            });
        }

        const getComments = async () => {
            const listComment = document.getElementById('list-comments');
            const comments = await getDataComment();
            listComment.innerHTML = "";
            if (comments.length > 0) {
                comments.forEach(comment => {
                    const arr = comment.tanggal_komentar.split(' ');
                    const direction = comment.status_pemberi_komentar == 2 ? "right" : "left"
                    listComment.innerHTML += `
                        <div class="comment-container ${direction}">
                            <div class="comment-header">
                                <span>${
                                    (comment.status_pemberi_komentar == 1) ? 
                                    "TPMPS" : (comment.status_pemberi_komentar == 2) ? 
                                    "Pengawas" : "LPMP"
                                }</span>
                            </div>
                            <div class="comment-body">
                                ${direction == "left" ? `
                                        <div class="comment">
                                            ${comment.komentar}
                                        </div>
                                        <h6 class="date">
                                            <span>${arr[0]}</span>
                                            <span>${arr[1]}</span>
                                        </h6>
                                    ` : `
                                        <h6 class="date">
                                            <span>${arr[0]}</span>
                                            <span>${arr[1]}</span>
                                        </h6>
                                        <div class="comment">
                                            ${comment.komentar}
                                        </div>
                                    `}
                            </div>
                        </div>
                    `;
                });
            } else {
                listComment.innerHTML = "<h1>Tidak ada komentar</h1>"
            }
        }

        const setID = (id) => {
            document.getElementById('sekolah').value = id;
            sessionStorage.setItem('sekolahID', id);
        }

        setInterval(() => {
            if(sessionStorage.getItem('sekolahID') > 0) {
                getComments();
            }
        }, 5000);

        if(sessionStorage.getItem('sekolahID') > 0) {
            getComments();
        }

        const fillRaport = (id) => {
            fetch(`${url}/sekolah/fillRaport/${id}`)
                .then(response => response.json())
                .then(data => {
                    $(document).ready(function() {
                        const raport = $(`#table-raport-sekolah`);
                        raport.DataTable().destroy();
                        raport.find('tbody').html("")
                        if (data.length > 0) {
                            data.forEach((element, index) => {
                                raport.find('tbody').append(`
                                    <tr>
                                        <td>${index+1}</td>
                                        <td>${element.sub_indikator}</td>
                                        <td>${element.nilai}</td>
                                    </tr>
                                `);
                            });
                        } else {
                            raport.DataTable()
                            raport.find('tbody').append(`
                                <tr align="center">
                                    <td colspan="3">Tidak ada raport sekolah</td>
                                </tr>
                            `);
                        }
                        raport.DataTable().draw();

                    });
                })
        }

        const getData = async (url) => {
            const response = await fetch(url);
            const data = response.json();
            return new Promise(resolve => {
                resolve(data);
            })
        }
		
        const liatLaporanSiklus = async (namaSekolah, id, siklus) => {
            var laporanSekolahModal = new bootstrap.Modal(document.getElementById(`laporanSekolahSiklus${siklus}`), {
                keyboard: false
            })
            var loadingModal = new bootstrap.Modal(document.getElementById('loading'), {
                keyboard: false
            })

            if(siklus == 1){
                loadingModal.show();
                const data = document.getElementById("data1");

                const dataStandar = await getData(`${url}/standar`);
                const dataIndikator = await Promise.all(dataStandar.map(async standar=>await getData(`${url}/indikator/${standar.id}`)));
                const dataSubIndikator = await Promise.all(dataIndikator.map(async data=>await Promise.all(data.map(async indikator=>await getData(`${url}/subIndikator/${indikator.id}/${id}`)))));
                const dataKekuatan = await Promise.all(dataIndikator.map(async data=>await Promise.all(data.map(async indikator=>await getData(`${url}/kekuatan/${indikator.id}/${id}`)))));
                const dataKelemahan = await Promise.all(dataIndikator.map(async data=>await Promise.all(data.map(async indikator=>await getData(`${url}/kelemahan/${indikator.id}/${id}`)))));
                const dataMasalah = await Promise.all(dataIndikator.map(async data=>await Promise.all(data.map(async indikator=>await getData(`${url}/masalah/${indikator.id}`)))));
                const dataAkarMasalah = await Promise.all(dataIndikator.map(async data=>await Promise.all(data.map(async indikator=>await getData(`${url}/akarMasalah/${indikator.id}`)))));
                const dataRekomendasi = await Promise.all(dataIndikator.map(async data=>await Promise.all(data.map(async indikator=>await getData(`${url}/rekomendasi/indikator/${indikator.id}`)))));

                const allData = [];
                for(let i = 0; i < dataStandar.length; i++) {
                    allData.push({
                        "standar": dataStandar[i],
                        "indikator": []
                    });
                    for(let j = 0; j < dataIndikator[i].length; j++) {
                        allData[i].indikator.push(dataIndikator[i][j]);
                        for(let k = 0; k < dataSubIndikator[i][j].length; k++) {
                            if(k == 0){
                                allData[i].indikator[j].subIndikator = [dataSubIndikator[i][j][k]];
                            }
                            else {
                                allData[i].indikator[j].subIndikator.push(dataSubIndikator[i][j][k]);
                            }
                        }
                        for(let k = 0; k < dataKekuatan[i][j].length; k++) {
                            if(k == 0){
                                allData[i].indikator[j].kekuatan = [dataKekuatan[i][j][k]];
                            }
                            else {
                                allData[i].indikator[j].kekuatan.push(dataKekuatan[i][j][k]);
                            }
                        }
                        for(let k = 0; k < dataKelemahan[i][j].length; k++) {
                            if(k == 0){
                                allData[i].indikator[j].kelemahan = [dataKelemahan[i][j][k]];
                            }
                            else {
                                allData[i].indikator[j].kelemahan.push(dataKelemahan[i][j][k]);
                            }
                        }
                        for(let k = 0; k < dataMasalah[i][j].length; k++) {
                            if(k == 0){
                                allData[i].indikator[j].masalah = [dataMasalah[i][j][k]];
                            }
                            else {
                                allData[i].indikator[j].masalah.push(dataMasalah[i][j][k]);
                            }
                        }
                        for(let k = 0; k < dataAkarMasalah[i][j].length; k++) {
                            if(k == 0){
                                allData[i].indikator[j].akarMasalah = [dataAkarMasalah[i][j][k]];
                            }
                            else {
                                allData[i].indikator[j].akarMasalah.push(dataAkarMasalah[i][j][k]);
                            }
                        }
                        for(let k = 0; k < dataRekomendasi[i][j].length; k++) {
                            if(k == 0){
                                allData[i].indikator[j].rekomendasi = [dataRekomendasi[i][j][k]]
                            }
                            else {
                                allData[i].indikator[j].rekomendasi.push(dataRekomendasi[i][j][k]);
                            }
                        }
                    }
                }

                data.innerHTML = ""
                if(allData.length > 0) {
                    let count = 0;
                    allData.forEach((el,idx)=>{
                        data.innerHTML +=`
                            <tr>
                                <td>${el.standar.nomor}. ${el.standar.nama}</td>
                                <td colspan="7">
                                    <table class="otherTable">
                                        <thead>
                                            <tr>
                                                <th>Indikator</th>
                                                <th>SubIndikator</th>
                                                <th>Kekuatan</th>
                                                <th>Kelemahan</th>
                                                <th>Masalah</th>
                                                <th>Akar Masalah</th>
                                                <th>Rekomendasi</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </td>
                            </tr>
                        `;
                        el.indikator.forEach(el2 => {
                            const otherTableClass = document.getElementsByClassName('otherTable')[idx]

                            otherTableClass.innerHTML += `
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <div class="mr-1">${el2.nomor}.</div>
                                            <div>${el2.nama} (${el2.nilai.toFixed(2)})</div>
                                        </div>
                                    </td>
                                    <td class="subIndikator"></td>
                                    <td class="kekuatan"></td>
                                    <td class="kelemahan"></td>
                                    <td class="masalah"></td>
                                    <td class="akarMasalah"></td>
                                    <td class="rekomendasi"></td>
                                </tr>
                            `
                            
                            const SubIndikatorClass = document.getElementsByClassName('subIndikator')[count]
                            const kekuatanClass = document.getElementsByClassName('kekuatan')[count]
                            const kelemahanClass = document.getElementsByClassName('kelemahan')[count]
                            const masalahClass = document.getElementsByClassName('masalah')[count]
                            const akarMasalahClass = document.getElementsByClassName('akarMasalah')[count]
                            const rekomendasiClass = document.getElementsByClassName('rekomendasi')[count]

                            if(el2.hasOwnProperty("subIndikator")) {
                                el2.subIndikator.forEach(subIndikator => {
                                    SubIndikatorClass.innerHTML += `
                                        <div class="d-flex">
                                            <div class="mr-1">${subIndikator.nomor}.</div>
                                            <div>${subIndikator.nama} (${subIndikator.nilai})</div>
                                        </div>
                                    `;
                                });
                            }

                            if(el2.hasOwnProperty("kekuatan")) {
                                el2.kekuatan.forEach(kekuatan => {
                                    kekuatanClass.innerHTML += `
                                        <div class="d-flex">
                                            <div class="mr-1">${kekuatan.nomor}.</div>
                                            <div>${kekuatan.nama} (${kekuatan.nilai})</div>
                                        </div>
                                    `;
                                });
                            }

                            if(el2.hasOwnProperty("kelemahan")) {
                                el2.kelemahan.forEach(kelemahan => {
                                    kelemahanClass.innerHTML += `
                                        <div class="d-flex">
                                            <div class="mr-1">${kelemahan.nomor}.</div>
                                            <div>${kelemahan.nama} (${kelemahan.nilai})</div>
                                        </div>
                                    `;
                                });
                            }

                            if(el2.hasOwnProperty("masalah")) {
                                el2.masalah.forEach(masalah => {
                                    masalahClass.innerHTML += `
                                        <div class="d-flex">
                                            <div class="mr-1">-</div>
                                            <div>${masalah.deskripsi}</div>
                                        </div>
                                        `;
                                });
                            }
                            
                            if(el2.hasOwnProperty("akarMasalah")) {
                                el2.akarMasalah.forEach(akarMasalah => {
                                    akarMasalahClass.innerHTML += `
                                        <div class="d-flex">
                                            <div class="mr-1">-</div>
                                            <div>${akarMasalah.deskripsi}</div>
                                        </div>
                                        `;
                                });
                            }
                            
                            if(el2.hasOwnProperty("rekomendasi")) {
                                el2.rekomendasi.forEach(rekomendasi => {
                                    rekomendasiClass.innerHTML += `
                                        <div class="d-flex">
                                            <div class="mr-1">-</div>
                                            <div>${rekomendasi.deskripsi}</div>
                                        </div>
                                        `;
                                });
                            }
                            count++;
                        });
                    })
                }
                else {
                    data.innerHTML +=`
                        <tr>
                            <td colspan="8">Tidak ada pemetaan mutu</td>
                        </tr>
                    `;
                }
                document.getElementById("modal_title_1").innerHTML = `Laporan <b>Pemetaan mutu</b> Sekolah ${namaSekolah}`;
                loadingModal.hide();
                laporanSekolahModal.show();
            } 
            else if(siklus == 2){
                loadingModal.show();
                const data = document.getElementById("data2");

                const dataStandar = await getData(`${url}/standar`);
                const dataRekomendasi = await Promise.all(dataStandar.map(async standar=>await getData(`${url}/rekomendasi/standar/${standar.id}/${id}`)));
                const dataProgram = await Promise.all(dataRekomendasi.map(async data=>await Promise.all(data.map(async rekomendasi=>await getData(`${url}/program/${rekomendasi.id}`)))));
                const dataKegiatan = await Promise.all(dataProgram.map(async data1=>await Promise.all(data1.map(async data2=>await Promise.all(data2.map(async program=>await getData(`${url}/kegiatan/${program.id}`)))))));
                const dataRencana = await Promise.all(dataKegiatan.map(async data1=>await Promise.all(data1.map(async data2=>await Promise.all(data2.map(async data3=>await Promise.all(data3.map(async kegiatan=>await getData(`${url}/rencanaKerja/${kegiatan.id}`)))))))));
                const allData = []
                for(let i = 0; i < dataStandar.length; i++) {
                    allData.push({
                        "standar": dataStandar[i]
                    });
                    for(let j = 0; j < dataRekomendasi[i].length; j++) {
                        if (j == 0) {
                            allData[i].rekomendasi = [dataRekomendasi[i][j]];
                        }
                        else {
                            let check = true;
                            for(let k = 0; k < allData[i].rekomendasi.length; k++) {
                                if (allData[i].rekomendasi[k] == dataRekomendasi[i][j].deskripsi) {
                                    check = false;
                                    break;
                                }
                            }
                            if (check) {
                                allData[i].rekomendasi.push(dataRekomendasi[i][j]);
                            }
                        }

                        for(let k = 0; k < dataProgram[i][j].length; k++) {
                            if (k == 0) {
                                allData[i].program = [dataProgram[i][j][k]];
                            }
                            else {
                                let check = true;
                                for(let l = 0; l < allData[idx].program.length; l++) {
                                    if (allData[i].program[l] == dataProgram[i][j][k].deskripsi) {
                                        check = false;
                                        break;
                                    }
                                }
                                if (check) {
                                    allData[i].program.push(dataProgram[i][j][k]);
                                }
                            }

                            for(let l = 0; l < dataKegiatan[i][j][k].length; l++) {
                                if (l == 0) {
                                    allData[i].kegiatan = [dataKegiatan[i][j][k][l]];
                                }
                                else {
                                    let check = true;
                                    for(let m = 0; m < allData[i].kegiatan.length; m++) {
                                        if (allData[i].kegiatan[l] == dataKegiatan[i][j][k][l].deskripsi) {
                                            check = false;
                                            break;
                                        }
                                    }
                                    if (check) {
                                        allData[i].kegiatan.push(dataKegiatan[i][j][k][l]);
                                    }
                                }

                                for(let m = 0; m < dataRencana[i][j][k][l].length; m++) {
                                    if (m == 0) {
                                        allData[i].rencana = [dataRencana[i][j][k][l][m]];
                                    }
                                    else {
                                        let check = true;
                                        for(let n = 0; n < allData[i].rencana.length; n++) {
                                            if (allData[i].rencana[l] == dataRencana[i][j][k][l][m].rencana) {
                                                check = false;
                                                break;
                                            }
                                        }
                                        if (check) {
                                            allData[i].rencana.push(dataRencana[i][j][k][l][m]);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                
                data.innerHTML = ""
                if(allData.length > 0) {
                    allData.forEach((el,idx) => {
                        data.innerHTML +=`
                            <tr>
                                <td>${el.standar.nomor}. ${el.standar.nama}</td>
                                <td class="rekomendasi2"></td>
                                <td class="program"></td>
                                <td class="kegiatan"></td>
                                <td class="indikatorKinerja"></td>
                                <td class="volume"></td>
                                <td class="kebutuhanBiaya"></td>
                                <td class="sumberDaya"></td>
                            </tr>
                        `;
                        const rekomendasiClass = document.getElementsByClassName('rekomendasi2')[idx];
                        const programClass = document.getElementsByClassName('program')[idx];
                        const kegiatanClass = document.getElementsByClassName('kegiatan')[idx];
                        const indikatorKinerjaClass = document.getElementsByClassName('indikatorKinerja')[idx]
                        const volumeClass = document.getElementsByClassName('volume')[idx]
                        const kebutuhanBiayaClass = document.getElementsByClassName('kebutuhanBiaya')[idx]
                        const sumberDayaClass = document.getElementsByClassName('sumberDaya')[idx]
                        
                        if(el.hasOwnProperty('rekomendasi')) {
                            el.rekomendasi.forEach(rekomendasi=>{
                                rekomendasiClass.innerHTML += `
                                    <div class="d-flex">
                                        <div class="mr-1">-</div>
                                        <div>${rekomendasi.deskripsi}</div>
                                    </div>
                                `;
                            })
                        }
                        
                        if(el.hasOwnProperty('program')) {
                            el.program.forEach(program=>{
                                programClass.innerHTML += `
                                    <div class="d-flex">
                                        <div class="mr-1">-</div>
                                        <div>${program.deskripsi}</div>
                                    </div>
                                `;
                            })
                        }
                        
                        if(el.hasOwnProperty('kegiatan')) {
                            el.kegiatan.forEach(kegiatan=>{
                                kegiatanClass.innerHTML += `
                                    <div class="d-flex">
                                        <div class="mr-1">-</div>
                                        <div>${kegiatan.deskripsi}</div>
                                    </div>
                                `;
                            })
                        }
                        
                        if(el.hasOwnProperty('rencana')) {
                            el.rencana.forEach(rencana=>{
                                indikatorKinerjaClass.innerHTML += `${rencana.indikator_kinerja}<br/><br/>`;
                                volumeClass.innerHTML += `${rencana.volume}<br/><br/>`;
                                kebutuhanBiayaClass.innerHTML += `${rencana.biaya}<br/><br/>`;
                                sumberDayaClass.innerHTML += `${rencana.is_dana_bos == 1 ? "Dana Bos" : ""}<br/>${rencana.sumber_daya}<br/><br/>`;
                            })
                        }
                    });
                }
                else {
                    data.innerHTML +=`
                        <tr>
                            <td colspan="8">Tidak ada rencana pemetaan mutu</td>
                        </tr>
                    `;
                }
                document.getElementById("modal_title_2").innerHTML = `Laporan <b>Rencana Pemetaan mutu</b> Sekolah ${namaSekolah}`;
                loadingModal.hide();
                laporanSekolahModal.show();
            }
            else if(siklus == 3){
                loadingModal.show();
                const data = document.getElementById("data3");

                const dataStandar = await getData(`${url}/standar`);
                const dataRekomendasi = await Promise.all(dataStandar.map(async standar=>await getData(`${url}/rekomendasi/standar/${standar.id}/${id}`)));
                const dataProgram = await Promise.all(dataRekomendasi.map(async data=>await Promise.all(data.map(async rekomendasi=>await getData(`${url}/program/${rekomendasi.id}`)))));
                const dataKegiatan = await Promise.all(dataProgram.map(async data1=>await Promise.all(data1.map(async data2=>await Promise.all(data2.map(async program=>await getData(`${url}/kegiatan/${program.id}`)))))));
                const dataRealisasi = await Promise.all(dataKegiatan.map(async data1=>await Promise.all(data1.map(async data2=>await Promise.all(data2.map(async data3=>await Promise.all(data3.map(async kegiatan=>await getData(`${url}/realisasiKerja/${kegiatan.id}`)))))))));
                const allData = []
                for(let i = 0; i < dataStandar.length; i++) {
                    allData.push({
                        "standar": dataStandar[i]
                    });
                    for(let j = 0; j < dataRekomendasi[i].length; j++) {
                        if (j == 0) {
                            allData[i].rekomendasi = [dataRekomendasi[i][j]];
                        }
                        else {
                            let check = true;
                            for(let k = 0; k < allData[i].rekomendasi.length; k++) {
                                if (allData[i].rekomendasi[k] == dataRekomendasi[i][j].deskripsi) {
                                    check = false;
                                    break;
                                }
                            }
                            if (check) {
                                allData[i].rekomendasi.push(dataRekomendasi[i][j]);
                            }
                        }

                        for(let k = 0; k < dataProgram[i][j].length; k++) {
                            if (k == 0) {
                                allData[i].program = [dataProgram[i][j][k]];
                            }
                            else {
                                let check = true;
                                for(let l = 0; l < allData[idx].program.length; l++) {
                                    if (allData[i].program[l] == dataProgram[i][j][k].deskripsi) {
                                        check = false;
                                        break;
                                    }
                                }
                                if (check) {
                                    allData[i].program.push(dataProgram[i][j][k]);
                                }
                            }

                            for(let l = 0; l < dataKegiatan[i][j][k].length; l++) {
                                if (l == 0) {
                                    allData[i].kegiatan = [dataKegiatan[i][j][k][l]];
                                }
                                else {
                                    let check = true;
                                    for(let m = 0; m < allData[i].kegiatan.length; m++) {
                                        if (allData[i].kegiatan[l] == dataKegiatan[i][j][k][l].deskripsi) {
                                            check = false;
                                            break;
                                        }
                                    }
                                    if (check) {
                                        allData[i].kegiatan.push(dataKegiatan[i][j][k][l]);
                                    }
                                }

                                for(let m = 0; m < dataRealisasi[i][j][k][l].length; m++) {
                                    if (m == 0) {
                                        allData[i].realisasi = [dataRealisasi[i][j][k][l][m]];
                                    }
                                    else {
                                        let check = true;
                                        for(let n = 0; n < allData[i].rencana.length; n++) {
                                            if (allData[i].realisasi[l] == dataRealisasi[i][j][k][l][m].rencana) {
                                                check = false;
                                                break;
                                            }
                                        }
                                        if (check) {
                                            allData[i].rencana.push(dataRealisasi[i][j][k][l][m]);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                
                data.innerHTML = ""
                if(allData.length > 0) {
                    allData.forEach((el,idx) => {
                        data.innerHTML +=`
                            <tr>
                                <td>${el.standar.nomor}. ${el.standar.nama}</td>
                                <td class="rekomendasi3"></td>
                                <td class="program3"></td>
                                <td class="kegiatan3"></td>
                                <td class="penanggungJawab"></td>
                                <td class="pemangku"></td>
                                <td class="waktuPelaksanaan"></td>
                                <td class="buktiFisik"></td>
                            </tr>
                        `;
                        const rekomendasiClass = document.getElementsByClassName('rekomendasi3')[idx];
                        const programClass = document.getElementsByClassName('program3')[idx];
                        const kegiatanClass = document.getElementsByClassName('kegiatan3')[idx];
                        const penanggungJawabClass = document.getElementsByClassName('penanggungJawab')[idx]
                        const pemangkuClass = document.getElementsByClassName('pemangku')[idx]
                        const waktuPelaksanaanClass = document.getElementsByClassName('waktuPelaksanaan')[idx]
                        const buktiFisikClass = document.getElementsByClassName('buktiFisik')[idx]
                        
                        if(el.hasOwnProperty('rekomendasi')) {
                            el.rekomendasi.forEach(rekomendasi=>{
                                rekomendasiClass.innerHTML += `
                                    <div class="d-flex">
                                        <div class="mr-1">-</div>
                                        <div>${rekomendasi.deskripsi}</div>
                                    </div>
                                `;
                            })
                        }
                        
                        if(el.hasOwnProperty('program')) {
                            el.program.forEach(program=>{
                                programClass.innerHTML += `
                                    <div class="d-flex">
                                        <div class="mr-1">-</div>
                                        <div>${program.deskripsi}</div>
                                    </div>
                                `;
                            })
                        }
                        
                        if(el.hasOwnProperty('kegiatan')) {
                            el.kegiatan.forEach(kegiatan=>{
                                kegiatanClass.innerHTML += `
                                    <div class="d-flex">
                                        <div class="mr-1">-</div>
                                        <div>${kegiatan.deskripsi}</div>
                                    </div>
                                `;
                            })
                        }
                        
                        if(el.hasOwnProperty('realisasi')) {
                            el.realisasi.forEach(realisasi=>{
                                penanggungJawabClass.innerHTML += `${realisasi.penanggung_jawab}<br/><br/>`;
                                pemangkuClass.innerHTML += `${realisasi.pemangku_kepentingan}<br/><br/>`;
                                waktuPelaksanaanClass.innerHTML += `${realisasi.waktu_pelaksanaan}<br/><br/>`;
                                buktiFisikClass.innerHTML += `${realisasi.bukti_fisik_keterangan}<br/><br/>`;
                            })
                        }
                    });
                }
                else {
                    data.innerHTML +=`
                        <tr>
                            <td colspan="8">Tidak ada pelaksanaan pemetaan mutu</td>
                        </tr>
                    `;
                }
                document.getElementById("modal_title_3").innerHTML = `Laporan <b>Pelaksanaan Pemetaan mutu</b> Sekolah ${namaSekolah} `;
                loadingModal.hide();
                laporanSekolahModal.show();
            }
            else if(siklus == 4){
                document.getElementById("modal_title_4").innerHTML = `Laporan <b>Audit mutu</b> Sekolah ${namaSekolah} `;
                laporanSekolahModal.show();
            }
			
        }
        const table = ['table-sekolah', 'table-raport-sekolah']
        $(document).ready(function() {
            table.forEach(id => {
                $(`#${id}`).DataTable();
            });
        });
    </script>
@endsection
