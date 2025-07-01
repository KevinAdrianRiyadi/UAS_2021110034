@extends('pelanggan.layout.index')
@section('content')
{{-- @dd($dataid) --}}
    <body>
        <div class="container mt-5">
            <h2 class="mb-4 text-center">Pilih Metode Pembayaran</h2>
            {{-- @dd($id) --}}
            <form action="{{ route('pay',$dataid) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="text-center items-center">
                    @if(isset($data->makanan)  && $data->makanan->first())
                    <p class="text-black">Makanan: {{ $data->makanan->first()->nama }}</p>
                    @endif
                    <p class="text-black">Total Harga: {{ $data->total_harga }}</p>
                    <div class="m-4">
                        <select name="paymethod" id="paymethod" required aria-placeholder="Select Payment Method">
                            {{-- <option value="null">Select payment method</option> --}}
                            <option value="VA">Virtual Account</option>
                            <option value="EDC">EDC</option>
                            <option value="RoomCharge">Room Charge</option>
                        </select>
                    </div>
                    {{-- <p class="text-black">TotalHarga: {{$data->makanan->first()->nama}}</p> --}}
                    <button type="submit" class="btn btn-primary mb-2">Pay</button>
                </div>
            </form>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    </body>
@endsection
