<body>
    <div class="container mt-5">
        <h2 class="mb-4">kitchen View</h2>

        {{-- <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-primary mb-2">Logout</button>
    </form> --}}

        <a href="/tambahkitchenview">
            <button class="btn btn-primary mb-3">Add Item</button>
        </a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody id="itemTable">
                @foreach ($datakitchen as $item)
                    <tr>
                        {{-- <td>#{{ \Illuminate\Support\Str::padLeft($item->id, 4, 0) }}</td> --}}
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama }}</td>
                        {{-- <td>{{ $item->jenis }}</td> --}}
                        <td>{{ $item->kategori }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('editkitchen', $item->id) }}" class="btn btn-primary me-2">Edit</a>
                                <form action="{{ route('deletekitchen', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
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

</html>
