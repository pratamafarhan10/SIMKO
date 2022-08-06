@extends('layout.maininti')
@section('title')
Edit User
@endsection()
@section('container')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card mx-auto" style="background-color: #273746; width:650px;">
                <div class="card-header">Edit Akun</div>

                <div class="card-body">
                    <form method="POST" action="/listuser/{{$user->id}}/update">
                        @csrf
                        @method('patch')
                        <div class="form-group row">
                            <label for="fullname" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{$user->fullname}}" required autocomplete="fullname" autofocus>

                                @error('fullname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nim" class="col-md-4 col-form-label text-md-right">{{ __('Nim') }}</label>

                            <div class="col-md-6">
                                <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{$user->nim}}" required autocomplete="nim" autofocus>

                                @error('nim')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="divisi" class="col-md-4 col-form-label text-md-right">{{ __('Divisi') }}</label>

                            <div class="col-md-6">
                                <select class="custom-select" id="Divisi" aria-label="Example select with button addon" name="divisi">
                                    <option value="Inti" @if($user->divisi == 'inti')
                                        selected
                                        @endif>Inti</option>
                                    <option value="Entrepreneur" @if($user->divisi == 'Entrepreneur')
                                        selected
                                        @endif>Entrepreneur</option>
                                    <option value="HRD" @if($user->divisi == 'HRD')
                                        selected
                                        @endif>HRD</option>
                                    <option value="Akademik" @if($user->divisi == 'Akademik')
                                        selected
                                        @endif>Akademik</option>
                                    <option value="Kaderisasi" @if($user->divisi == 'Kaderisasi')
                                        selected
                                        @endif>Kaderisasi</option>
                                    <option value="Kemahasiswaan" @if($user->divisi == 'Kemahasiswaan')
                                        selected
                                        @endif>Kemahasiswaan</option>
                                    <option value="Kominfo" @if($user->divisi == 'Kominfo')
                                        selected
                                        @endif>Kominfo</option>
                                    <option value="Riset dan Teknologi" @if($user->divisi == 'Riset dan Teknologi')
                                        selected
                                        @endif>Riset dan Teknologi</option>
                                    <option value="Dedikasi Masyarakat" @if($user->divisi == 'Dedikasi Masyarakat')
                                        selected
                                        @endif>Dedikasi Masyarakat</option>
                                    <option value="Relasi" @if($user->divisi == 'Relasi')
                                        selected
                                        @endif>Relasi</option>
                                </select>

                                @error('divisi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="kategori_id" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <!-- selection disini -->
                                <div class="form-group">
                                    <select class="custom-select" id="kategori_id" aria-label="Example select with button addon" name="kategori_id">
                                        <option value="1" @if($user->kategori_id == 1)
                                            selected
                                            @endif>Inti</option>
                                        <option value="2" @if($user->kategori_id == 2)
                                            selected
                                            @endif>Biro</option>
                                    </select>
                                </div>
                                @error('kategori_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <a href="/listuser" class="btn btn-danger" style="color:white;">Close</a>
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection