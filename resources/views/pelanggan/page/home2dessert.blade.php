@extends('pelanggan.layout.index')

@section('content')
    <style>
        .menu-categories {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 30px;
        }

        .menu-categories a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .menu-categories a.active {
            color: #ff8c00;
        }

        .menu-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        .menu-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
        }

        .menu-item .menu-details {
            flex: 1;
            margin-left: 20px;
        }

        .menu-item h5 {
            margin: 0;
            font-weight: bold;
        }

        .menu-item p {
            margin: 0;
            color: #666;
            font-size: 0.9rem;
        }

        .menu-item .price {
            font-size: 1.2rem;
            font-weight: bold;
            color: #ff8c00;
        }
    </style>


    <body>
      <section class="bg-dark">
        <div class="container px-5 py-5 bg-dark hero-header mb-5">
            <div class="container my-5 py-5">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="display-3 text-white animated slideInLeft">Enjoy Our<br>Delicious Meal</h1>
                        <p class="text-white animated slideInLeft mb-4 pb-2">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                        <a href="" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Book A Table</a>
                    </div>
                    <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                        {{-- <img class="img-fluid" src="" alt=""> --}}
                        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img src="https://images.pexels.com/photos/1279330/pexels-photo-1279330.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                              <img src="https://images.pexels.com/photos/1279330/pexels-photo-1279330.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                              <img src="https://images.pexels.com/photos/1279330/pexels-photo-1279330.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="d-block w-100" alt="...">
                            </div>
                          </div>
                          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                          </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>
      


        <div class="container my-5">
            <div class="menu-categories">
                <a href="{{route('Home')}}" class="active">
                    <span></span> Food
                </a>
                <a href="{{route('Homeminuman')}}">
                    <span></span> Beverage
                </a>
                <a href="#">
                    <span></span> Dessert
                </a>
            </div>

            
            <div class="row">
                <div class="col-md-6">
                  <h2 class="text-black text-lg font-bold">Ice Cream</h2>
                    @foreach ($icecream as $item)
                        <div class="menu-item">
                            <img src="https://via.placeholder.com/80" alt="Menu Item">
                            <div class="menu-details">
                                <h5>{{ $item->nama }}</h5>
                                <p>{{ $item->kategori }}</p>
                            </div>
                            <div class="price">Rp {{ $item->harga }}</div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-6">
                  <h2 class="text-black text-lg font-bold">Cake</h2>
                    @foreach ($cake as $item)
                        <div class="menu-item">
                            <img src="https://via.placeholder.com/80" alt="Menu Item">
                            <div class="menu-details">
                                <h5>{{ $item->nama }}</h5>
                                <p>{{ $item->kategori }}</p>
                            </div>
                            <div class="price">Rp {{ $item->harga }}</div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-6">
                  <h2 class="text-black text-lg font-bold">Waffle</h2>
                    @foreach ($waffle as $item)
                        <div class="menu-item">
                            <img src="https://via.placeholder.com/80" alt="Menu Item">
                            <div class="menu-details">
                                <h5>{{ $item->nama }}</h5>
                                <p>{{ $item->kategori }}</p>
                            </div>
                            <div class="price">Rp {{ $item->harga }}</div>
                        </div>
                    @endforeach
                </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    @endsection
