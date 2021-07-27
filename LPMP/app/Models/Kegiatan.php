<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = "kegiatan";
    public $timestamps = false;
    protected $fillable = ['deskripsi','status','datetime','program_id'];
    
    public function program() {
        return $this->belongsTo(Program::class);
    }

    public function rencanaKerja() {
        return $this->hasMany(RencanaKerja::class);
    }

    public function realisasiKerja() {
        return $this->hasMany(RealisasiKerja::class);
    }
}
