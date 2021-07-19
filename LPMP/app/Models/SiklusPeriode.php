<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiklusPeriode extends Model
{
    protected $table = "siklus_periode";
    public $timestamps = false;
    protected $fillable = ['siklus','tanggal_mulai','tanggal_selesai'];
}
