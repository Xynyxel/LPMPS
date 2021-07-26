@extends('admin/master')

@section('title', 'Laporan')
@section('content')
    <style>
        #data1 td {
            vertical-align: text-top;
        }
        .modal-big {
            min-width: 80vw!important;
        }
    </style>
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
                                                <td class="text-center">
                                                    <div class="dropdown">
                                                        <a href="#"
                                                            class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill"
                                                            data-toggle="dropdown">
                                                            <i class="fa fa-bars"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            @for ($i = 1; $i <= 4; $i++)
                                                            <a onclick="liatLaporanSiklus('{{ $sekolah->nama }}',{{ $sekolah->id }},{{ $i }})" class="dropdown-item"
                                                                data-toggle="modal" data-target="#sekolah">
                                                                <i class="fa fa-edit"></i>Siklus {{ $i }}
                                                            </a>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr align="center">
                                            <td colspan="5">Tidak ada sekolah</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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
                                    <th>Indikator</th>
                                    <th>SubIndikator</th>
                                    <th>Kekuatan</th>
                                    <th>Kelemahan</th>
                                    <th>Masalah</th>
                                    <th>Akar Masalah</th>
                                    <th>Rekomendasi</th>
                                </tr>
                                    
                            </thead>
                            <tbody id="data1">
                                <tr>
                                    <td>2. Isi</td>
                                    <td>2.1.	Perangkat pembelajaran sesuai rumusan kompetensi lulusan </td>
                                    <td>
                                        <ul>
                                            <li>2.1.1.	Memuat karakteristik kompetensi sikap</li>
                                            <li>2.1.2.	Memuat karakteristik kompetensi pengetahuan </li>
                                            <li>2.1.3.	Memuat karakteristik kompetensi keterampilan  </li>
                                            <li>2.1.4.	Menyesuaikan tingkat kompetensi siswa  </li>
                                            <li>2.1.5.	Menyesuaikan ruang lingkup materi pembelajaran </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>2.1.1.	Memuat karakteristik kompetensi sikap</li>
                                            <li>2.1.2.	Memuat karakteristik kompetensi pengetahuan </li>
                                            <li>2.1.4.	Menyesuaikan tingkat kompetensi siswa </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>2.1.3.	Memuat karakteristik kompetensi keterampilan </li>
                                        </ul>
                                    </td>
                                    <td>a</td>
                                    <td>a</td>
                                    <td>a</td>
                                </tr>
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
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="modal_title_2" class="modal-title">Laporan Sekolah nama sekolah </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive border-top-0">
                        <table class="table text-nowrap" id="table-raport-sekolah">
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
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="modal_title_3" class="modal-title">Laporan Sekolah nama sekolah </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive border-top-0">
                        <table class="table text-nowrap" id="table-raport-sekolah">
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
		const url = "{{URL::to('/')}}";

        const getAVG = async (id) => {
            const response = await fetch(`${url}/avgIndikator/${id}`);
            const data = response.json();
            return new Promise(resolve => {
                resolve(data);
            })
        }

        const getData = async (id) => {
            const response = await fetch(`${url}/siklus1/${id}`);
            const data = response.json();
            return new Promise(resolve => {
                resolve(data);
            })
        }

        const extractNilai = (parent) => {
            const text = parent.children[0].children[1].innerText.split(" ");
            return text[text.length-1].slice(1,text[text.length-1].length-1)
        }

        const setTable = (table, tr) => {
            let max = []
            let indikator = [];
            let subIndikator = [];
            for(let i = 0; i < tr[0].children.length; i++) {
                let parent = tr[0].children[i];
                let span = 1;
                let count = 0;
                for(let j = 1; j < tr.length; j++) {
                    let sub = tr[j].children[i-table[j]];
                    if(sub.innerHTML == parent.innerHTML && sub.innerHTML!="") {
                        span++;
                        table[j]++;
                        tr[j].removeChild(sub);
                    } else {
                        parent.rowSpan = span;
                        if(i == 0) {
                            max.push(span);
                        }
                        else if(i == 1) {
                            indikator.push([extractNilai(parent),parent.rowSpan])
                        }
                        else if(i == 2) {
                            subIndikator.push([extractNilai(parent), parent.children[0].children[1].innerText, j])
                        }
                        
                        parent = sub;
                        span = 1;
                    }
                }
                parent.rowSpan = span;
                if(i == 0) {
                    max.push(span);
                }
                else if(i == 1){
                    indikator.push([extractNilai(parent),parent.rowSpan])
                }
                else if(i == 2) {
                    subIndikator.push([extractNilai(parent), parent.children[0].children[1].innerText, tr.length-span+1])
                }
            }

            console.log(indikator, subIndikator);
            
            let count = 0, idx = 0, 
                kuat = 0,lemah = 0;
                
            for(let j = 0; j <= subIndikator.length; j++) {
                const kelemahan = document.getElementsByClassName('kelemahan')[subIndikator[j][2]-1];
                const kekuatan = document.getElementsByClassName('kekuatan')[subIndikator[j][2]-1];
                if(count == indikator[idx]) {
                    idx++;
                }
                if(indikator[i][0] < subIndikator[j][0]) {
                    kekuatan.innerHTML = subIndikator[j][1];
                    kekuatan.rowSpan = indikator[i][1];
                    document.getElementsByClassName('kelemahan')[subIndikator[j][2]-1]
                }
                else {
                    kelemahan.innerHTML = subIndikator[j][1];
                    kelemahan.rowSpan = indikator[i][1];
                }
                count++;
            }
        }
		
        const liatLaporanSiklus = async (namaSekolah, id, siklus) => {
            var laporanSekolahModal = new bootstrap.Modal(document.getElementById(`laporanSekolahSiklus${siklus}`), {
                keyboard: false
            })
            if(siklus == 1){
                const data = await getData(id);
                // console.log("siklus1");
                // console.log(data);
                const tbody = document.getElementById("data1");
                tbody.innerHTML = "";
                
                if(data.length > 0) {
                    let table = [];
                    let count = 0;
                    data.forEach(async (el,idx) => {
                        table.push(0);
                        tbody.innerHTML +=`
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <div class="mr-1">${el.nomor_standar}.</div>
                                        <div>${el.nama_standar}</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="mr-1">${el.nomor_indikator}.</div>
                                        <div class="indikator">${el.nama_indikator}</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="mr-1">${el.nomor_sub_indikator}.</div>
                                        <div>${el.nama_sub_indikator} (${el.nilai_raport})</div>
                                    </div>
                                </td>
                                <td class="kekuatan"></td>
                                <td class="kelemahan"></td>
                                <td>
                                    <div class="d-flex">
                                        <div class="mr-1">-</div>
                                        <div>${el.deskripsi_masalah}</div>
                                    </div></td>
                                <td>
                                    <div class="d-flex">
                                        <div class="mr-1">-</div>
                                        <div>${el.deskripsi_akar_masalah}</div>
                                    </div></td>
                                <td>
                                    <div class="d-flex">
                                        <div class="mr-1">-</div>
                                        <div>${el.deskripsi_rekomendasi}</div>
                                    </div></td>
                            </tr>`;

                        const result = await getAVG(el.id_indikator);
                        // console.log(`rata2 ${id}`);
                        // console.log(result)
                        if(result) {
                            const nama = document.getElementsByClassName("indikator")[idx];
                            nama.innerHTML +=` (${result.toFixed(2)})`;
                            count++;

                            if(count == data.length) {
                                setTable(table, tbody.children);
                            }
                        }
                    });
                }
                else {
                    tbody.innerHTML = `
                        <tr><td>tidak ada raport sekolah</td><tr>
                    `;
                }
                
                // fetch(`${url}/standar/${id}`)
                //     .then(response1=>response1.json())
                //     .then(dataStandar=>{
                //         console.log("standar");
                //         console.log(dataStandar);
                //         data.innerHTML = ""
                //         if(dataStandar.length > 0) {
                //             dataStandar.forEach((standar,idx) => {
                //                 data.innerHTML +=`
                //                 <tr>
                //                     <td>${standar.nomor}. ${standar.nama}</td>
                //                     <td><ul class="indikator"></ul></td>
                //                     <td><ul class="subIndikator"></ul></td>
                //                     <td><ul class="kekuatan"></ul></td>
                //                     <td><ul class="kelemahan"></ul></td>
                //                     <td><ul class="masalah"></ul></td>
                //                     <td><ul class="akarMasalah"></ul></td>
                //                     <td><ul class="rekomendasi"></ul></td>
                //                 </tr>`;

                //                 fetch(`${url}/indikator/${standar.id}`)
                //                     .then(response2=>response2.json())
                //                     .then(dataIndikator=>{ 
                //                         const indikatorClass = document.getElementsByClassName('indikator')[idx]
                //                         console.log("indikator");
                //                         console.log(dataIndikator);
                                        
                //                         dataIndikator.forEach((indikator) => {
                //                             indikatorClass.innerHTML += `<li>${indikator.nomor}. ${indikator.nama}</li>`;

                //                             fetch(`${url}/subIndikator/${indikator.id}`)
                //                                 .then(response3=>response3.json())
                //                                 .then(dataSubIndikator=>{ 
                //                                     console.log("subIndikator");
                //                                     console.log(dataSubIndikator);
                //                                     const SubIndikatorClass = document.getElementsByClassName('subIndikator')[idx]
                //                                     dataSubIndikator.forEach(subIndikator => {
                //                                         SubIndikatorClass.innerHTML += `<li>${subIndikator.nomor}. ${subIndikator.nama}</li>`;
                //                                     });
                //                                 });
                //                             fetch(`${url}/akarMasalah/${indikator.id}`)
                //                                 .then(response3=>response3.json())
                //                                 .then(dataAkarMasalah=>{ 
                //                                     console.log("akarMasalah");
                //                                     console.log(dataAkarMasalah);
                //                                     const akarMasalahClass = document.getElementsByClassName('akarMasalah')[idx]
                //                                     dataAkarMasalah.forEach(akarMasalah => {
                //                                         akarMasalahClass.innerHTML += `<li>${akarMasalah.deskripsi}</li>`;
                //                                     });
                //                                 });
                //                         });
                //                     });
                //             });
                //         } else {
                //             console.log("no standar");
                //         }
                //     });
                document.getElementById("modal_title_1").innerHTML = `Laporan <b>Pemetaan mutu</b> Sekolah ${namaSekolah}`;
                laporanSekolahModal.show();
            }else if(siklus == 2){
                document.getElementById("modal_title_2").innerHTML = `Laporan <b>Rencana Pemetaan mutu</b> Sekolah ${namaSekolah}`;
                laporanSekolahModal.show();
            }else if(siklus == 3){
                document.getElementById("modal_title_3").innerHTML = `Laporan <b>Pelaksanaan Pemetaan mutu</b> Sekolah ${namaSekolah} `;
                laporanSekolahModal.show();
            }else if(siklus == 4){
                document.getElementById("modal_title_4").innerHTML = `Laporan <b>Audit mutu</b> Sekolah ${namaSekolah} `;
                laporanSekolahModal.show();
            }
			
        }
    </script>
