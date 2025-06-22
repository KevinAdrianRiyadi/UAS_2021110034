@extends('pelanggan.layout.index')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-5">
        <h2 class="mb-4 text-center">Daftar Menu</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Menu Cards Section -->
        <h4 class="mb-4">🍽️ Pilih Menu</h4>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5">
            @foreach ($datamakanan as $dm)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/' . $dm->photo) }}" class="card-img-top" alt="{{ $dm->nama }}"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $dm->nama }}</h5>
                            <p class="card-text text-muted">{{ $dm->kategori }}</p>
                            <p class="card-text fw-bold text-primary">Rp {{ number_format($dm->harga) }}</p>

                            <form action="{{ route('tambahpesanandetail') }}" method="POST">
                                @csrf
                                <input type="hidden" name="makanan_id" value="{{ $dm->id }}">

                                <div class="mb-2">
                                    <label class="form-label">Jumlah</label>
                                    <input type="number" name="jumlah" min="1" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Catatan</label>
                                    <textarea name="note" class="form-control" placeholder="Catatan (opsional)"></textarea>
                                </div>

                                <button type="submit" class="btn btn-sm btn-outline-primary w-100">Tambah ke Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
@endsection
