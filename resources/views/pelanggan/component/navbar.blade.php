<nav class="navbar navbar-dark navbar-expand-lg" style="background-color: #025464">
    <div class="container">
            <a class="navbar-brand" href="{{route('Home')}}">
                
                  
                Hotel</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end gap-4" id="navbarNav">
            <ul class="navbar-nav gap-4">
                @if(auth()->user())
                <li class="nav-item">
                    <a class="nav-link fs-5 active" aria-current="page" href="adminmenu">All Menu Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 active" aria-current="page" href="#">All Menu Kitchen (Stok & Verify Receipt)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 active" aria-current="page" href="{{route('viewpesanan')}}">All Menu Pelanggan (Add pesanan,Total Pesanan, Bayar)</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link fs-5 active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 " href="#">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 " href="#">Contact Us</a>
                </li>
                @endif
            </ul>
            @if (auth()->user())
                <div class="d-flex gap-4 align-items-center">
                    {{-- <button class="btn btn-success" type="button">Welcome! {{auth()->user()->name}}</button> --}}
                    </i>
                    </a>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome! {{ auth()->user()->name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="p-2">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @else
                <div class="d-flex gap-4 align-items-center">
                    <button class="btn btn-success" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Login | Register</button>

                    </i>
                    </a>
                </div>
            @endif
        </div>
    </div>
</nav>
