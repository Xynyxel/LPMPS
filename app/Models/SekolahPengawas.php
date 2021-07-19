<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SekolahPengawas extends Model
{
    protected $table = "sekolah_pengawas";
    public $timestamps = false;
    protected $fillable = ['tahun','tgl_sk','nomor_sk','sekolah_id','pengawas_id'];

    public function sekolah() {
        return $this->belongsTo(Sekolah::class,'sekolah_id','id');
    }

    public function pengawas() {
        return $this->belongsTo(Pengawas::class,'pengawas_id','id');
    }
}
