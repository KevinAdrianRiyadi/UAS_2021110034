@extends('pelanggan.layout.index')
@section('content')

<!-- Page Title -->
<div class="mb-4 d-flex justify-content-between align-items-center">
    <h4 class="fw-bold"> Daftar Keranjang</h4>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pesanModal" {{ count($datakeranjang) === 0 ? 'disabled' : '' }}>
         Lanjutkan ke Pembayaran
    </button>
</div>

<!-- Cart Table -->
<div class="table-responsive shadow-sm">
    <table class="table table-hover table-bordered align-middle">
        <thead class="table text-center">
            <tr>
                <th>ID</th>
                <th>Menu</th>
                <th>Jumlah</th>
                <th>Catatan</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($datakeranjang as $dk)
                <tr>
                    <td class="text-center">{{ $dk->id_pesanan }}</td>
                    <td>{{ $dk->makanan->nama }}</td>
                    <td class="text-center">{{ $dk->jumlah }}</td>
                    <td>{{ $dk->catatan ?: '-' }}</td>
                    <td>Rp {{ number_format($dk->harga, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($dk->totalharga, 0, ',', '.') }}</td>
                    <td class="text-center">
                        <form action="{{ route('deletepesanandetail', $dk->id) }}" method="POST"
                              onsubmit="return confirm('Hapus item ini dari keranjang?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">🗑️</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Belum ada item di keranjang</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal for Informasi Pemesan -->
<div class="modal fade" id="pesanModal" tabindex="-1" aria-labelledby="pesanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('tambahpesanan') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="pesanModalLabel">Informasi Pemesan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nokamar" class="form-label">No Kamar</label>
                    <input name="nokamar" id="nokamar" type="number" class="form-control" placeholder="Masukkan nomor kamar" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success w-100">Lanjutkan ke Pembayaran</button>
            </div>
        </form>
    </div>
</div>

@endsection
