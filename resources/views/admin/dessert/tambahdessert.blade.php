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
        <h2 class="mb-4">Tambah Dessert</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tambahdessert') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama dessert</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Kategori dessert</label>
                <select class="primary_type" aria-label="Default select example" name="kategori">
                    <option selected>Open this select menu</option>
                    <option value="IceCream">Ice Cream</option>
                    <option value="Cake">Cake</option>
                    <option value="Waffle">Waffle</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">harga</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">stok</label>
                <input type="number" class="form-control" id="stok" name="stok" required>
            </div>
            <div class="mb-3">
                <label for="inputfile" class="form-label">Photo</label>
                <input class="form-control" type="file" id="inputfile" name="photo">
            </div>
            <button type="submit" class="btn btn-primary">Create Item</button>
            {{-- <a href="{{ route('items.index') }}" class="btn btn-secondary">Back</a> --}}
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
