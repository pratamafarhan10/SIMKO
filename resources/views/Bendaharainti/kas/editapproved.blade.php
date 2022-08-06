@extends('layout.maininti')
@section('title')
Edit Uang Kas
@endsection()
@section('container')

<div class="container">

    <div class="row">
        <h1 class="mx-auto">Verifikasi Status Uang Kas Seluruh Anggota</h1>
    </div>

    <!-- /.card-header -->
    <!-- form start -->

    <form role="form" action="/editapproved/{{ $money->id }}" method="post">
        @method('patch')
        @csrf
        <div class="card-body">
            <div class="form-group col-8" style="left: 200px;">
                <label for="NamaAnda">Nama</label>
                <p>{{$money->fullname}}</p>
            </div>
            <div class="form-group col-8" style="left: 200px;">
                <label for="NimAnda">Nim</label>
                <p>{{$money->nim}}</p>
            </div>
            <div class="form-group col-8" style="left: 200px;">
                <label for="exampleInputPassword1">Departemen</label>
                <p>{{$money->divisi}}</p>
            </div>
            <div class="form-group col-8" style="left: 200px;">
                <label for="JumlahKas">Jumlah Kas</label>
                <p>Rp{{$money->jumlah}},-</p>

            </div>
            <div class="form-group col-8" style="left: 200px;">
                <label for="exampleInputPassword1 col-8">Tanggal Bayar</label>
                <p>{{$money->tanggal_bayar}}</p>
            </div>
            <div class="form-group col-8" style="left: 200px;">
                <label for="statusdepartemen">Status Departemen</label>
                <p id='statusdepartemen'>{{$money->status_dept}}</p>
            </div>
            <div class="form-group col-8" style="left: 200px;">
                <label for="status_inti">Status Inti </label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status_inti" id="Radios1" value="Approved" checked>
                    <label class="form-check-label" for="Radios1">
                        Approved
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status_inti" id="Radios2" value="Not Approved">
                    <label class="form-check-label" for="Radios2">
                        Not Approved
                    </label>
                </div>

            </div>
        </div>
        <div class="modal-footer justify-content-center mx-auto" style="width:700px;margin-left:300px;">
            <a href="/approvekas/{{$money->month_id}}" class="btn btn-danger">Close</a>
            <button type="submit" class="btn btn-info">Save changes</button>
        </div>
    </form>
</div>
</div>

</div>
</div>
</div>




















@endsection()