<?php

use Carbon\Carbon;
use App\Models\SiklusPeriode;
 
function siklus() {
    $today = Carbon::today();
    $date = $today->toDateString();
    return SiklusPeriode::orderBy('tanggal_mulai',"desc")
        ->where('tanggal_mulai','>=',$date)
        ->where('tanggal_selesai','<=',$date)
        ->first();
}