<?php

use Carbon\Carbon;

if (!function_exists('rupiah')) {
    function rupiah($angka)
    {

        $hasil_rupiah = "Rp. " . number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }
}

if (!function_exists('timecalc')) {
    function timecalc($start, $hour)
    {
        $start_time = Carbon::parse($start);
        $end_time = $start_time->addHours($hour);

        return Carbon::parse($end_time)->diffForHumans([
            'join' => ', ',
            'parts' => 2,
        ]);
    }
}

if (!function_exists('diffTime')) {
    function diffTime($start, $end)
    {
        $start_time = Carbon::parse($start);
        $end_time = Carbon::parse($end);
        return $end_time->diffForHumans($start_time, [
            'join' => ', ',
            'parts' => 2,
        ]);
    }
}
