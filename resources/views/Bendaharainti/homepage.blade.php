@extends('layout.maininti')
@section('title')
Homepage
@endsection()
@section('container')
<div class="container my-2 ">
  <!-- Content Wrapper. Contains page content -->
  <div>
    <h2 style="text-align:center">Sistem Informasi Manajemen Keuangan Organisasi</h2>
    <h3 style="text-align:center">Bendahara Inti</h3>
  </div>
  <!-- /.content-header -->
  <div class="row">
    <form action="/excel" class="mx-auto my-3" method="get">
      @csrf
      <button type="submit" class="btn btn-success">Cetak Excel Keuangan</button>
    </form>
  </div>
  <div class="row">
    <div class="card text-white bg-info mb-3 mx-auto">
      <div class="card-body">
        <h3>Total Uang : Rp.{{$totaluang}}</h3>
      </div>
    </div>
  </div>
  <div class="row ">
    <div class="col">
      <div class="card mx-auto bg-dark" style="width: 500px;">
        <div class="card-body">
          <h3>Pemasukan</h3>

        </div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Jenis</th>
              <th scope="col">Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Uang Kas</td>
              <td>Rp. {{$money}} </td>
            </tr>
            <tr>
              <td>Pendapatan Lain</td>
              <td>Rp. {{$income}}</td>
            </tr>
          </tbody>
          <thead>
            <tr class="bg-success">
              <th scope="col">Total</th>
              <th scope="col">Rp. {{$totalpendapatan}}</th>
            </tr>
          </thead>
        </table>
        <!-- <ul class="list-group list-group-flush">
          <li class="list-group-item">Cras justo odio</li>
          <li class="list-group-item">Cras justo odio</li>
        </ul> -->
      </div>
    </div>
    <div class="col">
      <div class="card mx-auto bg-dark" style="width: 500px;">
        <div class="card-body">
          <h3>Pengeluaran</h3>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Jenis</th>
              <th scope="col">Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Pengeluaran</td>
              <td>Rp. {{$expense}}</td>
            </tr>
          </tbody>
          <thead>
            <tr class=" bg-success">
              <th scope="col">Total</th>
              <th scope="col">Rp. {{$expense}}</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection()