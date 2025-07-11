@extends('pelanggan.layout.index')
@section('content')

    <body>
        <div class="container mt-5">
            <h2 class="mb-4">Laporan Penjualan </h2>
            {{-- <h5 class="mb-4 text-base">Bulan Mei-Juni 2025</h5> --}}

            {{-- <div class="border-2 border border-dark"></div> --}}
            <div class="flex-row justify-center">
                Total Pesanan {{ $totalpesanan }}
                Total Pendapatan
                {{ 'Rp ' . number_format($totalharga, 0, ',', '.') }}

            </div>
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <h4 class="font-bold">Makanan yang terjual:</h4>
                        @foreach ($makanan as $item)
                            <li>{{ optional($item->makanan)->nama ?? ' ' }} - Jumlah Terjual: {{ $item->jumlah }}</li>
                            <p>Total Pendapatan : {{ 'Rp ' . number_format($item->totalharga, 0, ',', '.') }}

                                                
                            </p>
                        @endforeach
                    </div>
                    <div class="col-4">
                        <h4 class="font-bold">Minuman yang terjual:</h4>
                        @foreach ($minuman as $item)
                            <li>{{ optional($item->makanan)->nama ?? ' ' }} - Jumlah Terjual: {{ $item->jumlah }}</li>
                            <p>Total Pendapatan : {{ 'Rp ' . number_format($item->totalharga, 0, ',', '.') }}</p>
                        @endforeach
                    </div>
                    <div class="col-4">
                        <h4 class="font-bold">Dessert yang terjual:</h4>
                        @foreach ($dessert as $item)
                            <li>{{ optional($item->makanan)->nama ?? ' ' }} - Jumlah Terjual: {{ $item->jumlah }}</li>
                            <p>Total Pendapatan : {{ 'Rp ' . number_format($item->totalharga, 0, ',', '.') }}</p>
                        @endforeach
                    </div>

                </div>
            </div>




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
        <script>
            const itemForm = document.getElementById('itemForm');

            itemForm.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(itemForm);
                const itemId = document.getElementById('itemId').value;

                if (itemId) {
                    fetch(`/items/${itemId}`, {
                        method: 'PUT',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    fetch('/items', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then(() => {
                        location.reload();
                    });
                }
            });

            function editItem(id) {
                fetch(`/items/${id}/edit`)
                    .then(response => response.json())
                    .then(item => {
                        document.getElementById('itemName').value = item.name;
                        document.getElementById('itemId').value = item.id;
                        const modal = new bootstrap.Modal(document.getElementById('itemModal'));
                        modal.show();
                    });
            }
        </script>
    </body>
@endsection
