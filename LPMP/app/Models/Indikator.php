<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    protected $table = "indikator";
    public $timestamps = false;
    protected $fillable = ['tahun','nomor','nama','status','standar_id'];

    public function standar() {
        return $this->belongsTo(Standar::class, "standar_id","id");
    }

    public function subIndikator() {
        return $this->hasMany(SubIndikator::class);
    }

    public function akarMasalah() {
        return $this->hasMany(AkarMasalah::class);
    }
}
