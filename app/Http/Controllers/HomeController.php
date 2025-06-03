<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
{
    $today = Carbon::today();

    // Total Transaksi Hari Ini
    $totalHariIni = Transaksi::whereDate('created_at', $today)->sum('total_price');

    // Jumlah Produk Terjual Hari Ini
    $jumlahProdukHariIni = Transaksi::whereDate('created_at', $today)->sum('quantity');

    // Pendapatan Bulan Ini
    $pendapatanBulanIni = Transaksi::whereMonth('created_at', $today->month)
                                    ->whereYear('created_at', $today->year)
                                    ->sum('total_price');

    return view('home', [
        'totalHariIni' => $totalHariIni,
        'jumlahProdukHariIni' => $jumlahProdukHariIni,
        'pendapatanBulanIni' => $pendapatanBulanIni
    ]);
}
}
