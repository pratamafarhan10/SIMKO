@extends('layout.main')
@section('title')
Edit Pendapatan Lain
@endsection()
@section('container')
<div class="container mt-2">

    <div class="row">
        <h1 class="mx-auto">Edit Pendapatan</h1>
    </div>

    <!-- /.card-header -->
    <!-- form start -->



    <div class="card-body ">
        <form action="/editpendapatan/{{ $income->id }}" method="post" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="form-group col-8 mx-auto">
                <label for="deskripsi">Nama Produk</label>
                <input type="text" class="form-control" id="deskripsi" placeholder="Nama Produk" name="deskripsi" value="{{ $income->deskripsi }}">
            </div>
            <div class="form-group col-8 mx-auto">
                <label for="jumlah_penjualan">Jumlah Produk</label>
                <input type="number" class="form-control" id="jumlah_penjualan" placeholder="Jumlah Produk" name="jumlah_penjualan" value="{{ $income->jumlah_penjualan }}">
            </div>
            <div class="form-group col-8 mx-auto">
                <label for="pendapatan_bersih">Pendapatan Bersih</label>
                <input type="number" class="form-control" id="pendapatan_bersih" placeholder="Jumlah Pendapatan" name="pendapatan_bersih" value="{{ $income->pendapatan_bersih }}">
            </div>



            <div class="modal-footer justify-content-center mx-auto col-8" style="width:700px;margin-left:300px;">
                <a href="/pendapatanbiro" class="btn btn-danger">Close</a>
                <button type="submit" class="btn btn-info">Save changes</button>
            </div>
    </div>


    </form>

</div>

@endsection