<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit kitchen</title>
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Stok bahanbaku</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('updatestokbahanbaku', $data->id) }}" method="POST" enctype="multipart/form-data"
            lang="en">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Bahan Baku</label>
                <input type="text" class="form-control" id="namabahan" name="namabahan" required
                    value="{{ $data->namabahan }}">
            </div>
            {{-- <div class="mb-3">
                <label for="name" class="form-label">harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{$data->harga}}" required>
            </div> --}}
            <div class="mb-3">
                <label for="name" class="form-label">stok</label>
                <input type="number" name="stokbahan" step="0.01" value="{{ old('stokbahan', $data->stokbahan) }}"
                    oninput="this.value = this.value.replace(',', '.')">

            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Exp Date</label>
                <input type="text" class="datepicker" id="expdate" name="expdate" value="{{ $data->expdate }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Harga</label>
                <input type="text" class="text-black" placeholder="masukkan harga" name="harga" value="{{$data->harga}}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Satuan</label>
                <label for="name" class="form-label">{{ $data->satuan }}</label>
                {{-- <input type="number" class="form-control" id="stok" name="expdate" value="{{$data->expdate}}" required> --}}
            </div>


            <button type="submit" class="btn btn-primary">Update Item</button>
            {{-- <a href="{{ route('items.index') }}" class="btn btn-secondary">Back</a> --}}
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    flatpickr(".datepicker", {
        dateFormat: "Y-m-d"
    });
</script>

</html>
