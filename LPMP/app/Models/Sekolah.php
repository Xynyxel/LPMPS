<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $table = "sekolah";
    public $timestamps = false;
    protected $fillable = ['nama','alamat','telefon', "kota_kabupaten_id"];

    public function kotakab() {
        return $this->belongsTo(KotaKabupaten::class,"kota_kabupaten_id","id");
    }

    public function raportSekolah() {
        return $this->hasMany(RaportSekolah::class);
    }

    public function sekolahPengawas() {
        return $this->hasMany(AkarMasalah::class);
    }
    
    public function tpmps() {
        return $this->hasOne(TPMPS::class);
    }

    public function masalah() {
        return $this->hasMany(Masalah::class);
    }

    public function akarMasalah() {
        return $this->hasMany(AkarMasalah::class);
    }

    public function rekomendasi() {
        return $this->hasMany(Rekomendasi::class);
    }
}
