<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Create Item</title>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Create New Item</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tambahpesanan') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <div class="mb-3">
                <label for="name" class="form-label">Nama pesanan</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div> --}}
            <div class="mb-3">
                <label for="name" class="form-label">Kategori Makanan</label>
                <select class="primary_type" aria-label="Default select example" name="makanan_id">
                    <option selected value="">Open this select menu</option>
                    @foreach($datamakanan as $dm)
                    <option value="{{$dm->id}}">{{$dm->nama}}--{{$dm->kategori}}--Rp {{$dm->harga}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Kategori Minuman</label>
                <select class="primary_type" aria-label="Default select example" name="minuman_id">
                    <option selected value="">Open this select menu</option>
                    @foreach($dataminuman as $dmn)
                    <option value="{{$dmn->id}}">{{$dmn->nama}}--{{$dmn->kategori}}--Rp {{$dmn->harga}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Kategori Dessert</label>
                <select class="primary_type" aria-label="Default select example" name="dessert_id">
                    <option selected value="">Open this select menu</option>
                    @foreach($datadessert as $dd)
                    <option value="{{$dd->id}}">{{$dd->nama}}--{{$dd->kategori}}--Rp {{$dd->harga}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create Item</button>
            {{-- <a href="{{ route('items.index') }}" class="btn btn-secondary">Back</a> --}}
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

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

</html>
