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

<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <form action="{{ route('ordertosupplier') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nama Bahan Baku</label>
          <select name="id_stokbahanbaku" id="id_stokbahanbaku" class="form-select" required>
            <option value="">--Select bahan baku--</option>
            @foreach ($data as $bahan)
              <option value="{{ $bahan->id }}">{{ $bahan->namabahan }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="jumlah" class="form-label">Jumlah Barang yang dipesan</label>
          <input type="number" class="form-control" id="jumlah" name="jumlah" required>
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-primary">Create Item</button>
        </div>
      </form>
    </div>

    <div class="col-sm-6 text-center">
        List Bahan Baku
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Satuan</th>
            <th>Stok</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $bahan)
            <tr>
              <td>{{ $bahan->namabahan }}</td>
              <td>{{ $bahan->harga }}</td>
              <td>{{ $bahan->satuan }}</td>
              <td>{{ $bahan->stokbahan }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

    @endsection
