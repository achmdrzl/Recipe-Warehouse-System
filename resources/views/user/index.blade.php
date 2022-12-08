@extends('user.layout.main')

@section('content')
    <!-- Recipe Section Begin -->
    <section class="recipe-section spad">
        <div class="container">
            <div class="row">

                @foreach ($recipes as $value)
                    <div class="col-lg-4 col-sm-6">
                        <div class="recipe-item">
                            @if ($value->photo)
                                <a href="{{ route('homepage.show', $value->id) }}">
                                    <img src="{{ $value->photo->getUrl() }}" width="75%" height="320px"
                                        style="display: block; margin: 0 auto;">
                                </a>
                            @else
                                <img src="#" width="75%" height="750%" alt="No Image X"
                                    style="display: block; margin: 0 auto;">
                            @endif
                            <div class="ri-text">
                                <div class="cat-name">{{ ucfirst($value->kategori) }}</div>
                                <a href="{{ route('homepage.show', $value->id) }}">
                                    <h4>{{ $value->nameFood }}</h4>
                                </a>
                                <p style="text-align: justify">{{ substr($value->desc, 0, 140) }} ...</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-lg-4 col-sm-6">
                    <div class="recipe-item">
                        <a href="#"><img src="{{ asset('user/img/recipe/recipe-2.jpg') }}" alt=""></a>
                        <div class="ri-text">
                            <div class="cat-name">Desert</div>
                            <a href="#">
                                <h4>Blueberries cake</h4>
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="recipe-item">
                        <a href="#"><img src="{{ asset('user/img/recipe/recipe-3.jpg') }}" alt=""></a>
                        <div class="ri-text">
                            <div class="cat-name">Desert</div>
                            <a href="#">
                                <h4>Pork Steak with Onion</h4>
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="recipe-item">
                        <a href="#"><img src="{{ asset('user/img/recipe/recipe-4.jpg') }}" alt=""></a>
                        <div class="ri-text">
                            <div class="cat-name">Desert</div>
                            <a href="#">
                                <h4>Pizza with salami</h4>
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="recipe-item">
                        <a href="#"><img src="{{ asset('user/img/recipe/recipe-5.jpg') }}" alt=""></a>
                        <div class="ri-text">
                            <div class="cat-name">Desert</div>
                            <a href="#">
                                <h4>Pumpkin Chilli Soup</h4>
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="recipe-item">
                        <a href="#"><img src="{{ asset('user/img/recipe/recipe-6.jpg') }}" alt=""></a>
                        <div class="ri-text">
                            <div class="cat-name">Desert</div>
                            <a href="#">
                                <h4>Salmon with veggies</h4>
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="recipe-item">
                        <a href="#"><img src="{{ asset('user/img/recipe/recipe-7.jpg') }}" alt=""></a>
                        <div class="ri-text">
                            <div class="cat-name">Desert</div>
                            <a href="#">
                                <h4>Strawberry Chessecake</h4>
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="recipe-item">
                        <a href="#"><img src="{{ asset('user/img/recipe/recipe-8.jpg') }}" alt=""></a>
                        <div class="ri-text">
                            <div class="cat-name">Desert</div>
                            <a href="#">
                                <h4>Key Lime Pie</h4>
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="recipe-item">
                        <a href="#"><img src="{{ asset('user/img/recipe/recipe-9.jpg') }}" alt=""></a>
                        <div class="ri-text">
                            <div class="cat-name">Desert</div>
                            <a href="#">
                                <h4>Pizza with cheesse</h4>
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-lg-12">
                    {{ $recipes->links() }}
                    <div class="recipe-pagination">
                        {{-- <a href="#" class="active">01</a>
                        <a href="#">02</a>
                        <a href="#">03</a>
                        <a href="#">04</a>
                        <a href="#">Next</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Recipe Section End -->
@endsection
