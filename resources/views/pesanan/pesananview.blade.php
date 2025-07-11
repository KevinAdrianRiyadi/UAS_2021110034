@extends('pelanggan.layout.index')
@section('content')

    <body>
        <div class="container mt-5">
            <h2 class="mb-4">Pesanan</h2>

            {{-- <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-primary mb-2">Logout</button>
    </form> --}}

            <a href="/tambahpesananview">
                <button class="btn btn-primary mb-3">Add Item</button>
            </a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        {{-- <th>ID</th> --}}
                        <th>ID Pesanan</th>

                        <th>Total Harga</th>
                        <th>No Kamar</th>
                        {{-- <th>Notes</th> --}}
                        <th>Status Pembayaran</th>
                        <th>Status Pesanan</th>
                    </tr>
                </thead>
                <tbody id="itemTable">
                    @foreach ($datapesanan as $item)
                        <tr>
                            {{-- <td>#{{ \Illuminate\Support\Str::padLeft($item->id, 4, 0) }}</td> --}}
                            <td>{{ $item->id_detailpesanan }}</td>
                            {{-- <td>{{ $item->makanan->first()['nama'] }}</td> --}}
                            {{-- <td>
                                @if (isset($item->makanan) && $item->makanan->first())
                                    <p class="text-black"> {{ $item->makanan->first()->nama }}</p>
                                @endif
                            </td> --}}

                            
                            <td>{{ $item->total_harga }}</td>
                            <td>{{ $item->no_kamar }}</td>
                            {{-- <td>{{ $item->notes }}</td> --}}
                            <td>{{ $item->status_pembayaran }}</td>
                            <td>{{ $item->status_pesanan }}</td>
                            {{-- <td>{{ $item->stok }}</td> --}}
                            <td>
                                <div class="d-flex justify-content-between">
                                    {{-- @dd($item->id) --}}
                                    <a href="{{ route('detailpesanan', $item->id_detailpesanan) }}" class="btn btn-primary me-2">Detail Pesanan</a>
                                    {{-- <a href="{{ route('payview', $item->id) }}" class="btn btn-primary me-2">Pay</a> --}}
                                    {{-- @if($item->status_pesanan == 'order')
                                                                        <form action="{{ route('deletepesanan', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    @endif --}}
                                </div>
                            </td>
                            {{-- <td>
                        <button class="btn btn-warning btn-sm" onclick="editItem({{ $item->id }})">Edit</button>
                        <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $data->links() }}    --}}
        </div>

        <div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="itemModalLabel">Add Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="itemForm">
                            @csrf
                            <div class="mb-3">
                                <label for="itemName" class="form-label">Item Name</label>
                                <input type="text" class="form-control" id="itemName" name="name" required>
                            </div>
                            <input type="hidden" id="itemId">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    </body>
@endsection
