<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Detail Laporan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
  <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">Detail Transaksi</h2>
    <p><strong>Tanggal:</strong> {{ $transaksi->created_at->format('d-m-Y') }}</p>
    <p><strong>Total Harga:</strong> Rp{{ number_format($transaksi->total_price) }}</p>

    @php
      $items = json_decode($transaksi->produk_json ?? '[]', true);
    @endphp

    <h3 class="text-lg font-semibold mt-6 mb-2">Produk:</h3>
    <table class="min-w-full text-sm border border-gray-300">
      <thead class="bg-gray-100">
        <tr>
          <th class="p-2 border">Nama</th>
          <th class="p-2 border">Jumlah</th>
          <th class="p-2 border">Harga Satuan</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($items as $item)
          <tr>
            <td class="p-2 border">{{ $item['nama'] }}</td>
            <td class="p-2 border">{{ $item['jumlah'] }}</td>
            <td class="p-2 border">Rp{{ number_format($item['harga']) }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <a href="{{ url('/laporan') }}" class="mt-4 inline-block bg-violet-500 text-white px-4 py-2 rounded hover:bg-violet-600">
      Kembali
    </a>
  </div>
</body>
</html>
