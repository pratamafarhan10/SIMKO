@extends('layout.main')
@section('title')
    Profile
@endsection()
@section('container')

    <div class="container" style="margin-top: 150px;">

        <div class="card card-primary card-outline mx-auto" style="background-color: #273746; width:400px;">
            <div class="card-body">

                <h3 class="profile-username text-center">{{ $user->fullname }}</h3>

                <p class="text-muted text-center">{{ $user->email }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item" style="background-color: #273746;">
                        <b>Nim</b> <a class="float-right">{{ $user->nim }}</a>
                    </li>
                    <li class="list-group-item" style="background-color: #273746;">
                        <b>Divisi</b> <a class="float-right">{{ $user->divisi }}</a>
                    </li>
                </ul>
            </div>


        </div>
    </div>
@endsection
