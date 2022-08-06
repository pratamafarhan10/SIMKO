@extends('layout.maininti')
@section('title')
Tambah User
@endsection()
@section('container')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card mx-auto" style="background-color: #273746; width:650px;">
                <div class="card-header">Tambah Akun</div>

                <div class="card-body">
                    <form method="POST" action="/tambahakun/submit">
                        @csrf

                        <div class="form-group row">
                            <label for="fullname" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}" required autocomplete="fullname" autofocus>

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim') }}" required autocomplete="nim" autofocus>

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
                                    <option value="Inti">Inti</option>
                                    <option value="Entrepreneur">Entrepreneur</option>
                                    <option value="HRD">HRD</option>
                                    <option value="Akademik">Akademik</option>
                                    <option value="Kaderisasi">Kaderisasi</option>
                                    <option value="Kemahasiswaan">Kemahasiswaan</option>
                                    <option value="Kominfo">Kominfo</option>
                                    <option value="Riset dan Teknologi">Riset dan Teknologi</option>
                                    <option value="Dedikasi Masyarakat">Dedikasi Masyarakat</option>
                                    <option value="Relasi">Relasi</option>
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
                                        <option value="1">Inti</option>
                                        <option value="2">Biro</option>
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