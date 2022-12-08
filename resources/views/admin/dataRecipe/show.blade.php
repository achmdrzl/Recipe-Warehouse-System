@extends('admin.layout.main')

@push('style-alt')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush


@section('content')
    <div class="page-header">
        <h3 class="page-title">Detail Resep Makanan</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('recipes.index') }}">Data Resep</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Detail Resep Makanan</li>
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
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Detail Resep Makanan</h4>
                    <p class="card-description"> Resep Makanan :<code><label
                                class="badge badge-danger">{{ $recipe->nameFood }}</label></code>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-hover mb-4">
                            <tr>
                                <th>Nama Resep Makanan</th>
                                <td colspan="6">{{ $recipe->nameFood }}</td>
                            </tr>
                            <tr>
                                <th>Kategori Resep Makanan</th>
                                <td colspan="6">{{ ucfirst($recipe->kategori) }}</td>
                            </tr>
                            <tr>
                                @if ($recipe->photo)
                                    <a href="{{ $recipe->photo->getUrl() }}" target="_blank">
                                        <img src="{{ $recipe->photo->getUrl() }}" width="35%" height="35%"
                                            style="display: block; margin: 0 auto;">
                                    </a>
                                @else
                                    <th>
                                        <span class="badge badge-warning">Tidak Ada Gambar</span>
                                    </th>
                                @endif
                            </tr>
                            <tr></tr>
                            <tr>
                                <th>Lama Waktu Memasak</th>
                                <td colspan="6"><label class="badge badge-danger">{{ $recipe->cookTime }} Menit</label>
                                </td>
                            </tr>
                            <tr>
                                <th>Lama Waktu Persiapan</th>
                                <td colspan="6"><label class="badge badge-danger">{{ $recipe->prepTime }} Menit</label>
                                </td>
                            </tr>
                            <tr></tr>
                        </table>
                    </div>
                    <p class="card-description" style="text-align: justify"> Deskripsi Makanan :<code>{{ $recipe->desc }}</code>
                    <p class="card-description" style="text-align: justify"> Catatan Makanan :<code>{{ $recipe->note }}</code>
                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bahan-Bahan Yang di Butuhkan</h4>
                    <p class="card-description"> Resep Makanan :<code>{{ $recipe->nameFood }}</code>
                    </p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bahan Makanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recipe->detailRecipe as $value)
                                    <tr>
                                        <td><label class="badge badge-danger">{{ $loop->iteration }}</label></td>
                                        <td>
                                            {{ $value->ingredient->item }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Instruksi Cara Memasak</h4>
                    <p class="card-description"> Resep Makanan :<code>{{ $recipe->nameFood }}</code>
                    </p>
                    <div class="table-responsive">
                        {{-- <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Instruksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recipe->instruction as $item)
                                    <tr>
                                        <td><label class="badge badge-danger">{{ $loop->iteration }}</label></td>
                                        <td>
                                            {{ $item->instruction }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> --}}
                        @foreach ($recipe->instruction as $item)
                            <p style="text-align: justify" class="card-description">{{ $loop->iteration }} :<code>{{ $item->instruction }}</code>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
