@extends('layout.maininti')
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
    <div class="card-body">
        <form action="/editpendapatan/{{ $income->id }}" method="post" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="form-group col-8 mx-auto">
                <label for="JumlahKas">Produk</label>
                <p>{{ $income->deskripsi }}</p>
            </div>
            <div class="form-group col-8 mx-auto">
                <label for="exampleInputPassword1 col-8">Jumlah Penjualan</label>
                <p>{{ $income->jumlah_penjualan }}</p>
            </div>


            <div class="form-group col-8 mx-auto">
                <label for="exampleInputPassword1 col-8">Jumlah Penjualan</label>
                <p>{{ $income->pendapatan_bersih }}</p>
            </div>

            <br>

            <div class="form-group col-8 mx-auto">
                <div class="form-check">
                    <div class="row">
                        <div class="col-5">
                            <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="Approved" action="" checked required>
                            <label class="form-check-label" for="Approved">
                                Approved
                            </label>
                        </div>

                        <div class="col">
                            <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="Not Approved" action="" required>
                            <label class="form-check-label" for="Not Approved">
                                Not Approved
                            </label>
                        </div>

                    </div>
                </div>

            </div>
    </div>

    <div class="modal-footer justify-content-center mx-auto col-8" style="width:700px;margin-left:300px;">
        <a href="/pendapataninti" class="btn btn-danger">Close</a>
        <button type="submit" class="btn btn-info">Save changes</button>
    </div>
    </form>

</div>

@endsection