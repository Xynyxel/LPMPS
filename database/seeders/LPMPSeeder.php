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
        // // Kota Kabupaten
        // DB::table('kota_kabupaten')->insert(['nama' => 'Kabupaten Bengkalis']);
        // DB::table('kota_kabupaten')->insert(['nama' => 'Kabupaten Indragri Hilir']);
        // DB::table('kota_kabupaten')->insert(['nama' => 'Kabupaten Indragiri Hulu']);
        // DB::table('kota_kabupaten')->insert(['nama' => 'Kabupaten Kampar']);
        // DB::table('kota_kabupaten')->insert(['nama' => 'Kabupaten Kuantan Singingi']);
        // DB::table('kota_kabupaten')->insert(['nama' => 'Kabupaten Pelalawan']);
        // DB::table('kota_kabupaten')->insert(['nama' => 'Kabupaten Rokan Hilir']);
        // DB::table('kota_kabupaten')->insert(['nama' => 'Kabupaten Rokan Hulu']);
        // DB::table('kota_kabupaten')->insert(['nama' => 'Kabupaten Siak']);
        // DB::table('kota_kabupaten')->insert(['nama' => 'Kabupaten Kepulauan']);
        // DB::table('kota_kabupaten')->insert(['nama' => 'Kota Pekanbaru']);
        // DB::table('kota_kabupaten')->insert(['nama' => 'Kota Dumai']);

        // // Sekolah
        // DB::table('sekolah')->insert([
        //     "nama" => "Sma Dharma Loka",
        //     "alamat" => "Jalan Arengka",
        //     "telefon" => "081234567890",
        //     "kota_kabupaten_id" => "11",
        // ]);

        // // Standar
        // DB::table('standar')->insert([
        //     "tahun" => 2021,
        //     "nomor" => "1",
        //     "nama" => "Isi",
        //     "status" => 0,
        // ]);

        // DB::table('standar')->insert([
        //     "tahun" => 2021,
        //     "nomor" => "2",
        //     "nama" => "Proses",
        //     "status" => 0,
        // ]);

        // // Indikator
        // DB::table('indikator')->insert([
        //     "tahun" => 2021,
        //     "nomor" => 1.1,
        //     "nama" => "Perangkat pembelajaran sesuai rumusan kompetensi lulusan",
        //     "status" => 0,
        //     "standar_id" => 1,
        // ]);

        // DB::table('indikator')->insert([
        //     "tahun" => 2021,
        //     "nomor" => "1.2",
        //     "nama" => "Kurikulum Tingkat Satuan Pendidikan dikembangkan sesuai prosedur ",
        //     "status" => 0,
        //     "standar_id" => 1,
        // ]);

        // DB::table('indikator')->insert([
        //     "tahun" => 2021,
        //     "nomor" => "2.1",
        //     "nama" => "Sekolah merencanakan proses pembelajaran sesuai ketentuan",
        //     "status" => 0,
        //     "standar_id" => 2,
        // ]);

        // DB::table('indikator')->insert([
        //     "tahun" => 2021,
        //     "nomor" => "2.2",
        //     "nama" => "Proses pembelajaran dilaksanakan dengan tepat",
        //     "status" => 0,
        //     "standar_id" => 1,
        // ]);

        // // Sub Indikator
        // DB::table('sub_indikator')->insert([
        //     "tahun" => 2021,
        //     "nomor" => "1.1.1",
        //     "nama" => "Memuat karakteristik kompetensi sikap",
        //     "status" => 0,
        //     "indikator_id" => 1,
        // ]);

        // DB::table('sub_indikator')->insert([
        //     "tahun" => 2021,
        //     "nomor" => "1.1.2",
        //     "nama" => "Memuat karakteristik kompetensi pengetahuan ",
        //     "status" => 0,
        //     "indikator_id" => 1,
        // ]);

        // DB::table('sub_indikator')->insert([
        //     "tahun" => 2021,
        //     "nomor" => "2.1.1",
        //     "nama" => "Mengacu pada silabus yang telah dikembangkan ",
        //     "status" => 0,
        //     "indikator_id" => 2,
        // ]);

        // // Akar Masalah
        // DB::table('akar_masalah')->insert([
        //     "tahun" => 2021,
        //     "deskripsi" => "Kompetensi guru dalam penyusunan perangkat pembelajaran kurang.",
        //     "status" => 0,
        //     "sekolah_id" => 1,
        //     "indikator_id" => 1,
        // ]);

        // // TPMPS
        // DB::table('tpmps')->insert([
        //     "nama" => "TPMPS 1",
        //     "username" => 1,
        //     "password" => "12345",
        //     "sekolah_id" => 1,
        // ]);

        // // Pengawas
        // DB::table('pengawas')->insert([
        //     "nama" => "Pengawas 1",
        //     "username" => 1,
        //     "password" => "12345",
        //     "asal" => "Kampar",
        // ]);
        // DB::table('pengawas')->insert([
        //     "nama" => "Pengawas 2",
        //     "username" => 2,
        //     "password" => "12345",
        //     "asal" => "Kampar",
        // ]);

        // // LPMP
        // DB::table('lpmp')->insert([
        //     "nama" => "LPMP 1",
        //     "username" => 1,
        //     "password" => "12345",
        // ]);

        // Siklus Periode
        // DB::table('siklus_periode')->insert([
        //     "siklus" => 1,
        //     "tanggal_mulai" => Carbon::today(),
        //     "tanggal_selesai" => Carbon::tomorrow(),
        // ]);
        // DB::table('siklus_periode')->insert([
        //     "siklus" => 2,
        //     "tanggal_mulai" => Carbon::tomorrow(),
        //     "tanggal_selesai" => Carbon::today()->addDays(15),
        // ]);

        // Sekolah-Pengawas
        // DB::table('sekolah_pengawas')->insert([
        //     "tahun" => Carbon::now()->isoFormat('YYYY'),
        //     "tgl_sk" => Carbon::yesterday(),
        //     "nomor_sk" => "51915",
        //     "sekolah_id" => 1,
        //     "pengawas_id" => 2,
        // ]);
        // DB::table('sekolah_pengawas')->insert([
        //     "tahun" => Carbon::now()->isoFormat('YYYY'),
        //     "tgl_sk" => Carbon::yesterday(),
        //     "nomor_sk" => "51915",
        //     "sekolah_id" => 2,
        //     "pengawas_id" => 3,
        // ]);

        // Raport KPI
        // DB::table('raport_kpi')->insert([
        //     "tahun" => Carbon::now()->isoFormat('YYYY'),
        //     "nilai_kpi" => 86.1,
        //     "kota_kabupaten_id" => 4,
        //     "sub_indikator_id" => 1,
        // ]);

        // Raport Sekolah
        // DB::table('raport_sekolah')->insert([
        //     "tahun" => Carbon::now()->isoFormat('YYYY'),
        //     "nilai" => 86.1,
        //     "sekolah_id" => 1,
        //     "sub_indikator_id" => 2,
        // ]);
    }
}
