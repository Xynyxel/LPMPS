<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramRekomendasi extends Model
{
    protected $table = "program_rekomendasi";
    public $timestamps = false;
    protected $fillable = ['program_id','rekomendasi_id'];
    
    public function rekomendasi() {
        return $this->belongsTo(Rekomendasi::class);
    }

    public function program() {
        return $this->belongsTo(Program::class);
    }
}
