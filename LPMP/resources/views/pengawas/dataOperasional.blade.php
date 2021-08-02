@extends('pengawas/master')

@section('title', 'DataOperasional - Pengawas')
@section('content')
    <style>
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
                                        <th class="text-center" style="width: 20px;"><i class="fa fa-chevron-down"></i></th>
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
                                                <td class="text-center">
                                                    <div class="dropdown">
                                                        <a href="#"
                                                            class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill"
                                                            data-toggle="dropdown">
                                                            <i class="fa fa-bars"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a onclick="fillRaport({{ $sekolah->id }})"
                                                                class="dropdown-item" data-toggle="modal"
                                                                data-target="#raportSekolah">
                                                                <i class="fas fa-file-alt">
                                                                    <span>Raport Sekolah</span>
                                                                </i>
                                                            </a>
                                                            @if ($pengajuanSiklusstatus->status == 1)
                                                                <a href="/pengawas/dataOperasional/diproses/{{ $pengajuanSiklusstatus->id }}"
                                                                    class="dropdown-item">
                                                                    <i class="fas fa-tasks">
                                                                        <span>Diproses</span>
                                                                    </i>
                                                                </a>
                                                            @elseif($pengajuanSiklusstatus->status == 2)
                                                                <a href="/pengawas/dataOperasional/diterima/{{ $pengajuanSiklusstatus->id }}"
                                                                    class="dropdown-item">
                                                                    <i class="fas fa-check-square">
                                                                        <span>Diterima</span>
                                                                    </i>
                                                                </a>
                                                                <a href="/pengawas/dataOperasional/komunikasi/{{ $pengajuanSiklusstatus->id }}"
                                                                    class="dropdown-item">
                                                                    <i class="fas fa-comment-alt">
                                                                        <span>Komunikasi</span>
                                                                    </i>
                                                                </a>
                                                            @elseif($pengajuanSiklusstatus->status == 4)
                                                                <a href="" class="dropdown-item" data-toggle="modal"
                                                                    data-target="#comments"
                                                                    onclick="setID({{ $sekolah->id }})">
                                                                    <i class="fas fa-comments">
                                                                        <span>Komentar</span>
                                                                    </i>
                                                                </a>
                                                                <a href="/pengawas/dataOperasional/diterima/{{ $pengajuanSiklusstatus->id }}"
                                                                    class="dropdown-item">
                                                                    <i class="fas fa-check-square">
                                                                        <span>Diterima</span>
                                                                    </i>
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
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
                        <table class="table text-nowrap" id="table-raport-sekolah">
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

        const getData = async () => {
            const id = sessionStorage.getItem('sekolahID')
            const response = await fetch(`${url}/pengawas/comments/${id ? id : 0}`);
            const data = response.json();
            return new Promise(resolve => {
                resolve(data);
            });
        }

        const getComments = async () => {
            const listComment = document.getElementById('list-comments');
            const comments = await getData();
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
            getComments();
        }, 5000);

        getComments();

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
        const table = ['table-sekolah', 'table-raport-sekolah']
        $(document).ready(function() {
            table.forEach(id => {
                $(`#${id}`).DataTable();
            });
        });
    </script>
@endsection
