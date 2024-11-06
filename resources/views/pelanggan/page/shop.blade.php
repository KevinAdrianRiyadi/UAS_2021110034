@extends('pelanggan.layout.index')

@section('content')
    <div class="row"></div>
    <div class="col-sm-2">
        <div class="card" style="width: 18rem;">
            <div class="card-header">
                Category
            </div>
            <div class="card-body">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Makanan
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="d-flex flex-column gap-4">
                                    <a href="#" class="page-link">
                                        <i class="fas fa-plus"></i>Indonesian food
                                    </a>
                                    <a href="#" class="page-link">
                                        <i class="fas fa-plus"></i>Western food
                                    </a>
                                    <a href="#" class="page-link">
                                        <i class="fas fa-plus"></i>Korean food
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Minuman
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body p-0">
                                <div class="accordion-body">
                                    <div class="d-flex flex-column gap-4">
                                        <a href="#" class="page-link">
                                            <i class="fas fa-plus"></i>Cocktail
                                        </a>
                                        <a href="#" class="page-link">
                                            <i class="fas fa-plus"></i>Mocktail
                                        </a>
                                        <a href="#" class="page-link">
                                            <i class="fas fa-plus"></i>Coffee
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                Dessert
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body p-0">
                                <div class="accordion-body">
                                    <div class="d-flex flex-column gap-4">
                                        <a href="#" class="page-link">
                                            <i class="fas fa-plus"></i>Tiramisu
                                        </a>
                                        <a href="#" class="page-link">
                                            <i class="fas fa-plus"></i>Pancake
                                        </a>
                                        <a href="#" class="page-link">
                                            <i class="fas fa-plus"></i>Waffle
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 d-flex flex-wrap gap-4 mb-4">
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
        </div>
    </div>
    



        <nav class="col-md-9 d-flex flex-wrap gap-4 mb-4">
            <ul class="pagination">
                <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active">
                    <span class="page-link">
                        2
                        <span class="sr-only">(current)</span>
                    </span>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    @endsection
