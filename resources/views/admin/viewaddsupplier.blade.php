@extends('pelanggan.layout.index')
@section('content')

    <div class="container mt-5">
        <h2 class="mb-4">Order to Supplier</h2>
        <a href="/viewsupplier">
            <button class="btn btn-primary mb-3">Recent Order</button>
        </a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ordertosupplier') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <div class="mb-3">
                <label for="name" class="form-label">Nama Supplier</label>
               <select class="primary_type" aria-label="Default select example" name="NamaSupplier">
                    <option selected>Open this select menu</option>
                    <option value="Supplier A">Supplier A</option>
                    <option value="Supplier B">Supplier B</option>
                    <option value="Supplier C">Supplier C</option>
                    <option value="Supplier D">Supplier D</option>
                </select>
            </div> --}}

            <div class="mb-3">
                <label for="name" class="form-label">Nama Bahan Baku</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">satuan</label>
                {{-- <input type="text" class="form-control" id="satuan" name="satuan" required> --}}
                <select class="primary_type" aria-label="Default select example" name="satuan">
                    <option selected>Open this select menu</option>
                    <option value="kg">kg</option>
                    <option value="liter">liter</option>
                    <option value="pack">pack</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Harga satuan</label>
                <input type="text" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="mb-3">
                {{-- <label for="name" class="form-label">Total Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
            </div> --}}
                <button type="submit" class="btn btn-primary">Create Item</button>
                {{-- <a href="{{ route('items.index') }}" class="btn btn-secondary">Back</a> --}}
        </form>
    </div>

@endsection
