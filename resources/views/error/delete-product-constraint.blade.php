<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gagal Menghapus Produk</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
            color: #111827;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 40px;
            max-width: 500px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }

        .icon {
            background-color: #fee2e2;
            color: #dc2626;
            border-radius: 9999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            margin-bottom: 20px;
        }

        .icon svg {
            width: 30px;
            height: 30px;
        }

        h1 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #1f2937;
        }

        p {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .btn {
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.2s;
            display: inline-block;
            margin: 5px;
        }

        .btn-primary {
            background-color: #4f46e5;
            color: white;
        }

        .btn-primary:hover {
            background-color: #4338ca;
        }

        .btn-secondary {
            background-color: #fef2f2;
            color: #dc2626;
        }

        .btn-secondary:hover {
            background-color: #fde8e8;
        }

        .btn-contact {
            background-color: #ecfccb;
            color: #3f6212;
        }

        .btn-contact:hover {
            background-color: #d9f99d;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 9v2m0 4h.01m-6.938 4h13.856c1.054 0 1.618-1.14.989-2l-6.928-9c-.57-.74-1.77-.74-2.34 0l-6.928 9c-.63.86-.065 2 .989 2z"/>
            </svg>
        </div>
        <h1>Produk Tidak Bisa Dihapus</h1>
        <p>Produk ini masih terhubung dengan transaksi yang ada. Hapus transaksi terlebih dahulu jika ingin menghapus produk.</p>

        <a href="{{ route('products.index') }}" class="btn btn-primary">Kembali ke Produk</a>
        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Lihat Transaksi</a>
        <a href="https://wa.me/6281216795577?text=Halo%20Admin%2C%20saya%20tidak%20bisa%20menghapus%20produk" target="_blank" class="btn btn-contact">Hubungi Owner</a>
    </div>
</body>
</html>