@endsection

@section('notification')
    <!-- Notifications -->
    <div id="notifications" class="modal modal-right fade" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-transparent border-0 align-items-center">
                    <h5 class="modal-title font-weight-semibold">Notifications</h5>
                    <button type="button" class="btn btn-icon btn-light btn-sm border-0 rounded-pill ml-auto"
                        data-dismiss="modal"><i class="icon-cross2"></i></button>
                </div>

                <div class="modal-body p-0">
                    <div class="bg-light text-muted py-2 px-3">New notifications</div>
                    <div class="p-3">
                        <div class="d-flex mb-3">
                            <a href="#" class="mr-3">
                                <img src="{{ asset('images/placeholders/placeholder.jpg') }}" width="36" height="36"
                                    class="rounded-circle" alt="">
                            </a>
                            <div class="flex-1">
                                <a href="#" class="font-weight-semibold">James</a> has completed the task <a href="#">Submit
                                    documents</a> from <a href="#">Onboarding</a> list

                                <div class="bg-light border rounded p-2 mt-2">
                                    <label class="custom-control custom-checkbox custom-control-inline mx-1">
                                        <input type="checkbox" class="custom-control-input" checked disabled>
                                        <del class="custom-control-label">Submit personal documents</del>
                                    </label>
                                </div>

                                <div class="font-size-sm text-muted mt-1">2 hours ago</div>
                            </div>
                        </div>

                        <div class="d-flex mb-3">
                            <a href="#" class="mr-3">
                                <img src="{{ asset('images/placeholders/placeholder.jpg') }}" width="36" height="36"
                                    class="rounded-circle" alt="">
                            </a>
                            <div class="flex-1">
                                <a href="#" class="font-weight-semibold">Margo</a> was added to <span
                                    class="font-weight-semibold">Customer enablement</span> channel by <a href="#">William
                                    Whitney</a>

                                <div class="font-size-sm text-muted mt-1">3 hours ago</div>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="mr-3">
                                <div class="bg-danger-100 text-danger rounded-pill">
                                    <i class="icon-undo position-static p-2"></i>
                                </div>
                            </div>
                            <div class="flex-1">
                                Subscription <a href="#">#466573</a> from 10.12.2021 has been cancelled. Refund case <a
                                    href="#">#4492</a> created

                                <div class="font-size-sm text-muted mt-1">4 hours ago</div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-light text-muted py-2 px-3">Older notifications</div>
                    <div class="p-3">
                        <div class="d-flex mb-3">
                            <a href="#" class="mr-3">
                                <img src="{{ asset('images/placeholders/placeholder.jpg') }}" width="36" height="36"
                                    class="rounded-circle" alt="">
                            </a>
                            <div class="flex-1">
                                <a href="#" class="font-weight-semibold">Christine</a> commented on your community <a
                                    href="#">post</a> from 10.12.2021

                                <div class="font-size-sm text-muted mt-1">2 days ago</div>
                            </div>
                        </div>

                        <div class="d-flex mb-3">
                            <a href="#" class="mr-3">
                                <img src="{{ asset('images/placeholders/placeholder.jpg') }}" width="36" height="36"
                                    class="rounded-circle" alt="">
                            </a>
                            <div class="flex-1">
                                <a href="#" class="font-weight-semibold">Mike</a> added 1 new file(s) to <a href="#">Product
                                    management</a> project

                                <div class="bg-light rounded p-2 mt-2">
                                    <div class="d-flex align-items-center mx-1">
                                        <div class="mr-2">
                                            <i class="icon-file-pdf text-danger icon-2x position-static"></i>
                                        </div>
                                        <div class="flex-1">
                                            new_contract.pdf
                                            <div class="font-size-sm text-muted">112KB</div>
                                        </div>
                                        <div class="ml-2">
                                            <a href="#"
                                                class="btn btn-dark-100 text-body btn-icon btn-sm border-transparent rounded-pill">
                                                <i class="icon-arrow-down8"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="font-size-sm text-muted mt-1">1 day ago</div>
                            </div>
                        </div>

                        <div class="d-flex mb-3">
                            <div class="mr-3">
                                <div class="bg-success-100 text-success rounded-pill">
                                    <i class="icon-calendar3 position-static p-2"></i>
                                </div>
                            </div>
                            <div class="flex-1">
                                All hands meeting will take place coming Thursday at 13:45. <a href="#">Add to calendar</a>

                                <div class="font-size-sm text-muted mt-1">2 days ago</div>
                            </div>
                        </div>

                        <div class="d-flex mb-3">
                            <a href="#" class="mr-3">
                                <img src="{{ asset('images/placeholders/placeholder.jpg') }}" width="36" height="36"
                                    class="rounded-circle" alt="">
                            </a>
                            <div class="flex-1">
                                <a href="#" class="font-weight-semibold">Nick</a> requested your feedback and approval in
                                support request <a href="#">#458</a>

                                <div class="font-size-sm text-muted mt-1">3 days ago</div>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="mr-3">
                                <div class="bg-primary-100 text-primary rounded-pill">
                                    <i class="icon-people position-static p-2"></i>
                                </div>
                            </div>
                            <div class="flex-1">
                                <span class="font-weight-semibold">HR department</span> requested you to complete internal
                                survey by Friday

                                <div class="font-size-sm text-muted mt-1">3 days ago</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /notifications -->
@endsection
