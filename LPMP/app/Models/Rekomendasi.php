<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekomendasi extends Model
{
    protected $table = "rekomendasi";
    public $timestamps = false;
    protected $fillable = ['tahun','deskripsi','status','datetime','sekolah_id','indikator_id'];

    public function indikator() {
        return $this->belongsTo(Indikator::class, "indikator_id","id");
    }

    public function sekolah() {
        return $this->belongsTo(Sekolah::class, "sekolah_id","id");
    }

    public function programRekomendasi() {
        return $this->hasMany(ProgramRekomendasi::class);
    }
}
