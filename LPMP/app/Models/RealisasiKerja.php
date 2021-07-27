<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealisasiKerja extends Model
{
    protected $table = "realisasi_kerja";
    public $timestamps = false;
    protected $fillable = ['penanggung_jawab','pemangku_kepentingan','waktu_pelaksanaan','bukti_fisik_keterangan','bukti_fisik_url','status','datetime','kegiatan_id'];
    
    public function kegiatan() {
        return $this->belongsTo(Kegiatan::class);
    }
}
