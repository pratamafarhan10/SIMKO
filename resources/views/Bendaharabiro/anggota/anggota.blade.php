@extends('layout.main')
@section('title')
Anggota
@endsection()
@section('container')
<div class="container">
    <div class="row">
        <h2 class="mx-auto my-4">Anggota {{$divisi}}</h2>
    </div>
    <div class="row justify-content-center">
        <div class="column">
            <div class="card" style="background-color:#00AAAA; width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title" style="color:white">Anggota {{$divisi}}</h5>
                    <p class="card-text" style="color:white">
                        {{$jumlah}} Anggota
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <button type="button" class="btn btn-info my-1" data-toggle="modal" data-target="#modal-primary2">+Add Anggota Baru</button>
    </div>
    <div class="row w-100">

        @php
        $i = 1
        @endphp

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Nim</th>
                    <th>Angkatan</th>
                    <th>Departemen</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{ $member->fullname }}</td>
                    <td>{{ $member->nim }}</td>
                    <td>{{ $member->angkatan }}</td>
                    <td>{{ $member->divisi }}</td>
                    <td><a href="anggotabiro/{{$member->id}}" class="fa fa-edit"></a>
                        <button type="submit" class="border-0 text-danger bg-transparent" data-toggle="modal" data-target="#deleteModal{{$member->id}}">
                        <i class="fa fa-trash"> </i>
                        </button>
                    </td>
                </tr>
                <div class="modal fade" id="deleteModal{{$member->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title bgwhite" id="deleteModalLabel">Delete Anggota</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body bgwhite">
                                Anda yakin ingin menghapus anggota?
                            </div>
                            <form action="/member/{{ $member->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Yes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @php
                $i++
                @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- MODAL INPUT -->
    <div class="modal fade" id="modal-primary2">
        <div class="modal-dialog">
            <div class="modal-content bg-light">
                <div class="modal-header">
                    <h4 class="modal-title">input</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="card-primary">
                        <form action="/anggotabiro/store" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="fullname" style="color:black">Nama Anggota</label>
                                    <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" placeholder="Nama Anggota" name="fullname">
                                    @error('fullname')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nim" style="color:black">Nim</label>
                                    <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" placeholder="Nim" name="nim">
                                    @error('nim')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Angkatan" style="color:black">Angkatan</label>
                                    <p> </p>
                                    <input type="radio" id="radio2" name="angkatan" value="2016" />&nbsp; 2016 &nbsp;
                                    <input type="radio" id="radio2" name="angkatan" value="2017" />&nbsp; 2017 &nbsp;
                                    <input type="radio" id="radio2" name="angkatan" value="2018" />&nbsp; 2018 &nbsp;
                                    <input type="radio" id="radio2" name="angkatan" value="2019" />&nbsp; 2019 &nbsp;
                                    <input type="radio" id="radio2" name="angkatan" value="2020" />&nbsp; 2020 &nbsp;
                                </div>
                                <div class="form-group">
                                    <label for="departemen">Departemen</label>
                                    <select class="custom-select @error('departemen') is-invalid @enderror" id="departemen" aria-label="Example select with button addon" name="divisi">
                                        <option value="{{$divisi}}">{{$divisi}}</option>
                                    </select>
                                    @error('departemen')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-info" data-dismiss="modal" style="color:black">Close</button>
                                <button type="submit" class="btn btn-outline-info" style="color:black" name="submit">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
@endsection()