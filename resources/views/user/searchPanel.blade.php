@extends('user.layout.main')
@push('style-alt')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endpush
@section('content')
    <!-- Recipe Section Begin -->
    <section class="recipe-section spad">
        <div class="container">
            <div class="row">
                <div class="filter-table" style="margin-top:-40px">
                    <form action="{{ route('search.recipe') }}" method="POST" class="filter-search">
                        @csrf
                        <div class="field_wrapper">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <select class="form-control mb-2 ingredient" name="ingredient[]">
                                            <option>-- Pilih Bahan Utama Makanan --</option>
                                            @foreach ($ingredients as $value)
                                                <option value="{{ $value->id }}">{{ $value->item }}</option>
                                            @endforeach
                                        </select>
                                        <div style="margin-top:10px"></div>
                                        <select class="form-control mb-2 ingredient" name="ingredient[]">
                                            <option>-- Pilih Bahan Makanan --</option>
                                            @foreach ($ingredients as $value)
                                                <option value="{{ $value->id }}">{{ $value->item }}</option>
                                            @endforeach
                                        </select>
                                         <div style="margin-top:10px"></div>
                                        <select class="form-control mb-2 ingredient" name="ingredient[]">
                                            <option>-- Pilih Bahan Makanan --</option>
                                            @foreach ($ingredients as $value)
                                                <option value="{{ $value->id }}">{{ $value->item }}</option>
                                            @endforeach
                                        </select>
                                         <div style="margin-top:10px"></div>
                                        <select class="form-control mb-2 ingredient" name="ingredient[]">
                                            <option>-- Pilih Bahan Makanan --</option>
                                            @foreach ($ingredients as $value)
                                                <option value="{{ $value->id }}">{{ $value->item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <a type="button" id="addBtn" class="btn btn-danger" style="margin-top:0px"><i
                                            class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        {{-- <input name="search" type="text" class="form-control mb-1"
                                placeholder="Masukkan Bahan Makanan Lainnya" value="{{ old('search') }}"> --}}
                        <button type="submit">Tampilkan Resep</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    {{ $recipes->links() }}
                    <div class="recipe-pagination">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Recipe Section End -->
@endsection

@push('script-alt')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        {{-- <script>
            $(document).ready(function() {
                $('.ingredient').select2();
            });
        </script> --}}
    <script>
        $(document).ready(function() {
            var maxField = 15; //Input fields increment limitation
            var numb = 1;
            var addButton = $('#addBtn'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML =
                `<div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                               <select class="form-control mb-2 ingredient" name="ingredient[]">
                                    <option>-- Pilih Bahan Makanan --</option>
                                    @foreach ($ingredients as $value)
                                        <option value="{{ $value->id }}">{{ $value->item }}</option>
                                    @endforeach
                                </select>
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
@endpush
