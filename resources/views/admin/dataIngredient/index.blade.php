@extends('admin.layout.main')

@push('style-alt')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endpush

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
            <h3 class="page-title">Data Bahan Makanan</h3>
            <div class="header-right d-flex flex-wrap mt-md-2 mt-lg-0">
                <a type="button" data-bs-toggle="modal" href="#exampleModal"
                    class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                    <i class="mdi mdi-plus-circle"></i> Tambah Bahan Makanan </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Bahan Makanan</h4>
                        <p class="card-description">Keseluruhan Data Bahan Makanan</p>
                        <div class="table-responsive">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Bahan</th>
                                        <th>Nama Bahan Makanan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ingredients as $value)
                                        <tr>
                                            <input type="hidden" class="delete_id" value="{{ $value->id }}">
                                            <td><label class="badge badge-danger">{{ $loop->iteration }}</label></td>
                                            <td><label class="badge badge-dark">{{ $value->codeI }}</label></td>
                                            <td>{{ $value->item }}</td>
                                            <td>
                                                <a href="{{ route('ingredient.edit', $value->id) }}"
                                                    class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                <form action="{{ route('ingredient.destroy', $value->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm btndelete"><i
                                                            class="ti-trash"></i>
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

    {{-- Modal Content Create New Ingredient --}}
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Masukkan Pengeluaran Harian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="background: transparent; border:none;">x</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('ingredient.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon2"
                                        style="font-weight: bold">Tanggal</span>
                                    <input type="text" id="payTotal" class="form-control" name="spendingDate"
                                        value="{{ date('d F Y', strtotime(date('d-m-Y'))) }}" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="field_wrapper">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon2"
                                            style="font-weight: bold">Items</span>
                                        <input type="text" id="payTotal" class="form-control" name="item[]"
                                            placeholder="Masukkan Nama Item" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" id="addBtn" class="btn btn-primary" style="margin-top:5px"><i
                                            class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        Simpan </button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        style="color: white">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal --}}

    {{-- Modal Content Update Ingredient --}}
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Bahan Makanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="background: transparent; border:none;">x</button>
                </div>
                <div class="modal-body">
                    <form id="editItems">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon2"
                                        style="font-weight: bold">Tanggal</span>
                                    <input type="text" id="payTotal" class="form-control" name="spendingDate"
                                        value="{{ date('d F Y', strtotime(date('d-m-Y'))) }}" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="field_wrapper">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon2"
                                            style="font-weight: bold">Items</span>
                                        <input type="text" id="item" class="form-control" name="item"
                                            value="" placeholder="Masukkan Nama Item" required />
                                        <input type="hidden" class="item_id" value="" id="item_id"
                                            name="item_id">
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="submit" class="btn btn-primary" id="btn-save" value="add">
                        Simpan </button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        style="color: white">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal --}}
@endsection

@push('script-alt')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}

    <script>
        $(document).ready(function() {
            var maxField = 15; //Input fields increment limitation
            var addButton = $('#addBtn'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML =
                `<div class="row">
                        <div class="col-md-8">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon2"
                                    style="font-weight: bold">Items</span>
                                <input type="text" id="payTotal" class="form-control" name="item[]"
                                    placeholder="Masukkan Nama Item" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <a href="javascript:void(0);" class="remove_button btn btn-danger"><i
                                    class="fa fa-minus"></i></a>
                        </div>
                    </div>
                </div>`;
            var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton).click(function() {
                //Check maximum number of input fields
                if (x < maxField) {
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e) {
                e.preventDefault();
                $(this).parent('').parent('').remove(); //Remove field html
                x--; //Decrement field counter

                if (x == 1) {
                    swal("Warning", "Tidak Bisa Menghapus Lagi!", "warning");
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '#submit', function(event) {
                event.preventDefault()
                var id = $("#item_id").val();
                var item = $("#item").val();

                $.ajax({
                    url: 'ingredient/' + id,
                    type: "POST",
                    data: {
                        id: id,
                        item: item,
                    },
                    dataType: 'json',
                    success: function(data) {

                        $('#editItems').trigger("reset");
                        $('#editModal').modal('hide');
                        window.location.reload(true);
                    }
                });
            });

            $('body').on('click', '#editItem', function(event) {

                event.preventDefault();
                var id = $(this).data('id');
                console.log(id)
                $.get('ingredient/' + id + '/edit', function(data) {
                    $('#userCrudModal').html("Edit category");
                    $('#submit').val("Edit category");
                    $('#editModal').modal('show');
                    $('#item_id').val(data.data.id);
                    $('#item').val(data.data.item);
                })
            });

        });
    </script>

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
                                url: 'ingredient/' + deleteid,
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
