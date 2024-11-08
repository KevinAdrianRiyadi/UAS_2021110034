@extends('pelanggan.layout.index')

@section('content')

    <div class="content mt-5 d-flex flex-lg-wrap gap-5 mb-5">
        {{-- @foreach($data as $item) --}}
            <div class="card" style="width: 220px;">
                <div class="card-header m-auto" style="border-radius :5px;">
                    <img src="{{ asset('assets/images/nasgor.png') }}" alt="makanan 1" style="width: 100%;">
                </div>
                <div class="card-body">
                    <p class="m-0 text-justify"> Nasi Goreng With Egg </p>
                    <p class="m-0"><i class="fa-regular fa-star"></i>5+</p>
                </div>
                <div class="card-footer d-flex flex-row justify-content-between align-items-center">
                    <p class="m-0" style="font-size: 16px; font-weight:600;"> Rp 100.000</p>
                    <button class="btn btn-outline-primary" style="font-size: 24px">
                        <i class="fa-solid fa-cart-plus"></i>
                    </button>
                </div>
            </div>
            {{-- @endforeach --}}
        </div>
    </div>
@endsection
