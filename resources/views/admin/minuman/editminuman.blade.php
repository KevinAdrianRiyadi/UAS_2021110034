<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit minuman</title>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Editminuman</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('updateminuman', $data->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama minuman</label>
                <input type="text" class="form-control" id="nama" name="nama" required
                value="{{$data->nama}}">
                
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Kategori minuman</label>
                <select class="primary_type" aria-label="Default select example" name="kategori">
                    <option selected value="{{$data->kategori}}">{{$data->kategori}}</option>
                    <option value="IndonesianFood">Cocktail</option>
                    <option value="WesternFood">Mocktail</option>
                    <option value="KoreanFood">Beer</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{$data->harga}}" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">stok</label>
                <input type="number" class="form-control" id="stok" name="stok" value="{{$data->stok}}" required>
            </div>
            <div class="mb-3">
                <label for="inputfile" class="form-label">Photo</label>
                <input class="form-control" type="file" id="inputfile" name="photo">
            </div>
            <button type="submit" class="btn btn-primary">Update Item</button>
            {{-- <a href="{{ route('items.index') }}" class="btn btn-secondary">Back</a> --}}
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
