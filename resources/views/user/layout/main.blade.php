<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yummy | {{ $title }}</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('user/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('user/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('user/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}" type="text/css">
    <script src="http://maps.googleapis.com/maps/api/js"></script>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section-other">
        <div class="container">
            <div class="logo">
                <a href="{{ route('homepage') }}"><img src="{{ asset('user/img/little-logo.png') }}" alt=""></a>
            </div>
            <div class="nav-menu">
                <nav class="main-menu mobile-menu">
                    <ul>
                        <li class="{{ $title == 'Home' ? 'active' : '' }}"><a href="{{ route('homepage') }}">Home</a>
                        </li>
                        <li class="{{ $title == 'Search Panel' ? 'active' : '' }}"><a href="{{ route('search.panel') }}">Search</a>
                        </li>
                        <li class="{{ $title == 'About Me' ? 'active' : '' }}"><a href="{{ route('aboutme') }}">About
                                Me</a></li>
                        <li class="{{ $title == 'Contact' ? 'active' : '' }}"><a
                                href="{{ route('contactme') }}">Contact</a></li>
                    </ul>
                </nav>
                <div>
                    <div class="nav-right">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item" style="margin-top:-5px; margin-left:5px;">
                                <i class="fa fa-sign-out" style="color: #FC0254"></i>
                            </button>
                        </form>
                        {{-- <a href="{{ route('logout') }}"></a> --}}
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Search Section Begin -->
    <div class="hero-search set-bg" data-setbg="{{ asset('user/img/search-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="filter-table">

                        <form action="#" method="POST" class="filter-search">
                            @csrf
                            {{-- <div class="field_wrapper">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <select class="form-control" name="ingredient[]">
                                                <option>-- Pilih Bahan Makanan --</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <a type="button" id="addBtn" class="btn btn-danger"
                                            style="margin-top:0px"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div> --}}
                            <a type="submit" class="btn btn-danger" href="{{ route('search.panel') }}" style="display:flex; align-items:center; justify-content:center; font-weight:bold">Yummy Pusat Data Resep | Pencarian Resep Makanan</a>
                        </form>
                        {{-- <h4 style="color:wh">Yummy | Recipes Data Center</h4> --}}
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
        <!-- Footer Section Begin -->
        <footer class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="fs-left">
                            <div class="logo">
                                <a href="{{ route('homepage') }}">
                                    <img src="{{ asset('user/img/footer-logo.png') }}" alt="">
                                </a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut
                                labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo
                                viverra maecenas accumsan lacus vel facilisis.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1">
                        <form action="#" class="subscribe-form">
                            <h3>Welcome to Yummy Recipes Data Center</h3>
                            {{-- <input type="email" placeholder="Your e-mail"> --}}
                            {{-- <button type="submit">Subscribe</button> --}}
                        </form>
                        <div class="social-links">
                            <a href="#"><i class="fa fa-instagram"></i><span>Instagram</span></a>
                            <a href="#"><i class="fa fa-pinterest"></i><span>Pinterest</span></a>
                            <a href="#"><i class="fa fa-facebook"></i><span>Facebook</span></a>
                            <a href="#"><i class="fa fa-twitter"></i><span>Twitter</span></a>
                            <a href="#"><i class="fa fa-youtube"></i><span>Youtube</span></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | 2022
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->

        <!-- Search model -->
        <div class="search-model">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <div class="search-close-switch">+</div>
                <form class="search-model-form">
                    <input type="text" id="search-input" placeholder="Search here.....">
                </form>
            </div>
        </div>
        <!-- Search model end -->
    </div>
    <!-- Hero Search Section End -->

    <!-- Js Plugins -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    {{-- Sweet Alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('user/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('user/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('user/js/main.js') }}"></script>
    @stack('script-alt')
</body>

</html>
