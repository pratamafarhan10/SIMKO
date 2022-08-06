@extends('layout.main')
@section('title')
    Pengeluaran
@endsection()
@section('container')

    <div class="container mt-4">
        <div class="row">
            <h2 class="mx-auto my-4">Pengeluaran Keseluruhan</h2>
        </div>
        <div class="row justify-content-center">
            <div class="column">
                <div class="card" style="background-color:#00AAAA; width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title" style="color:white">Jumlah Pengeluaran </h5>
                        <p class="card-text" style="color:white">
                            Rp. {{ $expense }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        @php
        $i = 1
        @endphp
    </div>

    <br>

    <div class="container-fluid">
        <!-- tabel pendapatan -->
        <div class="container">
            <div class="row  w-100">
                <table class="table table-striped">
                    <thead>

                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Proker</th>
                            <th scope="col">Departemen</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Tanggal Pengeluaran</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expenses as $expense)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $expense->deskripsi }}</td>
                                <td>{{ $expense->proker }}</td>
                                <td>{{ $expense->divisi }}</td>
                                <td>{{ $expense->jumlah_pengeluaran }}</td>
                                <td>{{ $expense->tanggal_pengeluaran }}</td>


                            </tr>
                            @php
                            $i++
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <!-- Modal Add Pendapatan -->
    <div class="modal fade" id="modal-Tambah">
        <div class="modal-dialog">
            <div class="modal-content bg-light">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: center;"><b>Tambah Pengeluaran</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class=" card-light">
                        <!-- form -->
                        <form action="/pengeluaraninti/store" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" class="form-control" id="deskripsi" placeholder="Deskripsi"
                                        name="deskripsi">
                                </div>
                                <div class="form-group">
                                    <label for="proker">Proker</label>
                                    <input type="text" class="form-control" id="proker" placeholder="Nama Proker"
                                        name="proker">
                                </div>
                                <div class="form-group">
                                    <label for="divisi">Divisi</label>
                                    <select class="custom-select" id="divisi" aria-label="Example select with button addon"
                                        name="divisi">
                                        <option class="font-weight-bold" value="Inti">Inti</option>
                                        <option class="font-weight-bold" value="Enterpreneur">Enterpreneur</option>
                                        <option class="font-weight-bold" value="Akademik">Akademik</option>
                                        <option class="font-weight-bold" value="Kaderisasi">Kaderisasi</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_pengeluaran">Jumlah Pengeluaran</label>
                                    <input type="number" class="form-control" id="jumlah_pengeluaran"
                                        placeholder="Jumlah Pengeluaran" name="jumlah_pengeluaran">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_pengeluaran">Tanggal Pengeluaran</label>
                                    <input type="date" class="form-control" id="tanggal_pengeluaran"
                                        placeholder="Tanggal Pengeluaran" name="tanggal_pengeluaran">
                                </div>


                            </div>

                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-info" data-dismiss="modal"
                                    style="color:black">Close</button>
                                <button type="submit" class="btn btn-outline-info" style="color:black" name="submit">Save
                                    changes</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

@endsection
