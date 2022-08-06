@extends('layout.main')
@section('title')
Homepage
@endsection()
@section('container')
<div class="container">
    <div class="row">
        <div class="col" style="height: 500px; ">
            <p style="font-size: 35px; margin-top: 190px;">{{$sapa}}, <strong>{{$nama}}</strong></p>
            <p style="font-size: 30px;">{{$date}}</p>
            <p style="font-size: 30px;">{{$date2}}</p>
        </div>
        <div class="col" style="height: 500px; ">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="margin-top: 150px;">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card mx-auto my-auto crd" style="width: 18rem; height: 200px;">
                            <div class="card-body">
                                <h3>Anggota</h3>
                                <p class="card-text">Dalam divisi kamu sudah ada {{$anggota}} anggota lho!</p>
                                <a href="/anggotabiro" class="card-link btn btn-success">Lihat anggota</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card mx-auto my-auto crd" style="width: 18rem; height: 200px;">
                            <div class="card-body">
                                <h3>Uang kas</h3>
                                <p class="card-text">Dalam bulan {{$month->month_name}} ada {{$notapproved}} anggota yang belum membayar</p>
                                <a href="/kasbiro/{{$month->id}}" class="card-link btn btn-success">Lihat bulan</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card mx-auto my-auto crd" style="width: 18rem; height: 200px;">
                            <div class="card-body">
                                <h3>Uang kas</h3>
                                <p class="card-text">Total uang kas divisi {{$divisi}} sebesar Rp. {{$money}}</p>
                                <a href="/kasbiro" class="card-link btn btn-success">Lihat uang kas</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"></span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"></span>
                </a>
            </div>
        </div>
    </div>

</div>
@endsection()