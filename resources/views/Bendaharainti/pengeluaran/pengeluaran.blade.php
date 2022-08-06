@extends('layout.maininti')
@section('title')
    Pengeluaran
@endsection()
@section('container')
    <div class="container">

        <div class="row">
            <h2 class="mx-auto my-4">Pengeluaran Keseluruhan</h2>
        </div>
        <div class="row justify-content-center">
            <div class="column">
                <div class="card" style="background-color:#00AAAA; width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title" style="color:white">Jumlah Pengeluaran</h5>
                        <p class="card-text" style="color:white">
                            Rp. {{$expense}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <br> <br>
        <!-- Search bar -->
        

        <br>

        <div class="container-fluid">
            <!-- tabel pendapatan -->
            <div class="container">
                <div>
                    <button type="button" class="btn btn-info mb-2" data-toggle="modal" data-target="#modal-Tambah">+ Add
                        Pengeluaran</button>
                </div>
          
            @php
            $i = 1
            @endphp

                <table class="table table-striped">
                    <thead>

                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Proker</th>
                            <th scope="col">Departemen</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Tanggal Pengeluaran</th>
                            <th scope="colspan=2">Action</th>
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
                                <td><a href="/editpengeluaran/{{ $expense->id }}" class="fa fa-edit"></a>
                                    <button type="button " class="border-0 text-danger bg-transparent" data-toggle="modal"
                                        data-target="#deleteModal{{ $expense->id }}">
                                        <i class=" fa fa-trash"> </i>
                                    </button>
                                </td>

                            </tr>
                            @php
                            $i++
                            @endphp
                             <div class="modal fade" id="deleteModal{{ $expense->id }}" tabindex="-1" aria-labelledby="deleteModalLabel"
                             aria-hidden="true">
                             <div class="modal-dialog modal-dialog-centered">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title" id="deleteModalLabel" style="color:black">Delete Pengeluaran</h5>
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                         </button>
                                     </div>
                                     <div class="modal-body" style="color:black">
                                         Anda yakin ingin menghapus pengeluaran?
                                     </div>
                                     <form action="/pengeluaraninti/{{ $expense->id }}" method="POST">
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
                         </div>
                        @endforeach
                    </tbody>
                </table>

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
                                        <select class="custom-select" id="divisi"
                                            aria-label="Example select with button addon" name="divisi">
                                            <option  value="Inti">Inti</option>
                                            <option  value="Enterpreneur">Enterpreneur</option>
                                            <option  value="Akademik">Akademik</option>
                                            <option  value="Kaderisasi">Kaderisasi</option>
                                            <option  value="Kemahasiswaan">Kemahasiswaan</option>
                                            <option  value="Komunikasi dan Informasi">Komunikasi dan Informasi</option>
                                            <option  value="Riset dan Teknologi">Riset dan Teknologi</option>
                                            <option  value="Dedikasi Masyarakat">Dedikasi Masyarakat</option>
                                            <option  value="Human Resource Development">Human Resource Development</option>
                                            <option  value="Relasi">Relasi</option>
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
