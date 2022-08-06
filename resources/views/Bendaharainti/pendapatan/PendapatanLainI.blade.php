@extends('layout.maininti')
@section('title')
Pendapatan Lain
@endsection()
@section('container')
@php
$i = 1
@endphp
<div class="container">
    <!-- Dashboard card -->
    <div class="row">
        <h2 class="mx-auto my-4">Pendapatan Keseluruhan</h2>
    </div>
    <div class="row justify-content-center ">
        <div class="column">
            <div class="card " style="background-color:#00AAAA; width: 20rem;">
                <div class="card-body ">
                    <h5 class="card-title " style="color:white">Jumlah Pendapatan</h5>
                    <p class="card-text " style="color:white">
                        Rp. {{ $income }}
                    </p>
                </div>
            </div>
        </div>
    </div>


    <!-- tabel pendapatan -->

    <div class="row mt-4 w-100">
        <table class="table table-striped">
            <thead>

                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Jumlah Penjualan</th>
                    <th scope="col">Pendapatan Bersih</th>
                    <th scope="col">Status</th>
                    <th scope="colspan=2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($incomes as $income)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $income->deskripsi }}</td>
                    <td>{{ $income->jumlah_penjualan }}</td>
                    <td>{{ $income->pendapatan_bersih }}</td>
                    @if ($income->status == 'Not Approved')
                    <td style="color:red;">{{ $income->status }}</td>
                    @elseif($income->status == 'Approved')
                    <td style="color:green;">{{ $income->status }}</td>
                    @endif

                    @if ($income->status == 'Not Approved')
                    <td><a href="/editpendapatan/{{ $income->id }}" class="fa fa-edit"></a></td>
                    @elseif($income->status == 'Approved')
                    <td style="color:green;">Approved</td>
                    @endif


                </tr>
                @php
                $i++
                @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection