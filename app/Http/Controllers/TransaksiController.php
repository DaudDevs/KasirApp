<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TransaksiController extends Controller
{
    //delete
   public function index(Request $request): View
 {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }
        return view('transaksi.index', compact('cart', 'total'));
    }

    // TransaksiController.php
 public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string'
        ]);

        // Cari produk berdasarkan nama (like %name%)
        $product = Product::where('name', 'like', '%' . $request->product_name . '%')->first();

        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['qty'] += 1;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "qty" => 1,
                "price" => $product->price,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke transaksi');
    }

    // Hapus produk dari cart
    public function destroy($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari transaksi');
    }


}
