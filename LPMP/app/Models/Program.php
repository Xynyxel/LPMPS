<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = "program";
    public $timestamps = false;
    protected $fillable = ['tahun','deskripsi','status','datetime','sekolah_id'];
    
    public function sekolah() {
        return $this->belongsTo(Sekolah::class);
    }

    public function programRekomendasi() {
        return $this->hasMany(ProgramRekomendasi::class);
    }

    public function kegiatan() {
        return $this->hasMany(Kegiatan::class);
    }
}
