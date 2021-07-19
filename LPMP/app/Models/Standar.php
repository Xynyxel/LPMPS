<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Standar extends Model
{
    protected $table = "standar";
    public $timestamps = false;
    protected $fillable = ['tahun','nomor','nama','status'];

    public function indikator() {
        return $this->hasMany(Indikator::class);
    }
}
