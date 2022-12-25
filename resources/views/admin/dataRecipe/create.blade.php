@extends('admin.layout.main')

@push('style-alt')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush


@section('content')
    <div class="page-header">
        <h3 class="page-title">Tambah Resep Makanan</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('recipes.index') }}">Data Resep</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Tambah Resep Makanan</li>
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
                    <h4 class="card-title">Menambahkan Data Resep Makanan Baru</h4>
                    <p class="card-description">Harap Masukkan Seluruh Inputan Dengan Benar!</p>
                    <form class="forms-sample" action="{{ route('recipes.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nameFood">Nama Resep Makanan </label>
                            <input type="text" class="form-control" id="nameFood" name="nameFood"
                                placeholder="Masukkan Nama Makanan" value="{{ old('nameFood') }}" />
                        </div>
                        <div class="form-group">
                            <label for="nameFood">Nama Kategori Makanan </label>
                            <input type="text" class="form-control" id="kategori" name="kategori"
                                placeholder="Masukkan Kategori Makanan" value="{{ old('kategori') }}" />
                        </div>
                        <div class="form-group">
                            <label for="cookTime">Waktu Pembuatan (dalam menit)</label>
                            <input type="number" class="form-control" id="cookTime" name="cookTime"
                                placeholder="Masukkan Waktu Pembuatan Makanan" value="{{ old('cookTime') }}" />
                        </div>
                        <div class="form-group">
                            <label for="prepTime">Waktu Persiapan (dalam menit)</label>
                            <input type="number" class="form-control" id="prepTime" name="prepTime"
                                placeholder="Masukkan Waktu Persiapan" />
                        </div>
                        <div class="form-group">
                            <label for="desc">Deskripsi Makanan</label>
                            <textarea class="form-control" name="desc" cols="30" rows="10" id="#"value="{{ old('desc') }}"
                                placeholder="Masukkan Deksripsi Makanan"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="note">Catatan Penting</label>
                            <textarea class="form-control" name="note" id="#" cols="30" rows="10" value="{{ old('note') }}"
                                placeholder="Masukkan Note Makanan"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="photo">Unggah Gambar</label>
                            <div class="needsclick dropzone" id="photoDropzone"></div>
                        </div>
                        <div class="form-group">
                            <label>Masukkan Bahan Makanan</label>
                            <select id="ingredient" class="form-control ingredient" name="ingredient[]">
                                <option>-- Pilih Bahan Makanan --</option>
                                @foreach ($ingredients as $id => $item)
                                    <option value="{{ $id }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="field_wrapper">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Masukkan Langkah-Langkah Memasak</label>
                                        <Textarea name="instruction[]" id="instruction" class="form-control" placeholder="Masukkan Langkah-Langkah Memasak"></Textarea>
                                        {{-- <input type="text" id="instruction" class="form-control" name="instruction[]" placeholder="Masukkan Langkah-Langkah Memasak" required /> --}}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" id="addBtn" class="btn btn-success" style="margin-top:23px"><i
                                            class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary mr-2 btn-lg"> Submit </button>
                            <a href="{{ route('recipes.index') }}" class="btn btn-light btn-lg">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-alt')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.ingredient').select2({
                multiple: true,
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            var maxField = 15; //Input fields increment limitation
            var numb = 1;
            var addButton = $('#addBtn'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML =
                `<div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <Textarea name="instruction[]" id="instruction" class="form-control" placeholder="Masukkan Langkah-Langkah Memasak"></Textarea>
                            </div>
                        </div>
                        <div class="col-md-2">
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

    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.photoDropzone = {
            url: "{{ route('recipes.storeImg') }}",
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(file, response) {
                $('form').find('input[name="photo"]').remove()
                $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="photo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($category) && $category->photo)
                    var file = {!! json_encode($category->photo) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, "{{ $recipes->photo->getUrl() }}")
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }
                return _results
            }
        }
    </script>
@endpush
