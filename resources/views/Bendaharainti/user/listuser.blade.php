@extends('layout.maininti')
@section('title')
User
@endsection()
@section('container')
<div class="container mt-5">
    <a href="/tambahakun" class="btn btn-primary">Tambah Akun</a>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table text-nowrap">
            <thead>
                <tr>

                    <!-- id
                email
                fullname
                kategori_id
                nim
                divisi -->
                    <th>No</th>
                    <th>Email</th>
                    <th>Full Name</th>
                    <th>Role</th>
                    <th>NIM</th>
                    <th>Divisi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1
                @endphp
                @foreach ($users as $user)
                <tr>
                    <?php
                    $role = "no role";
                    if ($user->kategori_id == 1) {
                        $role = "Inti";
                    } else {
                        $role = "Biro";
                    }
                    ?>
                    <td>{{$i}}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->fullname }}</td>
                    <td>{{ $role }}</td>
                    <td>{{ $user->nim }}</td>
                    <td>{{ $user->divisi }}</td>
                    <td><a href="listuser/{{$user->id}}" class="fa fa-edit"></a>
                        <button type="submit" class="border-0 text-danger bg-transparent" data-toggle="modal" data-target="#deleteModal{{$user->id}}">
                            <i class="fa fa-trash"> </i>
                        </button>
                    </td>
                    <div class="modal fade" id="deleteModal{{$user->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title bgwhite" id="deleteModalLabel">Delete User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body bgwhite">
                                    Anda yakin ingin menghapus user?
                                </div>
                                <form action="/user/{{ $user->id }}" method="post" class="d-inline">
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