<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit pesanan</title>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Detail Pesanan</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        
     <div class="card shadow mb-4">
    <div class="card-body">
        <h5 class="card-title">Pesanan ID: #{{ $datapesanan->first()->id_pesanan ?? 'N/A' }}</h5>
        <p><strong>No Kamar:</strong> {{ $datapesanan->first()->pesanan->first()->no_kamar ?? '-' }}</p>
        <p><strong>Status Pembayaran:</strong> {{ $datapesanan->first()->pesanan->first()->status_pembayaran ?? '-' }}</p>
        <p><strong>Status Pesanan:</strong> {{ $datapesanan->first()->pesanan->first()->status_pesanan ?? '-' }}</p>

        <hr>
        <h6>Daftar Menu:</h6>
        <ul class="list-group list-group-flush">
            @foreach ($datapesanan as $item)
                <li class="list-group-item">
                    <strong>{{ $item->makanan->nama ?? 'Menu tidak tersedia' }}</strong><br>
                    Jumlah: {{ $item->jumlah }}<br>
                    Catatan: {{ $item->catatan ?? '-' }}
                </li>
            @endforeach
        </ul>
    </div>
</div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
