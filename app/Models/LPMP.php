<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LPMP extends Model
{
    protected $table = "lpmp";
    public $timestamps = false;
    protected $fillable = ['nama','username','password'];
}
