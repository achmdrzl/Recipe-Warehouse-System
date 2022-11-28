        @extends('admin.layout.main')

        @section('content')
            <div class="page-header flex-wrap">
                <div class="header-left">
                    <button class="btn btn-primary mb-2 mb-md-0 mr-2"> Create new document </button>
                    <button class="btn btn-outline-primary mb-2 mb-md-0"> Import documents </button>
                </div>
                <div class="header-right d-flex flex-wrap mt-md-2 mt-lg-0">
                    <div class="d-flex align-items-center">
                        <a href="#">
                            <p class="m-0 pr-3">Dashboard</p>
                        </a>
                        <a class="pl-3 mr-4" href="#">
                            <p class="m-0">ADE-00234</p>
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
                                <div class="card-title"> Jumlah Pengguna <small class="d-block text-muted">August 01 -
                                        August
                                        31</small>
                                </div>
                                <div class="d-flex text-muted font-20">
                                    <i class="mdi mdi-printer mouse-pointer"></i>
                                    <i class="mdi mdi-help-circle-outline ml-2 mouse-pointer"></i>
                                </div>
                            </div>
                            <h3 class="font-weight-bold mb-0"> 2,409 <span class="text-success h5">4,5%<i
                                        class="mdi mdi-arrow-up"></i></span>
                            </h3>
                            <span class="text-muted font-13">Avg customers/Day</span>
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
                                <div class="card-title"> Jumlah Resep <small class="d-block text-muted">August 01 - August
                                        31</small>
                                </div>
                                <div class="d-flex text-muted font-20">
                                    <i class="mdi mdi-printer mouse-pointer"></i>
                                    <i class="mdi mdi-help-circle-outline ml-2 mouse-pointer"></i>
                                </div>
                            </div>
                            <h3 class="font-weight-bold mb-0"> 0.40% <span class="text-success h5">0.20%<i
                                        class="mdi mdi-arrow-up"></i></span>
                            </h3>
                            <span class="text-muted font-13">Avg customers/Day</span>
                            <div class="bar-chart-wrapper">
                                <canvas id="barchart" height="80"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
