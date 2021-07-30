@extends('admin/master')

@section('title', 'Laporan')
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
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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
		const url = "{{URL::to('/')}}";

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
                const dataKekuatan = await Promise.all(dataIndikator.map(async data=>await Promise.all(data.map(async indikator=>await getData(`${url}/kekuatan/${indikator.id}`)))));
                const dataKelemahan = await Promise.all(dataIndikator.map(async data=>await Promise.all(data.map(async indikator=>await getData(`${url}/kelemahan/${indikator.id}`)))));
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
                console.log(allData);

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
        const table = ['table-sekolah']
        $(document).ready(function() {
            table.forEach(id => {
                $(`#${id}`).DataTable();
            });
        });
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
