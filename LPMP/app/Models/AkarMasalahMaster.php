<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkarMasalahMaster extends Model
{
    protected $table = "akar_masalah_master";
    public $timestamps = false;
    protected $fillable = ['tahun','deskripsi'];
}
