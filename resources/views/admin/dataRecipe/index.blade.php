@extends('admin.layout.main')

@section('content')
    <div class="content-wrapper">
        @if (session()->has('message'))
            <div class="alert alert-{{ session()->get('type') }} alert-dismissible fade show">
                {{ session()->get('message') }}
                <button class="close" type="button" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="page-header">
            <h3 class="page-title">Data Resep Makanan</h3>
            <div class="header-right d-flex flex-wrap mt-md-2 mt-lg-0">
                <a type="button" href="{{ route('recipes.create') }}" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                    <i class="mdi mdi-plus-circle"></i> Tambah Resep </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Resep Makanan</h4>
                        <p class="card-description">Keseluruhan Data Resep Makanan</p>
                        <div class="table-responsive">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Resep</th>
                                        <th>Deskripsi</th>
                                        <th>Kategori Makanan</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recipes as $value)
                                        <tr>
                                            <input type="hidden" class="delete_id" value="{{ $value->id }}">
                                            <td><label class="badge badge-dark">{{ $loop->iteration }}</label></td>
                                            <td>{{ $value->nameFood }}</td>
                                            <td>{{ substr($value->desc, 0,30) }} ...</td>
                                            <td><label class="badge badge-danger">{{ ucfirst($value->kategori) }}</label></td>
                                            <td>
                                                @if ($value->photo)
                                                    <a href="{{ $value->photo->getUrl() }}" target="_blank">
                                                        <img src="{{ $value->photo->getUrl() }}" class="img-lg"
                                                            width="40px" height="40px">
                                                    </a>
                                                @else
                                                    <span class="badge badge-warning">Tidak Ada Gambar</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('recipes.show', $value->id) }}"
                                                    class="btn btn-info"><i class="fa fa-eye"></i> Detail</a>
                                                <a href="{{ route('recipes.edit', $value->id) }}"
                                                    class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                <form action="{{ route('recipes.destroy', $value->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-md btndelete"><i class="ti-trash"></i>
                                                        <i class="fa fa-trash-o"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-alt')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btndelete').click(function(e) {
                e.preventDefault();

                var deleteid = $(this).closest("tr").find('.delete_id').val();

                swal({
                        title: "Apakah anda yakin?",
                        text: "Setelah dihapus, Anda tidak dapat memulihkan Data ini lagi!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            var data = {
                                "_token": $('input[name=_token]').val(),
                                'id': deleteid,
                            };
                            $.ajax({
                                type: "DELETE",
                                url: 'recipes/' + deleteid,
                                data: data,
                                success: function(response) {
                                    swal(response.status, {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });
                                }
                            });
                        } else {
                            swal("Batal!", "Proses Hapus di Batalkan!", "error");

                        }
                    });
            });

        });
    </script>
@endpush
