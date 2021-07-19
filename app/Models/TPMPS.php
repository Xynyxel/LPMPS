<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TPMPS extends Model
{
    protected $table = "tpmps";
    public $timestamps = false;
    protected $fillable = ['nama','username','password','sekolah_id'];
    
    public function sekolah() {
        return $this->belongsTo(Sekolah::class, 'sekolah_id','id');
    }
}
