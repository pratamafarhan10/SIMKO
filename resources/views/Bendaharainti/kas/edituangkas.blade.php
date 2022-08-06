@extends('layout.maininti')
@section('title')
Edit Uang Kas
@endsection()
@section('container')

<div class="container mt-2">

  <div class="row">
    <h1 class="mx-auto">Verifikasi Status Uang Kas Anggota</h1>
  </div>

  <!-- /.card-header -->
  <!-- form start -->

  <form action="/edituangkasinti/{{ $money->id }}" method="post" enctype="multipart/form-data">
    @method('patch')
    @csrf
    <div class="card-body">
      <div class="form-group col-8" style="left: 200px;">
        <label for="namalengkap">Nama Lengkap</label>
        <p name='namalengkap'>{{ $money->fullname }}</p>
      </div>
      <div class="form-group col-8" style="left: 200px;">
        <label for="nim">NIM</label>
        <p name='nim'>{{ $money->nim }}</p>
      </div>
      <div class="form-group col-8" style="left: 200px;">
        <label for="bulanke">Bulan ke</label>
        <p name='bulanke'>{{ $money->month_id }}</p>
      </div>
      <div class="form-group col-8" style="left: 200px;">
        <label for="JumlahKas">Jumlah Kas</label>
        <select class="custom-select" id="JumlahKas" name="jumlah" aria-label="Example select with button addon">
          <option value="15000">Rp.15.000</option>
        </select>
      </div>
      <div class="form-group col-8" style="left: 200px;">
        <label for="tanggal_bayar">Tanggal Bayar</label>
        <input value="{{ $money->tanggal_bayar }}" name="tanggal_bayar" type="date" class="form-control @error('tanggal_bayar') is-invalid @enderror" id="tanggal_bayar" placeholder="">
        @error('tanggal_bayar')
        <div id="validationServer03Feedback" class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-group col-8" style="left: 200px;">
        <div class="form-check">
          <div class="row">
            <div class="col-5">
              <input class="form-check-input" type="radio" name="status_dept" id="gridRadios1" value="Approved" action="" checked required>
              <label class="form-check-label" for="Approved">
                Approved
              </label>
            </div>

            <div class="col">
              <input class="form-check-input" type="radio" name="status_dept" id="gridRadios2" value="Not approved" action="" required>
              <label class="form-check-label" for="Not Approved">
                Not Approved
              </label>
            </div>

          </div>
        </div>

      </div>
    </div>

    <div class="modal-footer justify-content-center mx-auto" style="width:700px;margin-left:300px;">
      <a href="/kasinti/{{$money->month_id}}" class="btn btn-danger">Close</a>
      <button type="submit" class="btn btn-info">Save changes</button>
    </div>
  </form>
</div>

@endsection