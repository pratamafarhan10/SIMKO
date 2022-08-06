@extends('layout.maininti')
@section('title')
    Edit Pengeluaran
@endsection()
@section('container')


    <div class="container mt-5">

        <div class="card-header">
            <h1 class=" text-center">Edit pengeluaran</h1>
        </div>

        <!-- /.card-header -->
        <!-- form start -->

        <form action="/editpengeluaran/{{ $expense->id }}" method="post">
            @method('patch')
            @csrf
            <div class="card-body">
                <div class="form-group col-8 mx-auto">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control" value="{{ $expense->deskripsi }}" id="deskripsi"
                        placeholder="Deskripsi" name="deskripsi">
                </div>
                <div class="form-group col-8 mx-auto">
                    <label for="proker">Proker</label>
                    <input type="text" class="form-control" value="{{ $expense->proker }}" id="proker"
                        placeholder="Nama Proker" name="proker">
                </div>
                <div class="form-group col-8 mx-auto">
                    <label for="divisi">Divisi</label>
                    <select class="custom-select" id="divisi" aria-label="Example select with button addon" name="divisi">
                        <option class="" value="{{ $expense->divisi }}">{{ $expense->divisi }}</option>
                        <option value="Inti">Inti</option>
                        <option value="Enterpreneur">Enterpreneur</option>
                        <option value="Akademik">Akademik</option>
                        <option value="Kaderisasi">Kaderisasi</option>
                        <option value="Kemahasiswaan">Kemahasiswaan</option>
                        <option value="Komunikasi dan Informasi">Komunikasi dan Informasi</option>
                        <option value="Riset dan Teknologi">Riset dan Teknologi</option>
                        <option value="Dedikasi Masyarakat">Dedikasi Masyarakat</option>
                        <option value="Human Resource Development">Human Resource Development</option>
                        <option value="Relasi">Relasi</option>
                    </select>
                </div>
                <div class="form-group col-8 mx-auto">
                    <label for="jumlah_pengeluaran">Jumlah Pengeluaran</label>
                    <input type="number" class="form-control" value="{{ $expense->jumlah_pengeluaran }}"
                        id="jumlah_pengeluaran" placeholder="Jumlah Pengeluaran" name="jumlah_pengeluaran">
                </div>
                <div class="form-group col-8 mx-auto">
                    <label for="tanggal_pengeluaran">Tanggal Pengeluaran</label>
                    <input type="date" class="form-control" value="{{ $expense->tanggal_pengeluaran }}"
                        id="tanggal_pengeluaran" placeholder="Tanggal Pengeluaran" name="tanggal_pengeluaran">
                </div>


            </div>

            <div class="modal-footer justify-content-center col-8 mx-auto">
                <a href="/pengeluaraninti" class="btn btn-danger" style="color:black">Close</a>
                <button type="submit" class="btn btn-info" name="submit">Save changes</button>
            </div>
        </form>

       <hr>
    </div>

@endsection
