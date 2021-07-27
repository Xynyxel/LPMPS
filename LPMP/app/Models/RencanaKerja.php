<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencanaKerja extends Model
{
    protected $table = "rencana_kinerja";
    public $timestamps = false;
    protected $fillable = ['indikator_kinerja','volume','biaya','sumber_daya','is_dana_bos','status','datetime','kegiatan_id'];
    
    public function kegiatan() {
        return $this->belongsTo(Kegiatan::class);
    }
}
