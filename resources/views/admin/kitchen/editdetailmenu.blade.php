<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Detail Resep</title>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Detail Resep</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('updatedetailmenu', $data->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Bahanbaku</label>
                <input type="text" class="form-control" id="nama" name="nama" required
                value="{{$data->stokbahanbaku->first()->namabahan}}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">jumlahdibutuhkan</label>
                <div class="d-flex">

                    <input type="text" class="form-control" id="jumlah_dibutuhkan" name="jumlah_dibutuhkan" value="{{$data->jumlah_dibutuhkan}} " required>
                    <label for="name">{{$data->stokbahanbaku->first()->satuan}}</label>
                </div>
            </div>
           
            <button type="submit" class="btn btn-primary">Update Item</button>
            {{-- <a href="{{ route('items.index') }}" class="btn btn-secondary">Back</a> --}}
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
