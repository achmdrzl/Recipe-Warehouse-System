@extends('user.layout.main')

@section('content')
    <!-- Single Recipe Section Begin -->
    <section class="single-page-recipe spad">
        <div class="recipe-top">
            <div class="container-fluid">
                <div class="recipe-title">
                    <span>~ {{ $total }} ingredients / {{ $recipe->cookTime }} minutes/ easy / {{ $recipe->kategori }}/
                        recipe</span>
                    <h2>{{ $recipe->nameFood }}</h2>
                    <ul class="tags">
                        <li>{{ ucfirst($recipe->kategori) }}</li>
                    </ul>
                </div>
                {{-- <img src="{{ $recipe->photo->getUrl() }}" alt=""> --}}
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="ingredients-item">
                        <div class="intro-item">
                            <img src="{{ $recipe->photo->getUrl() }}" alt="">
                            <h2>{{ $recipe->nameFood }}</h2>
                            {{-- <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="reviews">4.9 from 25 reviews</div> --}}
                            <div class="recipe-time">
                                <ul>
                                    <li>Prep time: <span>{{ $recipe->prepTime }} min</span></li>
                                    <li>Cook time: <span>{{ $recipe->cookTime }} min</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="ingredient-list">
                            {{-- <div class="recipe-btn">
                                <a href="#">Print Recipe</a>
                                <a href="#" class="black-btn">Pin Recipe</a>
                            </div> --}}
                            <div class="list-item">
                                <h5>Ingredients</h5>
                                <div class="salad-list">
                                    {{-- <h6>For the salad</h6> --}}
                                    <ul>
                                        @foreach ($recipe->detailRecipe as $value)
                                            <li>{{ $value->ingredient->item }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                {{-- <div class="dressing-list">
                                    <h6>For the dressing</h6>
                                    <ul>
                                        <li>1 brick of frozen udon</li>
                                        <li>1/2 cup kimchi, plus a bit of kimchi juice</li>
                                        <li>1 tablespoon of butter</li>
                                        <li>1 sac of mentaiko</li>
                                        <li>sliced green onions and nori, to finish</li>
                                        <li>1 tablespoon of butter</li>
                                        <li>1 sac of mentaiko</li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    {{-- <div class="nutrition-fact">
                        <div class="nutri-title">
                            <h6>Nutrition Facts</h6>
                            <span>Serves 4</span>
                        </div>
                        <ul>
                            <li>Total Fat : 20.4g</li>
                            <li>Cholesterol : 2%</li>
                            <li>Chalories: 345</li>
                        </ul>
                    </div> --}}
                </div>
                <div class="col-lg-7">
                    <div class="recipe-right">
                        <div class="recipe-desc">
                            <h3>Description</h3>
                            <p>{{ $recipe->desc }}</p>
                        </div>
                        <div class="instruction-list">
                            <h3>Instructions</h3>
                            <ul>
                                @foreach ($recipe->instruction as $item)
                                    <li>
                                        <span>{{ $loop->iteration }}</span>
                                        <div class="notes">
                                            {{ $item->instruction }}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="notes">
                            <h3>Notes</h3>
                            <div class="notes-item">
                                <p>{{ $recipe->note }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Single Recipe Section End -->

    <!-- Similar Recipe Section Begin -->
    <section class="similar-recipe spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="similar-item">
                        <a href="#"><img src="{{ asset('user/img/cat-feature/small-7.jpg') }}" alt=""></a>
                        <div class="similar-text">
                            <div class="cat-name">Vegan</div>
                            <h6>Italian Tiramisu with Coffe</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="similar-item">
                        <a href="#"><img src="{{ asset('user/img/cat-feature/small-6.jpg') }}" alt=""></a>
                        <div class="similar-text">
                            <div class="cat-name">Vegan</div>
                            <h6>Dry Cookies with Corn</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="similar-item">
                        <a href="#"><img src="{{ asset('user/img/cat-feature/small-5.jpg') }}" alt=""></a>
                        <div class="similar-text">
                            <div class="cat-name">Vegan</div>
                            <h6>Asparagus with Pork Loin and Vegetables</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="similar-item">
                        <a href="#"><img src="{{ asset('user/img/cat-feature/small-4.jpg') }}" alt=""></a>
                        <div class="similar-text">
                            <div class="cat-name">Vegan</div>
                            <h6>Smoked Salmon mini Sandwiches with Onion</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Similar Recipe Section End -->
@endsection
