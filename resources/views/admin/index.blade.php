        @extends('admin.layout.main')

        @section('content')
            <div class="page-header flex-wrap">
                <div class="header-left">
                    {{-- <button class="btn btn-primary mb-2 mb-md-0 mr-2"> Create new document </button>
                    <button class="btn btn-outline-primary mb-2 mb-md-0"> Import documents </button> --}}
                </div>
                <div class="header-right d-flex flex-wrap mt-md-2 mt-lg-0">
                    <div class="d-flex align-items-center">
                        <a href="#">
                            <p class="m-0 pr-3">Dashboard</p>
                        </a>
                        <a class="pl-3 mr-4" href="#">
                            <p class="m-0">Management Resep Makanan</p>
                        </a>
                    </div>
                </div>
            </div>
            <!-- chart row starts here -->
            <div class="row">
                <div class="col-sm-6 stretch-card grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="card-title"> Jumlah Pengguna <small
                                        class="d-block text-muted">{{ date('d F Y', strtotime($startUser->created_at)) }} -
                                        {{ date('d F Y', strtotime($endUser->created_at)) }}</small>
                                </div>
                            </div>
                            <h3 class="font-weight-bold mb-0"><a href="{{ route('users.index') }}" style="text-decoration: none; color:inherit"> {{ $totalUser }} <span class="text-success h5">Total Pengguna</span></a>
                            </h3>
                            <span class="text-muted font-13">Keseluruhan Waktu</span>
                            <div class="line-chart-wrapper">
                                <canvas id="linechart" height="80"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 stretch-card grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="card-title"> Jumlah Resep <small
                                        class="d-block text-muted">{{ date('d F Y', strtotime($startRecipe->created_at)) }}
                                        - {{ date('d F Y', strtotime($endRecipe->created_at)) }}</small>
                                </div>
                            </div>
                            <h3 class="font-weight-bold mb-0"><a href="{{ route('recipes.index') }}" style="text-decoration: none; color:inherit">{{ $totalRecipe }} <span class="text-success h5">ResepMakanan</span></a>
                            </h3>
                            <span class="text-muted font-13">Keseluruhan Waktu</span>
                            <div class="bar-chart-wrapper">
                                <canvas id="barchart" height="80"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
