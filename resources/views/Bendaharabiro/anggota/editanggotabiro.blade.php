@extends('layout.main')
@section('title')
Edit Anggota
@endsection()
@section('container')
<div class="container mt-2">
  <div class="row">
    <h1 class="mx-auto">Edit Anggota</h1>
  </div>
  <form action="/anggotabiro/{{$member->id}}/update" method="post">
    @method('patch')
    @csrf
    <div class="card-body">
      <div class="form-group col-8 mx-auto">
        <label for="nama">Nama Anggota</label>
        <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="nama" placeholder="Nama Anggota" name="fullname" value="{{$member->fullname}}">
        @error('fullname')
        <div id="validationServer03Feedback" class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-group col-8 mx-auto"">
        <label for=" nim">Nim</label>
        <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" placeholder="Nim" name="nim" value="{{$member->nim}}">
        @error('nim')
        <div id="validationServer03Feedback" class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-group col-8 mx-auto"">
        <label for=" Angkatan">Angkatan</label>
        <br>
        <input type="radio" id="radio2" name="angkatan" value="2016" @if($member->angkatan == 2016)
        checked
        @endif/>&nbsp; 2016 &nbsp;
        <input type="radio" id="radio2" name="angkatan" value="2017" @if($member->angkatan == 2017)
        checked
        @endif/>&nbsp; 2017 &nbsp;
        <input type="radio" id="radio2" name="angkatan" value="2018" @if($member->angkatan == 2018)
        checked
        @endif />&nbsp; 2018 &nbsp;
        <input type="radio" id="radio2" name="angkatan" value="2019" @if($member->angkatan == 2019)
        checked
        @endif />&nbsp; 2019 &nbsp;
        <input type="radio" id="radio2" name="angkatan" value="2020" @if($member->angkatan == 2020)
        checked
        @endif />&nbsp; 2020 &nbsp;
      </div>
      <div class="form-group col-8 mx-auto"">
        <label for=" departemen">Departemen</label>
        <select class="custom-select" id="departemen" aria-label="Example select with button addon" name="divisi">
          <option value="{{$member->divisi}}">{{$member->divisi}}</option>
        </select>
      </div>
    </div>
    <div class="modal-footer justify-content-center mx-auto" style="width:700px;margin-left:300px;">
      <a href="/anggotabiro" class="btn btn-danger" style="color:white;">Close</a>
      <button type="submit" class="btn btn-info" style="color:white" name="submit">Save changes</button>
    </div>
  </form>
</div>
@endsection()