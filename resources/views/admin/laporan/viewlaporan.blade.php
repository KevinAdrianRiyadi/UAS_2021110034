<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery (required for Bootstrap 4) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Popper.js (required for Bootstrap 4) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@extends('pelanggan.layout.index')
@section('content')

    <body>
        <div class="container mt-5">
            <h2 class="mb-4">List Laporan</h2>

            <a href="/viewlaporanpembelian" class=" ">
                <p class="border border-2 border-black p-2">Laporan Pembelian</p>
            </a>
            <a href="/viewlaporanpenjualan">
                <p class="border border-2 border-black p-2">Laporan Penjualan</p>
            </a>
            <a class="">
                <p class="border border-2 border-black p-2">Laporan Bahan Baku Rusak</p>
            </a>
            <a class="">
                <p class="border border-2 border-black p-2">Laporan Pemakaian Bahan Baku</p>
            </a>
            <a class="">
                <p class="border border-2 border-black p-2">Laporan Persediaan Bahan Baku</p>
            </a>





            {{-- {{ $data->links() }}    --}}
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    </body>
@endsection
