<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Menampilkan daftar produk
   // Menampilkan daftar produk (dengan pencarian)
public function index(Request $request): View
{
    $query = Product::query();

    if ($request->has('search') && $request->search !== null) {
        $search = $request->search;
        $query->where('name', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%");
    }

    $products = $query->latest()->paginate(10);

    return view('products.index', compact('products'));
}

    // Menampilkan form tambah produk
    public function create(): View
    {
        return view('products.create');
    }

    // Menyimpan produk baru
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        // Upload gambar
        $image = $request->file('image');
        $image->storeAs('products', $image->hashName());

        // Simpan data produk
        Product::create([
            'image' => $image->hashName(),
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // Menampilkan detail produk
    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }

    // Menampilkan form edit
    public function edit(string $id): View
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    // Memperbarui produk
    public function update(Request $request, string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        // Jika ada gambar baru, hapus gambar lama & upload baru
        if ($request->hasFile('image')) {
            Storage::delete('products/' . $product->image);
            $image = $request->file('image');
            $image->storeAs('products', $image->hashName());

            $product->image = $image->hashName();
        }

        // Update data produk
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // Menghapus produk
    public function destroy($id)
{
    try {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    } catch (QueryException $e) {
        // Cek jika error karena foreign key constraint
        if ($e->getCode() == '23000') {
            return response()->view('error.delete-product-constraint', [], 409);
        }

        throw $e; // lempar lagi kalau bukan error foreign key
    }
}

}
