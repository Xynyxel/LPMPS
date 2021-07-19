<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RaportKPI extends Model
{
    protected $table = "raport_kpi";
    public $timestamps = false;
    protected $fillable = ['tahun','nilai_kpi','kota_kabupaten_id','sub_indikator_id'];

    public function kotakab() {
        return $this->belongsTo(KotaKabupaten::class,'kota_kabupaten_id','id');
    }

    public function sub_indikator() {
        return $this->belongsTo(Pengawas::class,'sub_indikator_id','id');
    }
}
