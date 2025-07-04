<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery (required for Bootstrap 4) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Popper.js (required for Bootstrap 4) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@extends('pelanggan.layout.index')
@section('content')

    <body>
        <div class="container mt-5">
            <h2 class="mb-4">Kitchen</h2>



            {{-- @dd($datapesanan) --}}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Pesanan ID</th>
                        <th>No Kamar</th>
                        <th>Menu</th>
                        {{-- <th>Notes</th> --}}
                        {{-- <th>Total Harga</th> --}}
                        <th>Status Pembayaran</th>
                        <th>Status Pesanan</th>
                    </tr>
                </thead>
                <tbody id="itemTable">
                    @foreach ($datapesanan as $item)
                        <tr>
                            {{-- <td>#{{ \Illuminate\Support\Str::padLeft($item->id, 4, 0) }}</td> --}}
                            <td>#{{ $item->id }}</td>
                            <td>{{ $item->no_kamar }}</td>
                            <td>
                                @foreach ($item->pesanandetail as $detail)
                                    <li>
                                        {{ $detail->makanan->nama }}
                                        {{ $detail->jumlah }}

                                        {{-- {{ 'Rp ' . number_format($detail->totalharga, 0, ',', '.') }} --}}

                                        {{ $detail->catatan }}
                                    </li>
                                @endforeach
                            </td>

                            {{-- <td>{{ $item->notes }}</td> --}}
                            {{-- <td>{{ $item->total_harga }}</td> --}}
                            <td>{{ $item->status_pembayaran }}</td>
                            <td>{{ $item->status_pesanan }}</td>

                            {{-- <td>{{ $item->stok }}</td> --}}
                            <td>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-primary" id="launchModalBtn{{ $item->id }}">
                                        Detail
                                    </button>
                                    @if ($item->status_pesanan == 'serve')
                                    @else
                                        <form action="{{ route('updatekitchen', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to serve this item?');">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success">Serve</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                            {{-- <td>
                        <button class="btn btn-warning btn-sm" onclick="editItem({{ $item->id }})">Edit</button>
                        <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td> --}}
                        </tr>
                        {{-- @dd($item->makanan) --}}
                        <!-- Modal -->
                        <div class="modal fade" id="modaldetail{{ $item->id }}" tabindex="-1"
                            aria-labelledby="modaldetailTitle{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle{{ $item->id }}">Pesanan ID
                                            {{ $item->id_detailpesanan }}
                                        </h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        {{-- makanan : {{ $item->makanan->first()->nama }} --}}
                                        {{-- @dd($item->makanan) --}}
                                        <div class="text-black">Menu : </div>
                                        
                                        @foreach ($item->pesanandetail as $detail)
                                            <li> {{ optional($detail->makanan)->nama }} - {{$detail->jumlah}} item 
                                                @if($detail->catatan ==! null)
                                            <p>Notes: {{$detail->catatan}}</p>
                                        @endif</li>
                                        @endforeach




                                        {{-- <p class="text-black">Notes : {{ $item->notes }}</p> --}}
                                        {{-- <p class="text-black">Total Harga Rp {{ $item->total_harga }}</p> --}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            document.getElementById('launchModalBtn{{ $item->id }}').addEventListener('click', function() {
                                var myModal = new bootstrap.Modal(document.getElementById('modaldetail{{ $item->id }}'));
                                myModal.show();
                            });
                        </script>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $data->links() }}    --}}
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    </body>
@endsection
