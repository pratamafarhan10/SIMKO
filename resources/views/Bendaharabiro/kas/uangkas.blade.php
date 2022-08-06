@extends('layout.main')
@section('title')
Uang Kas
@endsection()
@section('container')

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h2>Approve uang kas bulan {{$month->month_name}} anggota {{$divisi}}</h2>
        </div>
        <div class="col my-auto">
            <div class="progress">
                @if($progress < 100) <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" style="width: {{$progress}}%;" aria-valuenow="{{$progress}}" aria-valuemin="0" aria-valuemax="100">{{$progress}}% Approved</div>
            @elseif($progress == 100)
            <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: {{$progress}}%;" aria-valuenow="{{$progress}}" aria-valuemin="0" aria-valuemax="100">{{$progress}}% Approved</div>
            @endif
        </div>
    </div>

    <div class="row mt-4 w-100">
        <table class="table table-striped">
            <thead>
                <tr>

                    <th scope="col">No</th>
                    <th scope="col">Nama Anggota</th>
                    <th scope="col">Nim</th>
                    <th scope="col">Departemen</th>
                    <th scope="col">Angkatan</th>
                    <th scope="col">Jumlah Kas</th>
                    <th scope="col">Status Departemen</th>
                    <th scope="col">Tanggal Bayar </th>
                    <th scope="col">Status </th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1
                @endphp

                @foreach ($moneys as $money)


                <tr>

                    <td>{{ $i }}</td>
                    <td>{{ $money->fullname }}</td>
                    <td>{{ $money->nim }}</td>
                    <td>{{ $money->divisi }}</td>
                    <td>{{ $money->angkatan }}</td>
                    <td>Rp. {{ $money->jumlah }}</td>

                    @if($money->status_dept == 'Not approved')
                    <td style="color:red;">{{ $money->status_dept }}</td>
                    @elseif($money->status_dept == 'Approved')
                    <td style="color:green;">{{ $money->status_dept }}</td>
                    @endif
                    <td>{{ $money->tanggal_bayar }}</td>

                    @if($money->status_inti == 'Not approved')
                    <td style="color:red;">{{ $money->status_inti }}</td>
                    @elseif($money->status_inti == 'Approved')
                    <td style="color:green;">{{ $money->status_inti }}</td>
                    @endif

                    @if($money->status_dept == 'Not approved')
                    <td><a href="/edituangkasbiro/{{$money->id}}" class="fa fa-edit"></a></td>
                    @elseif($money->status_dept == 'Approved')
                    <td style="color:green;">
                        Approved
                    </td>
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
@endsection()