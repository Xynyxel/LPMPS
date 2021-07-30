<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaportSekolahKoreksi extends Model
{
    protected $table = "raport_sekolah_koreksi";
    public $timestamps = false;
    protected $fillable = ['nilai_koreksi','datetime','raport_sekolah_id'];

    public function raport_sekolah() {
        return $this->belongsTo(RaportSekolah::class);
    }

}
