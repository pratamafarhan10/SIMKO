@extends('layout.main')
@section('title')
    Pendapatan Lain
@endsection()
@section('container')
    <div class="container mt-4">
        <!-- Dashboard card -->
        <div class="row">
            <h2 class="mx-auto my-4">Pendapatan {{$divisi}}</h2>
        </div>
        <div class="row justify-content-center">
            <div class="column">
                <div class="card " style="background-color:#00AAAA; width: 20rem;">
                    <div class="card-body ">
                        <h5 class="card-title " style="color:white">Jumlah Pendapatan</h5>
                        <p class="card-text " style="color:white">
                            Rp. {{ $income }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        @php
        $i = 1
        @endphp

        <div class="container-fluid ">
            <!-- tabel pendapatan -->
            <div class="container">
                <div>
                    <button type="button" class="btn btn-info  mb-2" data-toggle="modal" data-target="#modal-Tambah">+ Add
                        Pendapatan</button>
                </div>
                <div class="row w-100">
                    <table class="table table-striped">
                        <thead>

                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Produk</th>
                                <th scope="col">Jumlah Penjualan</th>
                                <th scope="col">Pendapatan Bersih</th>
                                <th scope="col">Status</th>
                                <th scope="colspan=2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendapatan as $income)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $income->deskripsi }}</td>
                                    <td>{{ $income->jumlah_penjualan }}</td>
                                    <td>{{ $income->pendapatan_bersih }}</td>
                                    @if ($income->status == 'Not Approved')
                                        <td style="color:red;">{{ $income->status }}</td>
                                    @elseif($income->status == 'Approved')
                                        <td style="color:green;">{{ $income->status }}</td>
                                    @endif

                                    @if ($income->status == 'Not Approved')
                                    <td><a href="/editpendapatan/{{ $income->id }}" class="fa fa-edit"></a>
                                        <button type="button " class="border-0 text-danger bg-transparent"
                                            data-toggle="modal" data-target="#deleteModal{{ $income->id }}">
                                            <i class=" fa fa-trash"> </i>
                                        </button>
                                    </td>
                                    @elseif($income->status == 'Approved')
                                        <td style="color:green;">{{ $income->status }}</td>
                                    @endif
                                    

                                </tr>
                                <div class="modal fade bgwhite" id="deleteModal{{ $income->id }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Delete Pendapatan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Anda yakin ingin menghapus pendapatan?
                                            </div>
                                            <form action="/pendapatanbiro/{{ $income->id }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Yes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        Anda yakin ingin menghapus pendapatan?
                                    </div>
                                    <form action="/pendapatanbiro/{{ $income->id }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Yes</button>
                                        </div>
                                    </form>
                                </div>
                                @php
                                $i++
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <!-- Modal Delete -->

        <!-- Modal Add Pendapatan -->
        <div class="modal fade" id="modal-Tambah">
            <div class="modal-dialog">
                <div class="modal-content bg-light">
                    <div class="modal-header">
                        <h4 class="modal-title" style="text-align: center;"><b>Tambah Pendapatan</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class=" card-light">
                            <!-- form -->
                            <form action="/pendapatanbiro/store" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="deskripsi">Nama Produk</label>
                                        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                            id="deskripsi" placeholder="Nama Produk" name="deskripsi">

                                        @error('deskripsi')
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="jumlah_penjualan">Jumlah Produk</label>
                                        <input type="number" class="form-control" id="jumlah_penjualan"
                                            placeholder="Jumlah Produk" name="jumlah_penjualan">
                                    </div>
                                    <div class="form-group">
                                        <label for="pendapatan_bersih">Pendapatan Bersih</label>
                                        <input type="number" class="form-control" id="pendapatan_bersih"
                                            placeholder="Pendapatan Bersih" name="pendapatan_bersih">
                                    </div>

                                </div>

                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-info" data-dismiss="modal"
                                        style="color:black">Close</button>
                                    <button type="submit" class="btn btn-outline-info" style="color:black"
                                        name="submit">Save changes</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
