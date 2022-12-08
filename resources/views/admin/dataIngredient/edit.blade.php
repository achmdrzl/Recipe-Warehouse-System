@extends('admin.layout.main')

@section('content')
    <div class="page-header">
        <h3 class="page-title">Edit Bahan Makanan</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('ingredient.index') }}">Data Bahan Makanan</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Edit Bahan Makanan </li>
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
                    <h4 class="card-title">Mengubah Data Bahan Makanan</h4>
                    <p class="card-description">Harap Masukkan Seluruh Inputan Dengan Benar!</p>
                    <form class="forms-sample" action="{{ route('ingredient.update', $data->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="exampleInputUsername1">Kode</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" name="codeI"
                                placeholder="Kode" value="{{ $data->codeI }}" readonly/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Item</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" name="item"
                                placeholder="Nama Bahan Makanan" value="{{ $data->item }}" />
                        </div>
                        <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                        <a href="{{ route('ingredient.index') }}" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
