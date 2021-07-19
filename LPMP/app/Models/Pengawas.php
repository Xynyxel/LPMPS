<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengawas extends Model
{
    protected $table = "pengawas";
    public $timestamps = false;
    protected $fillable = ['nama','username','password','asal'];
    
    public function sekolahPengawas() {
        return $this->hasMany(AkarMasalah::class);
    }
}
