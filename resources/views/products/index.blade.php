<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Produk - KasirApp</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

  <div class="flex h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg p-6 hidden md:block">
      <h1 class="text-2xl font-bold text-indigo-600 mb-8">KasirApp</h1>
      <nav class="space-y-4">
        <a href="{{ url('/') }}" class="block px-4 py-2 rounded-lg hover:bg-indigo-100 text-gray-700 font-medium">Dashboard</a>
        <a href="{{ url ('/transaksi')}}" class="block px-4 py-2 rounded-lg hover:bg-indigo-100 text-gray-700 font-medium">Transaksi</a>
        <a href="{{ url('/products')}}" class="block px-4 py-2 rounded-lg bg-indigo-100 text-indigo-700 font-semibold">Produk</a>
        <a href="{{ url('/laporan')}}" class="block px-4 py-2 rounded-lg hover:bg-indigo-100 text-gray-700 font-medium">Laporan</a>
        <a href="#" class="block px-4 py-2 rounded-lg hover:bg-red-100 text-red-600 font-medium">Keluar</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-y-auto w-full">

      <!-- Header -->
      <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <h2 class="text-2xl font-semibold text-gray-800">Manajemen Produk</h2>
       <button class="bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700 transition shadow" onclick="window.location.href='{{ route('products.create') }}'">
          + Tambah Produk
        </button>


      </div>

      <!-- Pencarian -->
      <form action="{{ route('products.index') }}" method="GET" class="mb-4">
          <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari produk..." class="w-full md:w-1/3 px-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-indigo-400" />
          

      </form>

      <!-- Tabel Produk -->
      <div class="overflow-auto bg-white rounded-xl shadow">
        <table class="w-full text-left text-sm">
          <thead class="bg-gray-100 text-gray-600 font-semibold">
            <tr>
              <th class="p-4">#</th>
              <th class="p-4">Gambar</th>
              <th class="p-4">Nama Produk</th>
              <th class="p-4">Kategori</th>
              <th class="p-4">Harga</th>
              <th class="p-4">Stok</th>
              <th class="p-4 text-center">Aksi</th>
            </tr>
          </thead>
          <tbody class="text-gray-700">
           @forelse ($products as $product)
                <tr class="border-t hover:bg-gray-50">
              <td class="p-4">1</td>
              <td class="p-4">
                <img src="{{ asset ('/storage/products/' .$product->image)}}" class="w-12 h-12 object-cover rounded" />
              </td>
              <td class="p-4">{{$product->name}}</td>
              <td class="p-4">{{$product->description}}</td>
              <td class="p-4">{{"Rp.".number_format($product->price,2,',','.')}}</td>
              <td class="p-4">{{$product->stock}}</td>
              <td class="p-4 flex justify-center gap-2">
                <button class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded text-xs hover:bg-yellow-200" onclick="window.location.href='{{ route('products.edit', $product->id) }}'">Edit</button>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                    @csrf
                    @method('DELETE')
                <button class="bg-red-100 text-red-700 px-3 py-1 rounded text-xs hover:bg-red-200">Hapus</button>
                </form>
              </td>
            </tr>
           @empty
            <tr>
    <td colspan="7" class="p-6 text-center text-gray-500">
      <div class="bg-yellow-100 text-yellow-700 px-4 py-3 rounded-lg inline-block">
        Belum ada produk yang ditambahkan.
      </div>
    </td>
  </tr>

               
           @endforelse
          </tbody>
        </table>
        {{ $products->links() }}
      </div>

    </main>
    <!-- Modal Tambah Produk -->
</main>

<script>

  // Hapus
  @if (session('success'))
    Swal.fire({
      icon: 'success',
      title: 'Berhasil',
      text: '{{ session('success') }}',
      showConfirmButton: false,
      timer: 1500
    });
    @elseif (session('error'))
    Swal.fire({
      icon: 'error',
      title: 'Gagal',
      text: '{{ session('error') }}',
      showConfirmButton: false,
      timer: 1500
    });
  @endif
 </script>



</body>
</html>
