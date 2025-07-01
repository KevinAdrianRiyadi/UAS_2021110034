<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tambah Stok Bahan Baku Rusak</title>
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>



    
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Tambah Bahan Baku Rusak</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('addstokbahanbakurusak') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Bahan Baku</label>
                {{-- <input type="text" class="form-control" id="namabahan" name="namabahan" required> --}}
                <select name="namabahan" id="namabahan">
                    @foreach($data as $item)
                    <option value="{{$item->id}}">{{$item->namabahan}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Jumlah Bahan Baku</label>
                <input type="text" class="form-control" id="stokbahan" name="stokbahan" required>
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
                <label for="name" class="form-label">Status</label>
                <select name="status" id="status">
                    <option value="">--select status--</option>
                    <option value="rusak">Rusak</option>
                    <option value="tumpah">Tumpah</option>
                    <option value="jatuh">Jatuh</option>
                    <option value="jatuh">Basi</option>
                </select>
            </div>
            <div class="mb-3">
            <label for="name" class="form-label">Date</label>
            <input type="text" class="datepicker text-black" placeholder="selectdate" name="date">
            </div>
                 {{-- <div class="mb-3">
                <label for="name" class="form-label">Exp Date</label>
            <input type="text" class="datepicker text-black" placeholder="selectexpdate" name="expdate">
            </div> --}}


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
