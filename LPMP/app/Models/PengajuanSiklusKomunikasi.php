<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanSiklusKomunikasi extends Model
{
    protected $table = "pengajuan_siklus_komunikasi";
    public $timestamps = false;
    protected $fillable = ['komentar','tanggal_komentar','status_pemberi_komentar','pengajuan_siklus_id'];

    public function pengajuan_siklus() {
        return $this->belongsTo(PengajuanSiklus::class);
    }
}
