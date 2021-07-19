<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubIndikator extends Model
{
    protected $table = "sub_indikator";
    public $timestamps = false;
    protected $fillable = ['tahun','nomor','nama','status','indikator_id'];

    public function indikator() {
        return $this->belongsTo(Indikator::class, "indikator_id","id");
    }
    
    public function raport_kpi() {
        return $this->hasMany(RaportKPI::class);
    }

    public function raportSekolah() {
        return $this->hasMany(RaportSekolah::class);
    }
}
