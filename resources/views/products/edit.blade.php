<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Produk</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f3f4f6;
      margin: 0;
      padding: 40px;
    }

    .container {
      max-width: 600px;
      background-color: #fff;
      padding: 30px;
      margin: auto;
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      color: #4f46e5;
      margin-bottom: 25px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
      color: #333;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }

    .preview-img {
      width: 100px;
      height: 100px;
      object-fit: cover;
      margin-top: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
      display: block;
    }

    .buttons {
      display: flex;
      justify-content: flex-end;
      gap: 10px;
    }

    .btn {
      padding: 10px 20px;
      font-weight: bold;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 14px;
    }

    .btn-primary {
      background-color: #4f46e5;
      color: white;
    }

    .btn-secondary {
      background-color: #e5e7eb;
      color: #333;
    }

    .alert {
      background-color: #fff3cd;
      color: #856404;
      padding: 10px;
      border-radius: 6px;
      margin-bottom: 20px;
      border: 1px solid #ffeeba;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Edite Produk</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

      <div class="form-group">
        <label>Nama Produk</label>
       <input type="text" name="name" value="{{ old('name',$product->name) }}" class="@error('name') is-invalid @enderror">
              {{-- eror image --}}
        @error('name')
            <div class="alert">
            {{ $message }}
            </div>
            @enderror
      </div>

      <div class="form-group">
        <label>Description</label>
        <input type="text" name="description" value="{{ old('decsription',$product->description) }}" class="@error('description') is-invalid @enderror">
              {{-- eror image --}}
        @error('description')
            <div class="alert">
            {{ $message }}
            </div>
            @enderror
      </div>

      <div class="form-group">
        <label>Harga</label>
        <input type="number" name="price" value="{{ old('price',$product->price)}}" class="@error('price') is-invalid @enderror">
              {{-- eror image --}}
        @error('price')
            <div class="alert">
            {{ $message }}
            </div>
            @enderror
      </div>

      <div class="form-group">
        <label>Stok</label>
        <input type="number" name="stock" value="{{ old ('stock', $product->stock)}}" class="@error('stock') is-invalid @enderror" required>
              {{-- eror image --}}
        @error('stock')
            <div class="alert">
            {{ $message }}
            </div>
            @enderror
      </div>

      <div class="form-group">
        <label>Gambar Produk</label>
        <input type="file" name="image" class="preview-img form @error('image') is-invalid @enderror">
              {{-- eror image --}}
        @error('image')
            <div class="alert">
            {{ $message }}
            </div>
            @enderror
      </div>



      <div class="buttons">
        <a href="{{ route('products.index')}}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>

</body>
</html>
