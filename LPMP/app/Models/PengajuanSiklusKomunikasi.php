<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanSiklusKomunikasi extends Model
{
    protected $table = "pengajuan_siklus";
    public $timestamps = false;
    protected $fillable = ['nilai_koreksi','datetime','raport_sekolah_id'];

    public function raport_sekolah() {
        return $this->belongsTo(RaportSekolah::class);
    }
}
