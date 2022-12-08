@extends('user.layout.main')

@section('content')
    <!-- About Me Section Begin -->
    <section class="about-me spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="about-left">
                        <img src="{{ asset('user/img/about-me.jpg') }}" alt="">
                        <div class="about-title">
                            {{-- <span>16 January 2019</span> --}}
                            <h2>I’m I Ketut Wiyasa, <br />a Senior and Head Cook Kitchen</h2>
                            <p>Education.<br />
                                July 1998 - sept 1999 PPLP panshopia collage.<br />
                                Major. D1 food& baverage division.<br />
                                Course of study. An introduction to language, basic hotel,(frontoffice,f&B,
                                accounting)<br />
                            </p>
                            <p>Experience :<br />
                                10 years in Hotel</p>
                            <ul>
                                <li>Job training at KIND OF VILLA BINTANG in Nusa dua, Bali</li>
                                <li>As a cook at Grand Mirage Resort and Spa</li>
                                <li>As a senior cook at TAO restauran in Ramada Tanjung Benoa hotel</li>
                                <li>As a leader kitchen at GRAND Surya Hotel Eksekutif Bar and Karaoke</li>
                                <li>As a Head cook at la Lorraine Restaurant</li>
                                <li>As a Head cook at Baturiti Resto Lovina</li>
                                <li>As a Demi chef at De Boutique Style Hotel</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="about-right">
                        <div class="sidebar">
                            @foreach ($recipes as $value)
                                <div class="sidebar-item">
                                    <a href="{{ route('homepage.show', $value->id) }}"><img
                                            src="{{ $value->photo->getUrl() }}" alt="" width="100px"
                                            height="80px"></a>
                                    <div class="sidebar-item-text">
                                        <div class="cat-name">{{ ucfirst($value->kategori) }}</div>
                                        <h6><a href="{{ route('homepage.show', $value->id) }}" style="text-decoration: none; color:inherit ">{{ $value->nameFood }}</a></h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- About Me Section End -->

    <!-- Similar Recipe Section Begin -->
    {{-- <section class="similar-recipe spad">
        <div class="container">
            <div class="row">
                @foreach ($recipes as $value)
                <div class="col-lg-3 col-md-6">
                    <div class="similar-item">
                        <a href="{{ route('homepage.show', $value->id) }}"><img src="{{ $value->photo->getUrl() }}" alt="" width="75px" height="100px"></a>
                        <div class="similar-text">
                            <div class="cat-name">Indonesian Food</div>
                            <h6>{{ $value->nameFood }}</h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section> --}}
    <!-- Similar Recipe Section End -->
@endsection
