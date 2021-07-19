<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaportSekolah extends Model
{
    protected $table = "raport_sekolah";
    public $timestamps = false;
    protected $fillable = ['tahun','nilai','sekolah_id','sub_indikator_id'];

    public function sekolah() {
        return $this->belongsTo(Sekolah::class,"sekolah_id","id");
    }

    public function subIndikator() {
        return $this->belongsTo(SubIndikator::class,"sub_indikator_id","id");
    }
}
