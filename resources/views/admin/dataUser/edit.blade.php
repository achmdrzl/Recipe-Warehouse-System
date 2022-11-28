@extends('admin.layout.main')

@section('content')
    <div class="page-header">
        <h3 class="page-title">Tambah Pengguna</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Data Pengguna</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Edit Pengguna </li>
            </ol>
        </nav>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button class="close" type="button" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Menambahkan Data Pengguna Baru</h4>
                    <p class="card-description">Harap Masukkan Seluruh Inputan Dengan Benar!</p>
                    <form class="forms-sample" action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="exampleInputUsername1">Name</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" name="name"
                                placeholder="Username" value="{{ $user->name }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                placeholder="Email" value="{{ $user->email }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                                placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Confirm Password</label>
                            <input type="password" class="form-control" id="exampleInputConfirmPassword1"
                                name="confirm-password" placeholder="Password" />
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Role Pengguna</label>
                            <div class="col-sm-9">
                                {{-- <select class="form-control" name="role">
                                    <option value="">-- Silahkan Pilih Role Pengguna --</option>
                                    <option value="user">Pengguna</option>
                                    <option value="admin">Admin</option>
                                </select> --}}
                                {!! Form::select('role', $roles, $userRole, ['class' => 'form-control', 'multiple']) !!}
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                        <a href="{{ route('users.index') }}" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
