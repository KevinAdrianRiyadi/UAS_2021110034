@extends('pelanggan.layout.index')

@section('content')
<div class="row mt-4">
    <div class="col-md-6">
    <div class="content-text">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor autem minus dolorem quos, ut consequuntur ea. Repellendus repudiandae, tempora beatae quam quos architecto officia porro et magnam, repellat placeat numquam!
    </div>
</div>
<div class="col-md-6">
    <img src="{{asset('assets/images/hotel.png')}}" style="width: 100%" alt="">
</div>
</div>

<div class="d-flex justify-content-lg-between mt-5">
    <div class="d-flex align-items-center gap-4">
        <i class="fa fa-users fa-2x"></i>
        <p class="m-0 fs-5">+ 300 Pelanggan</p>
    </div>
    <div class="d-flex align-items-center gap-4">
        <i class="fa fa-home fa-2x"></i>
        <p class="m-0 fs-5">+ 300 User</p>
</div>
<div class="d-flex align-items-center gap-4">
    <i class="fa fa-food fa-2x"></i>
    <p class="m-0 fs-5">+ 100 Food</p>
</div>
</div>

<h-4 class="text-center mt-md-5 mb-md-2">Contact Us</h-4>
<hr>
<div class="row mb-md-5">
    <div class="col-md-5">
    <div class="bg-secondary" style="width: 100%; height: 50vh; border-radius: 10px;"></div>
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-header text-center">
                <h4>Kritik dan Saran</h4>
            </div>
    <div class="card-body">
    <p class="p-0 mb-5 text-lg-center">Masukkan kritik dan saran anda kepada aplikasi kami ini agar kami dapat apa yang menjadi kebutuhan anda dan kami dapat berkembang lebih baik lagi.
    </p>
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="email" value="" placeholder="Masukkan email Anda">
    </div>
</div>
<div class="mb-3 row">
    <label for="email" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="pesan" value="" placeholder="Masukkan pesan Anda">
</div>
</div>
<button class="btn btn-primary mt-4 w-100"> Kirim pesan anda</button>
    </div>
</div>
</div>
</div>

@endsection