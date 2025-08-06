<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Detail Makanan</title>
</head>
@extends('pelanggan.layout.index')
@section('content')

    <body>
        <div class="container mt-5">
            <h2 class="mb-4">Resep Menu</h2>
            @if ($data->photo)
                <img src="{{ asset('storage/' . $data->photo) }}" alt="Foto Makanan" class="img-thumbnail" width="200">
            @else
                <p>Foto belum tersedia.</p>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="mb-3">
                <div class=" ">
                    <label for="name" class="form-label">Nama Menu : {{ $data->nama }}</label>
                    <label for="name" class="form-label">harga Rp {{ $data->harga }}</label>
                </div>
            </div>

            <div class="mb-3 ">
                <div class="d-flex gap-2">
                    <label for="name" class="form-label">Tambah Bahan yang dibutuhkan</label>
                    <form action="/tambahresep" method="POST" enctype="multipart/form-data">
                        @csrf
                        <select class="primary_type" aria-label="Default select example" name="id_stokbahanbaku">
                            <option selected value="">--select bahanbaku--</option>
                            @foreach ($stokbahanbaku as $as)
                                <option value="{{ $as->id }}">{{ $as->namabahan }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="">
                    <label for="">Jumlah bahan baku yang dibutuhkan</label>
                    <input type="text" name="jumlah_dibutuhkan" id="jumlah_dibutuhkan">
                    <button type="submit">tambah resep</button>
                </div>
                <input hidden type="text" name="id_menu" id="id_menu" value="{{ $idmenu }}">
                </form>
            </div>

            <div class="mb-3">
                <h4 for="name" class="form-label">List Bahan yang dibutuhkan </h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama bahan baku</th>
                            <th>Jumlah yang dibutuhkan</th>
                            <th>Satuan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="itemTable">
                        @foreach ($resep as $item)
                            <tr>
                                <td>{{ $item->stokbahanbaku->first()->namabahan }}</td>
                                <td>{{ $item->jumlah_dibutuhkan }}</td>
                                <td>{{ $item->stokbahanbaku->first()->satuan }}</td>
                                <td>
                                    <a href="{{ route('editdetailmenu', $item->id) }}">Edit</a>

                                    <form action="{{ route('deletedetailmenu', $item->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red p-1">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <h4 for="name" class="form-label"> Stok yang tersedia {{ $porsi }} </h4> --}}

                {{-- <a href="/hitungPorsi/{{ $idmenu }}"> Hitung Porsi</a> --}}

                {{-- <form action="/hitungPorsi/{$idmenu}" method="GET">
                    <button type="submit"></button>
                </form> --}}
            </div>
        </div>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>

@endsection
