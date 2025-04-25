// File: app/models/helper.php
<?php

if (!function_exists('formatRupiah')) {
    function formatRupiah($totalUang)
    {
        return 'Rp ' . number_format($totalUang, 0, '.', '.');
    }
}


if (!function_exists('formatRupiahBaru')) {
    function formatRupiahBaru($Uang)
    {
        return 'Rp ' . number_format($Uang, 0, '.', '.');
    }
}

if (!function_exists('formatRupiahMasuk')) {
    function formatRupiahMasuk($masuk)
    {
        return 'Rp ' . number_format($masuk, 0, '.', '.');
    }
    
$masukRp = formatRupiahMasuk($masuk);
}


if (!function_exists('formatRupiahMasukTotal')) {
    function formatRupiahMasukTotal($masukTotal)
    {
        return 'Rp ' . number_format($masukTotal, 0, '.', '.');
    }
    
$masukTotalRp = formatRupiahMasukTotal($masukTotal);
}

if (!function_exists('formatRupiahKeluar')) {
    function formatRupiahKeluar($keluarTotal)
    {
        return 'Rp ' . number_format($keluarTotal, 0, '.', '.');
    }
    
$keluarTotalRp = formatRupiahKeluar($keluarTotal);
}

if (!function_exists('formatRupiahSaldo')) {
    function formatRupiahSaldo($saldoTotal)
    {
        return 'Rp ' . number_format($saldoTotal, 0, '.', '.');
    }
    
$saldoTotalRp = formatRupiahSaldo($saldoTotal);
}

