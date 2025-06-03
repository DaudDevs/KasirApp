<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>KasirApp - Transaksi</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
  <div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg p-6 hidden md:block">
      <h1 class="text-2xl font-bold text-indigo-600 mb-8">KasirApp</h1>
      <nav class="space-y-4">
        <a href="{{ url('/') }}" class="block px-4 py-2 rounded-lg hover:bg-indigo-100 text-gray-700 font-medium">Dashboard</a>
        <a href="{{ url('/transaksi') }}" class="block px-4 py-2 rounded-lg hover:bg-indigo-100 text-gray-700 font-medium bg-indigo-100 text-indigo-700 font-semibold">Transaksi</a>
        <a href="{{ url('/products') }}" class="block px-4 py-2 rounded-lg hover:bg-indigo-100 text-gray-700 font-medium">Produk</a>
        <a href="{{ url('/laporan')}}" class="block px-4 py-2 rounded-lg hover:bg-indigo-100 text-gray-700 font-medium">Laporan</a>
        <a href="#" class="block px-4 py-2 rounded-lg hover:bg-red-100 text-red-600 font-medium">Keluar</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">

      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">Transaksi</h2>
      </div>

      <!-- Notifikasi -->
      @if(session('error'))
        <div class="mb-4 p-3 bg-red-200 text-red-800 rounded">
          {{ session('error') }}
        </div>
      @endif

      @if(session('success'))
        <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
          {{ session('success') }}
        </div>
      @endif

      <!-- Input Nama Produk -->
      <div class="bg-white rounded-xl shadow p-4 mb-6">
        <form action="{{ route('transaksi.store') }}" method="POST" class="flex gap-2">
          @csrf
          <input
            type="text"
            name="product_name"
            placeholder="Masukkan Nama Produk"
            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-violet-500"
            required
          />
          <button type="submit" class="bg-violet-500 text-white px-4 py-2 rounded-lg hover:bg-violet-600 transition">
            Tambah
          </button>
        </form>
      </div>

      <!-- Tabel Transaksi -->
      <div class="bg-white rounded-xl shadow p-4 mb-6 overflow-x-auto">
        <table class="min-w-full text-sm text-left">
          <thead class="bg-gray-100 text-gray-600">
            <tr>
              <th class="p-2">#</th>
              <th class="p-2">Nama Produk</th>
              <th class="p-2">Qty</th>
              <th class="p-2">Harga</th>
              <th class="p-2">Subtotal</th>
              <th class="p-2">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php $total = 0; $i = 1; @endphp
            @forelse ($cart as $id => $item)
              @php
                $subtotal = $item['price'] * $item['qty'];
                $total += $subtotal;
              @endphp
              <tr class="border-t">
                <td class="p-2">{{ $i++ }}</td>
                <td class="p-2">{{ $item['name'] }}</td>
                <td class="p-2">{{ $item['qty'] }}</td>
                <td class="p-2">Rp{{ number_format($item['price']) }}</td>
                <td class="p-2">Rp{{ number_format($subtotal) }}</td>
                <td class="p-2 space-x-1">
                  <form action="{{ route('transaksi.destroy', $id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-3 py-1 bg-red-100 text-red-600 rounded hover:bg-red-200">Hapus</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="text-center p-4 text-gray-500">Belum ada produk di transaksi</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <!-- Total & Aksi -->
      <div class="bg-white rounded-xl shadow p-4 flex justify-between items-center">
        <div class="text-lg font-semibold">Total: <span class="text-violet-600">Rp{{ number_format($total) }}</span></div>
        <div class="space-x-2">
          <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">Batalkan</button>
          <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">Bayar</button>
        </div>
      </div>

    </main>
  </div>
</body>
</html>
