<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tambah Stok Bahan Baku</title>
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>




</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Tambah Stok Bahan</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('addstokbahanbaku') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Bahanbaku</label>
                <input type="text" class="form-control" id="namabahan" name="namabahan" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Stok Bahanbaku</label>
                <input type="number" class="form-control" id="stokbahan" name="stokbahan" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Satuan</label>
                <select name="satuan" id="satuan">
                    <option value="">--select satuan--</option>
                    <option value="kg">kg</option>
                    <option value="     liter">liter</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Harga</label>
                <input type="text" class="text-black" placeholder="masukkan harga" name="harga">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Exp Date</label>
                <input type="text" class="datepicker text-black" placeholder="selectexpdate" name="expdate">
            </div>



            <button type="submit" class="btn btn-primary">Create Item</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        flatpickr(".datepicker", {
            dateFormat: "Y-m-d"
        });
    </script>
</body>

</html>
