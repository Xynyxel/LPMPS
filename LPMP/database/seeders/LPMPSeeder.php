<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LPMPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        php artisan migrate --path=/database/migrations/2021_07_13_135415_create_admin.php
        php artisan db:seed --class=LPMPSeeder
        */

    //     //admin
    //     DB::table('admin')->insert(['name' => 'admin', 'password'=> 'admin']);

    //     // Kota Kabupaten
    //     DB::table('kota_kabupaten')->insert(['nama' => 'Kabupaten Bengkalis']);
    //     DB::table('kota_kabupaten')->insert(['nama' => 'Kabupaten Indragri Hilir']);
    //     DB::table('kota_kabupaten')->insert(['nama' => 'Kabupaten Indragiri Hulu']);
    //     DB::table('kota_kabupaten')->insert(['nama' => 'Kabupaten Kampar']);
    //     DB::table('kota_kabupaten')->insert(['nama' => 'Kabupaten Kuantan Singingi']);
    //     DB::table('kota_kabupaten')->insert(['nama' => 'Kabupaten Pelalawan']);
    //     DB::table('kota_kabupaten')->insert(['nama' => 'Kabupaten Rokan Hilir']);
    //     DB::table('kota_kabupaten')->insert(['nama' => 'Kabupaten Rokan Hulu']);
    //     DB::table('kota_kabupaten')->insert(['nama' => 'Kabupaten Siak']);
    //     DB::table('kota_kabupaten')->insert(['nama' => 'Kabupaten Kepulauan']);
    //     DB::table('kota_kabupaten')->insert(['nama' => 'Kota Pekanbaru']);
    //     DB::table('kota_kabupaten')->insert(['nama' => 'Kota Dumai']);

    //     // Sekolah
    //     DB::table('sekolah')->insert([
    //         "nama" => "Sma Dharma Loka",
    //         "alamat" => "Jalan Arengka",
    //         "telefon" => "081234567890",
    //         "kota_kabupaten_id" => "11",
    //     ]);

    //     // Standar
    //     DB::table('standar')->insert([
    //         "tahun" => 2021,
    //         "nomor" => "1",
    //         "nama" => "Isi",
    //         "status" => 0,
    //     ]);

    //     DB::table('standar')->insert([
    //         "tahun" => 2021,
    //         "nomor" => "2",
    //         "nama" => "Proses",
    //         "status" => 0,
    //     ]);

    //     // Indikator
    //     DB::table('indikator')->insert([
    //         "tahun" => 2021,
    //         "nomor" => 1.1,
    //         "nama" => "Perangkat pembelajaran sesuai rumusan kompetensi lulusan",
    //         "status" => 0,
    //         "standar_id" => 1,
    //     ]);
    //     DB::table('indikator')->insert([
    //         "tahun" => 2021,
    //         "nomor" => "1.2",
    //         "nama" => "Kurikulum Tingkat Satuan Pendidikan dikembangkan sesuai prosedur ",
    //         "status" => 0,
    //         "standar_id" => 1,
    //     ]);
    //     DB::table('indikator')->insert([
    //         "tahun" => 2021,
    //         "nomor" => "2.1",
    //         "nama" => "Sekolah merencanakan proses pembelajaran sesuai ketentuan",
    //         "status" => 0,
    //         "standar_id" => 2,
    //     ]);
    //     DB::table('indikator')->insert([
    //         "tahun" => 2021,
    //         "nomor" => "2.2",
    //         "nama" => "Proses pembelajaran dilaksanakan dengan tepat",
    //         "status" => 0,
    //         "standar_id" => 2,
    //     ]);

    //     // Sub Indikator
    //     DB::table('sub_indikator')->insert([
    //         "tahun" => 2021,
    //         "nomor" => "1.1.1",
    //         "nama" => "Memuat karakteristik kompetensi sikap",
    //         "status" => 0,
    //         "indikator_id" => 1,
    //     ]);
    //     DB::table('sub_indikator')->insert([
    //         "tahun" => 2021,
    //         "nomor" => "1.1.2",
    //         "nama" => "Memuat karakteristik kompetensi pengetahuan ",
    //         "status" => 0,
    //         "indikator_id" => 1,
    //     ]);
    //     DB::table('sub_indikator')->insert([
    //         "tahun" => 2021,
    //         "nomor" => "2.1.1",
    //         "nama" => "Mengacu pada silabus yang telah dikembangkan ",
    //         "status" => 0,
    //         "indikator_id" => 3,
    //     ]);

    //     // Akar Masalah
    //     DB::table('akar_masalah')->insert([
    //         "tahun" => 2021,
    //         "deskripsi" => "Kompetensi guru dalam penyusunan perangkat pembelajaran kurang.",
    //         "status" => 0,
    //         "sekolah_id" => 1,
    //         "indikator_id" => 1,
    //     ]);
    //     DB::table('akar_masalah')->insert([
    //         "tahun" => Carbon::now()->isoFormat('YYYY'),
    //         "deskripsi" => "Kompetensi guru dalam penyusunan perangkat pembelajaran kurang",
    //         "status" => 0,
    //         "datetime" => Carbon::now(),
    //         "sekolah_id" => 1,
    //         "indikator_id" => 3,
    //     ]);
    //     DB::table('akar_masalah')->insert([
    //         "tahun" => Carbon::now()->isoFormat('YYYY'),
    //         "deskripsi" => "Pemahaman guru terkait kompetensi keterampilan belum menyeluruh",
    //         "status" => 0,
    //         "datetime" => Carbon::now(),
    //         "sekolah_id" => 1,
    //         "indikator_id" => 3,
    //     ]);
    //     DB::table('akar_masalah')->insert([
    //         "tahun" => Carbon::now()->isoFormat('YYYY'),
    //         "deskripsi" => "Visi, misi dan tujuan sekolah tidak fokus pada pencapaian kompetensi keterampilan",
    //         "status" => 0,
    //         "datetime" => Carbon::now(),
    //         "sekolah_id" => 1,
    //         "indikator_id" => 3,
    //     ]);

    //     //Masalah
    //     DB::table('masalah')->insert([
    //         "tahun" => Carbon::now()->isoFormat('YYYY'),
    //         "deskripsi" => "Perangkat pembelajaran  belum sepenuhnya memuat karakteristik kompetensi keterampilan",
    //         "status" => 0,
    //         "datetime" => Carbon::now(),
    //         "sekolah_id" => 1,
    //         "indikator_id" => 1,
    //     ]);
    //     DB::table('masalah')->insert([
    //         "tahun" => Carbon::now()->isoFormat('YYYY'),
    //         "deskripsi" => "Beban belajar belum sepenuhnya diatur berdasarkan bentuk pendalaman materi",
    //         "status" => 0,
    //         "datetime" => Carbon::now(),
    //         "sekolah_id" => 1,
    //         "indikator_id" => 3,
    //     ]);

    //     // // TPMPS
    //     DB::table('tpmps')->insert([
    //         "nama" => "TPMPS 1",
    //         "username" => 1,
    //         "password" => "12345",
    //         "sekolah_id" => 1,
    //     ]);

    //     // // Pengawas
    //     DB::table('pengawas')->insert([
    //         "nama" => "Pengawas 1",
    //         "username" => 1,
    //         "password" => "12345",
    //         "asal" => "Kampar",
    //     ]);
    //     DB::table('pengawas')->insert([
    //         "nama" => "Pengawas 2",
    //         "username" => 2,
    //         "password" => "12345",
    //         "asal" => "Kampar",
    //     ]);

    //     // // LPMP
    //     DB::table('lpmp')->insert([
    //         "nama" => "LPMP 1",
    //         "username" => 1,
    //         "password" => "12345",
    //     ]);

    //     // Siklus Periode
    //     DB::table('siklus_periode')->insert([
    //         "siklus" => 1,
    //         "tanggal_mulai" => Carbon::today(),
    //         "tanggal_selesai" => Carbon::tomorrow(),
    //     ]);
    //     DB::table('siklus_periode')->insert([
    //         "siklus" => 2,
    //         "tanggal_mulai" => Carbon::tomorrow(),
    //         "tanggal_selesai" => Carbon::today()->addDays(15),
    //     ]);
    //     DB::table('siklus_periode')->insert([
    //         "siklus" => 3,
    //         "tanggal_mulai" => Carbon::today()->addDays(15),
    //         "tanggal_selesai" => Carbon::today()->addDays(30),
    //     ]);
    //     DB::table('siklus_periode')->insert([
    //         "siklus" => 4,
    //         "tanggal_mulai" => Carbon::today()->addDays(30),
    //         "tanggal_selesai" => Carbon::today()->addDays(45),
    //     ]);

    //     // Sekolah-Pengawas
    //     DB::table('sekolah_pengawas')->insert([
    //         "tahun" => Carbon::now()->isoFormat('YYYY'),
    //         "tgl_sk" => Carbon::yesterday(),
    //         "nomor_sk" => "51915",
    //         "sekolah_id" => 1,
    //         "pengawas_id" => 1,
    //     ]);
    //     DB::table('sekolah_pengawas')->insert([
    //         "tahun" => Carbon::now()->isoFormat('YYYY'),
    //         "tgl_sk" => Carbon::yesterday(),
    //         "nomor_sk" => "51915",
    //         "sekolah_id" => 1,
    //         "pengawas_id" => 2,
    //     ]);

        // // Raport KPI
        // for($i = 1; $i <= 38; $i++) {
        //     DB::table('raport_kpi')->insert([
        //         "tahun" => Carbon::now()->isoFormat('YYYY'),
        //         "nilai_kpi" => 5,
        //         "kota_kabupaten_id" => 1,
        //         "sub_indikator_id" => $i,
        //     ]);
        // }

    //     // Raport Sekolah
    //     DB::table('raport_sekolah')->insert([
    //         "tahun" => Carbon::now()->isoFormat('YYYY'),
    //         "nilai" => 5.12,
    //         "sekolah_id" => 1,
    //         "sub_indikator_id" => 1,
    //     ]);
    //     DB::table('raport_sekolah')->insert([
    //         "tahun" => Carbon::now()->isoFormat('YYYY'),
    //         "nilai" => 5.53,
    //         "sekolah_id" => 1,
    //         "sub_indikator_id" => 2,
    //     ]);
    //     DB::table('raport_sekolah')->insert([
    //         "tahun" => Carbon::now()->isoFormat('YYYY'),
    //         "nilai" => 4.75,
    //         "sekolah_id" => 1,
    //         "sub_indikator_id" => 3,
    //     ]);

    //     //Rekomendasi
    //     DB::table('rekomendasi')->insert([
    //          "tahun" => Carbon::now()->isoFormat('YYYY'),
    //          "deskripsi" => "Perlu meningkatkan kompetensi guru dalam menyusun perangkat pembelajaran",
    //          "status" => 0,
    //          "datetime" => Carbon::now(),
    //          "sekolah_id" => 1,
    //          "indikator_id" => 1,
    //     ]);
    //     DB::table('rekomendasi')->insert([
    //         "tahun" => Carbon::now()->isoFormat('YYYY'),
    //         "deskripsi" => "Perlu meningkatkan pemahaman guru terkait kompetensi keterampilan secara menyeluruh",
    //         "status" => 0,
    //         "datetime" => Carbon::now(),
    //         "sekolah_id" => 1,
    //         "indikator_id" => 2,
    //    ]);
    //    DB::table('rekomendasi')->insert([
    //         "tahun" => Carbon::now()->isoFormat('YYYY'),
    //         "deskripsi" => "Perlu penyempurnaan visi,misi, dan tujuan sekolah agar fokus pada pencapaian kompetensi keterampilan",
    //         "status" => 0,
    //         "datetime" => Carbon::now(),
    //         "sekolah_id" => 1,
    //         "indikator_id" => 3,
    //     ]);
    }
}
