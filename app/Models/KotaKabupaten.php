<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KotaKabupaten extends Model
{
    protected $table = "kota_kabupaten";
    public $timestamps = false;
    protected $fillable = ['nama'];

    public function sekolah() {
        return $this->hasMany(Sekolah::class);
    }

    public function raport_kpi() {
        return $this->hasMany(RaportKPI::class);
    }
}
