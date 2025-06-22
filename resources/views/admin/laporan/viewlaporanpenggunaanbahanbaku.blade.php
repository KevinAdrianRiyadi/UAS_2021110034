@extends('pelanggan.layout.index')
@section('content')

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.4.4/dist/css/tempus-dominus.min.css" rel="stylesheet">

</head>
    <body>
        <div class="container mt-5">
            <h2 class="mb-4">Laporan Pemakaian Stok Bahan Baku</h2>
{{-- 
            <a href="/viewaddstokbahanbaku">
                <button class="btn btn-primary mb-3">Add stok bahanbaku</button>
            </a> --}}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Menu</th>
                        <th>Nama Bahan</th>
                        {{-- <th>Jumlah yang dipakai</th> --}}
                        <th>Jumlah Terpakai</th>
                        <th>Tanggal Pemakaian</th>
                        {{-- <th>Status</th> --}}
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody id="itemTable">
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->namamenu->first()->nama }}</td>
                            <td>{{ $item->namastok->first()->namabahan }}</td>
                            <td>{{ $item->jumlah_dipakai }}</td>
                            <td>{{ $item->tanggal_pemakaian }}</td>
                            {{-- <td>{{ $item->status }}</td> --}}
                            {{-- <td>
                                <div class="d-flex ">
                                    <a href="{{ url('editmakanan/' . $item->id) }}"
                                            class="btn btn-primary me-2">Edit</a>
                                    <a href="{{ url('editmakanan/' . $item->id) }}"
                                            class="btn btn-primary me-2">Delete</a>
                                </div>
                            </td> --}}
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
