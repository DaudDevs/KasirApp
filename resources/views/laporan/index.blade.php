<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>KasirApp - Laporan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
  <div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg p-6 hidden md:block">
      <h1 class="text-2xl font-bold text-indigo-600 mb-8">KasirApp</h1>
      <nav class="space-y-4">
        <a href="{{ url('/') }}" class="block px-4 py-2 rounded-lg hover:bg-indigo-100 text-gray-700 font-medium">Dashboard</a>
        <a href="{{ url('/transaksi') }}" class="block px-4 py-2 rounded-lg hover:bg-indigo-100 text-gray-700 font-medium">Transaksi</a>
        <a href="{{ url('/products') }}" class="block px-4 py-2 rounded-lg hover:bg-indigo-100 text-gray-700 font-medium">Produk</a>
        <a href="{{ url('/laporan') }}" class="block px-4 py-2 rounded-lg bg-indigo-100 text-indigo-700 font-semibold">Laporan</a>
        <a href="#" class="block px-4 py-2 rounded-lg hover:bg-red-100 text-red-600 font-medium">Keluar</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">

      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">Laporan Transaksi</h2>
      </div>

      <!-- Filter (opsional) -->
      <div class="bg-white p-4 rounded-xl shadow mb-6">
        <form method="GET" action="{{ url('/laporan') }}" class="flex flex-wrap gap-4 items-end">
          <div>
            <label class="block text-sm font-medium text-gray-600">Dari Tanggal</label>
            <input type="date" name="from" value="{{ request('from') }}" class="px-4 py-2 border rounded-lg w-full" />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-600">Sampai Tanggal</label>
            <input type="date" name="to" value="{{ request('to') }}" class="px-4 py-2 border rounded-lg w-full" />
          </div>
          <button type="submit" class="bg-violet-500 text-white px-4 py-2 rounded-lg hover:bg-violet-600">
            Filter
          </button>
        </form>
      </div>

      <!-- Tabel Laporan -->
      <div class="bg-white p-4 rounded-xl shadow overflow-x-auto">
        <table class="min-w-full text-sm text-left">
          <thead class="bg-gray-100 text-gray-600">
            <tr>
              <th class="p-2">#</th>
              <th class="p-2">Tanggal</th>
              <th class="p-2">Total Item</th>
              <th class="p-2">Total Transaksi</th>
              <th class="p-2">Aksi</th>
            </tr>
          </thead>
          <tbody>
           @forelse ($transaksis as $i => $transaksi)
  @php
      // Contoh jika pakai JSON
      $items = json_decode($transaksi->produk_json ?? '[]', true);
      $totalItem = collect($items)->sum('jumlah');
  @endphp
  <tr class="border-t">
    <td class="p-2">{{ $i + 1 }}</td>
    <td class="p-2">{{ $transaksi->created_at->format('d-m-Y') }}</td>
    <td class="p-2">{{ $totalItem }}</td>
    <td class="p-2">Rp{{ number_format($transaksi->total_price) }}</td>
    <td class="p-2">
      <a href="{{ route('laporan.show', $transaksi->id) }}" class="text-violet-600 hover:underline">Detail</a>
    </td>
  </tr>
@empty
  <tr>
    <td colspan="5" class="text-center text-gray-500 py-4">Tidak ada transaksi ditemukan.</td>
  </tr>
@endforelse
          </tbody>
        </table>
      </div>

    </main>
  </div>
</body>
</html>
