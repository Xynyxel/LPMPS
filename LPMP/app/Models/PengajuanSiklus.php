<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanSiklus extends Model
{
    protected $table = "pengajuan_siklus";
    public $timestamps = false;
    protected $fillable = ['tanggal_pengajuan','status','tpmps_id','siklus_periode_id'];

    public function tpmps() {
        return $this->belongsTo(TPMPS::class);
    }

    public function siklus_periode() {
        return $this->belongsTo(SiklusPeriode::class);
    }
}
