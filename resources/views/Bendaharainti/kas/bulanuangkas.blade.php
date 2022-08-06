@extends('layout.maininti')
@section('title')
Bulan Uang Kas
@endsection()
@section('container')

<style>
    #box {

        width: 250px;
        height: 200px;
        background: #1DB5AC;

        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);

        border-radius: 15px;
    }
</style>

<div class="container mt-3 ">
    <div class="row">
        <h2 class="mx-auto">Uang kas anggota</h2>
    </div>
    <div class="row">
        @foreach ($months as $month)


        <a href="/kasinti/{{ $month->id }}" class="btn mx-auto ">
            <div id="box">
                <br> <br> <br>
                <h3 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                    {{ $month->month_name }}
                </h3>
            </div>
        </a>
        @endforeach
    </div>
</div>

</div>



@endsection()