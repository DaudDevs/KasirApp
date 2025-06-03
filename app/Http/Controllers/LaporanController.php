<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{

    public function index(Request $request)
    {
        // Mulai query tanpa relasi karena tidak ada relasi 'items'
        $query = Transaksi::query();

        // Filter berdasarkan tanggal jika ada input
        if ($request->filled('from') && $request->filled('to')) {
            $query->whereBetween('created_at', [
                $request->from . ' 00:00:00',
                $request->to . ' 23:59:59',
            ]);
        }

        // Ambil semua transaksi
        $transaksis = $query->orderByDesc('created_at')->get();

        return view('laporan.index', compact('transaksis'));
    }

    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        // Jika produk disimpan dalam bentuk JSON, decode di sini
        $items = json_decode($transaksi->produk_json ?? '[]', true); // sesuaikan dengan nama kolom

        return view('laporan.show', compact('transaksi', 'items'));
    }
}
