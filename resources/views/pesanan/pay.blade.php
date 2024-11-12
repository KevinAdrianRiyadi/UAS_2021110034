@extends('pelanggan.layout.index')
@section('content')
{{-- @dd($dataid) --}}
    <body>
        <div class="container mt-5">
            <h2 class="mb-4 text-center">DetailPesanan</h2>
            {{-- @dd($id) --}}
            <form action="{{ route('pay',$dataid) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="text-center items-center">
                    @if(isset($data->makanan))
                    <p class="text-black">Makanan: {{ $data->makanan->first()->nama }}</p>
                    @endif
                    @if(isset($data->minuman))
                    <p class="text-black">Minuman: {{ $data->minuman->first()->nama }}</p>
                    @endif
                    @if(isset($data->dessert))
                    <p class="text-black">Desert: {{ $data->dessert->first()->nama }}</p>
                    @endif
                    {{-- @dd($data) --}}
                    <p class="text-black">TotalHarga: {{ $data->total_harga }}</p>
                    {{-- <p class="text-black">TotalHarga: {{$data->makanan->first()->nama}}</p> --}}
                    <button type="submit" class="btn btn-primary mb-2">Pay</button>
                </div>
            </form>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    </body>
@endsection
