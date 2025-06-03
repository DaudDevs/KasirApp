<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Kasir</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

  <!-- Logout Modal -->
  <div id="logoutModal" class="fixed inset-0 z-50 bg-black bg-opacity-40 hidden items-center justify-center">
    <div class="bg-white rounded-xl p-6 shadow-lg w-80 text-center">
      <h3 class="text-lg font-semibold text-gray-800 mb-2">Konfirmasi Logout</h3>
      <p class="text-sm text-gray-600 mb-4">Apakah Anda yakin ingin keluar?</p>
      <div class="flex justify-center gap-4">
        <button onclick="closeLogoutModal()" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg">Batal</button>
        <button onclick="alert('Berhasil logout!')" class="px-4 py-2 bg-red-500 text-white hover:bg-red-600 rounded-lg">Keluar</button>
      </div>
    </div>
  </div>

  <div class="flex h-screen">

    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 bg-white shadow-lg p-6 transition-all duration-300 hidden md:block md:w-64">
      <h1 class="text-2xl font-bold text-indigo-600 mb-8">KasirApp</h1>
      <nav class="space-y-4">
        <a href="{{ url('/')}}" class="block px-4 py-2 rounded-lg hover:bg-indigo-100 text-gray-700 font-medium">Dashboard</a>
        <a href="{{ url('/transaksi')}}" class="block px-4 py-2 rounded-lg hover:bg-indigo-100 text-gray-700 font-medium">Transaksi</a>
        <a href="{{url('/products')}}" class="block px-4 py-2 rounded-lg hover:bg-indigo-100 text-gray-700 font-medium">Produk</a>
        <a href="{{ url('/laporan')}}" class="block px-4 py-2 rounded-lg hover:bg-indigo-100 text-gray-700 font-medium">Laporan</a>
        <a href="#" class="block px-4 py-2 rounded-lg hover:bg-red-100 text-red-600 font-medium">Keluar</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-y-auto w-full">

      <!-- Top Bar -->
      <div class="flex justify-between items-center mb-4">
        <div class="flex items-center gap-3 md:hidden">
          <button onclick="toggleSidebar()" class="text-2xl text-gray-600 focus:outline-none">&#9776;</button>
          <h2 class="text-xl font-semibold text-gray-800">Dashboard</h2>
        </div>
        <div class="hidden md:block">
          <h2 class="text-2xl font-semibold text-gray-800">Dashboard</h2>
        </div>
        <div class="flex items-center gap-4">
          <div class="flex items-center gap-3">
            <img src="https://i.pravatar.cc/40?img=12" alt="User" class="w-10 h-10 rounded-full">
            <div class="text-right">
              <p class="text-sm font-medium text-gray-800">Daud Hanafi</p>
              <p class="text-xs text-gray-500">Kasir</p>
            </div>
          </div>
          <button onclick="openLogoutModal()" class="bg-red-100 text-red-600 text-sm px-4 py-2 rounded-lg hover:bg-red-200 transition">Logout</button>
        </div>
      </div>

      <!-- Info Bar -->
      <div class="bg-white rounded-xl shadow p-4 mb-6 flex flex-wrap justify-between items-center text-sm text-gray-600">
        <p><strong>Jam Operasional:</strong> 08.00 - 22.00</p>
        <p><strong>Status Kasir:</strong> Aktif</p>
        <p><strong>Lokasi:</strong> Toko Utama Yogyakarta</p>
      </div>

      <!-- Notifikasi -->
      <div id="notif" class="hidden bg-green-100 text-green-800 px-4 py-2 mb-6 rounded-lg shadow">
        🔔 Transaksi baru masuk! Periksa halaman transaksi.
      </div>

      <!-- Cards -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
          <p class="text-gray-500">Total Transaksi Hari Ini</p>
          <h3 class="text-2xl font-bold text-indigo-600 mt-2">Rp {{ number_format($totalHariIni, 0, ',', '.') }}</h3>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
          <p class="text-gray-500">Jumlah Produk Terjual</p>
          <h3 class="text-2xl font-bold text-indigo-600 mt-2">{{ $jumlahProdukHariIni }} Item</h3>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
          <p class="text-gray-500">Pendapatan Bulan Ini</p>
          <h3 class="text-2xl font-bold text-indigo-600 mt-2">Rp {{ number_format($pendapatanBulanIni, 0, ',', '.') }}</h3>
        </div>
      </div>

      <!-- Action Buttons -->
      <div class="flex flex-wrap gap-4">
        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl shadow" onclick="window.location.href='{{ route('transaksi.index') }}'">Transaksi Baru</button>
        <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-3 rounded-xl shadow" onclick="window.location.href='{{ route('laporan.index') }}'">Lihat Laporan</button>
      </div>
    </main>
  </div>

  <!-- Script -->
  <script>
    function openLogoutModal() {
      document.getElementById('logoutModal').classList.remove('hidden');
      document.getElementById('logoutModal').classList.add('flex');
    }

    function closeLogoutModal() {
      document.getElementById('logoutModal').classList.add('hidden');
      document.getElementById('logoutModal').classList.remove('flex');
    }

    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('hidden');
    }

    // Notifikasi simulasi otomatis (dummy)
    setTimeout(() => {
      const notif = document.getElementById('notif');
      notif.classList.remove('hidden');
      setTimeout(() => notif.classList.add('hidden'), 5000);
    }, 3000);
  </script>
</body>
</html>
